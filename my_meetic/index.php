<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/edd89dbb4d.js"></script>
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>My_meetic</title>
</head>
<body>

<div class="logo">
<img src="img/logo.png" alt="logo" id="logo1">
</div>
<img src="img/dating.png" alt="dating" id="dating">
<i class="fas fa-heartbeat fa-7x"></i>
<div class="container">
    <form class="contact" action="inscription.php" method="post">
        <h3>Formulaire d'inscription</h3>

        <h4>Veuillez le remplir pour accèder au site</h4>

        <input placeholder="Ton nom" type="text" name="nom" required>

        <input placeholder="Ton prénom" type="text" name="prenom" required>


       <a>Ton sexe </a>

        <input type="radio" id="man" value="homme" name="sexe">
        <label for="man">Un homme</label>

        <input type="radio" id="girl" value="femme" name="sexe" >
        <label for="girl">Une femme</label>

        <input type="radio" id="autre" value="autre" name="sexe" >
        <label for="autre">Autre</label>


        <input type="date" id="date" name="date" required>

        <input placeholder="Ta ville" type="text" name="ville" required>

        <input placeholder="Ton mail" type="email"  name="mail" required>

        <input placeholder="Ton mot de passe" type="password" id="mdp" name="password" minlength="8" maxlength="14" required>

        <button name="submit" type="submit" id="sub">Submit</button>

    </form>
    <div class="gender">
    <i class="fas fa-venus-mars fa-3x"></i>
    <i class="fas fa-venus-double fa-3x"></i>
    <i class="fas fa-mars-double fa-3x"></i>
    </div>

    <form class="contact" action="connexion.php" method="post">

        <h3>Connexion</h3>

        <h4>Veuillez le remplir pour accèder à ton espace personnel</h4>



        <input placeholder="Ton mail" type="email"  name="mail2" required>

        <input placeholder="Ton mot de passe" type="password" id="mdp" name="password2" minlength="8" maxlength="14" required>

        <button name="login" type="submit" id="sub">Submit</button>

    </form>
</div>







</body>
</html>
