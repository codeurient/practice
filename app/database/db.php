<?php
include 'path.php';

session_start();
require ('connect.php');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


function viewTest($value){
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE ) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных с одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }

            if($i === 0) {
                //    $sql = "SELECT * FROM $table WHERE admin = 1 AND username = 'keko'";
                $sql = $sql . " WHERE $key = $value";
            } else {

                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    // Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
//viewTest(selectAll('users', $params));







// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";
    if(!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0) {
                //    $sql = "SELECT * FROM $table WHERE admin = 1 AND username = 'keko'";
                $sql = $sql . " WHERE $key = $value";
            } else {
                $sql = $sql . " AND $key = $value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1 ";
    // Подготавливает запрос к выполнению и возвращает связанный с этим запросом объект
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}
$arrData = [
//    'id' => '34',
//    'username' => 'admin',
    'admin' => 1,
];
//viewTest(selectOne('users', $arrData));






function insert($table, $params) {
    global $pdo;
    // INSERT INTO `users`(admin, username, email, password) VALUES ('1', 'bro', 'bro@gmail.com', 'bro')

    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value){
        if($i === 0) {
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value" . "'" ;
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value" . "'" ;
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);

    return $pdo->lastInsertId();
}
$arrData = [
    'admin' => '0',
    'username' => 'admin2',
    'email' => 'admin2@gmail.com',
    'password' => 'admin2'
];
//insert('users', $arrData);




// Обновление строки в таблице
function update($table, $id, $params) {
    global $pdo;

    $i = 0;
    $str = '';
    foreach ($params as $key => $value){
        if($i === 0) {
            $str = $str . $key . " = '" . $value . "'" ;
        } else {
            $str = $str .", " . $key . " = '" . $value . "'" ;
        }
        $i++;
    }

    // UPDATE `users` SET username = 'deyismisad', password='555555' WHERE `id` = 1
    $sql = "UPDATE $table SET $str WHERE id = $id";



    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}
//$param = [
//    'admin' => 0,
//    'password' => '333'
//];
//update('users', 5, $param);



// Удаление строки в таблице
function delete($table, $id) {
    global $pdo;

    // DELETE FROM `users` WHERE id = 1
    $sql = "DELETE FROM $table WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
//delete('users', 1);







