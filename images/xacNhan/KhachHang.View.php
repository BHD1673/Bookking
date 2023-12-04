<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Hiển thị số khách hàng</h6>
        <p class="m-0">Những khách hàng có dữ liệu trong bảng tên tài khoản <br> là những khách hàng đã đăng ký từ trước</p>
        <a href="?act=AddTaiKhoan"><button class="btn btn-primary">Thêm khách hàng mới</button></a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Sinh nhật</th>
                        <th>Địa chỉ khách hàng</th>
                        <th>Email khách hàng</th>
                        <th>Tên tài khoản</th>
                        <th>Hình ảnh xác nhận</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tfoot>
                <?php 
                $allKhachang = getAllKhachHang();
                foreach ($allKhachang as $row) {
                    extract($row);
                    ?>
                
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['TenKhachHang']; ?></td>
                        <td><?php echo $row['NgaySinh']; ?></td>
                        <td><?php echo $row['DiaChiNha']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['TenDangNhap']; ?></td>
                        
                        <td><img src="<?php echo $filePathXacNhan; ?><?php echo $row['AnhXacNhan']; ?>" alt="Hình ảnh xác nhận" style="width: 50%;"></td>
                
                        <td>
                            <form action="" method="post">
                                <input type="text" name="IDKhachHang" value="<?php echo $row['ID']; ?>" style="display: none;">
                                <button type="submit" class="btn btn-primary">Chuyển khách hàng <br> này sang bảng đặt phòng</button>
                            </form>
                            <a href="?act=?updateID='<?php echo $row['ID']; ?>'" class="btn btn-info">Sửa</a>
                            <a href="?act=?deleteID='<?php echo $row['ID']; ?>'" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>