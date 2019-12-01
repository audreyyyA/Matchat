<?php

require("model/db.php");

function login_form() {
	$err = flash('err');
	require("views/presentation.php");
	return;
}

function login() {
	$pseudo = $_POST['pseudo'];
	if (count($pseudo) < 1) {
		flash('err', 'empty pseudo');
		redirect("utilisateur", "login_form");
		return;
	}

	$password = $_POST['password'];
	if (count($password) < 1) {
		flash('err', 'empty password');
		redirect("utilisateur", "login_form");
		return;
	}

	list($user, $err) = get_user($pseudo);
	if ($err !== null) {
		flash('err', $err);
		redirect("utilisateur", "login_form");
		return;
	}

	if ($user === false) {
		flash('err', 'no user with this pseudo');
		redirect("utilisateur", "login_form");
		return;
	}

	if (!password_verify($password, $user['password'])) {
		flash('err', 'invalid password');
		redirect("utilisateur", "login_form");
		return;
	}

	$_SESSION['pseudo'] = $pseudo;
	redirect("utilisateur", "profile");
	return;
}

function register_form(){
	$err = flash('err');
	require("views/Inscription.php");
	return;	
}

function qcm_form(){
	require("views/qcm.php");
	return;	
}

function register(){

	$pseudo = $_POST['pseudo'];
	if (count($pseudo) < 1) {
		flash('err', 'empty pseudo');
		redirect("utilisateur", "register_form");
		return;
	}

	$password = $_POST['password'];
	if (count($password) < 1) {
		flash('err', 'empty password');
		redirect("utilisateur", "register_form");
		return;
	}

	$password_confirm = $_POST['password_confirm'];
	if (count($password) < 1) {
		flash('err', 'empty password');
		redirect("utilisateur", "register_form");
		return;
	}

	if ($password !== $password_confirm) {
		flash('err', 'invalid password_confirm');
		redirect("utilisateur", "register_form");
		return;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	$email = $_POST['email'];
	if (count($email) < 1) {
		flash('err', 'empty email');
		redirect("utilisateur", "register_form");
		return;
	}

	$age = $_POST['age'];
	if (count($age) < 1 or $age < 18) {
		flash('err', 'empty age');
		redirect("utilisateur", "register_form");
		return;
	}

	$sex = $_POST['sex'];
	if (count($sex) < 1) {
		flash('err', 'empty');
		redirect("utilisateur", "register_form");
		return;
	}

	list($user, $err) = get_user($pseudo);
	if ($err !== null) {
		flash('err', $err);
		redirect("utilisateur", "register_form");
		return;
	}

	if ($user !== false) {
		flash('err', 'pseudo already exists');
		redirect("utilisateur", "register_form");
		return;
	}

	$err = insert_user($pseudo, $password, $email, $age, $sex);
	if ($err !== null) {
		flash('err', $err);
		redirect("utilisateur", "register_form");
		return;
	}
	
	$_SESSION['pseudo'] = $pseudo;
	redirect("utilisateur", "qcm_form");
	return;
}

function newTest(){
	
	echo $pseudo = $_SESSION['pseudo'];

	$social1 = isset($_POST['social1'])?($_POST['social1']):'';
	$social2 = isset($_POST['social2'])?($_POST['social2']):'';
	$social3 = isset($_POST['social3'])?($_POST['social3']):'';
	echo $social = $social1 + $social2 + $social3;
	
	$agreable1 =isset($_POST['agreable1'])?($_POST['agreable1']):'';
	$agreable3 =isset($_POST['agreable3'])?($_POST['agreable3']):'';
	$agreable2 =isset($_POST['agreable2'])?($_POST['agreable2']):'';
	echo $agreable= $agreable1+$agreable2+$agreable3;
	
	$orgueilleux1 =isset($_POST['orgueilleux1'])?($_POST['orgueilleux1']):''; 
	$orgueilleux2 =isset($_POST['orgueilleux2'])?($_POST['orgueilleux2']):'';
	$orgueilleux3 =isset($_POST['orgueilleux3'])?($_POST['orgueilleux3']):'';
	echo $orgueilleux= $orgueilleux1+$orgueilleux2+$orgueilleux3;
	
	$froid1 =isset($_POST['froid1'])?($_POST['froid1']):'';
	$froid2 =isset($_POST['froid2'])?($_POST['froid2']):'';
	$froid3 =isset($_POST['froid3'])?($_POST['froid3']):'';
	echo $froid= $froid1+$froid2+$froid3;
	
	$suiveur1 =isset($_POST['suiveur1'])?($_POST['suiveur1']):''; 
	$suiveur2 =isset($_POST['suiveur2'])?($_POST['suiveur2']):'';
	$suiveur3 =isset($_POST['suiveur3'])?($_POST['suiveur3']):'';
	echo $suiveur= $suiveur1+$suiveur2+$suiveur3;
	
	$superficiel1 =isset($_POST['superficiel1'])?($_POST['superficiel1']):'';
	$superficiel2 =isset($_POST['superficiel2'])?($_POST['superficiel2']):'';
	$superficiel3 =isset($_POST['superficiel3'])?($_POST['superficiel3']):'';
	echo $superficiel= $superficiel1+$superficiel2+$superficiel3;
	
	$anxieux1 =isset($_POST['anxieux1'])?($_POST['anxieux1']):'';
	$anxieux2 =isset($_POST['anxieux2'])?($_POST['anxieux2']):'';
	$anxieux3 =isset($_POST['anxieux3'])?($_POST['anxieux3']):'';
	echo $anxieux= $anxieux1+$anxieux2+$anxieux3;
	
	$empathique1 =isset($_POST['empathique1'])?($_POST['empathique1']):'';
	$empathique2 =isset($_POST['empathique2'])?($_POST['empathique2']):'';
	$empathique3 =isset($_POST['empathique3'])?($_POST['empathique3']):'';
	echo $empathique= $empathique1+$empathique2+$empathique3;
	
	$optimiste1 =isset($_POST['optimiste1'])?($_POST['optimiste1']):'';
	$optimiste2 =isset($_POST['optimiste2'])?($_POST['optimiste2']):'';
	$optimiste3 =isset($_POST['optimiste3'])?($_POST['optimiste3']):'';
	echo $optimiste= $optimiste1+$optimiste2+$optimiste3;
	
	$humoristique1 =isset($_POST['humoristique1'])?($_POST['humoristique1']):'';
	$humoristique2 =isset($_POST['humoristique2'])?($_POST['humoristique2']):'';
	$humoristique3 =isset($_POST['humoristique3'])?($_POST['humoristique3']):'';
	echo $humoristique= $humoristique1+$humoristique2+$humoristique3;
	
	echo $iduser = getID($pseudo);

	if(count($_POST) < 1){
		deleteUser($pseudo);
		redirect("utilisateur", "register_form");
		//+message d'erreur et supp utilisateur
	}
	//condition d'insertion:
	if ($social>=8){
		$id_criterion=1;
		insertLink($iduser,$id_criterion);
	}
	
	if ($social<8){
		$id_criterion=2;
		insertLink($iduser,$id_criterion);
	}
	
	if ($agreable>=8){
		$id_criterion=3;
		insertLink($iduser,$id_criterion);
	}
	
	if ($agreable<8){
		$id_criterion=4;
		insertLink($iduser,$id_criterion);
	}
	
	if ($froid>=8){
		$id_criterion=5;
		insertLink($iduser,$id_criterion);
	}
	if ($froid<8){
		$id_criterion=6;
		insertLink($iduser,$id_criterion);
	}
	if ($orgueilleux>=8){
		$id_criterion=7;
		insertLink($iduser,$id_criterion);
	}
	if ($orgueilleux<8){
		$id_criterion=8;
		insertLink($iduser,$id_criterion);
	}
	if ($suiveur>=8){
		$id_criterion=9;
		insertLink($iduser,$id_criterion);
	}
	if ($suiveur<8){
		$id_criterion=10;
		insertLink($iduser,$id_criterion);
	}
	if ($superficiel>=8){
		$id_criterion=11;
		insertLink($iduser,$id_criterion);
	}
	if ($superficiel<8){
		$id_criterion=12;
		insertLink($iduser,$id_criterion);
	}
	if ($anxieux>=8){
		$id_criterion=13;
		insertLink($iduser,$id_criterion);
	}
	if ($anxieux<8){
		$id_criterion=14;
		insertLink($iduser,$id_criterion);
	}
	if ($empathique>=8){
		$id_criterion=15;
		insertLink($iduser,$id_criterion);
	}
	if ($empathique<8){
		$id_criterion=16;
		insertLink($iduser,$id_criterion);
	}
	if ($optimiste>=8){
		$id_criterion=17;
		insertLink($iduser,$id_criterion);
	}
	if ($optimiste<8){
		$id_criterion=18;
		insertLink($iduser,$id_criterion);
	}
	if ($humoristique>=8){
		$id_criterion=19;
		insertLink($iduser,$id_criterion);
	}
	if ($humoristique<8){
		$id_criterion=20;
		insertLink($iduser,$id_criterion);
	}

	AddDefaultForum($pseudo);

}

function profile() {
	$err = flash('err');
	require ("views/Profil.php");
	return;
}

function logout() {
	session_destroy();
	session_start();
	redirect("utilisateur", "login_form");
}


function AddFriend(){

	$pseudo = $_SESSION['pseudo'];
	$pseudoFriend = $_POST['pseudoFriend'] ;


	if (count($pseudoFriend) < 0) {
		flash ('err', 'c vide hein!');
		$_SESSION['pseudo'] = $pseudo;
		redirect("utilisateur", "profile");
		return;
	}

	$iduser = getID($pseudo);
	echo $iduser;
	if($iduser === '0'){ //ptt false à voir...
		flash('err', 'error');
		$_SESSION['pseudo'] = $pseudo;
		redirect("utilisateur", "profile");
		return;
	}

	$idfriend = getID($pseudoFriend);
	echo $idfriend;
	if($idfriend === '0'){
		flash('err', 'on trouve rien frère');
		$_SESSION['pseudo'] = $pseudo;
		redirect("utilisateur", "profile");
		exit;
	}

	$err = insert_friend($iduser,$idfriend);
	if($err !== null){
		flash('err', $err);
		redirect("utilisateur", "profile");
		return;
	}	

	$_SESSION['pseudo'] = $pseudo;
	redirect("utilisateur", "profile");
	flash('err', 'u have a new friend! ;)');
	return;
}


function AddDefaultForum($pseudo){

	$idcriterion = array();
	$idcriterion = getIDCriterion($pseudo);
	
	if(count($idcriterion) < 1){
		flash('err', 'any result finded!');
		return;
	}
	$id_criterion = $idcriterion[0];
	$res = addOnForum($pseudo, $id_criterion);
	if($res === 0){
		flash('err', 'error!');
		return;

	}

	$_SESSION['pseudo'] = $pseudo;
	redirect("utilisateur", "profile");
	return;

}



function showFriends($pseudo){ 
	
	$idfriend = array();
	$idfriend = getFriendID($pseudo);
	if(count($idfriend) < 1){
		flash('err', 'you have any friend!');
		return;
	}
	
	$size = sizeof($idfriend);

	for($i = 0; $i<$size;$i++){
		
		?> <form method="post" action="<?= route("utilisateur", "showProfilFriend") ?>"> 
			<?php echo '<p style="color:#FFFFFF;">'. getPseudo($idfriend[$i]) .' '; ?> </p> <br>  
			<?php $friend = getPseudo($idfriend[$i]); $age = getAge($idfriend[$i]); $sex = getSex($idfriend[$i]); ?>
			<input type="hidden" name="friend" value= " <?php echo $friend ?> " >
			<input type="hidden" name="age" value= " <?php echo $age ?> " >
			<input type="hidden" name="sex" value= " <?php echo $sex ?> " >
			<input type="submit" value="Afficher le profil ">
		</form> <?php 	
	}
	
}

function showProfilFriend(){
	$err = flash('err');
	require ("views/ProfilFriend.php");
	return;
}

function showForum(){
	$err = flash('err');
	require ("views/Forum.php");
	return;
}

function showResultTest($pseudo){

	$idcriterion = array();
	$idcriterion = getIDCriterion($pseudo);
	
	if(count($idcriterion) < 1){
		flash('err', 'any result finded!');
		return;
	}

	for($x=0; $x<sizeof($idcriterion); $x++){
		echo " "; ?> </p> <br><?php 
		$info = array();
		$info = getInfo_criterium($idcriterion[$x]);
		for($i=0; $i<sizeof($info); $i++){
			
			echo '<p style="color:#FFFFFF;">'.$info[$i]; ?> <br> <?php 	
					
		}
	}
}

function addPost(){

	$pseudo = $_SESSION['pseudo'];
	$content = $_POST['content'];
	
	if(count($content) <1){
		flash('err', 'write something please');
		redirect("utilisateur", "showForum");
		return;
	}
	
	$allcontent = $pseudo ." : " .$content;
	
	$idcriterion = array();
	$idcriterion = getIDCriterion($pseudo);
	
	if(count($idcriterion) < 1){
		flash('err', 'any result finded!');
		return;
	}
	$id_criterion = $idcriterion[0];

	$res = NewForumMessage($pseudo, $id_criterion, $allcontent);
	if($res === 0){
		flash('err', 'impossible to add this post');
		return;
	}

	$_SESSION['pseudo'] = $pseudo;
	redirect("utilisateur", "showForum");
	return;

}

function showMessageForum($pseudo){

	$idcriterion = array();
	$idcriterion = getIDCriterion($pseudo);
	
	if(count($idcriterion) < 1){
		flash('err', 'any result finded!');
		return;
	}
	$id_criterion = $idcriterion[0];

	$res = array();
	$res = getMessageForum($id_criterion);
	if(count($idcriterion) < 1){
		flash('err', 'Add a new Post and share it!');
		return;
	}

	for($i=0; $i<sizeof($res); $i++){

		echo $res[$i]; ?> <br> <?php
	}


}