<?php
session_start();
include "model/pdo.php";
include "model/taikhoan.php";
include "view/header.php";
include "view/banner.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
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
        case "forgot":
            include "view/user/forgot.php";
            break;
        case "thongtin":
            include "stearm/checkout.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
