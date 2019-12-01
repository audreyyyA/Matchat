<!DOCTYPE html>
<html>
	<head>
	    <title>Baizodrome</title>
	    <link rel="stylesheet" type="text/css" href="styleDark.css"/>
	    <meta charset="utf-8">
	</head>
	<body>
		<div class="fond">
			
		    <div id="band"> <h1 id= "nomSite">Baizodrome</h1></div>

		    <div id="Description">
				<a href="<?= route("utilisateur", "login_form") ?>">Je me connecte</a>

				<form method="post" action="<?= route("utilisateur", "register") ?>"> 
					<?php if ($err !== null) { ?>
						<p><?= $err ?></p>
					<?php } ?>
					
		        	<p> Pseudo <input type="text" required name="pseudo"><br></p>
					<p>Age <input type="integer" required name="age"><br></p>
					<p>
						Sexe
						<select type = "text "name="sex">
						<?php foreach([
							"Femme" => 'Femme',
							"Homme" => 'Homme',				
							"NonBinaire" => 'Non Binaire',
							"Trans" => 'Transexuel',
							"Hermaphrodite" => 'Hermaphrodite',
							"Autre" => 'Autre',
						] as $value => $key) { ?>
							<option id="sexSelect" selected = "selected" required value=<?= $value ?> ><?= $key ?></option> 	
						<?php } ?>						
						</select>
						
					</p>
									
					<p>Adresse Mail <input type="email" required name="email"><br></p>
					<p>Mot de passe <input type="password" required name="password"><br></p>
					<p> Confirmez votre mot de passe <input type="password" required name="password_confirm"><br></p>
					
					<input type="submit" value="Valider">
				</form>
			</div>
		</div>
	</body>
</html>