<?php 
$AllPhong = getAllPhong();
<<<<<<< HEAD
=======

<<<<<<< HEAD


=======
>>>>>>> 89c2d0a5ec0d5e74a63f8b1e548070681bec67b2
//Xử lý xóa

//Xử lý cập nhật

<<<<<<< HEAD
=======
>>>>>>> b8996f7a9dc98a2fa1922d98e7316447e912a4f4
//Lấy một dữ liệu
function getPhongByID($editID) {
    $sql = "SELECT * FROM Phong WHERE ID = ?";
    return pdo_query_one($sql, $editID);

}
>>>>>>> 89c2d0a5ec0d5e74a63f8b1e548070681bec67b2
//Lấy tất cả dữ liệu
function getAllPhong(){
    $sql = "
    SELECT 
        Phong.ID,
        Phong.TenPhong,
        Phong.ViTriPhong,
        Phong.TrangThaiPhong,
        Phong.AnhPhong,
        LoaiPhong.TenLoai,
        LoaiPhong.GiaPhongChung
    FROM 
        Phong
    JOIN 
        LoaiPhong ON Phong.ThuocLoaiPhong = LoaiPhong.ID;
";
    return pdo_query($sql);
}

//Thêm mới
function InsertPhong($TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $LoaiPhongID) {
    $sql = "INSERT INTO TenBang (TenPhong, ViTriPhong, TrangThaiPhong, AnhPhong, LoaiPhongID) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $LoaiPhongID);

    // Thêm thành công, có thể thực hiện các hành động khác nếu cần
    echo "Thêm phòng thành công!";
}

//Cập nhật
function UpdatePhong($TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $LoaiPhongID) {
    $sql = "UPDATE `phong` SET `TenPhong`=?,`TrangThaiPhong`=?,`LoaiPhongID`=? WHERE ID= ?";
    pdo_execute($sql, $TenPhong, $ViTriPhong, $TrangThaiPhong, $AnhPhong, $LoaiPhongID);
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