<h2>Liste des clients</h2>
<?php
$statement = $pdo->query('SELECT nom, prenom FROM personnes WHERE libraire=0');
$liste_client = $statement->fetchAll();
?>
<table>
<tr>
<th>Nom</th>
<th>Prenom</th>
</tr>
<?php
  foreach($liste_client as $client) {	
    echo "<tr>";	
    echo "<td>".$client[0]."</td>";
    echo "<td>".$client[1]."</td>";
    echo "</tr>";
  }
?>
