<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Thông Tin Cá Nhân</h2>
            <?php
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
            } else {
                echo "";
            }
            ?>
            <form action="index.php?act=chitiettk" method="post">
                <div class="form-group">
                    <label>Tên đầy đủ</label>
                    <input type="text" name="user" class="form-control" value="<?= $user['TenKhachHang'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" name="date" value="<?= $user['NgaySinh'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= $user['Email'] ?>" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="tel" value="<?= $user['SoDienThoai'] ?>" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="diachinha" value="<?= $user['DiaChiNha'] ?>" class="form-control" disabled>
                </div>
                <button type="button" id="editButton" class="btn btn-secondary">Bạn muốn sửa thông tin của bạn ?</button><br> <br>
                <button type="submit" class="btn btn-primary" id="updateButton" style="display:none;">Cập nhật</button>
                <!-- Phần còn lại của mã giống như trước -->
            </form>
        </div>
        <!-- <?php
        $id_kh = $_SESSION['IDKhachHang'];
        $sql_ls_dh = "SELECT * FROM datphong,khachhang where datphong.IDKhachHang = khachhang.ID AND datphong.IDKhachHang = '$id_kh' ORDER BY datphong.ID desc";
        $query_ls_dh = mysqli_query($mysql, $sql_ls_dh);
        ?> -->
        <div class="col-md-6">
            <!-- <h2>Lịch Sử Giao Dịch</h2> -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Ngày Giao Dịch</th>
                        <th>Số Tiền</th>
                        <th>Ngày vào</th>
                        <th>Ngày ra</th>
                        <th>Số ngày ở</th>
                        <th>Các phòng đã đặt</th>
                        <th>Ngày vào</th>
                        <th>Trạng Thái</th>
                    </tr>
                    <!-- <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query_ls_dh)){
                            $i++;
                        }
                    ?> -->
                    <tr>
                        <th>Ngày Giao Dịch</th>
                        <th>Tổng tiền</th>
                        <th>Ngày vào</th>
                        <th>Ngày ra</th>
                        <th>Số ngày ở</th>
                        <th>Các phòng đã đặt</th>
                        <th>Ngày vào</th>
                        <th>Trạng Thái</th>
                    </tr>";


                </thead>
                <tbody>
                    <!-- Các hàng dữ liệu sẽ được thêm vào đây -->
                </tbody>
            </table>
        </div>
    </div>
</div>