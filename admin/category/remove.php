<?php
    session_start();
    require_once('../../db/queries.php');
    require_once('../../utils/util.php');

    if(!empty($_POST)) {
        $categoryId = getDataByMethod('POST', 'categoryId');
        $query = "Delete from LoaiHangHoa where MaLoaiHang = $categoryId";
        executeQuery($query);
    }
?>