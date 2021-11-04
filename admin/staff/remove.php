<?php
    session_start();
    require_once('../../db/queries.php');
    require_once('../../utils/util.php');

    if(!empty($_POST)) {
        $password = getHashPassword('nguyrnxdnmkri489%9128%$%0124>,..fjdfgh');
        $userId = getDataByMethod('POST', 'userId');
        $query = "update NhanVien set Password = '$password' where MSNV = $userId";
        executeQuery($query);
    }
?>