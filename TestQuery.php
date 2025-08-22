<?php
// ambil get connection
require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// variable sql, mengambil id, nama, email dari table customers
$sql = "SELECT id, name, email FROM customers";
// koneksi query, yang return valuenya pdo statement
$statement = $connection->query($sql);

// melakukan iterasi 
foreach ($statement as $row) {
    // panggil data id, name, email
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];

    // tampilkan hasilnya
    echo "Id : $id" . PHP_EOL;
    echo "Name : $name" . PHP_EOL;
    echo "Email : $email" . PHP_EOL;
}

$connection = null;
