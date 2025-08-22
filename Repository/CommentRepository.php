<?php

namespace Repository {

    // Mengimpor class Comment dari namespace Model supaya bisa dipakai di sini
    use Model\Comment;

    // Interface mendefinisikan kontrak (metode yang harus diimplementasikan)
    // oleh repository untuk entitas Comment.
    interface CommentRepository
    {
        // Masukkan comment baru, kembalikan objek Comment (biasanya sudah berisi id).
        function insert(Comment $comment): Comment;

        // Cari comment berdasarkan id. Kembalikan Comment atau null jika tidak ditemukan.
        function findById(int $id): ?Comment;

        // Ambil semua comment sebagai array of Comment.
        function findAll(): array;
    }

    // Implementasi konkret dari CommentRepository
    class CommentRepositoryImpl implements CommentRepository
    {
        // Constructor menerima dependency berupa PDO connection (dependency injection).
        // Dengan "private \PDO $connection" (PHP 8 property promotion) kita otomatis
        // memiliki properti $connection yang dapat dipakai di seluruh metode kelas.
        public function __construct(private \PDO $connection) {}

        // Insert: menyimpan Comment ke database
        public function insert(Comment $comment): Comment
        {
            // SQL dengan placeholder ? — agar kita bisa gunakan prepared statement
            // dan menghindari SQL injection.
            $sql = "INSERT INTO comments(email, comment) VALUES (?, ?)";
            // Persiapkan statement
            $statement = $this->connection->prepare($sql);
            // Eksekusi statement dengan array parameter yang diambil dari objek Comment
            $statement->execute([$comment->getEmail(), $comment->getComment()]);

            // Ambil id yang baru saja di-generate oleh MySQL (AUTO_INCREMENT)
            $id = $this->connection->lastInsertId();
            // Set id ke objek Comment supaya caller tahu id record yang tersimpan
            $comment->setId($id);

            // Kembalikan objek Comment yang sekarang sudah berisi id
            return $comment;
        }

        // findById: cari satu record berdasarkan id
        public function findById(int $id): ?Comment
        {
            // Gunakan prepared statement dengan placeholder untuk keamanan
            $sql = "SELECT * FROM comments WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);

            // fetch() mengembalikan satu baris (associative array) atau false jika tidak ada
            if ($row = $statement->fetch()) {
                // Jika ada baris, buat objek Comment baru dari data hasil query
                // Menggunakan named parameters pada konstruktor (PHP 8) untuk kejelasan
                return new Comment(
                    id: $row["id"],
                    email: $row["email"],
                    comment: $row["comment"]
                );
            } else {
                // Jika tidak ditemukan, kembalikan null sesuai tipe ?Comment
                return null;
            }
        }

        // findAll: ambil semua record comments
        public function findAll(): array
        {
            // Query langsung (tanpa parameter) karena tidak ada input dari user
            $sql = "SELECT * FROM comments";
            $statement = $this->connection->query($sql);

            $array = [];

            // Loop setiap baris hasil query, ubah menjadi objek Comment, lalu push ke array
            while ($row = $statement->fetch()) {
                $array[] = new Comment(
                    id: $row["id"],
                    email: $row["email"],
                    comment: $row["comment"]
                );
            }

            // Kembalikan array berisi objek Comment (bisa kosong jika tidak ada data)
            return $array;
        }
    }
}
