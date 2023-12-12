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

        h2 {
            margin-top: 50px;
            font-size: 2em;
            text-align: center;
        }

        .thongbao {
            color: #fff;
        }
    </style>

</head>

<body>
    <h2>CẬP NHẬT TÀI KHOẢN</h2>
    <?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    } else {
        echo "Session 'user' is not set or empty.";
    }
    ?>

    <form class="booking-form" action="index.php?act=thongtintk" method="post">
        <div class="elem-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="user" value="<?= $user['TenDangNhap'] ?>">
        </div>
        <div class="elem-group">
            <label for="email">Your E-mail</label>
            <input type="email" id="email" name="email" value="<?= $user['Email'] ?>">
        </div>
        <div class="elem-group">
            <label for="address">Your Date of birth</label>
            <input type="date" id="address" name="ngaysinh" value="<?= $user['NgaySinh'] ?>">
        </div>
        <div class="elem-group">
            <label for="phone">Your Phone</label>
            <input type="text" id="phone" name="tel" value="<?= $user['SoDienThoai'] ?>">
        </div>
        <div class="elem-group">
            <label for="address">Your Address</label>
            <input type="text" id="address" name="address" value="<?= $user['DiaChiNha'] ?>">
        </div>
        <hr>
        <hr>
        <!-- Thêm input ẩn để truyền ID -->
        <input type="hidden" name="id" value="<?= $user['ID'] ?>">
        <button type="submit" name="capnhat">Lưu</button>
        <a href="index.php?act=doimk"><button type="button" name="doimk" >Đổi mật khẩu</button></a>

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