<?php

// ambil get connection
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// sql injection, bisa bahaya
$username = "admin'; #";
$password = "salah gak peduli";

// solusinya ini bisa dihindari sql injection, pake quote
$username = $connection->quote("admin'; #");
$password = $connection->quote("salah gak peduli");

// Jangan membuat query SQL secara manual dengan menggabungkan String secara bulat-bulat
$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password';";

// solusi, gak perlu pake quote disininya
$sql = "SELECT * FROM admin WHERE username = $username AND password = $password";
$result = $connection->query($sql);
echo $sql . PHP_EOL;

// statement pdo
$statement = $connection->query($sql);

// variabel pengecekan
$success = false;
$find_user = null;

// lakukan iterasi
foreach ($statement as $row) {
    // sukses
    $success = true;
    $find_user = $row["username"];
}

// kondisi sukses/gagal
if ($success) {
    echo "Sukse login : " . $find_user . PHP_EOL;
} else {
    echo "Gagal login" . PHP_EOL;
}

// tutup koneksi 
$connection = null;
