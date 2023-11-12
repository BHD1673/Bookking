<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Loại Phòng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Thêm Loại Phòng</h2>
    <a href="LoaiPhong.View.php">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Quay lại xem danh sách loại phòng
        </button>
    </a>

    <form method="POST" action="LoaiPhong.Process.php">
        <div class="mb-3">
            <label for="tenLoaiPhong" class="form-label">Tên Loại Phòng</label>
            <input type="text" class="form-control" id="tenLoaiPhong" name="tenLoaiPhong" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addLoaiPhong">Thêm</button>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
