<?php 
include("bd.php");
include("function.php");

if(isset($_POST["id"]))
{
	 $output = array();
	 $statement = $connection->prepare(
	  "SELECT * FROM users 
	  WHERE id = '".$_POST["id"]."' 
	  LIMIT 1"
	 );
	 $statement->execute();
	 $result = $statement->fetchAll();
	 foreach($result as $row)
	 {
	  $output["first_name"] = $row["first_name"];
	  $output["last_name"] = $row["last_name"];
	  $output["email"] = $row["email"];
	  if($row["image"] != '')
	  {
	   $output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
	  }
	  else
	  {
	   $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
	  }
	 }
	 echo json_encode($output);
}




 ?>