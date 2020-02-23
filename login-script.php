<?php
include "db.php";


// Запрос в базу для получения информации про песню

$username = $_POST['username'];
$password = $_POST['password'];



 $sql = "SELECT * FROM `users` WHERE `username` = :username";
 $stm = $connection->prepare($sql);
 $stm->execute([ ':username' => $username  ]);

 $results = $stm->fetch(PDO::FETCH_ASSOC);

$hash = $results['password'];

if (password_verify($password, $hash)) {
	 	setcookie('user', $username, time() + 600, "/");
 	 	header('Location: /');
} else {
	echo "Такого пользователя нет";
}


  
 	 // if (!empty($results)) {

 	 // }
 	 // else {
 	 // 	echo "bad";
 	 // }

 	
?>