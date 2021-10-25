<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Farm Organic Store</title>
  <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/user/index.css">
</head>

<body>
  <header class="header">
    <div class="header__container container flex">
      <a href="./index.php" class="logo">
        <img src="./assets/img/logo.png" alt="" class="logo__img">
      </a>
      <nav class="header-nav">
        <a href="./index.php" class="header-nav__link active">Trang Chủ</a>
        <a href="./category.php" class="header-nav__link">Sản Phẩm</a>
        <a href="./cart.php" class="header-nav__link">Giỏ Hàng</a>
        <a href="./checkout.php" class="header-nav__link">Thanh Toán</a>
      </nav>
      <div class="header__user flex">
        <form action="./search.php" class="header__form flex" method="post">
          <input class="header__input" type="text" placeholder="Tìm kiếm sản phẩm">
          <button class="header__btn search">
            <i class="far fa-search header__icon search"></i>
          </button>
        </form>
        <div class="header-cart" data-quantity="2">
          <button class="header__btn cart">
            <i class="far fa-shopping-cart header__icon cart"></i>
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
                    <img src="./assets/img/product_orange.png" alt="img" class="img-link__img">
                  </a>
                </div>
                <div class="header-cart__right">
                  <h6 class="header-cart__name header-cart__h6">
                    <a href="#">Cam</a>
                  </h6>
                  <div class="header-cart__control flex">
                    <button class="header-cart__btn decrease">
                      <i class="fal fa-minus"></i>
                    </button>
                    <span class="header-cart__number header-cart__quantity">1</span>
                    <button class="header-cart__btn increase">
                      <i class="fal fa-plus"></i>
                    </button>
                    <span class="header-cart__number header-cart__price">30000</span>
                  </div>
                </div>
              </li>
              <li class="header-cart__item flex" data-price="15000">
                <div class="header-cart__left">
                  <a href="#" class="img-link">
                    <img src="./assets/img/product_banana--mini.png" alt="img" class="img-link__img">
                  </a>
                </div>
                <div class="header-cart__right">
                  <h6 class="header-cart__name header-cart__h6">
                    <a href="#">Chuối</a>
                  </h6>
                  <div class="header-cart__control flex">
                    <button class="header-cart__btn decrease">
                      <i class="fal fa-minus"></i>
                    </button>
                    <span class="header-cart__number header-cart__quantity">1</span>
                    <button class="header-cart__btn increase">
                      <i class="fal fa-plus"></i>
                    </button>
                    <span class="header-cart__number header-cart__price">15000</span>
                  </div>
                </div>
              </li>
            </ul>
            <div class="header-cart__bottom flex">
              <a href="./cart.php" class="header-cart__click view">Giỏ Hàng</a>
              <a href="./checkout.php" class="header-cart__click checkout">Thanh Toán</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section class="slider mt-header flex">
    <div class="slider__item" style="background-image: url('./assets/img/slider1.jpg');">
      <div class="slider__header">
        <h4 class="slider__subheading heading-4">Chào mừng đến với Farm Organic Store</h4>
        <h1 class="slider__heading">Sản Phẩm</h1>
        <h3 class="slider__slogan">Tăng Trưởng Gắn Liền Với Tình Yêu</h3>
      </div>
      <a href="./category.php" class="slider__link">Mua Ngay</a>
    </div>
    <div class="slider__item" style="background-image: url('./assets/img/slider2.jpg');">
      <div class="slider__header">
        <h4 class="slider__subheading heading-4">Sản phẩm hữu cơ chất lượng cao</h4>
        <h1 class="slider__heading">Rau Củ</h1>
        <h3 class="slider__slogan">Không Chất Phụ Gia Có Hại</h3>
      </div>
      <a href="./category.php" class="slider__link">Mua Ngay</a>
    </div>
    <div class="slider__item" style="background-image: url('./assets/img/slider3.jpg');">
      <div class="slider__header">
        <h4 class="slider__subheading heading-4">Sản phẩm hữu cơ tươi</h4>
        <h1 class="slider__heading">Trái Cây</h1>
        <h3 class="slider__slogan">Với Nhiều Vitamin</h3>
      </div>
      <a href="./category.php" class="slider__link">Mua Ngay</a>
    </div>
    <button class="slider__btn slider__btn--prev btn__redirect disable">
      <i class="far fa-angle-left slider__icon"></i>
    </button>
    <button class="slider__btn slider__btn--next btn__redirect">
      <i class="far fa-angle-right slider__icon"></i>
    </button>
  </section>
  <section class="product container">
    <div class="product__header">
      <h4 class="product__subheading heading-4">Hàng Mới Nhất</h4>
      <h2 class="product__heading heading-2">Sản Phẩm Mới</h2>
    </div>
    <div class="product__list grid">
      <div class="product__item flex">
        <span class="product__label product__label--sale">Sale</span>
        <img src="./assets/img/product_banana.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
      <div class="product__item flex">
        <span class="product__label product__label--new">New</span>
        <img src="./assets/img/product_bread.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
      <div class="product__item flex">
        <span class="product__label product__label--sale">Sale</span>
        <img src="./assets/img/product_bread.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
      <div class="product__item flex">
        <span class="product__label product__label--sale">Sale</span>
        <img src="./assets/img/product_bread.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
      <div class="product__item flex">
        <span class="product__label product__label--sale">Sale</span>
        <img src="./assets/img/product_bread.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
      <div class="product__item flex">
        <span class="product__label product__label--sale">Sale</span>
        <img src="./assets/img/product_bread.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
      <div class="product__item flex">
        <span class="product__label product__label--sale">Sale</span>
        <img src="./assets/img/product_bread.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
      <div class="product__item flex">
        <span class="product__label product__label--sale">Sale</span>
        <img src="./assets/img/product_bread.png" alt="img" class="product__img">
        <div class="product__content">
          <h5 class="product__name">Chuối</h5>
          <div class="product-price__container">
            <span class="product__price--old">20.000</span>
            <span class="product__price--new">15.000</span>
          </div>
        </div>
        <a href="#" class="product__btn">
          <i class="far fa-search product__icon search"></i>
        </a>
      </div>
    </div>
    <a href="./category.php" class="product__link">
      Xem Thêm
      <i class="far fa-angle-right product__icon more"></i>
    </a>
  </section>
  <footer class="footer">
    <div class="footer__top container grid">
      <div class="footer__schedule">
        <a href="./index.php" class="logo">
          <img class="" src="./assets/img/logo.png" alt="logo__img">
        </a>
        <div class="footer__time">
          <p class="footer__date">Thứ Hai - Thứ Sáu: 08:00am - 08:00pm</p>
          <p class="footer__date">Ngày Cuối Tuần: 10:00am - 06:00pm</p>
        </div>
      </div>
      <div class="footer__contact">
        <h4 class="footer__heading">Liên Hệ</h4>
        <ul class="footer__list">
          <li class="footer__item">
            <i class="fas fa-map-marker-alt footer__icon"></i>
            3/2, Xuân Khánh, Ninh Kiều, Cần Thơ, Việt Nam
          </li>
          <li class="footer__item">
            <i class="fas fa-phone-alt footer__icon"></i>
            <a href="tel:0123 456 789" class="footer__link">0123 456 789</a>
          </li>
          <li class="footer__item">
            <i class="fas fa-envelope footer__icon"></i>
            <a href="mailto:farmorganicstore@gmail.com.vn" class="footer__link">farmorganicstore@gmail.com.vn</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer__bottom">
      <p class="footer__copyright">© 2021 Farm. All rights reserved.</p>
    </div>
  </footer>
  <a href="#" class="scroll-btn appear">
    <i class="fal fa-arrow-up scroll__icon"></i>
  </a>

  <script src="./assets/js/main.js"></script>
  <script src="./assets/js/slider.js"></script>
</body>

</html>