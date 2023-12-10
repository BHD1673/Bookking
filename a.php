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


$roomnew = loadall_room_home();
$roomdm = loadall_danhmuc_home();
$sptheodm = loadall_sanphamtheodanhmuc_home();

// Phần điều hướng sản phẩm chính
if (isset($_GET['act'])) {
    $hanhDong = $_GET['act'];
    xuLyHanhDong($hanhDong);
} else {
    hienThiTrangChu();
}

// Bao gồm phần cuối trang
include "view/footer.php";

// Hàm để xử lý điều hướng hành động
function xuLyHanhDong($hanhDong) {
    switch ($hanhDong) {
        case 'timphong':
            xuLyformTimPhong();
            break;
        case 'phong':
            hienThiPhong();
            break;
        case 'chitietphong':
            hienThiChiTietPhong();
            break;
        case 'dangxuat':
            dangXuatNguoiDung();
            break;
        case 'dangnhap':
            dangNhapNguoiDung();
            break;
        case 'dangky':
            dangKyNguoiDung();
            break;
        case 'quenmatkhau':
            quenMatKhau();
            break;
        case 'chitiettaikhoan':
            chitiettaikhoan();
            break;
        case 'capnhatthongtin':
            capNhatThongTinCaNhan();
            break;
        case 'xacnhan':
            xacNhanThongTin();
            break;
        case 'hoadon':
            hienThiHoaDon();
            break;
        case 'gioithieu':
            include "view/danhgia.php";
            break;
        default:
            hienThiTrangChu();
            break;
    }
}

//Chi tiết tài khoản phải sửa lại là trừ khi nó có muốn cập nhật hẵng cho cập nhật
function chiTietTaiKhoan() {
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
}

function hienThiTrangChu() {
    include "view/banner.php";
    xuLyFormTimPhong();
    include "view/home.php";
}

//Phần này là triển khai để hiển thị loại phòng sau khi tìm
//kiếm, nếu không tìm kiếm khoảng phòng thì phần này sẽ không hiển thị
//Có thể đặt validate session chưa được gán cho ngày vào và ngày ra.
//Phần này tồn tại các biến như sau
//Thời gian vào
//Thời gian đi
//Khoảng cách giữa ngày vào và ngày đi
function xuLyformTimPhong() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dateIn = $_POST['DateIn'];
        $dateOut = $_POST['DateOut'];
        $AmountOfDay = $_POST['AmountOfDay'];
        $_SESSION['AmountOfDay'] = $AmountOfDay;
        $_SESSION['DateIn'] = $dateIn;
        $_SESSION['DateOut'] = $dateOut;
        var_dump($_SESSION);
        header("LOCATION: index.php?act=phong");
    }
}


function hienThiPhong() { 
    include('view/roomlist.php');
}

//Cái chỗ này không cần thiết phải là idsp, vì mình dựa trên loại phòng là thứ yếu
//còn cái PHÒNG thì nó chỉ quan trọng hơn cho admin thôi. Cứ thử nghĩ cho vào giỏ hàng
//như thế nào đi
//Hiệp giúp tôi sửa lại là được
function hienThiChiTietPhong() {
    if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
        $id = $_GET['idsp'];
        $onesp = loadone_zoom_home($id);
        extract($onesp);
    }
    include "stearm/roomdetails.php";
}

//unset thế này toác hết cả site đấy :v
//Hiệp xem sửa lại chỗ này
function dangXuatNguoiDung() {
    session_unset();
    header('Location: index.php');
}


//Cần Hiệp ghi chú lại phần này
function dangNhapNguoiDung() {
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
}


//Phần này tạm ổn
function dangKyNguoiDung() {
    if (isset($_POST['dangky']) && ($_POST['dangky'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $user = $_POST['user'];
        insert_taikhoan($email, $user, $pass);
    }
    include "view/user/singup.php";
}

//Cần Hiệp thiết kế lại phần này.
function quenMatKhau() {
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
}

//Cần Hiệp thiết kế lại phần này.
//Phần thông tin khách hàng không thể nào mà vất vào một cái form
//trắng như vậy. Bắt buộc phải in ra. Không vẽ được HTML thì vất cho
//bot nó làm. Còn phần hình ảnh bắt buộc phải làm được
function capNhatThongTinCaNhan() {
    // Triển khai logic cập nhật thông tin cá nhân
}

function xacNhanThongTin() {
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
}

// Cần Hiệp viết lại, thế này không ổn.
function hienThiHoaDon() {
    if (isset($_GET['idkh']) && ($_GET['idkh'] > 0)) {
        $id = $_GET['idkh'];
    }
    include "stearm/bill.php";
}

// Cần Thiện cắt cái này
function aboutUs() {
    include "view/review.php";
}

?>
