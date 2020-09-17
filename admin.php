<!--
Permettre via un menu de pouvoir modifier ou supprimer un compte existant de la BDD.
Il faudra d’abord afficher la liste des comptes existants puis en sélectionner
un pour modification ou suppression.
Cette page ne sera accessible que si l’utilisateur est un administrateur authentifié.
-->
<?php 
    include("bdd.php");
    include("classUser.php");
?>
<head>
<link rel="stylesheet" href="styleAdmin.css">    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<nav class="navbar navbar-light bg-light">
    <span class="navbar-brand mb-0 h1">
        <img src="favicon.png" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy"> Espace Administration</span>
</nav>
<div class="container">
    <form action="admin.php" method="POST">
    <!--Boutons-->
    <button type="submit" class="btn btn-primary btn-lg btn-block" name="modif">Modification</button>
    <button type="submit" class="btn btn-secondary btn-lg btn-block" name="delete">Suppression</button>
    <?php 
        $pdo = new user($conn);
        //Modifications
        if(isset($_POST['modif'])){
            $compteurUser = $pdo->compteurUsers();  
            $selecUser = $pdo->selecUsers();
            ?>
        <!--Liste déroulante des utilisateurs-->
        <select nom="userChoice" size="1">
            <h2>Liste des utilisateurs</h2>
            <?php
            for($i = 0; $i < $compteurUser[0]; $i++){
                echo "<option>$selecUser[$i]";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-secondary btn-lg btn-block" name="modifSuite">Continuer Modifications</button>
        <?              
        }else{
            echo "Aucune manipulation effectuee";
        }
        $retour  = $pdo->modificationUser($_SESSION['username'],$_SESSION['password'],$usermodif,$passwordmodif);
       

        //$retour2 = $pdo->deleteUser($id_user);
    ?>
    <!-- DELETE FROM `user` where -> user selectionné-->
    </form>
</div>
<?php
/*
menu déroulant qui affiche tous les comptes la modifier ou supprimer
*/