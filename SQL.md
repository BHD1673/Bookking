Bảng loaiphong sẽ có :
- ID loại phòng
- Tên loại phòng
- Mô tả
- Giá phòng chung
Bảng phong sẽ có :
- ID phòng
- Tên phòng
- Vị trí phòng
- Trạng thái phòng
- Ảnh phòng
- Thuộc loại phòng
Bảng đặt phòng sẽ có :
- ID đơn đặt phòng
- ID khách hàng
- ID gán phòng
- Ngày check in
- Ngày check out
- Tổng tiền 
- Tiền đặt cọc (Sẽ sử dụng thuật toán để khi insert thì đã tính ra được số tiền cọc, nên có thể để là decimal (10,3))
- Trạng thái đơn (Đã thanh toán hay chưa, đã thanh toán cọc hay chưa, đã đến ở hay chưa, đã hủy hay chưa, đã xong hay chưa)
Bảng gán phòng có:
- ID gán
- ID đơn đặt phòng
- ID phòng
Bảng khách hàng gồm có:
- ID khách hàng
- Tên khách hàng
- Ngày sinh
- Địa chỉ nhà
- Ảnh xác nhận
- Đơn đặt phòng
- Gmail
- Tên đăng nhập
- Mật khẩu
