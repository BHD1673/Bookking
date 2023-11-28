<?php 
// if (isset($_GET['loaiPhongID'])) {
//     $loaiPhongID = $_GET['loaiPhongID'];

//     // Query to get phong IDs based on the selected loaiPhongID
//     $sql = "SELECT ID, TenPhong FROM phong WHERE ID_LoaiPhong = ?";
//     $phongList = pdo_query($sql, $loaiPhongID);

//     // Build the options for the SoPhong dropdown
//     $options = "";
//     foreach ($phongList as $phong) {
//         $options .= "<option value='{$phong['ID']}'>{$phong['TenPhong']}</option>";
//     }

//     echo $options;
// }
?>
<div class="container mt-5">
    <h2 class="mb-4">Check Room Availability</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="checkInDate">Check-in Date:</label>
            <input type="date" class="form-control" id="checkInDate" name="checkInDate" required>
        </div>
        <div class="form-group">
            <label for="checkOutDate">Check-out Date:</label>
            <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" required>
        </div>
        <button type="submit" class="btn btn-primary">Check Availability</button>
    </form>

    <!-- Display the results in a table -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data and perform the query
        $checkInDate = $_POST["checkInDate"];
        $checkOutDate = $_POST["checkOutDate"];

        $sql = "SELECT lp.*, p.*
                FROM loaiphong lp
                LEFT JOIN phong AS p ON lp.ID = p.ID_LoaiPhong
                WHERE NOT EXISTS (
                    SELECT 1
                    FROM ganphong gp
                    JOIN datphong dp ON gp.IDDatPhong = dp.ID
                    WHERE gp.IDPhong = p.ID
                    AND (
                        (dp.NgayCheckIn <= ? AND dp.NgayCheckOut >= ?) OR
                        (dp.NgayCheckIn < ? AND dp.NgayCheckOut >= ?) OR
                        (dp.NgayCheckIn >= ? AND dp.NgayCheckOut <= ?)
                    )
                )";

        try {
            $results = pdo_query($sql, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate);

            // Check if there are results to display
            if (!empty($results)) {
                echo '<table class="table mt-3">';
                echo '<thead>';
                echo '<tr>';
                // Adjust column headers based on your data structure
                echo '<th>Room ID</th>';
                echo '<th>Room Name</th>';
                // Add more headers as needed
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($results as $row) {
                    echo '<tr>';
                    // Adjust column names based on your data structure
                    echo '<td>' . $row['ID'] . '</td>';
                    echo '<td>' . $row['RoomName'] . '</td>';
                    // Add more columns as needed
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No available rooms for the selected dates.</p>';
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
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