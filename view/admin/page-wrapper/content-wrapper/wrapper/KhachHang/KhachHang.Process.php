<?php 
// Lấy một dữ liệu duy nhất 
function getKhachHangById($id){
    $sql = "SELECT * FROM khachhang WHERE ID = ?";
    return pdo_query_one($sql, $id);
}

//Lấy tất cả dữ liệu 
function getAllKhachHang() {
    $sql = "SELECT * FROM khachhang";
    return pdo_query($sql);
}


//Thêm mới một khách hàng tạm thời (bên admin)
function InsertKhachHang($TenKhachHang, $NgaySinh, $DiaChiNha, $AnhXacNhan, $Email) {
    $sql = "INSERT INTO `khachhang`(`TenKhachHang`, `NgaySinh`, `DiaChiNha`, `AnhXacNhan`, `Email`) VALUES (? , ? , ?, ?, ?)";
    pdo_execute($sql, $TenKhachHang, $NgaySinh, $DiaChiNha, $AnhXacNhan, $Email);

    echo "Bạn đã thêm một khách hàng mới thành công";
}

function UpdateKhachHang($ID, $TenKhachHang, $NgaySinh, $DiaChiNha, $AnhXacNhan, $Email) {
    // Câu lệnh SQL để cập nhật thông tin khách hàng
    $sql = "UPDATE khachhang SET TenKhachHang = ?, NgaySinh = ?, DiaChiNha = ?, AnhXacNhan = ?, Email = ? WHERE ID = ?";
    pdo_execute($sql, $TenKhachHang, $NgaySinh, $DiaChiNha, $AnhXacNhan, $Email, $ID);

    echo "Thông tin khách hàng đã được cập nhật thành công.";
}



function DeleteKhachHang($id) {
    $sql = "DELETE FROM khachang WHERE ID = ?";
    pdo_execute($sql, $id);
}


?>