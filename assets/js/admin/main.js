/*==============================VARIABLES==============================*/
/*-------------Aside-------------*/
const asideElement = document.querySelector(".aside"),
  editBtns = document.querySelectorAll(".main__btn--edit"),
  deleteBtns = document.querySelectorAll(".main__btn--delete"),
  addBtn = document.querySelector(".main__btn--add");
/*-------------Main-------------*/
const mainElement = document.querySelector(".main");
/*-------------Nav-------------*/
const navBarBtn = document.querySelector(".main-nav__btn"),
  navBarIcon = document.querySelector(".main-nav__icon"),
  avtElement = document.querySelector(".main-nav__avt"),
  navList = document.querySelector(".main-nav__list");
/*-------------Form-------------*/
const formModal = document.querySelector(".form__modal"),
  formWrapper = document.querySelector(".form__wrapper"),
  formHeading = document.querySelector(".form__heading"),
  formMessage = document.querySelector(".form__message");
/*==============================EVENTS & export FUNCTIONS==============================*/
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
/*-------------Get Table Datas-------------*/
export function getTableDatas(userFields) {
  const tableDatas = [];
  userFields.forEach(userField => {
    tableDatas.push(userField.innerText);
  });
  return tableDatas;
}
/*-------------Set Input Values-------------*/
export function setInputValues(inputFields, value) {
  inputFields.forEach(inputField => {
    inputField.value = value;
  });
}
/*-------------Show Modal-------------*/
export function showModal(heading) {
  formModal.classList.add("show");
  formHeading.innerText = heading;
}
/*-------------Replace Vietnamese Letters To Latin-------------*/
export function replaceVietnameseLettersToLatin(str) {
  str = str.toLowerCase();
  str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "a");
  str = str.replace(/??|??|???|???|???|??|???|???|???|???|???/g, "e");
  str = str.replace(/??|??|???|???|??/g, "i");
  str = str.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/g, "o");
  str = str.replace(/??|??|???|???|??|??|???|???|???|???|???/g, "u");
  str = str.replace(/???|??|???|???|???/g, "y");
  str = str.replace(/??/g, "d");
  return str;
}
/*-------------Find Duplicate Table Field-------------*/
export function findDuplicateField(currentFields, newField, newIndex) {
  return currentFields.find((currentField, index) => {
    return currentField == newField && index != newIndex;
  });
}
/*==============================EXPORT==============================*/
/*-------------Aside-------------*/
export { asideElement };
/*-------------Main-------------*/
export { mainElement, editBtns, addBtn, deleteBtns };
/*-------------Nav-------------*/
export { navBarBtn, navBarIcon, avtElement, navList };
/*-------------Form-------------*/
export { formModal, formWrapper, formHeading, formMessage };
