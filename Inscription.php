<?php 
include("header.php");
?>
<link rel="stylesheet" href="styleInscription.css">
    <title>Inscription</title>
</head>
<body>
    <!--Header-->
    <div>
    </div>
    <!--Corps-->
    <div id="container">
        <!--Formulaire de connexion-->
        <form action="InscriptionInput.php" method="POST">
            <h1>Inscription</h1>

            <p>Nom d'utilisateur :</p>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>    
            <p>Mot de passe :</p>
            <input type="text" placeholder="Entrer le mot de passe" name="password" required>
            <p>Prenom :</p>
            <input type="text" placeholder="Entrer le prenom" name="prenom" required>
            <p>Nom :</p>
            <input type="text" placeholder="Entrer le nom" name="nom" required>
            <p>Mail :</p>
            <input type="text" placeholder="Entrer le mail" name="mail" required>
            <input type="submit" id="submit" value='INSCRIPTION'>
        </form>
    </div>
    <!--Footer-->
    <div>
    </div>
</body>
</html>