<!-- acces a mon compte utilisateur -->
<!DOCTYPE HTML>
<html lang="fr">

<head>
  <link rel="stylesheet" href="styleMenu.css">
  <?php include("classUser.php"); ?>
  <?php include("classGPS.php"); ?>
</head>

<body>
  <!-- Ajouter le profile utilisateur pour pouvoir modifier son mot de passe -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <div class="card">
    <h1>Profile :</h1>
    <!-- fonction afficheUser prete-->
    <p><?php echo $username ?></p>
    <p><?php echo $name ?></p>
    <p><?php echo $surname ?></p>
    <p><?php echo $mail ?></p>
    <p><?php echo $password ?></p>
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
      <ul class="aside-list">
        <li><a href="compte.php" class="aside-anchor">Acces a mon compte</a></li>
        <li><a href="trace.php" class="aside-anchor">Position des bateaux</a></li>
        <li><a href="admin.php" class="aside-anchor">Acces administrateur</a></li>
        <li><a href="index.php" class="aside-anchor">Deconnexion</a></li>
      </ul>
    </div>
  </aside>
</body>

</html>

<!-- SELECT * FROM `user` -->
<!-- afficher les infos du compte -->