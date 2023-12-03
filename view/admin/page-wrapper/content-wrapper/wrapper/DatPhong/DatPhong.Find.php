<div class="container md-6">
<div class="row">
        <!-- Form Section (Left Side) -->
        <div class="col-md-8">
            <?php 
            $HienThiThongTin = HienThiThongTinKhach();

            // Kiểm tra nếu kết quả là một mảng và lấy giá trị cần thiết từ mảng
            if (is_array($HienThiThongTin)) {
                $TenKhachHang = $HienThiThongTin[0]['TenKhachHang'];
            ?>
            <h2 class="mb-4">Tên khách hàng muốn đặt phòng</h2>
            <input type="text" class="form-control" name="TenKhachHang" id="TenKhachHang" value="<?php echo $TenKhachHang; } ?>"><br><br>
            <h2 class="mb-4">Khoảng thời gian đặt phòng</h2>
            <form action="" method="post">
            <div class="mb-3">
                <label for="checkin" class="form-label" >Ngày Check-In:</label>
                <input type="date" class="form-control" id="checkin" name="checkin" value="<?php echo isset($_SESSION["NgayCheckIn"]) ? $_SESSION["NgayCheckIn"] : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="checkout" class="form-label">Ngày Check-Out:</label>
                <input type="date" class="form-control" id="checkout" name="checkout"  value="<?php echo isset($_SESSION["NgayCheckOut"]) ? $_SESSION["NgayCheckOut"] : ''; ?>">
            </div>
            <div class="mb-3">
                <label for="AmountOfDay" class="form-label">Số ngày ở dựa trên ngày check</label>
                <input type="number" name="AmountOfDay"  value="<?php echo isset($_SESSION["AmountOfDay"]) ? $_SESSION["AmountOfDay"] : ''; ?>" disabled>
                <input type="number" name="AmountOfDay"  value="<?php echo isset($_SESSION["AmountOfDay"]) ? $_SESSION["AmountOfDay"] : ''; ?>" style="display: none;">
            </div>
            <button type="submit" class="btn btn-primary">Tìm khoảng phòng mới</button><br>
            <?php 
            // var_dump($_SESSION);
            ?>
        </form>
        </div>
        <div class="col-md-8">
            <div class="room">
                
            </div>
        </div>  
    </div>
</div>
<div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID loại phòng</th>
                            <th>Tên loại phòng</th>
                            <th>Giá phòng cho <?php echo isset($_SESSION["AmountOfDay"]) ? $_SESSION["AmountOfDay"] : ''; ?> ngày</th>
                            <th>Mô tả phòng</th>
                            <th>ID phòng còn trống</th>
                            <th>Số lượng phòng muốn đặt</th>
                            <th>Ảnh phòng</th>
                            <th>Phần này để trống để xuất ra nút xác nhận</th>
                            
                        </tr>
                    </thead>
                        <tfoot>

                        <?php 
                            $allPhongTrong = getAllPhongTrong();
                            if (is_array($allPhongTrong) || is_object($allPhongTrong)): 
                                foreach ($allPhongTrong as $room): 
                                    $roomIDs = is_string($room['InRaIDPhong']) ? explode(',', $room['InRaIDPhong']) : [];
                                    $roomImages = is_string($room['AnhPhong']) ? explode(',', $room['AnhPhong']) : [];
                        ?>
                                    <tr>
                                        <td><?= htmlspecialchars($room['ID']); ?></td>
                                        <td><?= htmlspecialchars($room['Ten']); ?></td>
                                        <td>
                                            <div class="container">
                                                [<div id="dayamount"><?= $_SESSION["AmountOfDay"]; ?></div> * <div id="roomprice"><?= $room['GiaPhongChung']; ?></div> ] = <div class="finalPrice"></div>
                                            </div>
                                        </td>
                                        <td><?= htmlspecialchars($room['MoTa']); ?></td>
                                        <td>
                                            <?php foreach ($roomIDs as $id): ?>
                                                <?= htmlspecialchars($id); ?><br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>            
                                            <select name="soLuongPhong" class="form-select">
                                                <?php for ($i = 1; $i <= $room['DemSoPhong']; $i++): ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <?php foreach ($roomImages as $image): ?>
                                                <img src="<?= htmlspecialchars($filePath . $image); ?>" alt="Ảnh phòng" style="width:100px; height:auto;"><br>
                                            <?php endforeach; ?>
                                        </td>
                                        <td>
                                        <form action="" method="post" name="ChoVaoDonDatPhong">
                                            <input type="hidden" name="IDKhachHang" value="<?= $_SESSION["IDKhachHang"]; ?>">
                                            <input type="hidden" name="IDLoaiPhong" value="<?= htmlspecialchars($room['ID']); ?>">
                                            <input type="hidden" name="CheckIn" value="<?= $_SESSION["NgayCheckIn"]; ?>">
                                            <input type="hidden" name="CheckOut" value="<?= $_SESSION["NgayCheckOut"]; ?>">
                                            <input type="hidden" name="SoNgayO" value="<?= $_SESSION["AmountOfDay"]; ?>">
                                            <input type="hidden" name="TongTien" value="<?= $_SESSION["AmountOfDay"]; ?>">

                                            <!-- Thêm số lượng phòng dựa trên DemSoPhong -->
                                            <input type="hidden" name="soLuongPhong" value="<?= $room['DemSoPhong']; ?>">

                                            <button type="submit" class="btn btn-info">Chọn phòng này</button>
                                        </form>
                            <?php 
                                    endforeach; 
                                else:
                                    echo "Không có phòng trống.";
                                endif;
                            ?>

                        </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Hàm tính khoảng thời gian giữa ngày vào và ra
function calculateDays() {
    var checkinDate = new Date(document.getElementById('checkin').value);
    var checkoutDate = new Date(document.getElementById('checkout').value);

    var timeDifference = checkoutDate - checkinDate;

    var numberOfDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

    var visibleAmountInput = document.querySelector('input[name="AmountOfDay"]:not([style*="display: none"])');
    visibleAmountInput.value = numberOfDays;

    var hiddenAmountInput = document.querySelector('input[name="AmountOfDay"][style*="display: none"]');
    hiddenAmountInput.value = numberOfDays;
}

document.getElementById('checkin').addEventListener('change', calculateDays);
document.getElementById('checkout').addEventListener('change', calculateDays);
});

function calculateDateRange() {
    var checkinDate = new Date(document.getElementById('checkin').value);
    var checkoutDate = new Date(document.getElementById('checkout').value);

    if (!isNaN(checkinDate.getTime()) && !isNaN(checkoutDate.getTime())) {
        var timeDiff = Math.abs(checkoutDate.getTime() - checkinDate.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

        // Cập nhật giá trị cho ô input ẩn
        document.getElementById('HiddenAmountOfDay').value = diffDays;
    }
}

function calculateTotal() {
    var elements = document.querySelectorAll('.container');

    elements.forEach(function (element) {
        var dayAmount = parseInt(element.querySelector('.dayamount').innerText);
        var roomPrice = parseInt(element.querySelector('.roomprice').innerText.replace(',', ''));
        var finalPrice = dayAmount * roomPrice;

        // In kết quả vào div finalPrice trong mỗi container
        element.querySelector('.finalPrice').innerText = finalPrice.toLocaleString(); // Định dạng số có dấu phẩy ngăn cách hàng nghìn
    });
}

// Gọi hàm tính tổng khi trang được tải
calculateTotal();
</script>


