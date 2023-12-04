<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        echo "Session 'user' is not set or empty.";
    }
    ?>
  <form class="booking-form" action="index.php?act=thongtin" method="post">
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
      <input type="tel" id="phone" name="visitor_phone" value="<?=$email['tel']?>" required>
    </div>
    <hr>
    <div class="elem-group inlined">
      <label for="checkin-date">Check-in Date</label>
      <input type="date" id="checkin-date" name="DateIn" value="<?= isset($email['NgayCheckIn']) ? $email['NgayCheckIn'] : '' ?>">
    </div>
    <div class="elem-group inlined">
      <label for="checkout-date">Check-out Date</label>
      <input type="date" id="checkout-date" name="DateOut" value="<?= isset($email['NgayCheckOut']) ? $email['NgayCheckOut'] : '' ?>">
    </div>

    <?php
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
    ?>
    <!-- <a href="index.php?act=bill"><button type="button">Book The Rooms</button></a> -->


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
</body>

</html>