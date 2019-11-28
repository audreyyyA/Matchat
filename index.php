<?php
//changement
session_start();

$flash = isset($_SESSION['flash']) ? $_SESSION['flash'] : [];
$_SESSION['flash'] = [];

function flash($key, $value = null) {
	global $flash;
	if ($value === null) {
		return isset($flash[$key]) ? $flash[$key] : null;
	}
	$_SESSION['flash'][$key] = $value;
}

function redirect($controller, $action) {
	header("Location: ".route($controller, $action)); 
}

function route($controller, $action) {
	return "index.php?controle=$controller&action=$action"; 
}

if (isset($_GET['controle']) & isset($_GET['action'])) {
	$controle = $_GET['controle'];
	$action= $_GET['action'];
}
else { //absence de paramètres : prévoir des valeurs par défaut
	$controle = "utilisateur";
	$action= "login_form";
}

require ('controlers/' . $controle . '.php');   
$action ();
