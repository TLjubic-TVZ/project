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

        <?php @include 'DbConnection.php'; 

            $connection = OpenConnection();

            $sql = "SELECT * FROM `countries`";
            $all_countries = mysqli_query($connection, $sql);

        ?>

        <form action="NewUser.php" method="post">

            <label for="firstname">First name:</label><br>
            <input type="text" name="firstname" id="firstname"><br><br>

            <label for="lastname">Last name:</label><br>
            <input type="text" name="lastname" id="lastname"><br><br>

            <label for="email">E-mail:</label><br>
            <input type="email" name="email" id="email"><br><br>

            <label>Select a country</label>
            <select name="country" id="country">
                <?php 
                    while ($country = mysqli_fetch_array(
                            $all_countries, MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $country["CountryID"];
                        //Primary key
                    ?>">
                        <?php echo $country["Name"];
                            //Country name
                        ?>
                    </option>
                <?php 
                    endwhile; 
                ?>
            </select><br><br>

            <label for="city">City:</label><br>
            <input type="text" name="city" id="city"><br><br>

            <label for="address">Address:</label><br>
            <input type="text" name="address" id="address"><br><br>

            <label for="birth">Birth:</label><br>
            <input type="date" name="birth" id="birth"><br><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password"><br><br>

            <input type="submit" value="Submit">

        </form>

        <?php CloseConnection($connection); ?>

    </main>

    <?php @include "Footer.php"; ?>

</body>
</html>