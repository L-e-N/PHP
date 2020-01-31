<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=devweb','devweb','devweb');
} catch (PDOException $e) {
	$msg = 'ERREUR PDO';
	die($msg);
}
?>
session_start();

