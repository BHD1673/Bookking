<?php

// Cách dùng fakerPHP
// gán thư viện fakerPHP và file PDO
require_once 'vendor/autoload.php';
require_once 'view/PDO.php'; // Thay file PDO vào

// Tạo một biến bắt đầu 
$faker = Faker\Factory::create();

// Fetch available IDs from loaiphong
$availableIDs = pdo_query("SELECT ID FROM loaiphong");
$idIndex = 0; // Index to keep track of which ID to use
$counter = 0; // Counter for how many times each ID has been used

// Generate and insert data using your pdo_execute function
for ($i = 0; $i < 200; $i++) { // Adjust the total number of inserts as needed
    $tenPhong = $faker->word;
    $viTriPhong = $faker->word;
    $trangThaiPhong = $faker->randomElement(['Available', 'Occupied', 'Maintenance']);
    $anhPhong = 'path/to/photo.jpg'; // Placeholder for room photo

    // Check if there's a valid ID to use
    if ($idIndex >= count($availableIDs)) {
        break; // Stop the loop if there are no more IDs to use
    }
    $idLoaiPhong = $availableIDs[$idIndex]['ID'];

    // Using your pdo_execute function to insert data
    pdo_execute(
        "INSERT INTO phong (TenPhong, ViTriPhong, TrangThaiPhong, AnhPhong, ID_LoaiPhong) VALUES (?, ?, ?, ?, ?)",
        $tenPhong, $viTriPhong, $trangThaiPhong, $anhPhong, $idLoaiPhong
    );

    // Increment the counter and update ID index if necessary
    $counter++;
    if ($counter == 3) {
        $counter = 0;
        $idIndex++;
    }
}

echo "Data inserted successfully!";

// // Create a Faker\Generator instance
// $faker = Faker\Factory::create();

// $idLoaiPhong = 604; // Starting ID for ID_LoaiPhong
// $counter = 0; // Counter to track the number of inserts for each ID_LoaiPhong

// // Generate and insert data using your pdo_execute function
// for ($i = 0; $i < 150; $i++) { // Adjust the total number of inserts as needed
//     $tenPhong = $faker->word;
//     $viTriPhong = $faker->word; // You may want to customize this based on your specific needs
//     $trangThaiPhong = $faker->randomElement(['Available', 'Occupied', 'Maintenance']); // Example statuses
//     $anhPhong = 'path/to/photo.jpg'; // Placeholder for room photo

//     // Using your pdo_execute function to insert data
//     pdo_execute(
//         "INSERT INTO phong (TenPhong, ViTriPhong, TrangThaiPhong, AnhPhong, ID_LoaiPhong) VALUES (?, ?, ?, ?, ?)",
//         $tenPhong, $viTriPhong, $trangThaiPhong, $anhPhong, $idLoaiPhong
//     );

//     // Increment the counter and update ID_LoaiPhong if necessary
//     $counter++;
//     if ($counter == 3) {
//         $counter = 0;
//         $idLoaiPhong++;
//     }
// }

// echo "Data inserted successfully!";
