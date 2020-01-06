<?php

require_once ('index.php');
include('db.php');

class inscription extends db
{
       public function get_type($nom, $prenom, $sexe, $date, $ville, $mail, $password){
        $password = hash('sha512', $password);
        $new = $this->bdd->prepare("INSERT INTO `info_user` (`nom`, `prenom`, `sexe`, `date_de_naissance`, `ville`, `email`, `password`) VALUES ('$nom', '$prenom', '$sexe', '$date', '$ville', '$mail', '$password')");
        $new->execute();

       }
}
    $connect = new inscription();
    if (isset($_POST['password'])){
        $connect->get_type($_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['date'], $_POST['ville'], $_POST['mail'], $_POST['password']);
    }
?>
