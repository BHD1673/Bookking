
<?php 
include("PDO.php");
include("Phong/Phong.Process.php");
include("LoaiPhong/LoaiPhong.Process.php");
include("DatPhong/DatPhong.Process.php");
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