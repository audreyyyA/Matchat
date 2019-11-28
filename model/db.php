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


function insert_user($pseudo, $password, $email){
	global $pdo;

	$stmt = $pdo->prepare("insert into users (pseudo, age, password, email, sex) values (?, ?, ?, ?, ?)");
	if ($stmt === false) {
		return $pdo->error_get_last();
	}

	$res = $stmt->execute([$pseudo, 18, $password, $email, 'F']);
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

/*function ForumIsExistBD($name){ //vérifie si le forum existe (dans la base)

	try {
		$stmt = $pdo->prepare("select * from criterion where name = ?");
		$stmt->execute([$name]);
		$forum = $stmt->fetch();
		
		if ($forum!=null) {
			return true;
		}else{
			return false;
		}

		} catch  (\PDOException $e) {
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
		return false;
	}
	return false;
}*/

/*function addForumUser($pseudo,$name){
		
		
		try{
		$sql = "insert into onforum (users_id, criterion_id) value (?,?)";
		$pdo->prepare($sql)->execute([$pseudo, $name]); //récupérer les infos d'un critère avant...

		}catch (\PDOException $e) {
		throw new \PDOException($e->getMessage(), (int)$e->getCode());
		//return false;
	}
}*/

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

function insertLink($iduser,$idcriterion){

	global $pdo;

	$stmt = $pdo->prepare("insert into link (users_id, criterion_id) values (?, ?)");
	if ($stmt === false) {
		return $pdo->error_get_last();
	}

	$res = $stmt->execute([$iduser,$idcriterion]);
	if ($res === false) {
		return $pdo->error_get_last();
	}

	return null;

}

/*function findFriendBD($pseudo){

	$id_user = getID($pseudo);

	try {
		$sql = "select pseudo from user where pseudo =(select friend_id from friend where users_id  = ? )";
		$pdo->prepare($sql)->execute([$id_user]);

		} catch  (\PDOException $e) {
     	throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
		
		$infofriendpseudo = $res->fetchColumn();
		echo $infofriendpseudo;

		return $infofriendpseudo;
}*/

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

/*function user_existBD($pseudo){ //faire une condition avec if result > 0 ...

		$stmt = $pdo->prepare("select COUNT(*) from users where pseudo=?");
		$stmt->execute([$pseudo]);

		
		$result = $stmt->fetchColumn();
		return result;
}*/
