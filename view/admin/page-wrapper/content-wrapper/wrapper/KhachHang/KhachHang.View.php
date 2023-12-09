<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">Hiển thị số khách hàng</h6>
        <p class="m-0">Những khách hàng có dữ liệu trong bảng tên tài khoản <br> là những khách hàng đã đăng ký từ trước</p>
        <p class="m-0 font-weight-bold text-primary">GHI CHÚ: Khi tạo một đơn dặt mới, sẽ được chuyển hướng đến đây để lựa chọn khách hàng. </p>
        <a href="?act=AddTaiKhoan"><button class="btn btn-primary">Thêm khách hàng mới</button></a>
            <!-- Nút giới hạn data in-->
        <a href="?act=QuanLyTaiKhoan&limit=500">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" >
                In ra toàn bộ thông tin khách hàng.
            </button>
        </a>   
        <a href="?act=QuanLyTaiKhoan&limit=50">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal" >
                Chỉ lấy 50 khách hàng
            </button>
        </a>   
        <a href="?act=QuanLyTaiKhoan&limit=10">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Chỉ lấy 10 khách hàng
            </button>
        </a>
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
                $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 25;
                $allKhachang = getAllKhachHang($limit);
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
                        
                        <td><img src="<?php echo $filePathXacNhan; ?><?php echo $row['AnhXacNhan']; ?>" alt="Hình ảnh xác nhận" style="width: 90%;"></td>
                
                        <td>
                            <form action="" method="post" name="hiddenInput">
                                <input type="hidden" name="IDKhachHang" value="<?php echo $row['ID']; ?>">
                                <input type="hidden" name="TenKhachHang" value="<?php echo $row['TenKhachHang']; ?>">
                                <input type="hidden" name="NgaySinh" value="<?php echo $rowp['NgaySinh'] ?>">
                                <input type="hidden" name="DiaChiNha" value="<?php echo $row['DiaChiNha']?>"><input type="hidden" name="Email" value="<?php echo $row['Email'] ?>">
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