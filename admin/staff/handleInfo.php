<?php

$message = '';

if(!empty($_POST)) {
	$id = getDataByMethod('POST', 'id');
	$kind = getDataByMethod('POST', 'kind');
	$phone = getDataByMethod('POST', 'phone');
	$name = getDataByMethod('POST', 'name');
	$address = getDataByMethod('POST', 'address');
	$role = getDataByMethod('POST', 'role');
	// $password = getDataByMethod('POST', 'pwd');
	if($kind == 1) {
		$query = "select * from NhanVien where SoDienThoai = '$phone' and MSNV <> $id";
		$userItem = getDataBySelect($query, true);

		if($userItem != null) {
			$message = 'Số điện thoại đã được đăng ký, vui lòng kiểm tra lại!';
		} else {
			// if($password != '') {
			// 	$query = "update User set fullname = '$fullname', email = '$email', phone_number = '$phone_number', address = '$address', password = '$password', updated_at = '$updated_at', role_id = $role_id where id = $id";
			// } else {
			// 	$query = "update User set fullname = '$fullname', email = '$email', phone_number = '$phone_number', address = '$address', updated_at = '$updated_at', role_id = $role_id where id = $id";
			// }
			$query = "update NhanVien set HoTenNV = '$name', ChucVu = '$role', SoDienThoai = '$phone', DiaChi = '$address' where MSNV = $id";
			executeQuery($query);
			header('Location: index.php');
			die();
		}
	} else {
		$query = "select * from NhanVien where SoDienThoai = '$phone'";
		$userItem = getDataBySelect($query, true);

		if($userItem == null) {
			$query = "insert into NhanVien(HoTenNV, ChucVu, DiaChi, SoDienThoai) values ('$name', '$role', '$address', '$phone')";
			executeQuery($query);
			header('Location: index.php');
			die();
		} else {
			$message = 'Số điện thoại đã được đăng ký, vui lòng kiểm tra lại!';
		}
	}
}