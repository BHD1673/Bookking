<?php 
require_once 'pdo.php'; 

if (isset($_POST['name']) && isset($_POST['description'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    try {
        $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
        pdo_execute($sql, $name, $description);

        echo "Bạn đã thêm thành công";
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Insert Category</title>
</head>
<body>

<div class="container mt-5">
  <h2>Insert Category</h2>
  <form action="" method="POST">
    <div class="form-group">
      <label for="name">Tên danh sách phòng</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="description">Mô tả danh sách:</label>
      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Gửi</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
