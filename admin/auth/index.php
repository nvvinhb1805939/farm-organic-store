<?php

require_once('../../utils/util.php');
require_once('../../db/queries.php');
require_once('./handleLogin.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng Nhập</title>
  <link rel="icon" href="../../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../../assets/css/admin/login.css">
</head>

<body class="flex">
  <main class="login">
    <img src="../../assets/img/logo.png" alt="logo" class="login__logo logo">
    <form method="POST" class="login__form">
      <h3 class="login__heading">Đăng Nhập</h3>
      <h4 class="login__message"><?= $message ?></h4>
      <div class="login__field">
        <input class="login__input" type="text" name="phone" placeholder="Số điện thoại">
        <i class="fas fa-phone-alt login__icon"></i>
      </div>
      <div class="login__field">
        <input class="login__input" type="password" name="pwd" placeholder="Mật khẩu">
        <i class="fas fa-lock login__icon"></i>
      </div>
      <button class="login__btn" type="submit">Đăng Nhập</button>
    </form>
  </main>
</body>

</html>