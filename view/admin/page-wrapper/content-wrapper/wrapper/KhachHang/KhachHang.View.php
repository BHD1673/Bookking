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
                        <th>Ảnh xác nhận</th>
                        <th>Các phòng đã chọn cho đơn</th>
                        <th>Tổng tiền khách hàng đặt phòng </th>
                        <th>Tiền cọc</th>
                        <th>Ảnh xác nhận đi kèm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tfoot>
                <?php 

                    $allDonDatPhong = getAllDatPhong();

                    foreach ($allDonDatPhong as $rows) {
                        extract($rows);

                        echo '<tr>';
                        echo '<td>' . $rows["ID"] . '</td>';
                        echo '<td>' . $rows["TenKhachHang"] . '</td>';
                        echo '<td>' . $rows["NgaySinh"] . '</td>';
                        echo '<td>' . $rows["DiaChiNha"] . '</td>';
                        echo '<td>' . $rows["AnhXacNhan"] . '</td>';
                        echo '<td>' . $rows["Email"] . '</td>';
                        echo '<td>' . $rows["TenDangNhap"] . '</td>';
                        echo '<td>' . $rows["MatKhau"] . '</td>';
                        echo '<td>';
                        echo '<a href="?act=?updateID=' . $rows["ID"] . '" class="btn btn-info">Sửa</a>';
                        echo '<a href="?act=?deleteID=' . $rows["ID"] . '" class="btn btn-danger">Xóa</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>