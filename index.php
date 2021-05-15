<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Home</title>
</head>

<body>
    <?php include('navbar.php'); ?>

    <!-- - Hier drin: Information zu Webapplikation und wie der Benutzer die Applikation zu bedienen hat. -->
    <div class="w3-container">
        <h1 id="Information">Information</h1>
        <p style="margin-bottom:800px">
            Auch noch etwas Raum.
        </p>
    </div>

<!-- Section starting here -->
    <section class="w3-container">
        <h1 id="Formular"> Formular</h1>
        <div class="w3-display-container">

            <img src="img_lights.jpg" alt="Lights">
            <div class="w3-display-topleft w3-container">Top Left

            </div>
            <div class="w3-display-topright w3-container">Top Right</div>
            <div class="w3-display-bottomleft w3-container">Bottom Left</div>
            <div class="w3-display-bottomright w3-container">Bottom Right</div>
            <div class="w3-display-left w3-container">Left</div>
            <div class="w3-display-right w3-container">Right</div>
            <div class="w3-display-middle w3-large">Middle</div>
            <div class="w3-display-topmiddle w3-container">Top Middle</div>
            <div class="w3-display-bottommiddle w3-container">Bottom Middle</div>
        </div>
        <p style="margin-bottom:800px">
            Auch noch etwas Raum.
        </p>
    </div>
    <section class="w3-container">
        <h1 id="Canvas"> Canvas</h1>
        <canvas id="myCanvas" width="1000px" height="500px"></canvas>
        <script>
            // TODO: 
            var canvas;
            var c;

            function drawCanvas(x, y) {
                canvas = document.getElementById('myCanvas');;
                var width = canvas.width;
                var height = canvas.height; // just to adjust dynamically, if for some peculiar reason, the dimensions change abruptly. 

                c = canvas.getContext('2d')
                c.fillStyle = "red";

                c.beginPath();
                c.moveTo(0, 0);
                c.lineTo(width, 0);

                c.lineTo(width, height);
                c.lineTo(0, height);
                c.lineTo(width, height);
                c.moveTo(0, height);
                c.lineTo(0, 0);
                c.stroke();
                //c.fillStyle = "#33ee99";
                // c.fill();
            }

            function drawEllipse(x, y, radius, color, optionalLineWidth = '18', strokeStyle = "#454545") {

                //if (typeof optionalLineWidth === 'undefined') { optionalLineWidth = '9'; }
                c.beginPath();
                c.fillStyle = color;
                c.strokeStyle = "#454545";
                c.lineWidth = optionalLineWidth;
                c.arc(x, y, radius, 0, 2 * Math.PI, true);
                c.fill();
                c.stroke();
            }

            function drawBikeFrame() {
                c.beginPath();
                c.lineWidth = 17;
                c.moveTo(200, 380);
                c.lineTo(330, 380);
                c.moveTo(200, 380);
                c.lineTo(310, 210); // diagonal line up 
                c.lineTo(505, 200); // querLinie 
                c.moveTo(368, 370);
                c.lineTo(300, 190); // Stange wo der Sattel drauf ist
                c.moveTo(390, 360);
                c.lineTo(502, 215); // von Tretlager zu Lenker
                c.moveTo(570, 380);
                c.lineTo(500, 230);
                c.moveTo(500, 230);
                c.lineTo(498, 175);
                c.strokeStyle = '#44a6c6';
                c.stroke();
                c.closePath();
            }

            function drawTretlager() {
                c.lineCap = "round";
                drawEllipse(368, 385, 30, "white", '18', "black"); // Kranz vorne
                //drawEllipse(368, 389, 5, "#454545", '18',); // Tretlager 
                c.beginPath();
                c.lineWidth = 17;
                c.moveTo(365, 388);
                c.lineTo(330, 454);
                c.moveTo(322, 455);
                c.lineTo(343, 455);
                c.moveTo(380, 347);
                c.lineTo(390, 325);
                c.moveTo(380, 325);
                c.lineTo(395, 325);
                c.strokeStyle = "#454545";
                c.stroke();
                c.closePath();
            }

            function drawSattel() {
                c.beginPath();
                c.lineCap = "butt";
                c.lineWidth = 17;
                c.moveTo(300, 190);
                c.lineTo(282, 142);
                c.lineCap = "round";
                c.moveTo(253, 140); // "Primitiver Sattel"
                c.lineTo(330, 140);
                c.lineCap = "square";
                c.moveTo(498, 175);
                c.lineTo(498, 170);
                c.lineCap = "round";
                c.moveTo(498, 175);
                c.lineTo(498, 155);
                c.moveTo(485, 155);
                c.quadraticCurveTo(500, 160, 560, 140) // Lenker
                c.strokeStyle = "#454545";
                c.stroke();
                c.closePath();
            }

            drawCanvas();
            drawEllipse(200, 380, 100, "black");
            drawEllipse(200, 380, 100, "white");
            drawEllipse(200, 380, 100, "white");
            drawEllipse(200, 380, 20, "#44a6c6", "1");
            drawEllipse(575, 380, 100, "black");
            drawEllipse(575, 380, 100, "white");
            drawEllipse(575, 380, 100, "white");
            drawEllipse(575, 380, 20, "#44a6c6", "1");
            drawBikeFrame();
            drawTretlager();
            drawSattel();
        </script>

    </section>
    <section class="w3-container">
        <h1 id="Gästebuch" class=""> Gästebuch</h1>
    </section>


    <!-- delete this later, just for convenience --->
    <p id='output'></p>
    <script>
        var output = document.getElementById('output');
        document.onmousemove = getCursorPos;
        output.style.left = 1000 + 'px';
        output.style.top = 1800 + 'px';

        function getCursorPos(a) {
            var posx = a.clientX;
            var posy = a.clientY - 300;
            output.innerHTML = "Position X: " + posx + "px & Position Y: " + posy + "px";
        }
    </script>
    <h2 class="text-white mt-0">Hier kannst du einen Gästebucheintrag hinterlassen.</h2>
    <?php include('eintrag_erstellen.php'); ?>
    <!--- then we show all the entries immediately after --->
    <footer class="w3-container">
        <p> This is the footer</p>
    </footer>
</body>

</html>