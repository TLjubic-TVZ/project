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

    <title>Pokemons - Login</title>
</head>
<body>

    <header>

        <?php @include "Menu.php"; ?>

        <div class="clear"></div>

        <div class="header-text">
            <h3>Catch 'em all</h3>
            <h1>Login</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            
            <img src="Slike/down-arrow (1).png">
        </div>

    </header>


    <main class="register-main">

        <form action="login.php" method="post">

            <h2>LOGIN</h2>

            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>

            <?php } ?>

            <label>Username</label>

            <input type="text" name="uname" placeholder="Username"><br>

            <label>Password</label>

            <input type="password" name="password" placeholder="Password"><br> 

            <button type="submit">Login</button>

        </form>


    </main>

    <?php @include "Footer.php"; ?>

</body>
</html>

<?php 

session_start(); 

include "DbConnection.php";

$connection = OpenConnection();

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    //password_verify($_POST['password'], $hash);
    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login.php?error=Username is required");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE Username='$uname'";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ((password_verify($pass, $row['Password'])) && ($row['Role'] != 'Visitor' )) {

                echo "Logged in!";

                $_SESSION['Username'] = $uname;

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                $_SESSION['role'] = $row['Role'];

                header("Location: AdminPanel.php");

                exit();

            }else{

                if ($row['Role'] == 'Visitor') {
                    header("Location: login.php?error=Administrator need to approve this account");
                }
                else {
                    header("Location: login.php?error=Incorect Username or password");
                }
                
                exit();

            }

        }else{

            if ($row['Role'] == 'Visitor') {
                header("Location: login.php?error=Administrator need to approve this account");
            }
            else {
                header("Location: login.php?error=Incorect Username or password");
            }

            exit();

        }

    }

}