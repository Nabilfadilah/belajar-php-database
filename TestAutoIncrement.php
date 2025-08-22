<?php
// import file
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// sql untuk mengetahui id comment terakhir 
$connection->exec("INSERT INTO comments(email, comment) VALUES ('eko@test.com', 'hi')");
// menggunakan function lastInsertId() untuk mendapatkan Id terakhir yang dibuat secara auto increment
$id = $connection->lastInsertId();

// tampilkan id
echo $id . PHP_EOL;

// tutup koneksi 
$connection = null;
