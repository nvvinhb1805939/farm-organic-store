<?php

session_start();

$phone = $message = '';

if (!empty($_POST)) {
  $phone = getDataByMethod('POST', 'phone');
  $pwd = getDataByMethod('POST', 'pwd');
  // $pwd = getHashPassword($pwd);

  $query = "select * from nhanvien where SoDienThoai = '$phone' and Password = '$pwd'";
  $userData = getDataBySelect($query, true);
  if ($userData == null || $pwd == '') {
    $message = 'Đăng nhập không thành công.<br>Vui lòng kiểm tra số điện thoại hoặc mật khẩu!';
  } else {
    $_SESSION['user'] = $phone;
    header('Location: ../');
    die();
  }
}
