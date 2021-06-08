<?php
class AccessDB
{
    private $db;
    private $table;

    public function __construct()
    {
        $username = "root";
        $password = "";
        $database = "db1";
        $this->table = "guestbook";
        
        $this->db = mysqli_connect("localhost", $username, $password);        
        if ($this->db == false) {
            die("Unable to connect to database");
        } 
        
        // Select database
        mysqli_select_db($this->db, $database);
    }
    
    public function __destruct()
    {
        mysqli_close($this->db);
    }
    
    public function getEntries()
    {
        // Make querry
        $t = $this->table;
        $result = mysqli_query($this->db, "SELECT * FROM $t");
        
        $table = false;
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $table[$i]["Index"]   = $row["indes"];
            $table[$i]["Date"]    = $row["cur_date"];
            $table[$i]["Name"]    = $row["namep"];
          //  $table[$i]["eMail"]   = $row["email"]; // not displaying email in public
            $table[$i]["veloType"] = $row["veloType"];
            $i++;
        }
        
        mysqli_free_result($result);
        
        return $table;
    }
    

    function addEntry($name, $eMail, $veloType)
    {   
        
        function debugthis($data) {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
        
             echo "<script>console.log('text " . $output . "' );</script>";
        }
        
        // For security: supress SQL injection
        $name    = mysqli_real_escape_string($this->db, $name);
        $eMail   = mysqli_real_escape_string($this->db, $eMail);
        $veloType = mysqli_real_escape_string($this->db, $veloType);
        

        // Add entry to the database
        $t = $this->table; // local variable, because I could not access the field "$this->table" in the subsequent line
        $result = mysqli_query($this->db, "INSERT INTO $t (namep, email, veloType) VALUES ('$name', '$eMail', '$veloType')");
        
        if ($result)
        {
            $result = mysqli_insert_id($this->db);
        } else {
           debug("Failed to add entry.");
        }

        return $result;
    }

    public function getEntry($index)
    {

        settype($index, 'Integer');

        // Make query
        $t = $this->table;
        $result = mysqli_query($this->db, "SELECT * FROM $t WHERE indes = '$index'");
        
        $list = false;
        $row = mysqli_fetch_array($result);
        if ($row != false) {            
            $list["Index"]   = $row["indes"];
            $list["Date"]    = $row["cur_date"];
            $list["Name"]    = $row["namep"];
            $list["eMail"]   = $row["email"];
            $list["veloType"] = $row["veloType"];
        }
        
        mysqli_free_result($result);
        
        return $list;
    }
}
?>