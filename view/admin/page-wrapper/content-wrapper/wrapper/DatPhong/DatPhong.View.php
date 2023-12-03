

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bảng quản lý đơn đặt phòng</h1>
    <a href="?act=QuanLyTaiKhoan"><button class="btn btn-primary">Thêm đơn đặt phòng mới</button></a>

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

                            // Xử lý trạng thái đơn
                            $trangThaiDon = $rows["TrangThaiDon"];
                            $trangThaiText = '';
                            switch($trangThaiDon) {
                                case 1:
                                    $trangThaiText = 'Đã hoàn thiện';
                                    break;
                                case 2:
                                    $trangThaiText = 'Đã hủy';
                                    break;
                                case 3:
                                    $trangThaiText = 'Đã cọc';
                                    break;
                                case 0:
                                    $trangThaiText = 'Đang thực hiện';
                                    break;
                                default:
                                    $trangThaiText = 'Không xác định';
                            }
                            echo '<td>' . $trangThaiText . '</td>';

                            // Các cột khác
                            echo '<td>';
                            echo '<a href="?act=?deleteID=' . $rows["ID"] . '" class="btn btn-info">Sửa</a>';
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

<script>
    window.onload = function() {
        let tds = document.querySelectorAll('.TrangThaiDon');

        tds.forEach(function(td) {
            let trangThaiDon = parseInt(td.innerHTML);

            switch(trangThaiDon) {
                case 1:
                    td.innerHTML = 'Đã hoàn thiện';
                    break;
                case 2:
                    td.innerHTML = 'Đã hủy';
                    break;
                case 3:
                    td.innerHTML = 'Đã cọc';
                    break;
                case 0:
                    td.innerHTML = 'Đang thực hiện';
                    break;
                default:
                    td.innerHTML = 'Không xác định';
            }
        });
    };
</script>
<!-- /.container-fluid -->