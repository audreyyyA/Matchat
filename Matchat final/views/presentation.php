<!DOCTYPE html>
<html>
<head>
    <title>Baizodrome</title>
    <link rel="stylesheet" type="text/css" href="styleDark.css" />
    <meta charset="utf-8">
</head>
<body>

<div class="fond">

    <div id="band">
	
	    <h1 id= "nomSite">Baizodrome</h1>
    </div>
	

    <div id="Description">
        <p>Ceci est la description de ce site</p>	
		<div id="Connexion">
			<?php if ($err !== null) { ?>
				<p><?= $err ?></p>
			<?php } ?>
		
			<form method="post" action="<?= route("utilisateur", "login") ?>">
        	<label for="pseudo"> Pseudo </label>
			<input type="text" id="pseudo" required name ="pseudo"> 
			<br> </br>
			<label for="mot de passe"> Mot de passe </label>
			<input type="password" id="mdp" required name = "password"> 
			<br> </br>
			
			<input type="submit" value="connexion">
			
			</form>
			
			<a href="<?= route("utilisateur", "register_form") ?>">s'inscrire </a>

		</div>
    </div>
	
	 
    

</div>


</body>
</html>

