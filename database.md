### Bảng cho Danh mục Phòng (loai_phong)

- **ma_loai_phong (INT, PRIMARY KEY, AUTO_INCREMENT):** Đây là khóa chính của bảng, là một số nguyên tự động tăng dần, đại diện cho mã của loại phòng.

- **ten_loai_phong (VARCHAR(50), NOT NULL):** Đây là một chuỗi với độ dài tối đa 50 ký tự, không cho phép giá trị rỗng. Được sử dụng để lưu trữ tên của loại phòng.

- **ty_le_giam_gia (DECIMAL(5, 2), DEFAULT 0.00):** Đây là một số thực có độ chính xác 5 chữ số tổng cộng, trong đó có 2 chữ số sau dấu thập phân. Mặc định là 0.00 và đại diện cho tỷ lệ giảm giá cho loại phòng.

### Bảng cho Phòng (phong)

- **ma_phong (INT, PRIMARY KEY, AUTO_INCREMENT):** Khóa chính, số nguyên tự động tăng dần, đại diện cho mã của phòng.

- **so_phong (VARCHAR(10), NOT NULL):** Chuỗi tối đa 10 ký tự, không cho phép giá trị rỗng. Lưu trữ số phòng.

- **loai_phong (VARCHAR(50), NOT NULL):** Chuỗi tối đa 50 ký tự, không cho phép giá trị rỗng. Được sử dụng để lưu trữ loại phòng của phòng.

- **gia (DECIMAL(10, 2), NOT NULL):** Số thực với độ chính xác 10 chữ số tổng cộng, trong đó có 2 chữ số sau dấu thập phân. Lưu trữ giá của phòng.

- **tinh_trang (BOOLEAN, DEFAULT true):** Kiểu boolean với giá trị mặc định là true, đại diện cho tình trạng phòng (đang sử dụng hay không).

- **ma_loai_phong (INT):** Khóa ngoại tham chiếu đến ma_loai_phong của bảng loai_phong.

### Bảng cho Dịch vụ Phòng (dich_vu_phong)

- **ma_dich_vu (INT, PRIMARY KEY, AUTO_INCREMENT):** Khóa chính, số nguyên tự động tăng dần, đại diện cho mã của dịch vụ phòng.

- **ten_dich_vu (VARCHAR(50), NOT NULL):** Chuỗi tối đa 50 ký tự, không cho phép giá trị rỗng. Lưu trữ tên của dịch vụ phòng.

- **gia (DECIMAL(10, 2), NOT NULL):** Số thực với độ chính xác 10 chữ số tổng cộng, trong đó có 2 chữ số sau dấu thập phân. Lưu trữ giá của dịch vụ phòng.

### Bảng cho Khách Hàng (khach_hang)

- **ma_khach_hang (INT, PRIMARY KEY, AUTO_INCREMENT):** Khóa chính, số nguyên tự động tăng dần, đại diện cho mã của khách hàng.

- **ten_khach_hang (VARCHAR(50), NOT NULL):** Chuỗi tối đa 50 ký tự, không cho phép giá trị rỗng. Lưu trữ tên của khách hàng.

- **email (VARCHAR(100), NOT NULL):** Chuỗi tối đa 100 ký tự, không cho phép giá trị rỗng. Lưu trữ địa chỉ email của khách hàng.

- **so_dien_thoai (VARCHAR(20), NOT NULL):** Chuỗi tối đa 20 ký tự, không cho phép giá trị rỗng. Lưu trữ số điện thoại của khách hàng.

### Bảng cho Đặt Phòng (dat_phong)

- **ma_dat_phong (INT, PRIMARY KEY, AUTO_INCREMENT):** Khóa chính, số nguyên tự động tăng dần, đại diện cho mã của đặt phòng.

- **ma_phong (INT):** Khóa ngoại tham chiếu đến ma_phong của bảng phong.

- **ma_khach_hang (INT):** Khóa ngoại tham chiếu đến ma_khach_hang của bảng khach_hang.

- **ngay_checkin (DATE, NOT NULL):** Ngày check-in của đặt phòng.

- **ngay_checkout (DATE, NOT NULL):** Ngày check-out của đặt phòng.

- **so_nguoi_o (INT, NOT NULL):** Số người ở trong phòng.

- **hinh_anh (TEXT):** Loại dữ liệu TEXT để lưu trữ đường dẫn đến hình ảnh.

- **so_tien_dat_coc (DECIMAL(10, 2), NOT NULL):** Số tiền đặt cọc với độ chính xác 10 chữ số tổng cộng, trong đó có 2 chữ số sau dấu thập phân.

### Bảng cho Hóa đơn (hoa_don)

- **ma_hoa_don (INT, PRIMARY KEY, AUTO_INCREMENT):** Khóa chính, số nguyên tự động tăng dần, đại diện cho mã của hóa đơn.

- **ma_dat_phong (INT):** Khóa ngoại tham chiếu đến ma_dat_phong của bảng dat_phong.

- **tong_tien (DECIMAL(10, 2), NOT NULL):** Tổng số tiền của hóa đơn với độ chính xác 10 chữ số tổng cộng, trong đó có 2 chữ số sau dấu thập phân.

- **trang_thai_thanhtoan (BOOLEAN, DEFAULT false):** Trạng thái thanh toán của hóa đơn, mặc định là false.

### Bảng nối cho Dịch vụ Phòng trong một Đặt Phòng (dat_phong_dich_vu)

- **ma_dat_phong (INT):** Khóa ngoại tham chiếu đến ma_dat_phong của bảng dat_phong.

- **ma_dich_vu (INT):** Khóa ngoại tham chiếu đến ma_dich_vu của bảng dich_vu_phong.

- **PRIMARY KEY (ma_dat_phong, ma_dich_vu):** Khóa chính kết hợp, đảm bảo tính duy nhất của cặp ma_dat_phong và ma_dich_vu.

- **FOREIGN KEY (ma_dat_phong):** Tham chiếu đến ma_dat_phong của bảng dat_phong.

- **FOREIGN KEY (ma_dich_vu):** Tham chiếu đến ma_dich_vu của bảng dich_vu_phong.
