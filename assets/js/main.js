/*==============================VARIABLES==============================*/
/*-------------Header-------------*/
const header = document.querySelector(".header"),
  cart = document.querySelector(".header-cart"),
  cartIcon = document.querySelector(".header__icon.cart"),
  cartWrapper = document.querySelector(".header-cart__wrapper"),
  amountLabel = document.querySelector(".header-cart__amount"),
  totalLabel = document.querySelector(".header-cart__total"),
  items = document.querySelectorAll(".header-cart__item"),
  quantityItems = document.querySelectorAll(".header-cart__quantity"),
  descreaseBtns = document.querySelectorAll(".header-cart__btn.decrease"),
  increaseBtns = document.querySelectorAll(".header-cart__btn.increase"),
  priceLabels = document.querySelectorAll(".header-cart__price");
let amountItems = items.length;

/*==============================EVENT LISTENERS & FUNCTIONS==============================*/
/*-------------Toggle Cart Wrapper-------------*/
cart.onclick = e => {
  e.stopPropagation();
};
cartIcon.onclick = e => {
  cartWrapper.classList.toggle("show");
};
window.onclick = () => {
  cartWrapper.classList.remove("show");
};
/*-------------Handle Quantity Items-------------*/
descreaseBtns.forEach((descreaseBtn, index) => {
  descreaseBtn.onclick = () => {
    handleQuantityItems(index, false);
  };
});
increaseBtns.forEach((increaseBtn, index) => {
  increaseBtn.onclick = () => {
    handleQuantityItems(index, true);
  };
});
function handleQuantityItems(index, isIncrease) {
  let quantityItem = Number(quantityItems[index].innerText);
  let price = Number(priceLabels[index].innerText);
  if (!isIncrease) {
    if (quantityItem == 1) {
      const isDel = confirm("Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?");
      if (!isDel) {
        return;
      } else {
        items[index].remove();
        amountItems--;
      }
    }
    price -= Number(items[index].dataset.price);
    quantityItem--;
  } else {
    price += Number(items[index].dataset.price);
    quantityItem++;
  }
  quantityItems[index].innerText = quantityItem;
  priceLabels[index].innerText = price;
  cart.setAttribute("data-quantity", amountItems);
  totalLabel.innerText = getTotalPrice();
  amountLabel.innerText = amountItems;
}
function getTotalPrice() {
  let price = 0;
  priceLabels.forEach(priceLabel => {
    price += Number(priceLabel.innerText);
  });
  return price;
}
