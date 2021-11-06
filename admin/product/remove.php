<?php
    session_start();
    require_once('../../db/queries.php');
    require_once('../../utils/util.php');

    if(!empty($_POST)) {
        $productId = getDataByMethod('POST', 'productId');
        $query = "Delete from HangHoa where MSHH = $productId";
        executeQuery($query);
    }
?>