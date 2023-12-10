<?php
// Lấy tất cả dữ liệu
$allLoaiPhong = getAllLoaiPhong();

// Thêm mới
function insertLoaiPhong($Ten, $MoTa, $GiaPhongChung){
    $sql = "INSERT INTO loaiphong(Ten, MoTa, GiaPhongChung) VALUES (?, ?, ?)";
    
    pdo_execute($sql, $Ten, $MoTa, $GiaPhongChung);
}

// Cập nhật
function updateLoaiPhong($ID, $Ten, $MoTa, $GiaPhongChung){
    $sql = "UPDATE `loaiphong` SET `ID` = ?, `Ten` = ?, `MoTa` = ?, `GiaPhongChung` = ? WHERE `loaiphong`.`ID` = ?";
    pdo_execute($sql, $ID, $Ten, $MoTa, $GiaPhongChung,  $ID);
    

    header("Location: LoaiPhong.View.php");
    exit(); 
}


// Lấy tất cả dữ liệu
function getAllLoaiPhong($limit = PHP_INT_MAX) {
    $sql = "SELECT * FROM loaiphong LIMIT $limit";
    return pdo_query($sql);
}


// Lấy một bản ghi
function getLoaiPhongByID($ID){
    $sql = "SELECT * FROM loaiphong WHERE ID=?";
    return pdo_query_one($sql, $ID);
}

// // Xóa phòng nối đến danh mục phòng
// function deletePhongFromDanhMucPhong($loaiPhongID) {
//     $sql = "DELETE FROM Phong WHERE ThuocLoaiPhong = ?";
//     pdo_execute($sql, $loaiPhongID);
// }

// // Xóa danh mục phòng
// function deleteLoaiPhong($ID){
//     // Sử dụng function xóa phòng trước
//     deletePhongFromDanhMucPhong($ID);

//     // Sau đấy thì xóa loại phòng. Nếu không có phòng thì sẽ tự động xóa
//     $sql = "DELETE FROM LoaiPhong WHERE ID = ?";
//     pdo_execute($sql, $ID);

//     header("Location: ?act=QuanLyLoaiPhong");
//     exit(); 
// }

// // Xử lý xóa
// if (isset($_GET["deleteID"])) {
//     $deleteID = $_GET["deleteID"];
//     deleteLoaiPhong($deleteID);
// }


// // Xử lý cập nhật
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateLoaiPhong"])) {
//     $ID = $_POST["ID"]; // ID của bản ghi cần cập nhật
//     $TenLoaiPhong = $_POST["Ten"];
//     $MoTaLoai = $_POST["MoTa"];
//     $GiaPhongChung = $_POST["GiaPhongChung"];
//     updateLoaiPhong($ID, $Ten, $MoTa, $GiaPhongChung);
// }
?>
