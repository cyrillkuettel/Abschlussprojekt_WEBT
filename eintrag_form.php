<?php
//define variables and set them to empty values
//now check if all the entries are valid

$name_error = $email_error = $phone_error = $url_error = "";
$name = $email = $phone = $message = $url = $success = "";

require_once 'GuestbookAccess.php';
//form is submitted with the post method:

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $name_error = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z]*$/i",$name)) { 
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
} //if $_SERVER["REQUEST_METHOD"] == "POST") endet hier

function test_input($data) {  
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function debug($data) { // Triviales, aber praktisches console.log in php 
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


