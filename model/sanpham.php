<?php
// hiển thị các phòng
function loadall_room_home(){
    $sql = "SELECT * FROM phong";
    $listroom = pdo_query($sql);
    return $listroom;
}
function showsp($ID){
    $sql = "SELECT * FROM phong where 1";
    if($ID>0){
        $sql.="AND ThuocLoaiPhong=".$ID;

    }
    $sql.=" ORDER BY id desc";
    $listroom=pdo_query($sql);
    return  $listroom;


}
function loadone_zoom_home($id)
{
    $sql = "SELECT * from phong where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}


?>