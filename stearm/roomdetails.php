<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <style>

/*****************globals*************/
body {
  font-family: 'open sans';
  overflow-x: hidden;
 }

img {
  max-width: 100%; }
.container{
    width: 1200px;
    max-width: 1200px;
  
}
  

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }
/* Phần Thiết Kế Cho Services */

.services {
    margin-top: 20px;
}

.service {
    display: inline-block;
    margin-right: 15px;
    padding: 8px 15px;
    background-color: #3498db; /* Màu nền */
    color: #fff; /* Màu chữ */
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.service:hover {
    background-color: #2980b9; /* Màu nền khi di chuột qua */
}

/* Hộp tooltip */
.service[data-toggle="tooltip"]:hover:after {
    content: attr(title);
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    padding: 8px;
    background-color: #333; /* Màu nền tooltip */
    color: #fff; /* Màu chữ tooltip */
    border-radius: 5px;
    z-index: 1;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.service[data-toggle="tooltip"]:hover:after {
    opacity: 1;
}

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }


/*# sourceMappin/* Định dạng chữ trong phần Services */



    </style>
  </head>

  <body>
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
              <?php echo '<div class="tab-pane active" id="pic-1"><img src="'.$AnhPhong.'" alt="#"/></div>' ?>
						  
						  <!-- <div class="tab-pane" id="pic-2"><img src="images/room2.jpg" alt="#"/></div>
						  <div class="tab-pane" id="pic-3"><img src="images/room3.jpg" alt="#"/></div>
						  <div class="tab-pane" id="pic-4"><img src="images/room4.jpg" alt="#"/></div>
						  <div class="tab-pane" id="pic-5"><img src="images/room5.jpg" alt="#"/></div> -->
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="images/room1.jpg" alt="#"/></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="images/room2.jpg" alt="#"/></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="images/room3.jpg" alt="#"/></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="images/room4.jpg" alt="#"/></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="images/room5.jpg" alt="#"/></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $TenLoaiPhong?> </h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description"><?php echo $MoTaLoaiPhong?></p>
						<h4 class="price">Giá: <span><?php echo $GiaLoaiPhong?>/ NIGHT</span></h4>
						<p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                        <h5 class="sizes">Amenities:
                            <span class="size" data-toggle="tooltip" title="Free Wi-Fi">Free Wi-Fi</span>
                            <span class="size" data-toggle="tooltip" title="Air Conditioning">Air Conditioning</span>
                            <span class="size" data-toggle="tooltip" title="Room Service">Room Service</span>
                          <!-- Thêm các tiện ích khác theo ý muốn -->
                        </h5>
                        <h5 class="services">
                            <span class="service" data-toggle="tooltip" title="24/7 Concierge" >24/7 Concierge</span>
                            <span class="service" data-toggle="tooltip" title="Airport Shuttle">Airport Shuttle</span>
                            <span class="service" data-toggle="tooltip" title="Laundry Service" style="padding-top: 10px;">Laundry Service</span>
                        <!-- Thêm các dịch vụ khác theo ý muốn -->
</h5>
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button" ><a href="index.php?act=thongtin">>Đặt Phòng</a></button>
							<button class="like btn btn-default" type="button" ><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php
    include "view/comment.php";
    ?>
    <?php
    include "view/room.php";
    include "view/gallery.php";
    ?>
  </body>
</html>
