<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ Hàng</title>
  <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/user/cart.css">
</head>

<body>
  <header class="header">
    <div class="header__container container flex">
      <a href="./index.php" class="logo">
        <img src="./assets/img/logo.png" alt="" class="logo__img" />
      </a>
      <nav class="header-nav">
        <a href="./index.php" class="header-nav__link">Trang Chủ</a>
        <a href="./category.php" class="header-nav__link">Sản Phẩm</a>
        <a href="./cart.php" class="header-nav__link active">Giỏ Hàng</a>
        <a href="./checkout.php" class="header-nav__link">Thanh Toán</a>
      </nav>
      <div class="header__user flex">
        <form action="./search.php" class="header__form flex" method="post">
          <input
            class="header__input"
            type="text"
            placeholder="Tìm kiếm sản phẩm"
          />
          <button class="header__btn search btn">
            <ion-icon name="search-outline" class="header__icon search"></ion-icon>
          </button>
        </form>
        <div class="header-cart" data-quantity="2">
          <button class="header__btn cart btn">
            <ion-icon name="cart-outline" class="header__icon cart"></ion-icon>
          </button>
          <div class="header-cart__wrapper">
            <div class="header-cart__header">
              <h5 class="header-cart__h5">
                <span class="header-cart__amount">2</span>
                Sản Phẩm Trong Giỏ Hàng
              </h5>
              <h6 class="header-cart__h6">
                Tổng Cộng:
                <span class="header-cart__total">45000</span>
              </h6>
            </div>
            <ul class="heeader-cart__list">
              <li class="header-cart__item flex" data-price="30000">
                <div class="header-cart__left">
                  <a href="#" class="img-link">
                    <img
                      src="./assets/img/product_orange.png"
                      alt="img"
                      class="img-link__img"
                    />
                  </a>
                </div>
                <div class="header-cart__right">
                  <h6 class="header-cart__name header-cart__h6">
                    <a href="#">Cam</a>
                  </h6>
                  <div class="header-cart__control flex">
                    <button class="header-cart__btn decrease btn">
                      <ion-icon name="remove-outline"></ion-icon>
                    </button>
                    <span class="header-cart__number header-cart__quantity"
                      >1</span
                    >
                    <button class="header-cart__btn increase btn">
                      <ion-icon name="add-outline"></ion-icon>
                    </button>
                    <span class="header-cart__number header-cart__price"
                      >30000</span
                    >
                  </div>
                </div>
              </li>
              <li class="header-cart__item flex" data-price="15000">
                <div class="header-cart__left">
                  <a href="#" class="img-link">
                    <img
                      src="./assets/img/product_banana--mini.png"
                      alt="img"
                      class="img-link__img"
                    />
                  </a>
                </div>
                <div class="header-cart__right">
                  <h6 class="header-cart__name header-cart__h6">
                    <a href="#">Chuối</a>
                  </h6>
                  <div class="header-cart__control flex">
                    <button class="header-cart__btn decrease btn">
                      <ion-icon name="remove-outline"></ion-icon>
                    </button>
                    <span class="header-cart__number header-cart__quantity"
                      >1</span
                    >
                    <button class="header-cart__btn increase btn">
                      <ion-icon name="add-outline"></ion-icon>
                    </button>
                    <span class="header-cart__number header-cart__price"
                      >15000</span
                    >
                  </div>
                </div>
              </li>
            </ul>
            <div class="header-cart__bottom flex">
              <a href="./cart.php" class="header-cart__click view"
                >Giỏ Hàng</a
              >
              <a href="./checkout.php" class="header-cart__click checkout"
                >Thanh Toán</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section class="hero mt-header" style="background-image: url('./assets/img/product_hero.jpg');">
    <h2 class="hero__heading heading-2">Giỏ Hàng</h2>
  </section>
  <main class="cart container">
    <table class="cart__table">
      <thead>
        <tr>
          <th>Tên Sản Phẩm</th>
          <th>Giá</th>
          <th>Số Lượng</th>
          <th>Tổng Cộng</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <a class="cart__link" href="./single-product.php">
              <img src="./assets/img/product_banana--mini.png" alt="img" width="146" height="132">
            </a>
            <a class="cart_link" href="./single-product.php">Cam</a>
          </td>
          <td>30.000</td>
          <td>

          </td>
          <td>$20</td>
        </tr>
        <tr>
          <td><a class="table-cart-figure" href="single-product.html"><img src="images/product-mini-5-146x132.png" alt="" width="146" height="132"></a><a class="table-cart-link" href="single-product.html">Bananas</a></td>
          <td>$23.00</td>
          <td>
            <div class="table-cart-stepper">
              <div class="stepper "><input class="form-input stepper-input" type="number" data-zeros="true" value="1" min="1" max="1000"><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
            </div>
          </td>
          <td>$23</td>
        </tr>
      </tbody>
    </table>
  </main>
  <footer class="footer">
    <div class="footer__top container grid">
      <div class="footer__schedule">
        <a href="./index.php" class="logo">
          <img class="" src="./assets/img/logo.png" alt="logo__img" />
        </a>
        <div class="footer__time">
          <p class="footer__date">Thứ Hai - Thứ Sáu: 08:00am - 08:00pm</p>
          <p class="footer__date">Ngày Cuối Tuần: 10:00am - 06:00pm</p>
        </div>
      </div>
      <div class="footer__contact">
        <h4 class="footer__heading">Liên Hệ</h4>
        <ul class="footer__list">
          <li class="footer__item flex">
            <ion-icon name="location-outline" class="footer__icon"></ion-icon>
            3/2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam
          </li>
          <li class="footer__item flex">
            <ion-icon name="call-outline" class="footer__icon"></ion-icon>
            <a href="tel:0123 456 789" class="footer__link">0123 456 789</a>
          </li>
          <li class="footer__item flex">
            <ion-icon name="mail-outline" class="footer__icon""></ion-icon>
            <a
              href="mailto:farmorganicstore@gmail.com.vn"
              class="footer__link"
              >farmorganicstore@gmail.com.vn</a
            >
          </li>
        </ul>
      </div>
    </div>
    <div class="footer__bottom">
      <p class="footer__copyright">© 2021 Farm. All rights reserved.</p>
    </div>
  </footer>
  <a href="#" class="scroll-btn btn circle-btn appear">
    <ion-icon name="arrow-up-outline" class="scroll__icon"></ion-icon>
  </a>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="./assets/js/user/main.js"></script>

</body>

</html>