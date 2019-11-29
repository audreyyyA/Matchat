<?php

foreach([ //remplir avec les valeurs du dessus
	'F' => 'Femme',
	'M' => 'Homme',				
	'NonBinaire' => 'Non Binaire',
	'Trans' => 'Transexuel',
	'Hermaphrodite' => 'Hermaphrodite',
	'Autre' => 'Autre',
	] as $key => $value){

		if($key === null){
			$res = deleteUser();
			if($res === '0')

			flash('err', 'inscription échouée');
			redirect("utilisateur", "register_form");
			return;
		}

	}