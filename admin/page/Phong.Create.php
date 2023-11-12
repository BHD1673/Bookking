<?php include("LoaiPhong.Process.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
    <title>Thêm phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Thêm Phòng Mới</h2>
    <a href="Phong.View.php">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Quay lại xem danh sách phòng
        </button>
    </a>

    <form method="POST" action="Phong.Process.php">
    <div class="mb-3">
        <label for="Phong" class="form-label">Tên phòng</label>
        <input type="text" class="form-control" ID="TenLoaiPhong" name="TenLoaiPhong" required>
        <label for="TrangThaiPhong">Trạng thái phòng : </label>
        <select name="TrangThaiPhong">
            <option value="1">Phòng trống</option>
            <option value="2">Phồng đã được đặt</option>
            <option value="3">Phòng đang có người ở</option>
            <option value="4">Phòng đang tu sửa</option>
        </select>
        <label for="LoaiPhongID">Loại phòng:</label>
        <select name="LoaiPhongID" ID="LoaiPhongID">
            <?php
            // Lấy tất cả dữ liệu từ bảng LoaiPhong
            $loaiPhongList = getAllLoaiPhong();
            
            // Duyệt qua danh sách và tạo tùy chọn cho dropdown
            foreach ($loaiPhongList as $loaiPhong) {
                echo '<option value="' . $loaiPhong['ID'] . '">' . $loaiPhong['TenLoaiPhong'] . '</option>';
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="addLoaiPhong">Thêm</button>
</form>

</div>
</body>
</html>