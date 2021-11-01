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

<body>
  <main class="form__modal show">
    <div class="form__wrapper">
      <img src="../../assets/img/logo.png" alt="logo" class="logo">
      <h3 class="form__heading">Đăng Nhập</h3>
      <form method="POST" class="form show">
        <h4 class="form__message"><?= $message ?></h4>
        <div class="form__field">
          <input class="form__input" type="text" name="phone" placeholder="Số điện thoại">
          <ion-icon name="phone-portrait-outline" class="form__icon"></ion-icon>
        </div>
        <div class="form__field">
          <input class="form__input" type="password" name="pwd" placeholder="Mật khẩu">
          <ion-icon name="lock-closed-outline" class="form__icon"></ion-icon>
        </div>
        <button class="form__btn btn" type="submit">Đăng Nhập</button>
      </form>
    </div>
  </main>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>