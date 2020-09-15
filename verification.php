<?php
session_start();
include("classUser.php");

if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = '';
    $db_password = '';
    $db_name     = '';
    $db_host     = 'localhost';

    $pdo = new user($_POST["username"],$_POST["password"]);
    $conn = $pdo->connectBDD($db_host,$db_name,$db_username,$db_password);
    
    $username = $_POST['username']; 
    $password = $_POST['password'];

}else{
   header('Location: login.php');
}
session_destroy(); // fermer la connexion
?>