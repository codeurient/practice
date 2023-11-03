<?php



if(isset($_SESSION['id']) && isset($_POST['status'])){
    $_SESSION['status'] = $_POST['status'];
    update('users', $_SESSION['id'], $_POST);
//    print_r($_SESSION['status']);
}