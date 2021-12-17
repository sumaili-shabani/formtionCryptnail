<?php 
include("bd.php");
include("function.php");

if(isset($_POST["operation"]))
{
	 if($_POST["operation"] == "Add")
	 {
	  $image = '';
	  if($_FILES["user_image"]["name"] != '')
	  {
	   $image = upload_image();
	  }
	  $statement = $connection->prepare("
	   INSERT INTO users (first_name, last_name, email, image) 
	   VALUES (:first_name, :last_name, :email, :image)
	  ");
	  $result = $statement->execute(
	   array(
	    ':first_name' => $_POST["first_name"],
	    ':last_name' => $_POST["last_name"],
	    ':email' 	 => $_POST["email"],
	    ':image'  => $image
	   )
	  );
	  if(!empty($result))
	  {
	   echo 'Iinsertion avec succès!!!';
	  }
	 }
	 if($_POST["operation"] == "Edit")
	 {
	  $image = '';
	  if($_FILES["user_image"]["name"] != '')
	  {
	   $image = upload_image();
	  }
	  else
	  {
	   $image = $_POST["hidden_user_image"];
	  }
	  $statement = $connection->prepare(
	   "UPDATE users 
	   SET first_name = :first_name, last_name = :last_name, image = :image, email=:email  
	   WHERE id = :id
	   "
	  );
	  $result = $statement->execute(
	   array(
	    ':first_name' => $_POST["first_name"],
	    ':last_name' => $_POST["last_name"],
	    ':image'  => $image,
	    ':email' 	 => $_POST["email"],
	    ':id'   => $_POST["user_id"]
	   )
	  );
	  if(!empty($result))
	  {
	   echo 'Modification avec succès!';
	  }
	 }
}
else{
	echo("vide");
}





 ?>