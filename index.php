<?php
  
	require_once('utils/util.php');
	require_once('db/queries.php');

  $query = "select HangHoa.*, HinhHangHoa.TenHinh as url from HangHoa left join HinhHangHoa on HangHoa.MSHH = HinhHangHoa.MSHH order by HangHoa.MSHH desc limit 0,8";
  $lastestItems = getDataBySelect($query);
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Farm Organic Store</title>
    <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./assets/css/user/index.css" />
  </head>

  <body>
    <header class="header">
      <div class="header__container container flex">
        <a href="./index.php" class="logo">
          <img src="./assets/img/logo.png" alt="" class="logo__img" />
        </a>
        <nav class="header-nav">
          <a href="./index.php" class="header-nav__link active">Trang Chủ</a>
          <a href="./category.php" class="header-nav__link">Sản Phẩm</a>
          <a href="./cart.php" class="header-nav__link">Giỏ Hàng</a>
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
          <div class="header-cart" data-quantity="0">
            <button class="header__btn cart btn">
              <ion-icon name="cart-outline" class="header__icon cart"></ion-icon>
            </button>
            <div class="header-cart__wrapper">
              <div class="header-cart__header">
                <h5 class="header-cart__h5">
                  <span class="header-cart__amount">0</span>
                  Sản Phẩm Trong Giỏ Hàng
                </h5>
                <h6 class="header-cart__h6">
                  Tổng Cộng:
                  <span class="header-cart__total">0 VNĐ</span>
                </h6>
              </div>
              <ul class="header-cart__list">
                <li class="header-cart__item flex center empty">
                  <img class="header-cart__img" src="./assets/img/empty_cart.png" alt="img">
                  <p class="header-cart__message">
                    Chưa có sản phẩm trong giỏ hàng.
                    <br>
                    Vui lòng chọn sản phẩm để thanh toán!
                  </p>
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
    <section class="slider mt-header flex">
      <div
        class="slider__item"
        style="background-image: url('./assets/img/slider1.jpg')"
      >
        <div class="slider__header">
          <h4 class="slider__subheading heading-4">
            Chào mừng đến với Farm Organic Store
          </h4>
          <h1 class="slider__heading">Sản Phẩm</h1>
          <h3 class="slider__slogan heading-3">Tăng Trưởng Gắn Liền Với Tình Yêu</h3>
        </div>
        <a href="./category.php" class="slider__link">Mua Ngay</a>
      </div>
      <div
        class="slider__item"
        style="background-image: url('./assets/img/slider2.jpg')"
      >
        <div class="slider__header">
          <h4 class="slider__subheading heading-4">
            Sản phẩm hữu cơ chất lượng cao
          </h4>
          <h1 class="slider__heading">Rau Củ</h1>
          <h3 class="slider__slogan">Không Chất Phụ Gia Có Hại</h3>
        </div>
        <a href="./category.php" class="slider__link">Mua Ngay</a>
      </div>
      <div
        class="slider__item"
        style="background-image: url('./assets/img/slider3.jpg')"
      >
        <div class="slider__header">
          <h4 class="slider__subheading heading-4">Sản phẩm hữu cơ tươi</h4>
          <h1 class="slider__heading">Trái Cây</h1>
          <h3 class="slider__slogan">Với Nhiều Vitamin</h3>
        </div>
        <a href="./category.php" class="slider__link">Mua Ngay</a>
      </div>
      <button class="slider__btn slider__btn--prev btn__redirect disable btn circle-btn">
        <ion-icon name="chevron-back-outline" class="slider__icon"></ion-icon>
      </button>
      <button class="slider__btn slider__btn--next btn__redirect btn circle-btn">
        <ion-icon name="chevron-forward-outline" class="slider__icon"></ion-icon>
      </button>
    </section>
    <section class="product container">
      <div class="product__header">
        <h4 class="product__subheading heading-4">Hàng Mới Nhất</h4>
        <h2 class="product__heading heading-2">Sản Phẩm Mới</h2>
      </div>
      <div class="product__list grid">
        <?php
          foreach($lastestItems as $item) {
            echo '
                <div class="product__item flex">
                  <img src="'.redirectUrl($item['url'], "./").'" alt="img" class="product__img"/>
                  <div class="product__content">
                    <h5 class="product__name">'.$item['TenHH'].'</h5>
                    <span class="product__price">'.number_format($item['Gia'], 0, ".", ".").' VNĐ</span>
                  </div>
                  <a href="./detail.php?id='.$item['MSHH'].'" class="product__btn btn circle-btn">
                    <ion-icon name="search-outline" class="product__icon search"></ion-icon>
                  </a>
                </div>';
          }
        ?>
      </div>
      <a href="./category.php" class="product__link">
        Xem Thêm
        <ion-icon name="chevron-forward-outline" class="product__icon more"></ion-icon>
      </a>
    </section>
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
    <script src="./assets/js/user/slider.js"></script>
  </body>
</html>
