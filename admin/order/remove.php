<?php
    session_start();
    require_once('../../db/queries.php');
    require_once('../../utils/util.php');
    
    if(!empty($_POST)) {
        $orderId = getDataByMethod('POST', 'orderId');
        $query = "Update DatHang set TrangThaiDH = '9999' where SoDonDH = $orderId";
        executeQuery($query);
    }
?>