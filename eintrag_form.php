<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- hamburger btn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/custom_rules.css">
    <script src="/js/formValidate.js"></script>
    <script src="/js/nav-script.js"></script>
    <title>Home</title>

</head>

<body>
    <header>
    <h1><a href="index.html">Bruno's Velo Shop</a></h1>
    </header>
    <!--Unter normalen Umständen, wäre hier include("navbar.php") die bessere Idee. (Redundanz)-->
    <nav>
        <div class="topnav" id="navigation">
            <a href="index.html/#Information">Information</a>
            <a href="index.html/#Formular">Formular</a>
            <a href="index.html/#Canvas">Canvas</a>
            <a href="javascript:void(0);" class="icon" onclick="toggleNavigation()">
                <i class="fa fa-bars"></i></a>
        </div>
    </nav>
</body>




<?php
//define variables and set them to empty values
//now check if all the entries are valid



$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $velo = "";



require_once 'AccessDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // TODO:  use isset to check null as well. 
    if (empty($_POST['name'])) {
        warn_and_go_back("Geben Sie gültige Eingaben in das Formular!");
        return;
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z\s]*$/i", $name)) {
            warn_and_go_back("Nur Buchstaben und Leerschläge im Namen!");
        }
    }
    if (empty($_POST["email"])) {
        warn_and_go_back("Bitte geben Sie eine Email an");
        return;
    } else {
        $email = $_POST["email"];
        //check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            warn_and_go_back("Diese Email ist ungültig");
            return;
        }
    }

    if (!empty($_POST['option'])) {
        if ($_POST['option'] == "Scott Metrix 20") { // sold out
            // show the Sold out message.  
           
            echo '<meta charset="utf-8" />';
            echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
            echo '<link rel="stylesheet" href="/css/custom_rules.css">';
            echo '';
            echo '<div class="w3-container">';
            echo '<div class="w3-center" style="margin:auto;">';
            echo '<div class="thank you">';
            echo '<h1>Das tut uns Leid! Das gwünschte Velo ist leider gerade ausverkauft.</h1>';
            echo '<p>Gerne kommen wir auf sie zurück, wenn das Velo wieder auf Lager ist.</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '';
            echo '<!-- canvas Mit dem Velo Logo --->';
            echo '<section class="w3-container w3-center">';
            echo '<canvas id="myCanvas" width="1000px" height="500px"></canvas>';
            echo '<script src="/js/canvas.js"></script>';
            echo '</section>';
            echo '';
            echo '<section class="go-back">';
            echo '<div class="w3-card-4 w3-center" style="margin:auto;">';
            echo '<div class="link-wrapper">';
            echo '<a href="index.html"><button class="w3-button w3-green" style="margin: 7px;">Zurück zur Homepage</button></a>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
            
        } else { // here: available

            $velo = $_POST['option'];
            $acccessObject = new AccessDB();
            // Call the add entry methode
            // index and the timestamp are handled automatically.

           $acccessObject->addEntry($name, $email, $velo); // add the product to database


            echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
            echo '<link rel="stylesheet" href="/css/custom_rules.css">';
            echo '';
            echo '<div class="w3-container">';
            echo '<div class="w3-center" style="margin:auto;">';
            echo '<div class="thank you">';
            echo '<h1>Vielen Dank für Ihren Kauf!</h1>';
            echo '<p>Wir werden Ihre Bestellung in Kürze aufnehmen.</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '';
            echo '<!-- canvas Mit dem Velo Logo --->';
            echo '<section class="w3-container w3-center">';
            echo '<canvas id="myCanvas" width="1000px" height="500px"></canvas>';
            echo '<script src="/js/canvas.js"></script>';
            echo '</section>';
            echo '';
            echo '<section class="go-back">';
            echo '<div class="w3-card-4 w3-center" style="margin:auto;">';
            echo '<a href="index.html"><button class="w3-button w3-green" style="margin: 7px;">Zurück zur Homepage</button></a>';
            echo '</div>';
            echo '</section>';
            echo '';
        }
    } else {
        warn_and_go_back("Kein bike ausgewählt?");
    }
} else {
    debug("got to the exit");
}


# Cookie erstellen
if (!(isset($_COOKIE['customerName']))) {
    if (!empty($name)) {
        setcookie("customerName", $name, time() + 3600);
    }
} else {

    if (cookieNameChanged($_COOKIE['customerName'], $name)) {
        setcookie("customerName", $name, time() + 3600);
    } else {
        // OK. name stayed the same. 
    }
}

/*
 function to warn the user and return to the main Page. 
 main page = index.html
*/
function warn_and_go_back($data)
{
    echo "<script>alert('" . $data . "' ); window.location = 'index.html'; </script>";
}

function cookieNameChanged($cookie, $name)
{
    return $cookie == $name;
}


function debug($data)
{ // Triviales, aber praktisches console.log in php 
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


?>
<section id="history" class="w3-container">

    <h2>Verlauf</h2>
    <div class="w3-card-4 w3-center" style="margin:auto;">
        <div class="w3-container w3-center">
            <?php
            $acccessObject = new AccessDB();
            $table = $acccessObject->getEntries();

            if ($table) { // Check if there are entries
                echo '<table class="w3-table-all w3-centered">';
                echo "<tr><th>Zeit</th><th>Name</th><th>gekauftes Velo</th></tr>";
                foreach ($table as $row) {
                    // Output each element

                    $index = $row["Index"];
                    $date = $row["Date"];
                    $name = $row["Name"];
                    $velo = $row["veloType"];

                    echo "<tr><td>";
                    echo $date;
                    echo "</td><td>";
                    echo "$name";
                    echo "</td><td>";
                    echo "$velo";
                    echo "</td>";
                }
                echo "</table>";
            } else {
                echo "\n Bis jetzt noch keine Bestellungen.\n";
            }
            ?>
        </div>
    </div>

</section>
<footer class="w3-container">
        <div class="w3-container w3-center">
            <p class="copyright"> HSLU FS2021 - Cyrill Küttel Copyright &copy;</p>
        </div>
    </footer>
</html>