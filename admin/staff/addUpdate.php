<?php

if(!empty($_POST)) {
	$query = "";
	$id = getDataByMethod('POST', 'id');
	$isUpdate = getDataByMethod('POST', 'isUpdate');
	$phone = getDataByMethod('POST', 'phone');
	$name = getDataByMethod('POST', 'name');
	$address = getDataByMethod('POST', 'address');
	$role = getDataByMethod('POST', 'role');
	$password = getDataByMethod('POST', 'pwd');
	$password = getHashPassword($password);
	
	switch($isUpdate) {
		case 0:
			$query = "insert into NhanVien(HoTenNV, ChucVu, DiaChi, SoDienThoai) values ('$name', '$role', '$address', '$phone')";
			break;
		case 1: 
			$query = "update NhanVien set HoTenNV = '$name', ChucVu = '$role', SoDienThoai = '$phone', DiaChi = '$address' where MSNV = '$id'";
			break;
		case 2:
			$query = "update NhanVien set Password = '$password' where MSNV = '$id'";
			break;
	}
	executeQuery($query);
	header('Location: ./');
	die();
}