

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bảng quản lý đơn đặt phòng</h1>
    <a href="?act=AddPhongIntoAddNewDonHang"><button class="btn btn-primary">Thêm đơn đặt phòng mới</button></a>

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
                            <th>Tên khách hàng đặt phòng</th>
                            <th>Ngày check in</th>
                            <th>Ngày check out</th>
                            <th>Tổng số ngày</th>
                            <th>Số lượng phòng</th>
                            <th>Các phòng đã chọn cho đơn</th>
                            <th>Tổng tiền </th>
                            <th>Tiền cọc</th>
                            <th>Trạng thái thanh toán</th>
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
                            echo '<td>' . $rows["IDKhachHang"] . ' - John</td>';
                            echo '<td>' . $rows["NgayCheckIn"] . '</td>';
                            echo '<td>' . $rows["NgayCheckOut"] . '</td>';
                            echo '<td>' . $rows["SoNgayO"] . '</td>';
                            echo '<td>2</td>';
                            echo '<td>P101, P102</td>';
                            echo '<td>' . $rows["TongTien"] . '</td>';
                            echo '<td>' . $rows["TienCoc"] . '</td>';
                            echo '<td>' . $rows["TrangThaiDon"] . '</td>';
                            echo '<td>';
                            echo '<a href="?act=?deleteID=' . $rows["ID"] . '" class="btn btn-info">Sửa</a>';
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

</div>
<!-- /.container-fluid -->