<?php
include 'LoaiPhong.Process.php';

try {
    if(isset($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        deleteLoaiPhong($deleteId);
        header("Location: index.php");
    } else {
        echo "ID không được cung cấp.";
    }
} catch (PDOException $e) {
    echo "Error deleting record: " . $e->getMessage();
}
?>
