<?php
include "view/head.php";
include "view/loader.php";
include "view/header.php";

if(isset($_GET['act'])&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch($act){
        case "sanpham":
            include "view/room.php";
            break;
        case "loaiphong":
            include "view/gallery.php";
            break;
        case "dangnhap":
            include "view/user/login.php";
            break;
        case "sanphamct":
            include "view/roomdetails.php";
            break;
        case "bill":
            include "view/bill.php";
            break;
        case "forgot":
            include "view/user/forgot.php";
            break;
        case "thongtin":
            include "view/checkout.php";
            break;
    }
   
}else{
    include "view/mainpage.php";
}


include "view/footer.php";
?>