<?php
// import file
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// variabel input
$username = "eko";
$password = "salah";

// prepare statement : binding parameter dengan index
// username = ? dan password = ? === nama parameternya
$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$statement = $connection->prepare($sql); // prevent statement

// binding parameter, dengan input dari user dengan index yang sudah dibuat sebelumya
$statement->bindParam(1, $username); // 1 = parameter angka dari sql, $username = valuenya
$statement->bindParam(2, $password);
$statement->execute();

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

// tutup koneksi
$connection = null;
