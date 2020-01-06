<?php
class db {
    public $bdd;
    public function __construct(){
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=my_meetic','root', 'root');
            $this->bdd=$bdd;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
    function getDb(){
        return $this->bdd;
    }
}