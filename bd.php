<?php
// creation de la base des données
try {


$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=casalindinfo', $username, $password );
	
} catch (PDOException $e) {
	die("Impossible de se connecter à la base des données ".$e->getMessage());
}

?>