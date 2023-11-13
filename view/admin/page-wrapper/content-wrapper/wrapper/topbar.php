<?php 
//Trang này để set up cái top bar có điều chỉnh cái gì không, cái này là cái phần bao gồm thông báo
//đăng xuất, hiện nút xem chi tiết thông tin của chính admin
//Ghi chú: Bắt buộc sẽ phải xóa dòng này khi đến cuối môn.
 ?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>


    <!-- Phần này tôi cảm thấy có thể giữ lại được nếu cần vì tôi thấy
        nếu cần thì mình có thể dùng để thông báo ngay trong admin như có giáo viên
        khác vừa tạo ra một kỳ thi mới chẳng hạn
     -->
    <!-- Nav Item - Thông báo -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Span để số lượng thông báo -->
            <span class="badge badge-danger badge-counter">3+</span>
        </a>
        <!-- Dropdown - Thông báo -->
        <!-- Phần này là phần được kích hoạt trên Javascript -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Tiêu đề cho phần thông báo
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">20/10/2023</div>
                    <!-- Thẻ font-weight-bold có thể để cho những cái quan trọng -->
                    <span class="font-weight-bold">Một giáo viên mới vừa tạo một kỳ thi mới!</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">20/11/2023</div>
                    <!-- Thẻ này có thể để trống cho những cái dạng tầm ngắn, không như cái thẻ
                        span ở trên với cái class font-weight-bold
                     -->
                    Có kỳ thì đang được bắt đầu lúc này, vui lòng chú ý
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">1/11/2023</div>
                    Chú ý: Có thể có sinh viên gian lận trong kỳ thi
                </div>
                <!-- Có thể trong code chính thì mình có thêm cái tự động cập nhật thông báo

                 -->
            </a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Hiện thông tin cá nhân  -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Tên người đang được đăng nhập</span>
            <img class="img-profile rounded-circle"
                src="img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Xem thông tin cá nhân
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Có thể thêm nếu các ông cảm thấy cần
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Đăng xuất khỏi admin
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- Hết phần topbar -->