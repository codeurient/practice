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
    </style>
</head>
<body>

<?php include('../../app/include/header-admin.php') ?>

<section class="home">
    <div class="posts">
        <div class="btns">
            <a href="">Add Post</a>
            <a class="manage" href="<?php echo BASE_URL . "admin/posts/index.php" ?>">Manage Post</a>
        </div>
        <div>
            <form action="create.php" method="post">
                <div>
                    <input name="title" type="text" placeholder="title">
                </div>
                <div>
                    <textarea name="content" id="editor" cols="30" rows="10"></textarea>
                </div>
                <div>
                    <input name="img" type="file" id="file">
                    <label for="file">Upload</label>
                </div>
                <div>
                    <select name="topic">
                        <option selected disabled>Open this select menu</option>
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <input name="publish" type="checkbox" value="1"> Publish
                </div>
                <div>
                    <button name="add_post" type="submit">Save</button>
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