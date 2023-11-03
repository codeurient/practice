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



// 02/11/2023
//class Database {
//    private $driver = 'mysql';
//    private $host = 'localhost';
//    private $db_name = 'practice';
//    private $db_user = 'root';
//    private $db_pass = 'root';
//    private $charset = 'utf8';
//
//    private $options = [
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//    ];
//
//    public function dbConnection() {
//        try {
//            $pdo = new PDO(
//                "$this->driver:host=$this->host;dbname=$this->db_name;charset=$this->charset",
//                $this->db_user, $this->db_pass, $this->options
//            );
//            return $pdo;
//        } catch (PDOException $e) {
//            echo "Connection failed: " . $e->getMessage();
//            return null;
//        }
//    }
//}
