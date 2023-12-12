<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize the session cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Collect user information from the form
    $visitor_name = $_POST['visitor_name'];
    $dob = $_POST['dob'];
    $visitor_email = $_POST['visitor_email'];
    $visitor_phone = $_POST['visitor_phone'];
    $visitor_address = $_POST['visitor_address'];
    $visitor_image = $_FILES['visitor_image']['name']; // Assuming you want to store the filename

    // Create an array with user information
    $user_info = [
        'visitor_name' => $visitor_name,
        'dob' => $dob,
        'visitor_email' => $visitor_email,
        'visitor_phone' => $visitor_phone,
        'visitor_address' => $visitor_address,
        'visitor_image' => $visitor_image,
    ];
    var_dump($user_info);


    // Add user information to the session
    $_SESSION['user_info'] = $user_info;
    var_dump($_SESSION['user_info']);
    
    // Handle file upload (you need to specify a directory to save the file)
    $upload_dir = 'your_upload_directory/'; // Replace with your actual directory
    $upload_path = $upload_dir . $visitor_image;

    if (move_uploaded_file($_FILES['visitor_image']['tmp_name'], $upload_path)) {
        var_dump($_FILES);
    } else {
        // Handle the case where file upload fails
        var_dump($_FILES);
}
    }
    // Redirect to another page or perform other actions as needed
    // header('Location: index.php?act=bill');
    // exit;
// Update shopping cart item
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['cart'])) {
        if ($_POST['action'] === 'update') {
            $index = $_POST['index'];
            $new_quantity = $_POST['soLuongPhong'][$index];

            // Update the quantity for the item in the cart
            $_SESSION['cart'][$index]['soLuongPhong'] = $new_quantity;

            // Perform any other cart-related updates as needed
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1 class="text-center">Xác nhận thông tin</h1>
            

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
        <div class="col-md-8">
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
                                    <td>
                                        <form action="" method="post" class="form-inline">
                                            <!-- Minus Button -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="decrementValue(<?= $index ?>)">-</button>
                                                </div>
                                                <input type="number" name="soLuongPhong[<?= $index ?>]" id="amount<?= $index ?>" value="<?= $item['soLuongPhong'] ?>" min="1" readonly class="form-control">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="incrementValue(<?= $index ?>)">+</button>
                                                </div>
                                            </div>
                                            <input type="hidden" name="action" value="update">
                                            <input type="hidden" name="index" value="<?= $index ?>">

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary ml-2">Cập Nhật</button>
                                        </form>
                                    </td>
                                    <td><?= $item['totalPriceWithDay'] ?>.000</td>
                                    <td>
                                        <a href="index.php?act=roomlist&action=delete&index=<?= $index ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa mục này?');">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php 
                    if (isset($_POST['cartDeleteAll'])) {
                        unset($_SESSION['cart']);
                    }
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="cartDeleteAll" value="q">
                        <button class="btn btn-danger" type="submit">Xóa toàn bộ giỏ hàng</button><br><br>
                    </form>
                </div>
            <?php else: ?>
                <p>Giỏ hàng trống.</p>
            <?php endif; ?>
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
