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
            <th scope="col">Mô tả loại phòng</th>
            <th scope="col">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $AllPhong = getAllPhong();

        // echo "<a href='?act=?deleteID={$row['ID']}' class='btn btn-danger'>Xóa</a>";
        foreach ($AllPhong as $row) {
            echo "<tr>";
            echo "<td>{$row['ID']}</td>";
            echo "<td>{$row['TenPhong']}</td>";
            echo "<td>{$row['ViTriPhong']}</td>";
            echo "<td>{$row['TrangThaiPhong']}</td>";
            echo "<td><img style='width:150px'; src='../../../../../upload/{$row['AnhPhong']}'></td>";
            echo "<td>{$row['ten']} - {$row['GiaPhongChung']}</td>";
            echo "<td>{$row['MoTa']}</td>";
            echo "<td>";
            echo "<a href='admin.php?act=UpdatePhong&id={$row['ID']}' class='btn btn-info'>Sửa</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

