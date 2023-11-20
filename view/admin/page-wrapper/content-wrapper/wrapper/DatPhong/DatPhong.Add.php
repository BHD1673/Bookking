<div class="container mt-5">
    <h2>Form đặt phòng</h2>
    <a href="?act=QuanLyDonDatPhong"><button class="btn btn-primary">Quay lại phần quản lý đơn đặt phòng</button></a>
    
    
    <!-- <form> -->
        <div class="mb-3">
            <label for="Id" class="form-label">ID</label>
            <input type="text" class="form-control" name="id" id="Id" placeholder="Có thể ẩn cũng được" >
        </div>

        <div class="mb-3">
            <label for="TenKhachHang" class="form-label">Tên Khách Hàng</label>
            <input type="text" class="form-control" name="TenKhachHang">
        </div>
        
        <div class="mb-3">
            <label for="LuaChonTaiKhoanKhachHang" class="form-label">Lựa chọn tài khoản khách hàng <br> (Sử dụng trong trường hợp khách hàng đã có tài khoản từ trước nhưng đến làm trực tiếp) <br></label>
            <select class="form-select" name="LuaChonTaiKhoanKhachHang">
            </select>
        </div>

        <div class="mb-3">
            <label for="NgayVao" class="form-label">Ngày Vào</label>
            <input type="date" class="form-control" name="NgayVao">
        </div>

        <div class="mb-3">
            <label for="NgayRa" class="form-label">Ngày Ra</label>
            <input type="date" class="form-control" name="NgayRa">
        </div>

        <div class="mb-3">
            <label for="AmountOfDay" class="form-label">Tổng số ngày: </label>
            <input type="text" class="form-control" name id="AmountOfDay" disabled>
            <input type="hidden" class="form-control" name="AmountOfDay" id="AmountOfDay">
        </div>

        <div class="mb-3">
            <label for="LoaiPhong" class="form-label">Loại Phòng</label>
            <select class="form-select" id="LoaiPhong">
                <option value="Loại Phòng Vip">Loại Phòng Vip</option>
                <option value="Loại Phòng Thường">Loại Phòng Thường</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="SoPhong" class="form-label">Số Phòng</label>
            <select class="form-select" id="SoPhong">
                
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
                <option value="Chưa thanh toán">Chưa thanh toán</option>
                <option value="Đã thanh toán cọc">Đã thanh toán cọc</option>
                <option value="Đã thanh toán toàn bộ">Đã thanh toán toàn bộ</option>
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
document.addEventListener('DOMContentLoaded', (event) => {
        // Assuming your form has an id, e.g., 'myForm'
        const form = document.getElementById('myForm');

        form.addEventListener('submit', (event) => {
                // Prevent the default form submission
                event.preventDefault();

                // Retrieve the value of the hidden ID field
                const hiddenIdValue = document.getElementById('Id').value;

                // Set the value to the disabled input field
                const disabledInput = document.getElementById('Id');
                disabledInput.value = hiddenIdValue;
            }
        );
    }
);

</script>