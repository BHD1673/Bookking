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
function InsertPhong($TenPhong, $AnhPhong, $LoaiPhongID) {
    try {
        if ($_FILES["AnhPhong"]["error"] === UPLOAD_ERR_OK) {
            $targetDir = "uploads/"; // Replace with your desired directory
            $targetFile = $targetDir . basename($_FILES["AnhPhong"]["name"]);

            // Check if the file already exists in the target directory
            if (file_exists($targetFile)) {
                echo "File already exists.";
            } else {
                // Check if the file was successfully moved to the target directory
                if (move_uploaded_file($_FILES["AnhPhong"]["tmp_name"], $targetFile)) {
                    // Define the SQL statement with placeholders
                    $sql = "INSERT INTO TenBang (TenPhong, AnhPhong, LoaiPhongID) 
                            VALUES (?, ?, ?)";
                    
                    // Call your pdo_execute function to execute the query with parameters
                    pdo_execute($sql, $TenPhong, $targetFile, $LoaiPhongID);

                    // Thêm thành công, có thể thực hiện các hành động khác nếu cần
                    echo "Thêm phòng thành công!";
                } else {
                    echo "Có lỗi khi lưu tệp ảnh.";
                }
            }
        } else {
            echo "Có lỗi khi tải lên tệp ảnh.";
        }
    } catch (PDOException $e) {
        // Handle any database errors here
        echo "Thêm phòng thất bại: " . $e->getMessage();
    }
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