<?php

require_once __DIR__ . '/GetConnection.php';

$connection = getConnection();

// string multiline
$sql = <<<SQL
    INSERT INTO customers(id, name, email)
    VALUES ('ahmad', 'ahmad sanusi', 'ahmadSa@test.com');
SQL;

// eksekusi connection nya
$connection->exec($sql);

$connection = null;
