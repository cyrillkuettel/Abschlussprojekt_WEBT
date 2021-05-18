<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="/css/custom_rules.css">
    <title>Home</title>

</head>

<body>
    <header>
        <h1>Bruno's Velo Shop</h1>
    </header>
    <?php include('navbar.php'); ?>
    <!-- - Hier drin: Information zur Webapplikation und wie der Benutzer die Applikation zu bedienen hat. -->
    <div class="w3-container">
        <h1 id="Information">Information</h1>
        <h2>Falls Sie ein Velo kaufen wollen, können Sie unterhalb der Bilder die korrespondierende ID angeben.
            Danach das Formular ausfüllen, abschicken. </h2>
        <div class="w3-container">
            <img class="w3-image" src="img/downhill.jpg" alt="">
        </div>

    </div>







    <!-- Darstellung der Produkten  -->

    <h1 id="Formular"> Formular</h1>
    <main class="w3-container">

        <div class="w3-row">
            <div class="w3-col m6">
                <section class="w3-card w3-margin">
                    <img class="w3-image bike_img" src="img/image-1.jpeg" alt="">
                        <div class="w3-container">
                            <div class="product_description">
                                <h2>Scott Metrix 20</h2>
                                <p>ID #1</p>
                            </div>
                            <hr style="clear:both;" />
                            <p>Dein perfekter sportlicher Begleiter im Alltag – Metrix 20 von Scott.
                                Der Aluminiumrahmen in Kombination mit der Metrix 20 Carbongabel sorgen für ein niedriges Gesamtgewicht des Rads.
                                Ein integrierter Kabelverlauf und ein somit aufgeräumtes Aussehen gehört bei Scott zum Standard.</p>

                        </div>


                </section>
            </div>

            <div class="w3-col m6">
                <section class="w3-card w3-margin">
                    <img class="w3-image" src="img/image-2.jpeg" alt="">
                    <div class="w3-container">
                        <div class="product_description">
                            <h2>Scott Genius 900 </h2>
                            <p>ID#2</p>
                        </div>
                        <hr style="clear:both;" />
                        <p>Mit dem neuen Scott Genius 900 Tuned All Mountainbike war dieser Satz noch nie glaubhafter:
                            Any trail, any time. Dem Genius wurde für 2018 ein ganz neues Gesicht verpasst, die Tuned-Version
                            ist das Top-of-the-Line-Modell</p>
                    </div>
                </section>
            </div>

        </div>
        <div class="w3-row">
            <div class="w3-col m6">
                <section class="w3-card w3-margin">
                    <img class="w3-image" src="img/image-3.jpeg" alt="">
                    <div class="w3-container">
                        <div class="product_description">
                            <h2>Scott Genius 40</h2>
                            <p>ID #3</p>
                        </div>
                        <hr style="clear:both;" />
                        <p>Das Genius ist durch sein verstellbares Fahrwerk vielseitig einsetzbar –
                            der Sportler unter den Long-Travel-All-Mountains.</p>
                    </div>
                </section>
            </div>
            <div class="w3-col m6">
                <section class="w3-card w3-margin">
                    <img class="w3-image" src="img/image-4.jpeg" alt="">
                    <div class="w3-container">
                        <div class="product_description">
                            <h2>Rennvelo Scott Foil 10</h2>
                            <p>ID #4</p>
                        </div>
                        <hr style="clear:both;" />
                        <p>Ein Rennvelo der Superlative! Crazy light and crazy fast! </p>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <?php

    $name_error = $email_error = $phone_error = $url_error = "";
    $name = $email = $id = $message = $url = $success = "";
    ?>

    <div class="formular">
        <form id="order" action="/action.php" method="post">
            <fieldset>
                <input placeholder="Name" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus required>
                <span class="error"><?= $name_error ?></span>
            </fieldset>
            <fieldset>
                <select id="product">
                    <option value="scm1">Scott Metrix 20</option>
                    <option value="sg900">Scott Genius 900 </option>
                    <option value="sc40">Scott Genius 40</option>
                    <option value="rcf10">Rennvelo Scott Foil 10</option>
                </select>
            </fieldset>
            <fieldset>
                <input placeholder="Email" type="text" name="email" value="<?= $email ?>" tabindex="3">
                <span class="error"><?= $email_error ?></span>
            </fieldset>
            <fieldset>
                <textarea placeholder="Adresse" tabindex="5" name="message" value="<?= $message ?>" tabindex="4"></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Abschicken</button>
            </fieldset>
        </form>
        <p name="success" value=" <?= $success ?> "> </p>
    </div>


    <!-- canvas Mit dem Velo Logo --->
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
                // squares the surrounding of the canvas
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
    <!-- Gästebuch: Serverseitige Persistenz --->
    <div class="w3-container">
        <h1 id="Gästebuch"> Gästebuch</h1>
        <h2 class="text-white mt-0">Hier kannst du einen Gästebucheintrag hinterlassen.</h2>
        <?php include('eintrag_erstellen.php'); ?>
        <!--- then we show all the entries immediately after --->
    </div>
    <footer class="w3-container w3-center">
        <p> This is the footer</p>
    </footer>
</body>

</html>