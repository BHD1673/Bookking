<?php
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/sanphamtheodanhmuc.php";
include "model/form.php";
include "global.php";
include "view/header.php";
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
        case "forgot":
            include "view/user/forgot.php";
            break;
        case "thongtin":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Kiểm tra xem các trường dữ liệu đã được gửi từ biểu mẫu hay chưa
                if (isset($_POST['book']) && isset($_POST['book'])) {
                    $name = $_POST['visitor_name'];
                    $email = $_POST['visitor_email'];
                    $phone = $_POST['visitor_phone'];
                    $checkin = $_POST['checkin'];
                    $checkout = $_POST['checkout'];
                    
                    // Gọi hàm để thêm dữ liệu vào cơ sở dữ liệu
                    // insertData($checkin, $checkout, $name, $email,$phone);
                } else {
                    echo "Invalid data submitted.";
                }
            }
            include "stearm/checkout.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
?>