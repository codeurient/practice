<?php



if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['user_status_id'])){
    $id = $_GET['user_status_id'];
    $user_status = $_GET['user_status'];

    $userStatus = update('users', $id, ['status' => $user_status]);

    header('location: ' . BASE_URL . 'index.php');
    exit();
}


//if(isset($_SESSION['id']) && isset($_POST['status'])){
//    $_SESSION['status'] = $_POST['status'];
//    update('users', $_SESSION['id'], $_POST);
////    print_r($_SESSION['status']);
//}