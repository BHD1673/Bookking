## Công Việc Cho Dự Án Quản Lý Khách Sạn

1. **Thiết lập Cơ Sở Dữ Liệu:**
   - Vẽ sơ đồ diagram
   - Dựa vào sơ đồ diagram để vẽ

2. **Cắt các trang HTML:**
   - Tạo trang chính (index.php) để hiển thị các phòng có sẵn và thông tin cơ bản.
   - Thiết kế trang chi tiết phòng (room.php) để hiển thị thông tin chi tiết về một phòng được chọn.
   - Xây dựng biểu mẫu đặt phòng (reservation.php) để thu thập thông tin đặt phòng từ người dùng.
   - Trang xác nhận (confirmation.php) để hiển thị thông tin đặt phòng để người dùng kiểm tra.
   - Trang xử lý danh mục phòng (CRUD) cho admin
   - Trang xử lý từng phòng riêng (CRUD) cho admin
   - Trang xử lý hóa đơn (CRUD) cho admin
   - Trang xử lý dịch vụ (CRUD) cho admin


3. **Viết PHP:**
   - Sử dụng sẵn mẫu PDO từ trước
   - DỰa vào database để viết các trang CRUD cho danh sách phòng để truy xuất và hiển thị sẵn cơ sở dữ liệu
   - Dựa vào database để viết chi tiết phòng bao gồm một phòng sẽ có chính sách như thế nào, gồm liệt kê sẵn những dịch vụ đi kèm để tính thêm tiền, đồng thời có thể dựa vào đấy để thay đổi tùy nhu cầu (Ví dụ thiếu nhân công hoặc dịch vụ đó bị hỏng hóc có thể xóa đi) và cơ chế hủy đặt, đặt giá cọc phòng và giá gốc của phòng
   - Dựa vào database để viết file xử lý đặt phòng để xử lí thông tin người dùng, gồm nhập thông tin số người đật phòng, thông tin từng người đặt phòng, thời gian đến ở (Như bắt đầu ở lúc nào và rời đi lúc nào), thời gian dự kiến check in check out, gửi lại thông tin qua mail kèm một mật khẩu đối chiếu khi khách đến checkin. Nếu cảm thấy ổn có thể thêm chức năng đăng nhập để xem phòng và gọi thêm dịch vụ (dọn phòng, giặt quần áo thuê, vân vân)
   - Dựa vào email khách hàng cho khách hàng đăng nhập vào để comment (Chỉ được sau khi khách hàng đã thanh toán xong xuôi), kiểm tra lịch book.
   - Tạo bản xứ lý thanh toán để tạo hóa đơn dựa trên chi tiết đặt phòng, chi tiết phòng, và cập nhật trạng thái thanh toán.
   - Phát triển cho trang admin bao gồm thêm sửa xóa đọc danh mục phòng, phòng, dịch vụ, giảm giá. Nếu cảm thấy ổn có thể thêm những cái lặt vặt như thêm sửa xóa ảnh banner, trang thông tin chung
   - Phát triển cho trang admin bao gồm quản lý tài khoản người dùng và quản lý trang comment về trang web chung, vì trang của mình chỉ là cho một khách sạn nên mình sẽ để là comment cho cả trang web (Như dạng review cả cái khách sạn đấy). Có thể sẽ để cái tài khoản và comment này riêng


4. **Tương Tác Cơ Sở Dữ Liệu:**
   - Xử ly các câu truy vấn SQL trong code PHP để thực hiện các hoạt động gồm SELECT INSERT DELETE UPDATE
   - Đảm bảo rằng cấu trúc cơ sở dữ liệu xử lý đúng yêu cầu trước đấy trong các hàm đã dựng

5. **Xử lý bảo mật:**
   - Loại bỏ thông tin người dùng trong các file PHP để bảo vệ khỏi tấn công SQL injection.
   - Triển khai trang login cho trang admin và login, đảm bảo phải đăng nhập thì không bị phá bởi tham số URL (Như người dùng nếu nhập /admin/ mà session login chưa đặt thì sẽ bị chuyển về trang đăng nhập)

6. **Sử dụng JavaScript::** 
   - Sử dụng JavaScript để tạo các trang như validate form đăng ký đăng nhập.

6. **Kiểm Thử:**
   - Kiểm thử ứng dụng của bạn một cách kỹ lưỡng ở mỗi giai đoạn để xác định và sửa lỗi.
   - Đảm bảo rằng quá trình chuyển động của người dùng hoạt động một cách mượt mà.

7. **Tài Liệu:**
    - Ghi chú mã nguồn của bạn để tham khảo sau này.
    - Viết một hướng dẫn ngắn hoặc tài liệu cho người dùng quản trị.

## Ghi chú cho phần database

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
### Mở rộng bảng đặt phòng 
- Mở rộng để chứa thông tin khách hàng mới
```sql
ALTER TABLE dat_phong
ADD COLUMN ten_khach_hang VARCHAR(100),
ADD COLUMN tien_dat_coc DECIMAL(10, 2),
ADD COLUMN anh_khach_hang VARCHAR(255); -- Lưu đường dẫn đến ảnh khách hàng
```
- Xử lý qua dữ liệu bằng PHP
```php
<?php
// Bước 1: Lấy thông tin từ form
$ten_khach_hang = $_POST['ten_khach_hang'];
$tien_dat_coc = $_POST['tien_dat_coc'];
$anh_khach_hang = $_FILES['anh_khach_hang']['name'];

// Bước 2: Upload ảnh khách hàng vào thư mục và lưu đường dẫn vào cơ sở dữ liệu
$upload_directory = 'uploads/'; // Thư mục lưu trữ ảnh
$target_file = $upload_directory . basename($anh_khach_hang);

move_uploaded_file($_FILES['anh_khach_hang']['tmp_name'], $target_file);

// Bước 3: Lưu thông tin vào cơ sở dữ liệu
// Thêm các biến mới vào câu truy vấn SQL
$sql = "INSERT INTO dat_phong (ngay_checkin, ngay_checkout, ma_phong, ten_khach_hang, tien_dat_coc, anh_khach_hang) 
        VALUES ('$ngay_checkin', '$ngay_checkout', '$ma_phong', '$ten_khach_hang', '$tien_dat_coc', '$target_file')";

// Thực hiện câu truy vấn SQL và xử lý lỗi nếu có
// ...

// Hiển thị thông báo xác nhận cho người dùng
echo "Đặt phòng thành công!";
?>

```

