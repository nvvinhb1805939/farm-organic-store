/*==============================VARIABLES==============================*/
/*-------------Header-------------*/
const header = document.querySelector(".header"),
  cart = document.querySelector(".header-cart"),
  cartIcon = document.querySelector(".header__icon.cart"),
  cartWrapper = document.querySelector(".header-cart__wrapper"),
  cartHeader = document.querySelector(".header-cart__header"),
  cartBottom = document.querySelector(".header-cart__bottom"),
  amountLabel = document.querySelector(".header-cart__amount"),
  totalLabel = document.querySelector(".header-cart__total"),
  cartList = document.querySelector(".header-cart__list");
/*-------------Scroll Btn-------------*/
const scrollBtn = document.querySelector(".scroll-btn");
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
/*-------------Toggle Scroll Btn When Scroll Page-------------*/
document.onscroll = () => {
  window.scrollY >= 500
    ? scrollBtn.classList.remove("appear")
    : scrollBtn.classList.add("appear");
};
/*-------------Handle Quantity Items-------------*/
function handleQuantityItems(index, isIncrease) {
  const products = JSON.parse(localStorage.getItem("products"));
  if (products) {
    if (!isIncrease) {
      if (products[index].quantity == 1) {
        const isDel = confirm(
          "Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?"
        );
        if (!isDel) {
          return;
        } else {
          products.splice(index, 1);
        }
      } else {
        products[index].price -=
          products[index].price / products[index].quantity;
        products[index].quantity--;
      }
    } else {
      products[index].price += products[index].price / products[index].quantity;
      products[index].quantity++;
    }
    if (products.length == 0) {
      setEmptyCart(cartList);
      handleEmptyCart();
      setQuantityCart(products, cart);
      localStorage.removeItem("products");
    } else {
      localStorage.setItem("products", JSON.stringify(products));
      getHtml(products);
      setData(products);
    }
  }
}
/*-------------Load Data From Local Storage to Cart-------------*/
window.addEventListener("load", () => {
  const products = JSON.parse(localStorage.getItem("products"));
  if (products != null && products.length != 0) {
    handleHasCartItem(products);
    getHtml(products);
    setData(products);
  } else {
    setEmptyCart(cartList);
    handleEmptyCart();
  }
});
function getHtml(products) {
  cartList.innerHTML = "";
  products.forEach((product, index) => {
    cartList.innerHTML += `
      <li class="header-cart__item flex" data-price="${product.price}">
        <input class="header-cart__item-id" name="product-id" type="hidden" value="${
          product.id
        }">
        <div class="header-cart__left">
          <a href="./detail.php?id=${product.id}" class="img-link">
            <img
              src="${product.url}"
              alt="img"
              class="img-link__img"
            />
          </a>
        </div>
        <div class="header-cart__right">
          <h6 class="header-cart__name header-cart__h6">
            <a href="./detail.php?id=${product.id}">${product.name}</a>
          </h6>
          <div class="header-cart__control flex">
            <button onclick="handleQuantityItems(${index}, false);" class="header-cart__btn decrease btn">
              <ion-icon name="remove-outline"></ion-icon>
            </button>
            <span class="header-cart__number header-cart__quantity"
              >${product.quantity}</span
            >
            <button onclick="handleQuantityItems(${index}, true);" class="header-cart__btn increase btn">
              <ion-icon name="add-outline"></ion-icon>
            </button>
            <span class="header-cart__number header-cart__price"
              >${product.price.toLocaleString("it-IT", {
                style: "currency",
                currency: "VND",
              })}</span
            >
          </div>
        </div>
      </li>
    `;
  });
}
function setEmptyCart(cartList) {
  cartList.innerHTML = `
    <li class="header-cart__item flex center empty">
      <img class="header-cart__img" src="./assets/img/empty_cart.png" alt="img">
      <p class="header-cart__message">
        Chưa có sản phẩm trong giỏ hàng.
        <br>
        Vui lòng chọn sản phẩm để thanh toán!
      </p>
    </li>
  `;
}
function handleEmptyCart() {
  cartHeader.remove();
  cartBottom.remove();
}
function handleHasCartItem(products) {
  if (products.length > 0) {
    cartWrapper.insertBefore(cartHeader, cartList);
    insertAfter(cartBottom, cartList);
  }
}
function insertAfter(newNode, existingNode) {
  existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
}
function setQuantityCart(products, cart) {
  cart.dataset.quantity = products.length;
}
function setAmountProduct(products, amountLabel) {
  amountLabel.innerText = products.length;
}
function setTotalPrice(products, totalLabel) {
  let price = 0;
  products.forEach(product => {
    price += product.price;
  });
  totalLabel.innerText = price.toLocaleString("it-IT", {
    style: "currency",
    currency: "VND",
  });
}
function setData(products) {
  setQuantityCart(products, cart);
  setAmountProduct(products, amountLabel);
  setTotalPrice(products, totalLabel);
}
