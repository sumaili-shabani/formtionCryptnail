<?php 
include("bd.php");
include("function.php");
if (isset($_POST['id'])) {
	# code...
	$id = $_POST['id'];

	$tab = array(
		':id'	=>	$id
	);

	$ps = $connection->prepare("DELETE FROM users WHERE id=:id");
	$statement = $ps->execute($tab);
	if (!empty($statement)) {
		# code...
		echo("suppression avec succès!!!");
	}
	

	// echo($id);
}
else{
	echo("faux");
}


 ?>