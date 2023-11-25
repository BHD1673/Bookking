
<?php 
//Đã xong, cấm động.
// include("LoaiPhong.Process.php");
// Xử lý thêm mới
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addLoaiPhong"])) {
    // Lấy dữ liệu từ form
    $Ten = $_POST["Ten"];
    $MoTa = $_POST["MoTa"];
    $GiaPhongChung = $_POST["GiaPhongChung"];

    // Debugging: Print data to HTML page
    echo "TenLoaiPhong: $Ten, MoTaLoai: $MoTa, GiaPhongChung: $GiaPhongChung";

    // Thực hiện thêm dữ liệu vào cơ sở dữ liệu
    insertLoaiPhong($Ten, $MoTa, $GiaPhongChung);

    // Chuyển hướng người dùng về trang quản lý sau khi xử lý
    $redirectUrl = 'admin.php?act=QuanLyLoaiPhong';
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta http-equiv="refresh" content="5;url=' . $redirectUrl . '">';
    echo '<title>Redirecting...</title>';
    echo '</head>';
    echo '<body>';
    echo '<p style="text-align:center;">Please wait while you are redirected.</p>';
    echo '</body>';
    echo '</html>';
    exit;
}
?>

<div class="container mt-5">
    <h3>Thêm loại phòng mới</h3>

    <div class="mb-3">
        <a href="?act=QuanLyLoaiPhong"><button class="btn btn-primary">Quay về trang tổng hợp loại phòng</button></a>
    </div>
    <form method="post" action="">


        <div class="mb-3">
            <label for="Ten" class="form-label">Tên Loại:</label>
            <input type="text" class="form-control" id="Ten" name="Ten" required>
        </div>

        <div class="mb-3">
            <label for="MoTa" class="form-label">Mô Tả Loại:</label>
            <input type="text" class="form-control" id="MoTa" name="MoTa">
        </div>

        <div class="mb-3">
            <label for="GiaPhongChung" class="form-label">Giá Phòng Chung:</label>
            <input type="number" step="1" class="form-control" id="GiaPhongChung" name="GiaPhongChung">
        </div>

        <button type="submit" class="btn btn-primary" name="addLoaiPhong">Gửi</button>
    </form>
</div>
