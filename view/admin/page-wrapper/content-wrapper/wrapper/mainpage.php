
<?php 
include("PDO.php");
include("Phong/Phong.Process.php");
include("LoaiPhong/LoaiPhong.Process.php");
// include("DatPhong/DatPhong.Process.php");
// include("KhachHang/KhachHang.Process.php");
?>
<!-- Bắt đầu vào trang chính -->

<?php 
// include("LoaiPhong/LoaiPhong.Process.php");
// Kiểm tra xem biến 'act' có được đặt hay không
if (isset($_GET['act'])) {
    $act = $_GET['act'];

    // Xử lý các trường hợp dựa trên giá trị của 'act'
    switch ($act) {
        case 'QuanLyLoaiPhong':
            include('LoaiPhong/LoaiPhong.View.php');
        break;
        case 'AddLoaiPhong':
            include('LoaiPhong/LoaiPhong.Create.php');
        break;
        case 'UpdateLoaiPhong':
            include('LoaiPhong/LoaiPhong.Update.php');
        break;
        case 'AddPhong':
            include('Phong/Phong.Create.php');
        break;
        case 'QuanLyPhong':
            include('Phong/Phong.View.php');
        break;
        case 'UpdatePhong':
            include('Phong/Phong.Update.php');
        break;
        case 'QuanLyDonDatPhong':
            include('DatPhong/DatPhong.View.php');
        break;
        case 'AddPhongIntoAddNewDonHang':
            // if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //     $NgayCheckInDuKien = isset($_POST["checkin"]) ? $_POST["checkin"] : "";
            //     $NgayCheckoutDuKien = isset($_POST["checkout"]) ? $_POST["checkout"] : "";
            
            //     // Validate and sanitize user input (consider using filter_input or prepared statements)
            
            //     $result = getAllPhongTrong($NgayCheckInDuKien, $NgayCheckoutDuKien);
            
            //     if (!empty($result)) {
            //         echo '<h3>Các phòng trống bao gồm:</h3>';
            //         echo '<ul class="list-group">';
            //         echo '<form method="POST">';
            //         echo '<div class="form-check">';
            //         $choiceRoomByRoomID;
            //         foreach ($result as $room) {
            //             if ($room['AvailableRoomIDs'] != null) {
            //                 echo '<li class="list-group-item"> <input class="form-check-input" type="checkbox" id="check' . $room['ID'] . '" name="option1" value="'. $room['ID'] .'"> ' . $room['Ten'] . ' - ' . $room['MoTa'] . ' - ' . $room['GiaPhongChung'] . ' - ' . $room['ID'] . ' - ' . $room['RoomIDs'] .  ' - ' . $room['AvailableRoomIDs'] .  ' - ' . $room['RoomImages'] . '<a href="?act=AddPhongIntoAddNewDonHang"><button type="button" class="btn btn-primary">Chọn phòng</button></a> </li>';
            //             }
            //         }
            //         echo '<div class="mb-1"><a href="?act=AddPhongIntoAddNewDonHang"><button type="button" class="btn btn-primary">Chọn nhiều phòng cùng lúc</button></a></div>';
            //         echo '<div class="mb-1"><a href="admin.php?act=AddDatPhong"><button type="button" class="btn btn-primary">Chọn tất cả các phòng còn lại</button></a></div>';
            //         echo '</form>';
            //         echo '</div>';
            //         echo '</ul>';
            //     } else {
            //         echo '<p class="alert alert-warning">Không có phòng nào phù hợp với yêu cầu của bạn</p>';
            //     }
            // } else {
            //     // Xử lý khi không gửi gì cả
            //     echo '<p>Check</p>';
            // }
            include('DatPhong/DatPhong.Add.php');
            
        break;
        case 'UpdateDonDatPhong':
            include('DatPhong/DatPhong.Update.php');
        break;
        // case 'QuanLyTaiKhoan':
        //     include('KhachHang/KhachHang.View.php');
        // break;
        // case 'AddTaiKhoan':
        //     include('KhachHang/KhachHang.Add.php');
        // break;
        // case 'UpdateTaiKhoan':
        //     include('KhacHang/KhachHang.Update.php');
        // break;
        case 'QuanLyDatPhong':
            include('DatPhong/DatPhong.View.php');
        break;
        case 'AddDatPhong':
            include('DatPhong/DatPhong.Add.php');
        break;
        case 'UpdateDatPhong':
            include('DatPhong/DatPhong.Update.php');
        break;
        // case 'AddDichVu':
        //     include('DichVu/DichVu.Add.php');
        // break;
        // case 'QuanLyDichVu':
        //     include('DichVu/DichVu.View.php');
        // break;
        // case 'UpdateDichVu':
        //     include('DichVu/DichVu.Update.php');
        // break;
        default:
            include('404/404.php');
        break;
    }
} else {
    include('ThongKe/ThongKe.php');
}

?>

<!-- /.container-fluid -->