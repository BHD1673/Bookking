<?php 
require_once("PDO.php");

//Xử lý thêm mới 

// Import kết nối và các hàm PDO từ file khác nếu cần
// ...

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addPhong"])) {
    // Lấy dữ liệu từ form
    $TenPhong = $_POST["TenPhong"];
    $ViTriPhong = $_POST["ViTriPhong"];
    $TrangThaiPhong = $_POST["TrangThaiPhong"];
    // Xử lý input hình ảnh
    $uploadDirectory = "uploads/";
    $anhPhong = $uploadDirectory . basename($_FILES["AnhPhong"]["name"]);

    if (move_uploaded_file($_FILES["AnhPhong"]["tmp_name"], $anhPhong)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }

    $SoLuongDichVu = $_POST["SoLuongDichVu"];
    $TongGiaDichVu = $_POST["TongGiaDichVu"];
    $LoaiPhongID = $_POST["LoaiPhongID"];

    InsertPhong($TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $SoLuongDichVu, $LoaiPhongID);
    header("Location: Phong.View.php");
    // Access form data
    $submittedData = $_POST;

    // Print or display the result
    echo "<pre>";
    print_r($submittedData);
    echo "</pre>";

}


$AllPhong = getAllPhong();



//Xử lý xóa

//Xử lý cập nhật

//Lấy tất cả dữ liệu
function getAllPhong(){
    $sql = "SELECT * FROM Phong";
    return pdo_query($sql);
}

//Thêm mới
function InsertPhong($TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $SoLuongDichVu, $LoaiPhongID) {
    $sql = "INSERT INTO TenBang (TenPhong, ViTriPhong, TrangThaiPhong, AnhPhong, SoLuongDichVu, TongGiaDichVu, LoaiPhongID) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $SoLuongDichVu, $LoaiPhongID);

    // Thêm thành công, có thể thực hiện các hành động khác nếu cần
    echo "Thêm phòng thành công!";
}
function UpdatePhong($TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $SoLuongDichVu, $LoaiPhongID) {
    $sql = "UPDATE `phong` SET `TenPhong`=?,`TrangThaiPhong`=?,`LoaiPhongID`=? WHERE ID= ?";
    pdo_execute($sql, $TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $SoLuongDichVu, $LoaiPhongID);
    header("Location: Phong.View.php");
    exit(); 
}



















    // Kiểm tra dữ liệu đầu vào (thêm kiểm tra hợp lệ và bảo mật theo nhu cầu của bạn)
    // if (empty($tenPhong) || empty($loaiPhongID)) {
    //     // Xử lý lỗi, ví dụ: hiển thị thông báo cho người dùng
    //     echo "Vui lòng nhập đầy đủ thông tin.";
    // } else {
    //     try {
    //         InsertPhong($TenPhong, $TrangThaiPhong, $LoaiPhongID);
    //     } catch (Exception $e) {
    //         // Xử lý lỗi, ví dụ: hiển thị thông báo cho người dùng hoặc ghi log
    //         echo "Lỗi khi thêm phòng: " . $e->getMessage();
    //     }
    // }

?>