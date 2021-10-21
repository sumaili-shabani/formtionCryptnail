<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
</head>
<body>



		<audio src="assets/audio/dry_tant_pis_clip_officiel_ft._dadju_mp3_33224.mp3" autoplay controls></audio>

		<video src="assets/video/Updated Vue  Firebase Course Udemy.mp4" autoplay controls>
			<source src="assets/video/Updated Vue  Firebase Course Udemy.mp4" type="video/mp4">
			<source src="assets/video/Updated Vue  Firebase Course Udemy.mp4" type="video/webm">
		</video>

	<form method="POST" action="" enctype="multipart/form-data">
		<label> Nom</label> <input type="text" name="nom" size="25" placeholder="Entrez le nom" value="Patrona shabani"> <br> <br>
		<label> PostNom</label> <input type="text" name="postnom" size="25" placeholder="Entrez le postnom">
		<br> <br>

		<label> Mot de passe</label> <input type="password" name="pwd" size="25" placeholder="Mot de passe">
		<br> <br>
		<label> Entrez la biographie</label> <br>
		<textarea name="bio" placeholder="Saisissez la biographie"
		rows="10" cols="25" 
		>
			
		</textarea>


		<br> <br>
		<label> Email</label> <input type="email" name="email" size="25" placeholder="Entrez l'adresse mail">
		

		<br> <br>
		<label> Date de naissance</label> <input type="date" name="date_nais" size="25">

		<br> <br>
		<label> Montant en $</label> <input type="number" name="montant" size="25" placeholder="ex:50" min="1" max="10">

		<br> <br>
		<label> Flitrer</label> <input type="range" name="filtrage" size="25">

		<br> <br>
		<label> Couleur</label> <input type="color" name="couleur" size="25">
		<br> <br>

		
		<label> Téléphone</label> <input type="tel" name="tel" size="25" placeholder="+243817883541">
		<br> <br>

		<label> Promotion</label> 
		<select name="promotion">
			<option value="">Veillez selectionner la promotion</option>
			<option value="G1 IG">G1 IG</option>
			<option value="G2 IG" selected>G2 IG</option>
			<option value="G3 IG">G3 IG</option>
		</select>
		<br> <br>

		<label> Sexe</label> 
		<input type="checkbox" value="M" name="sexe"> M
		<input type="checkbox" value="F" name="sexe"> F
		<br> <br>

		<label> Langue</label> 
		<input type="radio" value="fr" name="langue"> Français
		<input type="radio" value="an" name="langue"> Anglais
		<br> <br>

		<label> Votre photo</label> 
		<input type="file" name="photo"> 
	
		<br> <br>

		<button type="submit" name="valider">Enregistrer</button>

		<button type="reset" name="annuler">Annuler</button>

		<input type="submit" name="actualiser" value="actualiser">
		
		
		<!-- <iframe src=""></iframe> -->

		



		
	</form>

</body>
</html>