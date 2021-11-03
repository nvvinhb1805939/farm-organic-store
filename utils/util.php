<?php

require_once(__DIR__ . '/../db/config.php');
function getDataByMethod($method, $key)
{
	$connection = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	$value = '';
	$data = '';
	switch ($method) {
		case 'GET':
			$data = $_GET[$key];
			break;
		case 'POST':
			$data = $_POST[$key];
			break;
		case 'REQUEST':
			$data = $_REQUEST[$key];
			break;
		case 'COOKIE':
			$data = $_COOKIE[$key];
			break;
	}
	if (isset($data)) {
		$value = $data;
		$value = mysqli_real_escape_string($connection, $value);
	}
	return trim($value);
}

function getHashPassword($pwd)
{
	return substr(md5(md5($pwd) . PRIVATE_KEY), 0, 12);
}

// function moveFile($key, $rootPath = "../../")
// {
// 	if (!isset($_FILES[$key]) || !isset($_FILES[$key]['name']) || $_FILES[$key]['name'] == '') {
// 		return '';
// 	}

// 	$pathTemp = $_FILES[$key]["tmp_name"];

// 	$filename = $_FILES[$key]['name'];
// 	//filename -> remove special character, ..., ...

// 	$newPath = "assets/photos/" . $filename;

// 	move_uploaded_file($pathTemp, $rootPath . $newPath);

// 	return $newPath;
// }

// function fixUrl($thumbnail, $rootPath = "../../")
// {
// 	if (stripos($thumbnail, 'http://') !== false || stripos($thumbnail, 'https://') !== false) {
// 	} else {
// 		$thumbnail = $rootPath . $thumbnail;
// 	}

// 	return $thumbnail;
// }
