/*==============================VARIABLES==============================*/
/*-------------Aside-------------*/
const asideElement = document.querySelector(".aside");
/*-------------Main-------------*/
const mainElement = document.querySelector(".main");
/*-------------Nav-------------*/
const navBarBtn = document.querySelector(".main-nav__btn"),
  navBarIcon = document.querySelector(".main-nav__icon"),
  avtElement = document.querySelector(".main-nav__avt"),
  navList = document.querySelector(".main-nav__list"),
  editBtns = document.querySelectorAll(".main__btn--edit"),
  deleteBtns = document.querySelectorAll(".main__btn--delete"),
  addBtn = document.querySelector(".main__btn--add");
/*-------------Table-------------*/
const userIds = document.querySelectorAll(".main-table__id"),
  userNames = document.querySelectorAll(".main-table__name"),
  userPhones = document.querySelectorAll(".main-table__phone"),
  userAddresses = document.querySelectorAll(".main-table__address"),
  userRoles = document.querySelectorAll(".main-table__role");
let newPhoneIndex = 0;
/*-------------Form-------------*/
const formModal = document.querySelector(".form__modal"),
  formWrapper = document.querySelector(".form__wrapper"),
  formHeading = document.querySelector(".form__heading"),
  formMessage = document.querySelector(".form__message"),
  formElements = document.querySelectorAll(".form"),
  formTabBtns = document.querySelectorAll(".form-tab__btn"),
  cancelBtns = document.querySelectorAll(".form__btn--cancel"),
  userIdInputs = document.querySelectorAll('.form__input[name="id"]'),
  isUpdate = document.querySelectorAll('.form__input[name="isUpdate"]'),
  userPhoneInput = document.querySelector('.form__input[name="phone"]'),
  userPwdInput = document.querySelector('.form__input[name="pwd"]'),
  userConfirmPwdInput = document.querySelector(
    '.form__input[name="confirmPwd"]'
  ),
  userNameInput = document.querySelector('.form__input[name="name"]'),
  userAddressInput = document.querySelector('.form__input[name="address"]'),
  userRoleInput = document.querySelector('.form__input[name="role"]');
