<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
    <title>Quản lý Loại Phòng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Quản lý Loại Phòng</h2>

    <!-- Button trigger modal -->
    <a href="LoaiPhong.Create.php">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Thêm Loại Phòng
        </button>
    </a>

    

    <!-- Table to display data -->
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên Loại Phòng</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Giá Phòng Chung</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'PDO.php';
        include 'LoaiPhong.Process.php';

        $allLoaiPhong = getAllLoaiPhong();

        foreach ($allLoaiPhong as $row) {
            echo "<tr>";
            echo "<td>{$row['ID']}</td>";
            echo "<td>{$row['TenLoai']}</td>";
            echo "<td>{$row['MoTaLoai']}</td>";
            echo "<td>{$row['GiaPhongChung']}</td>";
            echo "<td>";
            echo "<a href='LoaiPhong.Process.php?deleteID={$row['ID']}' class='btn btn-danger'>Xóa</a>";
            echo "<a href='LoaiPhong.Update.php?editID={$row['ID']}' class='btn btn-info'>Sửa</a>";
            echo "</td>";
            echo "</tr>";

        }
        
        ?>
        </tbody>
    </table>
</div>

<!-- Add Modal -->
<div class="modal fade" ID="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hIDden="true">
    <!-- ... (Các phần của modal để thêm mới) -->
</div>

<!-- Update Modal -->
<div class="modal fade" ID="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hIDden="true">
    <!-- ... (Các phần của modal để cập nhật) -->
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
