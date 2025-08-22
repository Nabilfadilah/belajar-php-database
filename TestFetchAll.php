<?php
// import file
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// ambil semua data table customers
$sql = "SELECT * FROM customers";
$statement = $connection->query($sql); // prevent statement

// mengambil seluruh data sekaligus fetchAll()
$customers = $statement->fetchAll();
var_dump($customers);

// tutup koneksi
$connection = null;
