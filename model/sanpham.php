<?php
// hiển thị các phòng
function loadall_room_home(){
    $sql = "SELECT * FROM phong";
    $listroom = pdo_query($sql);
    return $listroom;
}



?>