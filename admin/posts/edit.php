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
        <div>
            <div style="color: red;">
                <?php include('../../app/helps/errorInfo.php') ?>
            </div>

            <form action="edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$id; ?>">
                <div>
                    <input value="<?= $post['title']; ?>" name="title" type="text" placeholder="title">
                </div>
                <div>
                    <textarea name="content" id="editor" cols="30" rows="10"><?= $post['content']; ?></textarea>
                </div>
                <div>
                    <input name="img" type="file" id="file">
                    <label for="file">Upload</label>
                </div>
                <div>
                    <select name="topic">
                        <?php foreach ($topics as $key => $topic): ?>
                            <option value="<?= $topic['id'] ?>"><?= $topic['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                   <?php if (empty($publish) && $publish == 0): ?>
                        <input name="publish" type="checkbox" > Publish <?= $publish; ?>
                   <?php else:?>
                       <input name="publish" type="checkbox" checked> Shared <?= $publish; ?>
                   <?php endif; ?>
                </div>
                <div>
                    <button name="edit_post" type="submit">Update</button>
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