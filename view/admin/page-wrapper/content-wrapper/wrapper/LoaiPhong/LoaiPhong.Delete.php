<?php
include 'LoaiPhong.Process.php';

try {
    if(isset($_GET['deleteID'])) {
        $deleteID = $_GET['deleteID'];
        deleteLoaiPhong($deleteID);
        header("Location: index.php");
    } else {
        echo "ID không được cung cấp.";
    }
} catch (PDOException $e) {
    echo "Error deleting record: " . $e->getMessage();
}
?>
