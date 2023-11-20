
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
        <a class="nav-link" href="admin.php">
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
                <a href="?act=QuanLyDonDatPhong" class="collapse-item">Trang quản lý đơn đặt<br> phòng</a>
                <a href="?act=QuanLyTaiKhoan" class="collapse-item">Trang quản lý tài khoản</a>
                <a href="?act=QuanLyDichVu" class="collapse-item">Trang quản lý dịch vụ</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Phần này sẽ làm <br> nếu còn thời gian</h6>
                <a class="collapse-item" href="?act=Banner">Xử lý banner</a>
                <a class="collapse-item" href="?act=Policy">Xử lý policy</a>
                <a class="collapse-item" href="?act=ContactForm">Đọc yêu cầu hợp tác</a>
            </div>
        </div>
    </li>
</ul>
<!-- Sau này nếu có thích thì có thể thêm trang nếu muốn -->
<!--Kết phần sidebar -->