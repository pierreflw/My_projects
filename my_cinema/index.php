<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link  href="style.css" rel="stylesheet"  type="text/css">
    <?php include('control.php'); ?>
    <title>my_cinema</title>
</head>
<body>
<div class="content">

    <div class="stripe">
        <img src="images/social.png" alt="social">
        <div class="menu">
        <a href="member.php">Membres</a>
            <a href="get_date.php">Dates de projection</a>
        </div>
    </div>
    <img src="images/logo.png" alt="logo cinéma">
    <h1>Bienvenue sur my_cinema !</h1>
    <div class="navBar">
        <form action="index.php" method="post">

            <label for="name">Nom </label>
            <input placeholder="Nom du film" type="text" id="name" name="titre">

            <label for="genre">genre </label>
            <select name="genre" id="genre">
                <option value="default">default</option>
                <?php
                include ('action1.php')
                ?>
            </select>

            <label for="distrib">distrib </label>

            <select name="distrib" id="distrib">
                <option value="default">default</option>
                <?php
                include ('action2.php')
                ?>
            </select>

            <input class="sub" type="submit" value="Rechercher">

        </form>
    </div>
</div>
<div class="insert">
    <?php include ('action.php') ?>
</div>
</body>
</html>
