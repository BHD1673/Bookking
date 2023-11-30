<div class="container">
    <div class="row">
        <!-- Form Section (Left Side) -->
        <div class="col-md-3">
            <h2 class="mb-4">Khoảng thời gian đặt phòng</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="checkin" class="form-label">Ngày Check-In:</label>
                    <input type="date" class="form-control" id="checkin" name="checkin">
                </div>
                <div class="mb-3">
                    <label for="checkout" class="form-label">Ngày Check-Out:</label>
                    <input type="date" class="form-control" id="checkout" name="checkout">
                </div>
                <div class="mb-3">
                    <label for="AmountOfDay" class="form-label">Số ngày ở dựa trên ngày check</label>
                    <input type="number" name="AmountOfDay" id="AmountOfDay" disabled>
                </div>
                <a href="?Nha"></a>
                <button type="submit" class="btn btn-primary">Tìm loại phòng mới</button>
            </form>
        </div>
    

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkInDate = $_POST["checkin"];
    $checkOutDate = $_POST["checkout"];

    header("location: Link dẫn đến cái file hiển thị danh mục");
    //Rồi dùng $_
    $sql = 
"SELECT 
    lp.Ten, 
    lp.MoTa, 
    lp.GiaPhongChung, 
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
        AND (
            (dp.NgayCheckIn <= ? AND dp.NgayCheckOut >= ?) OR
            (dp.NgayCheckIn < ? AND dp.NgayCheckOut >= ?) OR
            (dp.NgayCheckIn >= ? AND dp.NgayCheckOut <= ?)
        )
    )
GROUP BY 
    lp.Ten, lp.MoTa, lp.GiaPhongChung";

    try {
        $results = pdo_query($sql, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate, $checkInDate, $checkOutDate);
        if (!empty($results)) {
            displayRooms($results);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function displayRooms($rooms) {
    foreach ($rooms as $row) {
        displayRoomCard($row);
    }
}

function displayRoomCard($room) {
    echo '<div class="card d-flex flex-row">';
    echo '<img src="images/about.png" class="card-img-top" alt="Ảnh phòng" style="border: 1px solid black; width: 30%;">';
    echo '<div class="card-body d-flex flex-column">';
    echo '<h2 class="card-title mb-3">Tên loại phòng: ' . $room['Ten'] . '</h2>';
    displayRoomDetails($room);
    displaySelectionOptions($room);
    echo '</div></div>';
}

function displayRoomDetails($room) {
    echo '<div class="row">';
    echo '<div class="col-md">';
    echo '<p class="card-text">Giá phòng chung: ' . $room['GiaPhongChung'] . ' VNĐ</p>';
    echo '<p class="card-text">Mô tả: ' . $room['MoTa'] . '</p>';
    echo '</div></div>';
}

function displaySelectionOptions($room) {
    echo '<div class="row justify-content-end">';
    echo '<div class="col-md">';
    echo '<div class="form-check">';
    echo '<input class="form-check-input" type="radio" name="paymentMethod" id="choiceroom" checked>';
    echo '<label class="form-check-label" for="choiceroom">Chọn loại phòng này</label>';
    echo '</div></div>';
    echo '<div class="col-md">';
    echo '<div class="form-group">';
    echo '<label for="amountInput">Số lượng phòng còn lại: ' . $room['RoomCount'] . '</label>';
    echo '</div></div></div>';
}
?>

        

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