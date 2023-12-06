<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xác nhận thông tin</title>
  <style>
    .booking-form {
      width: 500px;
      margin: 0 auto;
      padding: 50px;
      background: #fff;
    }

    div.elem-group {
      margin: 20px 0;
    }

    div.elem-group.inlined {
      width: 49%;
      display: inline-block;
      float: left;
      margin-left: 1%;
    }

    label {
      display: block;
      font-family: 'Nanum Gothic';
      padding-bottom: 10px;
      font-size: 1.25em;
    }

    input,
    select,
    textarea {
      border-radius: 2px;
      border: 2px solid #777;
      box-sizing: border-box;
      font-size: 1.25em;
      font-family: 'Nanum Gothic';
      width: 100%;
      padding: 10px;
    }

    div.elem-group.inlined input {
      width: 95%;
      display: inline-block;
    }

    textarea {
      height: 250px;
    }

    hr {
      border: 1px dotted #ccc;
    }

    button {
      height: 50px;
      background: orange;
      border: none;
      color: white;
      font-size: 1.25em;
      font-family: 'Nanum Gothic';
      border-radius: 4px;
      cursor: pointer;
      padding: 0 12px;
      margin-left: 125px;
    }

    button:hover {
      background: #333;
    }
  </style>
</head>

<body>
<?php
    // if (isset($_SESSION['email'])) {
    //     $email = $_SESSION['email'];
    // } else {
    //     echo "Session 'user' is not set or empty.";
    // }
    ?>
  <!-- <form class="booking-form" action="index.php?act=thongtin" method="post">
    <div class="elem-group">
      <label for="name">Your Name</label>
      <input type="text" id="name" name="visitor_name" value="<?=$email['TenKhachHang']?>" >
    </div>
    <div class="elem-group">
      <label for="email">Your E-mail</label>
      <input type="email" id="email" name="visitor_email" value="<?=$email['Email']?>"  >
    </div>
    <div class="elem-group">
      <label for="phone">Your Phone</label>
      <input type="tel" id="phone" name="visitor_phone" value="<?=$email['SoDienThoai']?>" required>
    </div>
    <hr>
    <div class="elem-group inlined">
      <label for="checkin-date">Check-in Date</label>
      <input type="date" id="checkin-date" name="DateIn" value="<?= isset($email['DateIn']) ? $email['DateIn'] : '' ?>">
    </div>
    <div class="elem-group inlined">
      <label for="checkout-date">Check-out Date</label>
      <input type="date" id="checkout-date" name="DateOut" value="<?= isset($email['DateOut']) ? $email['DateOut'] : '' ?>">
    </div> -->

    <h1 class="text-center">Xác nhận thông tin </h1>
    <script>alert("Hãy đăng ký tài khoản của chúng tôi ngay hôm nay để có các ưu đãi đặc biệt")</script>

    <form class="booking-form" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
          <label for="name">Tên của bạn</label>
          <input type="text" class="form-control" id="name" name="visitor_name" value="" placeholder="Nhập tên của bạn">
      </div>
      <div class="form-group">
        <label for="dob">Ngày sinh của bạn</label>
        <input type="date" name="dob" id="dob" placeholder="Ngày tháng năm sinh" class="form-control">
      </div>
      <div class="form-group">
          <label for="email">Email cá nhân của bạn</label>
          <input type="email" class="form-control" id="email" name="visitor_email" value="" placeholder="Nhập email của bạn">
      </div>
      <div class="form-group">
          <label for="phone">Số điện thoại của bạn</label>
          <input type="tel" class="form-control" id="phone" name="visitor_phone" value="" placeholder="Nhập số điện thoại của bạn">
      </div>
      <div class="form-group">
          <label for="visitor_address">Địa chỉ của bạn</label>
          <input type="text" class="form-control" name="visitor_address" id="text" placeholder="Nhập địa chỉ của bạn">
      </div>
      <div class="form-group">
          <label for="image">Ảnh căn cước xác nhận</label>
          <input type="file" class="form-control-file" id="image" name="visitor_image">
      </div>
      <hr>
      <button type="submit" class="btn btn-primary">Gửi thông tin</button>
    </form>

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

    // Call your database execute function (pdo_execute) here
    // Make sure to handle errors and return the result appropriately
    // Replace the following line with your actual database interaction
    return true;
}
?>





    <!-- <?php
    // Lấy ID khách hàng từ session hoặc bất kỳ nguồn dữ liệu nào khác
    if (isset($_SESSION['user'])) {
      $user_id = $_SESSION['user']['ID'];
    } else {
      // Nếu không có ID khách hàng, bạn có thể xử lý điều này theo ý của bạn
      $user_id = 0; // Giả sử ID khách hàng mặc định là 0 khi không có thông tin người dùng
    }

    // Tạo đường dẫn dựa trên ID khách hàng
    $linkidkh = "index.php?act=bill&idkh=" . $user_id;

    // Tiếp theo, bạn có thể sử dụng $linkidkh để tạo liên kết
    echo '<a href="' . $linkidkh . '"><button type="button">Book The Rooms</button></a>';
    ?> -->

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
</body>
</html>