<?php

    //Db connection 
    @include "DbConnection.php"; 

    $connection = OpenConnection();

    $firstname = $_REQUEST['firstname'];
    $lastname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $country = $_REQUEST['country'];
    $city = $_REQUEST['city'];
    $address = $_REQUEST['address'];
    $birth = $_REQUEST['birth'];
    $password = $_REQUEST['password'];
    $role = 'Visitor';

    $hashPassword = password_hash($password, 
          PASSWORD_DEFAULT);

    $sqlUser = "SELECT * FROM `users`";
    $all_users = mysqli_query($connection, $sqlUser);

    function checkNewUsername($newname, $all) {
        
        while ($user = mysqli_fetch_array(
            $all, MYSQLI_ASSOC)):; 
        
            if($user['Username'] == $newname) {
                return 1;
            }
        
        endwhile; 
        return 0;
    }

    $username = substr($firstname, 0, 1) . $lastname;

    if (checkNewUsername($username, $all_users) == 1) {

        while (1):; 
        
            //Generate new number
            $number = rand(0, 100);
            //Concate
            $usernameNew = $username . $number;
            //Check new name
            if (checkNewUsername($usernameNew, $all_users) == 0) {
                $username = $usernameNew;
                break;
            }
            
        endwhile; 
    }
    
    $sql = "INSERT INTO users (FirstName, LastName, Email, CountryID, City, Adress, Birth, Password, Username, Role)
    VALUES('$firstname', '$lastname', '$email', '$country', '$city', '$address', '$birth', '$hashPassword', '$username', '$role')";

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

            <title>Pokemons - Register</title>
        </head>
        <body>

        <header>

            <?php @include "Menu.php"; ?>

            <div class="clear"></div>

            <div class="header-text">
                <h3>Catch 'em all</h3>
                <h1>Register</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                
                <img src="Slike/down-arrow (1).png">
            </div>

        </header>


        <main class="register-main">

            <?php

                if(mysqli_query($connection, $sql)){
                    echo "<h3>Nicely done! I can see a new member. <br><br>
                    Your username is: $username. <br><br>
                    Keep rolling $username!<br>
                    Need to login to continue - please go to login page."; 

                } else{
                    echo "ERROR: Hush! Sorry $sql. " 
                        . mysqli_error($connection);
                }
            ?>

        </main>

        <?php @include "Footer.php"; ?>

        </body>

    <?php

    closeConnection($connection);

?>