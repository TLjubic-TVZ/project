<?php

    session_start();

    //Db connection 
    @include "DbConnection.php"; 

    $connection = OpenConnection();

    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $date = date("Y/m/d");
    $archive = false;
    $approved = false;

    if($_SESSION['role'] != 'User') {
        $approved = true;
    }
 
    $sql = "INSERT INTO news (Title, Content, DatePost, Archive, Approved)
    VALUES('$title', '$content', '$date', '$archive', '$approved')";

    ?>
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

            <title>Pokemons - New post</title>
        </head>
        <body>

        <header>

            <?php @include "Menu.php"; ?>

            <div class="clear"></div>

            <div class="header-text">
                <h3>Catch 'em all</h3>
                <h1>New post</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                
                <img src="Slike/down-arrow (1).png">
            </div>

        </header>


        <main class="register-main">

            <?php

                if(mysqli_query($connection, $sql)){
                    echo "<h3>Nicely done! New post added. <br><br>
                    <a href='AdminPanel.php'>Go back to dashboard</a>"; 
                    $last_id = $connection->insert_id;
                    if (isset($_POST['upload'])) {
  
                        $filename = $_FILES["uploadfile"]["name"];
                        $tempname = $_FILES["uploadfile"]["tmp_name"];    
                            $folder = "Slike/".$filename;
                      
                            // Get all the submitted data from the form
                            $sqlImage = "INSERT INTO images (Name, NewsID) VALUES ('$filename', '$last_id')";
                      
                            // Execute query
                            mysqli_query($connection, $sqlImage);
                      }

                } else{
                    echo "ERROR: Hush! Sorry, this post has some errors.";
                }

            ?>

        </main>

        <?php @include "Footer.php"; ?>

        </body>

    <?php

    closeConnection($connection);

?>