<div class="container mt-5">
    <h2>Booking Form</h2>
    <form>
        <div class="mb-3">
            <label for="Id" class="form-label">ID</label>
            <input type="disabled" class="form-control" id="Id">
        </div>

        <div class="mb-3">
            <label for="TenKhachHang" class="form-label">Tên Khách Hàng</label>
            <input type="text" class="form-control" id="TenKhachHang">
        </div>
        
        <div class="mb-3">
            <label for="LuaChonTaiKhoanKhachHang" class="form-label">Lựa chọn tài khoản khách hàng <br> (Sử dụng trong trường hợp khách hàng đã có tài khoản từ trước nhưng đến làm trực tiếp) <br></label>
            <select class="form-select" id="LuaChonTaiKhoanKhachHang">
            </select>
        </div>

        <div class="mb-3">
            <label for="NgayVao" class="form-label">Ngày Vào</label>
            <input type="date" class="form-control" id="NgayVao">
        </div>

        <div class="mb-3">
            <label for="NgayRa" class="form-label">Ngày Ra</label>
            <input type="date" class="form-control" id="NgayRa">
        </div>

        <div class="mb-3">
            <label for="LoaiPhong" class="form-label">Loại Phòng</label>
            <select class="form-select" id="LoaiPhong">
                
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
                
            </select>
        </div>

        <div class="mb-3">
            <label for="TrangThaiThanhToan" class="form-label">Trạng Thái Thanh Toán</label>
            <select class="form-select" id="TrangThaiThanhToan">
                
            </select>
        </div>

        <div class="mb-3">
            <label for="PhuongThucThanhToan" class="form-label">Phương thức thanh toán</label>
            <select class="form-select" id="PhuongThucThanhToan">
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>