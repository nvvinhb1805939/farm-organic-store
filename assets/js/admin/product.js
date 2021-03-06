/*==============================IMPORT==============================*/
import * as main from "./main.js";
/*==============================VARIABLES==============================*/
/*-------------Table-------------*/
const productIds = document.querySelectorAll(".main-table__id"),
  productNames = document.querySelectorAll(".main-table__name"),
  productDescs = document.querySelectorAll(".main-table__desc"),
  productPrices = document.querySelectorAll(".main-table__price"),
  productQuantities = document.querySelectorAll(".main-table__quantity"),
  productCategories = document.querySelectorAll(".main-table__category"),
  productImgs = document.querySelectorAll(".main-table__img");
let newProductIndex = 0;
/*-------------Form-------------*/
const formElement = document.querySelector(".form"),
  cancelBtn = document.querySelector(".form__btn--cancel"),
  productIdInput = document.querySelector('.form__input[name="id"]'),
  isUpdate = document.querySelector('.form__input[name="isUpdate"]'),
  productNameInput = document.querySelector('.form__input[name="name"]'),
  productCategorySelect = document.querySelector(
    '.form__input[name="category_id"]'
  ),
  productDescInput = document.querySelector(".form__desc"),
  productPriceInput = document.querySelector('.form__input[name="price"]'),
  productQuantityInput = document.querySelector(
    '.form__input[name="quantity"]'
  ),
  productImgInput = document.querySelector(".form__file"),
  formImg = document.querySelector(".form__img"),
  productUrlInput = document.querySelector('.form__input[name="url"]');
