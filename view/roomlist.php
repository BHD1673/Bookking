<?php

if (isset($_SESSION['DateIn']) && isset($_SESSION['DateOut'])) {
    $dateIn = $_SESSION['DateIn'];
    $dateOut = $_SESSION['DateOut'];

} else {
    echo "Session không được gán";
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
                    <label for="DateIn" class="form-label">Ngày Check-In:</label>
                    <input type="date" class="form-control" id="DateIn" name="DateIn" value="<?php echo isset($_SESSION['DateIn']) ? $_SESSION['DateIn'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="DateOut" class="form-label">Ngày Check-Out:</label>
                    <input type="date" class="form-control" id="DateOut" name="DateOut" value="<?php echo isset($_SESSION['DateOut']) ? $_SESSION['DateOut'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="AmountOfDay" class="form-label">Số ngày ở dựa trên ngày check</label>
                    <input type="number" name="AmountOfDay" id="AmountOfDay" value="<?php echo isset($_SESSION['AmountOfDay']) ? $_SESSION['AmountOfDay'] : ''; ?>" disabled>
                    <input type="hidden" name="AmountOfDay" id="AmountOfDay" value="<?php echo isset($_SESSION['AmountOfDay']) ? $_SESSION['AmountOfDay'] : ''; ?>">
                </div>
                <a href="index.php?act=XacNhanDonDatPhong">Xác nhận lựa chọn</a>
                <button type="submit" class="btn btn-primary">Sửa lại khoảng thời gian</button>
            </form>
        </div>
<form action="">
<?php if (!empty($results)): ?>
<?php foreach ($results as $row): ?>
    <?php
    // Access individual fields in the result row
    $roomName = $row['Ten'];
    $description = $row['MoTa'];
    $price = $row['GiaPhongChung'];
    $roomIDs = explode(',', $row['RoomIDs']);
    $roomCount = $row['RoomCount'];
    $TotalPrice = $_SESSION['AmountOfDay'] * $price;


    
    // Xử lý khi người dùng nhấn nút "Đặt phòng"
    if (isset($_POST['bookRoom'])) {
        $roomID = $_POST['RoomChoice'];
        $ngayCheckIn = $_POST['NgayCheckIn'];
        $ngayCheckOut = $_POST['NgayCheckOut'];
        $soNgayO = $_POST['SoNgayO'];
        $tongSoPhong = $_POST['TongSoPhong'];
        $tongTien = $_POST['TongTien'];
        $id = $_POST['ID'];
        $idDatPhong = $_POST['IDDatPhong'];
        $idPhong = $_POST['IDPhong'];
        QuickInsert($NgayCheckIn, $NgayCheckOut, $SoNgayO, $TongTien);
    
    }
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
                            <label for="amountInput" class="form-label">Số lượng phòng còn lại: <?php echo $roomCount; ?></label>
                        </div>
                        <div class="mb-3">
                            <label for="GiaPhong" class="form-label">Giá phòng cho số ngày <?php echo $roomCount; ?> là : <?php echo $roomCount; ?> X <?php echo isset($_SESSION['AmountOfDay']) ? $_SESSION['AmountOfDay'] : ''; ?> = <?php echo $TotalPrice; ?></label>
                        </div>
                        <div class="mb-3">
                            <label for="RoomChoice" class="form-label">Lựa chọn phòng</label>
                            <select name="RoomChoice" id="RoomChoice" class="form-select">
                                <option selected>Lựa chọn</option>
                                <?php foreach ($roomIDs as $roomID): ?>
                                    <option value="<?php echo $roomID; ?>"><?php echo $roomID; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <form action="">
                        <div class="mb-3">
                            <button class="btn btn-primamry" type="submit" name="bookRoom">Đặt phòng luôn</button>
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