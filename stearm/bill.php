<?php 
function getMostRecentAccount() {
	$sql = "SELECT *
	FROM khachhang
	ORDER BY ThoiGianTao DESC
	LIMIT 1;";
	return pdo_query($sql);
}

// Convert the random number to a string
$IDKhachHang = getMostRecentAccount();

function insertBookingData($IDKhachHang, $ngayCheckIn, $ngayCheckOut, $soNgayO, $tongSoPhong, $tongTien) {

        // Insert into 'datphong' table
        $sql_insert_datphong = "
            INSERT INTO `datphong` (
                `IDKhachHang`,
                `NgayCheckIn`,
                `NgayCheckOut`,
                `SoNgayO`,
                `TongSoPhong`,
                `TongTien`,
                `TrangThaiDon`
            )
            VALUES (?, ?, ?, ?, ?, ?, 0)
        ";

        pdo_execute($sql_insert_datphong, $IDKhachHang, $ngayCheckIn, $ngayCheckOut, $soNgayO, $tongSoPhong, $tongTien);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $soDienThoai = $_POST['tel'] ?? '';
    $diaChiNha = $_POST['address'] ?? '';
    $ngayCheckIn = $_POST['dateIn'] ?? '';
    $ngayCheckOut = $_POST['dateOut'] ?? '';
    $soNgayO = $_POST['soNgayO'] ?? '';
    $tongSoPhong = $_POST['soLuongPhong'] ?? 0;
    $tongTien = $_POST['totalPriceWithDay'] ?? 0.0;
    // $ngaySinh and $anhXacNhan are not provided in the form

    // Validate the data as needed

    // Call the insertBookingData function
    insertBookingData($IDKhachHang, $ngayCheckIn, $ngayCheckOut, $soNgayO, $tongSoPhong, $tongTien);
}

?>

<style>
	.invoice-title h2,
	.invoice-title h3 {
		display: inline-block;
	}

	.table>tbody>tr>.no-line {
		border-top: none;
	}

	.table>thead>tr>.no-line {
		border-bottom: none;
	}

	.table>tbody>tr>.thick-line {
		border-top: 2px solid;
	}

	.payment-button {
		padding: 15px 30px;
		font-size: 1.2em;
		border: none;
		background-color: greenyellow;
		color: black;
		cursor: pointer;
		border-radius: 5px;
		transition: background-color 0.3s ease;
		text-align: center;
	}

	.payment-button:hover {
		background-color: #45a049;
	}
</style>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<div class="container">
		<?php
		if (isset($_SESSION['email'])) {
			$email = $_SESSION['email'];
			
		} else {
			$name = "";
			$email = "";
			$tel = "";
			$address = "";
		}

		// var_dump($_SESSION['visitor_data']);
		?>
		
		<div class="row">
			<div class="col-xs-12">
				<div class="invoice-title">
					<h2>HOÁ ĐƠN</h2>
					<h3 class="pull-right"></h3>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-6">
						<address>
							<strong>Hóa đơn tới:</strong><br>
							Người đặt hàng: <?php //echo $email['TenKhachHang'] ?> <br>
							Email: <?php //echo $email['Email'] ?> <br>
							Số điện thoại: <?php //echo $email['Email'] ?> <br>
							Địa chỉ: <?php //echo $email['Email'] ?> <br>
							Ngày đến: <?php //echo $email['NgayCheckIn'] ?> <br>
						</address>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<address>
							<strong>Phương thức thanh toán:</strong><br>
							<select name="ThanhToan" id="form-control">
								<option value="">Vui lòng chọn phương thức thanh toán</option>
								<option value="1">Thanh toán trực tiếp</option>
							</select>
						</address>
					</div>
					<div class="col-xs-6 text-right">
						<address>
							<strong>Ngày đặt phòng:</strong><br>
							<?php
							$formatter = new IntlDateFormatter(
								'vi_VN', 
								IntlDateFormatter::FULL, 
								IntlDateFormatter::NONE,
								'Asia/Ho_Chi_Minh', // Bạn có thể chỉ định múi giờ phù hợp
								IntlDateFormatter::GREGORIAN
							);
							
							echo $formatter->format(time());
							
							?><br><br>
						</address>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><strong>Chi tiết đơn đặt phòng</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
							<thead>
								<tr>
									<td><strong>ID phòng</strong></td>
									<td class="text-center"><strong>Loại phòng</strong></td>
									<td class="text-center"><strong>Giá 1 phòng</strong></td>
									<td class="text-center"><strong>Số lượng phòng</strong></td>
									<td class="text-center"><strong>Số ngày ở</strong></td>
									<td class="text-center"><strong>Ngày checkin</strong></td>
									<td class="text-center"><Strong>Ngày checkout</Strong></td>
									<td class="text-right"><strong>Tổng</strong></td>
								</tr>
							</thead>
							<tbody>
								
								<?php  foreach ($_SESSION['cart'] as $item): ?>
									<tr>
										<td><?= htmlspecialchars($item['idPhong']) ?></td>
										<td class="text-center"><?= $item['tenLoaiPhong'] ?></td>
										<td class="text-center"><?php echo $item['giaPhongChung'] ?> .000 VND</td>
										<td class="text-center"><?= $item['soLuongPhong'] ?></td>
										<td class="text-center"><?= $item['soNgayO'] ?></td>
										<td class="text-center"><?= $item['dateIn'] ?></td>
										<td class="text-center"><?= $item['dateOut'] ?></td>
										<td class="text-right totalOneRoomPrice"><?= $item['totalPriceWithDay'] ?> .000 VND</td>
									</tr>
								<?php endforeach; ?>

								<!-- Tính toán và hiển thị tổng cộng tại đây -->
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Tổng giá trị đơn</strong></td>
									<td class="no-line text-right totalAllPrice"> <span>.000 VND</span></td>
								</tr>
							</tbody>

							</table>
						</div>
					</div>
					<form action="" method="post">
						<input type="hidden" name="name" value="<?php echo $name; echo $_SESSION['visitor_data']['name']; ?>">
						<input type="hidden" name="email" value="<?php echo $email ; echo $_SESSION['visitor_data']['email'];?>">
						<input type="hidden" name="tel" value="<?php echo $tel; echo $_SESSION['visitor_data']['phone']; ?>">
						<input type="hidden" name="adress" value="Địa chỉ: <?php echo $address; echo $_SESSION['visitor_data']['name']; ?> <br>">
						<input type="hidden" name="soNgayO" value="<?= $item['soNgayO'] ?>">
						<input type="hidden" name="dateIn" value="<?= htmlspecialchars($item['dateIn']) ?>">
						<input type="hidden" name="dateOut" value="<?= htmlspecialchars($item['dateOut']) ?>">
						<input type="hidden" name="soLuongPhong" value="<?= htmlspecialchars($item['soLuongPhong']) ?>">
						<input type="hidden" name="totalPriceWithDay" value="<?= htmlspecialchars($item['totalPriceWithDay']) ?>">
						<button class="payment-button" type="submit">Thanh toán</button>
					</form>
				</div>
			</div>
		</div>
	</div>