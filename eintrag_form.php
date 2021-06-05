<head>
    <meta charset="utf-8" />
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
        <h1>Bruno's Velo Shop</h1>
    </header>
    <nav>
        <div class="topnav" id="navigation">
            <a href="index.html/#Information">Information</a>
            <a href="index.html/#Formular">Formular</a>
            <a href="index.html/#Canvas">Canvas</a>
            <a href="index.html/#Gästebuch">Gästebuch</a>
            <a href="javascript:void(0);" class="icon" onclick="toggleNavigation()">
                <i class="fa fa-bars"></i></a>

        </div>
    </nav>
</body>

</html>







<?php
//define variables and set them to empty values
//now check if all the entries are valid



$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $velo = "";

/*
because of this error:
    the " PHPSESSID " cookie will soon be rejected because 
    its " sameSite " attribute is set to " none " or an invalid value, and without " secure " attribute. 
*/


require_once 'GuestbookAccess.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    debug("got here");
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
        if ($_POST['option'] == "scm1") { // ausverkauft

        } else { // in diesem Fall nicht ausverkauft.

            $velo = $_POST['option'];

            $guestbook = new GuestbookAccess();

            // Call the add entry methode
            // The methode itself adds an unique index and the timestamp to the entry.
            $id1 = $guestbook->addEntry($name, $email, $velo);

            echo "Added new entry with index $id1\n";
            
            echo '<meta charset="utf-8" />';
            echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';
            echo '<link rel="stylesheet" href="/css/custom_rules.css">';
            echo '<style>';
            echo 'footer {';
            echo 'position: fixed;';
            echo 'left: 0;';
            echo 'bottom: 0;';
            echo 'width: 100%;';
            echo 'color: white;';
            echo 'text-align: center;';
            echo 'padding: 60px;';
            echo 'background-color: #4CAF50;';
            echo '}';
            echo '</style>';
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
            echo '<div class="link-wrapper">';
            echo '<a href="index.html"><button class="w3-button w3-green" style="margin: 7px;">Zurück zur Homepage</button></a>';
            echo '</div>';
            echo '</div>';
            echo '</section>';
            echo '';
            echo '<footer class="w3-container">';
            echo '<div class="w3-container w3-center">';
            echo '<p class="copyright"> HSLU FS2021 - Cyrill Küttel Copyright &copy;</p>';
            echo '</div>';
            echo '</footer>';
            
        }
    } else {
        warn_and_go_back("Kein bike ausgewählt?");
    }

    //  ------------------------------------


    // unset($_POST['submit']);



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
 main page has to have the name index.html for this to work.
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
