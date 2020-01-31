<h2>Page de la liste des ouvrages</h2>
<?php
  $idpersonne = $_SESSION['idpersonne'];
  $isLibraire = $_SESSION['libraire'];

  $statement = $pdo->query('SELECT titre, auteur, prix, idouvrage FROM ouvrages');
  $liste_ouvrage = $statement->fetchAll();
?>
<form method="POST">
<table>
<tr>
<th>Titre</th>
<th>Auteur</th>
<th>Prix</th>
<?php if(!$isLibraire): ?>
<th>Qté</th>
<?php endif ?>
</tr>
<?php
  foreach($liste_ouvrage as $ouvrage) {	
    $idouvrage = $ouvrage[3];
    echo "<tr>";	
    echo "<td>".$ouvrage[0]."</td>";
    echo "<td>".$ouvrage[1]."</td>";
    echo "<td>".$ouvrage[2]."</td>";
    if(!$isLibraire) {
      echo "<td><input type='number' name='".$idouvrage."' min='0'></td>";
    }
    echo "</tr>";
}
?>
<?php if(!$isLibraire): ?>
<input type="submit" name="commande" value="Préparer la commande">
<?php endif ?>
<?php
	if(isset($_POST['commande'])){
		
		// Check command not empty
		$notEmpty = false;
		foreach($_POST as $key => $value)
		{
		    if($key != 'commande' and $value != 0){
		      $notEmpty = true;
		    }
		}
		
		if($notEmpty){
			$pdo->exec('
			INSERT INTO commandes(idpersonne, validee) values
			(
			'.$idpersonne.',
			0);');
	
			$idcmd = $pdo->lastInsertId();

			foreach($_POST as $key => $value)
			{
			    if($key != 'commande' and $value != 0){
			      $pdo->exec('
				INSERT INTO lignescmd(idcmd, idouvrage, qte) values
				(
				'.$idcmd.',
				'.$key.',
				'.$value.');');
			    }
			}

	    		header("Location: ./main.php?page=commandes");
		}
 	}
?>
