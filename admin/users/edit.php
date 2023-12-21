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
            <div style="color: red;">
                <?php include('../../app/helps/errorInfo.php') ?>
            </div>

            <form action="edit.php" method="post">
                <input name="id" value="<?= $id; ?>" type="hidden">

                <input class="always-white" name="login" value="<?= $username; ?>" type="text" placeholder="Login">

                <input class="always-white" name="mail" value="<?= $email; ?>" readonly disabled type="email" placeholder="Email">

                <input class="always-white" name="pass-first" type="password" placeholder="Reset password">
                <input class="always-white" name="pass-second" type="password" placeholder="Repeat password">

                <input <?php if($admin == 1) echo "checked" ?> name="admin" type="checkbox" value="1"  id="admin"  > Admin?

                <div>
                    <button name="update-user" type="submit">Update</button>
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