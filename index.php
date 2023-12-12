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
            //Phần này đang chả biết nó làm gì
        case "danhmuc":
            include "view/gallery.php";
            break;
        case "thoat":
            unset($_SESSION['user']);
            unset($_SESSION['pass']);
            unset($_SESSION['role']);
            header('Location: index.php');
            exit();
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
                        $_SESSION['role'] = 1;
                        // Nếu vai trò là 1 (admin), chuyển hướng đến trang quản trị admin
                        echo "<script>
                            window.location.href='admin.php';
                        </script>";
                    } else {
                        $_SESSION['role'] = 0;
                        // Nếu vai trò là người dùng thông thường, chuyển hướng đến trang chính
                        echo "<script>
                            window.location.href='index.php';
                        </script>";
                    }
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
                if($count>0){
                    $row_data = mysqli_fetch_array($row);
                    $_SESSION['dangky'] = $row_data['TenKhachHang'];
                    $_SESSION['email'] = $row_data['Email'];
                    $_SESSION['IDKhachHang'] = $row_data['ID'];
                    
                }else{
                    echo "Mật khẩu hoặc Email sai vui lòng nhập lại";
                }
            }
            include "view/user/singup.php";
            break;
        case "chitiettk":
            include "view/user/chitiettk.php";
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
            // case "doimk":
            //     if (isset($_POST['submit']) && ($_POST['submit'])) {
            //         $password = $_POST['password'];
            //         $newpassword = $_POST['newpassword'];
            //         $repassword = $_POST['repassword'];
            //         if (empty($password) || empty($newpassword) || empty($repassword)) {
            //             $thongbao = "VUI LÒNG NHẬP ĐỦ THÔNG TIN";
            //         } else {
            //             $checkpass = checkpass($password);

            //             if (!password_verify($password, $checkpass['MatKhau'])) {
            //                 $thongbao = "MẬT KHẨU HIỆN TẠI KHÔNG ĐÚNG";
            //             } else if ($newpassword != $repassword) {
            //                 $thongbao = "MẬT KHẨU KHÔNG TRÙNG KHỚP";
            //             } else if (strlen($newpassword) < 6) {
            //                 $thongbao = "MẬT KHẨU MỚI PHẢI CÓ ÍT NHẤT 6 KÝ TỰ";
            //             } else {
            //                 $hashedNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);

            //                 $stmt = $mysqli->prepare("SELECT * FROM khachhang WHERE TenDangNhap = ? LIMIT 1");
            //                 $stmt->bind_param("s", $_SESSION['user']);
            //                 $stmt->execute();
            //                 $result = $stmt->get_result();
            //                 $count = $result->num_rows;

            //                 if ($count > 0) {
            //                     $stmtUpdate = $mysqli->prepare("UPDATE khachhang SET MatKhau = '" . $newpassword . "' WHERE TenDangNhap = ? LIMIT 1");
            //                     $stmtUpdate->bind_param("ss", $hashedNewPassword, $_SESSION['user']);
            //                     $stmtUpdate->execute();

            //                     $thongbao = "MẬT KHẨU ĐÃ ĐƯỢC THAY ĐỔI";
            //                 } else {
            //                     $thongbao = "MẬT KHẨU HIỆN TẠI KHÔNG ĐÚNG";
            //                 }
            //             }
            //         }
            //     }


            //     include "view/user/doimk.php";
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
                    // Lấy id_kh từ bảng đặt phòng
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
