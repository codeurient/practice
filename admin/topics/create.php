<?php
session_start();
include  '../../path.php';
include ('../../app/controllers/users.php');
?>

<!DOCTYPE html>
<html lang=”en”>
<head>
    <title>This is the Title of the Page</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="../../assets/css/boxicons.css">
    <style>
        .home{
            font-family: Arial, serif;
            padding: 35px;
        }
        .btns{
            margin: 30px 0 30px;
        }
        .manage{
            margin-left: 15px;
        }
    </style>
</head>
<body>

<?php include('../../app/include/header-admin.php') ?>

<section class="home">
    <div class="posts">
        <div class="btns">
            <a href="">Add Category</a>
            <a class="manage" href="">Manage Category</a>
        </div>
        <div>
            <form action="create.php" method="post">
                <div>
                    <input type="text" placeholder="category name">
                </div>
                <div>
                    <textarea cols="30" rows="10" placeholder="description"></textarea>
                </div>
                <div>
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

</section>



<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/fontawesome.js"></script>
<script src="../../assets/js/emmet.min.js"></script>
<script src="../../assets/js/highlight.min.js"></script>

</body>
</html>