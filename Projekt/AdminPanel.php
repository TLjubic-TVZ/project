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

    <title>Pokemons - Admin panel</title>
</head>
<body>

    <header>

        <?php @include "Menu.php"; ?>

        <div class="clear"></div>

        <div class="header-text">
            <h3>Catch 'em all</h3>
            <h1>Admin panel</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            
            <img src="Slike/down-arrow (1).png">
        </div>

    </header>


    <main class="register-main">

        <?php @include 'DbConnection.php'; ?>
        
        <div class="form">
            <p>Welcome to Dashboard.</p>

            <?php
                if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Editor' || $_SESSION['role'] == 'User') { ?>
                    <p><a href="NewPost.php">Add new post</a></p>
                <?php
                }
                if($_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Editor') { ?>
                    <p><a href="PostsList.php">View all posts</a></p>
                <?php
                }
                if($_SESSION['role'] == 'Admin') { ?>
                    <p><a href="UsersList.php">View all users</a><p>
                <?php
                }
            ?>

            <p><a href="logout.php">Logout</a></p>

            


        </div>

    </main>

    <?php @include "Footer.php"; ?>

</body>
</html>