<?php

session_start();
require_once('../../utils/util.php');
require_once('../../db/queries.php');

if (!isset($_SESSION['user'])) {
  header("Location: ../auth");
  die();
}

require_once('./addUpdate.php');

$dataQuery = "SELECT HangHoa.*, LoaiHangHoa.TenLoaiHang as category_name, HinhHangHoa.    TenHinh as url_img FROM LoaiHangHoa LEFT JOIN HangHoa ON HangHoa.MaLoaiHang = LoaiHangHoa.MaLoaiHang LEFT JOIN HinhHangHoa ON HangHoa.MSHH = HinhHangHoa.MSHH where HangHoa.MaLoaiHang is not null";
$data = getDataBySelect($dataQuery);
$sql = "SELECT * From LoaiHangHoa";
$categoryItems = getDataBySelect($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Sản Phẩm</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/css/admin/product.css">
</head>

<body>
  <aside class="aside">
    <div class="aside__logo">
      <a href="#" class="logo">
        <img src="../../assets/img/logo.png" alt="img" class="logo__img">
      </a>
    </div>
    <nav class="aside__nav">
      <a href="../order" class="aside__link flex">
        <span></span>
        <span></span>
        <ion-icon name="bag-handle" class="aside__icon"></ion-icon>
        Đơn Hàng
      </a>
      <a href="../staff" class="aside__link flex">
        <span></span>
        <span></span>
        <ion-icon name="person" class="aside__icon"></ion-icon>
        Nhân Viên
      </a>
      <a href="../category/" class="aside__link flex">
        <span></span>
        <span></span>
        <ion-icon name="apps" class="aside__icon"></ion-icon>
        Danh Mục
      </a>
      <a href="./" class="aside__link active flex">
        <span></span>
        <span></span>
        <ion-icon name="fast-food" class="aside__icon"></ion-icon>
        Sản Phẩm
      </a>
      <a href="../statistic" class="aside__link flex">
        <span></span>
        <span></span>
        <ion-icon name="stats-chart" class="aside__icon"></ion-icon>
        Thống Kê
      </a>
    </nav>
  </aside>
  <main class="main">
    <nav class="main-nav main__wrapper flex">
      <button class="main-nav__btn btn circle-btn">
        <ion-icon name="chevron-back" class="main-nav__icon"></ion-icon>
      </button>
      <div class="main-nav__avt btn circle-btn">
        <img src="../../assets/img/avt1.jpg" alt="avt" class="main-nav__img">
      </div>
      <ul class="main-nav__list">
        <li class="main-nav__item">
          <span class="main-nav__message">Xin chào,
            <?php
            $queryName = "select HoTenNV from NhanVien where SoDienThoai = " . $_SESSION['user'];
            $name = getDataBySelect($queryName, true);
            echo implode("", $name);
            ?>
          </span>
        </li>
        <li class="main-nav__item">
          <a href="../auth/logout.php" class="main-nav__link btn">
            <ion-icon name="power" class="main-nav__icon"></ion-icon>
            Đăng Xuất
          </a>
        </li>
      </ul>
    </nav>
    <div class="main__wrapper">
      <h2 class="main__heading">Quản Lý Sản Phẩm</h2>
      <button class="main__btn no-mg main__btn--add btn circle-btn">
        <ion-icon name="add"></ion-icon>
      </button>
      <table class="main-table" width="100%">
        <tr>
          <th colspan="3">Sản Phẩm</th>
          <th>Mô Tả</th>
          <th>Giá</th>
          <th>Số Lượng</th>
          <th>Danh Mục</th>
          <th></th>
          <th></th>
        </tr>
        <?php
        $index = 0;
        foreach ($data as $row) {
          echo '
          <tr class="main-table__row">
              <td>' . (++$index) . '</td>
              <td class="main-table__id" style="display: none;">' . $row['MSHH'] . '</td>
              <td>
                <img class="main-table__img" src="' . $row['url_img'] . '" alt="img"> 
              </td>
              <td class="main-table__name">' . $row['TenHH'] . '</td>
              <td class="main-table__desc">' . $row['QuyCach'] . '</td>
              <td class="main-table__price">'.number_format($row['Gia'], 0, ".", ".").' VNĐ</td>
              <td class="main-table__quantity">' . $row['SoLuongHang'] . '</td>
              <td class="main-table__category">' . $row['category_name'] . '</td>
              <td>
                  <button class="main__btn main__btn--edit btn circle-btn">
                  <ion-icon name="pencil" class="main-table__icon"></ion-icon>
                  </button>
              </td>
              <td>
                  <button class="main__btn main__btn--delete btn circle-btn">
                  <ion-icon name="trash-outline" class="main-table__icon"></ion-icon>
                  </button>
              </td>
          </tr>';
        }
        ?>
      </table>
    </div>
    <div class="form__modal">
      <div class="form__wrapper">
        <h3 class="form__heading">heading</h3>
        <h4 class="form__message"></h4>
        <form method="POST" class="form show">
          <div class="form__left">
            <div class="form__avt">
              <img src="" alt="" class="form__img">
            </div>
            <div class="form__field">
              <label class="form__label flex" for="url">Chọn ảnh</label>
              <input id="url" class="form__file" type="file" accept="image/*">
            </div>
          </div>
          <div class="form__right">
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="url">
            </div>
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="id">
            </div>
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="isUpdate">
            </div>
            <div class="form__field mt-0">
              <input class="form__input" type="text" name="name" placeholder="Tên sản phẩm">
              <ion-icon name="text" class="form__icon"></ion-icon>
            </div>
            <div class="form__field">
              <select class="form__input" name="category_id" id="category_id">
                <option value="" selected disabled>-- Chọn danh mục sản phẩm --</option>
                <?php
                  foreach($categoryItems as $categoryItem) {
                    echo '<option class="form__option" value="'.$categoryItem['MaLoaiHang'].'">'.$categoryItem['TenLoaiHang'].'</option>';
                  }
                ?>
              </select>
              <ion-icon name="apps" class="form__icon"></ion-icon>
            </div>
            <div class="form__field reverse">
              <textarea class="form__desc" name="desc" placeholder="Mô tả sản phẩm"  cols="100" rows="9" contenteditable></textarea>
              <ion-icon name="document-text" class="form__icon">></ion-icon>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="price" placeholder="Giá">
              <ion-icon name="pricetag" class="form__icon"></ion-icon>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="quantity" placeholder="Số lượng">
              <ion-icon name="dice" class="form__icon"></ion-icon>
            </div>
            <div class="form-btn__wrapper">
              <button class="form__btn form__btn--save btn" type="submit">Lưu</button>
              <button class="form__btn form__btn--cancel btn" type="button">Hủy</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="../../assets/js/admin/product.js"></script>
</body>

</html>