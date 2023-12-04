<div class="container mt-2">
    <h2>Form đặt phòng</h2>
    <a href="?act=QuanLyDonDatPhong"><button class="btn btn-primary">Quay lại phần quản lý đơn đặt phòng</button></a>
    
    
    <form>     
        <div class="mb-3">
            <label for="LuaChonTaiKhoanKhachHang" class="form-label">Lựa chọn khách hàng. <br> Ở phần này, sẽ phải nhập thông tin khách hàng bên phần tài khoản trước</label>
            <select class="form-select" name="LuaChonTaiKhoanKhachHang">
                <option value="#">Chọn khách hàng ở đây</option>
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