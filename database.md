### Bảng `loai_phong`:

**loai_phong**

- `ma_loai_phong` (INT): Khóa chính, tự tăng, định danh duy nhất cho loại phòng.
- `ten_loai_phong` (VARCHAR(50)): Tên của loại phòng, không được để trống.
- `ty_le_giam_gia` (DECIMAL(5, 2), DEFAULT 0.00): Tỷ lệ giảm giá cho loại phòng, mặc định là 0.00.

### Bảng `phong`:

**phong**

- `ma_phong` (INT): Khóa chính, tự tăng, định danh duy nhất cho mỗi phòng.
- `so_phong` (VARCHAR(10)): Số phòng, không được để trống. Có thể hiểu như tên của phòng, ví dụ phòng 101, phòng 102...
- `loai_phong` (VARCHAR(50)): Loại phòng, không được để trống.
- `gia` (DECIMAL(10, 2)): Giá của phòng, không được để trống.
- `tinh_trang` (BOOLEAN, DEFAULT false): Tình trạng phòng, mặc định là fasle (phòng trống).
- `ma_loai_phong` (INT): Khóa ngoại liên kết đến bảng `loai_phong`.

### Bảng `dich_vu_phong`:

**dich_vu_phong**
- Một phòng có thể sẽ để những dịch vụ phòng đặt sẵn từ trước bao gồm có những cái gì, để phù hợp cho việc đặt thêm dịch vụ. Có thể đặt sẵn những các mục như "Phòng này sẽ bao gồm những dịch vụ như giặt hộ quần áo một buổi, xe taxi đưa đón khách hàng, bao gồm bữa sáng và bữa trưa..."

- `ma_dich_vu` (INT): Khóa chính, tự tăng, định danh duy nhất cho dịch vụ phòng.
- `ten_dich_vu` (VARCHAR(50)): Tên của dịch vụ phòng, không được để trống.
- `gia` (DECIMAL(10, 2)): Giá của dịch vụ phòng, không được để trống.

### Bảng `hoa_don`:

**hoa_don**

- `ma_hoa_don` (INT): Khóa chính, tự tăng, định danh duy nhất cho mỗi hóa đơn.
- `ma_dat_phong` (INT): Khóa ngoại liên kết đến bảng `dat_phong`.
- `tong_tien` (DECIMAL(10, 2)): Tổng tiền của hóa đơn, không được để trống.
- `trang_thai_thanhtoan` (BOOLEAN, DEFAULT false): Trạng thái thanh toán, mặc định là false.

### Bảng `dat_phong_dich_vu`:

**dat_phong_dich_vu**

- `ma_dat_phong` (INT): Khóa ngoại liên kết đến bảng `dat_phong`.
- `ma_dich_vu` (INT): Khóa ngoại liên kết đến bảng `dich_vu_phong`.
- Khóa chính là sự kết hợp giữa `ma_dat_phong` và `ma_dich_vu`.

-- **Tính toán khoảng thời gian giữa ngày check-in và check-out:**
```sql
SELECT DATEDIFF(ngay_b, ngay_a) AS khoang_thoi_gian
FROM ten_bang
WHERE ...

Trong đoạn mã trên:
- `DATEDIFF(ngay_b, ngay_a)` tính toán số ngày giữa `ngay_a` và `ngay_b`.
- `AS khoang_thoi_gian` gán kết quả tính toán vào một biến có tên là `khoang_thoi_gian`.
- `FROM ten_bang` chỉ ra bảng dữ liệu bạn đang sử dụng.
- `WHERE ...` là nơi bạn có thể thêm điều kiện tùy chọn nếu cần thiết.
```


