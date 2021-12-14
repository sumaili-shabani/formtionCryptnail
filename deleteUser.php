<?php 
include("bd.php");
include("function.php");
if (isset($_GET['id'])) {
	# code...
	$id = $_GET['id'];

	$tab = array(
		':id'	=>	$id
	);

	$ps = $connection->prepare("DELETE FROM users WHERE id=:id");
	$statement = $ps->execute($tab);
	if (!empty($statement)) {
		# code...
		redirect("users");
	}
	else{

		redirect("users");
	}

	// echo($id);
}
else{
	redirect("index");
}


 ?>