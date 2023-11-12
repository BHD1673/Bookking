## Công Việc Cho Dự Án Quản Lý Khách Sạn

1. **Thiết lập Cơ Sở Dữ Liệu:**
   - Vẽ sơ đồ diagram
   - Dựa vào sơ đồ diagram để vẽ

2. **Cắt các trang HTML:**
   - Tạo trang chính (index.php) để hiển thị các phòng có sẵn và thông tin cơ bản.
   - Thiết kế trang chi tiết phòng (room.php) để hiển thị thông tin chi tiết về một phòng được chọn.
   - Xây dựng biểu mẫu đặt phòng (reservation.php) để thu thập thông tin đặt phòng từ người dùng.
   - Trang xác nhận và hóa đơn (confirmation.php) để hiển thị thông tin đặt phòng để người dùng kiểm tra.
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

   - Tạm thời xóa, chưa xong

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
https://www.youtube.com/watch?v=uAVL07p8cmc&ab_channel=CatDragon Video về PHPMailer
```php
<?php
require 'vendor/autoload.php'; // Đường dẫn đến autoload.php của PHPMailer

// ... Các bước xử lý dữ liệu như trước

// Gửi email thông báo
try {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    // Cấu hình thông tin SMTP của bạn
    $mail->isSMTP();
    $mail->Host = 'your-smtp-host';
    $mail->SMTPAuth = true;
    $mail->Username = 'your-smtp-username';
    $mail->Password = 'your-smtp-password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Cấu hình thông tin email
    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');
    $mail->isHTML(true);
    $mail->Subject = 'Đặt Phòng Thành Công';

    // Nội dung email
    $message = "
        <p><strong>Tên Khách Hàng:</strong> $ten_khach_hang</p>
        <p><strong>Số Điện Thoại:</strong> $so_dien_thoai_khach_hang</p>
        <p><strong>Ảnh Chứng Minh:</strong> <img src='$target_file' alt='Chứng Minh Khách Hàng'></p>
        <p><strong>Tiền Đặt Cọc:</strong> $tien_dat_coc</p>
        <p><strong>Tiền Tổng Thanh Toán:</strong> $tong_tien</p>
    ";
    
    $mail->Body = $message;

    // Gửi email
    if ($mail->send()) {
        echo "Đặt phòng thành công! Email thông báo đã được gửi.";
    } else {
        echo "Có lỗi khi gửi email: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Có lỗi xảy ra: " . $e->getMessage();
}
?>

```
