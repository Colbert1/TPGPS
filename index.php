<?php
include("classUser.php");
include("bdd.php"); ?>
<!DOCTYPE HTML>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <!--A revenir dessus-->
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styleIndex.css">
    <title>Index</title>
</head>

<body>
    <!--Header-->
    <div>
    </div>
    <!--Corps-->
    <div id="container">
        <!--Formulaire de connexion-->
        <form action="index.php" method="POST">
            <h1>Identification</h1>

            <p>Nom d'utilisateur :</p>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
            <p>Mot de passe :</p>
            <input type="text" placeholder="Entrer le mot de passe" name="password" required>
            <input type="submit" id="submit" value='LOGIN'>
            <button onclick="window.location.href = 'Inscription.php';">INSCRIPTION</button>

        </form>

    </div>
    <!--Footer-->
    <div>
    </div>
</body>

</html>

<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'projet_GPS';
    $db_host     = '192.168.64.204';

    $pdo = new user($conn);

    $username = $_POST['username'];
    $password = $_POST['password'];

    $autorisation = $pdo->autorisation($username, $password);
    if ($autorisation == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }
}

 // fermer la connexion