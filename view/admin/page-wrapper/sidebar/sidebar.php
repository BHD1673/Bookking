<?php 
//Trang này dùng để chứa file html sidebar, là cái thanh điều hướng.
//Như là quay về trang index, hướng đến trang xem kỳ thi, vân vân
//Ghi chú: Bắt buộc sẽ phải xóa dòng này khi đến cuối môn.
?>

         <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Trang chủ</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Quay về trang chủ admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Giao diện chính
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Các trang chính</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?act=QuanLyLoaiPhong">Trang quản lý loại phòng</a>
                        <a class="collapse-item" href="?act=QuanLyPhong">Trang quản lý phòng</a>
                        <a href="?act=QuanLyDonDatPhong" class="collapse-item">Trang quản lý đơn đặt phòng</a>
                        <a href="?act=QuanLyTaiKhoan" class="collapse-item">Trang quản lý tài khoản</a>
                        <a href="?act=QuanLyDichVu" class="collapse-item">Trang quản lý dịch vụ</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Sau này nếu có thích thì có thể thêm trang nếu muốn -->
        <!--Kết phần sidebar-->