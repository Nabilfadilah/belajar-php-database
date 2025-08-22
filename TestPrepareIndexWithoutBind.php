<?php
// import file
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// variabel input
$username = "eko";
$password = "rahasia";

// prepare statement : Binding Parameter ketika Execute
// username = ? dan password = ? === nama parameternya
$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$statement = $connection->prepare($sql);

// execute, dengan input dari user dari variabel yang sudah dibuat sebelumya
$statement->execute([$username, $password]);

// variabel pengecekan
$success = false;
$find_user = null;

// lakukan iterasi
foreach ($statement as $row) {
    // sukses
    $success = true;
    $find_user = $row["username"];
}

// kondisi
if ($success) {
    echo "Sukse login : " . $find_user . PHP_EOL;
} else {
    echo "Gagal login" . PHP_EOL;
}

// menutup koneksi
$connection = null;
