<?php

include SITE_ROOT. "/app/database/db.php";


$errMsg = [];

$users = selectAll('users');

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
    viewTest($_POST);
//    exit();

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''|| $passS === '') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS){
        array_push($errMsg, "Пароли не совпадают");
    }
    else{
        $existence = selectOne('users', ['email' => $email]);
        $existence2 = selectOne('users', ['username' => $login]);
        if ($existence['email'] === $email || $existence2['username'] === $login) {
            array_push($errMsg, "Такая почта или логин уже есть!");
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
        array_push($errMsg, "Не все поля заполнены");

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




if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){

    $admin = 0;
    $login = trim($_POST['login']);
    $email = trim($_POST['mail']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if($login === '' || $email === '' || $passF === ''|| $passS === '') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS){
        array_push($errMsg, "Пароли не совпадают");
    }
    else{
        $existence = selectOne('users', ['email' => $email]);
        $existence2 = selectOne('users', ['username' => $login]);
        if ($existence['email'] === $email || $existence2['username'] === $login) {
            array_push($errMsg, "Такая почта или логин уже есть!");
        }
        else {
            $pass = password_hash($passF, PASSWORD_DEFAULT);
            if(isset($_POST['admin'])) $admin = 1;
            $user = [
                'admin' => $admin,
                'username' => $login,
                'email' => $email,
                'password' => $pass
            ];
            $id = insert('users', $user);
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




if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('users', $id);
    header('location: ' . BASE_URL . 'admin/users/index.php');
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){
    $user = selectOne('users', ['id' => $_GET['edit_id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}




if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){
    $id = $_POST['id'];
    $mail = trim($_POST['mail']);
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);
    $admin = isset($_POST['admin']) ? 1 : 0;

    if($login === '') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    } elseif ($passF !== $passS){
        array_push($errMsg, "Пароли не совпадают");
    } else {
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        if(isset($_POST['admin'])) $admin = 1;
        $user = [
            'admin' => $admin,
            'username' => $login,
//            'email' => $mail,
            'password' => $pass,
        ];
        $user = update('users', $id, $user);
        header('location: ' . BASE_URL . 'admin/users/index.php');
    }
} else {
    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
}


if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('posts', $id, ['status' => $publish]);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}






