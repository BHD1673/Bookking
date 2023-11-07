### Bảng "bill" (Hóa đơn):

Bảng này được sử dụng để lưu trữ thông tin về các hóa đơn.

- `id`: Khóa chính để xác định mỗi hóa đơn.
- `created_id`: Khóa ngoại trỏ đến bảng "users" (người dùng), cho biết người nào đã tạo hóa đơn.

### Bảng "bill_details" (Chi tiết hóa đơn):

Bảng này được sử dụng để lưu trữ chi tiết về các mục trên hóa đơn.

- `id`: Khóa chính để xác định từng chi tiết hóa đơn.
- `bill_id`: Khóa ngoại trỏ đến bảng "bill", kết nối từng chi tiết với một hóa đơn cụ thể.
- `product_id`: Khóa ngoại trỏ đến bảng "productions" (sản phẩm), cho biết sản phẩm hoặc dịch vụ nào đã bao gồm trong hóa đơn.
- `check-in_date` và `check-out_date`: Biểu thị ngày nhận phòng và ngày trả phòng của sản phẩm hoặc dịch vụ.
- `total_money`: Lưu trữ tổng số tiền của sản phẩm hoặc dịch vụ.
- `full_name`, `email`, `address`, và `numberphone`: Lưu trữ thông tin của khách hàng liên quan đến sản phẩm hoặc dịch vụ trên hóa đơn.

### Bảng "categories" (Danh mục):

Bảng này được sử dụng để lưu trữ các danh mục sản phẩm.

- `id`: Khóa chính để xác định từng danh mục.
- `name`: Lưu trữ tên của danh mục.
- `description`: Cung cấp mô tả ngắn về danh mục.
- `created_id`: Khóa ngoại trỏ đến bảng "users", cho biết ai đã tạo danh mục.
- `created_at`: Một dấu thời gian ghi lại khi danh mục được tạo.

### Bảng "comments" (Bình luận):

Bảng này được sử dụng để lưu trữ các bình luận hoặc đánh giá về sản phẩm.

- `id`: Khóa chính để xác định từng bình luận.
- `created_id`: Khóa ngoại trỏ đến bảng "users", cho biết ai đã tạo bình luận.
- `product_id`: Khóa ngoại trỏ đến bảng "productions", liên kết bình luận với một sản phẩm cụ thể.
- `description`: Lưu trữ nội dung của bình luận.
- `created_at`: Một dấu thời gian ghi lại khi bình luận được tạo.

### Bảng "productions" (Sản phẩm hoặc Dịch vụ):

Bảng này được sử dụng để lưu trữ thông tin về các sản phẩm hoặc dịch vụ.

- `id`: Khóa chính để xác định từng sản phẩm hoặc dịch vụ.
- `category_id`: Khóa ngoại trỏ đến bảng "categories", cho biết sản phẩm hoặc dịch vụ thuộc danh mục nào.
- `created_id`: Khóa ngoại trỏ đến bảng "users", cho biết ai đã tạo sản phẩm hoặc dịch vụ.
- Các cột khác lưu trữ thông tin như tên, tiêu đề, hình ảnh, số lượng, giá, mô tả, hình thu nhỏ, trạng thái, dấu thời gian tạo và số lượt xem cho từng sản phẩm hoặc dịch vụ.

### Bảng "service" (Dịch vụ):

Bảng này dành riêng cho việc lưu trữ thông tin về các dịch vụ.

- `id`: Khóa chính để xác định từng dịch vụ.
- `created_id`: Khóa ngoại trỏ đến bảng "users", cho biết ai đã tạo dịch vụ.
- Các cột khác lưu trữ thông tin như tên dịch vụ, giá, mô tả, dấu thời gian tạo và hình ảnh.

### Bảng "users" (Người dùng):

Bảng này được sử dụng để lưu trữ thông tin về người dùng.

- `id`: Khóa chính để xác định từng người dùng.
- `full_name`, `email`, `numberphone`, `password`, `role`, `created_at`, `cmnd`, `gender`, và `address`: Lưu trữ thông tin người dùng như tên, thông tin liên hệ, mật khẩu, vai trò (1 cho Người dùng, 2 cho Quản trị viên), dấu thời gian đăng ký, số CMND, giới tính (1 cho Nam, 2 cho Nữ), và địa chỉ.

### Mối quan hệ khóa ngoại:

Cấu trúc bao gồm các mối quan hệ khóa ngoại để thiết lập các kết nối giữa các bảng, cho phép truy xuất và bảo toàn tính nhất quán dữ liệu. Các khóa ngoại tham chiếu đến các khóa chính trong các bảng khác để liên kết dữ liệu giữa các bảng.
