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
    }

    button:hover {
      background: #333;
    }
  </style>
</head>

<body>
  <form class="booking-form" action="index.php?act=thongtin" method="post">
    <div class="elem-group">
      <label for="name">Your Name</label>
      <input type="text" id="name" name="visitor_name" value="<?=$user_id['TenKhachHang']?>" required>
    </div>
    <div class="elem-group">
      <label for="email">Your E-mail</label>
      <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
    </div>
    <div class="elem-group">
      <label for="phone">Your Phone</label>
      <input type="tel" id="phone" name="visitor_phone" placeholder="498-348-3872" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
    </div>
    <hr>
    <div class="elem-group inlined">
      <label for="adult">Adults</label>
      <input type="number" id="adult" name="total_adults" placeholder="2" min="1" required>
    </div>
    <div class="elem-group inlined">
      <label for="child">Children</label>
      <input type="number" id="child" name="total_children" placeholder="2" min="0" required>
    </div>
    <div class="elem-group inlined">
      <label for="checkin-date">Check-in Date</label>
      <input type="date" id="checkin-date" name="checkin" required>
    </div>
    <div class="elem-group inlined">
      <label for="checkout-date">Check-out Date</label>
      <input type="date" id="checkout-date" name="checkout" required>
    </div>
    <div class="elem-group">
      <label for="room-selection">Select Room Preference</label>
      <select id="room-selection" name="room_preference" required>
        <option value="">Choose a Room from the List</option>
        <option value="connecting">Connecting</option>
        <option value="adjoining">Adjoining</option>
        <option value="adjacent">Adjacent</option>
      </select>
    </div>
    <hr>
    <div class="elem-group">
      <label for="message">Anything Else?</label>
      <textarea id="message" name="visitor_message" placeholder="Tell us anything else that might be important." required></textarea>
    </div>
    <?php
    // Lấy ID khách hàng từ session hoặc bất kỳ nguồn dữ liệu nào khác
    if (isset($_SESSION['user'])) {
      $user_id = $_SESSION['user']['IDKhachHang'];
    } else {
      // Nếu không có ID khách hàng, bạn có thể xử lý điều này theo ý của bạn
      $user_id = 0; // Giả sử ID khách hàng mặc định là 0 khi không có thông tin người dùng
    }

    // Tạo đường dẫn dựa trên ID khách hàng
    $linkidkh = "index.php?act=bill&idkh=" . $user_id;

   

    // Tiếp theo, bạn có thể sử dụng $linkidkh để tạo liên kết
    echo '<a href="' . $linkidkh . '"><button type="button">Book The Rooms</button></a>';
    ?>


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