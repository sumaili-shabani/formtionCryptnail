<!doctype html>
<html lang="en">
  <head>
    <?php include("_meta.php") ?>

    <title>Users</title>
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
						<div class="col-md-12 mb-3">
							<a href="add_user.php" class="btn btn-primary btn-sm pull-right"> Ajouter</a>
						</div>
						<div class="table-responsive col-md-12">
							<table class="table table-bordered table-striped" id="userTable">
								<thead>
									<tr>
										<th> Image</th>
										<th> Nom complet</th>
										<th> Email</th>
										<th> Sexe</th>
										<th> Role</th>
										<th>Modifier</th>
										<th>Supprimer</th>					
									</tr>
								</thead>
								<tbody>

								<?php 
								include("bd.php");
								include("function.php");

								$ps = $connection->prepare("SELECT * FROM profile_users ORDER BY created_at DESC");
								$ps->execute();
								$count = $ps->rowCount();
								
								if ($count > 0) {
									# code...
									while ($data = $ps->fetch()) {
										# code...


										?>
										<tr>
											<td>
												<img class="img img-thumbnail img-responsive" alt="Pas d'image" width="50" height="40" src="./upload/<?php echo($data['image']) ;?>">	
										    </td>
											<td>
											<?php echo(substr($data['first_name'].'-'.$data['last_name'], 0,20)) ;?>...	
											</td>
											<td>
											<a href="mailto:<?php echo($data['email']) ;?>"> <?php echo($data['email']) ;?></a>	
											</td>
											<td>
												<?php echo($data['sexe']) ;?>
											</td>
											<td>
												<?php echo($data['nom']) ;?>
											</td>
											<td>
												<a href="updateUser.php?id=<?php echo($data['id']) ;?>" class="btn btn-warning btn-sm">
													<i class="fa fa-edit"></i>
												</a>
											</td>
											<td>
												<a onclick="return confirm('Etes-vous sûr de vouloir le supprimer?');" href="deleteUser.php?id=<?php echo($data['id']) ;?>" class="btn btn-danger btn-sm">
													<i class="fa fa-trash"></i>
												</a>
											</td>
										</tr>
										<?php
									}
								}


								?>
									
								</tbody>

								<tfoot>
									<tr>
										<th> Image</th>
										<th> Nom complet</th>
										<th> Email</th>
										<th> Sexe</th>
										<th> Role</th>
										<th>Modifier</th>
										<th>Supprimer</th>					
									</tr>
								</tfoot>
								
							</table>
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
    		$('#userTable').DataTable();
    	});
    </script>



  </body>
</html>