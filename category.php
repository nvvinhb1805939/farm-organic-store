<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản Phẩm</title>
  <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/category.css">
</head>

<body>
  <header class="header">
    <div class="header__container container flex">
      <a href="./index.php" class="logo">
        <img src="./assets/img/logo.png" alt="" class="logo__img">
      </a>
      <nav class="header-nav">
        <a href="./index.php" class="header-nav__link">Trang Chủ</a>
        <a href="./category.php" class="header-nav__link active">Sản Phẩm</a>
        <a href="./cart.php" class="header-nav__link">Giỏ Hàng</a>
        <a href="./checkout.php" class="header-nav__link">Thanh Toán</a>
        <a href="./contact.php" class="header-nav__link">Liên Hệ</a>
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
  <section class="hero mt-header" style="background-image: url('./assets/img/product_hero.jpg');">
    <h2 class="hero__heading heading-2">Sản Phẩm</h2>
  </section>
  <section class="product container grid">
    <aside class="product-filter">
      <div class="product-category">
        <h6 class="product-filter__title">Danh Mục</h6>
        <ul class="product-filter__list">
          <li class="product-filter__item flex">
            <span class="product-category__input flex">
              <input class="product-category__checkbox" type="checkbox" id="all">
              <label class="product-category__label" for="all">Tất Cả</label>
            </span>
            <span class="product-category__quantity">(18)</span>
          </li>
          <li class="product-filter__item flex">
            <span class="product-category__input flex">
              <input class="product-category__checkbox" type="checkbox" id="fruit">
              <label class="product-category__label" for="fruit">Trái Cây</label>
            </span>
            <span class="product-category__quantity">(8)</span>
          </li>
          <li class="product-filter__item flex">
            <span class="product-category__input flex">
              <input class="product-category__checkbox" type="checkbox" id="vegetable">
              <label class="product-category__label" for="vegetable">Rau Củ</label>
            </span>
            <span class="product-category__quantity">(8)</span>
          </li>
          <li class="product-filter__item flex">
            <span class="product-category__input flex">
              <input class="product-category__checkbox" type="checkbox" id="bread">
              <label class="product-category__label" for="bread">Bánh Mì</label>
            </span>
            <span class="product-category__quantity">(2)</span>
          </li>
        </ul>
      </div>
      <div class="product-popular">
        <h6 class="product-filter__title">Sản Phẩm Phổ Biến</h6>
        <ul class="product-filter__list">
          <li class="product-filter__item product-popular__item flex">
            <a href="#" class="product-popular__btn img-link">
              <img src="./assets/img/product_galia-melon_mini.png" alt="" class="product-popular__img img-link__img">
            </a>
            <div class="product-popular__desc">
              <p class="product-popular__title">
                <a href="#" class="product-popular__link">Dưa Lưới</a>
              </p>
              <span class="product-popular__price">35.000</span>
            </div>
          </li>
          <li class="product-filter__item product-popular__item flex">
            <a href="#" class="product-popular__btn img-link">
              <img src="./assets/img/product_pineapple_mini.png" alt="" class="product-popular__img img-link__img">
            </a>
            <div class="product-popular__desc">
              <p class="product-popular__title">
                <a href="#" class="product-popular__link">Thơm</a>
              </p>
              <span class="product-popular__price">20.000</span>
            </div>
          </li>
          <li class="product-filter__item product-popular__item flex">
            <a href="#" class="product-popular__btn img-link">
              <img src="./assets/img/product_orange.png" alt="" class="product-popular__img img-link__img">
            </a>
            <div class="product-popular__desc">
              <p class="product-popular__title">
                <a href="#" class="product-popular__link">Cam</a>
              </p>
              <span class="product-popular__price">30.000</span>
            </div>
          </li>
        </ul>
      </div>
    </aside>
    <div class="product__main">
      <div class="product-sort flex">
        <span class="product__result">Showing 1–12 of 28 results</span>
        <div class="product-sort__control">
          <span class="product-sort__btn">
            <span class="product-sort__label">Sắp xếp theo mới nhất</span>
            <i class="fas fa-chevron-down product-sort__icon"></i>
          </span>
          <ul class="product-sort__list">
            <li class="product-sort__item active">Sắp xếp theo mới nhất</li>
            <li class="product-sort__item">Sắp xếp theo phổ biến</li>
            <li class="product-sort__item">Sắp xếp theo chữ cái</li>
          </ul>
        </div>
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
      <div class="product-pagination">
        <a href="#" class="product-paganation__btn 
        product-paganation__btn--redirect disable">
          <i class="far fa-angle-left product-paganation__icon"></i>
        </a>
        <a href="#" class="product-paganation__btn active">1</a>
        <a href="#" class="product-paganation__btn">2</a>
        <a href="#" class="product-paganation__btn">3</a>
        <a href="#" class="product-paganation__btn product-paganation__btn--redirect">
          <i class="far fa-angle-right product-paganation__icon"></i>
        </a>
      </div>
    </div>
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
  <script src="./assets/js/category.js"></script>
</body>

</html>