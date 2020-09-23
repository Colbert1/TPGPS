<?php
session_start();
include("classUser.php");
include("classGPS.php"); ?>
<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8">  
    <!--A revenir dessus-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styleAdmin.css">
    <title>Admin</title>
</head>

<body>
    <?php 
    $sessionLogin = $_SESSION['username'];
    if (isset($sessionLogin)) {?>
    <nav class="navbar navbar-light bg-light">
        <span class="navbar-brand mb-0 h1">
            <img src="favicon.png" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy"> Espace Administration</span>
    </nav>
    <div class="container">
        <form action="admin.php" method="POST">
            <!--Boutons-->
            <button type="submit" class="btn btn-primary btn-lg btn-block" name="modif">Modification</button>
            <?php
            $pdo = new user($conn);
            //Modifications
            if (isset($_POST['modif'])) {
                $compteurUser   = $pdo->compteurUsers();
                $selecUser      = $pdo->selecUsers();

                //Liste déroulante des utilisateurs
                echo "<select size='1'>
                        <h2>Liste des utilisateurs</h2>";

                for ($i = 0; $i < $compteurUser[0]; $i++) {
                    echo "<option name='userI'>$selecUser[$i]";
                }
                echo "
                        </select>
                        <form action='admin.php' method='POST'>
                            <p>Nouveau login :</p>
                            <input type='text' placeholder='Entrer le nouveau login' name='usermodif' required>

                            <p>Nouveau mot de passe :</p>
                            <input type='text' placeholder='Entrer le nouveau mot de passe' name='passwordmodif' required>

                            <p>Nouvelle adresse mail :</p>
                            <input type='text' placeholder='Entrer la nouvelle adresse mail' name='mailmodif' required>

                            <button type='submit' class='btn btn-secondary btn-lg btn-block'>Continuer Modifications</button>
                        </form>";
                
            } else {
                echo "Aucune manipulation effectuee";
            }
            if ($_POST['usermodif'] != "" && $_POST['passwordmodif'] != "" && $_POST['mailmodif'] != "") {
                $usermodif      = $_POST['usermodif'];
                $passwordmodif  = $_POST['passwordmodif'];
                $mailmodif      = $_POST['mailmodif'];
                echo $_POST['userI'];
                $retour = $pdo->modificationUser($_POST['userI'], $mailmodif, $usermodif, $passwordmodif);
            }
            ?>

            <button type="submit" class="btn btn-warning btn-lg btn-block" name="delete">Suppression</button>
            <button type="submit" class="btn btn-danger btn-lg btn-block" name="disconnect"><a href="index.php" name="disconnect">Deconnexion</a></button>

            <!-- DELETE FROM `user` where -> user selectionné-->
        </form>
    </div>
        <?php } ?>
</body>

</html>