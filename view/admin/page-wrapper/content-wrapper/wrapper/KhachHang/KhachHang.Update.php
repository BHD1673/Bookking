<form action="" method="POST" enctype="multipart/form-data" class="p-3">
    <h1>Tạo một tài khoản tạm thời</h1>
    <input type="number" name="ID" id="ID" style="display:none">
    <div class="form-group">
        <!-- Username -->
        <label for="username">Tên tài khoản:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="form-group">
        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group">
        <!-- Password -->
        <label for="password">Mật khẩu :</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="form-group">
        <!-- Address -->
        <label for="address">Địa chỉ nhà:</label>
        <input type="text" class="form-control" id="address" name="address">
    </div>

    <div class="form-group">
        <!-- Image Upload -->
        <label for="image">Hình ảnh xác nhận:</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Tạo tài khoản mới</button>
</form>
