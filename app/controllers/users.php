<?php

include "app/database/db.php";


$errMsg = '';

function userAuth($user){
    $_SESSION['id'] = $user['id'];
    $_SESSION['login'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['status'] = $user['status'];

//    viewTest($_SESSION);
//    exit();

    if($_SESSION['admin']){
        header('location: ' . BASE_URL . "admin/posts/index.php");
    } else {
        header('location: ' . BASE_URL);
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
//    viewTest($_POST);
//    exit();

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''|| $passS === '') {
        $errMsg = "Не все поля заполнены";
//        viewTest('asdad');
    } elseif (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    } elseif ($passF !== $passS){
        $errMsg = "Пароли не совпадают";
    }
    else{
        $existence = selectOne('users', ['email' => $email]);
        $existence2 = selectOne('users', ['username' => $login]);
        if ($existence['email'] === $email || $existence2['username'] === $login) {
            $errMsg = "Такая почта или логин уже есть!";
        }
        else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            $post = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $post);
            $user = selectOne('users', ['id' => $id]);

            userAuth($user);
            //$errMsg = "Пользователь " . "<strong>" . $login . "</strong>" . " успешно зарегистрирован!";
        }
    }
} else{
    // echo  'GET';
    $login = '';
    $email = '';
}



if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
    $email = trim($_POST['mail']);
    $pass = trim($_POST['password']);

    if($email === '' || $pass === '') {
        $errMsg = "Не все поля заполнены";
    } else{
        $existence = selectOne('users', ['email' => $email]);

        if($existence && password_verify($pass, $existence['password'])){
            userAuth($existence);
        } else{
            echo  "Почта либо пароль введены неверно!";
        }
    }
} else {
    $email = '';
}






function getCurrentUserId($sessionId, $field){
    $result = selectOne('users', ['id' => $sessionId]);
    if ($result) {
        $adminValue = $result[$field];
        if ($adminValue != $_SESSION[$field]) {
            // Обновляем значение в сессии, если оно изменилось в базе данных
            $_SESSION[$field] = $adminValue;
        }
        return $adminValue; // Возвращаем значение
    }
    return null; // Возвращаем null, если запись не найдена или другая ошибка
}
//viewTest(getCurrentUserId());






//function getCurrentUserId($sessionId, $field){
//    $result = selectOne('users', ['id' => $sessionId]);
//    if ($result) {
//        $adminValue = $result[$field];
//        if ($adminValue != $_SESSION['admin']) {
//            // Обновляем значение в сессии, если оно изменилось в базе данных
//            $_SESSION['admin'] = $adminValue;
//        } elseif ($adminValue != $_SESSION['status']) {
//            $_SESSION['status'] = $adminValue;
//        }
//        return $adminValue; // Возвращаем значение admin
//    }
//    return null; // Возвращаем null, если запись не найдена или другая ошибка
//}
////viewTest(getCurrentUserId());







