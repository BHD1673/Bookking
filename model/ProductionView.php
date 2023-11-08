<?php
function printProductionsTable()
{
    // Include the necessary files and set up your PDO connection
    require_once 'ProductionController.php'; 
    require_once 'pdo_connection.php'; 

    // Create a PDO connection
    $pdo = pdo_get_connection();

    // Create an instance of ProductionController and pass the PDO connection
    $controller = new ProductionController($pdo);

    // Get all production records
    $productions = $controller->getAllProductions();

    if (!empty($productions)) {
        echo '<table border="1">
            <tr>
                <th>ID</th>
                <th>Category ID</th>
                <th>Name</th>
                <th>Title</th>
                <th>Price</th>
                <!-- Thêm cột khác nếu cần -->
            </tr>';

        foreach ($productions as $production) {
            echo '<tr>';
            echo '<td>' . $production['id'] . '</td>';
            echo '<td>' . $production['category_id'] . '</td>';
            echo '<td>' . $production['name'] . '</td>';
            echo '<td>' . $production['title'] . '</td>';
            echo '<td>' . $production['price'] . '</td>';
            // Thêm cột khác nếu cần
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Không tìm thấy bản ghi sản phẩm nào.';
    }

    // Close the PDO connection
    $pdo = null;
}



?>
