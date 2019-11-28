<!DOCTYPE html>
<html>
<head>
    <title>Baizodrome</title>
    <link rel="stylesheet" type="text/css" href="styleDark.css"/>
    <meta charset="utf-8">
</head>
<body>


<div class="fond">
		
    <div id="band">
	    <h1 id= "nomSite">chat</h1>
    </div>
	<div id="band2">
	    <h1 id= "nomSite2">Mat</h1> 
    </div>

    <?php 
    	
        if (isset($_SESSION['pseudo'])) {
    ?>
        <p>Coucou, <?php echo $_SESSION['pseudo'] ?></p>
    <?php
        } else {
            require ("/views/Inscription.php") ;
        }
    ?>

    <form method="post" action="index.php?controle=utilisateur&action=newTest"> 
    	<?php $pseudo = $_SESSION['pseudo'] ?>
    <div id="QCM">
        <p>Test de personnalité</p>	
		<div id="1">
	
		<p><a> La question 1 : Avez-vous tendance à entrer dans un groupe facilement? </a>
	
			<select name="social1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>
	
		
		<div id="2">
		<p><a> La question 2 : Êtes-vous considéré comme quelqu’un de sociable?</a>
			<select name="social2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
			</p>
		</div>

		<div id="3">
		<p><a> La question 3 : Prenez vous souvent la parole dans un groupe?</a>
			<select name="social3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
	</div>

		<div id="1">

		<p><a> La question 4 : Avez-vous tendance à insulter les personnes qui vous énervent?</a>
			<select name="agreable1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
			</p>
		</div>

		<div id="2">
		<p><a> La question 5 : Êtes-vous considéré comme une personne agréable?</a>
			
			<select name="agreable2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 6 : Avez-vous tendance à répondre sèchement au personnes?</a>
			
		<select name="agreable3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>
		
			<div id="1">
		<p><a> La question 7 : Accordez vous beaucoup d’importance à votre apparence?</a>
			<select name="superficiel1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="2">
		<p><a> La question 8 : Accordez vous de l’importance à la culture générale?</a>
			<select name="superficiel2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 9 : Aimez vous débattre avec des personnes autour d’un sujet?</a>
			<select name="superficiel3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>
		<div id="1">
		<p><a> La question 10 :Avez-vous tendance à stresser beaucoup?</a>
			<select name="anxieux1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="2">
		<p><a> La question 11 : Êtes-vous considéré(e) comme quelqu’un de stressé?</a>
			<select name="anxieux2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 12 : Les examens sont ils sujet de stress chez vous?</a>
			<select name="anxieux3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

			<div id="1">
		<p><a> La question 13 : Les personnes viennent elles souvent vous parler de leurs problèmes?</a>
			<select name="empathique1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="2">
		<p><a> La question 14 : Avez vous du mal à comprendre les sentiments des autres?</a>
			<select name="empathique2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 15 : Êtes-vous considéré comme quelqu’un d’empathique?</a>
			<select name="empathique3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>
		<div id="1">

		<p><a> La question 16 : Croyez vous en l'humanité?</a>
		<select name="optimiste1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select><
		</p>
		</div>

		<div id="2">
		<p><a> La question 17 : Êtes-vous considèré comme quelqu’un d’optimiste?</a>
			<select name="optimiste2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 18 : Pour vous le verre est il à moitié plein?</a>
			<select name="optimiste3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>
		<div id="1">
		<p><a> La question 19 : Êtes-vous considéré comme quelqu’un ayant de l’humour?</a>
			<select name="humoristique1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="2">
		<p><a> La question 20 : Êtes-vous considéré comme quelqu’un de bon publique?</a>
			<select name="humoristique2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 21 : A-t-on l’habitude de vous dire que votre humour n’est pas ouf?</a>
			<select name="humoristique3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
	</div>

	<div id="1">
		<p><a> La question 22 : Êtes-vous considéré comme quelqu’un de chaleureux?</a>
			<select name="froid1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="2">
		<p><a> La question 23 : Avez-vous tendance à être froid?</a>
			<select name="froid2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 24 : Vous faites vous des amis facilement?</a>
			<select name="froid3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
	</div>

	<div id="1">
		<p><a> La question 25 : Est-ce que vous vous prenez souvent la tête avec vos amis?</a>
			<select name="suiveur1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="2">
		<p><a> La question 26 : Les personnes d’un groupe vous écoutent souvent?</a>
			<select name="suiveur2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 27 : Proposez vous souvent des sorties avec vos amis?</a>
			<select name="suiveur3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
	</div>

	<div id="1">
		<p><a> La question 28 : Vous considérez vous comme quelqu’un de meilleur que les autres?</a>
			<select name="orgueilleux1">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="2">
		<p><a> La question 29 : Considérez vous vos idées comme meilleures que celles des autres?</a>
			<select name="orgueilleux2">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
		</div>

		<div id="3">
		<p><a> La question 30 : Avez-vous tendance à minimiser vos reussites ?</a>
			<select name="orgueilleux3">
				<option selected = "selected" value="5">très d'accord</option>
				<option value="4">d'accord</option>
				<option value="3">neutre</option>
				<option value="2">pas d'accord</option>
				<option value="1">pas du tout d'accord</option>
			</select>
		</p>
	</div>







		<input type="submit" value="valider le test">
		</form>

		</div>
	<<!-- <button id="validation"> <a href="#"> Valider </a> </button> -->
</div>


</body>
</html>

