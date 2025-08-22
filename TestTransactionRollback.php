<?php
// import
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// memulai transaksi, kita bisa menggunakan function beginTransaction()
$connection->beginTransaction();

$connection->exec("INSERT INTO comments(email, comment) VALUES ('budi@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('budi@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('budi@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('budi@test.com', 'hi')");
$connection->exec("INSERT INTO comments(email, comment) VALUES ('budi@test.com', 'hi')");

// kalau mau membatalkan transaksi
$connection->rollBack(); // kalau ada yang sukses, maka akan di kembalikan/rollback, berati akan batal

$connection = null;

// kalau kita rollback 6 data, berati data yang 6 nya itu tidak akan tampil di tabel, kalau kita commit data table baru maka akan mulai dari id yang sudah lewat dari 6 yang di rollback