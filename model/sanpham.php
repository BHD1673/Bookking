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
    $sql = "SELECT phong.*, loaiphong.Ten AS TenLoaiPhong, loaiphong.MoTa AS MoTaLoaiPhong, loaiphong.GiaPhongChung AS GiaLoaiPhong
            FROM phong
            LEFT JOIN loaiphong ON phong.ID_LoaiPhong = loaiphong.ID
            WHERE phong.ID=" . $id;

    $sp = pdo_query_one($sql);
    return $sp;
}

?>