<?php


// Xóa phòng nối đến danh mục phòng
function deletePhongFromDanhMucPhong($loaiPhongID) {
    $sql = "DELETE FROM Phong WHERE ThuocLoaiPhong = ?";
    pdo_execute($sql, $loaiPhongID);
}

// Xóa danh mục phòng
function deleteLoaiPhong($ID){
    // Sử dụng function xóa phòng trước
    deletePhongFromDanhMucPhong($ID);

    // Sau đấy thì xóa loại phòng. Nếu không có phòng thì sẽ tự động xóa
    $sql = "DELETE FROM LoaiPhong WHERE ID = ?";
    pdo_execute($sql, $ID);

    header("Location: ?act=QuanLyLoaiPhong");
    exit(); 
}

// Xử lý xóa
if (isset($_GET["deleteID"])) {
    $deleteID = $_GET["deleteID"];
    deleteLoaiPhong($deleteID);
}


// Xử lý cập nhật
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateLoaiPhong"])) {
    $ID = $_POST["ID"]; // ID của bản ghi cần cập nhật
    $TenLoaiPhong = $_POST["TenLoaiPhong"];
    $MoTaLoai = $_POST["MoTaLoai"];
    $GiaPhongChung = $_POST["GiaPhongChung"];
    updateLoaiPhong($ID, $TenLoaiPhong, $MoTaLoai, $GiaPhongChung);
}


// Lấy tất cả dữ liệu
$allLoaiPhong = getAllLoaiPhong();

// Thêm mới
function insertLoaiPhong($TenLoaiPhong, $MoTaLoai, $GiaPhongChung){
    $sql = "INSERT INTO LoaiPhong (TenLoai, MoTaLoai, GiaPhongChung) VALUES (?, ?, ?)";
    
    pdo_execute($sql, $TenLoaiPhong, $MoTaLoai, $GiaPhongChung);
}

// Cập nhật
function updateLoaiPhong($ID, $TenLoaiPhong, $MoTaLoai, $GiaPhongChung){
    $sql = "UPDATE `loaiphong` SET `ID` = ?, `TenLoai` = ?, `MoTaLoai` = ?, `GiaPhongChung` = ? WHERE `loaiphong`.`ID` = ?";
    pdo_execute($sql, $ID, $TenLoaiPhong, $MoTaLoai, $GiaPhongChung,  $ID);
    

    header("Location: LoaiPhong.View.php");
    exit(); 
}


// Lấy tất cả dữ liệu
function getAllLoaiPhong(){
    $sql = "SELECT * FROM LoaiPhong";
    return pdo_query($sql);
}

// Lấy một bản ghi
function getLoaiPhongByID($ID){
    $sql = "SELECT * FROM LoaiPhong WHERE ID=?";
    return pdo_query_one($sql, $ID);
}
?>
