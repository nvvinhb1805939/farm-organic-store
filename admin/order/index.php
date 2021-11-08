<?php

session_start();
require_once('../../utils/util.php');
require_once('../../db/queries.php');

if (!isset($_SESSION['user'])) {
  header("Location: ../auth");
  die();
}

$status = [];
$statusClassName = [];
$deleteClassName = [];
$editClassName = [];
date_default_timezone_set('Asia/Ho_Chi_Minh');

// $dataQuery = "SELECT KhachHang.*, DiaChiKH.DiaChi as address FROM KhachHang LEFT JOIN DiaChiKH ON KhachHang.MSKH = DiaChiKH.MSKH";
$dataQuery = "SELECT DatHang.*, NhanVien.HoTenNV as staff_name, KhachHang.HoTenKH as customer_name FROM DatHang LEFT JOIN KhachHang ON DatHang.MSKH = KhachHang.MSKH LEFT JOIN NhanVien ON DatHang.MSNV = NhanVien.MSNV";
$data = getDataBySelect($dataQuery);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Đơn Hàng</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/css/admin/order.css">
</head>

<body>
  <aside class="aside">
    <div class="aside__logo">
      <a href="#" class="logo">
        <img src="../../assets/img/logo.png" alt="img" class="logo__img">
      </a>
    </div>
    <nav class="aside__nav">
      <a href="./" class="aside__link active flex">
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
      <a href="../category" class="aside__link flex">
        <span></span>
        <span></span>
        <ion-icon name="apps" class="aside__icon"></ion-icon>
        Danh Mục
      </a>
      <a href="../product" class="aside__link flex">
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
      <h2 class="main__heading">Quản Lý Đơn Hàng</h2>
      <table class="main-table" width="100%">
        <tr>
            <th>Số ĐH</th>
            <th>Khách Hàng</th>
            <th>Nhân viên</th>
            <th>Ngày Đặt</th>
            <th>Ngày Giao</th>
            <th>Trạng Thái</th>
            <th></th>
            <th></th>
        </tr>
        <?php
          $index = 0;
          foreach ($data as $row) {
            switch($row['TrangThaiDH']) {
              case 0:
                  $status[$index] = "Chờ xác nhận";
                  $statusClassName[$index] = "pending";
                  $deleteClassName[$index] = "";
                  $editClassName[$index] = "";
                  $row['NgayGH'] = "";
                  break;
              case 1:
                  $status[$index] = "Chờ lấy hàng";
                  $statusClassName[$index] = "repare";
                  $deleteClassName[$index] = "";
                  $editClassName[$index] = "";
                  $row['NgayGH'] = "";
                  break;
              case 2:
                  $status[$index] = "Đang giao";
                  $statusClassName[$index] = "delivery";
                  $deleteClassName[$index] = "disable";
                  $editClassName[$index] = "";
                  $row['NgayGH'] = "";
                  break;
              case 3:
                  $status[$index] = "Đã giao";
                  $statusClassName[$index] = "success";
                  $deleteClassName[$index] = "disable";
                  $editClassName[$index] = "disable";
                  $row['NgayGH'] = date('m/d/Y h:i a', time());
                  break;
              default:
                  $status[$index] = "Đã hủy";
                  $statusClassName[$index] = "cancel";
                  $deleteClassName[$index] = "disable";
                  $editClassName[$index] = "disable";
                  $row['NgayGH'] = "";
                  break;
            }
            echo '
            <tr class="main-table__row">
              <td class="main-table__id">' . $row['SoDonDH'] . '</td>
              <td class="main-table__name-customer">' . $row['customer_name'] . '</td>
              <td class="main-table__name-staff">' . $row['staff_name'] . '</td>
              <td class="main-table__order-date">' . $row['NgayDH'] . '</td>
              <td class="main-table__delivery-date">' . $row['NgayGH'] . '</td>
              <td>
                <span class="main-table__status" style="display: none;">'.$row['TrangThaiDH'].'</span>
                <span class="main-table__status-txt '.$statusClassName[$index].'">'.$status[$index].'</span>
              </td>
              <td>
                  <button class="main__btn '.$editClassName[$index].' main__btn--edit btn circle-btn">
                    <ion-icon name="pencil" class="main-table__icon"></ion-icon>
                  </button>
              </td>
              <td>
                  <button class="main__btn '.$deleteClassName[$index].' main__btn--delete btn circle-btn">
                    <ion-icon name="trash-outline" class="main-table__icon"></ion-icon>
                  </button>
              </td>
            </tr>';
            $index++;
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
  <script type="module" src="../../assets/js/admin/order.js"></script>
</body>

</html>