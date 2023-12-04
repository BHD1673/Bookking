<?php
/**
 * Check if session dates are set and valid.
 * 
 * @return array|null Returns an array with dates or null if not set.
 */
function getSessionDates() {
    if (isset($_SESSION['DateIn']) && isset($_SESSION['DateOut'])) {
        return ['dateIn' => $_SESSION['DateIn'], 'dateOut' => $_SESSION['DateOut']];
    }
    echo "Session không được gán";
    return null;
}

/**
 * Fetch available room types based on given dates.
 * 
 * @param string $dateIn  Check-in date.
 * @param string $dateOut Check-out date.
 * 
 * @return array|false Returns fetched data or false on failure.
 */
function getAvailableRoomTypes($dateIn, $dateOut) {
    $sql = "
        SELECT 
            lp.ID, lp.Ten, lp.MoTa, lp.GiaPhongChung,
            GROUP_CONCAT(p.ID) AS RoomIDs,
            COUNT(p.ID) AS RoomCount
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
                AND dp.NgayCheckOut > STR_TO_DATE(?, '%d-%m-%Y') 
                AND dp.NgayCheckIn < STR_TO_DATE(?, '%d-%m-%Y')
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

// Main execution block
$sessionDates = getSessionDates();
if ($sessionDates !== null) {
    $availableRooms = getAvailableRoomTypes($sessionDates['dateIn'], $sessionDates['dateOut']);
    if ($availableRooms !== false) {
        foreach ($availableRooms as $room) {
            // Process each room
        }
    }
}
?>


<div class="container">
    <div class="row">
        <!-- Date selection form -->
        <div class="col-md-3">
            <h2 class="mb-4">Khoảng thời gian đặt phòng</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="checkin" class="form-label">Ngày Check-In:</label>
                    <input type="date" class="form-control" id="checkin" name="checkin" value="<?php echo isset($_SESSION['DateIn']) ? $_SESSION['DateIn'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="checkout" class="form-label">Ngày Check-Out:</label>
                    <input type="date" class="form-control" id="checkout" name="checkout" value="<?php echo isset($_SESSION['DateOut']) ? $_SESSION['DateOut'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="AmountOfDay" class="form-label">Số ngày ở dựa trên ngày check</label>
                    <input type="number" name="AmountOfDay" id="AmountOfDay" disabled>
                </div>
                <a href="index.php?act=XacNhanDonDatPhong">Xác nhận lựa chọn</a>
                <button type="submit" class="btn btn-primary">Sửa lại khoảng thời gian</button>
            </form>
        </div>
        <!-- Room selection form -->
        <form action="">
            <?php if (!empty($results)): ?>
                <?php foreach ($results as $row): ?>
                    <?php
                        $roomTypeID = $row['ID'];
                        $roomName = $row['Ten'];
                        $description = $row['MoTa'];
                        $price = $row['GiaPhongChung'];
                        $roomIDs = explode(',', $row['RoomIDs']);
                        $roomCount = $row['RoomCount'];
                        $totalPrice = $_SESSION['AmountOfDay'] * $price;
                    ?>
                    <div class="card d-flex flex-row">
                        <div class="col-md-3 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paymentMethod" id="choiceroom" checked>
                                <label class="form-check-label" for="choiceroom">Chọn loại phòng này</label>
                            </div>
                        </div>
                        <img src="images/about.png" class="card-img-top" alt="Ảnh phòng" style="width: 30%;">
                        <div class="card-body d-flex flex-column col-md-8">
                            <h2 class="card-title mb-3">Tên loại phòng: <?php echo htmlspecialchars($roomName); ?></h2>
                            <p class="price">Giá Phòng: <?php echo htmlspecialchars($price); ?></p>
                            <p class="description">Mô tả: <?php echo htmlspecialchars($description); ?></p>

                            <div class="row justify-content-end">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="amountInput" class="form-label">Số lượng phòng còn lại: <?php echo htmlspecialchars($roomCount); ?></label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="GiaPhong" class="form-label">
                                            Giá phòng cho số ngày <?php echo htmlspecialchars($roomCount); ?> là : <?php echo htmlspecialchars($roomCount); ?> X <?php echo htmlspecialchars($_SESSION['AmountOfDay'] ?? ''); ?> = <?php echo htmlspecialchars($totalPrice); ?>
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label for="RoomChoice" class="form-label">Lựa chọn phòng</label>
                                        <select name="RoomChoice" id="RoomChoice" class="form-select">
                                            <option selected>Lựa chọn</option>
                                            <?php foreach ($roomIDs as $roomID): ?>
                                                <option value="<?php echo htmlspecialchars($roomID); ?>"><?php echo htmlspecialchars($roomID); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit" name="quickbookRoom">Đặt phòng luôn</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No results found.</p>
            <?php endif; ?>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const checkInInput = document.getElementById('checkin');
    const checkOutInput = document.getElementById('checkout');
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