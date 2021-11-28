/*==============================VARIABLES==============================*/
const productQuantity = document.querySelector(".product__quantity"),
  increaseBtn = document.querySelector(".product__input-btn.increase"),
  decreaseBtn = document.querySelector(".product__input-btn.decrease"),
  addBtn = document.querySelector(".product__btn");

/*==============================EVENTS & FUNCTIONS==============================*/
increaseBtn.addEventListener("click", () => {
  let quantity = productQuantity.innerHTML;
  productQuantity.innerHTML = ++quantity;
  if (quantity > 1 && document.querySelector(".product__input-btn.disable")) {
    document
      .querySelector(".product__input-btn.disable")
      .classList.remove("disable");
  }
});
decreaseBtn.addEventListener("click", () => {
  let quantity = productQuantity.innerHTML;
  productQuantity.innerHTML = --quantity;
  if (quantity === 1) {
    decreaseBtn.classList.add("disable");
  }
});
/*---------Create Shopping Cart LocalStorage---------*/
addBtn.onclick = () => {
  addItem();
  const items = JSON.parse(localStorage.getItem("products"));
  getHtml(items);
  handleHasCartItem(items);
  alert("Đã thêm sản phẩm vào giỏ hàng!");
  setData(items);
};
function addItem() {
  const id = document.querySelector(".product__id").value,
    url = document.querySelector(".product__img").src,
    name = document.querySelector(".product__name").innerText,
    price = parseInt(document.querySelector(".product__price-input").value),
    quantity = parseInt(document.querySelector(".product__quantity").innerText);
  const product = {
    id: id,
    url: url,
    name: name,
    price: price * quantity,
    quantity: quantity,
  };
  let products = [];
  if (localStorage.getItem("products")) {
    products = JSON.parse(localStorage.getItem("products"));
  }
  const existingProduct = products.find(
    productItem => productItem.id == product.id
  );
  if (existingProduct) {
    const index = products.indexOf(existingProduct);
    products[index].quantity += product.quantity;
    products[index].price += product.price;
  } else {
    products.push(product);
  }
  localStorage.setItem("products", JSON.stringify(products));
}
