<head>
    <title>Thêm Phòng</title>
</head>
<body>
    <h1>Thêm Phòng Mới</h1>
    <div class="container mt-5">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="TenPhong" class="form-label">Tên Phòng:</label>
            <input type="text" class="form-control" id="TenPhong" name="TenPhong" required>
        </div>

        <div class="mb-3">
            <label for="ViTriPhong" class="form-label">Vị Trí Phòng:</label>
            <input type="text" class="form-control" id="ViTriPhong" name="ViTriPhong" required>
        </div>

        <div class="mb-3">
            <label for="TrangThaiPhong" class="form-label">Trạng Thái Phòng:</label>
            <input type="text" class="form-control" id="TrangThaiPhong" name="TrangThaiPhong" required>
        </div>

        <div class="mb-3">
            <label for="AnhPhong" class="form-label">Ảnh Phòng:</label>
            <input type="file" class="form-control" id="AnhPhong" name="AnhPhong">
        </div>

        <button type="submit" class="btn btn-primary">Thêm Phòng</button>

        <div class="mb-3">
            <label for="LoaiPhongID" class="form-label">Thuộc Loại Phòng:</label>
            <select class="form-select" id="LoaiPhongID" name="LoaiPhongID" required>
                <?php
                $loaiPhongList = getAllLoaiPhong();
                foreach ($loaiPhongList as $loaiPhong) {
                    echo "<option value='" . $loaiPhong['ID'] . "'>" . $loaiPhong['TenLoai'] . "</option>";
                }
                ?>
            </select>
        </div>
        
        
    </form>
</div>
</body>
</html>
