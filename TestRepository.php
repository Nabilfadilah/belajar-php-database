<?php

require_once __DIR__ . '/GetConnection.php';
require_once __DIR__ . '/Model/Comment.php';
require_once __DIR__ . '/Repository/CommentRepository.php';

use Repository\CommentRepositoryImpl;
use Model\Comment;

// Membuat koneksi ke database (dari fungsi getConnection di GetConnection.php)
$connection = getConnection();

// Membuat objek repository dengan dependency injection (memberikan koneksi PDO)
$repository = new CommentRepositoryImpl($connection);

// contoh INSERT (menyimpan data baru ke tabel comments)
// Membuat object Comment baru dengan data email dan comment
// $comment = new Comment(email: "repository@test.com", comment: "Hi");

// Menyimpan object Comment ke database lewat repository
// $newComment = $repository->insert($comment);

// Cek hasilnya — var_dump akan menampilkan object Comment yang sudah punya id
// var_dump($newComment->getId());
//-----------------------------------------------------

// contoh FIND BY ID (mencari data berdasarkan id)
// $comment = $repository->findById(12); // cari comment dengan id 12
// var_dump($comment); // tampilkan hasil (null jika tidak ada)
//-------------------------------------------------------

// FIND ALL (ambil semua data dari tabel comments)
$comments = $repository->findAll(); // memanggil fungsi findAll

// var_dump menampilkan semua object Comment dalam bentuk array
var_dump($comments);

// tutup komen
$connection = null;
