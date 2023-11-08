<!DOCTYPE html>
<html>
<head>
    <title>View Productions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-3">Production Records</h1>

        <?php
        // Include the necessary files and set up your PDO connection
        require_once 'model/ProductionController.php'; // Adjust the file path
        require_once 'model/PDO.php'; // Adjust the file path

        // Create a PDO connection
        $pdo = pdo_get_connection();

        // Create an instance of ProductionController and pass the PDO connection
        $controller = new ProductionController($pdo);

        // Retrieve production records
        $productions = $controller->getAllProductions();

        if (!empty($productions)) {
            echo '<table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category ID</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>';

            foreach ($productions as $production) {
                echo '<tr>
                    <td>' . $production['id'] . '</td>
                    <td>' . $production['category_id'] . '</td>
                    <td>' . $production['name'] . '</td>
                    <td>' . $production['title'] . '</td>
                    <td>' . $production['price'] . '</td>
                    <td>
                        <a href="update_production.php?id=' . $production['id'] . '" class="btn btn-primary btn-sm">Update</a>
                        <a href="delete_production.php?id=' . $production['id'] . '" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>';
            }

            echo '</tbody>
            </table>';
        } else {
            echo 'No production records found.';
        }

        // Close the PDO connection
        $pdo = null;
        ?>

        <a href="insert_production.php" class="btn btn-success">Add New Production</a> <!-- Link to add a new production -->
    </div>
</body>
</html>
