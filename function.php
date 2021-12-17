<?php 


function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$date =  date('Y-m-d');
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '-'.$date.'.'. $extension[1];
		$destination = './upload/' . $new_name;

		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;

		/*
		move_uploaded_file($_FILES['user_image']['tmp_name'], "./upload/".$_FILES['user_image']['name']);
		*/

	}
}

function get_image_name($user_id)
{
	 include('bd.php');
	 $statement = $connection->prepare("SELECT image FROM users WHERE id = '$user_id'");
	 $statement->execute();
	 $result = $statement->fetchAll();
	 foreach($result as $row)
	 {

	 	$image = $row["image"];
	   return  $image;
	 }
}

function get_total_all_records()
{
	 include('bd.php');
	 $statement = $connection->prepare("SELECT * FROM users");
	 $statement->execute();
	 $result = $statement->fetchAll();
	 return $statement->rowCount();
}

function redirect($file)
{
	header("Location:".$file.".php");
}



?>