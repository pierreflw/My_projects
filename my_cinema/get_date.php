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
            <a href="member.php">Membres</a>
        </div>
    </div>
    <img src="images/logo.png" alt="logo cinéma" id="img">
    <div class="stripe2"
<div class="form">
<form action="get_date.php" method="post">
    <label for="date">Date de projection<span>&#8594</span></label>
    <input type="date" id="date" name="date1">
    <input class="sub" type="submit" value="Rechercher">
</form>
    <div class="insert2">
        <?php
        include('date.php')
        ?>
    </div>
</div>
</body>
</html>






