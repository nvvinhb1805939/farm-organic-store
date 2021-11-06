<?php

if(!empty($_POST)) {
	$query = "";
	$id = getDataByMethod('POST', 'id');
	$isUpdate = getDataByMethod('POST', 'isUpdate');
	$name = getDataByMethod('POST', 'name');
	
	switch($isUpdate) {
		case 0:
			$query = "insert into LoaiHangHoa(TenLoaiHang) values ('$name')";
			break;
		case 1: 
			$query = "update LoaiHangHoa set TenLoaiHang = '$name' where MaLoaiHang = '$id'";
			break;
	}
	executeQuery($query);
	header('Location: ./');
	die();
}