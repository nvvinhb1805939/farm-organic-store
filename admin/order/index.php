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

// $dataQuery = "SELECT KhachHang.*, DiaChiKH.DiaChi as address FROM KhachHang LEFT JOIN DiaChiKH ON KhachHang.MSKH = DiaChiKH.MSKH";
$dataQuery = "SELECT DatHang.*, DATE_FORMAT(DatHang.NgayDH, '%H:%i %d/%m/%Y') AS orderDate, DATE_FORMAT(DatHang.NgayGH, '%H:%i %d/%m/%Y') AS deliveryDate, KhachHang.HoTenKH as customer_name FROM DatHang LEFT JOIN KhachHang ON DatHang.MSKH = KhachHang.MSKH Order by DatHang.TrangThaiDH, DatHang.NgayDH, DatHang.NgayGH ASC";
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
      <span class="main__label">Tổng cộng: <?=count($data)?> dòng</span>
      <table class="main-table" width="100%">
        <tr>
            <th>Số ĐH</th>
            <th>Khách Hàng</th>
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
                break;
              case 1:
                $status[$index] = "Chờ lấy hàng";
                $statusClassName[$index] = "repare";
                $deleteClassName[$index] = "";
                $editClassName[$index] = "";
                break;
              case 2:
                $status[$index] = "Đang giao";
                $statusClassName[$index] = "delivery";
                $deleteClassName[$index] = "disable";
                $editClassName[$index] = "";
                break;
              case 3:
                $status[$index] = "Đã giao";
                $statusClassName[$index] = "success";
                $deleteClassName[$index] = "disable";
                $editClassName[$index] = "disable";
                break;
              default:
                $status[$index] = "Đã hủy";
                $statusClassName[$index] = "cancel";
                $deleteClassName[$index] = "disable";
                $editClassName[$index] = "disable";
                break;
            }
            echo '
            <tr class="main-table__row">
              <td class="main-table__id">
                ' . $row['SoDonDH'] . '
                <a href="detail.php?id='.$row['SoDonDH'].'" class="main__btn main__btn--search btn circle-btn">
                    <ion-icon name="search" class="main-table__icon"></ion-icon>
                </a>
              </td>
              <td class="main-table__name-customer">' . $row['customer_name'] . '</td>
              <td class="main-table__order-date">' . $row['orderDate'] . '</td>
              <td class="main-table__delivery-date">' . $row['deliveryDate'] . '</td>
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

  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="../../assets/js/admin/order.js"></script>
</body>

</html>