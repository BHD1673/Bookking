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
$AmountOfDay = "";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'roomlist':
                //Khai báo lại cho trường hợp muốn sửa khoảng thời gian
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $datetime1 = new DateTime($_POST['DateIn']);
                    $datetime2 = new DateTime($_POST['DateOut']);
                    $interval = $datetime1->diff($datetime2);
                    $amountOfDay = $interval->days;
                
                    // Set the calculated value to the AmountOfDay field in the session
                    $_SESSION['bookingInfor'] = array(
                        'amountOfDay' => $amountOfDay,
                        'dateIn' => $_POST['DateIn'],
                        'dateOut' => $_POST['DateOut']
                    );
                    // Kiểm tra xem giỏ hàng đã tồn tại trong session chưa
                    if (!isset($_SESSION['cart'])) {
                        $_SESSION['cart'] = array();
                    }

                    // Tạo thông tin sản phẩm từ dữ liệu POST
                    $productInfo = array(
                        'idPhong' => $_POST['idPhong'],
                        'tenLoaiPhong' => $_POST['tenLoaiPhong'],
                        'giaPhongChung' => $_POST['giaPhong'],
                        'soLuongPhong' => $_POST['soLuongPhong'],
                        'dateIn' => $_POST['DateIn'],
                        'dateOut' => $_POST['DateOut'],
                        'soNgayO' => $_POST['soNgayO'],
                        'totalPriceWithDay' => $_POST['totalPriceWithDay'],

                    );

                    // Kiểm tra xem loại phòng này đã có trong giỏ hàng chưa
                    $found = false;
                    foreach ($_SESSION['cart'] as $key => $item) {
                        if ($item['idPhong'] == $productInfo['idPhong'] &&
                            $item['dateIn'] == $productInfo['dateIn'] &&
                            $item['dateOut'] == $productInfo['dateOut']) {
                            // Cập nhật số lượng phòng nếu đã có
                            $_SESSION['cart'][$key]['soLuongPhong'] += $productInfo['soLuongPhong'];
                            $found = true;
                            break;
                        }
                    }

                    // Nếu loại phòng này chưa có trong giỏ hàng, thêm sản phẩm mới
                    if (!$found) {
                        array_push($_SESSION['cart'], $productInfo);
                    }

                    // Xử lý yêu cầu sửa
                    if (isset($_POST['action']) && $_POST['action'] == 'update' && isset($_POST['index'])) {
                        $index = $_POST['index'];
                        if (isset($_SESSION['cart'][$index])) {
                            // Cập nhật số lượng phòng
                            $_SESSION['cart'][$index]['soLuongPhong'] = $_POST['soLuongPhong'][$index];
                            // Bạn có thể thêm các cập nhật khác tại đây
                        }
                    }

                    // Xử lý yêu cầu xóa
                    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['index'])) {
                        $index = $_GET['index'];
                        if (isset($_SESSION['cart'][$index])) {
                            // Xóa mục khỏi giỏ hàng
                            unset($_SESSION['cart'][$index]);
                            // Cập nhật lại mảng để loại bỏ khoảng trống
                            $_SESSION['cart'] = array_values($_SESSION['cart']);
                        }
                        header("LOCATION: index.php?act=roomlist");
                    }

                }

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
        case "danhmuc":
            include "view/gallery.php";
            break;
        case "thoat":
            session_unset();
            header('location: index.php');
            break;
        case "dangnhap":
            if(isset($_POST['dangnhap'])&& ($_POST['dangnhap'])){
                $email= $_POST['email'];
                $pass= $_POST['pass'];
                $checkemail = checkemail($email,$pass);
                if(is_array($checkemail)){
                    $_SESSION['email']=$checkemail;
                    echo "<script>
                    window.location.href='index.php';
                    </script>";
                }else{
                    $thongbao="Tài khoản khồng tồn tại";
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
                $user= trim($_POST['user']);
                $email= trim($_POST['email']);
                $address= trim($_POST['address']);
                $tel= $_POST['tel'];
                $date= $_POST['ngaysinh'];
                $id= $_POST['id'];
             
                update_taikhoan($user, $email, $address, $id, $tel,$date);
                $_SESSION['email'] = getUserByUsernameAndEmail($user, $email);
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

                    $idkh = $_POST['IDKhachHang'];

                    // Gọi hàm để thêm dữ liệu vào cơ sở dữ liệu
                    //insertAccount($checkin, $checkout, $name, $email,$phone);
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dateIn = $_POST['DateIn'];
        $dateOut = $_POST['DateOut']; 
        $amountOfDay = $_POST['AmountOfDay'];
    
        // Cho thông tin vào mảng default.
        $_SESSION['bookingInfor'] = array(
            'amountOfDay' => $amountOfDay,
            'dateIn' => $dateIn,
            'dateOut' => $dateOut
        );
        header("Location: index.php?act=roomlist");
        exit();
    }

    include "view/home.php";
}
include "view/footer.php";

?>