/*==============================EVENTS & FUNCTIONS==============================*/
/*-------------Toggle Aside Element-------------*/
navBarBtn.onclick = () => {
  asideElement.classList.toggle("hide");
  mainElement.classList.toggle("ml-0");
  navBarIcon.classList.toggle("rotate");
};
/*-------------Toggle Nav List-------------*/
avtElement.onclick = event => {
  event.stopPropagation();
  navList.classList.toggle("appear");
};
navList.onclick = event => {
  event.stopPropagation();
};
window.onclick = () => {
  navList.classList.remove("appear");
};
/*-------------Load Data From Table To Form Modal When Edit-------------*/
function getTableDatas(userFields) {
  const tableDatas = [];
  userFields.forEach(userField => {
    tableDatas.push(userField.innerText);
  });
  return tableDatas;
}
function setInputValues(inputFields, value) {
  inputFields.forEach(inputField => {
    inputField.value = value;
  });
}
function loadTableDatasToForm(index) {
  setInputValues(userIdInputs, getTableDatas(userIds)[index]);
  userPhoneInput.value = getTableDatas(userPhones)[index];
  userNameInput.value = getTableDatas(userNames)[index];
  userAddressInput.value = getTableDatas(userAddresses)[index];
  userRoleInput.value = getTableDatas(userRoles)[index];
}
/*-------------Open Form Modal-------------*/
addBtn.onclick = () => {
  showModal("Thêm thông tin nhân viên");
  formTabBtns[1].style = "display: none";
  displayInfoForm();
  setInputValues(isUpdate, 0);
  newPhoneIndex = -1;
};
editBtns.forEach((editBtn, index) => {
  editBtn.onclick = () => {
    showModal("Cập nhật thông tin nhân viên");
    loadTableDatasToForm(index);
    formTabBtns[1].style = "display: block";
    displayInfoForm();
    setInputValues(isUpdate, 1);
    newPhoneIndex = index;
  };
});
function showModal(heading) {
  formModal.classList.add("show");
  formHeading.innerText = heading;
}
function displayInfoForm() {
  document.querySelector(".form-tab__btn.active").classList.remove("active");
  formTabBtns[0].classList.add("active");
  document.querySelector(".form.show").classList.remove("show");
  formElements[0].classList.add("show");
}
/*-------------Close Form Modal-------------*/
formModal.onclick = () => {
  formModal.classList.remove("show");
  resetFormDatas();
  formMessage.innerText = "";
};
formWrapper.onclick = event => {
  event.stopPropagation();
};
cancelBtns.forEach(cancelBtn => {
  cancelBtn.onclick = () => {
    formModal.classList.remove("show");
    resetFormDatas();
    formMessage.innerText = "";
  };
});
function resetFormDatas() {
  setInputValues(userIdInputs, "");
  userPhoneInput.value = "";
  userPwdInput.value = "";
  userConfirmPwdInput.value = "";
  userNameInput.value = "";
  userAddressInput.value = "";
  userRoleInput.value = "";
}
/*-------------Switch Form Tabpane-------------*/
formTabBtns.forEach((formTabBtn, index) => {
  formTabBtn.onclick = () => {
    document.querySelector(".form-tab__btn.active").classList.remove("active");
    formTabBtn.classList.add("active");
    document.querySelector(".form.show").classList.remove("show");
    formElements[index].classList.add("show");
    formMessage.innerText = "";
    setInputValues(isUpdate, index + 1);
    // isUpdatePassword.value = index;
  };
});
/*-------------Form Validation-------------*/
function replaceVietnameseLettersToLatin(str) {
  str = str.toLowerCase();
  str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
  str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
  str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
  str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
  str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
  str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
  str = str.replace(/đ/g, "d");
  return str;
}
function validatePhone() {
  const phone = userPhoneInput.value.trim();
  const regex = /^0[0-9]{9,11}$/;
  if (!regex.test(phone)) {
    formMessage.innerText =
      "Số điện thoại phải có độ dài từ 10 - 12 số và bắt đầu bằng số 0!";
    userPhoneInput.focus();
    return false;
  } else return true;
}
function validateName() {
  const name = userNameInput.value.trim();
  const regex = /^[A-Za-z\s]+$/;
  if (!regex.test(replaceVietnameseLettersToLatin(name))) {
    formMessage.innerText =
      "Tên chỉ chứa tối đa 50 ký tự gồm chữ cái, khoảng trắng và được bắt đầu bằng chữ cái!";
    userNameInput.focus();
    return false;
  } else return true;
}
function validateAddress() {
  const address = userAddressInput.value.trim();
  const regex = /^[\w\s,/-]+$/;
  if (!regex.test(replaceVietnameseLettersToLatin(address))) {
    formMessage.innerText =
      "Địa chỉ gồm tối đa 100 ký tự chữ cái, số, khoảng trắng, ',', '/', '-' và không chứa ký tự đặc biệt!";
    userAddressInput.focus();
    return false;
  } else return true;
}
function validateRole() {
  const role = userRoleInput.value.trim();
  const regex = /^[\w\s,/-]+$/;
  if (!regex.test(replaceVietnameseLettersToLatin(role))) {
    formMessage.innerText =
      "Chức vụ chỉ chứa tối đa 50 ký tự gồm chữ cái, khoảng trắng và được bắt đầu bằng chữ cái!";
    userRoleInput.focus();
    return false;
  } else return true;
}
function findDuplicatePhone(newPhone, newIndex) {
  const phones = getTableDatas(userPhones);
  return phones.find((phone, index) => {
    return phone == newPhone && index != newIndex;
  });
}
function validatePassword() {
  const password = userPwdInput.value.trim();
  const regex = /^\S{8,12}$/;
  if (!regex.test(password)) {
    formMessage.innerText =
      "Mật khẩu gồm 8 - 12 ký tự và không chứa khoảng trắng!";
    userPwdInput.focus();
    return false;
  } else return true;
}
function validateFormUserInfo() {
  if (!validatePhone()) return false;
  if (!validateName()) return false;
  if (!validateAddress()) return false;
  if (!validateRole()) return false;
  if (findDuplicatePhone(userPhoneInput.value, newPhoneIndex) != undefined) {
    formMessage.innerText =
      "Số điện thoại đã được đăng ký. Vui lòng kiểm tra lại!";
    userPhoneInput.focus();
    return false;
  }
  isUpdate.value == 0
    ? alert("Thêm thông tin nhân viên thành công!")
    : alert("Cập nhật thông tin nhân viên thành công!");
  return true;
}
function validateFormUserPassword() {
  if (!validatePassword()) return false;
  if (userConfirmPwdInput.value.trim() !== userPwdInput.value.trim()) {
    formMessage.innerText = "Mật khẩu không khớp. Vui lòng kiểm tra lại!";
    userConfirmPwdInput.focus();
    return false;
  }
  isUpdate.value == 0
    ? alert("Thêm thông tin nhân viên thành công!")
    : alert("Cập nhật thông tin nhân viên thành công!");
  return true;
}
