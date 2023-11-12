<?php
require_once("PDO.php");
// Xử lý thêm mới
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addLoaiPhong"])) {
    $tenLoaiPhong = $_POST["tenLoaiPhong"];
    insertLoaiPhong($tenLoaiPhong);
    header("LOCATION: LoaiPhong.View.php");
}

// Xử lý xóa
if (isset($_GET["deleteId"])) {
    $deleteId = $_GET["deleteId"];
    echo "Xóa ID: " . $deleteId; // Add this line for debugging
    deleteLoaiPhong($deleteId);
}

// Xử lý cập nhật
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateLoaiPhong"])) {
    $id = $_POST["id"]; // ID của bản ghi cần cập nhật
    $tenLoaiPhong = $_POST["tenLoaiPhong"];
    updateLoaiPhong($id, $tenLoaiPhong);
}


// Lấy tất cả dữ liệu
$allLoaiPhong = getAllLoaiPhong();

// Thêm mới
function insertLoaiPhong($tenLoaiPhong){
    $sql = "INSERT INTO LoaiPhong (TenLoaiPhong) VALUES (?)";
    pdo_execute($sql, $tenLoaiPhong);
}

// Cập nhật
function updateLoaiPhong($id, $tenLoaiPhong){
    $sql = "UPDATE LoaiPhong SET TenLoaiPhong=? WHERE Id=?";
    pdo_execute($sql, $tenLoaiPhong, $id);

    // Redirect to the update page
    header("Location: LoaiPhong.View.php?id={$id}");
    exit(); // Make sure to exit after the redirection
}



// Xóa
function deleteLoaiPhong($id){
    echo "Deleting record with ID: " . $id; // Add this line for debugging
    $sql = "DELETE FROM LoaiPhong WHERE Id=?";
    pdo_execute($sql, $id);
}

// Lấy tất cả dữ liệu
function getAllLoaiPhong(){
    $sql = "SELECT * FROM LoaiPhong";
    return pdo_query($sql);
}

// Lấy một bản ghi
function getLoaiPhongById($id){
    $sql = "SELECT * FROM LoaiPhong WHERE Id=?";
    return pdo_query_one($sql, $id);
}
?>
