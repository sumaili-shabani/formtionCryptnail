<?php
/*
commentaire multiligne
*/
$nom = "Patrona";

$adresse = "GOMA TMK";
$a = 15;
$b = 20;
$somme = $a+$b;
$age = 13;

// echo("prêt pour debiter le PHP ".$nom);
// echo("la somme de".$a."+".$b.'='.$somme);
/*
$test = ($age >= 18) ? "Majeur" : "Mineur" ;
echo("<h1>l'homme est: ".$test."</h1>")."<br>";
echo("====================")."<br>";

if ($age >= 18) {
	echo("l'homme est: Majeur");
}
else{
	echo("l'homme est: Mineur");
}
*/

/*
$position = "o";

if ($position == "N" || $position =="n") {
	# code...
	echo("C'est le Nord!");
}
elseif ($position == "S" || $position =="s") {
	# code...
	echo("C'est le Sud!");
}
elseif ($position == "E" || $position =="e") {
	# code...
	echo("C'est l'est!");
}
elseif ($position == "O" || $position =="o") {
	# code...
	echo("C'est l'oust!");
}else{
	echo("Desole !!!");
}
*/

/*

$pourcentage = 73;
$echec = 1;
if ($pourcentage ==1 || $pourcentage <=49) {
	# code...
	echo("Ajourné");
}
elseif ($pourcentage ==50 || $pourcentage <=69 ) {
	# code...
	if ($echec <= 2) {
		# code...
		echo("Mention S");
	}
	else{
		echo("Mention AA");
	}
	
}
elseif ($pourcentage ==70 || $pourcentage <=79 ) {
	# code...
	if ($echec <= 2) {
		# code...
		echo("Mention D");
	}
	else{
		echo("Mention AA");
	}
	
}
else{
echo("Boom");
}

*/

// for ($i=0; $i <=10 ; $i++) { 
// 	# code...
// 	echo($i)."<br>";
// }

$i = 0;
// while ($i <= 10) {

// 	# code...
// 	echo($i)."<br>";
// 	$i++;
// }

// do{
// 	echo($i)."<br>";
// 	$i++;
// }while($i <= 10);

// $tab = ["Patrona", "Cedrick","VB","Benjamin","Jaspe","Gloire le geek","Le DSI de comando"];
// for ($i=0; $i < 7; $i++) { 
// 	# code...
// 	echo($tab[$i])."<br>";

// }

$cours = array(
	"nom" 	=> "SQL",
	"Ponderation" 	=> "50",
	"Niveau" 	=> "Debitant",
);

foreach ($cours as $key => $value) {
	# code...
	echo($key.": ".$value)."<br>";
}


function getMessage($heure)
{
	$message='';
	if ($heure > 13) {
		# code...
		$message = "Bonsoir!";

	}
	else{
		$message = "Bonjour!";
	}
	return $message;
}

function salutation($nom)
{
	return $nom;
}

function view($message)
{
	echo($message);
}

$nom = salutation("Patrona shabani sumaili ").getMessage(16);
view($nom);

 function somme($montant)
 {
 	
 	return $montant;
 }

 function tva($taux)
 {
 	return $taux;
 }

 $montant = somme(400);
 $reduction = tva(2);
 $total;

 if ($montant >=100) {
 	# code...
 	$total = ($montant - ($montant * $reduction) / 100);
 	view("net à payer: ".$total."$");
 }
 else{
 	$total = $montant;
 	view("net à payer: ".$total."$");
 }








?>