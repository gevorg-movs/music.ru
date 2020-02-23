<?php
include "db.php";

// Запрос в базу для получения информации про пользователя
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM `users` WHERE `username` = :username";
$stm = $connection->prepare($sql);
$stm->execute([ ':username' => $username  ]);

$results = $stm->fetch(PDO::FETCH_ASSOC);

$hash = $results['password'];

if (password_verify($password, $hash)) {
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['id'] = $results['id'];
	header('Location: /');

} else {
	echo "Такого пользователя нет";
};

?>