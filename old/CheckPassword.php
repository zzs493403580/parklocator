<?php
function CheckPassword($username, $password){
	$salt = '4b3403665fea6';
	//$pdo = new PDO('mysql:host=localhost;dbname=assignment1', 'min', 'Secret!');
	$pdo = new PDO('mysql:host=localhost;dbname=parks', 'parkReader', 'zzs123456');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$query = $pdo->prepare('SELECT * FROM users WHERE username = :username and password = SHA2(CONCAT(:password, :salt), 0)');
	$query->execute(array(
						'username' => $username,
						'password' => $password,
						'salt' => $salt
					));
	
	return $query->rowCount() > 0;
	



}





?>