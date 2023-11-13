1. **Bảng về Loại Phòng (`LoaiPhong`):**
   - `MaLoaiPhong`: Định danh duy nhất cho mỗi loại phòng.
   - `TenLoaiPhong`: Tên của loại phòng.
   - `GiaCoBan`: Giá cơ bản cho mỗi phòng trong loại này.
   - `QuyDinh`: Trường văn bản lưu trữ các quy định đi kèm với loại phòng.

2. **Bảng về Phòng (`Phong`):**
   - `MaPhong`: Định danh duy nhất cho mỗi phòng.
   - `SoPhong`: Số hiệu phòng để nhận biết.
   - `MaLoaiPhong`: Khóa ngoại tham chiếu đến bảng `LoaiPhong`, xác định loại phòng tương ứng.

3. **Bảng về Dịch Vụ (`DichVu`):**
   - `MaDichVu`: Định danh duy nhất cho mỗi dịch vụ.
   - `TenDichVu`: Tên của dịch vụ.
   - `Gia`: Giá của dịch vụ.

4. **Bảng về Giảm Giá (`GiamGia`):**
   - `MaGiamGia`: Định danh duy nhất cho mỗi khuyến mãi giảm giá.
   - `TenGiamGia`: Tên của khuyến mãi giảm giá.
   - `TiLe`: Giá trị phần trăm của khuyến mãi.

5. **Bảng về Người Dùng (`NguoiDung`):**
   - `MaNguoiDung`: Định danh duy nhất cho mỗi người dùng.
   - `TenNguoiDung`: Tên của người dùng.
   - `Email`: Địa chỉ email của người dùng.
   - `MatKhau`: Mật khẩu của người dùng (đã được băm một cách an toàn).
   - `LaAdmin`: Một cờ boolean xác định xem người dùng có phải là admin hay không.

6. **Bảng về Đặt Phòng (`DatPhong`):**
   - `MaDatPhong`: Định danh duy nhất cho mỗi đặt phòng.
   - `MaNguoiDung`: Khóa ngoại tham chiếu đến bảng `NguoiDung`, xác định người dùng thực hiện đặt phòng.
   - `MaPhong`: Khóa ngoại tham chiếu đến bảng `Phong`, xác định phòng đã được đặt.
   - `SoNguoi`: Số lượng khách cho đặt phòng.
   - `NgayCheckIn`: Ngày nhận phòng.
   - `NgayCheckOut`: Ngày trả phòng.
   - `NgayDatPhong`: Thời điểm đặt phòng.
   - `TongTien`: Tổng số tiền cần thanh toán.
   - `DaThanhToan`: Một cờ boolean xác định xem đặt phòng đã được thanh toán hay chưa.

7. **Bảng về Chi Tiết Đặt Phòng (`ChiTietDatPhong`):**
   - `MaChiTietDatPhong`: Định danh duy nhất cho mỗi chi tiết người đặt trong một đặt phòng.
   - `MaDatPhong`: Khóa ngoại tham chiếu đến bảng `DatPhong`, liên kết với đặt phòng cụ thể.
   - `TenKhachHang`: Tên của khách hàng.
   - `ThoiGianDen`: Thời gian đến.
   - `ThoiGianDi`: Thời gian rời đi.

8. **Bảng về Dịch Vụ Đặt Phòng (`DichVuDatPhong`):**
   - `MaDichVuDatPhong`: Định danh duy nhất cho mỗi dịch vụ được đặt trong một đặt phòng.
   - `MaDatPhong`: Khóa ngoại tham chiếu đến bảng `DatPhong`.
   - `MaDichVu`: Khóa ngoại tham chiếu đến bảng `DichVu`.

9. **Bảng về Giảm Giá Đặt Phòng (`GiamGiaDatPhong`):**
   - `MaGiamGiaDatPhong`: Định danh duy nhất cho mỗi giảm giá được áp dụng trong một đặt phòng.
   - `MaDatPhong`: Khóa ngoại tham chiếu đến bảng `DatPhong`.
   - `MaGiamGia`: Khóa ngoại tham chiếu đến bảng `GiamGia`.

10. **Bảng về Bình Luận (`BinhLuan`):**
    - `MaBinhLuan`: Định danh duy nhất cho mỗi bình luận.
    - `MaNguoiDung`: Khóa ngoại tham chiếu đến bảng `NguoiDung`, xác định người dùng đăng bình luận.
    - `NoiDung`: Nội dung bình luận hoặc đánh giá.
    - `NgayBinhLuan`: Thời điểm bình luận được đăng.
