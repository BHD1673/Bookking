<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    if(isset($_GET['editId'])) {
        $editId = $_GET['editId'];
        $loaiPhong = getLoaiPhongById($editId);

        if($loaiPhong) {
            echo "<form method='POST' action='LoaiPhong.Process.php'>";
            echo "<input type='hidden' name='id' value='{$loaiPhong['Id']}'>";
            echo "<div class='mb-3'>";
            echo "<label for='tenLoaiPhong' class='form-label'>Tên Loại Phòng</label>";
            echo "<input type='text' class='form-control' id='tenLoaiPhong' name='tenLoaiPhong' value='{$loaiPhong['TenLoaiPhong']}' required>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary' name='updateLoaiPhong'>Cập nhật</button>";
            echo "</form>";
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
