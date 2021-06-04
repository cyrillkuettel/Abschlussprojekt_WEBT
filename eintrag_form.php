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
            <a href="#Information">Information</a>
            <a href="#Formular">Formular</a>
            <a href="#Canvas">Canvas</a>
            <a href="#Gästebuch">Gästebuch</a>
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
        if (empty($_POST['name'])) {
            echo '<script> alert("Geben Sie gültige Eingaben in das Formular!");  </script>';
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z\s]*$/i", $name)) {
                $name_error = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $email_error = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            //check if e-mail address is well-formed
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
            $message = test_input($_POST["message"]);
        }

        break;
        
        // Hier wird der Gästebucheintrag gehandelt
    case "entry":

        if (empty($_POST['name'])) {
            echo '<script> alert("Geben Sie gültige Eingaben in das Formular!");  </script>';
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z\s]*$/i", $name)) {
                $name_error = "Only letters and white space allowed";
            }
        }

        if (empty($_POST["email"])) {
            $email_error = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            //check if e-mail address is well-formed
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
            $message = test_input($_POST["message"]);
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




function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function debug($data)
{ // Triviales, aber praktisches console.log in php 
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
