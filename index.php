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

    <!--- Hier drin: Information zu Webapplikation und wie der Benutzer die Applikation zu bedienen hat.-->
    <h1 id="Information">Information</h1>
    <p style="margin-bottom:800px">
        Auch noch etwas Raum.
    </p>
    <h1 id="Formular"> Formular</h1>
    <p style="margin-bottom:800px">
        Auch noch etwas Raum.
    </p>
    <h1 id="Canvas"> Canvas</h1>
    <p style="margin-bottom:800px">
        Auch noch etwas Raum.
    </p>
    <h1 id="Gästebuch"> Gästebuch</h1>
    <h2 class="text-white mt-0">Hier kannst du einen Gästebucheintrag hinterlassen.</h2>
    <?php include('eintrag_erstellen.php'); ?>
    <!--- then we show all the entries immediately after --->
</body>

</html>