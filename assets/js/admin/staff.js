/*==============================IMPORT==============================*/
import * as main from "./main.js";
/*==============================VARIABLES==============================*/
/*-------------Table-------------*/
const userIds = document.querySelectorAll(".main-table__id"),
  userNames = document.querySelectorAll(".main-table__name"),
  userPhones = document.querySelectorAll(".main-table__phone"),
  userAddresses = document.querySelectorAll(".main-table__address"),
  userRoles = document.querySelectorAll(".main-table__role");
let newPhoneIndex = 0;
/*-------------Form-------------*/
const formElements = document.querySelectorAll(".form"),
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
/*-------------Load Data From Table To Form Modal When Edit-------------*/
function loadTableDatasToForm(index) {
  main.setInputValues(userIdInputs, main.getTableDatas(userIds)[index]);
  userPhoneInput.value = main.getTableDatas(userPhones)[index];
  userNameInput.value = main.getTableDatas(userNames)[index];
  userAddressInput.value = main.getTableDatas(userAddresses)[index];
  userRoleInput.value = main.getTableDatas(userRoles)[index];
}
/*-------------Open Form Modal-------------*/
main.addBtn.onclick = () => {
  main.showModal("Thêm thông tin nhân viên");
  formTabBtns[1].style = "display: none";
  displayInfoForm();
  main.setInputValues(isUpdate, 0);
  newPhoneIndex = -1;
};
main.editBtns.forEach((editBtn, index) => {
  editBtn.onclick = () => {
    main.showModal("Cập nhật thông tin nhân viên");
    loadTableDatasToForm(index);
    formTabBtns[1].style = "display: block";
    displayInfoForm();
    main.setInputValues(isUpdate, 1);
    newPhoneIndex = index;
  };
});
function displayInfoForm() {
  document.querySelector(".form-tab__btn.active").classList.remove("active");
  formTabBtns[0].classList.add("active");
  document.querySelector(".form.show").classList.remove("show");
  formElements[0].classList.add("show");
}
/*-------------Close Form Modal-------------*/
cancelBtns.forEach(cancelBtn => {
  cancelBtn.onclick = () => {
    closeFormModal();
  };
});
main.formModal.onclick = () => {
  closeFormModal();
};
main.formWrapper.onclick = event => {
  event.stopPropagation();
};
function resetFormDatas() {
  main.setInputValues(userIdInputs, "");
  userPhoneInput.value = "";
  userPwdInput.value = "";
  userConfirmPwdInput.value = "";
  userNameInput.value = "";
  userAddressInput.value = "";
  userRoleInput.value = "";
}
function closeFormModal() {
  main.formModal.classList.remove("show");
  resetFormDatas();
  main.formMessage.innerText = "";
}
/*-------------Switch Form Tabpane-------------*/
formTabBtns.forEach((formTabBtn, index) => {
  formTabBtn.onclick = () => {
    document.querySelector(".form-tab__btn.active").classList.remove("active");
    formTabBtn.classList.add("active");
    document.querySelector(".form.show").classList.remove("show");
    formElements[index].classList.add("show");
    main.formMessage.innerText = "";
    main.setInputValues(isUpdate, index + 1);
  };
});
/*-------------Form Validation-------------*/
formElements[0].onsubmit = () => validateFormUserInfo();
formElements[1].onsubmit = () => validateFormUserPassword();
function validatePhone() {
  const phone = userPhoneInput.value.trim();
  const regex = /^0[0-9]{9,11}$/;
  if (!regex.test(phone)) {
    main.formMessage.innerText =
      "Số điện thoại phải có độ dài từ 10 - 12 số và bắt đầu bằng số 0!";
    userPhoneInput.focus();
    return false;
  } else return true;
}
function validateName() {
  const name = userNameInput.value.trim();
  const regex = /^[A-Za-z\s]+$/;
  if (!regex.test(main.replaceVietnameseLettersToLatin(name))) {
    main.formMessage.innerText =
      "Tên nhân viên chỉ chứa tối đa 50 ký tự gồm chữ cái, khoảng trắng và được bắt đầu bằng chữ cái!";
    userNameInput.focus();
    return false;
  } else return true;
}
function validateAddress() {
  const address = userAddressInput.value.trim();
  const regex = /^[\w\s,/-]+$/;
  if (!regex.test(main.replaceVietnameseLettersToLatin(address))) {
    main.formMessage.innerText =
      "Địa chỉ gồm tối đa 100 ký tự chữ cái, số, khoảng trắng, ',', '/', '-' và không chứa ký tự đặc biệt!";
    userAddressInput.focus();
    return false;
  } else return true;
}
function validateRole() {
  const role = userRoleInput.value.trim();
  const regex = /^[\w\s,/-]+$/;
  if (!regex.test(main.replaceVietnameseLettersToLatin(role))) {
    main.formMessage.innerText =
      "Chức vụ chỉ chứa tối đa 50 ký tự gồm chữ cái, khoảng trắng và được bắt đầu bằng chữ cái!";
    userRoleInput.focus();
    return false;
  } else return true;
}
function validatePassword() {
  const password = userPwdInput.value.trim();
  const regex = /^\S{8,12}$/;
  if (!regex.test(password)) {
    main.formMessage.innerText =
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
  if (
    main.findDuplicateField(
      main.getTableDatas(userPhones),
      userPhoneInput.value,
      newPhoneIndex
    ) != undefined
  ) {
    main.formMessage.innerText = `Số điện thoại ${userPhoneInput.value} đã được đăng ký. Vui lòng kiểm tra lại!`;
    userPhoneInput.focus();
    return false;
  }
  if (isUpdate[0].value === "0") {
    alert("Thêm thông tin nhân viên thành công!");
  } else {
    alert("Cập nhật thông tin nhân viên thành công!");
  }
  return true;
}
function validateFormUserPassword() {
  if (!validatePassword()) return false;
  if (userConfirmPwdInput.value.trim() !== userPwdInput.value.trim()) {
    formMessage.innerText = "Mật khẩu không khớp. Vui lòng kiểm tra lại!";
    userConfirmPwdInput.focus();
    return false;
  }
  if (isUpdate[0].value === "0") {
    alert("Thêm thông tin nhân viên thành công!");
  } else {
    alert("Cập nhật thông tin nhân viên thành công!");
  }
  return true;
}
/*-------------Delete User-------------*/
/*
 * Delete Usera chỉ là xóa thông tin nhân viên khỏi HTML => dữ liệu trên DB vẫn còn
 * Set password cho nhân viên bị xóa là "" => không cho đăng nhập
 */
main.deleteBtns.forEach((deleteBtn, index) => {
  deleteBtn.onclick = () => {
    const userId = main.getTableDatas(userIds)[index],
      userName = main.getTableDatas(userNames)[index];
    deleteUser(userId, userName);
  };
});
function deleteUser(userId, userName) {
  const isDelete = confirm(
    `Bạn có muốn xoá thông tin nhân viên ${userName} không?`
  );
  if (isDelete) {
    $.post(
      "remove.php",
      {
        userId: userId,
      },
      function () {
        location.reload();
      }
    );
  }
}
