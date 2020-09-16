<?php
session_start();
include("bdd.php");
include("classUser.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'projet_GPS';
    $db_host     = '192.168.64.204';

$pdo = new user($conn);
    
    $username = $_POST['username']; 
    $password = $_POST['password'];

    $autorisation = $pdo->Autorisation($username,$password);
    }else{
   header('Location: login.php');
}

session_destroy(); // fermer la connexion
?>