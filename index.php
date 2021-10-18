<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farm Organic Store</title>
    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/index.css">
  </head>
  <body>
    <header class="header">
      <div class="header__container container flex">
        <div class="header__logo">
          <a href="#" class="header-link">
            <img src="./assets/img/logo.png" alt="" class="header-link__img">
          </a>
        </div>
        <nav class="header-nav">
          <a href="#" class="header-nav__link">Trang Chủ</a>
          <a href="#" class="header-nav__link">Sản Phẩm</a>
          <a href="#" class="header-nav__link">Liên Hệ</a>
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
                  <span class="header-cart__total">45000</span></h6>
              </div>
              <ul class="heeader-cart__list">
                <li class="header-cart__item flex" data-price="30000">
                  <div class="header-cart__left">
                    <a href="#" class="header-cart__link">
                      <img src="./assets/img/product_orange.png" alt="img" class="header-cart__img">
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
                    <a href="#" class="header-cart__link">
                      <img src="./assets/img/product_banana--mini.png" alt="img" class="header-cart__img">
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
                <a href="" class="header-cart__click view">Giỏ Hàng</a>
                <a href="" class="header-cart__click checkout">Thanh Toán</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main class="main">
      <section class="slider"></section>
      <section class="product"></section>
    </main>
    <footer class="footer"></footer>

    <script src="./assets/js/main.js"></script>
  </body>
</html>
