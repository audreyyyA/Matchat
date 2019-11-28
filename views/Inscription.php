<!DOCTYPE html>
<html>
	<head>
	    <title>Baizodrome</title>
	    <link rel="stylesheet" type="text/css" href="style/style.css"/>
	    <meta charset="utf-8">
	</head>
	<body>
		<div class="fond">
		    <div id="band"> <h1 id= "nomSite">drome</h1></div>
		    <div id="band2"> <h1 id= "nomSite2">Baizo</h1></div>

		    <div id="Description">
				<a href="<?= route("utilisateur", "login_form") ?>">Je me connecte</a>

				<form method="post" action="<?= route("utilisateur", "register") ?>"> 
					<?php if ($err !== null) { ?>
						<p><?= $err ?></p>
					<?php } ?>
					
		        	<label>Pseudo <input type="text" name="pseudo"></label><br>
					<label>Age <input type="integer" name="age"></label><br>
					<p>
						Sexe
						<?php foreach([
							'F' => 'Femme',
							'M' => 'Homme',				
							'NonBinaire' => 'Non Binaire',
							'Trans' => 'Transexuel',
							'Hermaphrodite' => 'Hermaphrodite',
							'Autre' => 'Autre',
						] as $key => $value) { ?>
							<label><input type="radio" value="<?= $key ?>" name="sexe"><?= $value ?></label>	
						<?php } ?>						
						<label><input type="radio" value="M" name="sexe">Homme</label>		
					</p>
									
					<label> Adresse Mail <input type="email" name="email"></label><br>
					<label>Mot de passe <input type="password" name="password"></label><br>
					<label> Confirmez votre mot de passe <input type="password" name="password_confirm"></label><br>
					
					<input type="submit" value="Valider">
				</form>
			</div>
		</div>
	</body>
</html>