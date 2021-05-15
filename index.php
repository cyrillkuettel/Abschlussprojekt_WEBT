<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Home</title>
</head>

<body>
    <?php include('navbar.php'); ?>

    <!-- - Hier drin: Information zu Webapplikation und wie der Benutzer die Applikation zu bedienen hat. -->
    <h1 id="Information">Information</h1>
    <p style="margin-bottom:800px">
        Auch noch etwas Raum.
    </p>
    <h1 id="Formular"> Formular</h1>
    <p style="margin-bottom:800px">
        Auch noch etwas Raum.
    </p>
    <h1 id="Canvas"> Canvas</h1>
    <section>
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

            function drawEllipse(x, y, radius, color, optionalLineWidth = '9') {

                //if (typeof optionalLineWidth === 'undefined') { optionalLineWidth = '9'; }
                c.beginPath();
                c.fillStyle = color;

                c.strokeStyle = "#454545";
                c.lineWidth = optionalLineWidth;
                // Kreisbogen mit Mittelpunkt (150/120) und dem
                // Radius 100 Pixel, Winkel von 0 Grad bis 360 Grad
                c.arc(x, y, radius, 0, 2 * Math.PI, true);
                c.fill();
                c.stroke();
            }

            function drawBikeFrame() {
                c.beginPath();
                

                c.lineWidth = 20;
                c.moveTo(200, 380);
                c.lineTo(330, 380);
                c.moveTo(200, 380);
                c.lineTo(400, 170);

                c.strokeStyle = '#44a6c6';
                c.stroke();




                c.closePath();

                
            }

            drawCanvas();
            drawEllipse(200, 380, 100, "black");
            drawEllipse(200, 380, 100, "white");
            drawEllipse(200, 380, 100, "white");
            drawEllipse(200, 380, 20, "#44a6c6", "1");
            drawBikeFrame();
        </script>

    </section>

    <h1 id="Gästebuch"> Gästebuch</h1>
    <h2 class="text-white mt-0">Hier kannst du einen Gästebucheintrag hinterlassen.</h2>
    <?php include('eintrag_erstellen.php'); ?>
    <!--- then we show all the entries immediately after --->
</body>

</html>