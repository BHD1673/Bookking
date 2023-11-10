<?php
include '/../includes/header.php';

// Kiểm tra đã đăng nhập admin hay chưa
// Ví dụ: (!isset($_SESSION['admin_id'])) { header("Location: admin_login.php"); }

require_once 'pdo.php'; 

if (isset($_POST['name']) && isset($_POST['description'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    try {
        // Prepare and execute the SQL query using your pdo_execute function
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        pdo_execute($sql, $name, $description);

        echo "Record inserted successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


?>

<!-- Admin dashboard content -->
<!-- Display admin-specific dashboard with statistics -->

<?php include '/../includes/footer.php'; ?>
