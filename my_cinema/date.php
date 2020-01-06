<?php

include ('control.php');
$date = $_POST['date1'];
$query = "SELECT * FROM film WHERE '$date' BETWEEN date_debut_affiche AND date_fin_affiche";

if ($date == NULL)
    die('veuillez renseigner une date');

if($date != NULL){
    $rep = $bdd->query($query);
}
while($result = $rep->fetch()) {
    echo $result['titre'] .'<br>';
    }
