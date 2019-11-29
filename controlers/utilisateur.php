<?php
//je te modifie vddb
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

function register() {

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

	$err = insert_user($pseudo, $password, $email);
	if ($err !== null) {
		flash('err', $err);
		redirect("utilisateur", "register_form");
		return;
	}

	$_SESSION['pseudo'] = $pseudo;
	redirect("utilisateur", "profile");
	return;
}

function newTest(){

	$pseudo = $_SESSION['pseudo'];

	$social1 = isset($_POST['social1'])?($_POST['social1']):'';
	$social2 = isset($_POST['social2'])?($_POST['social2']):'';
	$social3 = isset($_POST['social3'])?($_POST['social3']):'';
	$social = $social1 + $social2 + $social3;

	$agreable1 =isset($_POST['agreable1'])?($_POST['agreable1']):'';
	$agreable3 =isset($_POST['agreable3'])?($_POST['agreable3']):'';
	$agreable2 =isset($_POST['agreable2'])?($_POST['agreable2']):'';
	$agreable= $agreable1+$agreable2+$agreable3;


	$orgueilleux1 =isset($_POST['orgueilleux1'])?($_POST['orgueilleux1']):''; 
	$orgueilleux2 =isset($_POST['orgueilleux2'])?($_POST['orgueilleux2']):'';
	$orgueilleux3 =isset($_POST['orgueilleux3'])?($_POST['orgueilleux3']):'';
	$orgueilleux= $orgueilleux1+$orgueilleux2+$orgueilleux3;

	$froid1 =isset($_POST['froid1'])?($_POST['froid1']):'';
	$froid2 =isset($_POST['froid2'])?($_POST['froid2']):'';
	$froid3 =isset($_POST['froid3'])?($_POST['froid3']):'';
	$froid= $froid1+$froid2+$froid3;
	


	$suiveur1 =isset($_POST['suiveur1'])?($_POST['suiveur1']):''; 
	$suiveur2 =isset($_POST['suiveur2'])?($_POST['suiveur2']):'';
	$suiveur3 =isset($_POST['suiveur3'])?($_POST['suiveur3']):'';
	$suiveur= $suiveur1+$suiveur2+$suiveur3;
	


	$superficiel1 =isset($_POST['superficiel1'])?($_POST['superficiel1']):'';
	$superficiel2 =isset($_POST['superficiel2'])?($_POST['superficiel2']):'';
	$superficiel3 =isset($_POST['superficiel3'])?($_POST['superficiel3']):'';
	$superficiel= $superficiel1+$superficiel2+$superficiel3;


	$anxieux1 =isset($_POST['anxieux1'])?($_POST['anxieux1']):'';
	$anxieux2 =isset($_POST['anxieux2'])?($_POST['anxieux2']):'';
	$anxieux3 =isset($_POST['anxieux3'])?($_POST['anxieux3']):'';
	$anxieux= $anxieux1+$anxieux2+$anxieux3;
	

	$empathique1 =isset($_POST['empathique1'])?($_POST['empathique1']):'';
	$empathique2 =isset($_POST['empathique2'])?($_POST['empathique2']):'';
	$empathique3 =isset($_POST['empathique3'])?($_POST['empathique3']):'';
	$empathique= $empathique1+$empathique2+$empathique3;
	
	$optimiste1 =isset($_POST['optimiste1'])?($_POST['optimiste1']):'';
	$optimiste2 =isset($_POST['optimiste2'])?($_POST['optimiste2']):'';
	$optimiste3 =isset($_POST['optimiste3'])?($_POST['optimiste3']):'';
	$optimiste= $optimiste1+$optimiste2+$optimiste3;
	

	$humoristique1 =isset($_POST['humoristique1'])?($_POST['humoristique1']):'';
	$humoristique2 =isset($_POST['humoristique2'])?($_POST['humoristique2']):'';
	$humoristique3 =isset($_POST['humoristique3'])?($_POST['humoristique3']):'';
	$humoristique= $humoristique1+$humoristique2+$humoristique3;
	
	if(count(_POST) < 1){
		deleteUser($pseudo);
		redirect("utilisateur", "register_form");
		//+message d'erreur et supp utilisateur
	}


	//condition d'insertion:
	if ($social>=8){
		$id_criterion=1;
		insertLink($iduser,$idcriterion);
	}
	elseif ($social<8){
		$id_criterion=2;
		insertLink($iduser,$idcriterion);
	}
	elseif ($agreable>=8){
		$id_criterion=3;
		insertLink($iduser,$idcriterion);
	}
	elseif ($agreable<8){
		$id_criterion=4;
		insertLink($iduser,$idcriterion);
	}
	elseif ($froid>=8){
		$id_criterion=5;
		insertLink($iduser,$idcriterion);
	}
	elseif ($froid<8){
		$id_criterion=6;
		insertLink($iduser,$idcriterion);
	}
	elseif ($orgueilleux>=8){
		$id_criterion=7;
		insertLink($iduser,$idcriterion);
	}
	elseif ($orgueilleux<8){
		$id_criterion=8;
		insertLink($iduser,$idcriterion);
	}
	elseif ($suiveur>=8){
		$id_criterion=9;
		insertLink($iduser,$idcriterion);
	}
	elseif ($suiveur<8){
		$id_criterion=10;
		insertLink($iduser,$idcriterion);
	}
	elseif ($superficiel>=8){
		$id_criterion=11;
		insertLink($iduser,$idcriterion);
	}
	elseif ($superficiel<8){
		$id_criterion=12;
		insertLink($iduser,$idcriterion);
	}
	elseif ($anxieux>=8){
		$id_criterion=13;
		insertLink($iduser,$idcriterion);
	}
	elseif ($anxieux<8){
		$id_criterion=14;
		insertLink($iduser,$idcriterion);
	}
	elseif ($empathique>=8){
		$id_criterion=15;
		insertLink($iduser,$idcriterion);
	}
	elseif ($empathique<8){
		$id_criterion=16;
		insertLink($iduser,$idcriterion);
	}
	elseif ($optimiste>=8){
		$id_criterion=17;
		insertLink($iduser,$idcriterion);
	}
	elseif ($optimiste<8){
		$id_criterion=18;
		insertLink($iduser,$idcriterion);
	}
	elseif ($humoristique>=8){
		$id_criterion=19;
		insertLink($iduser,$idcriterion);
	}
	elseif ($humoristique<8){
		$id_criterion=20;
		insertLink($iduser,$idcriterion);
	}

	$_SESSION['pseudo'] = $pseudo;
	redirect("utilisateur", "profile");
	return;

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


function ShowForum(){

	//affiche une autre page montrant les forums d'un utilisateur
/*insert into onforum (users_id, criterion_id)
value (1,38)*/

}

function addForum(){

	include("/model/db.php");
	//$pseudo = isset ($_POST['pseudo'])?($_POST['pseudo']):''; //pour rester sur la session en question..
	$name = isset ($_POST['name'])?($_POST['name']):'';

	if(count($_POST)==0){
		exit; //rien ne se passe rester sur la page
	}else{
		
		if(ForumIsExist($name)){
			require("/model/utilisateurBD.php");
			addForumUser($pseudo,$name);//ajoute le forum dans la liste de l'utilisateur
		}else{
			exit;
		}	
	}
}

function ForumIsExist($name){ //get forum à la place
	require("/model/utilisateurBD.php");
	return ForumIsExistBD($name);
}

function showFriends($pseudo){ //get friend à la place
	
	include("/model/db.php");
	//$pseudo = $_SESSION['pseudo'];
	$friends = "pas d'ami";
	echo $pseudo;

		try{

			$friends = findFriend($pseudo);
			echo $friends;
			return $friends;
		}
		catch  (\PDOException $e) {
	    	throw new \PDOException($e->getMessage(), (int)$e->getCode());
			return $friends;
		}	
	return $friends;
}


function findFriend($pseudo){

	echo $pseudo;
	require("/model/utilisateurBD.php");
	return findFriendBD($pseudo);
}