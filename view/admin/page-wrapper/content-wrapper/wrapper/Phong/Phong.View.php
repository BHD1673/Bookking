<div class="container mt-5">
    <h2>Quản lý Phòng</h2>

    <!-- Button trigger modal -->
    <a href="?act=AddPhong">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Thêm Phòng
        </button>
    </a>
    <!-- Table to display data -->
    <table class="table mt-3">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên phòng</th>
            <th scope="col">Vị trí phòng</th>
            <th scope="col">Trạng thái phòng</th>
            <th scope="col">Ảnh phòng</th>
            <th scope="col">Thuộc danh mục phòng</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $AllPhong = getAllPhong();

        foreach ($AllPhong as $row) {
            echo "<tr>";
            echo "<td>{$row['ID']}</td>";
            echo "<td>{$row['TenPhong']}</td>";
            echo "<td>{$row['ViTriPhong']}</td>";
            echo "<td>{$row['TrangThaiPhong']}</td>";
            echo "<td><img style='width:150px'; src='../../../../../upload/{$row['AnhPhong']}'></td>";
            echo "<td>{$row['TenLoai']} - {$row['GiaPhongChung']}</td>";
            echo "<td>";
<<<<<<< HEAD
            echo "<a href='?act=?deleteID={$row['ID']}' class='btn btn-danger'>Xóa</a>";
            echo "<a href='?act=UpdatePhong&editID={$row['ID']}' class='btn btn-info'>Sửa</a>";
=======
<<<<<<< HEAD
            echo "<a href='LoaiPhong.Process.php?deleteID={$row['ID']}' class='btn btn-danger'>Xóa</a>";
            echo "<a href='LoaiPhong.Update.php?editID={$row['ID']}' class='btn btn-info'>Sửa</a>";
=======
            echo "<a href='Phong.Process.php?deleteID={$row['ID']}' class='btn btn-danger'>Xóa</a>";
            echo "<a href='Phong.Update.php?editID={$row['ID']}' class='btn btn-info'>Sửa</a>";
>>>>>>> 89c2d0a5ec0d5e74a63f8b1e548070681bec67b2
>>>>>>> b8996f7a9dc98a2fa1922d98e7316447e912a4f4
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

