<?php

require_once "../../app/database/db.php";

$errMsg = '';
$id = '';
$title = '';
$img = '';
$content = '';
$topic = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'users');


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);
    $publish = isset($_POST['publish']) ? 1 : 0;

    if($title === '' || $content === '' || $topic === '') {
        $errMsg = "Не все поля заполнены";
    } elseif (mb_strlen($title, 'UTF8') < 2){
        $errMsg = "Категория должена быть более 2-х символов";
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
    $title = '';
    $content = '';
}






if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}







if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topic-edit'])){

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);

    if($name === '' || $description === '') {
        $errMsg = "Не все поля заполнены";
    } elseif (mb_strlen($name, 'UTF8') < 2){
        $errMsg = "Категория должена быть более 2-х символов";
    } else {
            $topic = [
                'name' => $name,
                'description' => $description,
            ];
            $id = $_POST['id'];
            $topic_id = update('topics', $id, $topic);
            header('location: ' . BASE_URL . 'admin/topics/index.php');
        }
}








if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id = $_GET['del_id'];
    delete('topics', $id);
    header('location: ' . BASE_URL . 'admin/topics/index.php');
}