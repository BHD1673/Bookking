

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
                    <?php foreach ($allDonDatPhong as $rows): ?>
                        <?php extract($rows); ?>

                        <tr>
                            <td><?= $rows["ID"]; ?></td>
                            <td><?= $rows["IDKhachHang"]; ?> <?= $rows["TenKhachHang"]; ?></td>
                            <td><?= $rows["NgayCheckIn"]; ?></td>
                            <td><?= $rows["NgayCheckOut"]; ?></td>
                            <td><?= $rows["SoNgayO"]; ?></td>
                            <td>2</td>
                            <td>P101, P102</td>
                            <td><?= $rows["TongTien"]; ?></td>
                            <td><?= $rows["TienCoc"]; ?></td>

                            <?php
                            $trangThaiDon = $rows["TrangThaiDon"];
                            $trangThaiText = '';
                            switch ($trangThaiDon) {
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
                            ?>
                            <td><?= $trangThaiText; ?></td>

                            <td>
                                <form action="update_status.php" method="post">
                                    <input type="hidden" name="idDon" value="<?= $rows["ID"]; ?>">
                                    <select name="trangThaiMoi">
                                        <option value="1" <?= $rows["TrangThaiDon"] == 1 ? 'selected' : '' ?>>Đã hoàn thiện</option>
                                        <option value="2" <?= $rows["TrangThaiDon"] == 2 ? 'selected' : '' ?>>Đã hủy</option>
                                        <option value="3" <?= $rows["TrangThaiDon"] == 3 ? 'selected' : '' ?>>Đã cọc</option>
                                        <option value="4" <?= $rows["TrangThaiDon"] == 4 ? 'selected' : '' ?>>Đang thực hiện</option>
                                        <option value="5" <?= $rows["TrangThaiDon"] == 5 ? 'selected' : '' ?>>Đơn mới, chờ xác nhận</option>
                                    </select>
                                    <button type="submit">Cập Nhật</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                        

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