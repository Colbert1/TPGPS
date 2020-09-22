<?php 
    include("classUser.php");
    include("classGPS.php"); ?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="TPGPS" value="notranslate">
    <!--A revenir dessus-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styleAdmin.css"> 
    <title>Admin</title>
</head>
    <body>
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1">
                <img src="favicon.png" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy"> Espace Administration</span>
        </nav>
    <div class="container">
        <form action="admin.php" method="POST">
        <!--Boutons-->
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="modif">Modification</button>
            <button type="submit" class="btn btn-secondary btn-lg btn-block" name="delete">Suppression</button>
            <button type="submit" class="btn btn-secondary btn-lg btn-block" name="disconnect"><a href="index.php">Deconnexion</a></button>
        <?php 
            $pdo = new user($conn);
            //Modifications
            if(isset($_POST['modif'])){
                $compteurUser = $pdo->compteurUsers();  
                $selecUser = $pdo->selecUsers();
        ?>
            <!--Liste déroulante des utilisateurs-->
            <select size="1">
                <h2>Liste des utilisateurs</h2>
        <?php
                for($i = 0; $i < $compteurUser[0]; $i++){
                    echo "<option name='userI'>$selecUser[$i]";
                }
        ?>
            </select>
            <form action="modifDelete.php" method="POST">
                <button type="submit" class="btn btn-secondary btn-lg btn-block" name="modifSuite">Continuer Modifications</button>
            </form>
        <?php              
            }elseif(isset($_POST['disconnect'])){
                session_destroy();
            }else{
                echo "Aucune manipulation effectuee";
            }
            $retour = $pdo->modificationUser($_SESSION['username'],$_SESSION['password'],$usermodif,$passwordmodif);
        

            //$retour2 = $pdo->deleteUser($id_user);
        ?>
        
        <!-- DELETE FROM `user` where -> user selectionné-->
        </form>
    </div>
    </body>
</html>