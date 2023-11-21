
<div class="container mt-5">
    <h2>Thêm Loại Phòng</h2>
    <a href="LoaiPhong.View.php">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Quay lại xem danh sách loại phòng
        </button>
    </a>

    <form method="POST" action="LoaiPhong.Process.php">
        <div class="mb-3">
            <label for="TenLoaiPhong" class="form-label">Tên Loại Phòng</label>
            <input type="text" class="form-control" ID="TenLoaiPhong" name="TenLoaiPhong" required>
            <label for="MoTaLoai" class="form-label">Mô tả : </label>
            <input type="text" class="form-control" ID="MoTaLoai" name="MoTaLoai" required>
            <label for="GiaPhongChung" class="form-label">Giá phòng chung</label>
            <input type="number" class="form-control" ID="GiaPhongChung" name="GiaPhongChung" required>
        </div>
        <button type="submit" class="btn btn-primary" name="addLoaiPhong">Thêm</button>
    </form>
</div>
