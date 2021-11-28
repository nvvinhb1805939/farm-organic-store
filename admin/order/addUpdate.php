<?php
    session_start();
    require_once('../../db/queries.php');
    require_once('../../utils/util.php');
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    if(!empty($_POST)) {
        $query = "";
        $orderId = getDataByMethod('POST', 'orderId');
        $orderStatus = getDataByMethod('POST', 'orderStatus');
        $successDate = date('Y-m-d H:i a');
        $orderStatus++;
        $query = $orderStatus == 3 
            ? "Update DatHang set TrangThaiDH = '$orderStatus', NgayGH = '$successDate' where SoDonDH = $orderId"
            : "Update DatHang set TrangThaiDH = '$orderStatus' where SoDonDH = $orderId";
        executeQuery($query);
    }
?>