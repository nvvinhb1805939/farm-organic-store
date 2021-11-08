<?php
    session_start();
    require_once('../../db/queries.php');
    require_once('../../utils/util.php');

    if(!empty($_POST)) {
        $orderId = getDataByMethod('POST', 'orderId');
        $orderStatus = getDataByMethod('POST', 'orderStatus');
        $successDate = getDataByMethod('POST', 'successDate');
        $orderStatus++;
        $query = "Update DatHang set TrangThaiDH = '$orderStatus', ngayGH = '$successDate' where SoDonDH = $orderId";
        executeQuery($query);
    }
?>