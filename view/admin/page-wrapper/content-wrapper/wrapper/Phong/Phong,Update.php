<?php
$OnePhong = getPhongByID($EditId);
?>

<form action="" method="post" enctype="multipart/form-data">
    <!-- Tên Phòng -->
    <div class="mb-3">
        <label for="TenPhong" class="form-label">Tên Phòng:</label>
        <input type="text" class="form-control" id="TenPhong" name="TenPhong" value="<?php echo htmlspecialchars($roomData['TenPhong']); ?>" required>
    </div>

    <!-- Vị Trí Phòng -->
    <div class="mb-3">
        <label for="ViTriPhong" class="form-label">Vị Trí Phòng:</label>
        <input type="text" class="form-control" id="ViTriPhong" name="ViTriPhong" value="<?php echo htmlspecialchars($roomData['ViTriPhong']); ?>" required>
    </div>

    <!-- Trạng Thái Phòng -->
    <div class="mb-3">
        <label for="TrangThaiPhong" class="form-label">Trạng Thái Phòng:</label>
        <input type="text" class="form-control" id="TrangThaiPhong" name="TrangThaiPhong" value="<?php echo htmlspecialchars($roomData['TrangThaiPhong']); ?>" required>
    </div>

    <!-- Ảnh Phòng -->
    <div class="mb-3">
        <label for="AnhPhong" class="form-label">Ảnh Phòng:</label>
        <input type="file" class="form-control" id="AnhPhong" name="AnhPhong">
        <!-- Existing image can be shown here if needed -->
    </div>

    <!-- Thuộc Loại Phòng -->
    <div class="mb-3">
        <label for="LoaiPhongID" class="form-label">Thuộc Loại Phòng:</label>
        <select class="form-select" id="LoaiPhongID" name="LoaiPhongID" required>
            <?php
            $loaiPhongList = getAllLoaiPhong();
            foreach ($loaiPhongList as $loaiPhong) {
                $selected = ($loaiPhong['ID'] == $roomData['LoaiPhongID']) ? 'selected' : '';
                echo "<option value='" . $loaiPhong['ID'] . "' $selected>" . $loaiPhong['Ten'] . "</option>";
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Cập Nhật Phòng</button>
</form>
