<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['act']) && $_GET['act'] === 'thongtin') {
    $visitor_data = array(
        'name' => $_POST['visitor_name'],
        'email' => $_POST['visitor_email'],
        'phone' => $_POST['visitor_phone'],
        'address' => $_POST['visitor_address'],
        'date_of_birth' => $_POST['visitor_date_of_birth']
    );

    // Move image handling to a separate function
    $image_path = handleImageUpload();

    // Add the image path to visitor data
    $visitor_data['image_path'] = $image_path;

    // Save visitor data into session (if needed)
    $_SESSION['visitor_data'] = $visitor_data;

    // Insert data into the database
    if (createNewData($visitor_data)) {
        // Redirect to the next step after successful insertion
        header('Location: index.php?act=bill');
        exit();
    } else {
        // Handle the error as needed
        echo "Error in database insertion.";
    }
}

function handleImageUpload() {
    if (isset($_FILES['visitor_image']['error']) && $_FILES['visitor_image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'images/'; // Change this to your desired directory
        $uploadFile = $uploadDir . basename($_FILES['visitor_image']['name']);

        // Move the uploaded image to the destination directory
        if (move_uploaded_file($_FILES['visitor_image']['tmp_name'], $uploadFile)) {
            return $uploadFile;
        } else {
            // Handle image upload error
            echo "Error uploading image.";
        }
    }

    return null; // Return null if no image is uploaded
}

function createNewData($visitor_data) {
    // Modify your SQL query based on your database schema
    $sql = "INSERT INTO `khachhang`(
        `TenKhachHang`,
        `NgaySinh`,
        `DiaChiNha`,
        `SoDienThoai`,
        `AnhXacNhan`,
        `Email`
    ) VALUES (?, ?, ?, ?, ?, ?)";


    return true;
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1 class="text-center">Xác nhận thông tin</h1>
            <script>alert("Hãy đăng ký tài khoản của chúng tôi ngay hôm nay để có các ưu đãi đặc biệt")</script>

            <form class="booking-form" action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên của bạn</label>
                    <input type="text" class="form-control" id="name" name="visitor_name" value="" placeholder="Nhập tên của bạn">
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Ngày sinh của bạn</label>
                    <input type="date" name="dob" id="dob" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email cá nhân của bạn</label>
                    <input type="email" class="form-control" id="email" name="visitor_email" value="" placeholder="Nhập email của bạn">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại của bạn</label>
                    <input type="tel" class="form-control" id="phone" name="visitor_phone" value="" placeholder="Nhập số điện thoại của bạn">
                </div>
                <div class="mb-3">
                    <label for="visitor_address" class="form-label">Địa chỉ của bạn</label>
                    <input type="text" class="form-control" name="visitor_address" id="visitor_address" placeholder="Nhập địa chỉ của bạn">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh căn cước xác nhận</label>
                    <input type="file" class="form-control-file" id="image" name="visitor_image">
                </div>
                <hr class="mb-4">
                <button type="submit" class="btn btn-primary">Gửi thông tin</button>
            </form>
        </div>
        <div class="col-md-6">
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <h2>Thông Tin Giỏ Hàng</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Phòng</th>
                                <th>Tên loại phòng</th>
                                <th>Giá một phòng</th>
                                <th>Số Lượng Phòng</th>
                                <th>Phòng đã chọn</th>
                                <th>Số Ngày Ở</th>
                                <th>Tổng tiền cho loại phòng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                            <tr>
                                <td><?= $item['idPhong'] ?></td>
                                <td><?= $item['tenLoaiPhong'] ?></td>
                                <td><?= $item['giaPhongChung'] ?></td>
                                <td><?= $item['soLuongPhong'] ?></td>
                                <td> </td>
                                <td><?= $item['soNgayO'] ?></td>
                                <td><?= $item['totalPriceWithDay'] ?>.000</td>
                                <td>
                                <form action="" method="post" class="form-inline">
                                    <!-- Minus Button -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-outline-secondary" onclick="decrementValue(<?= $index ?>)">-</button>
                                        </div>

                                        <!-- Amount Display -->
                                        <input type="number" name="soLuongPhong[<?= $index ?>]" id="amount<?= $index ?>" value="<?= $item['soLuongPhong'] ?>" min="1" readonly class="form-control">

                                        <!-- Plus Button -->
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="incrementValue(<?= $index ?>)">+</button>
                                        </div>
                                    </div>

                                    <!-- Hidden Inputs -->
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="index" value="<?= $index ?>">

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary ml-2">Cập Nhật</button>
                                </form>
                                </td>
                                <td>
                                    <a href="index.php?act=roomlist&action=delete&index=<?= $index ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa mục này?');">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <form action="" method="post">
                        <input type="hidden" name="cartDeleteAll" value="q">
                        <button class="btn btn-danger" type="submit">Xóa toàn bộ giỏ hàng</button><br><br>
                    </form>
                    <?php 
                    if (isset($_POST['cartDeleteAll'])) {
                        unset($_SESSION['cart']);
                        header('LOCATION: index.php?act=roomlist');
                        exit();
                    }
                    ?>
                </div>
            <?php else: ?>
                <p>Giỏ hàng trống.</p>
            <?php endif; ?>
        </div>
        </div>
    </div>
</div>




  </form>
  <script>
    var currentDateTime = new Date();
    var year = currentDateTime.getFullYear();
    var month = (currentDateTime.getMonth() + 1);
    var date = (currentDateTime.getDate() + 1);

    if (date < 10) {
      date = '0' + date;
    }
    if (month < 10) {
      month = '0' + month;
    }

    var dateTomorrow = year + "-" + month + "-" + date;
    var checkinElem = document.querySelector("#checkin-date");
    var checkoutElem = document.querySelector("#checkout-date");

    checkinElem.setAttribute("min", dateTomorrow);

    checkinElem.onchange = function() {
      checkoutElem.setAttribute("min", this.value);
    }
  </script>
