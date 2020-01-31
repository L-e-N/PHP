<!DOCTYPE html>
<?php 
session_start();
?>
<html>
	<head>
		<title> Page de login </title>
	</head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<?php
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=devweb','devweb','devweb');
	} catch (PDOException $e) {
		$msg = 'ERREUR PDO';
		die($msg);
	}
	?>
	<body>
		<form method="POST">
			<h3> Connectez vous ou créez un compte </h3>
		<h4> Nom </h4>
		Nom&nbsp;: <input type="text" size="20" name="nom" />
		<h4> Prenom </h4>
		Prenom&nbsp;: <input type="text" size="20" name="prenom" />
		<h4> Mot de passe </h4>
		Mot de passe&nbsp;: <input type="text" size="20" name="password" />
		<h4> Adresse </h4>
		Adresse&nbsp;: <input type="text" size="20" name="adresse" />
		</br>
		</br>
		<input type="submit" name="submit" value="Se connecter" />
		<input type="submit" name="submit" value="Creer un utilisateur" />
	<?php 	
	echo "php start ";
	if (isset($_POST['submit'])) {
		echo $_POST['submit'];
		echo $_POST['nom'];
		echo $_POST['password'];
		if ($_POST['submit']=="Se connecter") {
			echo 'in';
			$statement=$pdo->query('
			SELECT COUNT(*) 
			FROM personnes  
			WHERE nom=\''.$_POST['nom'].'\' 
			AND prenom=\''.$_POST['prenom'].'\' 
			AND password=\''.$_POST['password'].'\'' );
			$arrayResultat=$statement->fetch();
			print_r($arrayResultat);
			if ($arrayResultat[0]>=1){
				echo "connecté";
				$statement=$pdo->query('
				SELECT libraire
				FROM personnes  
				WHERE nom=\''.$_POST['nom'].'\' 
				AND prenom=\''.$_POST['prenom'].'\' 
				AND password=\''.$_POST['password'].'\'' );
				$arrayResultat=$statement->fetch();
				$_SESSION['libraire'] = $arrayResultat[0];
				$statement=$pdo->query('
				SELECT idpersonne
				FROM personnes  
				WHERE nom=\''.$_POST['nom'].'\' 
				AND prenom=\''.$_POST['prenom'].'\' 
				AND password=\''.$_POST['password'].'\'' );
				$arrayResultat=$statement->fetch();
				$_SESSION['idpersonne'] = $arrayResultat[0];
				header("Location:./main.php");
			} else {
				echo "mauvaise combinaison login/mot de passe";
			}
		} elseif ($_POST['submit']=="Creer un utilisateur") {
			echo 'creer user';
			$rowCount=$pdo->exec('
			INSERT INTO personnes(nom, prenom, adresse, password, libraire) values
			(
			\''.$_POST['nom'].'\',
			\''.$_POST['prenom'].'\',
			\''.$_POST['adresse'].'\',
			\''.$_POST['password'].'\',
			0);');
		       echo 'utilisateur créé';	
	}
	
	}
?>
	</body>

</html>
