<?php 
  require_once('utils/util.php');
  require_once('db/queries.php');

  $product_id = $_GET['id'];
  $query = "SELECT HangHoa.*, LoaiHangHoa.TenLoaiHang as category_name, HinhHangHoa.    TenHinh as url_img FROM LoaiHangHoa LEFT JOIN HangHoa ON HangHoa.MaLoaiHang = LoaiHangHoa.MaLoaiHang LEFT JOIN HinhHangHoa ON HangHoa.MSHH = HinhHangHoa.MSHH where HangHoa.MSHH = $product_id";
  $item = getDataBySelect($query, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Sản Phẩm</title>
  <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/user/detail.css">
</head>

<body>
  <header class="header">
    <div class="header__container container flex">
      <a href="./index.php" class="logo">
        <img src="./assets/img/logo.png" alt="" class="logo__img" />
      </a>
      <nav class="header-nav">
        <a href="./index.php" class="header-nav__link">Trang Chủ</a>
        <a href="./category.php" class="header-nav__link active">Sản Phẩm</a>
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
  <section class="hero mt-header" style="background-image: url('./assets/img/product_hero.jpg');">
    <h2 class="hero__heading heading-2">Chi Tiết Sản Phẩm</h2>
  </section>
  <section class="product container grid">
    <?php 
      echo '
        <input class="product__id" type="hidden" name="product__id" value="'.$item['MSHH'].'">
        <div class="product__left">
          <img src="'.redirectUrl($item['url_img'], "./").'" alt="img" class="product__img">
        </div>
        <div class="product__right">
          <div class="product__info">
            <h3 class="product__name heading-3">'.$item['TenHH'].'</h3>
            <p class="product__price">'.number_format($item['Gia'], 0, ".", ".").' VNĐ</p>
            <input class="product__price-input" type="hidden" name="product__price" value="'.$item['Gia'].'">
            <p class="product__desc">'.nl2br($item['QuyCach']).'</p>
            <p class="product__additional">
              Danh mục:
              <span class="product__additional--gray">'.$item['category_name'].'</span>
            </p>
            <p class="product__additional">
              Kho:
              <span class="product__additional--gray">'.$item['SoLuongHang'].'</span>
            </p>
          </div>
          <div class="product__control flex">
            <div class="product__input flex">
              <span class="product__quantity flex">1</span>
              <div class="product__input-wrapper flex">
                <button class="product__input-btn increase btn">
                  <ion-icon name="add-outline"></ion-icon>
                </button>
                <button class="product__input-btn disable decrease btn">
                  <ion-icon name="remove-outline"></ion-icon>
                </button>
              </div>
            </div>
            <button class="product__btn btn">Thêm vào giỏ hàng</button>
          </div>
        </div>
      ';
    ?>
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
  <script src="./assets/js/user/detail.js"></script>

</body>

</html>