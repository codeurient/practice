<?php

$driver = 'mysql';
$host = 'localhost';
$db_name = 'practice';
$db_user = 'root';
$db_pass = 'root';
$charset = 'utf8';

$option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];


try {
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset",
        $db_user, $db_pass, $option
    );
}catch (PDOException $i) {
    die("Could not connect to database");
}
