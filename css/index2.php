<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/sanphamtheodanhmuc.php";
include "global.php";
include "view/header.php";
include "view/banner.php";
$roomnew = loadall_room_home();
$roomdm = loadall_danhmuc_home();
$sptheodm = loadall_sanphamtheodanhmuc_home();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "about":
            include "view/review.php";
            break;
        case "sanpham":
            // lấy dữ liệu
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = ($_GET['iddm']);
            } else {
                $iddm = 0;
            }
            $tendm = loadall_room_home($iddm);
            include "view/room.php";
            break;
        case "sanphamct":
            include "stearm/roomdetails.php";
            break;
        case "danhmuc":
            include "view/gallery.php";
            break;
        case "hoadon":
            include "stearm/bill.php";
            break;
        case "dangnhap":
            include "view/user/singup.php";
            break;
        case "thongtin":
            include "stearm/checkout.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
