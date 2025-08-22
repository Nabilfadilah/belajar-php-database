<?php
// import file
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// variabel input
$username = "admin'; #";
$password = "admin";

// prepare statement : binding parameter
// :username dan :password " = nama parameternya
$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
$statement = $connection->prepare($sql); // prevent statement

// binding parameter, dengan input dari user dengan parameter yang sudah dibuat sebelumya
$statement->bindParam("username", $username); // "username" = parameter dari sql, $username = valuenya
$statement->bindParam("password", $password);
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

if ($success) {
    echo "Sukse login : " . $find_user . PHP_EOL;
} else {
    echo "Gagal login" . PHP_EOL;
}

// tutup koneksi
$connection = null;
