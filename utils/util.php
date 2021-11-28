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

function redirectUrl($originUrl, $currentPath) {
	$currentUrl = $currentPath . substr($originUrl, 6);
	return $currentUrl;
}
