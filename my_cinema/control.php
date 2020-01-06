<?php
$dsn = 'mysql:dbname=epitech_tp;host=127.0.0.1';
$user = 'root';
$password = 'root';

try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    die( 'Connexion impossible : ' . $e->getMessage());
}

