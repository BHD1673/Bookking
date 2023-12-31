<?php
function getAvailableRoomTypes($dateIn, $dateOut) {
    $sql = "
        SELECT 
            lp.ID, lp.Ten, lp.MoTa, lp.GiaPhongChung,
            COUNT(p.ID) AS RoomCount,
            GROUP_CONCAT(p.ID) As RoomArray
        FROM 
            loaiphong lp
        LEFT JOIN 
            phong AS p ON lp.ID = p.ID_LoaiPhong
        WHERE 
            NOT EXISTS (
                SELECT 1
                FROM ganphong gp
                JOIN datphong dp ON gp.IDDatPhong = dp.ID
                WHERE gp.IDPhong = p.ID
                AND dp.NgayCheckOut > STR_TO_DATE(?, '%Y-%m-%d') 
                AND dp.NgayCheckIn < STR_TO_DATE(?, '%Y-%m-%d')
                AND dp.TrangThaiDon = '1'
            )
        GROUP BY 
            lp.ID, lp.Ten, lp.MoTa, lp.GiaPhongChung;";

    try {
        return pdo_query($sql, $dateIn, $dateOut);
    } catch (Exception $e) {
        echo $e->getMessage();
        return false;
    }
}
$dateIn = "";
$dateOut = "";
$amountOfDay = "";


?>

<div class="container">
    <div class="row">
        <!-- Date selection form -->
        <div class="col-md-3">
            <h2 class="mb-4">Khoảng thời gian đặt phòng</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="checkin" class="form-label">Ngày Check-In:</label>
                    <input type="date" class="form-control" id="DateIn" name="DateIn" value="<?= isset($_SESSION['bookingInfor']['dateIn']) ? $_SESSION['bookingInfor']['dateIn'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="checkout" class="form-label">Ngày Check-Out:</label>
                    <input type="date" class="form-control" id="DateOut" name="DateOut" value="<?= isset($_SESSION['bookingInfor']['dateOut']) ? $_SESSION['bookingInfor']['dateOut'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="AmountOfDay" class="form-label">Số ngày ở dựa trên ngày check</label>
                    <input type="number" name="AmountOfDay" id="AmountOfDay" value="<?= isset($_SESSION['bookingInfor']['amountOfDay']) ? $_SESSION['bookingInfor']['amountOfDay'] : ''; ?>" disabled>
                </div>
                <a href="index.php?act=thongtin">Xác nhận lựa chọn</a>
                <button type="submit" class="btn btn-primary">Sửa lại khoảng thời gian</button>
            </form>
        </div>
