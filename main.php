<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Main Page</title>
  <?php
    include "./init.php"
  ?>
  <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
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
    } elseif($page == "commandes") {
      include "./commandes.php";
    } else {
      include "./detail.php";
    }
  ?>
</body>
</html>
