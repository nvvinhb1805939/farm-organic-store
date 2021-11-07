<?php

if(!empty($_POST)) {
	$query1 = $query2 = $lastProductId = "";
	$id = getDataByMethod('POST', 'id');
	$isUpdate = getDataByMethod('POST', 'isUpdate');
	$name = getDataByMethod('POST', 'name');
	$category_id = getDataByMethod('POST', 'category_id');
	$desc = getDataByMethod('POST', 'desc');
	$price = getDataByMethod('POST', 'price');
	$quantity = getDataByMethod('POST', 'quantity');
	$url = getDataByMethod('POST', 'url');
	
	switch($isUpdate) {
		case 0:
			$query1 = "insert into HangHoa(TenHH, QuyCach, Gia, SoLuongHang, MaLoaiHang) values ('$name', '$desc', '$price', '$quantity', '$category_id')";
			break;
		case 1: 
			$query1 = "update HangHoa set TenHH = '$name', QuyCach = '$desc', Gia = '$price', SoLuongHang = '$quantity', MaLoaiHang = '$category_id' where MSHH = '$id'";
			$query2 = "update HinhHangHoa set TenHinh = '$url' where MSHH = '$id'";
			break;
	}
	executeQuery($query1);
	if($isUpdate == 0) {
		$lastProductIdQuery = "select MSHH From HangHoa ORDER BY MSHH DESC LIMIT 1";
		$lastProductId = reset(getDataBySelect($lastProductIdQuery, true));
		$query2 = "insert into HinhHangHoa(TenHinh, MSHH) values ('$url', '$lastProductId')";
	}
	executeQuery($query2);
	header('Location: ./');
	die();
}