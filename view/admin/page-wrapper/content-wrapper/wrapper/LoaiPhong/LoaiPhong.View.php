
<div class="container mt-5">
    <h2>Quản lý Loại Phòng</h2>

    <!-- Button trigger modal -->
    <a href="?act=AddLoaiPhong">
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
            echo "<a href='?act=LoaiPhong.Delete.php?deleteID={$row['ID']}' class='btn btn-danger'>Xóa</a>";
            echo "<a href='?act=LoaiPhong.Update.php?editID={$row['ID']}' class='btn btn-info'>Sửa</a>";
            echo "</td>";
            echo "</tr>";

        }
        
        ?>
        </tbody>
    </table>
</div>

