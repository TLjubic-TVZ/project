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

    <title>Pokemons - Users list</title>
</head>
<body>

    <header>

        <?php @include "Menu.php"; ?>

        <div class="clear"></div>

        <div class="header-text">
            <h3>Catch 'em all</h3>
            <h1>Users list</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            
            <img src="Slike/down-arrow (1).png">
        </div>

    </header>


    <main class="register-main">

        <div class="form">
            <h2>List of users</h2>
            <table width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>No.</strong></th>
                        <th><strong>Username</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Role</strong></th>
                        <th><strong>Edit</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $count=1;

                        include "DbConnection.php";

                        $con = OpenConnection();

                        $sql="Select * from users";
                        $result = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td align="center"><?php echo $count; ?></td>
                            <td align="center"><?php echo $row["Username"]; ?></td>
                            <td align="center"><?php echo $row["Email"]; ?></td>
                            <td align="center"><?php echo $row["Role"]; ?></td>
                            <td align="center">
                            <a href="Edit.php?id=<?php echo $row["UserID"]; ?>">Edit</a>
                            </td>
                            <td align="center">
                            <a href="delete.php?id=<?php echo $row["UserID"]; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php $count++; } ?>
                </tbody>
            </table>
        </div>

    </main>

    <?php @include "Footer.php"; ?>

</body>
</html>