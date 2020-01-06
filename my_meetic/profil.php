<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://kit.fontawesome.com/edd89dbb4d.js"></script>
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <title>Espace client</title>
</head>
<body>
<div class="menu">
    <a href="profil.php"><button class="button">Compte</button></a>
    <a href="recherche.php"><button class="button">Recherche</button></a>
    <a href="deconnexion.php"><button class="button">Déconnexion</button></a>
</div>
<h1>Bienvenue sur votre espace client</h1>
<i class="fas fa-heartbeat fa-7x"></i>
<div class="profil">
    <p>
        <?php echo $_SESSION['infoUser']['prenom'] ?>
    </p>
    <p>
        <?php echo $_SESSION['infoUser']['nom'] ?>
    </p>
    <p>
        <?php echo $_SESSION['infoUser']['sexe'] ?>
    </p>
    <p>
        <?php echo 2019 - substr($_SESSION['infoUser']['date_de_naissance'],0,4) . " ans." ?>
    </p>
    <p>
        <?php echo $_SESSION['infoUser']['ville'] ?>
    </p>
    <p>
        <?php echo $_SESSION['infoUser']['email'] ?>
    </p>
</div>
<i class="far fa-kiss-wink-heart fa-7x"></i>
</body>
</html>
