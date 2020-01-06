<?php
include ('control.php');

$query = "SELECT * FROM film WHERE titre LIKE '%" . $_POST['titre'] . "%'";

if ($_POST['genre'] == "default" && $_POST['distrib'] == "default" && $_POST['titre'] == "")
{
   die("Veuillez remplir le champ !");
}
if ($_POST['genre'] != "default")
{
    $query .= " AND id_genre = '". $_POST['genre'] ."'";
}

if ($_POST['distrib'] != "default")
{
     $query .= " AND id_distrib = '". $_POST['distrib'] ."'";
}


$rep = $bdd->query($query);

while($result = $rep->fetch()){
    echo $result['titre'] . '<br>' ."Sorti en " . $result['annee_prod']. '<br><br>' ."Synopsis : " . $result['resum'] . '<br><br><br>';
}









