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
$name = $email = $phone = $message = $url = $success = "";



require_once 'GuestbookAccess.php';

switch ($_POST['action']) {
    case "buy":
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
            // echo '<script> alert("Geben Sie eine Email an 1"); window.location = "index.html"; </script>';
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

            } else {

                
            }
        } else {
            warn_and_go_back("Kein bike ausgewählt?");
        }


        break;

        //  ------------------------------------------  Hier wird der Gästebucheintrag gehandelt
    case "entry":

        if (empty($_POST['name'])) {
            echo '<script> alert("Geben Sie gültige Eingaben in das Formular!");  </script>';
        } else {
            $name = $_POST["name"];
            if (!preg_match("/^[a-zA-Z\s]*$/i", $name)) {
                $name_error = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $email_error = "Email is required";
        } else {
            $email = $_POST["email"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $email_error = "invalid email format";
            }
        }

        if (empty($_POST["message"])) {
            $message = "";
        } else {
            $message = $_POST["message"];
        }

        if (empty($_POST["message"])) {
            $message = "";
        } else {
            $message = $_POST["message"];
        }


        $message_body = '';
        if ($name_error == '' and $email_error == '') {

            unset($_POST['submit']);

            foreach ($_POST as $key => $value) {
                $message_body .= "$key: $value\n";
            }
            //$str = str_replace(array("\r", "\n"), '', $str);
            // debug(str_replace(array("\r", "\n"), ' ', $message_body));

            // Everything is filled out. Now put the information in the database
            // Create an object of the GuestbookAccess class
            $guestbook = new GuestbookAccess();

            // Call the add entry methode
            // The methode itself adds an unique index and the date to the entry.
            $id1 = $guestbook->addEntry($name, $email, $message);

            // echo "Added new entry with index $id1\n";


        }
        break;
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
<div class="w3-card-4 w3-center" style="margin:auto;">

    <div class="link-container">
        <a href="index.html"><button class="w3-button w3-green" style="margin: 7px;">Zurück</button></a>
    </div>
    <div class="thank you">

    </div>
</div>