<?php
include "db.php";
$username = $_POST['username'];
$password = $_POST['password'];

// Запрос в базу для получения информации про пользователя
$sql = "SELECT * FROM `users` WHERE `username` = :username";
$stm = $connection->prepare($sql);
$stm->execute([ ':username' => $username  ]);
$results = $stm->fetch(PDO::FETCH_ASSOC);
$hash = $results['password'];
// Проверка пароля
if (password_verify($password, $hash)) {
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['id'] = $results['id'];
	header('Location: /');

} else {
	echo "Такого пользователя нет";
};

?>