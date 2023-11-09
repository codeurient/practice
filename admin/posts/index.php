<?php
    include  '../../path.php';
    include ('../../app/controllers/posts.php');

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
            /*width: 20%;*/
            padding: 10px;
            border: 1px solid black;
            flex-basis: 200px;
        }
        .upSide .last{
            /*width: 40%;*/
        }
    </style>
</head>
<body>

<?php include('../../app/include/header-admin.php') ?>

<section class="home">
    <div class="posts">
        <div class="btns">
            <a href="<?php echo BASE_URL . "admin/posts/create.php" ?>">Add Post</a>
            <a class="manage" href="">Manage Post</a>
        </div>
        <div class="upSide">
            <div>ID</div>
            <div>Title</div>
            <div>Avtor</div>
            <div class="last">Control</div>
            <div>&nbsp;</div>
            <div>&nbsp;</div>
        </div>

        <?php foreach ($postsAdm as $key => $post): ?>
            <div class="downSide">
                <div><?= $key + 1 ?></div>
                <div><?= $post['title'] ?></div>
                <div><?= $post['username'] ?></div>
                <div><a href="edit.php?id=<?= $post['id'] ?>">edit</a></div>
                <div><a href="edit.php?delete_id=<?= $post['id'] ?>">delete</a></div>
                <?php if($post['status']): ?>
                    <div><a href="edit.php?publish=0&pub_id=<?= $post['id'] ?>">Unpublish</a></div>
                <?php else: ?>
                    <div><a href="edit.php?publish=1&pub_id=<?= $post['id'] ?>">Publish</a></div>
                <?php endif; ?>
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