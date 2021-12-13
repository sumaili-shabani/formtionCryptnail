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

  	

	
	<title>Meteo api</title>
</head>
<body>

	<div class="container">
		<div class="col-md-12 mt-5">
			<div class="row">

				<div class="col-md-12">
					<div class="row">

						<div class="col-md-12">
							<form class="row" method="POST" id="my_form">
								<div class="col-md-12 mb-2 message">
									
								</div>
								<div class="col-md-12 form-group mb-2">
									<input type="text" name="ville" id="ville" class="form-control" placeholder="Entrez la ville">
									<span class="text-danger" id="error_ville"></span>
								</div>
								<div class="col-md-12 form-group mb-2">
									<button type="submit" id="valide" class="btn btn-primary btn-block">
										<i class="fa fa-search mr-1"></i> Lancer la similation méteo
									</button>
								</div>

								
							</form>
						</div>

						<div class="col-md-12">
							<div class="row">
								<div class="col-6 affichage">

									

									
								</div>
								<div class="col-6 bg-white">
									<img src="assets/images/meteo.png" class="img img-responsive img-thumbnail bg-white" style="border-color: none; border:none;">
								</div>
							</div>
						</div>

						
					</div>
				</div>
				

				
			</div>
		</div>
	</div>

	


	<script type="text/javascript" src="assets/js/jquery.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			$(document).on('submit', '#my_form', function(event) {
				event.preventDefault();
				/* Act on the event */
				var ville = $('#ville').val();
				var error_ville = $('#error_ville');
				if (ville !='') {

				  error_ville.text("");

				  ShowMeteo(ville);
				}
				else{
					var message = "veillez remplir la ville";
					error_ville.text(message);
				}

			});

			// debit
			
			var tab =[];
			var affichage = $('.affichage');
			const DataError = function(error) {
				var message = $('.message');
				if (error.message == "Cannot read property 'temp' of undefined") {
					var sms = "cette ville n'existe pas";
					message.html("<div class='alert alert-danger'>"+sms+"<button class='close' data-dismiss='alert'><i class='fa fa-close'></i></button></div>");

				}
				else{

			   		console.error('Il y a eu un problème avec l\'opération fetch: ' + error.message);
				}
			}
			
			const Datameteo = function(data){

				tab = data;
				var temp = tab.main.temp;
				var tempCel = (temp - 273.15 ).toFixed(2)+"°C";
				var pression = tab.main.pressure+" Pascal";
				var pays = tab.sys.country;

				var outhtml = `	
				<div class="col-md-12">
					<strong><h3>${tab.name}</h3></strong>
					<strong>Pays:<span class="text-warning"><h4>${pays}</h4></span></strong>
				</div>
				<div class="col-md-12">
					<span class="text-primary">La température est de:</span> <h1>${tempCel}</h1>
					<span class="text-primary">La pression est de:</span> <h3 class="text-success">${pression}</h3>
				</div>
				`;

				
				console.log(tempCel+"°C "+pression);


				affichage.html(outhtml);



			};

			function ShowMeteo(city){

				var ville = city;
			    var url = "https://api.openweathermap.org/data/2.5/weather?q="+ville+"&appid=70a51ac68eda0d526ff4d656fda2ac05";

				fetch(url)
				.then(response => response.json())
				.then(Datameteo)
				.catch(DataError)

			}

			$(document).on('click', '.alert', function(event) {
				event.preventDefault();
				/* Act on the event */
				$(this).hide();
			});

			
			// fin

			
						
		});

	</script>

	
</body>
</html>