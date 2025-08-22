<?php
// import 
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// memulai transaksi, kita bisa menggunakan function beginTransaction()
$connection->beginTransaction(); // kalau ada yang gagal 1, berati semua gagal

// meng excec beberapa komentar
$connection->exec("INSERT INTO comments(email, comment) VALUES ('eko@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('eko@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('eko@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('eko@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('eko@test.com', 'hi')");

// memanggil commit transaksi
$connection->commit(); // kalau ada yang gagal 1, berati semua gagal

// tutup koneksi
$connection = null;
