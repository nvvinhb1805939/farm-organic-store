/*==============================VARIABLES==============================*/
/*-------------Aside-------------*/
const asideElement = document.querySelector('.aside');
/*-------------Main-------------*/
const mainElement = document.querySelector('.main');
/*-------------Nav-------------*/
const navBarBtn = document.querySelector('.main-nav__btn'),
  avtElement = document.querySelector('.main-nav__avt'),
  navList = document.querySelector('.main-nav__list'),
  editBtns = document.querySelectorAll('.main__btn--edit'),
  deleteBtns = document.querySelectorAll('.main__btn--delete'),
  addBtn = document.querySelector('.main__btn--add');
/*-------------Table-------------*/
const userIds = document.querySelectorAll('.main-table__id'),
  userNames = document.querySelectorAll('.main-table__name'),
  userPhones = document.querySelectorAll('.main-table__phone'),
  userAddresses = document.querySelectorAll('.main-table__address'),
  userRoles = document.querySelectorAll('.main-table__role');
/*-------------Form-------------*/
const formModal = document.querySelector('.form__modal'),
  formWrapper = document.querySelector('.form__wrapper'),
  formHeading = document.querySelector('.form__heading'),
  formElements = document.querySelectorAll('.form'),
  formTabBtns = document.querySelectorAll('.form-tab__btn'),
  cancelBtns = document.querySelectorAll('.form__btn--cancel'),
  userIdInputs = document.querySelectorAll('.form__input[name="id"]'),
  userPhoneInput = document.querySelector('.form__input[name="phone"]'),
  userPwdInput = document.querySelector('.form__input[name="pwd"]'),
  userConfirmPwdInput = document.querySelector('.form__input[name="confirmPwd"]'),
  userNameInput = document.querySelector('.form__input[name="name"]'),
  userAddressInput = document.querySelector('.form__input[name="address"]'),
  userRoleInput = document.querySelector('.form__input[name="role"]');
/*==============================EVENTS & FUNCTIONS==============================*/
/*-------------Toggle Aside Element-------------*/
navBarBtn.onclick = () => {
  asideElement.classList.toggle('hide');
  mainElement.classList.toggle('ml-0');
}
/*-------------Toggle Nav List-------------*/
avtElement.onclick = (event) => {
  event.stopPropagation();
  navList.classList.toggle('appear');
}
navList.onclick = (event) => {
  event.stopPropagation();
}
window.onclick = () => {
  navList.classList.remove('appear');
}
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
  showModal('Thêm thông tin nhân viên');
}
editBtns.forEach((editBtn, index) => {
  editBtn.onclick = ('click', () => {
    showModal('Cập nhật thông tin nhân viên');
    loadTableDatasToForm(index)
  })
});
function showModal(heading) {
  formModal.classList.add('show');
  formHeading.innerText = heading;
}
/*-------------Close Form Modal-------------*/
formModal.onclick = () => {
  formModal.classList.remove('show');
  resetFormDatas();
};
formWrapper.onclick = (event) => {
  event.stopPropagation();
};
cancelBtns.forEach(cancelBtn => {
  cancelBtn.onclick = () => {
    formModal.classList.remove('show');
    resetFormDatas();
  }
});
function resetFormDatas() {
  setInputValues(userIdInputs, '');
  userPhoneInput.value = '';
  userPwdInput.value = '';
  userConfirmPwdInput.value = '';
  userNameInput.value = '';
  userAddressInput.value = '';
  userRoleInput.value = '';
}
/*-------------Switch Form Tabpane-------------*/
formTabBtns.forEach((formTabBtn, index) => {
  formTabBtn.onclick = () => {
    document.querySelector('.form-tab__btn.active').classList.remove('active');
    formTabBtn.classList.add('active');
    document.querySelector('.form.show').classList.remove('show');
    formElements[index].classList.add('show');
  }
});