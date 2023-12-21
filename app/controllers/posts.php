<?php
include '../../path.php';
require_once "../../app/database/db.php";

if(!$_SESSION) {
    header('location: ' . BASE_URL . 'log.php');
}


$errMsg = [];
$id = '';
$title = '';
$img = '';
$content = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){

    if(!empty($_FILES['img']['name'])) {
        $imgName = time() . '_' . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . '/assets/img/posts/' . $imgName;

        if (strpos($fileType, 'image') === false){
            array_push($errMsg, "can upload only images");
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errMsg, "Can not upload img to server");
            }
        }
    } else {
        array_push($errMsg, "Error to get img from FORM");
    }




    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = isset($_POST['topic']) ? trim($_POST['topic']) : '';
    $publish = isset($_POST['publish']) ? 1 : 0;



    if($title === '' || $content === '' || $topic === '') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($title, 'UTF8') < 2){
        array_push($errMsg, "Категория должна быть более 2-х символов");
    } else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'img' => $_POST['img'],
            'content' => $content,
            'status' => $publish,
            'id_topic' => $topic,
        ];
        $id = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: ' . BASE_URL . 'admin/posts/index.php');
    }
} else{
    $id = '';
    $title = '';
    $content = '';
    $publish = '';
    $topic = '';
}






if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];
}


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if(!empty($_FILES['img']['name'])) {
        $imgName = time() . '_' . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . '/assets/img/posts/' . $imgName;

        if (strpos($fileType, 'image') === false){
            array_push($errMsg, "can upload only images");
        } else {
            $result = move_uploaded_file($fileTmpName, $destination);

            if($result) {
                $_POST['img'] = $imgName;
            } else {
                array_push($errMsg, "Can not upload img to server");
            }
        }
    } else {
        array_push($errMsg, "Error to get img from FORM");
    }


    if($title === '' || $content === '' || $topic ==='') {
        array_push($errMsg, "Не все поля заполнены");
    } elseif (mb_strlen($title, 'UTF8') < 2){
        array_push($errMsg, "Категория должена быть более 2-х символов");
    } else {
            $post = [
                'id_user' => $_SESSION['id'],
                'title' => $title,
                'content' => $content,
                'img' => $_POST['img'],
                'status' => $publish,
                'id_topic' => $topic,
            ];
            $post = update('posts', $id, $post);
            header('location: ' . BASE_URL . 'admin/posts/index.php');
        }
} else {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $topic = $_POST['id_topic'];
}


if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postId = update('posts', $id, ['status' => $publish]);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
    exit();
}




if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . 'admin/posts/index.php');
}