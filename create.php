<?php
include ('app/controllers/users.php');
include ('app/controllers/status.php');

//session_start();
//session_regenerate_id(true);
//require  'classes/database.php';
//require  'classes/user.php';
//require  'classes/friend.php';
//
//$db_obj = new Database();
//$db_connection = $db_obj->dbConnection();
//$user_obj = new User($db_connection);
//$frnd_obj = new Friend($db_connection);
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

    <form action="" style="padding: 50px">

        <input type="text" placeholder="Group name">
        <select name="" id="">
            <option disabled selected>Select your category</option>
            <option value="">JavaScript</option>
            <option value="">PHP</option>
            <option value="">HTML5</option>
            <option value="">CSS3</option>
            <option value="">VUE JS</option>
            <option value="">REACT JS</option>
        </select>
        <input type="text" placeholder="Lesson name">
        <input type="text" placeholder="Type group shares">
        <select name="" id="">
            <option disabled selected>How many time</option>
            <option value="">1</option>
            <option value="">2</option>
            <option value="">3</option>
            <option value="">4</option>
            <option value="">5</option>
            <option value="">6</option>
        </select>
        <div>
            <textarea name="" id="" cols="30" rows="10" placeholder="Your code here..."></textarea>
        </div>

    </form>

</section>



<script src="node_modules/devtools-detector/lib/devtools-detector.js"></script>
<script>
    // // var view = document.createElement('div');
    // // document.body.appendChild(view);
    //
    // devtoolsDetector.addListener(function(isOpen) {
    //     //view.innerText = isOpen ? 'devtools status: open' : 'devtools status: close';
    //     if(isOpen){
    //         window.location.href = 'https://example.com/alternate-page';
    //     } else{
    //         console.log('devtools status: close');
    //     }
    // });
    // devtoolsDetector.launch();
</script>
<script>
    // Get the canvas node and the drawing context
    const canvas = document.getElementById('canv');
    const ctx = canvas.getContext('2d');

    // set the width and height of the canvas
    const w = canvas.width = document.body.offsetWidth;
    const h = canvas.height = document.body.offsetHeight;

    // draw a black rectangle of width and height same as that of the canvas
    ctx.fillStyle = '#000';
    ctx.fillRect(0, 0, w, h);

    const cols = Math.floor(w / 20) + 1;
    const ypos = Array(cols).fill(0);

    function matrix () {
        // Draw a semitransparent black rectangle on top of previous drawing
        ctx.fillStyle = '#0001';
        ctx.fillRect(0, 0, w, h);

        // Set color to green and font to 15pt monospace in the drawing context
        ctx.fillStyle = '#0f0';
        ctx.font = '15pt monospace';

        // for each column put a random character at the end
        ypos.forEach((y, ind) => {
            // generate a random character
            const text = String.fromCharCode(Math.random() * 128);

            // x coordinate of the column, y coordinate is already given
            const x = ind * 20;
            // render the character at (x, y)
            ctx.fillText(text, x, y);

            // randomly reset the end of the column if it's at least 100px high
            if (y > 100 + Math.random() * 10000) ypos[ind] = 0;
            // otherwise just move the y coordinate for the column 20px down,
            else ypos[ind] = y + 20;
        });
    }

    // render the animation at 20 FPS.
    setInterval(matrix, 50);
</script>

<script src="assets/js/main.js"></script>
<script src="assets/js/fontawesome.js"></script>
<script src="assets/js/emmet.min.js"></script>
<script src="assets/js/highlight.min.js"></script>

</body>
</html>