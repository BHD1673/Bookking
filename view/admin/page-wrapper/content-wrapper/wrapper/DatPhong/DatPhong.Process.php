<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NgayCheckInDuKien = $_POST["checkin"];
    $NgayCheckoutDuKien = $_POST["checkout"];

    //Viết validate ở đây

    $result = getAllPhongTrong($NgayCheckInDuKien, $NgayCheckoutDuKien);

}

function getAllPhongTrong($NgayCheckInDuKien, $NgayCheckoutDuKien) {
    $sql = "
        SELECT p.ID, p.TenPhong, p.ViTriPhong, p.TrangThaiPhong
        FROM phong p
        LEFT JOIN ganphong gp ON p.ID = gp.IDPhong
        LEFT JOIN datphong dp ON gp.IDDatPhong = dp.ID
        LEFT JOIN datphong dp2 ON gp.IDPhong = dp2.IDGanPhong
        WHERE (
                (dp.NgayCheckIn IS NULL OR dp.NgayCheckOut IS NULL OR dp.NgayCheckIn > ? OR dp.NgayCheckOut < ?)
                OR 
                (dp.TrangThaiDon = '1' AND p.TrangThaiPhong = 'Còn trống')
            )
           AND (
                dp2.ID IS NULL
                OR 
                (
                    dp2.NgayCheckIn BETWEEN ? AND ? 
                    OR dp2.NgayCheckOut BETWEEN ? AND ?
                )
                AND NOT (dp2.TrangThaiDon = 'Đã hoàn thiện' AND p.TrangThaiPhong = 'Còn trống')
            )
        GROUP BY p.ID, p.TenPhong, p.ViTriPhong, p.TrangThaiPhong;
    ";

    return pdo_query($sql, $NgayCheckInDuKien, $NgayCheckoutDuKien, $NgayCheckInDuKien, $NgayCheckoutDuKien, $NgayCheckInDuKien, $NgayCheckoutDuKien);
}


$allDonDatPhong = getAllDatPhong();
function getAllDatPhong() {
    $sql = "SELECT * FROM datphong";
    return pdo_query($sql);
}


?>