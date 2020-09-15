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

    $conn = new user($_POST["username"],$_POST["password"]);
    $conn = connectBDD($db_host,$db_name,$db_username,$db_password);
    
    $username = $_POST['username']; 
    $password = $_POST['password'];

    
    
    if($username !== "" && $password !== "")
    {
        $sql = $conn->query("SELECT count(*) FROM user where us_user = '".$username."' and us_password = '".$password."' ");
        $exec_requete = query($conn,$requete);
        $reponse      = fetch($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>