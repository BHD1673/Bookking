
<?php 
include("PDO.php");
include("Phong/Phong.Process.php");
include("LoaiPhong/LoaiPhong.Process.php");
include("DatPhong/DatPhong.Process.php");
include("global.php");
include("KhachHang/KhachHang.Process.php");
?>
<!-- Bắt đầu vào trang chính -->

<?php 

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
            // if (isset($_GET['id'])) {
            //     $editID = $_GET['id'];
                
            // }
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
        case 'QuanLyTaiKhoan':

            include('KhachHang/KhachHang.View.php');

        break;
        case 'AddTaiKhoan':
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // Gán thông tin vào biến sau khi làm sạch để tránh XSS
                $TenKhachHang = htmlspecialchars($_POST['TenKhachHang']);
                $NgaySinh = htmlspecialchars($_POST['NgaySinh']);
                $DiaChiNha = htmlspecialchars($_POST['DiaChiNha']);
                $Email = htmlspecialchars($_POST['Email']);
                $fileName = "";  // Thêm đường fileName

                // Đường dẫn tệp tin được tải lên
                 
                $FilePush = $filePath . basename($_FILES['AnhXacNhan']['name']);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($FilePush, PATHINFO_EXTENSION));
            
                // Kiểm tra xem có phải là file ảnh
                if(isset($_POST['submit'])) {
                    $check = getimagesize($_FILES['AnhXacNhan']['tmp_name']);
                    if($check !== false) {
                        echo "File là ảnh - " . $check["mime"] . ".<br>";
                    } else {
                        echo "File không phải là ảnh.<br>";
                        $uploadOk = 0;
                    }
                }
            
                // Kiểm tra kích thước file ảnh
                if ($_FILES['AnhXacNhan']['size'] > 5000000) {
                    echo "File quá lớn.<br>";
                    $uploadOk = 0;
                }
            
                // Chỉ cho phép một số định dạng ảnh cụ thể
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Chỉ chấp nhận file JPG, JPEG, PNG & GIF.<br>";
                    $uploadOk = 0;
                }
            
                // Thử tải file lên nếu không có lỗi
                if ($uploadOk == 0) {
                    echo "File không thể được tải lên.<br>";
                } else {
                    if (move_uploaded_file($_FILES['AnhXacNhan']['tmp_name'], $FilePush)) {
                        echo "File " . htmlspecialchars($_FILES['AnhXacNhan']['name']) . " đã được tải lên.<br>";
                        $fileName = basename($_FILES['AnhXacNhan']['name']);
                    } else {
                        echo "Có lỗi khi tải file.<br>";
                    }
                }
            
                // Kiểm tra xem các trường bắt buộc có được điền không
                if (empty($TenKhachHang) || empty($NgaySinh) || empty($DiaChiNha) || empty($Email)) {
                    echo "Vui lòng điền đầy đủ thông tin.<br>";
                } else {
                    // Chèn thông tin vào cơ sở dữ liệu
                    InsertKhachHang($TenKhachHang, $NgaySinh, $DiaChiNha, $fileName, $Email);
                    echo "Thông tin khách hàng đã được nhập thành công.<br>";
                }
            
                // Hiển thị thông tin để kiểm tra
                var_dump($TenKhachHang, $NgaySinh, $DiaChiNha, $Email, $fileName);
            }
            
            include('KhachHang/KhachHang.Add.php');
        break;
        case 'UpdateTaiKhoan':
            include('KhacHang/KhachHang.Update.php');
        break;
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