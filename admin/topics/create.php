<?php
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
    </style>
</head>
<body>

<?php include('../../app/include/header-admin.php') ?>

<section class="home">
    <div class="posts">

        <div class="btns">
            <a href="">Add Category</a>
            <a class="manage" href="<?php echo BASE_URL . "admin/topics/index.php" ?>">Manage Category</a>
        </div>

        <div style="margin: 20px 0;" class="errMsg"> <?= $errMsg ?> </div>

        <div>
            <form action="../topics/create.php" method="post">
                <div>
                    <input value="<?= $name; ?>" name="name" type="text" placeholder="category name">
                </div>
                <div>
<!-- Xeta var buna gore ->  $description;   -->
                    <textarea name="description" cols="30" rows="10" placeholder="description"><?= $description; ?></textarea>
                </div>
                <div>
                    <button name="topic-create" type="submit">Save</button>
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