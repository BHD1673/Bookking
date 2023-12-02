<?php
// hiển thị các phòng
function loadall_danhmuc_home(){
    $sql = "SELECT * FROM loaiphong";
    $listdm = pdo_query($sql);
    return $listdm;
}



?>
