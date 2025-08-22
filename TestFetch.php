<?php
// import file 
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// variabel input
$username = "eko";
$password = "rahasia";

// sql, untuk mengambil data table admin 
$sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
$statement = $connection->prepare($sql); // prevent statement

// binding parameter, dengan input dari user dengan parameter yang sudah dibuat sebelumya
$statement->bindParam("username", $username); // "username" = parameter dari sql, $username = valuenya
$statement->bindParam("password", $password);
$statement->execute();

// kondisi pemanggilan
// jika kondisi fetch pertama ada array, maka true
if ($row = $statement->fetch()) {
    echo "Sukses Login : " . $row["username"] . PHP_EOL;
} else {
    echo "Gagal Login" . PHP_EOL;
}

// tutup koneksi
$connection = null;
