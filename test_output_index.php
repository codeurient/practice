<?php
    include('app/controllers/status.php');
    include('app/controllers/users.php');
    include ('app/controllers/topics.php');
?>

<!DOCTYPE html>
<html lang=”en”>
<head>
    <title>This is the Title of the Page</title>
    <meta charset="utf-8">

    <!--    <link rel="stylesheet" href="assets/css/foundation.min.css">-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/boxicons.css">

</head>
<body>

<?php include('app/include/header.php') ?>



<section class="home" >
    <div>
        <ul>
            <?php foreach ($topics as $key => $topic): ?>
                <li><a href=""> <?= $topic['name'] ?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>





<script src="assets/js/main.js"></script>

</body>
</html>