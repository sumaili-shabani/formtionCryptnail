<?php 

include("bd.php");
include("function.php");

if(isset($_POST["operation"]))
{

	if ($_POST['operation'] == "Add") {
		# code...

		extract($_POST);

		if (!empty($first_name) && !empty($last_name) && !empty($email)) {
			# code...
			// echo($first_name.''.$last_name.' email:'.$email);

			if ($_FILES['user_image']['size'] > 0) {
			# code...
				$image = upload_image();

				$ps = $connection->prepare("INSERT INTO users(first_name, last_name, email, idrole, image) VALUES(:first_name,:last_name,:email,:idrole,:image) ");
				$statement = $ps->execute(array(
					':first_name'		=>	$first_name,
					':last_name'		=>	$last_name,
					':email'		=>	$email,
					
					':idrole'		=>	2,
					':image'		=>	$image
				));

				if (!empty($statement)) {
					# code...
					echo("enregistrement avec succès!!!");
					
				}
				else{
					echo("oups!!!!");
				}


			   
			}
			else{

				$image ="avatar.png";

				$ps = $connection->prepare("INSERT INTO users(first_name, last_name, email, idrole, image) VALUES(:first_name,:last_name,:email,:idrole,:image) ");
				$statement = $ps->execute(array(
					':first_name'		=>	$first_name,
					':last_name'		=>	$last_name,
					':email'		=>	$email,
					
					':idrole'		=>	2,
					':image'		=>	$image
				));

				if (!empty($statement)) {
					# code...
					echo("enregistrement avec succès!!!");
					
				}
				else{
					echo("oups!!!!");
				}

			}



		}

		 
	}
	elseif($_POST["operation"] == "Edit")
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
	else{
		echo("pas add");
	}
}
else{
	echo("vide");
}



 ?>