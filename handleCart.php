<?php
// Xử lý cập nhật giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['index'])) {
    // Lấy index từ URL
    $index = $_GET['index'];

    // Đảm bảo rằng mục tồn tại trong giỏ hàng
    if (isset($_SESSION['cart'][$index])) {
        // Lấy số lượng mới từ form
        $newQuantity = $_POST['soLuongPhong'][$index];

        // Cập nhật số lượng trong giỏ hàng
        $_SESSION['cart'][$index]['soLuongPhong'] = $newQuantity;
    }
}

// Xử lý xóa mục khỏi giỏ hàng
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['index'])) {
    // Lấy index từ URL
    $index = $_GET['index'];

    // Đảm bảo rằng mục tồn tại trong giỏ hàng
    if (isset($_SESSION['cart'][$index])) {
        // Xóa mục khỏi giỏ hàng
        unset($_SESSION['cart'][$index]);

        // Cập nhật lại giỏ hàng để loại bỏ khoảng trống
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

// Redirect về trang giỏ hàng
// header("Location: index.php?act=roomlist"); 
// exit;
?>
