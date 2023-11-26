<?php

function loadall_sanphamtheodanhmuc_home()
{
  $ID = isset($_GET['ID']) ? $_GET['ID'] : 0;
<<<<<<< HEAD
  $sql = "SELECT * FROM phong WHERE ID_LoaiPhong = $ID";
=======
  $sql = "SELECT * FROM phong WHERE ThuocLoaiPhong = $ID";
>>>>>>> 89c2d0a5ec0d5e74a63f8b1e548070681bec67b2
  $listsptheodm = pdo_query($sql);
  return $listsptheodm;
}
