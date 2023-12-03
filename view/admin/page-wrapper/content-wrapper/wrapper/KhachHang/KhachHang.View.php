<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
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
                        <td><?php echo $filePath, $row['AnhXacNhan']; ?></td>
                
                        <td>
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