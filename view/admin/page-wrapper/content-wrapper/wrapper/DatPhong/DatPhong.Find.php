<div class="container md-6">
<div class="row">
        <!-- Form Section (Left Side) -->
        <div class="col-md-4">

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
                <input type="number" name="AmountOfDay"  value="<?php echo isset($_SESSION["SoNgayO"]) ? $_SESSION["SoNgayO"] : ''; ?>" disabled>
                <input type="hidden" name="AmountOfDay"  value="<?php echo isset($_SESSION["SoNgayO"]) ? $_SESSION["SoNgayO"] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Tìm khoảng phòng mới</button><br>
            <?php 
            // var_dump($_SESSION);
            ?>
        </form>
        </div>
        <div class="col-md-8">
            <div class="container">
                <h2 class="mt-4" id="title">Thông tin khách hàng đã chọn</h2>
                <div class="row" id="userInfoContainer">
                    <!-- User info will be added here using JavaScript -->
                </div>
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
                            <th>Phần này để trống để xuất ra nút xác nhận</th>
                            
                        </tr>
                    </thead>
                        <tfoot>

                        <?php 
                            $allPhongTrong = getAllPhongTrong();
                            if (is_array($allPhongTrong) || is_object($allPhongTrong)): 
                                foreach ($allPhongTrong as $room): 
                                    $roomIDs = is_string($room['InRaIDPhong']) ? explode(',', $room['InRaIDPhong']) : [];
                        ?>
                                    <tr>
                                        <td><?= $room['ID']; ?></td>
                                        <td><?= $room['Ten']; ?></td>
                                        <td>
                                            <div class="container">
                                                <?= $_SESSION["AmountOfDay"]; ?> <?= $room['GiaPhongChung']; ?>
                                            </div>
                                        </td>
                                        <td><?= $room['MoTa']; ?></td>
                                        <td>
                                            <?php foreach ($roomIDs as $id): ?>
                                                <?= $id; ?><br>
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
                                        <form action="" method="post" name="ChoVaoDonDatPhong">
                                            <input type="hidden" name="IDKhachHang" value="<?= $_SESSION["userChoiceToBook"]['IDKhachHang']; ?>">
                                            <input type="hidden" name="IDLoaiPhong" value="<?= $room['ID']; ?>">
                                            <input type="hidden" name="CheckIn" value="<?= $_SESSION["NgayCheckIn"]; ?>">
                                            <input type="hidden" name="CheckOut" value="<?= $_SESSION["NgayCheckOut"]; ?>">
                                            <input type="hidden" name="SoNgayO" value="<?= $_SESSION["AmountOfDay"]; ?>">
                                            <input type="hidden" name="TongTien" value="">
                                            <input type="hidden" name="soLuongPhong" value="<?= $room['DemSoPhong']; ?>">

                                            <button type="submit" class="btn btn-info">Chọn phòng này</button>
                                        </form>
                            <?php 
                                    endforeach; 
                                else:
                                    echo "Không có phòng trống.";
                                endif;
                                if(isset($_POST["ChoVaoDonDatPhong"])) {
                                    // Lấy dữ liệu từ form
                                    $idKhachHang = $_POST["IDKhachHang"];
                                    $idLoaiPhong = $_POST["IDLoaiPhong"];
                                    $ngayCheckIn = $_POST["CheckIn"];
                                    $ngayCheckOut = $_POST["CheckOut"];
                                    $soNgayO = $_POST["SoNgayO"];
                                    $tongTien = $_POST["TongTien"];
                                    $soLuongPhong = $_POST["soLuongPhong"];
                                
                                    // Gọi hàm InsertRoomIntoDonDatPhong để thêm dữ liệu vào CSDL
                                    InsertRoomIntoDonDatPhong($idKhachHang, $ngayCheckIn, $ngayCheckOut, $soNgayO, $soLuongPhong, $tongTien, $idLoaiPhong, $idDatPhong, $idPhong);
                                    
                                    // Điều hướng hoặc thực hiện các thao tác khác sau khi thêm dữ liệu thành công
                                    header("Location: trang-thanh-cong.php");
                                    exit();
                                }
                            ?>

                        </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
document.getElementById('yourFormId').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Get the check-in and check-out dates
    var checkinDate = document.getElementById('checkin').value;
    var checkoutDate = document.getElementById('checkout').value;

    // Convert the dates to JavaScript Date objects
    var checkin = new Date(checkinDate);
    var checkout = new Date(checkoutDate);

    // Calculate the difference in milliseconds
    var difference = checkout - checkin;

    // Convert milliseconds to days
    var numberOfDays = difference / (1000 * 3600 * 24);

    // Display or use the number of days as needed
    document.getElementsByName('AmountOfDay')[0].value = numberOfDays;
});
});
<?php 
if (isset($_SESSION['userChoiceToBook'])) {
    $userInfor = $_SESSION['userChoiceToBook'];
    echo json_encode($userInfor);} ?>

var userInfor = <?php echo json_encode($userInfor); ?>;
document.addEventListener('DOMContentLoaded', function () {
// Assuming userInfor is passed correctly from PHP to JavaScript
if (userInfor && typeof userInfor === 'object') {
    var container = document.getElementById('userInfoContainer');

    for (var key in userInfor) {
        if (userInfor.hasOwnProperty(key)) {
            var colDiv = document.createElement('div');
            colDiv.className = 'col-md-4 mb-4';

            var cardDiv = document.createElement('div');
            cardDiv.className = 'card';

            var cardBody = document.createElement('div');
            cardBody.className = 'card-body';

            var title = document.createElement('h5');
            title.className = 'card-title';
            title.textContent = key;

            var text = document.createElement('p');
            text.className = 'card-text';
            text.textContent = userInfor[key];

            cardBody.appendChild(title);
            cardBody.appendChild(text);
            cardDiv.appendChild(cardBody);
            colDiv.appendChild(cardDiv);
            container.appendChild(colDiv);
        }
    }
}
});

</script>





