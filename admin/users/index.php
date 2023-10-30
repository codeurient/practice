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
        .upSide, .downSide{
            display: flex;
            justify-content: space-evenly;
        }
        .upSide div{
            font-weight: bolder;
        }
        .upSide div, .downSide div{
            flex-grow: 1;
            display: flex;
            justify-content: flex-start;
            width: 20%;
            padding: 10px;
            border: 1px solid black;
        }
        .upSide .last{
            width: 40%;
        }
    </style>
</head>
<body>

<?php include('../../app/include/header-admin.php') ?>

<section class="home">
    <div class="posts">
        <div class="btns">
            <a href="<?php echo BASE_URL . "admin/users/create.php" ?>">Add user</a>
            <a class="manage" href="">Manage users</a>
        </div>
        <div class="upSide">
            <div>ID</div>
            <div>User name</div>
            <div>status</div>
            <div class="last">Control</div>
        </div>

        <div class="downSide">
            <div>1</div>
            <div>codeurient</div>
            <div>admin</div>
            <div><a href="">edit</a></div>
            <div><a href="">delete</a></div>
        </div>
    </div>

</section>



<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/fontawesome.js"></script>
<script src="../../assets/js/emmet.min.js"></script>
<script src="../../assets/js/highlight.min.js"></script>

</body>
</html>