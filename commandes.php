<h2>Liste des commandes</h2>
<?php
$statement = $pdo->query('SELECT nom, prenom, titre, auteur, qte, validee, commandes.idcmd FROM personnes, commandes, ouvrages, lignescmd WHERE commandes.idpersonne=personnes.idpersonne AND commandes.idcmd=lignescmd.idcmd AND ouvrages.idouvrage=lignescmd.idouvrage');
$liste_commande = $statement->fetchAll();
?>
<table>
<tr>
<th>Nom</th>
<th>Prenom</th>
<th>Titre</th>
<th>Auteur</th>
<th>Qte</th>
<th>Validee</th>
<th>Détail</th>
</tr>
<?php
  foreach($liste_commande as $commande) {	
    $id = $commande[6];
    echo "<tr>";	
    echo "<td>".$commande[0]."</td>";
    echo "<td>".$commande[1]."</td>";
    echo "<td>".$commande[2]."</td>";
    echo "<td>".$commande[3]."</td>";
    echo "<td>".$commande[4]."</td>";
    echo "<td>".$commande[5]."</td>";
    echo "<td><a href='./main.php?page=detail&id=".$id."'>Détail</a></td>";
    echo "</tr>";
  }
?>
