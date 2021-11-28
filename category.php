<?php
  require_once('utils/util.php');
	require_once('db/queries.php');  

  $total = 0;
  $countCategoryQuery = "SELECT LoaiHangHoa.MaLoaiHang as category_id, LoaiHangHoa.TenLoaiHang as category_name, COUNT(HangHoa.MaLoaiHang) AS count FROM LoaiHangHoa LEFT JOIN HangHoa ON LoaiHangHoa.MaLoaiHang = HangHoa.MaLoaiHang GROUP BY category_name ORDER BY count";
  $countCategories = getDataBySelect($countCategoryQuery);
  foreach($countCategories as $countCategory) {
    $total += $countCategory['count'];
  }  
  $pages = ceil($total / 9);
  $currentPage = 1;
  if(isset($_GET['page']))
    $currentPage = $_GET['page'];
  $index = ($currentPage - 1) * 9;
  $prevPage = $currentPage - 1;
  $nextPage = $currentPage + 1;
  $query = "SELECT HangHoa.*, HinhHangHoa.TenHinh as url, LoaiHangHoa.TenLoaiHang as category_name from HangHoa left join HinhHangHoa on HangHoa.MSHH = HinhHangHoa.MSHH left join LoaiHangHoa on HangHoa.MaLoaiHang = LoaiHangHoa.MaLoaiHang order by HangHoa.MSHH desc limit $index, 9";
  $lastestItems = getDataBySelect($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản Phẩm</title>
  <link rel="icon" href="./assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="./assets/css/user/category.css">
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
            <span class="product-category__quantity">(<?=$total?>)</span>
          </li>
          <?php
            foreach($countCategories as $countCategory) {
              echo '
                <li class="product-filter__item flex">
                  <span class="product-category__input flex">
                    <input class="product-category__checkbox" type="checkbox" id="'.$countCategory['category_id'].'">
                    <label class="product-category__label" for="'.$countCategory['category_id'].'">'.$countCategory['category_name'].'</label>
                  </span>
                  <span class="product-category__quantity">('.$countCategory['count'].')</span>
                </li>
              ';
            }
          ?>
        </ul>
      </div>
    </aside>
    <div class="product__main">
      <div class="product-sort flex">
        <span class="product__result">Hiển thị <?=($currentPage - 1) * 9 + 1?>–<?=($currentPage * 9) > $total ? $total : $currentPage * 9 ?> của <?=$total?> sản phẩm</span>
        <div class="product-sort__control">
          <span class="product-sort__btn flex">
            <span class="product-sort__label">Sắp xếp theo mới nhất</span>
            <ion-icon name="chevron-down-outline" class="product-sort__icon"></ion-icon>
          </span>
          <ul class="product-sort__list">
            <li class="product-sort__item active">Sắp xếp theo mới nhất</li>
            <li class="product-sort__item">Sắp xếp theo phổ biến</li>
            <li class="product-sort__item">Sắp xếp theo chữ cái</li>
          </ul>
        </div>
      </div>
      <div class="product__list grid">
        <?php
          foreach($lastestItems as $item) {
            echo '
              <div class="product__item flex">
                <img src="'.redirectUrl($item['url'], "./").'" alt="img" class="product__img">
                <div class="product__content">
                  <h5 class="product__name">'.$item['TenHH'].'</h5>
                  <span class="product__price">'.number_format($item['Gia'], 0, ".", ".").' VNĐ</span>
                </div>
                <a href="detail.php?id='.$item['MSHH'].'" class="product__btn btn circle-btn">
                    <ion-icon name="search-outline" class="product__icon search"></ion-icon>
                  </a>
              </div>
            ';
          }
        ?>
      </div>
      <div class="product-pagination flex">
        <?php
          if($currentPage == 1) {
            echo '
              <a href="?page='.$prevPage.'" class="product-paganation__btn
              product-paganation__btn--redirect disable  btn circle-btn">
                <ion-icon name="chevron-back-outline" class="product-paganation__icon"></ion-icon>
              </a>
            ';
          }
          else {
            echo '
              <a href="?page='.$prevPage.'" class="product-paganation__btn
              product-paganation__btn--redirect btn circle-btn">
                <ion-icon name="chevron-back-outline" class="product-paganation__icon"></ion-icon>
              </a>
            ';
          }
        ?>
        <?php 
          for($page = 1; $page <= $pages; $page++) {
            if($page == $currentPage) {
              echo '
                <a href="?page='.$page.'" class="product-paganation__btn active btn circle-btn">'.$page.'</a>
              ';
            } else {
              echo '
                <a href="?page='.$page.'" class="product-paganation__btn btn circle-btn">'.$page.'</a>
              ';
            }
          }
        ?>
        <?php 
          if($currentPage == $pages) {
            echo '
              <a href="?page='.$nextPage.'" class="product-paganation__btn
              product-paganation__btn--redirect disable  btn circle-btn">
                <ion-icon name="chevron-forward-outline" class="product-paganation__icon"></ion-icon>
              </a>';
          } else {
            echo '
              <a href="?page='.$nextPage.'" class="product-paganation__btn
              product-paganation__btn--redirect btn circle-btn">
                <ion-icon name="chevron-forward-outline" class="product-paganation__icon"></ion-icon>
              </a>';
          }
        ?>
      </div>
    </div>
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
  <script src="./assets/js/user/category.js"></script>
</body>

</html>