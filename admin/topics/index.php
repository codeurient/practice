<?php
    session_start();
    include  '../../path.php';
    //include ('../../app/controllers/users.php');
    include ('../../app/controllers/topics.php');
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
            border-bottom: 1px solid black;
        }
        .upSide .last{
            width: 45%;
        }
    </style>
</head>
<body>

<?php include('../../app/include/header-admin.php') ?>

<section class="home">
    <div class="posts">
        <div class="btns">
            <a href="<?php echo BASE_URL . "admin/topics/create.php" ?>">Add Category</a>
            <a href="<?php echo BASE_URL . "admin/topics/index.php" ?>" class="manage" >Manage Category</a>
        </div>
        <div class="upSide">
            <div>ID</div>
            <div>Title</div>
            <div class="last">Control</div>
        </div>

        <?php foreach ($topics as $key => $topic): ?>
            <div class="downSide">
                <div> <?= $key + 1 ?> </div>
                <div><?= $topic['name']; ?></div>
                <div><a href="edit.php?id=<?= $topic['id']; ?>">edit</a></div>
                <div><a href="edit.php?del_id=<?= $topic['id']; ?>">delete</a></div>
            </div>
        <?php endforeach; ?>
    </div>

</section>




<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/fontawesome.js"></script>
<script src="../../assets/js/emmet.min.js"></script>
<script src="../../assets/js/highlight.min.js"></script>

</body>
</html>