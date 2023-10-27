<?php
    include ('app/controllers/users.php');
    include ('app/controllers/status.php');
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
    <canvas class="cnv" style="width: 100%; height: 100%;" id="canv"></canvas>

    <div class="main">
        <div class="editor-holder">
            <ul class="toolbar"><li></li></ul>
            <div class="scroller">
        		<textarea class="shadowEditor allow-tabs" id="myTextarea" readonly>&lt;div class="Editable Textarea"&gt;
  &lt;h1&gt;This is a fully editable textarea which auto highlights syntax.&lt;/h1&gt;
  &lt;p&gt;Type or paste any code in here...&lt;/p&gt;
&lt;div&gt;

&lt;?php
  var simple = "coding";
?&gt;

&lt;script&gt;
  with = "Tab or double space functionality";
&lt;/script&gt;</textarea>
                <textarea class="editor allow-tabs" id="myTextarea"></textarea>
                <pre><code class="syntax-highight html"></code></pre>
            </div>
        </div>
    </div>
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