<?php

function loadall_sanphamtheodanhmuc_home()
{
  $ID = isset($_GET['ID']) ? $_GET['ID'] : 0;
  $sql = "SELECT * FROM phong JOIN loaiphong ON phong.ID_LoaiPhong = loaiphong.ID WHERE ID_LoaiPhong = $ID";
  $listsptheodm = pdo_query($sql);
  return $listsptheodm;
}