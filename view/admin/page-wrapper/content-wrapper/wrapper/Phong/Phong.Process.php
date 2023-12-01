<?php 
// $AllPhong = getAllPhong();

//Lấy một dữ liệu
function getPhongByID($editID) {
    $sql = "SELECT * FROM Phong WHERE ID = ?";
    return pdo_query_one($sql, $editID);

}
//Lấy tất cả dữ liệu
function getAllPhong(){
    $sql = "SELECT 
    p.ID, p.TenPhong,p.ViTriPhong,p.TrangThaiPhong,p.AnhPhong,
    lp.ten, lp.MoTa, lp.GiaPhongChung
    FROM phong p 
    LEFT JOIN loaiphong lp ON p.ID_LoaiPhong = lp.ID";
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
    //Header là không cần thiết vì đơn giản là nó có cái action ở form rồi.
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