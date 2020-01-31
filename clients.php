<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Clients Page</title>

</head>

<body>
  <h2>Liste des clients</h2>

  <?php
    $liste_client = array("Arthur", "Basile", "Paul");
    foreach($liste_client as $client) {
      echo "$client <br>";
    }
  ?>
</body>
</html>
