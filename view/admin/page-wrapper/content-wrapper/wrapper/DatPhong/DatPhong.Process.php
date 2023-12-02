<?php 
function getAllPhongTrong($NgayCheckInDuKien, $NgayCheckoutDuKien) {
    $sql = 
        "SELECT 
        lp.Ten, 
        lp.MoTa, 
        lp.GiaPhongChung,
        GROUP_CONCAT(p.ID) AS InRaIDPhong,
        COUNT(p.ID) AS DemSoPhong
        FROM 
        loaiphong lp
        LEFT JOIN 
        phong AS p ON lp.ID = p.ID_LoaiPhong
        WHERE 
        NOT EXISTS (
            SELECT 1
            FROM ganphong gp
            JOIN datphong dp ON gp.IDDatPhong = dp.ID
            WHERE gp.IDPhong = p.ID
            AND (
                (dp.NgayCheckIn <= '?' AND dp.NgayCheckOut >= '?') OR
                (dp.NgayCheckIn < '?' AND dp.NgayCheckOut >= '?') OR
                (dp.NgayCheckIn >= '?' AND dp.NgayCheckOut <= '?')
            )
        )
        GROUP BY 
        lp.Ten, lp.MoTa, lp.GiaPhongChung
        ";
    return pdo_query($sql, $NgayCheckInDuKien, $NgayCheckoutDuKien);
}


$allDonDatPhong = getAllDatPhong();
function getAllDatPhong() {
    $sql = "SELECT * FROM datphong";
    return pdo_query($sql);
}


?>