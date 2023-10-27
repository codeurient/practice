<?php
    include ("app/controllers/users.php");
?>
<!DOCTYPE html>
<html lang=”en”>
<head>
    <title>This is the Title of the Page</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="assets/css/foundation.min.css">
    <style>
        .center{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: space-evenly;
            padding: 20px;
        }
        .center form .always-white {
            color: #fff !important;
            background: transparent !important;
        }
        button{
            color: white;
            border: 1px solid white;
            padding: 10px 20px;
            cursor: pointer;
        }
        button:hover{
            background-color: white;
            color: black;
        }
        .chck{
            color: white;
            display: inline-block;
        }
        .auth a{
            color: white;
            margin-left: 40px;
            text-decoration: underline;
            /*text-underline-offset: 2px;*/
            -webkit-text-underline-position: under;
            -ms-text-underline-position: below;
            text-underline-position: under;
        }
        .auth a:hover{
            color: #6eace8;
        }
        h2{
            color: white;
        }
        .errMsg{
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<canvas style="width: 100%; height: 100%;" id="canv"></canvas>



<div class="center">
    <h2>Аутентификация</h2>
    <div class="errMsg"> <?= $errMsg ?> </div>
    <form action="reg.php" method="post">
        <input class="always-white" name="login" value="<?= $login ?>" type="text" placeholder="Login">

        <input class="always-white" name="mail" value="<?= $email ?>" type="email" placeholder="Email">

        <input class="always-white" name="pass-first" type="password" placeholder="Password">
        <input class="always-white" name="pass-second" type="password" placeholder="Repeat password">

        <!--    <label class="chck">-->
        <!--        <input type="checkbox" class="chck"> Check me out!-->
        <!--    </label>-->

        <div class="auth">
            <button name="button-reg" type="submit">Send</button>
            <a href="<?php echo BASE_URL . "log.php" ?>">Already have an account?</a>
        </div>
    </form>
</div>



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