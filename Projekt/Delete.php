<?php

    include "DbConnection.php";

    $con = OpenConnection();

    $id=$_REQUEST['id'];
    $query = "DELETE FROM users WHERE UserID = '".$id."'"; 
    $result = mysqli_query($con, $query);
    header("Location: UsersList.php");   

?>
