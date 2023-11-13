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
    <div class="container mt-4">
        <div class="mb-3">
            <label for="TenLPhong" class="form-label">Tên phòng</label>
            <input type="text" class="form-control" id="TenLoaiPhong" name="TenPhong" required>
        </div>

        <div class="mb-3">
            <label for="ViTriPhong" class="form-label">Vị trí phòng</label>
            <select class="form-select" name="ViTriPhong">
                <option value="Tầng 1">Tầng 1</option>
                <option value="Tầng 2">Tầng 2</option>
                <option value="Tầng 3">Tầng 3</option>
                <option value="Tầng 4">Tầng 4</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="TrangThaiPhong" class="form-label">Trạng thái phòng:</label>
            <select class="form-select" name="TrangThaiPhong">
                <option value="Phòng trống">Phòng trống</option>
                <option value="Phòng đã được đặt">Phòng đã được đặt</option>
                <option value="Phòng đang có người ở">Phòng đang có người ở</option>
                <option value="Phòng đang tu sửa">Phòng đang tu sửa</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="AnhPhong" class="form-label">Nhập hình ảnh phòng</label>
            <input type="file" class="form-control" id="AnhPhong" name="AnhPhong">
        </div>

        <div class="mb-3">
            <label for="SoLuongDichVu" class="form-label">Số lượng dịch vụ</label>
            <input type="number" class="form-control" name="SoLuongDichVu" id="SoLuongDichVu">
        </div>

        <div class="mb-3">
            <label for="TongGiaDichVu" class="form-label">Tổng giá dịch vụ</label>
            <input type="text" class="form-control" disabled>
        </div>

        <div class="mb-3">
            <label for="LoaiPhongID" class="form-label">Loại phòng:</label>
            <select class="form-select" name="LoaiPhongID" id="LoaiPhongID">
                <?php
                // Lấy tất cả dữ liệu từ bảng LoaiPhong
                $loaiPhongList = getAllLoaiPhong();

                // Duyệt qua danh sách và tạo tùy chọn cho dropdown
                foreach ($loaiPhongList as $loaiPhong) {
                    echo '<option value="' . $loaiPhong['ID'] . '">' . $loaiPhong['TenLoai'] . '</option>';
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name="addPhong">Thêm</button>
    </div>
</form>


</div>
</body>
</html>