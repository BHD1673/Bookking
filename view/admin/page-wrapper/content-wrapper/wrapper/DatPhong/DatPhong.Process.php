<?php 
//Tìm kiếm đơn đặt phòng trong khoảng thời gian đã cho
function getAllPhongTrong() {
    
    // Check if the session variables are set
    if (isset($_SESSION['NgayCheckIn']) && isset($_SESSION['NgayCheckOut'])) {
        $NgayCheckInDuKien = $_SESSION['NgayCheckIn'];
        $NgayCheckOutDuKien = $_SESSION['NgayCheckOut'];
        $sql = 
            "SELECT 
            lp.ID,
            lp.Ten, 
            lp.MoTa, 
            lp.GiaPhongChung,
            GROUP_CONCAT(p.AnhPhong) AS AnhPhong,
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
                AND dp.NgayCheckIn < ?
                AND dp.NgayCheckOut > ?
            )
        GROUP BY 
            lp.ID,lp.Ten, lp.MoTa, lp.GiaPhongChung
        ";

        return pdo_query($sql, $NgayCheckInDuKien, $NgayCheckOutDuKien);
    } else {
        return "Bạn chưa nhập khoảng thời gian muốn đặt phòng";
    }
}

function HienThiThongTinKhach() {
    if (isset($_SESSION["IDKhachHang"])) {
        $IDKhachHang = $_SESSION["IDKhachHang"];
        $sql = "SELECT TenKhachHang FROM khachhang WHERE ID = ?";
        return pdo_query($sql, $IDKhachHang);
    }
}


function QuickInsert($NgayCheckIn, $NgayCheckOut, $SoNgayO, $TongTien) {
    $sql =
    "INSERT INTO `datphong`(
        `NgayCheckIn`,
        `NgayCheckOut`,
        `SoNgayO`,
        `TongTien`,
        `TrangThaiDon`
    )
    VALUES(
        ?,
        ?,
        ?,
        ?,
        2
    )";
    return pdo_execute($sql, $NgayCheckIn, $NgayCheckOut, $SoNgayO, $TongTien);
}

//Thêm phòng tạm thời vào trong hóa đơn
function InsertRoomIntoDonDatPhong($idKhachHang, $ngayCheckIn, $ngayCheckOut, $soNgayO, $tongSoPhong, $tongTien, $id, $idDatPhong, $idPhong) {
    $sql = "
        START TRANSACTION;

        INSERT INTO `datphong` (
            `IDKhachHang`,
            `NgayCheckIn`,
            `NgayCheckOut`,
            `SoNgayO`,
            `TongSoPhong`,
            `TongTien`
        )
        VALUES (?, ?, ?, ?, ?, ?);

        INSERT INTO `ganphong` (
            `ID`, 
            `IDDatPhong`, 
            `IDPhong`
        )
        VALUES (?, ?, ?);

        COMMIT;
    ";

    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);

        // Thực thi truy vấn với các tham số
        $stmt->execute([$idKhachHang, $ngayCheckIn, $ngayCheckOut, $soNgayO, $tongSoPhong, $tongTien, $id, $idDatPhong, $idPhong]);
    } catch(PDOException $e) {
        // Nếu có lỗi, hủy bỏ transaction
        $conn->rollBack();
        throw $e;
    } finally {
        unset($conn);
    }
    //Lí do phải tạo cái này vì câu truy vấn có phần transaction
}


//Hiển thị toàn bộ đơn đặt phòng
$allDonDatPhong = getAllDatPhong();
function getAllDatPhong() {
    $sql = "SELECT * FROM datphong ";
    return pdo_query($sql);
}
//Hiển thị một đơn đặt phòng
function getOneDatPhong() {
    $sql = "";
    return pdo_query($sql);
}

//Cập nhật thông tin đơn đặt phòng 
function UpdateDonDatPhong() {
    $sql = 
    "UPDATE
    `datphong`
    WHERE
    ID = ?
SET
    `IDKhachHang` = ?,
    `NgayCheckIn` = ?,
    `NgayCheckOut` = ?,
    `SoNgayO` = ?,
    `TongSoPhong` = ?,
    `TongTien` = ?,
    `TienCoc` = ?,
    `TrangThaiDon` = ?

    ";
return pdo_execute($sql);
}

//Cập nhật trạng thái đơn đặt phòng (Không cần phải nhấn cho phần "đơn hoàn thiện" vì lúc này đã set cho nó tự động cập nhât theo ngày)
function UpdateTrangThaiDon($TrangThaiDon, $IDDatPhong) {
    $sql = 
"UPDATE
    `datphong`
SET
    `TrangThaiDon` = ?
WHERE
    ID = ?";
    pdo_execute($sql, $TrangThaiDon, $IDDatPhong);
}

//Xóa đơn đặt phòng 
function DeleteDonDatPhong() {
    $sql = "";
    pdo_execute($sql);
}

?>