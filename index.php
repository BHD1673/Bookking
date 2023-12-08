<?php
session_start();
ob_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/sanphamtheodanhmuc.php";
include "model/redirect.php";
include "global.php";
include "view/header.php";


include "model/taikhoan.php";
$roomnew = loadall_room_home();
$roomdm = loadall_danhmuc_home();
$sptheodm = loadall_sanphamtheodanhmuc_home();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'roomlist':
            include('view/roomlist.php');
            break;
        case "sanpham":
            // lấy dữ liệu
            if (isset($_GET['ID']) && ($_GET['ID'] > 0)) {
                $ID = $_GET['ID'];
            } else {
                $iddm = 0;
            }
            $dssp = showsp($ID);
            $tendm = loadall_room_home($iddm);
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
        //Phần này đang chả biết nó làm gì
        case "danhmuc":
            include "view/gallery.php";
            break;
        case "thoat":
            session_unset();
            header('location: index.php');
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;

                    // Kiểm tra vai trò
                    if ($checkuser['Role'] == 1) {
                        // Nếu vai trò là 1 (admin), chuyển hướng đến trang quản trị admin
                        echo "<script>
                            window.location.href='admin.php';
                        </script>";
                    } else {
                        // Nếu vai trò là người dùng thông thường, chuyển hướng đến trang chính
                        echo "<script>
                            window.location.href='index.php';
                        </script>";
                    }
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
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
            // case 'doimatkhau':
            //     if (isset($_POST['doimatkhau'])) {
            //         $pass = trim($_POST['pass']);

            //         $thongbao = "ĐỔI MẬT KHẨU THÀNH CÔNG";

            //         update_matkhau($MatKhau, $id);
            //         header('Location:index.php?act=doimatkhau');
            //     }
            //     include "view/user/doimatkhau.php";
            //     break;
        case 'thongtintk':
            if (isset($_POST['capnhat'])) {
                $user = trim($_POST['user']);
                $email = trim($_POST['email']);
                $address = trim($_POST['address']);
                $tel = $_POST['tel'];
                $date = $_POST['ngaysinh'];
                $id = $_POST['id'];

                update_taikhoan($user, $email, $address, $id, $tel, $date);
                $_SESSION['user'] = getUserByUsernameAndEmail($user, $email);
                header('Location:index.php?act=thongtintk');
            }
            include "view/user/thongtintk.php";
            break;
        case "thongtin":
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Kiểm tra xem các trường dữ liệu đã được gửi từ biểu mẫu hay chưa
                if (isset($_POST['book']) && isset($_POST['book'])) {
                    $name = $_POST['visitor_name'];
                    $email = $_POST['visitor_email'];
                    $phone = $_POST['visitor_phone'];
                    $dateIn = $_POST['DateIn'];
                    $dateOut = $_POST['DateOut'];

                    // Gọi hàm để thêm dữ liệu vào cơ sở dữ liệu
                    // insertData($checkin, $checkout, $name, $email,$phone);
                } else {
                    echo "Bạn đang viết sai.";
                }
            }
            include "stearm/checkout.php";
            break;
        case "bill":
            if (isset($_GET['idkh']) && ($_GET['idkh'] > 0)) {
                $id = $_GET['idkh'];
            }
            include "stearm/bill.php";
            break;

        case "about":
            include "view/review.php";
            break;
    }
} else {
    include "view/banner.php";
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dateIn = $_POST['DateIn'];
        $dateOut = $_POST['DateOut'];
        $AmountOfDay = $_POST['AmountOfDay'];
        $_SESSION['AmountOfDay'] = $AmountOfDay;
        $_SESSION['DateIn'] = $dateIn;
        $_SESSION['DateOut'] = $dateOut;
        var_dump($_SESSION);
    }

    include "view/home.php";
}
include "view/footer.php";
?>
