<?php
    function OpenConnection() {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "ntpws";
        $connection = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $connection -> error);
        
        return $connection;
    }
    
    function CloseConnection($connection) {
        $connection -> close();
    }
   
?>