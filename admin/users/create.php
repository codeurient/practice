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
            <a href="">Add Post</a>
            <a class="manage" href="">Manage Post</a>
        </div>
        <div>
            <form action="create.php" method="post">
                <input class="always-white" name="login" value="<?= $login ?>" type="text" placeholder="Login">

                <input class="always-white" name="mail" value="<?= $email ?>" type="email" placeholder="Email">

                <input class="always-white" name="pass-first" type="password" placeholder="Password">
                <input class="always-white" name="pass-second" type="password" placeholder="Repeat password">

                <select>
                    <option selected disabled>User</option>
                    <option value="1">Admin</option>
                </select>

                <div>
                    <button type="submit">Create</button>
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