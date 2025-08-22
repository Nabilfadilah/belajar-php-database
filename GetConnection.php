<?php

// koneksi mysql with PDO 
function getConnection(): PDO
{
    $host = "localhost";
    $port = 3306;
    $database = "belajar_php_database";
    $username = "root";
    $password = "";

    // kondisi pengecekan koneksi PDO
    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Sukses terkoneksi ke database MySQL :)" . PHP_EOL;
        return $pdo;
    } catch (PDOException $e) {
        die("Gagal terkoneksi: " . $e->getMessage());
    }
}

// koneksi mysql with PDO 
// function getConnection(): PDO
// {
//     $host = "localhost";
//     $port = 3306;
//     $database = "belajar_php_database";
//     $username = "root";
//     $password = "";

//     // koneksi menggunakan PDO (php database object)
//     return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
//     echo "Sukses terkoneksi ke database MySQL :)" . PHP_EOL;
// }
