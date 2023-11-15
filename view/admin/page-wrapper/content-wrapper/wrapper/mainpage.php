<?php 

//Hoặc các ông tìm hiểu thêm về class mà dùng để hạn
//chế cái kiểu xử lí các trang thành function để gọn
//hơn cái chỗ này

//Ghi chú: Bắt buộc sẽ phải xóa dòng này khi đến cuối môn.
?>

<!-- Bắt đầu vào trang chính -->

<?php 
// Kiểm tra xem biến 'act' có được đặt hay không
if (isset($_GET['act'])) {
    $act = $_GET['act'];

    // Xử lý các trường hợp dựa trên giá trị của 'act'
    switch ($act) {
        case 'QuanLyLoaiPhong':
            include('LoaiPhong/LoaiPhong.View.php');
        break;
        case 'AddLoaiPhong':
            include('LoaiPhong/LoaiPhong.Create.php');
        break;
        case 'UpdateLoaiPhong':
            include('LoaiPhong/LoaiPhong.Update.php');
        break;
        case 'AddPhong':
            include('Phong/Phong.Create.php');
        break;
        case 'QuanLyPhong':
            include('Phong/Phong.View.php');
        break;
        default: 

    }
}

?>

<!-- /.container-fluid -->