<?php
    session_start();
?>

<nav>
    <div class="logo">
        <img src="Slike/Logo-pokemon.png">
    </div>

    <div class="navigation-list">
        <ul>
            <li><a href="Index.php?menu=Home">Home</a></li>
            <li><a href="Index.php?menu=News">News</a></li>
            <li><a href="Index.php?menu=Contact">Contact</a></li>
            <li><a href="Index.php?menu=About">About</a></li>
            <li><a href="Index.php?menu=Gallery">Gallery</a></li>
            
            <?php  
                if($_SESSION['Username'] == NULL){
            ?>
                    <li><a href="Login.php">Login</a></li>
                    <li><a href="Register.php">Register</a></li>      
            <?php
                }
                else {
            ?>
                    <li><a href="AdminPanel.php">Sučelje</a></li>
            <?php 
                }
            ?>

        </ul>
    </div>

</nav>


