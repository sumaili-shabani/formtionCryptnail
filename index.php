<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- hors connexion -->

    <!-- fontawason -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome/css/font-awesome.min.css">
  	<link href="assets/css/google-font.css" rel="stylesheet">

  	 <link rel="shortcut icon" href="assets/images/bootstrap.jpg">

  	

	
	<title>Introduction js</title>
</head>
<body>

	<div class="container">
		<div class="col-md-12 mt-5">
			<div class="row">
				

				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 card">
							<div class="col-md-12 card-body">
								<form class="row" autocomplete="off" method="POST" action="#" id="my_form">

									<div class="col-md-12 text-center">
										<h3 class="text-muted">Le DOM <a href="blog.php" class="text-primary langue" like="12" id="langue">EN</a></h3>
									</div>

									<div class="col-md-12 form-group message">
											
									</div>
									<div class="col-md-12 form-group">
										<label class="form-control-label"> <span class="label_name">Nom*:</span></label>
										<input type="text" name="name_okplus" id="name" class="form-control" placeholder="Entrez votre nom" value="patrona">
										<span class="text-danger" id="error_name"></span>
									</div>

									<div class="col-md-12 form-group">
										<label class="form-control-label"><span class="label_pwd">Mot de masse*:</span></label>
										<input type="password" name="pwd_okplus" id="pwd" class="form-control" placeholder="Entrez votre mot de passe">
										<span class="text-danger" id="error_pwd"></span>
									</div>

									<div class="col-md-12 form-group">
										<button type="submit" class="btn btn-primary btn-block" id="btn1" name="valider">Valider</button>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	


	<script type="text/javascript" src="assets/js/jquery.js"></script>

	<!-- <script type="text/javascript" src="assets/js/Eventjquery.js"></script> -->

	<!-- <script type="text/javascript">
		
		var langue = document.querySelector('.langue');
		langue.addEventListener('click', (e)=>{
			e.preventDefault();
			var pwd = document.querySelector('#pwd');
			var placeholder ="Enter your name";
			pwd.placeholder=  placeholder;

			console.log(pwd.placeholder);


		})


				
	</script> -->

	<script type="text/javascript">
		$(document).ready(function(){

			var form = $('#my_form');
			var langue = $('.langue');

			function viderRouge()
			{
				var error_name = $('#error_name');
				var error_pwd = $('#error_pwd');
				error_pwd.text("");
				error_name.text("");
			}

			function showMessage(classe,message){
				var alerte = '<div class="alert alert-'+classe+'">'+message+'<button class="close" data-dismiss="alert"><i class="fa fa-close"></i></button></div>';
				return alerte;
			}

			let login  = (event)=>{
				event.preventDefault();
				var name = $('#name').val();
				var pwd = $('#pwd').val();
				var message ='';
				var error_name = $('#error_name');
				var error_pwd = $('#error_pwd');

				var affichage = $('.message');
				// alert("salut: "+name+" pwd:"+pwd);

				var nom = 'patrona';
				var p = '123456';

				if (name == '' && pwd =='') {
					message ="Tous les champs sont obligatoires!!!!";
					affichage.text(message);


				}
				else{

					if (name == '' && pwd !='') {
						message ="Veillez remplire le nom";
						error_name.text(message);
						error_pwd.text("");
						 affichage.html("");
					}
					else if (name !='' && pwd =='') {
						message ="Veillez remplire le mot de passe";
						error_pwd.text(message);
						error_name.text("");
						affichage.html("");
					}
					else{

						if (name == nom && pwd == p) {
							message ="Félicitation 🆗";


							affichage.html(showMessage("success", message));
							viderRouge();

						}
						else{

							if (name == nom && pwd != p) {
								message ="Mot de paase incorrecte 🔓";

								affichage.html(showMessage("danger", message));
								viderRouge();
								$('#pwd').val("");
							}
							else if (name != nom && pwd==p) {
								message ="Nom d'utilisateur incorrect 😒";
								affichage.html(showMessage("danger", message));
								viderRouge();
								$('#name').val("");
							}
							else{
								message ="Information incorrecte 🙆";
								affichage.html(showMessage("danger", message));
								viderRouge();

							}
						   
						   

						}

					}
				}

				


			};

			$(document).on('submit',form, login);

			$(document).on('click', '.langue', (cool)=>{
				cool.preventDefault();
				if (confirm("Etes-vous sûre de vouloir quitter la page?")) {
					var url = $(this).attr('href');
					// var $label_name = $('.label_name');
					// var $label_pwd = $('.label_pwd');

					// $label_name.text("Name*:");
					// $label_pwd.text("Password*:");

					 window.location.href="blog.php";
				}
				else{
					return false;
				}

				
			})

			// $('.langue').on('click', function(event){
			// 	event.preventDefault();
			// 	alert("boom langue");
			// });



		});
	</script>




</body>
</html>