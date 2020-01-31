<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Main Page</title>

</head>

<body>
  <h1>Bienvenue sur notre plateforme</h1>
  <?php 
    include "./navbar.php";
  ?>
  <?php 
    $page = $_GET["page"];
    if($page == "ouvrages"){
      include "./ouvrages.php";
    } elseif($page == "clients") {
      include "./clients.php";
    } else {
      include "./commandes.php";
    }
  ?>
</body>
</html>
