<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>keto</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<style>
   /* Add this CSS to your existing style.css file or create a new one */

   /* Align the icon and menu items in a straight line */
   .navbar-nav {
      display: flex;
      align-items: center;
   }

   /* Adjust the spacing between menu items */
   .nav-item {
      margin-right: 15px;
      /* You can adjust this value as needed */
   }

   /* Remove the margin for the last menu item */
   .nav-item:last-child {
      margin-right: 0;
   }

   /* Style the dropdown container */
   .user-dropdown {
      position: relative;
      display: inline-block;
      padding-bottom: 20px;
   }

   /* Style the dropdown content (hidden by default) */
   .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
   }

   /* Style the dropdown links */
   .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
   }

   /* Change color on hover */
   .dropdown-content a:hover {
      background-color: #f1f1f1;
   }

   /* Show the dropdown content when the user hovers over the container */
   .user-dropdown:hover .dropdown-content {
      display: block;
   }

   /* Style for smaller screens */
   @media (max-width: 767px) {
      .navbar-nav {
         flex-direction: column;
         align-items: flex-start;
      }

      .hamburger_container {
         display: block;
         margin-top: 10px;
         /* Adjust the margin as needed */
      }

      /* You may need additional styles for the mobile menu */
   }
</style>

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->
<?php
// Phần PHP xử lý logic
$loggedIn = isset($_SESSION) && !empty($_SESSION);
$loginMessage = isset($login) && $login != '' ? $login : '';
?>

<header>
   <!-- header inner -->
   <div class="header">
      <div class="container">
         <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
               <div class="full">
                  <div class="center-desk">
                     <div class="logo">
                        <a href="index.php"><img src="images/logo.png" alt="#" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
               <nav class="navigation navbar navbar-expand-md navbar-dark">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                        <!-- Đặt các mục menu tại đây -->
                        <li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
                        <!-- Các mục khác -->

                        <?php if (!$loggedIn): ?>
                           <!-- Đoạn này xuất hiện khi người dùng chưa đăng nhập -->
                           <li class="nav-item">
                              <a class="nav-link" href="index.php?act=dangnhap">Đăng nhập</a>
                           </li>
                           <?php echo $loginMessage; ?>
                        <?php else: ?>
                           <!-- Đoạn này xuất hiện khi người dùng đã đăng nhập -->
                           <li class="nav-item">
                              <div class="user-dropdown">
                                 <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                                 <div class="dropdown-content">
                                    <a href="index.php?act=thongtintk">Tài khoản</a>
                                    <a href="index.php?act=thoat">Đăng Xuất</a>
                                 </div>
                              </div>
                           </li>
                        <?php endif; ?>
                     </ul>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </div>
</header>

   <!-- end header inner -->
   <!-- end header -->
