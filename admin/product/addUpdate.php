<?php

if(!empty($_POST)) {
	$query = "";
	$id = getDataByMethod('POST', 'id');
	$isUpdate = getDataByMethod('POST', 'isUpdate');
	$name = getDataByMethod('POST', 'name');
	$category_id = getDataByMethod('POST', 'category_id');
	$desc = getDataByMethod('POST', 'desc');
	$price = getDataByMethod('POST', 'price');
	$quantity = getDataByMethod('POST', 'quantity');
	
	switch($isUpdate) {
		case 0:
			$query = "insert into HangHoa(TenHH, QuyCach, Gia, SoLuongHang, MaLoaiHang) values ('$name', '$desc', '$price', '$quantity', '$category_id')";
			break;
		case 1: 
			$query = "update HangHoa set TenHH = '$name', QuyCach = '$desc', Gia = '$price', SoLuongHang = '$quantity', MaLoaiHang = '$category_id' where MSHH = '$id'";
			break;
	}
	executeQuery($query);
	header('Location: ./');
	die();
}