/*==============================EVENTS & FUNCTIONS==============================*/
/*-------------Change Img When Change Img File-------------*/
productImgInput.onchange = event => {
  const path = "../../assets/img/";
  const fileName = event.target.value.split("\\").pop();
  const dataUrl = `${path}${fileName}`;
  formImg.src = dataUrl;
  productUrlInput.value = dataUrl;
};
/*-------------Load Data From Table To Form Modal When Edit-------------*/
function formatMoneyToInt(tableData) {
  const money = tableData.slice(0, tableData.length - 4).trim();
  const num = money.replace(/\./g, "");
  return num;
}
function getSelectedIndex(tableData) {
  const childrenLength = productCategorySelect.children.length;
  for (let index = 1; index < childrenLength; index++) {
    if (productCategorySelect.children[index].outerText == tableData) {
      return index;
    }
  }
  return 0;
}
function getUrlImg(imgs) {
  const urls = [];
  imgs.forEach(img => {
    urls.push(img.src);
  });
  return urls;
}
function loadTableDatasToForm(index) {
  productIdInput.value = main.getTableDatas(productIds)[index];
  productNameInput.value = main.getTableDatas(productNames)[index];
  productDescInput.value = main.getTableDatas(productDescs)[index];
  productPriceInput.value = formatMoneyToInt(
    main.getTableDatas(productPrices)[index]
  );
  productQuantityInput.value = main.getTableDatas(productQuantities)[index];
  productCategorySelect.selectedIndex = getSelectedIndex(
    main.getTableDatas(productCategories)[index]
  );
  productUrlInput.value = getUrlImg(productImgs)[index];
  formImg.src = getUrlImg(productImgs)[index];
}
/*-------------Open Form Modal-------------*/
main.addBtn.onclick = () => {
  main.showModal("Th??m s???n ph???m");
  formElement.classList.add("show");
  isUpdate.value = 0;
  newProductIndex = -1;
};
main.editBtns.forEach((editBtn, index) => {
  editBtn.onclick = () => {
    main.showModal("C???p nh???t s???n ph???m");
    loadTableDatasToForm(index);
    formElement.classList.add("show");
    isUpdate.value = 1;
    newProductIndex = index;
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
  productIdInput.value = "";
  productNameInput.value = "";
  productDescInput.value = "";
  productPriceInput.value = "";
  productQuantityInput.value = "";
  productCategorySelect.selectedIndex = 0;
  formImg.src = "";
  productImgInput.value = "";
  productUrlInput.value = "";
}
function closeFormModal() {
  main.formModal.classList.remove("show");
  resetFormDatas();
  main.formMessage.innerText = "";
}
/*-------------Form Validation-------------*/
formElement.onsubmit = () => validateFormProductInfo();
function validateName() {
  const name = productNameInput.value.trim();
  const regex = /^[A-Za-z\s]+$/;
  if (!regex.test(main.replaceVietnameseLettersToLatin(name))) {
    main.formMessage.innerText =
      "T??n s???n ph???m ch??? ch???a t???i ??a 50 k?? t??? g???m ch??? c??i, kho???ng tr???ng v?? ???????c b???t ?????u b???ng ch??? c??i!";
    productNameInput.focus();
    return false;
  } else return true;
}
function validateCategory() {
  if (productCategorySelect.selectedIndex == 0) {
    main.formMessage.innerText = "Vui l??ng ch???n danh m???c s???n ph???m!";
    return false;
  } else return true;
}
function validatePrice() {
  const price = productPriceInput.value.trim();
  const regex = /^[1-9]+[0-9]{3,}$/;
  if (!regex.test(price)) {
    main.formMessage.innerText =
      "Gi?? s???n ph???m g???m ??t nh???t 4 s??? v?? kh??ng ???????c b???t ?????u b???ng s??? 0!";
    productPriceInput.focus();
    return false;
  } else return true;
}
function validateQuantity() {
  const quantity = productQuantityInput.value.trim();
  const regex = /^[1-9]+[0-9]*$/;
  if (!regex.test(quantity)) {
    main.formMessage.innerText =
      "S??? l?????ng g???m ??t nh???t 1 s??? v?? kh??ng ???????c b???t ?????u b???ng s??? 0!";
    productQuantityInput.focus();
    return false;
  } else return true;
}
// function validateImg() {
//   const regex = /^\.\.\/\.\.\/assets\/img\/\w+\.png$/;
//   if (
//     false
//     // productUrlInput.value == "".trim() ||
//     // productUrlInput.value ==
//     //   "http://localhost:8080/b1805939_NVV/assets/img/".trim() ||
//     // productUrlInput.value == "../../assets/img/".trim()
//   ) {
//     main.formMessage.innerText = "Vui l??ng ch???n h??nh ???nh!";
//     productImgInput.focus();
//     return false;
//   } else {
//     return true;
//   }
// }
function validateFormProductInfo() {
  if (!validateName()) return false;
  if (!validateCategory()) return false;
  if (!validatePrice()) return false;
  if (!validateQuantity()) return false;
  // if (!validateImg()) return false;
  if (
    main.findDuplicateField(
      main.getTableDatas(productNames),
      productNameInput.value.trim(),
      newProductIndex
    ) != undefined
  ) {
    main.formMessage.innerText = `S???n ph???m ${productNameInput.value} ???? ???????c ????ng k??. Vui l??ng ki???m tra l???i!`;
    productNameInput.focus();
    return false;
  }
  if (isUpdate.value === "0") {
    alert("Th??m s???n ph???m th??nh c??ng!");
  } else {
    alert("C???p nh???t s???n ph???m th??nh c??ng!");
  }
  return true;
}
/*-------------Delete Product-------------*/
main.deleteBtns.forEach((deleteBtn, index) => {
  deleteBtn.onclick = () => {
    const productId = main.getTableDatas(productIds)[index],
      productName = main.getTableDatas(productNames)[index];
    deleteProduct(productId, productName);
  };
});
function deleteProduct(productId, productName) {
  const isDelete = confirm(`B???n c?? mu???n xo?? s???n ph???m ${productName} kh??ng?`);
  if (isDelete) {
    $.post(
      "remove.php",
      {
        productId: productId,
      },
      function () {
        location.reload();
      }
    );
  }
}
