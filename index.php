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
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3 class="text-muted">Introduction sur javascript</h3>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		var tab = ["patrona","shabani","roger","grace","schadrack","lola","graphikart","patrick"];
		var limite  = tab.length;

		var i =0;
		 // boucle for
		// for(i = 0; i< limite; i++){

		// 	console.log(tab[i]);
		// }

		// boucle while

		// while(i < limite){
		// 	console.log(tab[i]);
		// 	i++;
		// }

		 // boucle do while 
		 // do{
		 // 	i++;

		 // 	console.log(tab[i]);

		 // }
		 // while(i<limite);

		 function nomComplet(nom)
		 {
		 	return nom;
		 }
		 function message(sms)
		 {
		 	return sms;
		 }

		 function DateJour()
		 {
		 	var date = new Date();
		 	var mois = date.getMonth() + 1;
		 	var heure = date.getHours() + 1;
			var datecomplete = date.getDay()+"/"+mois+"/"+date.getFullYear()+" "+heure+":"+date.getMinutes()+":"+date.getSeconds();

			return datecomplete;
			
		 }


		 function somme(a,b)
		 {
		 	return a+b;
		 }

		 function erreur(err)
		 {
		 	return err;
		 }

		  function division(a,b)
		 {
		 	if (b != 0) {
		 		return a/b;
		 	}
		 	else{

		 		var message = erreur("infini");
		 		return message;
		 	}
		 }

		 var name =  nomComplet("Roger sumaili");
		 console.log(message("Bonjour")+""+name+" on est: "+DateJour());

		 console.log("la somme ="+somme(10,4));

		 console.log("le quotient ="+division(10,0));


		


		
		

	</script>


</body>
</html>