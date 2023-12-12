<?php
require_once 'vendor/autoload.php';
require_once 'view/PDO.php'; // Replace with the correct path to your PDO file

$faker = Faker\Factory::create();
$conn = pdo_get_connection();

// Define the SQL INSERT statement
$sql = "INSERT INTO `khachhang`(
    `TenKhachHang`,
    `NgaySinh`,
    `DiaChiNha`,
    `AnhXacNhan`,
    `Email`,
    `TenDangNhap`,
    `MatKhau`
) VALUES (?, ?, ?, ?, ?, ?, ?)";

// Generate and execute the SQL INSERT statement with fake data multiple times
$counter = 0;
$amountData = 3;
for ($i = 0; $i < $amountData; $i++) { // Adjust the total number of inserts as needed
    $data = [
        $faker->name,
        $faker->date('Y-m-d', '-18 years'),
        $faker->address,
        $faker->imageUrl(),
        $faker->email,
        $faker->userName,
        $faker->password,
    ];

    pdo_execute($sql, ...$data);
    $counter++;
}

if ($amountData > 1000) {
    echo "Nhập clgt gì đấy ?";
} else {
    echo "Ổn";
}

// function generate_fake_data() {
//     $faker = Faker\Factory::create();

//     $TenKhachHang = $faker->name;
//     $NgaySinh = $faker->date('Y-m-d', '-18 years'); // Generate a birthdate for a person who is 18 years old or older
//     $DiaChiNha = $faker->address;
//     $SoDienThoai = $faker->phoneNumber;
//     $AnhXacNhan = $faker->imageUrl();
//     $Email = $faker->email;
//     $TenDangNhap = $faker->userName;
//     $MatKhau = $faker->password;

//     return [
//         $TenKhachHang,
//         $NgaySinh,
//         $DiaChiNha,
//         $SoDienThoai,
//         $AnhXacNhan,
//         $Email,
//         $TenDangNhap,
//         $MatKhau,
//     ];
// }

// try {
//     $conn = pdo_get_connection();
//     pdo_begin_transaction($conn); // Start a transaction

//     // Define the SQL INSERT statement
//     $sql = "INSERT INTO `khachhang`(
//         `TenKhachHang`,
//         `NgaySinh`,
//         `DiaChiNha`,
//         `SoDienThoai`,
//         `AnhXacNhan`,
//         `Email`,
//         `TenDangNhap`,
//         `MatKhau`
//     ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

//     // Generate and execute the SQL INSERT statement with fake data multiple times
//     for ($i = 0; $i < 10; $i++) { // Adjust the number of iterations as needed
//         $data = generate_fake_data();
//         pdo_execute($sql, ...$data);
//         echo "Inserted record $i\n";
//     }

//     pdo_commit($conn); // Commit all records at once

// } catch (PDOException $e) {
//     pdo_rollback($conn); // Rollback the transaction in case of an error
//     echo "Error: " . $e->getMessage();
// } finally {
//     unset($conn);
// }

// // Cách dùng fakerPHP
// // gán thư viện fakerPHP và file PDO
// require_once 'vendor/autoload.php';
// require_once 'view/PDO.php'; // Thay file PDO vào

// // Tạo một biến bắt đầu 
// $faker = Faker\Factory::create();

// Fetch available IDs from loaiphong
// $availableIDs = pdo_query("SELECT ID FROM loaiphong");
// $idIndex = 0; // Index to keep track of which ID to use
// $counter = 0; // Counter for how many times each ID has been used

// // Generate and insert data using your pdo_execute function
// for ($i = 0; $i < 200; $i++) { // Adjust the total number of inserts as needed
//     $tenPhong = $faker->word;
//     $viTriPhong = $faker->word;
//     $trangThaiPhong = $faker->randomElement(['Available', 'Occupied', 'Maintenance']);
//     $anhPhong = 'path/to/photo.jpg'; // Placeholder for room photo

//     // Check if there's a valid ID to use
//     if ($idIndex >= count($availableIDs)) {
//         break; // Stop the loop if there are no more IDs to use
//     }
//     $idLoaiPhong = $availableIDs[$idIndex]['ID'];

//     // Using your pdo_execute function to insert data
//     pdo_execute(
//         "INSERT INTO phong (TenPhong, ViTriPhong, TrangThaiPhong, AnhPhong, ID_LoaiPhong) VALUES (?, ?, ?, ?, ?)",
//         $tenPhong, $viTriPhong, $trangThaiPhong, $anhPhong, $idLoaiPhong
//     );

//     // Increment the counter and update ID index if necessary
//     $counter++;
//     if ($counter == 3) {
//         $counter = 0;
//         $idIndex++;
//     }
// }

// echo "Data inserted successfully!";

// Create a Faker\Generator instance
// $faker = Faker\Factory::create();

// $idLoaiPhong = 1; // Starting ID for ID_LoaiPhong
// $counter = 0; // Counter to track the number of inserts for each ID_LoaiPhong

// // Generate and insert data using your pdo_execute function
// for ($i = 0; $i < 150; $i++) { // Adjust the total number of inserts as needed
//     $tenPhong = $faker->word;
//     $anhPhong = $faker->imageUrl; // Placeholder for room photo

//     // Using your pdo_execute function to insert data
//     pdo_execute(
//         "INSERT INTO phong (TenPhong, AnhPhong, ID_LoaiPhong) VALUES (?, ?, ?)",
//         $tenPhong, $anhPhong, $idLoaiPhong
//     );

//     // Increment the counter and update ID_LoaiPhong if necessary
//     $counter++;
//     if ($counter == 3) {
//         $counter = 0;
//         $idLoaiPhong++;
//     }
// }

// echo "Data inserted successfully!";
