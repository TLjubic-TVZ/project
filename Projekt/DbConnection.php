<?php
    function OpenConnection() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "ntpws";
        $connection = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $connection -> error);
        
        /*

        if ($connection) {
            $sql = "CREATE TABLE IF NOT EXISTS 'tablename'";
            $retval = mysqli_query($connection, $sql);
        }

        */
        
        return $connection;
    }
    
    function CloseConnection($connection) {
        $connection -> close();
    }
   
?>