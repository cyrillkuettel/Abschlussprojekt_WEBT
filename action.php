<html>

<body>
    <?php
    if (isset($_POST['name'])) {
        include("finished_order.html");
    } else {
        debug("failed");
    }
    
    function debug($data)
    { // Triviales, aber praktisches console.log in php 
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    ?>
</body>

</html>