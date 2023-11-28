<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/sanphamtheodanhmuc.php";
include "global.php";
include "view/header.php";
include "view/banner.php";
include "model/taikhoan.php";
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
            if (isset($_GET['ID']) && ($_GET['ID'] > 0)) {
                $ID = $_GET['ID'];
            } else {
                $ID = 0; // Sửa biến ở đây
            }
            $dssp = showsp($ID);
            $roomnew = loadall_room_home($ID);
            include "view/room.php";
            break;

        case "sanphamct":
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_zoom_home($id);
                extract($onesp);
            }
            include "stearm/roomdetails.php";
            break;
        case "danhmuc":
            include "view/gallery.php";
            break;
        case "thoat":

            session_unset();
            header('location: index.php');
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap'])) {
                $login = dangnhap($_POST['email'], $_POST['pass']);
                header('location: index.php');
            }
            include "view/user/singup.php";
            break;
        case "dangky":
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $user = $_POST['user'];
                insert_taikhoan($email, $user, $pass);
            }
            include "view/user/singup.php";
            break;
        case "forgot":
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];

                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['MatKhau'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
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
