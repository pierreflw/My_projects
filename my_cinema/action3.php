<?php
include ('control.php');

$nom = $_POST['member'];
$member = explode(" ", $nom);
$nom = $member[0];
if(count($member) > 1)
    $prenom = $member[1];


$member = "SELECT * FROM fiche_personne WHERE nom = '$nom' OR prenom = '$nom' OR nom = '$prenom' OR prenom = '$prenom'";

if($_POST['member'] == ""){
    die("Veuillez remplir le champ !");
}

$rep = $bdd->query($member);

while ($result = $rep->fetch()) {
        echo $result['prenom'] . " " . $result['nom'] . "<br>";
    }




