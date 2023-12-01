<?php

// Check if DateIn and DateOut session variables are set
if (isset($_SESSION['DateIn']) && isset($_SESSION['DateOut'])) {
    // Retrieve the values from the session
    $dateIn = $_SESSION['DateIn'];
    $dateOut = $_SESSION['DateOut'];

} else {
    echo "Session variables not set.";
}
    $sql = 
    "SELECT 
    lp.Ten, 
    lp.MoTa, 
    lp.GiaPhongChung,
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
    lp.Ten, lp.MoTa, lp.GiaPhongChung;";

    try {
        $results = pdo_query($sql, $dateIn, $dateOut);
        if (!empty($results)) {
            foreach($results as $rows);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    
    
?>

<div class="container">
    <div class="row">
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

        <div class="col-md-6 border">
            <h2 class="mb-4">Thông tin đặt phòng</h2>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="TenLoaiPhong" class="form-label">Tên loại phòng đang chọn</label>
                        <input type="text" name="TenLoaiPhong" id="TenLoaiPhong" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="RoomAmount" class="form-label">Số lượng phòng</label>
                        <input type="number" name="RoomAmount" id="RoomAmount" class="form-control" disabled>
                    </div>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-md-6 mb-3">
                        <label for="TenLoaiPhong" class="form-label">Tên loại phòng đang chọn</label>
                        <input type="text" name="TenLoaiPhong" id="TenLoaiPhong" class="form-control" disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="RoomAmount" class="form-label">Số lượng phòng</label>
                        <input type="number" name="RoomAmount" id="RoomAmount" class="form-control" disabled>
                    </div>
                </div>
                <a href="index.php?act=XacNhanDonDatPhong">Xác nhận đơn đặt phòng</a>
            </form>
        </div>

<?php if (!empty($results)): ?>
<?php foreach ($results as $row): ?>
    <?php
    // Access individual fields in the result row
    $roomName = $row['Ten'];
    $description = $row['MoTa'];
    $price = $row['GiaPhongChung'];
    $roomIDs = explode(',', $row['RoomIDs']); // Convert comma-separated IDs to an array
    $roomCount = $row['RoomCount'];
    ?>
        <div class="card d-flex flex-row">
    <div class="col-md-3 d-flex align-items-center ">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="paymentMethod" id="choiceroom" checked>
            <label class="form-check-label" for="choiceroom">Chọn loại phòng này</label>
        </div>
    </div>
    <img src="images/about.png" class="card-img-top" alt="Ảnh phòng" style="border: 1px solid black; width: 30%;">
    <div class="card-body d-flex flex-column col-md-8">
        <h2 class="card-title mb-3">Tên loại phòng: <?php echo $roomName; ?></h2>
        <p class="price">Giá Phòng: <?php echo $price; ?></p>
        <p class="description">Mô tả: <?php echo $description; ?></p>

        <!-- Selection options -->
        <div class="row justify-content-end">
            <div class="col-md">
                <div class="mb-3">
                    <label for="amountInput" class="form-label">Số lượng phòng còn lại: 5</label>
                </div>
                <div class="mb-3">
                    <label for="RoomChoice" class="form-label">Lựa chọn số lượng phòng</label>
                    <select name="RoomChoice" id="RoomChoice" class="form-select">
                        <option selected>Lựa chọn</option>
                        <?php foreach ($roomIDs as $roomID): ?>
                        <!-- Using explode and foreach to print the value here -->
                        <option value="<?php echo $roomID; ?>"><?php echo $roomID; ?></option>
                        <?php endforeach; ?>
                        <!-- Add more options as needed -->
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No results found.</p>
<?php endif; ?>



</div>

</div>

            
        </div>
        
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    function calculateDaysBetweenDates() {
        var checkInDate = document.getElementById('checkin').value;
        var checkOutDate = document.getElementById('checkout').value;

        if(checkInDate && checkOutDate){
            var inDate = new Date(checkInDate);
            var outDate = new Date(checkOutDate);
            var differenceInTime = outDate.getTime() - inDate.getTime();
            var differenceInDays = differenceInTime / (1000 * 3600 * 24);

            document.getElementById('AmountOfDay').value = differenceInDays;
        } else {
            document.getElementById('AmountOfDay').value = '';
        }
    }

    document.getElementById('checkin').addEventListener('change', calculateDaysBetweenDates);
    document.getElementById('checkout').addEventListener('change', calculateDaysBetweenDates);
});

// Get all card elements
var cards = document.querySelectorAll('.card');

// Create an object to store unique card content
var uniqueCards = {};

// Iterate through each card
cards.forEach(function(card) {
    // Convert the card to innerHTML to use as an object key
    var cardHTML = card.innerHTML;
    
    // Check if the card content is not already in the object
    if (!uniqueCards[cardHTML]) {
        // Add the card content to the object
        uniqueCards[cardHTML] = true;
        // Print the unique card content
        console.log(card.outerHTML);
    }
});


</script>