<?php 
    // Xử lý yêu cầu xóa
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['cart'][$index])) {
        // Display debugging information
        echo "Xóa phòng $index";

        // Xóa mục khỏi giỏ hàng
        unset($_SESSION['cart'][$index]);
        // Cập nhật lại mảng để loại bỏ khoảng trống
        $_SESSION['cart'] = array_values($_SESSION['cart']);

        // Redirect to the cart page
        header("LOCATION: index.php?act=roomlist");
        exit();
    } else {
        // Display debugging information
        echo "Phòng không tồn tại trong giỏ hàng";
    }
}
// Xử lý yêu cầu sửa
if (isset($_POST['action']) && $_POST['action'] == 'update' && isset($_POST['index'])) {
    $index = $_POST['index'];
    if (isset($_SESSION['cart'][$index])) {
        // Cập nhật số lượng phòng
        $_SESSION['cart'][$index]['soLuongPhong'] = $_POST['soLuongPhong'][$index];
        // Bạn có thể thêm các cập nhật khác tại đây
    }
}
?>
        <div class="col-md-9">
                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <h2>Thông Tin Giỏ Hàng</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Phòng</th>
                                <th>Tên loại phòng</th>
                                <th>Giá một phòng</th>
                                <th>Số Lượng Phòng</th>
                                <th>Phòng đã chọn</th>
                                <th>Số Ngày Ở</th>
                                <th>Tổng tiền cho loại phòng</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                            <tr>
                                <td><?= $item['idPhong'] ?></td>
                                <td><?= $item['tenLoaiPhong'] ?></td>
                                <td><?= $item['giaPhongChung'] ?></td>
                                <td><?= $item['soLuongPhong'] ?></td>
                                <td> </td>
                                <td><?= $item['soNgayO'] ?></td>
                                <td><?= $item['totalPriceWithDay'] ?>.000</td>
                                <td>
                                <form action="" method="post" class="form-inline">
                                    <!-- Minus Button -->
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-outline-secondary" onclick="decrementValue(<?= $index ?>)">-</button>
                                        </div>

                                        <!-- Amount Display -->
                                        <input type="number" name="soLuongPhong[<?= $index ?>]" id="amount<?= $index ?>" value="<?= $item['soLuongPhong'] ?>" min="1" readonly class="form-control">

                                        <!-- Plus Button -->
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-outline-secondary" onclick="incrementValue(<?= $index ?>)">+</button>
                                        </div>
                                    </div>

                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="index" value="<?= $index ?>">

                                    <button type="submit" class="btn btn-primary ml-2">Cập Nhật</button>
                                </form>
                                </td>
                                <td>
                                    <a href="index.php?act=roomlist&action=delete&index=<?= $index ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa mục này?');">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <form action="" method="post">
                        <input type="hidden" name="cartDeleteAll" value="q">
                        <button class="btn btn-danger" type="submit">Xóa toàn bộ giỏ hàng</button><br><br>
                    </form>
                    <?php 
                    if (isset($_POST['cartDeleteAll'])) {
                        unset($_SESSION['cart']);
                        header('LOCATION: index.php?act=roomlist');
                        exit();
                    }
                    ?>
                    <a href="?act=thongtin"><button class="btn btn-primary">Chuyển tới trang xác nhận</button></a>
                </div>
            <?php else: ?>
                <p>Giỏ hàng trống.</p>
            <?php endif; ?>
        </div>

        <?php 
        $results = getAvailableRoomTypes($dateIn, $dateOut);

        foreach ($results as $row):
            $roomGroup = $row['RoomArray'];
            $roomTypeID = $row['ID'];
            $roomTypeName = $row['Ten'];
            $roomTypeDes = $row['MoTa'];
            $roomTypePrice = $row['GiaPhongChung'];
            $roomTypeAmountLeft = $row['RoomCount'];
            $amountOfDay = isset($_SESSION['bookingInfor']['amountOfDay']) ? $_SESSION['bookingInfor']['amountOfDay'] : '';
            $totalPriceWithDay = $roomTypePrice * $amountOfDay;
            // Random room selection logic
            $roomArray = explode(', ', $roomGroup);
            $numOfRoomsToSelect = isset($_POST['numOfRoomsRequested']) && is_numeric($_POST['numOfRoomsRequested']) ? (int)$_POST['numOfRoomsRequested'] : 1;
            $selectedRooms = (count($roomArray) >= $numOfRoomsToSelect) ? array_rand($roomArray, $numOfRoomsToSelect) : $roomArray;

            // Convert selectedRooms to a string if it's an array
            $selectedRoomString = is_array($selectedRooms) ? implode(', ', array_intersect_key($roomArray, array_flip($selectedRooms))) : $roomArray[$selectedRooms];
        ?>
        
        <div class="col-fluid">
            <br>
            <!-- Card for each room -->
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/about.png" class="img-fluid rounded-start" alt="Tên Phòng">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">ID loại phòng <?= $roomTypeID; ?></p>
                            <h5 class="card-title">Tên Loại Phòng: <?= $roomTypeName ?></h5>
                            <p class="card-text">Mô tả: <?= $roomTypeDes; ?></p>
                            <p class="card-text"><small class="text-muted">Giá Phòng: <?= $roomTypePrice; ?></small></p>
                            <p class="card-text"><small class="text-muted">Giá Phòng cho <?= isset($_SESSION['bookingInfor']['amountOfDay']) ? $_SESSION['bookingInfor']['amountOfDay'] : ''; ?> ngày là: <?= $totalPriceWithDay ?>.000</small></p>

                            <!-- Lựa chọn số lượng phòng, để từ đây chuẩn bị câu lệnh truy vấn tìm ID phòng  -->
                            <p class="card-text">Hãy chọn số lượng phòng</p>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <select name="soLuongPhong" class="form-select">
                                        <?php for ($i = 1; $i <= $roomTypeAmountLeft; $i++): ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <!-- Form đầu vào ẩn -->
                                <input type="hidden" name="idPhong" value="<?php echo $roomTypeID; ?>">
                                <input type="hidden" name="tenLoaiPhong" value="<?php echo $roomTypeName; ?>">
                                <input type="hidden" name="giaPhong" value="<?php echo $roomTypePrice; ?>">
                                <input type="hidden" name="DateIn" value="<?= isset($_SESSION['bookingInfor']['dateIn']) ? $_SESSION['bookingInfor']['dateIn'] : ''; ?>">
                                <input type="hidden" name="DateOut" value="<?= isset($_SESSION['bookingInfor']['dateOut']) ? $_SESSION['bookingInfor']['dateOut'] : ''; ?>">
                                <input type="hidden" name="soNgayO" value="<?= $amountOfDay; ?>">
                                <input type="hidden" name="totalPriceWithDay" value="<?= $totalPriceWithDay; ?>">
                            

                                <button type="submit" class="btn btn-primary">Cho phòng vào đơn đặt phòng của bạn</button>
                                <button class="btn btn-sucsess"><a href="?act=thongtin">Đặt phòng luôn</a></button>
                                <!-- <a href="?"></a><button class="btn btn-primary"></button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>







<script>
    function incrementValue(index) {
        var value = parseInt(document.getElementById('amount' + index).value, 10);
        value = isNaN(value) ? 1 : value;
        value++;
        document.getElementById('amount' + index).value = value;
    }

    function decrementValue(index) {
        var value = parseInt(document.getElementById('amount' + index).value, 10);
        value = isNaN(value) ? 1 : value;
        value = value > 1 ? value - 1 : 1;
        document.getElementById('amount' + index).value = value;
    }
document.addEventListener('DOMContentLoaded', (event) => {
    const checkInInput = document.getElementById('DateIn');
    const checkOutInput = document.getElementById('DateOut');
    const amountOfDayInput = document.getElementById('AmountOfDay');

    function calculateDaysBetweenDates() {
        const checkInDate = new Date(checkInInput.value);
        const checkOutDate = new Date(checkOutInput.value);
        if (checkInDate && checkOutDate) {
            const differenceInDays = (checkOutDate - checkInDate) / (1000 * 3600 * 24);
            amountOfDayInput.value = differenceInDays;
        } else {
            amountOfDayInput.value = '';
        }
    }

    checkInInput.addEventListener('change', calculateDaysBetweenDates);
    checkOutInput.addEventListener('change', calculateDaysBetweenDates);
    
    removeDuplicateCards();
});

function removeDuplicateCards() {
    const cards = document.querySelectorAll('.card');
    const uniqueCards = new Set();

    cards.forEach((card) => {
        const cardContent = card.innerHTML;
        if (!uniqueCards.has(cardContent)) {
            uniqueCards.add(cardContent);
        } else {
            card.remove();
        }
    });
}
</script>