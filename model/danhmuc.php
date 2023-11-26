<?php
// hiển thị các phòng
function loadall_danhmuc_home(){
    $sql = "SELECT * FROM loaiphong";
    $listdm = pdo_query($sql);
    return $listdm;
}

<<<<<<< HEAD


?>
=======
?>
>>>>>>> 89c2d0a5ec0d5e74a63f8b1e548070681bec67b2
