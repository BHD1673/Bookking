<?php 
function getAllPhongTrong($NgayCheckInDuKien, $NgayCheckoutDuKien) {
    $sql = "SELECT lp.*, p.*
            FROM loaiphong lp
            LEFT JOIN phong AS p ON lp.ID = p.ID_LoaiPhong
            WHERE NOT EXISTS (
                SELECT 1
                FROM ganphong gp
                JOIN datphong dp ON gp.IDDatPhong = dp.ID
                WHERE gp.IDPhong = p.ID
                AND (
                    (dp.NgayCheckIn <= ? AND dp.NgayCheckOut >= ?) OR
                    (dp.NgayCheckIn < ? AND dp.NgayCheckOut >= ?) OR
                    (dp.NgayCheckIn >= ? AND dp.NgayCheckOut <= ?)
                )
            )";
//     //In ra bao gồm :
//     //Loại phòng: ID, Ten, MoTa, GiaPhongChung
//     //Phòng: ID, TenPhong, ViTriPhong, TrangThaiPhong, AnhPhongm ID_LoaiPhong
    return pdo_query($sql, $NgayCheckInDuKien, $NgayCheckoutDuKien);
}


$allDonDatPhong = getAllDatPhong();
function getAllDatPhong() {
    $sql = "SELECT * FROM datphong";
    return pdo_query($sql);
}


?>