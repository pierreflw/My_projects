<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link  href="style1.css" rel="stylesheet"  type="text/css">
    <title>Member</title>
</head>
<body>
<div class="container">
    <div class="stripe1">
        <img src="images/social.png" alt="social">
        <div class="menu">
            <a href="index.php">Accueil</a>
            <a href="get_date.php">Dates de projection</a>
        </div>
    </div>
    <img src="images/logo.png" alt="logo cinéma" id="img">
    <div class="stripe2"
<div class="form">
<form action="" method="post">
    <input type="text" id="member1" name="member" placeholder="Veuillez rentrer votre nom">
    <input class="sub" type="submit" value="Rechercher">
</form>
    <div class="insert2">
        <?php
        include('action3.php')
        ?>
    </div>
</div>
</body>
</html>


