<?php 
if (isset($_GET['loaiPhongID'])) {
    $loaiPhongID = $_GET['loaiPhongID'];

    // Query to get phong IDs based on the selected loaiPhongID
    $sql = "SELECT ID, TenPhong FROM phong WHERE ID_LoaiPhong = ?";
    $phongList = pdo_query($sql, $loaiPhongID);

    // Build the options for the SoPhong dropdown
    $options = "";
    foreach ($phongList as $phong) {
        $options .= "<option value='{$phong['ID']}'>{$phong['TenPhong']}</option>";
    }

    echo $options;
}
?>
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
                <option >Chọn khách hàng ở đây</option>
                <option value="1">Khách 1</option>
            </select>
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
            <label for="LoaiPhong" class="form-label">Loại Phòng</label>
            <select class="form-select" id="LoaiPhong" onchange="getPhongIDs()">
            
                <?php 
                function getAllLoaiPhongOnForm(
                    $sql = "SELECT ID, Ten FROM loaiphong";
                    pdo_query($sql);
                )

                $allLoaiPhongOnForm = getAllLoaiPhongOnForm();

                foreach ($allLoaiPhongOnForm as $rows) {
                    echo "<option value='".$row["ID"]."'>".$row["Ten"]."</option>";
                }

                
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="SoPhong" class="form-label">Số Phòng</label>
            <select class="form-select" id="SoPhong">
                <!-- Options will be dynamically populated using AJAX -->
            </select>
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
            <select class="form-select" id="PhuongThucThanhToan">
                <option value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
                <option value="Thanh toán chuyển khoản">Thanh toán chuyển khoản</option>
            </select>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Gửi</button> -->
        <a href="?act=QuanLyDonDatPhong"><button type="" class="btn btn-primary">Gửi</button></a>
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