<div class="container">
    <div class="row">
        <!-- Form Section (Left Side) -->
        <div class="col-md-3">
            <h2 class="mb-4">Khoảng thời gian đặt phòng</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="checkin" class="form-label">Ngày Check-In:</label>
                    <input type="date" class="form-control" id="checkin" name="checkin">
                </div>
                <div class="mb-3">
                    <label for="checkout" class="form-label">Ngày Check-Out:</label>
                    <input type="date" class="form-control" id="checkout" name="checkout">
                </div>
                <div class="mb-3">
                    <label for="AmountOfDay" class="form-label">Số ngày ở dựa trên ngày check</label>
                    <input type="number" name="AmountOfDay" id="AmountOfDay" disabled>
                </div>
                <a href="?Nha"></a>
                <button type="submit" class="btn btn-primary">Tìm loại phòng mới</button>
            </form>
        </div>
    

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkInDate = $_POST["checkin"];
    $checkOutDate = $_POST["checkout"];

    $sql = 
"SELECT 
lp.Ten, 
lp.MoTa, 
lp.GiaPhongChung,
GROUP_CONCAT(p.ID) AS InRaIDPhong,
COUNT(p.ID) AS DemSoPhong
FROM 
loaiphong lp
LEFT JOIN 
phong AS p ON lp.ID = p.ID_LoaiPhong
WHERE 
NOT EXISTS (
    SELECT 1
    FROM ganphong gp
    JOIN datphong dp ON gp.IDDatPhong = dp.ID
    WHERE gp.IDPhong = p.ID
    AND (
        (dp.NgayCheckIn <= '?' AND dp.NgayCheckOut >= '?') OR
        (dp.NgayCheckIn < '?' AND dp.NgayCheckOut >= '?') OR
        (dp.NgayCheckIn >= '?' AND dp.NgayCheckOut <= '?')
    )
)
GROUP BY 
lp.Ten, lp.MoTa, lp.GiaPhongChung
";

    try {
        $results = pdo_query($sql, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate);
        if (!empty($results)) {
            displayRooms($results);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function displayRooms($rooms) {
    foreach ($rooms as $row) {
        displayRoomCard($row);
    }
}

function displayRoomCard($room) {
    echo '<div class="card d-flex flex-row">';
    echo '<img src="images/about.png" class="card-img-top" alt="Ảnh phòng" style="border: 1px solid black; width: 30%;">';
    echo '<div class="card-body d-flex flex-column">';
    echo '<h2 class="card-title mb-3">Tên loại phòng: ' . $room['Ten'] . '</h2>';
    displayRoomDetails($room);
    displaySelectionOptions($room);
    echo '</div></div>';
}

function displayRoomDetails($room) {
    echo '<div class="row">';
    echo '<div class="col-md">';
    echo '<p class="card-text">Giá phòng chung: ' . $room['GiaPhongChung'] . ' VNĐ</p>';
    echo '<p class="card-text">Mô tả: ' . $room['MoTa'] . '</p>';
    echo '</div></div>';
}

function displaySelectionOptions($room) {
    echo '<div class="row justify-content-end">';
    echo '<div class="col-md">';
    echo '<div class="form-check">';
    echo '<input class="form-check-input" type="radio" name="paymentMethod" id="choiceroom" checked>';
    echo '<label class="form-check-label" for="choiceroom">Chọn loại phòng này</label>';
    echo '</div></div>';
    echo '<div class="col-md">';
    echo '<div class="form-group">';
    echo '<label for="amountInput">Số lượng phòng còn lại: ' . $room['RoomCount'] . '</label>';
    echo '</div></div></div>';
}
?>


</div>
<div class="container mt-5">
    <h2>Form đặt phòng</h2>
    <a href="?act=QuanLyDonDatPhong"><button class="btn btn-primary">Quay lại phần quản lý đơn đặt phòng</button></a>
    
    
    <form>
        <!-- <div class="mb-3">
            <label for="Id" class="form-label">ID</label>
            <input type="text" class="form-control" name="id" id="Id" placeholder="Có thể ẩn cũng được" aria-label="Disabled input example" disabled readonly >
        </div> -->

        <div class="mb-3">
            <label for="TenKhachHang" class="form-label">Tên Khách Hàng</label>
            <input type="text" class="form-control" name="TenKhachHang">
        </div>
        
        <div class="mb-3">
            <label for="LuaChonTaiKhoanKhachHang" class="form-label">Lựa chọn tài khoản khách hàng <br> (Sử dụng trong trường hợp khách hàng đã có tài khoản từ trước nhưng đến làm trực tiếp) <br></label>
            <select class="form-select" name="LuaChonTaiKhoanKhachHang">
                <option value="#">Chọn khách hàng ở đây</option>
                <option value="1">Khách 1</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="TenKhachHang" class="form-label">Ảnh xác nhận khách hàng</label>
            <input type="file" accept="image/.jpg, image/.jpeg, image/.png, image/.webp" class="form-control" name="TenKhachHang">
        </div>

        <div class="mb-3">
            <label for="NgayVao" class="form-label">Ngày Vào</label>
            <input type="date" class="form-control" name="NgayVao" id="NgayVao">
        </div>

        <div class="mb-3">
            <label for="NgayRa" class="form-label">Ngày Ra</label>
            <input type="date" class="form-control" name="NgayRa" id="NgayRa">
        </div>

        <div class="mb-3">
            <label for="AmountOfDay" class="form-label">Tổng số ngày: </label>
            <input type="text" class="form-control" name="AmountOfDay" id="AmountOfDay" disabled>
        </div>

        <div class="mb-3">
            <label for="AmountOfDay" class="form-label">Tổng tiền dự kiến cho 1 ngày: </label>
            <input type="text" class="form-control" value="300.000 VND" disabled>
        </div>


        <div class="mb-3">
            <label for="AmountOfDay" class="form-label">Số tiền cần phải cọc: </label>
            <input type="text" class="form-control" value="90.000 VND" disabled>
        </div>

        <div class="mb-3">
            <label for="SoNguoiDiCung" class="form-label">Số Người Đi Cùng</label>
            <select class="form-select" id="SoNguoiDiCung">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="TrangThaiThanhToan" class="form-label">Trạng Thái Thanh Toán</label>
            <select class="form-select" id="TrangThaiThanhToan">
                <option value="2">Chưa thanh toán</option>
                <option value="1">Đã thanh toán cọc</option>
                <option value="0">Đã thanh toán toàn bộ</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="PhuongThucThanhToan" class="form-label">Phương thức thanh toán</label>
            <select name="PhuongThucThanhToan" id="PhuongThucThanhToan" class="form-select">
                    <option value="#">Vui lòng chọn</option>
                    <option value="1">Thanh toán trực tiếp</option>
                    <option value="2">Chuyển khoản qua QR</option>
                    <option value="3">Quẹt thẻ POS</option>
            </select>
        </div>

        
        <!-- <button type="submit" class="btn btn-primary">Gửi</button> -->
        <!-- <a href="?act=QuanLyDonDatPhong"><button class="btn btn-primary">Gửi</button> -->
        <a href="?act=QuanLyDonDatPhong">Gửi</a>
    </form>
</div>
<script>
var checkinInput = document.getElementById('NgayVao');
var checkoutInput = document.getElementById('NgayRa');
var amountOfDayInput = document.getElementById('AmountOfDay');

checkinInput.addEventListener('input', updateDateDifference);
checkoutInput.addEventListener('input', updateDateDifference);

function updateDateDifference() {
    // Lấy giá trị của ngày
    var checkinDate = new Date(checkinInput.value);
    var checkoutDate = new Date(checkoutInput.value);

    // Tính giá trị dựa trên mili
    var dateDifference = checkoutDate - checkinDate;

    // Tính sự khác biệt
    var daysDifference = dateDifference / (1000 * 60 * 60 * 24);

    // In ra kết quả
    amountOfDayInput.value = daysDifference;
}
</script>