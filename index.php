<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="TPGPS" value="notranslate">
    <!--A revenir dessus-->
    <link rel="icon" type="image/x-icon" href="favicon.ico"/>
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
        <form action="verification.php" method="POST">
            <h1>Identification</h1>

            <p>Nom d'utilisateur :</p>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>    
            <p>Mot de passe :</p>
            <input type="text" placeholder="Entrer le mot de passe" name="password" required>
            <input type="submit" id="submit" value='LOGIN'>
        </form>
    </div>
    <!--Footer-->
    <div>
    </div>
</body>
</html>