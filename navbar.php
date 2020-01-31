<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Main Page</title>

</head>

<body>
  
  <?php if ($_SESSION['libraire']==1) : ?>
  <a href="./main.php?page=clients">Page de la liste de clients</a></br>
  <?php endif ?>
  <a href="./main.php?page=ouvrages">Page de la liste des ouvrages</a></br>
  <a href="./main.php?page=commandes">Page de la liste des commandes</a></br>

  <form method="POST">
    <input type="submit" name="deconnexion" value="deconnexion">
  </form>

<?php
  if(isset($_POST['deconnexion'])){
    echo "deconnexion";
    session_destroy();
    header("Location: ./login.php");
  }

?>
</body>
</html>
