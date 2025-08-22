<?php
// import file
require_once "GetConnection.php";

// tampilkan koneksi
$conn = getConnection();

// opsi 1: Tutup koneksi
// $conn = null;

// opsi 2: atau bisa pakai $conn untuk query ---
// contoh kecil:
$stmt = $conn->query("SELECT NOW()");
$row = $stmt->fetch();
echo "Waktu sekarang di MySQL: " . $row[0] . PHP_EOL;

// setelah selesai pakai, tutup koneksi
$conn = null;
echo "Koneksi sudah ditutup." . PHP_EOL;
