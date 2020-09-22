<!-- acces a mon compte utilisateur -->
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

  <link rel="stylesheet" href="styleMenu.css">

</head>

<body>
  <!-- Ajouter le profile utilisateur pour pouvoir modifier son mot de passe -->

  <div class="card">
    <h1>Profile :</h1>
    <!-- fonction afficheUser prete-->
    <?php
    echo $_SESSION['username'];
    $afficheUser = $pdo->afficheUser($username, $password, $surname, $name, $mail, $admin, $id);
    echo $afficheUser;
    ?>
  </div>

  <input type="checkbox" id="myInput">
  <label for="myInput">
    <span class="bar top"></span>
    <span class="bar middle"></span>
    <span class="bar bottom"></span>
  </label>
  <aside>
    <div class="aside-section aside-left">
      <div class="aside-content">
        <p>Projet GPS</p>
        <button class="button">Accueil</button>
      </div>
    </div>
    <!-- Menu -->
    <div class="aside-section aside-right">

      <form action="disconnect.php" class="aside-list" method="POST">
        <li><a href="compte.php" class="aside-anchor">Acces a mon compte</a></li>
        <li><a href="trace.php" class="aside-anchor">Position des bateaux</a></li>
        <li><a href="admin.php" class="aside-anchor">Acces administrateur</a></li>
        <li><button type="submit" class="btn btn-secondary btn-lg btn-block" name="disconnect">Deconnexion</button>
          <a href="index.php" class="aside-anchor">Deconnexion</a></li>
      </form>
    </div>
  </aside>
</body>

</html>

<!-- SELECT * FROM `user` -->
<!-- afficher les infos du compte -->