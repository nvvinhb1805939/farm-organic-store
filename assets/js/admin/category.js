/*==============================IMPORT==============================*/
import * as main from "./main.js";
/*==============================VARIABLES==============================*/
/*-------------Table-------------*/
const categoryIds = document.querySelectorAll(".main-table__id"),
  categoryNames = document.querySelectorAll(".main-table__name");
let newNameIndex = 0;
/*-------------Form-------------*/
const formElement = document.querySelector(".form"),
  cancelBtn = document.querySelector(".form__btn--cancel"),
  categoryIdInput = document.querySelector('.form__input[name="id"]'),
  isUpdate = document.querySelector('.form__input[name="isUpdate"]'),
  categoryNameInput = document.querySelector('.form__input[name="name"]');
/*==============================EVENTS & FUNCTIONS==============================*/
/*-------------Load Data From Table To Form Modal When Edit-------------*/
function loadTableDatasToForm(index) {
  categoryIdInput.value = main.getTableDatas(categoryIds)[index];
  categoryNameInput.value = main.getTableDatas(categoryNames)[index];
}
/*-------------Open Form Modal-------------*/
main.addBtn.onclick = () => {
  main.showModal("Thêm danh mục sản phẩm");
  formElement.classList.add("show");
  isUpdate.value = 0;
  newNameIndex = -1;
};
main.editBtns.forEach((editBtn, index) => {
  editBtn.onclick = () => {
    main.showModal("Cập nhật danh mục sản phẩm");
    loadTableDatasToForm(index);
    formElement.classList.add("show");
    isUpdate.value = 1;
    newNameIndex = index;
  };
});
/*-------------Close Form Modal-------------*/
cancelBtn.onclick = () => {
  closeFormModal();
};
main.formModal.onclick = () => {
  closeFormModal();
};
main.formWrapper.onclick = event => {
  event.stopPropagation();
};
function resetFormDatas() {
  categoryIdInput.value = "";
  categoryNameInput.value = "";
}
function closeFormModal() {
  main.formModal.classList.remove("show");
  resetFormDatas();
  main.formMessage.innerText = "";
}
/*-------------Form Validation-------------*/
formElement.onsubmit = () => validateFormCategoryInfo();
function validateName() {
  const name = categoryNameInput.value.trim();
  const regex = /^[A-Za-z\s]+$/;
  if (!regex.test(main.replaceVietnameseLettersToLatin(name))) {
    main.formMessage.innerText =
      "Tên danh mục chỉ chứa tối đa 50 ký tự gồm chữ cái, khoảng trắng và được bắt đầu bằng chữ cái!";
    categoryNameInput.focus();
    return false;
  } else return true;
}
function validateFormCategoryInfo() {
  if (!validateName()) return false;
  if (
    main.findDuplicateField(
      main.getTableDatas(categoryNames),
      categoryNameInput.value.trim(),
      newNameIndex
    ) != undefined
  ) {
    main.formMessage.innerText = `Danh mục ${categoryNameInput.value} đã được đăng ký. Vui lòng kiểm tra lại!`;
    categoryNameInput.focus();
    return false;
  }
  if (isUpdate.value === "0") {
    alert("Thêm danh mục thành công!");
  } else {
    alert("Cập nhật danh mục thành công!");
  }
  return true;
}
/*-------------Delete Category-------------*/
main.deleteBtns.forEach((deleteBtn, index) => {
  deleteBtn.onclick = () => {
    const categoryId = main.getTableDatas(categoryIds)[index],
      categoryName = main.getTableDatas(categoryNames)[index];
    deleteCategory(categoryId, categoryName);
  };
});
function deleteCategory(categoryId, categoryName) {
  const isDelete = confirm(
    `Bạn có muốn xoá thông tin danh mục ${categoryName} không?`
  );
  if (isDelete) {
    $.post(
      "remove.php",
      {
        categoryId: categoryId,
      },
      function () {
        location.reload();
      }
    );
  }
}
