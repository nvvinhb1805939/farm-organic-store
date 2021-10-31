<?php

session_start();
require_once('../../utils/util.php');
require_once('../../db/queries.php');

if (!isset($_SESSION['user'])) {
  header("Location: ../auth");
  die();
}

$queryData = "select * from NhanVien";
$data = getDataBySelect($queryData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Nhân Viên</title>
  <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/css/admin/staff.css">
</head>

<body>
  <aside class="aside">
    <div class="aside__logo">
      <a href="." class="logo">
        <img src="../../assets/img/logo.png" alt="img" class="logo__img">
      </a>
    </div>
    <nav class="aside__nav flex">
      <a href="../order" class="aside__link">
        <span></span>
        <span></span>
        <i class="fas fa-file-contract aside__icon main-table__icon"></i>
        Đơn Hàng
      </a>
      <a href="#" class="aside__link active">
        <span></span>
        <span></span>
        <i class="fas fa-user aside__icon main-table__icon"></i>
        Nhân Viên
      </a>
      <a href="../category" class="aside__link">
        <span></span>
        <span></span>
        <i class="far fa-tasks-alt aside__icon main-table__icon"></i>
        Danh Mục
      </a>
      <a href="../product" class="aside__link">
        <span></span>
        <span></span>
        <i class="fad fa-pumpkin aside__icon main-table__icon"></i>
        Sản Phẩm
      </a>
      <a href="../statistic" class="aside__link">
        <span></span>
        <span></span>
        <i class="far fa-chart-line aside__icon main-table__icon"></i>
        Thống Kê
      </a>
    </nav>
  </aside>
  <main class="main">
    <nav class="main-nav main__wrapper flex">
      <button class="main-nav__btn">
        <i class="far fa-bars main-nav__icon main-table__icon"></i>
      </button>
      <div class="main-nav__avt">
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
          <a href="../auth/logout.php" class="main-nav__link">
            <i class="far fa-power-off main-table__icon"></i>
            Đăng Xuất
          </a>
        </li>
      </ul>
    </nav>
    <div class="main__wrapper">
      <h2 class="main__heading">Quản Lý Nhân Viên</h2>
      <button class="main__btn main__btn--add">
        <i class="fas fa-plus"></i>
      </button>
      <table class="main-table" width="100%">
        <tr>
          <th>STT</th>
          <th>Họ Tên</th>
          <th>Số Điện Thoại</th>
          <th>Địa Chỉ</th>
          <th>Chức Vụ</th>
          <th></th>
          <th></th>
        </tr>
        <?php
        $index = 0;
        foreach ($data as $row) {
          echo '
            <span class="main-table__id" style="display: none;">' . $row['MSNV'] . '</span>
            <tr>
              <td>' . (++$index) . '</td>
              <td class="main-table__name">' . $row['HoTenNV'] . '</td>
              <td class="main-table__phone">' . $row['SoDienThoai'] . '</td>
              <td class="main-table__address">' . $row['DiaChi'] . '</td>
              <td class="main-table__role">' . $row['ChucVu'] . '</td>
              <td>
                <button class="main__btn main__btn--edit">
                  <i class="fas fa-pencil-alt main-table__icon"></i>
                </button>
              </td>
              <td>
                <button class="main__btn main__btn--delete">
                  <i class="fas fa-trash-alt main-table__icon"></i>
                </button>
              </td>
				    </tr>';
        }
        ?>
      </table>
    </div>
    <div id="form__modal" class="form__modal" data-id>
      <div class="form__wrapper">
        <h3 class="form__heading">heading</h3>
        <div class="form-tab">
          <button class="form-tab__btn active">
            <i class="fas fa-info form-tab__icon"></i>
            Thông tin
          </button>
          <button class="form-tab__btn">
            <i class="fas fa-lock form-tab__icon"></i>
            Mật khẩu
          </button>
        </div>
        <div class="form__list">
          <form method="POST" class="form show">
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="id">
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="phone" placeholder="Số điện thoại">
              <i class="fas fa-phone-alt form__icon"></i>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="name" placeholder="Họ tên">
              <i class="far fa-text form__icon"></i>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="address" placeholder="Địa chỉ">
              <i class="fas fa-address-book form__icon"></i>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="role" placeholder="Chức vụ">
              <i class="fas fa-user-tag form__icon"></i>
            </div>
            <div class="form-btn__wrapper">
              <button class="form__btn form__btn--save" type="submit">Lưu</button>
              <button class="form__btn form__btn--cancel" type="button">Hủy</button>
            </div>
          </form>
          <form method="POST" class="form">
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="id">
            </div>
            <div class="form__field">
              <input class="form__input" type="password" name="pwd" placeholder="Mật khẩu">
              <i class="fas fa-lock form__icon"></i>
            </div>
            <div class="form__field">
              <input class="form__input" type="password" name="confirmPwd" placeholder="Xác nhận mật khẩu">
              <i class="fas fa-lock form__icon"></i>
            </div>
            <div class="form-btn__wrapper">
              <button class="form__btn form__btn--save" type="submit">Lưu</button>
              <button class="form__btn form__btn--cancel" type="button">Hủy</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>

  <script src="../../assets/js/admin/main.js"></script>
</body>

</html>