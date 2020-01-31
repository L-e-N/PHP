<h2>Detail de la commande</h2>
<?php
$id = $_GET["id"];
$statement = $pdo->query('SELECT nom, prenom, titre, auteur, qte, validee FROM personnes, commandes, ouvrages, lignescmd WHERE commandes.idpersonne=personnes.idpersonne AND commandes.idcmd=lignescmd.idcmd AND ouvrages.idouvrage=lignescmd.idouvrage AND commandes.idcmd='.$id);
$liste_commande = $statement->fetchAll();
?>
<table>
<tr>
<th>Nom</th>
<th>Prenom</th>
<th>Titre</th>
<th>Auteur</th>
<th>qte</th>
<th>validee</th>
</tr>
<?php
  foreach($liste_commande as $commande) {	
    echo "<tr>";	
    echo "<td>".$commande[0]."</td>";
    echo "<td>".$commande[1]."</td>";
    echo "<td>".$commande[2]."</td>";
    echo "<td>".$commande[3]."</td>";
    echo "<td>".$commande[4]."</td>";
    echo "<td>".$commande[5]."</td>";
    echo "</tr>";
  }
?>

<form method="POST">
  <input type="submit" name="delete" value="Supprimer la commande">
  <input type="submit" name="validate" value="Valider la commande">
</form>

<?php
  if(isset($_POST['delete'])){
    echo "delete";
    $pdo->exec('DELETE FROM commandes WHERE idcmd='.$id);
    $pdo->exec('DELETE FROM lignescmd WHERE idcmd='.$id);
    header("Location: ./main.php?page=commandes");
  }

  if(isset($_POST['validate'])){
    echo "validate";
    $pdo->exec('UPDATE commandes SET validee=1 WHERE idcmd='.$id);
    header("Location: ./main.php?page=commandes&id=".$id);
  }
?>
