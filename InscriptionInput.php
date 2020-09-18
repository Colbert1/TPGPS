<?php
session_start();
include("bdd.php");
include("classUser.php");

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'projet_GPS';
    $db_host     = '192.168.64.204';

$pdo = new user($conn);
    
    $username   = $_POST['username']; 
    $password   = $_POST['password'];
    $prenom     = $_POST['prenom'];
    $nom        = $_POST['nom'];
    $mail       = $_POST['mail'];

    $inscription = $pdo->inscriptionUser($username,$password,$prenom,$nom,$mail);
    echo $inscription;
    ?><a href="index.php">Retourner a l'accueil</a><?php
}else{
   
}

session_destroy(); // fermer la connexion
?>