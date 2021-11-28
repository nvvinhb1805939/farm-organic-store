<?php

session_start();
require_once('../../utils/util.php');
require_once('../../db/queries.php');

if (!isset($_SESSION['user'])) {
  header("Location: ../auth");
  die();
}

$total = 0;
$orderId = getDataByMethod('GET','id');

$productQuery = "SELECT ChiTietDonHang.*, HangHoa.TenHH as title, HangHoa.Gia as price, HinhHangHoa.TenHinh as url from HangHoa left join ChiTietDonHang on HangHoa.MSHH = ChiTietDonHang.MSHH left join HinhHangHoa on HangHoa.MSHH = HinhHangHoa.MSHH where ChiTietDonHang.SoDonDH = $orderId";
$productData = getDataBySelect($productQuery);

$orderQuery = "SELECT DatHang.*, DATE_FORMAT(DatHang.NgayDH, '%H:%i %d/%m/%Y') AS orderDate, DATE_FORMAT(DatHang.NgayGH, '%H:%i %d/%m/%Y') AS deliveryDate, NhanVien.HoTenNV as staff_name, NhanVien.SoDienThoai as staff_phone, KhachHang.HoTenKH as customer_name, KhachHang.SoDienThoai as customer_phone, DiaChiKH.DiaChi as address FROM DatHang LEFT JOIN KhachHang ON DatHang.MSKH = KhachHang.MSKH LEFT JOIN NhanVien ON DatHang.MSNV = NhanVien.MSNV LEFT JOIN DiaChiKH ON DatHang.MSKH = DiaChiKH.MSKH WHERE SoDonDH = $orderId";
$orderData = getDataBySelect($orderQuery, true);

$status = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi Tiết Đơn Hàng</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/css/admin/detail.css">
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
      <h2 class="main__heading">Chi Tiết Đơn Hàng</h2>
      <?php
      switch($orderData['TrangThaiDH']) {
        case 0:
          $status = "Chờ xác nhận";
          break;
        case 1:
          $status = "Chờ lấy hàng";
          break;
        case 2:
          $status = "Đang giao";
          break;
        case 3:
          $status = "Đã giao";
          break;
        default:
          $status = "Đã hủy";
          break;
      }
      ?>
      <table class="main-table main-table--vertical" width="100%">
        <tr>
          <th class="main-table__head">Số Đơn Hàng</th>
          <td class="main-table__data"><?=$orderId?></td>
        </tr>
        <tr>
          <th>Mã Số Khách Hàng</th>
          <td><?=$orderData['MSKH']?></td>
        </tr>
        <tr>
          <th>Họ Tên Khách Hàng</th>
          <td><?=$orderData['customer_name']?></td>
        </tr>
        <tr>
          <th>Số Điện Thoại</th>
          <td><?=$orderData['customer_phone']?></td>
        </tr>
        <tr>
          <th>Địa Chỉ</th>
          <td><?=$orderData['address']?></td>
        </tr>
        <tr>
          <th>Mã Số Nhân Viên</th>
          <td><?=$orderData['MSNV']?></td>
        </tr>
        <tr>
          <th>Họ Tên Nhân Viên</th>
          <td><?=$orderData['staff_name']?></td>
        </tr>
        <tr>
          <th>Số Điện Thoại</th>
          <td><?=$orderData['staff_phone']?></td>
        </tr>
        <tr>
          <th>Ngày Đặt Hàng</th>
          <td><?=$orderData['orderDate']?></td>
        </tr>
        <tr>
          <th>Ngày Giao Hàng</th>
          <td><?=$orderData['deliveryDate']?></td>
        </tr>
        <tr>
          <th>Trạng Thái</th>
          <td><?=$status?></td>
        </tr>
      </table>
      <span class="main__label">Tổng cộng: <?=count($productData)?> sản phẩm</span>
      <table class="main-table" width="100%">
        <tr>
            <th colspan="3">Sản Phẩm</th>
            <th>Giá</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
        </tr>
        <?php
          $index = 0;
          foreach ($productData as $row) {
            $totalItem = $row['price'] * $row['SoLuong'];
            $total += $totalItem;
            echo '
            <tr class="main-table__row">
                <td>'.(++$index).'</td>
                <td><img class="main-table__img" src="'.$row['url'].'" alt="img"/></td>
                <td>'.$row['title'].'</td>
                <td>'.number_format($row['price'], 0, ".", ".").' VNĐ</td>
                <td>'.$row['SoLuong'].'</td>
                <td>'.number_format($totalItem, 0, ".", ".").' VNĐ</td>
            </tr>';
          }
        ?>
        <tr>
            <td class="main-table__total" colspan="5">Tổng cộng</td>
            <th><?=number_format($total, 0, ".", ".").' VNĐ'?></th>
        </tr>
      </table>
    </div>

  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="../../assets/js/admin/order.js"></script>
</body>

</html>