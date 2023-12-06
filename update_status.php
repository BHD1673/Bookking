<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Thông tin kết nối database
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'da1';

    try {
        // Tạo kết nối PDO
        $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        // Thiết lập chế độ error mode của PDO để ném exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Lấy dữ liệu từ POST
        $idDon = $_POST['idDon'];
        $trangThaiMoi = $_POST['trangThaiMoi'];

        // Câu truy vấn SQL để cập nhật trạng thái
        $sql = "UPDATE datphong SET TrangThaiDon = :trangThaiMoi WHERE ID = :idDon";

        // Chuẩn bị truy vấn và bind giá trị
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':trangThaiMoi', $trangThaiMoi, PDO::PARAM_INT);
        $stmt->bindParam(':idDon', $idDon, PDO::PARAM_INT);

        // Thực hiện truy vấn
        $stmt->execute();

        echo "Cập nhật thành công.";
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }

    // Đóng kết nối
    $conn = null;

    // Redirect về trang trước đó
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
