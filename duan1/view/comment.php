<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Thiết lập margin và padding cho phần container */
 .mb {
    max-width: 1800px; /* Điều chỉnh giá trị max-width theo ý muốn của bạn */
    margin: 0 auto; /* Để căn giữa container */
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    text-align: center; /* Căn giữa nội dung theo chiều ngang */
}

/* Thiết lập style cho tiêu đề "BÌNH LUẬN" */
.box_title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

/* Thiết lập style cho phần chứa bình luận */
.box_content2 {
    overflow-x: auto; /* Cho phép cuộn ngang nếu nội dung quá rộng */
}

/* Thiết lập style cho bảng chứa bình luận */
.product_portfolio table {
    width: 100%; /* Điều chỉnh chiều rộng theo ý muốn của bạn */
    border-collapse: collapse;
    margin-bottom: 15px;
    text-align: center; /* Căn trái nội dung bảng */
}

/* Thiết lập style cho các ô trong bảng */
.product_portfolio table td {
    border: 1px solid #ddd;
    padding: 8px;
}

/* Thiết lập style cho ô nhập liệu và nút gửi bình luận */
.box_search {
    margin-top: 20px;
}

.box_search form {
    display: flex;
    align-items: center;
}

.box_search input[type="text"] {
    flex: 1;
    padding: 8px;
    margin-right: 10px;
}

.box_search input[type="submit"] {
    padding: 8px 15px;
    background-color: #337ab7;
    color: #fff;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

    </style>
</head>
<body>
<div class="mb">
        <div class="box_title">BÌNH LUẬN</div>
        <div class="box_content2  product_portfolio binhluan ">
          <table>
            <tr>
              <td>Sản phẩm quá đẹp</td>
              <td>Nguyễn Thành A</td>
              <td>20/10/2022</td>
            </tr>
            <tr>
              <td>Sản phẩm quá đẹp</td>
              <td>Nguyễn Thành A</td>
              <td>20/10/2022</td>
            </tr>
          </table>
        </div>
        <div class="box_search">
          <form action="" method="POST">
            <input type="hidden" name="idpro" value="">
            <input type="text" name="noidung"  >
            <input type="submit" name="guibinhluan" value="Gửi bình luận">
          </form>
        </div>

</body>
</html>