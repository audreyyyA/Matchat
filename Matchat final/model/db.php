<?php

$host = 'localhost';
$db   = 'baizo';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function get_user($pseudo) {
	global $pdo;

	$stmt = $pdo->prepare("select * from users where pseudo = ? limit 1");
	if ($stmt === false) {
		return [null, $pdo->error_get_last()];
	}

	$res = $stmt->execute([$pseudo]);
	if ($res === false) {
		return [null, $pdo->error_get_last()];
	}

	return [$stmt->fetch(), null];
}


function insert_user($pseudo, $password, $email, $age, $sex){
	global $pdo;

	$stmt = $pdo->prepare("insert into users (pseudo, age, password, email, sex) values (?, ?, ?, ?, ?)");
	if ($stmt === false) {
		return $pdo->error_get_last();
	}

	$res = $stmt->execute([$pseudo, $age, $password, $email, $sex]);
	if ($res === false) {
		return $pdo->error_get_last();
	}

	return null;
}

function deleteUser($pseudo){ //new function
	global $pdo;

	$stmt = $pdo->prepare("delete from users where pseudo = ?");
	if ($stmt === false) {
		return $pdo->error_get_last();
	}

	$res = $stmt->execute([$pseudo]);
	if ($res === false) {
		$res = '0';
		return $res;
	}

	return null;
}

function insert_friend($iduser,$idfriend){

	global $pdo;

		$stmt = $pdo->prepare("insert into friend (users_id, friend_id) values (?, ?)");
		if ($stmt === false) {
				return $pdo->error_get_last();
			}
		$res = $stmt->execute([$iduser,$idfriend]);
		
		if ($res === false) {
			$oups = "This friend doesnt exist or is already added";
			return $oups;
		}

		return null;
}

function insertLink($iduser,$id_criterion){

	global $pdo;

	$stmt = $pdo->prepare("insert into link (users_id, criterion_id) values (?, ?)");
	if ($stmt === false) {
		return $pdo->error_get_last();
	}

	$res = $stmt->execute([$iduser,$id_criterion]);
	if ($res === false) {
		return $pdo->error_get_last();
	}

	return null;

}

function getFriendID($pseudo){

	global $pdo;
	$iduser = getID($pseudo);

	$stmt = $pdo->prepare("select friend_id from friend where users_id = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		}

	$stmt->execute(array($iduser));
	$count = 0;
	$table = array();
	
	while($donnees = $stmt->fetch())
	{
		$table[$count] = $donnees ['friend_id'];
		$count++;
	}

	if ($donnees === null) {
		
		$donnees = 0;
		return $donnees;
	}
	return $table;
}

function getID($pseudo){

	global $pdo;
	
	$stmt = $pdo->prepare("select id from users where pseudo = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		}

	$stmt->execute([$pseudo]);
	$res = $stmt->fetchColumn();
	
	if ($res === false) {
		$res = "0";
		return $res;
	}
		return $res;
}

function getPseudo($iduser){

	global $pdo;
	
	$stmt = $pdo->prepare("select pseudo from users where id = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		}

	$stmt->execute([$iduser]);
	$res = $stmt->fetchColumn();
	
	if ($res === false) {
		$res = "0";
		return $res;
	}
	
	return $res;

}

function getIDCriterion($pseudo){

	global $pdo;
	$iduser = getID($pseudo);

	$stmt = $pdo->prepare("select criterion_id from link where users_id = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		}

	$stmt->execute(array($iduser));
	$count = 0;
	$table = array();
	
	while($donnees = $stmt->fetch())
	{
		$table[$count] = $donnees ['criterion_id'];
		$count++;
	}

	if ($donnees === null) {
		
		$donnees = 0;
		return $donnees;
	}
	return $table;

}

function getInfo_criterium($idcriterion){

	global $pdo;
	
	$stmt = $pdo->prepare("select * from criterion where id = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		}

	$stmt->execute([$idcriterion]);

	$table = array();
	
	$donnees = $stmt->fetch();
	$table[0] = $donnees['name'];
	$table[1] = $donnees['description'];
	$table[2] = $donnees['nameforum'];

	if ($donnees === null) {
		
		$donnees = 0;
		return $donnees;
	}
	return $table;
}

function getAge($id){

	global $pdo;
	
	$stmt = $pdo->prepare("select age from users where id = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		
		}

	$stmt->execute([$id]);

	$res = $stmt->fetchColumn();
	
	if ($res === false) {
		$res = "0";
		return $res;
	}
		return $res;

}


function getSex($id){

	global $pdo;
	
	$stmt = $pdo->prepare("select sex from users where id = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		
		}

	$stmt->execute([$id]);

	$res = $stmt->fetchColumn();
	
	if ($res === false) {
		$res = "0";
		return $res;
	}
		return $res;

}

function addOnForum($pseudo, $id_criterion){

	global $pdo;
	$iduser = getID($pseudo);

	$stmt = $pdo->prepare("insert into onforum (users_id, criterion_id) values (?, ?)");
	if ($stmt === false) {
		return $pdo->error_get_last();
	}

	$res = $stmt->execute([$iduser,$id_criterion]);
	if ($res === false) {
		$res = 0;
		return $res;
	}
	return true;
}

function NewForumMessage($pseudo, $id_criterion, $content){

	global $pdo;
	$iduser = getID($pseudo);

	$stmt = $pdo->prepare("insert into forummessage (content, users_id, criterion_id) values (?, ?, ?)");
	if ($stmt === false) {
		return $pdo->error_get_last();
	}

	$res = $stmt->execute([$content,$iduser,$id_criterion]);
	if ($res === false) {
		$res = 0;
		return $res;
	}
	return true;

}

function getMessageForum($id_criterion){

	global $pdo;

	$stmt = $pdo->prepare("select content from forummessage where criterion_id = ?");
		if ($stmt === false) {
			return $pdo->error_get_last();
		}

	$stmt->execute(array($id_criterion));
	$count = 0;
	$table = array();
	
	while($donnees = $stmt->fetch())
	{
		$table[$count] = $donnees ['content'];
		$count++;
	}

	if ($donnees === null) {
		
		$donnees = 0;
		return $donnees;
	}
	return $table;

}


