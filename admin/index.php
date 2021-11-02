<?php

session_start();

if (!isset($_SESSION['user'])) {
  header("Location: ./auth");
  die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/admin/admin.css">
</head>

<body>
  <aside class="aside">
    <div class="aside__logo">
      <a href="." class="logo">
        <img src="../assets/img/logo.png" alt="img" class="logo__img">
      </a>
    </div>
    <nav class="aside__nav">
      <a href="../order" class="aside__link active flex">
        <span></span>
        <span></span>
        <ion-icon name="bag-handle" class="aside__icon"></ion-icon>
        Đơn Hàng
      </a>
      <a href="./staff" class="aside__link flex">
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

  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>