<?php
// Kiểm tra cái URL đặt hay không
if(isset($_GET['page'])){
    $page = $_GET['page'];

    // Thêm vào những trang chính.
    switch($page){
        case 'dashboard':
            include('wrapper/main-page.php');
            break;
        case 'crud_category':
            include('wrapper/crud-category.php');
            break;
        case 'crud_item':
            include('wrapper/crud-item.php');
            break;
        // Thêm các case khác nếu cần
        default:
            // Thêm trang 404 khi tham số URL người dùng nhập vào sai
            include('wrapper/404.php');
            break;
    }
} else {
    // Quay trở về trang cơ bản khi parameter không đặt gì hết
    header("Location: index.php?page=dashboard");
    exit();
}
?>