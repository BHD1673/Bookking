<?php
$OnePhong = getPhongByID($id);

foreach($OnePhong as $roomData):

?>
<form action="" method="post" >
    <!-- ID phòng -->
    <div class="mb-3">
        <label for="IDPhong" class="form-label">ID phòng</label>
        <input type="text" class="form-control" name="ID" value="<?php echo $roomData['TenPhong']; ?>">
    </div>
    <!-- Tên Phòng -->
    <div class="mb-3">
        <label for="TenPhong" class="form-label">Tên Phòng:</label>
        <input type="text" class="form-control" id="TenPhong" name="TenPhong" value="<?php echo $roomData['TenPhong']; ?>" required>
    </div>

    <!-- Vị Trí Phòng -->
    <div class="mb-3">
        <label for="ViTriPhong" class="form-label">Vị Trí Phòng:</label>
        <input type="text" class="form-control" id="ViTriPhong" name="ViTriPhong" value="<?php echo $roomData['ViTriPhong']; ?>" required>
    </div>

    <!-- Trạng Thái Phòng -->
    <div class="mb-3">
        <label for="TrangThaiPhong" class="form-label">Trạng Thái Phòng:</label>
        <input type="text" class="form-control" id="TrangThaiPhong" name="TrangThaiPhong" value="<?php echo $roomData['TrangThaiPhong']; ?>" required>
    </div>

    <!-- Ảnh Phòng -->
    <div class="mb-3">
        <label for="AnhPhong" class="form-label">Ảnh Phòng:</label>
        <input type="file" class="form-control" id="AnhPhong" name="AnhPhong">
        <!-- Show ảnh ở đây -->
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

<?php endforeach; ?>
    <button type="submit" class="btn btn-primary">Cập Nhật Phòng</button>
</form>
