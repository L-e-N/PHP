<!DOCTYPE html>
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
		<form action="traitement.php" method="POST">
			<h3> Connectez vous ou créez un compte </h3>
		<h4> login </h4>
		login&nbsp;: <input type="text" size="20" name="nom" />
		<h4> Mot de passe </h4>
		mot de passe&nbsp;: <input type="text" size="20" name="nom" />
		</br>
		</br>
		<input type="submit" value="Se connecter" />
		<input type="submit" value="Creer un utilisateur" />
	<?php 	
	echo "php start ";
	if (isset($_POST['submit'])) {
		echo $_POST['submit'];
		if ($_POST['submit']=="Se connecter") {
			echo "se co";}}
	
	$statement = $pdo->query('SELECT * FROM personnes');
 	$arrayResultat = $statement->fetch();
	print_r($arrayResultat); ?>
	</body>

</html>
