<?php

session_start();
require_once('../../utils/util.php');
require_once('../../db/queries.php');

if (!isset($_SESSION['user'])) {
  header("Location: ../auth");
  die();
}

require_once('./addUpdate.php');
$password = getHashPassword('nguyrnxdnmkri489%9128%$%0124>,..fjdfgh');
$queryData = "select * from NhanVien where Password <> '$password'";
$data = getDataBySelect($queryData);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản Lý Nhân Viên</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/css/admin/staff.css">
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
      <a href="./" class="aside__link flex active">
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
        <ion-icon name="chevron-back-outline" class="main-nav__icon"></ion-icon>
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
      <h2 class="main__heading">Quản Lý Nhân Viên</h2>
      <button class="main__btn no-mg main__btn--add btn circle-btn">
        <ion-icon name="add"></ion-icon>
      </button>
      <span class="main__label">Tổng cộng: <?=count($data)?> dòng</span>
      <table class="main-table" width="100%">
        <tr>
          <th colspan="2">Nhân Viên</th>
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
          <tr class="main-table__row">
            <td>' . (++$index) . '</td>
            <td class="main-table__id" style="display: none;">' . $row['MSNV'] . '</td>
            <td class="main-table__name">' . $row['HoTenNV'] . '</td>
            <td class="main-table__phone">' . $row['SoDienThoai'] . '</td>
            <td class="main-table__address">' . $row['DiaChi'] . '</td>
            <td class="main-table__role">' . $row['ChucVu'] . '</td>
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
        <div class="form-tab flex">
          <button class="form-tab__btn active btn">
            <ion-icon name="information-circle" class="form-tab__icon"></ion-icon>
            Thông tin
          </button>
          <button class="form-tab__btn btn">
            <ion-icon name="lock-closed" class="form-tab__icon"></ion-icon>
            Mật khẩu
          </button>
        </div>
        <div class="form__list">
          <form method="POST" class="form show">
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="id">
            </div>
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="isUpdate">
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="phone" placeholder="Số điện thoại">
              <ion-icon name="phone-portrait" class="form__icon"></ion-icon>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="name" placeholder="Họ tên">
              <ion-icon name="text" class="form__icon"></ion-icon>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="address" placeholder="Địa chỉ">
              <ion-icon name="location" class="form__icon"></ion-icon>
            </div>
            <div class="form__field">
              <input class="form__input" type="text" name="role" placeholder="Chức vụ">
              <ion-icon name="accessibility" class="form__icon"></ion-icon>
            </div>
            <div class="form-btn__wrapper">
              <button class="form__btn form__btn--save btn" type="submit">Lưu</button>
              <button class="form__btn form__btn--cancel btn" type="button">Hủy</button>
            </div>
          </form>
          <form method="POST" class="form">
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="id">
            </div>
            <div class="form__field" style="display: none;">
              <input class="form__input" type="text" name="isUpdate">
            </div>
            <div class="form__field">
              <input class="form__input" type="password" name="pwd" placeholder="Mật khẩu">
              <ion-icon name="lock-closed" class="form__icon"></ion-icon>
            </div>
            <div class="form__field">
              <input class="form__input" type="password" name="confirmPwd" placeholder="Xác nhận mật khẩu">
              <ion-icon name="lock-closed" class="form__icon"></ion-icon>
            </div>
            <div class="form-btn__wrapper">
              <button class="form__btn form__btn--save btn" type="submit">Lưu</button>
              <button class="form__btn form__btn--cancel btn" type="button">Hủy</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script type="module" src="../../assets/js/admin/staff.js" ></script>
</body>

</html>