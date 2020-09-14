<?php
session_start();
include("classUser.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'projet_GPS';
    $db_host     = '192.168.64.204';

$pdo = new user($_POST['username'],$_POST['password']);
    $conn = $pdo->connectBDD($db_host,$db_name,$db_username,$db_password);
    
    $username = $_POST['username']; 
    $password = $_POST['password'];

    $pdo->verifConnexion($username,$password,$conn);
}else{
   header('Location: login.php');
}

session_destroy(); // fermer la connexion
?>