<?php include "db.php";

$username = htmlspecialchars($_POST['username']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

$sql = "SELECT * FROM `users` WHERE `username` = :username";
$stm = $connection->prepare($sql);
$stm->execute([ ':username' => $username  ]);
$result = $stm->fetch(PDO::FETCH_ASSOC);

if(!empty($result)) {
	echo "Пользователь с таким логином уже зарегиситрирован";
}

// Проверить нажата ли кнопка и введены ли все поля
If( isset($_POST['register']) && $_POST['username'] != "" && $_POST['password'] != "" ){
try {

// Включение вывода ошибок
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Указать парамерты SQL запроса
$stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

// Забиндить значения
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);


// Заменить значения в SQL запросес
$stmt->execute();

	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['id'] = $results['id'];
	header('Location: /');

}catch(PDOException $e){
echo "Ошибка: " . $e->getMessage();
}
$connection = null;
} else {
    echo "Заполните все поля";
} ?>