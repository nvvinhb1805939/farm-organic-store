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
      <a href="./index.php" class="logo">
        <img src="../assets/img/logo.png" alt="img" class="logo__img">
      </a>
    </div>
    <nav class="aside__nav flex">
      <a href="#" class="aside__link active">
        <span></span>
        <span></span>
        <i class="fas fa-file-contract aside__icon"></i>
        Đơn Hàng
      </a>
      <a href="#" class="aside__link">
        <span></span>
        <span></span>
        <i class="fas fa-user aside__icon"></i>
        Nhân Viên
      </a>
      <a href="#" class="aside__link">
        <span></span>
        <span></span>
        <i class="far fa-tasks-alt aside__icon"></i>
        Danh Mục
      </a>
      <a href="#" class="aside__link">
        <span></span>
        <span></span>
        <i class="fad fa-pumpkin aside__icon"></i>
        Sản Phẩm
      </a>
      <a href="#" class="aside__link">
        <span></span>
        <span></span>
        <i class="far fa-chart-line aside__icon"></i>
        Thống Kê
      </a>
    </nav>
  </aside>
  <main class="main">

  </main>

  <script src="../../assets/js/management.js"></script>
</body>

</html>