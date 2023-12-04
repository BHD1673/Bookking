<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xác định tên trang cơ bản
    $url = "http://localhost/DuAn1/index.php";

    // Lấy giá trị từ form
    $sanpham = isset($_POST['sanpham']) ? $_POST['sanpham'] : '';
    $sanphamct = isset($_POST['sanphamct']) ? $_POST['sanphamct'] : '';
    $danhmuc = isset($_POST['danhmuc']) ? $_POST['danhmuc'] : '';

    // Xây dựng các tham số truy vấn
    $queryParams = [];
    if ($sanpham !== '') {
        $queryParams[] = "sanpham=" . urlencode($sanpham);
    }
    if ($sanphamct !== '') {
        $queryParams[] = "sanphamct=" . urlencode($sanphamct);
    }
    if ($danhmuc !== '') {
        $queryParams[] = "danhmuc=" . urlencode($danhmuc);
    }

    // Nối các tham số truy vấn vào URL
    if (count($queryParams) > 0) {
        $url .= "?" . implode("&", $queryParams);
    }

    // Chuyển hướng đến URL
    header("Location: " . $url);
    exit();
}
?>
