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

    <title>Pokemons</title>
</head>
<body>

    <header>

        <?php @include "Menu.php"; ?>

        <!--
        <nav>
            <div class="logo">
                <img src="Slike/Logo-pokemon.png">
            </div>

            <div class="navigation-list">
                <ul>
                    <li><a href="Index.html">Home</a></li>
                    <li><a href="News.html">News</a></li>
                    <li><a href="Contact.html">Contact</a></li>
                    <li><a href="About.html">About</a></li>
                    <li><a href="Gallery.html">Gallery</a></li>
                </ul>
            </div>

        </nav>
        -->

        <div class="clear"></div>

        <div class="header-text">
            <h3>Catch 'em all</h3>

            <?php

                //Homepage
                if (!isset($_GET['menu']) || $_GET['menu'] == 'Home') {
            ?>
                <h1>Prepare for the <span class="red-bold">first</span> strike</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <?php
                }

                //News
                else if ($_GET['menu'] == 'News') {
             ?>
                <h1>Read all <span class="red-bold">news</span></h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <?php
                }

                //Contact
                else if ($_GET['menu'] == 'Contact') {
            ?>
                <h1><span class="red-bold">Contact</span> us</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <?php
                }

                //About
                else if ($_GET['menu'] == 'About') {
            ?>
                <h1>Find out more<span class="red-bold"> About</span> us</h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <?php
                }

                //Gallery
                else if ($_GET['menu'] == 'Gallery') {
            ?>
                <h1>Check our<span class="red-bold"> Gallery</span></h1>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
            <?php
                } 
            ?>
            
            <img src="Slike/down-arrow (1).png">
        </div>

    </header>


    <main>
        <?php 

            //Homepage.php
            if (!isset($_GET['menu']) || $_GET['menu'] == 'Home') { include("Homepage.php"); }

            //News.php
            else if ($_GET['menu'] == 'News') { include("News.php"); }

            //Contact.php
            else if ($_GET['menu'] == 'Contact') { include("Contact.php"); }

            //About.php
            else if ($_GET['menu'] == 'About') { include("About.php"); }

            //Gallery.php
            else if ($_GET['menu'] == 'Gallery') { include("Gallery.php"); }

        ?>
    </main>


    <?php @include "Footer.php"; ?>

    <!--
    <footer>
        <div>
            <h5>Copyright © 2021. Tomislav Ljubić</h5>
            <a href="https://github.com/TLjubic-TVZ"><i class="fa fa-github"></i></a>
            <div class="clear"></div>
        </div>
    </footer>
    -->
    
</body>
</html>