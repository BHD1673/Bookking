<div class="container-md">
    <form action="" method="POST" enctype="multipart/form-data" class="p-3">
        <h1>Tạo Tài Khoản Tạm Thời</h1>

        <!-- Tên Khách Hàng -->
        <div class="form-group">
            <label for="TenKhachHang">Tên khách hàng:</label>
            <input type="text" class="form-control" id="TenKhachHang" name="TenKhachHang" required>
        </div>

        <!-- Địa Chỉ Nhà -->
        <div class="form-group">
            <label for="DiaChiNha">Địa chỉ nhà:</label>
            <input type="text" class="form-control" id="DiaChiNha" name="DiaChiNha">
        </div>

        <!-- Ngày Sinh -->
        <div class="form-group">
            <label for="NgaySinh">Ngày sinh:</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>

        <!-- Hình Ảnh Xác Nhận -->
        <div class="form-group">
            <label for="AnhXacNhan">Hình ảnh xác nhận:</label>
            <input type="file" class="form-control-file" id="AnhXacNhan" name="AnhXacNhan">
        </div>

        <!-- Nút Submit -->
        <button type="submit" class="btn btn-primary">Tạo Tài Khoản Mới</button>
    </form>
</div>
