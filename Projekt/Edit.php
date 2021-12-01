<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Projektni zadatak iz kolegija 'Napredne tehnike programiranja web servisa (.open-source)'">
    <meta name="keywords" content="HTML, CSS">
    <meta name="author" content="Tomislav Ljubić">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Pokemons - Edit</title>
</head>
<body>

    <header>

        <?php @include "Menu.php"; ?>

        <div class="clear"></div>

        <div class="header-text">
            <h3>Catch 'em all</h3>
            <h1>Edit</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            
            <img src="Slike/down-arrow (1).png">
        </div>

    </header>


    <main class="register-main">

        <?php

            include "DbConnection.php";

            $con = OpenConnection();

            $id=$_REQUEST['id'];
            $query = "SELECT * from users where UserID='".$id."'"; 
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

        ?>

        <div class="form">
            <h1>Update user</h1>
            <?php
                $status = "";
                if(isset($_POST['new']) && $_POST['new']==1)
                {
                    $id=$_REQUEST['id'];
                    $role = $_REQUEST['role'];
                    $update = "UPDATE users SET Role = '$role' WHERE UserID = '$id'";
                    //$update="update users set Role='".$role."', where UserID='".$id."'";

                    mysqli_query($con, $update);

                    $status = "User Updated Successfully. </br></br>
                    <a href='UsersList.php'>View Users list</a>";
                    echo '<p style="color:#FF0000;">'.$status.'</p>';
                }else {
            ?>
                    <div>
                        <form name="form" method="post" action=""> 
                            <input type="hidden" name="new" value="1" />
                            <input name="id" type="hidden" value="<?php echo $row['UserID'];?>" />

                            <select name="role">
                                <option value="<?php $row['Role'];?>"><?php echo $row['Role']; ?></option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                                <option value="User">User</option>
                            </select>
                            
                            <p><input name="submit" type="submit" value="Update" /></p>
                        </form>
            <?php } ?>
            </div>
        </div>

    </main>

    <?php @include "Footer.php"; ?>

</body>
</html>