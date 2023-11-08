<?php 
require_once 'PDO.php';
class ProductionController {
        private $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        public function createProduction($category_id, $created_id, $name, $title, $image_url, $quantity, $price, $description, $thumbnail_url, $status, $created_at, $views) {
            try {
                // Chuẩn bị trước câu lệnh SQL và đặt theo hàng sẵn để tránh trường hợp bị nhầm.
                $sql = "INSERT INTO productions (category_id, created_id, name, title, image_url, quantity, price, description, thumbnail_url, status, created_at, views)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                // Thực thi câu lệnh theo pdo_execute
                pdo_execute($this->pdo, $sql, $category_id, $created_id, $name, $title, $image_url, $quantity, $price, $description, $thumbnail_url, $status, $created_at, $views);

                echo "Đã thêm phòng.";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }




        public function updateProduction($id, $category_id, $name, $title, $image_url, $quantity, $price, $description, $thumbnail_url, $status, $created_at, $views) {
            // Add code to update an existing production record in the database
        }

        public function getProductionById($id) {
            try {
                // Prepare the SQL statement with a placeholder for the ID
                $sql = "SELECT * FROM productions WHERE id = ?";
                $stmt = $this->pdo->prepare($sql);

                // Bind the ID parameter to the placeholder
                $stmt->bindParam(1, $id, PDO::PARAM_INT);

                // Execute the query
                $stmt->execute();

                // Fetch the production record
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Return the result
                return $row;
            } catch (PDOException $e) {
                throw $e;
            }
        }

        public function getAllProductions() {
            try {
                // Prepare the SQL statement to select all production records
                $sql = "SELECT * FROM productions";
                $stmt = $this->pdo->query($sql);
    
                // Fetch all production records as an associative array
                $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
                // Return the result
                return $rows;
            } catch (PDOException $e) {
                throw $e;
            }
        }

        public function deleteProduction($id) {
            // Add code to delete a production record from the database
        }

        // You can add more methods for specific functionality based on your application's requirements
    }
?>

