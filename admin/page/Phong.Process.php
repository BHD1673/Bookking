<?php 
require_once("PDO.php");

//Xử lý thêm mới 

// Import kết nối và các hàm PDO từ file khác nếu cần
// ...

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addPhong"])) {
    // Lấy dữ liệu từ form
    $TenPhong = $_POST["TenPhong"];
    $TrangThaiPhong = $_POST["TrangThaiPhong"];
    $LoaiPhongID = $_POST["LoaiPhongID"];


    // Kiểm tra xem up cái gì
    echo "Tên phòng: " . $TenPhong . "<br>";
    echo "Trạng thái phòng: " . $TrangThaiPhong . "<br>";
    echo "Loại phòng ID: " . $LoaiPhongID . "<br>";

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form submitted through POST method

    // Access form data
    $submittedData = $_POST;

    // Print or display the result
    echo "<pre>";
    print_r($submittedData);
    echo "</pre>";
}



//Xử lý xóa

//Xử lý cập nhật

//Lấy tất cả dữ liệu

//Thêm mới

function InsertPhong($TenPhong, $TrangThaiPhong, $loaiPhongID) {
    $sql = "INSERT INTO Phong (TenPhong, TrangThaiPhong, LoaiPhongID) VALUES (?, ?, ?)";
    pdo_execute($sql, $TenPhong, $TrangThaiPhong, $loaiPhongID);

    // Thêm thành công, có thể thực hiện các hành động khác nếu cần
    echo "Thêm phòng thành công!";
}
function UpdatePhong($TenPhong, $TrangThaiPhong, $loaiPhongID) {
    $sql = "UPDATE `phong` SET `TenPhong`=?,`TrangThaiPhong`=?,`LoaiPhongID`=? WHERE ID= ?";
    pdo_execute($sql, $TenPhong, $TrangThaiPhong, $loaiPhongID);
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