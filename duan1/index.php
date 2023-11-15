<?php
include "view/header.php";
include "view/banner.php";
if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch($act){
        case "about":
            include "view/review.php";
            break;
        case "sanpham":
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
        case "forgot":
            include "view/user/forgot.php";
            break;
        case "thongtin":
            include "stearm/checkout.php";
            break;
    }
}else{
    include "view/home.php";
}

include "view/footer.php";
?>
     
    