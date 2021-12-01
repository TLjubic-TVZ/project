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

    <title>Pokemons - Edit post</title>
</head>
<body>

    <header>

        <?php @include "Menu.php"; ?>

        <div class="clear"></div>

        <div class="header-text">
            <h3>Catch 'em all</h3>
            <h1>Edit post</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            
            <img src="Slike/down-arrow (1).png">
        </div>

    </header>


    <main class="register-main">

        <?php

            include "DbConnection.php";

            $con = OpenConnection();

            $id=$_REQUEST['id'];
            $query = "SELECT * from news where VijestiID='".$id."'"; 
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);

        ?>

        <div class="form">
            <h1>Update post</h1>
            <?php
                $status = "";
                if(isset($_POST['new']) && $_POST['new']==1)
                {
                    $id=$_REQUEST['id'];
                    $title = $_REQUEST['title'];
                    $content = $_REQUEST['content'];

                    // sanitize the value
                    $agree = filter_input(INPUT_POST, 'arch', FILTER_SANITIZE_STRING);

                    if($agree) {
                        $agree = 1;
                    }
                    else {
                        $agree = 0;
                    }

                    // sanitize the value
                    $app = filter_input(INPUT_POST, 'app', FILTER_SANITIZE_STRING);

                    if($app) {
                        $app = 1;
                    }
                    else {
                        $app = 0;
                    }
                    
                    $update = "UPDATE news SET Title = '$title', Content = '$content', Archive = '$agree', Approved = '$app' WHERE VijestiID = '$id'";
                    //$update="update users set Role='".$role."', where UserID='".$id."'";

                    mysqli_query($con, $update);

                    $status = "Post Updated Successfully. </br></br>
                    <a href='PostsList.php'>View all posts</a>";
                    echo '<p style="color:#FF0000;">'.$status.'</p>';
                }else {
            ?>
                    <div>
                        <form name="form" method="post" action=""> 
                            <input type="hidden" name="new" value="1" />
                            <input name="id" type="hidden" value="<?php echo $row['VijestiID'];?>" />

                            <label for="title">Title:</label><br>
                            <input type="text" name="title" id="title" value="<?php echo $row['Title'];?>"><br><br>

                            <label for="content">Content:</label><br>
                            <input type="textarea" name="content" id="content" value="<?php echo $row['Content'];?>"><br><br>
                            
                            
                            

                            <?php
                                if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Editor') { ?>
                                    <p>Add this post to archive:</p><br>
                                    <select name="arch">
                                        <?php
                                            if($row['Archive'] == true) { ?>
                                                <option value="<?php $row['Archive'];?>"><?php echo 'Yes'; ?></option>
                                            <?php
                                            }
                                            else { ?>
                                                <option value="<?php $row['Archive'];?>"><?php echo 'No'; ?></option>
                                            <?php
                                            }
                                        ?>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                <?php
                                }
                            ?>

                            <?php
                                if($_SESSION['role'] == 'Admin') { ?>
                                    <p>Approve this post:</p><br>
                                    <select name="app">
                                        <?php
                                            if($row['Approved'] == true) { ?>
                                                <option value="<?php $row['Approved'];?>"><?php echo 'Yes'; ?></option>
                                            <?php
                                            }
                                            else { ?>
                                                <option value="<?php $row['Approved'];?>"><?php echo 'No'; ?></option>
                                            <?php
                                            }
                                        ?>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                <?php
                                }
                            ?>

                            <p><input name="submit" type="submit" value="Update" /></p>
                        </form>
            <?php } ?>
            </div>
        </div>

    </main>

    <?php @include "Footer.php"; ?>

</body>
</html>