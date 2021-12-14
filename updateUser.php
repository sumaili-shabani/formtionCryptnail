<?php 

include("bd.php");
include("function.php");

if (isset($_POST['valider'])) {
	# code...
	extract($_POST);
	if (isset($_GET['id'])) {
		# code...

		if (!empty($first_name) && !empty($last_name) && !empty($email) &&
		!empty($sexe) && !empty($idrole)) {
			# code...

			if ($_FILES['user_image']['size'] > 0) {
				# code...
				$image = upload_image();

				$ps = $connection->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email, sexe=:sexe, idrole=:idrole, image=:image WHERE id=:id ");
				$statement = $ps->execute(array(
					':first_name'		=>	$first_name,
					':last_name'		=>	$last_name,
					':email'		=>	$email,
					':sexe'		=>	$sexe,
					':idrole'		=>	$idrole,
					':image'		=>	$image,
					':id'			=>	$_GET['id']
				));

				if (!empty($statement)) {
					# code...
					
					redirect("users");
				}
				else{
					echo("oups!!!!");
				}


			   
			}
			else{

				$ps = $connection->prepare("UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email, sexe=:sexe, idrole=:idrole WHERE id=:id ");
				$statement = $ps->execute(array(
					':first_name'		=>	$first_name,
					':last_name'		=>	$last_name,
					':email'		=>	$email,
					':sexe'		=>	$sexe,
					':idrole'		=>	$idrole,
					':id'			=>	$_GET['id']
				));

				if (!empty($statement)) {
					# code...
					
					redirect("users");
				}
				else{
					echo("oups!!!!");
				}

			}

			

		}
		else{
			echo("Tous les champs sont requis");
		}
	}
	else{
		redirect("users");
	}
	
	
}


?>

<!doctype html>
<html lang="en">
  <head>
    <?php include("_meta.php") ?>

    <title>Add user</title>
  </head>
  <body>

  	<?php include("_navigation.php") ?>


	<!-- le corp commence -->
	<div class="container">

		<div class="col-md-12">
			<div class="row">

				
				<div class="col-md-12 mt-4">
					<!-- mes scripts commencent -->

					<div class="row">
						<div class="col-md-12">

							<?php 
							if (isset($_GET['id'])) {
								# code...
								$id = $_GET['id'];

								$ps = $connection->prepare("SELECT * FROM users WHERE id=:id");
								$ps->execute(array(':id'	=>	$id));
								$count = $ps->rowCount();
								if ($count > 0) {
									# code...

									while ($data=$ps->fetch()) {
										# code...
										?>

									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4"></div>
											<div class="col-md-4">
												<img class="img img-thumbnail img-responsive" alt="Pas d'image" width="50" height="40" src="./upload/<?php echo($data['image']) ;?>">
											</div>
											<div class="col-md-4"></div>
										</div>
									</div>

									<form class="row" method="post" enctype="multipart/form-data">

										<div class="col-md-6 form-group mb-2">
											<label>Nom</label>
											<input type="text" name="first_name" id="first_name" placeholder="Nom" required="" class="form-control" value="<?php echo($data['first_name']) ;?>">
										</div>

										<div class="col-md-6 form-group mb-2">
											<label>Post nom</label>
											<input type="text" name="last_name" id="last_name" placeholder="Post nom" required="" class="form-control" value="<?php echo($data['last_name']) ;?>">
										</div>

										<div class="col-md-12 form-group mb-2">
											<label>Email</label>
											<input type="email" name="email" id="email" placeholder="nomdomine@gmail.com" required="" class="form-control" value="<?php echo($data['email']) ;?>">
										</div>

										<div class="col-md-6 form-group mb-2">
											<label>Sexe</label>
											<select class="form-control" name="sexe" id="sexe">
												<option value="">Selectionnez votre sexe</option>
												<option value="M" 

												<?php 
												if ($data['sexe'] == 'M') {
													# code...
												echo("selected");
												}
												?>

												 >M</option>
												<option value="F"
												<?php 
												if ($data['sexe'] == 'F') {
													# code...
												echo("selected");
												}
												?>
												>F</option>
											</select>
										</div>

										<div class="col-md-6 form-group mb-2">
											<label>Privilège</label>
											<select class="form-control" name="idrole" id="idrole">
												<?php
												$ps = $connection->prepare("SELECT * FROM role");
												$ps->execute();
												$count = $ps->rowCount();
												if ($count > 0) {
													?>
													<option value="">Selectionnez le Privilège</option>
													<?php
												 	# code...
												 	while ($data2=$ps->fetch()) {
		                                               
		                                               	# code...
		                                               	 ?>


		                                                
		                                                <option 

		                                                <?php 
														if ($data['idrole'] == $data2['idrole']) {
															# code...
														echo("selected");
														}
														?>

		                                                 value="<?php echo($data2['idrole']) ?>">
		                                                    <?php echo($data2['nom']) ?>
		                                                </option>
		                                                <?php
		                                               
		                                            }
												}
												else{

												} 


												 ?>
												
												
											</select>
										</div>

										<div class="col-md-12 form-group mb-2">
											<label>Selectionnez l'image</label>
											<input type="file" name="user_image" id="user_image" class="form-control">
										</div>


										<div class="col-md-12 form-group mb-2">
											<button type="submit" name="valider" class="btn btn-primary btn-block">Modifier</button>
										</div>

										
									</form>


										<?php
									}


								}
								else{

									redirect("users");

								}

								
							}
							else{
								redirect("users");
							}



							 ?>


							
						</div>
					</div>
				
					<!-- fin mes scripts -->

					
				</div>	





			</div>
		</div>
		
	</div>
	<!-- fin -->

	<div class="col-md-12" style="margin-top: 100px;"></div>

	<?php include("_footer.php") ?>

	<?php include("_script.php") ?>


    <script type="text/javascript">
    	$(document).ready(function() {
    		$('.carousel').carousel({
			  interval: 2000
			});
    	});
    </script>



  </body>
</html>