<?php
session_start();
include "view/head.php";
include "view/loader.php";
include "view/header.php";
include "model/pdo.php";
include "model/taikhoan.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "sanpham":
            include "view/room.php";
            break;
        case "loaiphong":
            include "view/gallery.php";
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $checkemail = checkemail($email, $pass);
                if (is_array($checkemail)) {
                    $_SESSION['email'] = $checkemail;
                    header('Location: index.php');
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/user/login.php";
            break;
        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $user = $_POST['user'];
                insert_taikhoan($email, $user, $pass);              
            }
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
} else {
    include "view/mainpage.php";
}


include "view/footer.php";
