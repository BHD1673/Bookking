<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NgayCheckInDuKien = $_POST["checkin"];
    $NgayCheckoutDuKien = $_POST["checkout"];

    
    if (!empty($result)) {
        echo '<h3>Các phòng trống bao gồm:</h3>';
        echo '<ul class="list-group">';
        echo '<form>';
        echo '<div class="form-check">';
        $choiceRoomByRoomID;
        foreach ($result as $room) {
            if ($room['TrangThaiPhong'] == 'Còn trống') {
                echo '<li class="list-group-item"> <input class="form-check-input" type="checkbox" id="check1" name="option1" value="'. $room['ID'] .'"> ' . $room['TenPhong'] . ' - ' . $room['ViTriPhong'] . ' - ' . $room['TrangThaiPhong'] . '<a href="$act=AddPhongIntoAddNewDonHang"><button type="button" class="btn btn-primary">Chọn phòng</button></a> </li>';
                // echo '<li class="list-group-item"> <input class="form-check-input" type="checkbox" id="check1" name="option1" value="'. $room['ID'] .'"> ' . $room['TenPhong'] . ' - ' . $room['ViTriPhong'] . ' - ' . $room['TrangThaiPhong'] . '<a href="$act=AddPhongIntoAddNewDonHang '. $room['AddRoomID'].'"><button type="button" class="btn btn-primary">Chọn phòng</button></a> </li>';
                
            }
        }
        echo '<a href="$act=AddPhongIntoAddNewDonHang"><button type="button" class="btn btn-primary">Chọn nhiều phòng cùng lúc</button></a>';
        echo '<a href="admin.php?act=AddDatPhong"><button type="button" class="btn btn-primary">Chọn tất cả các phòng còn lại</button></a>';
        echo '</form>';
        echo '</div>';
        echo '</ul>';
    } else {
        echo '<p class="alert alert-warning">Không có phòng nào phù hợp với yêu cầu của bạn</p>';
    }
} else {
    // Xử lý khi không gửi gì cả
    echo '<p>Check</p>';
}

?>