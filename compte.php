<!-- acces a mon compte utilisateur -->
<!DOCTYPE HTML>
<html lang="fr">

<head>
  <link rel="stylesheet" href="styleMenu.css">
  <?php 
    session_start();
    include("bdd.php");
    include("classUser.php");
    include("classGPS.php"); ?>
</head>

<body>
  <!-- Ajouter le profile utilisateur pour pouvoir modifier son mot de passe -->

  <div class="card">
    <h1>Profile :</h1>
    <!-- fonction afficheUser prete-->
    <?php 
      $afficheU = afficheUser($username, $password, $surname, $name, $mail, $admin,$id);
      echo $afficheU;
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