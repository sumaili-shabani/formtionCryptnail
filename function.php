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

function redirect($file)
{
	header("Location:".$file.".php");
}



?>