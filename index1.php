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

handleRequest();

include "view/footer.php";


function handleRequest() {
    $action = isset($_GET['act']) ? $_GET['act'] : 'home';
    switch ($action) {
        //Phần này thì chỉ cần tối giản, hoặc xóa luôn cái đống phòng đi là được
        //vì chỉ cần show ra cái chi tiết phòng dựa trên cái bảng loại phòng. Phòng 
        //riêng lẻ sẽ chỉ mang tính chất cho phần đặt phòng, còn đâu ẩn đi hết.
        case 'roomlist':
            handleRoomList();
            break;
        case 'sanpham':
            handleSanPham();
            break;
        case 'sanphamct':
            handleSanPhamChiTiet();
            break;
        //Cái phần này sẽ là hiển thị hóa đơn trước khi chuyển sang cái bước thanh toán sản phẩm
        case 'hoaDonChuaThanhToan':
            showHoaDonChuaThanhToan();
            break;
        //Phần này sẽ hiển thị khi mà admin xác nhận thanh toán hóa đơn
        case 'hoaDonDaThanhToan':
            showHoaDonDaThanhToan();
            break;
        case 'danhmuc':
            danhMuc();
            break;
        case 'dangXuat':
            dangXuatTaiKhoan();
            break;
        case 'dangNhap':
            dangNhap();
            break;
        case 'dangKy':
            dangKy();
            break;
        case 'quenMatKhau':
            quenMatKhau();
            break;
        case 'chiTietTaiKhoan':
            chiTietTaiKhoan();
            break;
        // Thêm các trường hợp khác ở đây
        default:
            displayHomePage();
            break;
    }
}

function handleRoomList() {
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
}

function handleSanPham() {
    // Logic cho trang sản phẩm
    $ID = isset($_GET['ID']) ? $_GET['ID'] : 0;
    $dssp = showsp($ID);
    $tendm = loadall_room_home($ID);
    include "view/room.php";
}

function handleSanPhamChiTiet() {
    // Logic cho trang chi tiết sản phẩm
    $id = isset($_GET['idsp']) ? $_GET['idsp'] : 0;
    $onesp = loadone_zoom_home($id);
    extract($onesp);
    include "stearm/roomdetails.php";
}

function displayHomePage() {
    // Logic hiển thị phần chính, để xử lý cho cái phần banner bị xóa hay không.
    include "view/banner.php";
    include "view/home.php";
}


