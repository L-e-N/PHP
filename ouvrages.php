<h2>Page de la liste des ouvrages</h2>
<?php
  $statement = $pdo->query('SELECT titre, auteur, prix FROM ouvrages');
  $liste_ouvrage = $statement->fetchAll();
?>
<table>
<tr>
<th>Company</th>
<th>Contact</th>
<th>Country</th>
</tr>
<?php
  foreach($liste_ouvrage as $ouvrage) {	
    echo "<tr>";	
    echo "<td>".$ouvrage[0]."</td>";
    echo "<td>".$ouvrage[1]."</td>";
    echo "<td>".$ouvrage[2]."</td>";
    echo "</tr>";
}
?>

