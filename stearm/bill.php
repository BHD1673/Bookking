<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
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

<body>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	<div class="container">
		<?php
		if (isset($_SESSION['email'])) {
			$name = $_SESSION['email']['TenKhachHang'];
			$email = $_SESSION['email']['Email'];
			$tel = $_SESSION['email']['SoDienThoai'];
			$address = $_SESSION['email']['DiaChiNha'];
		
		} else {
			$name = "";
			$email = "";
			$tel = "";
			$address = "";
		}
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
							<strong>Billed To:</strong><br>
							Người đặt hàng: <?php echo $name ?> <br>
							Email: <?php echo $email ?> <br>
							Số điện thoại: <?php echo $tel ?> <br>
							Địa chỉ: <?php echo $address ?> <br>
						</address>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<address>
							<strong>Payment Method:</strong><br>
							Thanh toán Online
						</address>
					</div>
					<div class="col-xs-6 text-right">
						<address>
							<strong>Order Date:</strong><br>
							<?php
							// Lấy ngày hiện tại và định dạng nó
							$orderDate = date("F, j, Y");
							echo $orderDate;
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
						<h3 class="panel-title"><strong>Order summary</strong></h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<td><strong>Item</strong></td>
										<td class="text-center"><strong>Price</strong></td>
										<td class="text-center"><strong>Quantity</strong></td>
										<td class="text-right"><strong>Totals</strong></td>
									</tr>
								</thead>
								<tbody>
									<!-- foreach ($order->lineItems as $line) or some such thing here -->
									<tr>
										<td></td>
										<td class="text-center">$10.99</td>
										<td class="text-center">1</td>
										<td class="text-right">$10.99</td>
									</tr>
									<tr>
										<td>BS-400</td>
										<td class="text-center">$20.00</td>
										<td class="text-center">3</td>
										<td class="text-right">$60.00</td>
									</tr>
									<tr>
										<td>BS-1000</td>
										<td class="text-center">$600.00</td>
										<td class="text-center">1</td>
										<td class="text-right">$600.00</td>
									</tr>
									<tr>
										<td class="thick-line"></td>
										<td class="thick-line"></td>
										<td class="thick-line text-center"><strong>Subtotal</strong></td>
										<td class="thick-line text-right">$670.99</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Shipping</strong></td>
										<td class="no-line text-right">$15</td>
									</tr>
									<tr>
										<td class="no-line"></td>
										<td class="no-line"></td>
										<td class="no-line text-center"><strong>Total</strong></td>
										<td class="no-line text-right">$685.99</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<button class="payment-button"><a href="index.php">Thanh Toán</a></button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>