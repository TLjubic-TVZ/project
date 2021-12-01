<?php

    include "DbConnection.php";

    $con = OpenConnection();

    $id=$_REQUEST['id'];
    $query = "DELETE FROM news WHERE VijestiID = '".$id."'"; 
    $result = mysqli_query($con, $query);
    header("Location: PostsList.php");   

?>
