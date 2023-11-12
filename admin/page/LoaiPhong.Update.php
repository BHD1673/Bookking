<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
    <title>Sửa Loại Phòng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Sửa Loại Phòng</h2>

    <a href="LoaiPhong.View.php">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Quay lại xem danh sách loại phòng
        </button>
    </a>
    <?php
    include 'PDO.php';
    include 'LoaiPhong.Process.php';

    if(isset($_GET['editID'])) {
        $editID = $_GET['editID'];
        $loaiPhong = getLoaiPhongByID($editID);

        if($loaiPhong) {
            echo '<form method="POST" action="LoaiPhong.Process.php">
            <input type="hidden" name="ID" value="' . $loaiPhong['ID'] . '">
            <div class="mb-3">
                <label for="TenLoaiPhong" class="form-label">Tên Loại Phòng</label>
                <input type="text" class="form-control" id="TenLoaiPhong" name="TenLoaiPhong" value="' . $loaiPhong['TenLoai'] . '" required>
            </div>
            <div class="mb-3">
                <label for="MoTaLoai" class="form-label">Mô tả : </label>
                <input type="text" class="form-control" id="MoTaLoai" name="MoTaLoai" value="' . $loaiPhong['MoTaLoai'] . '" required>
            </div>
            <div class="mb-3">
                <label for="GiaPhongChung" class="form-label">Giá phòng chung</label>
                <input type="number" class="form-control" id="GiaPhongChung" name="GiaPhongChung" value="' . $loaiPhong['GiaPhongChung'] . '" required>
            </div>
            <button type="submit" class="btn btn-primary" name="updateLoaiPhong">Cập nhật</button>
        </form>';

            
        } else {
            echo "Không tìm thấy Loại Phòng.";
        }
    } else {
        echo "ID không được cung cấp.";
    }
    ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
