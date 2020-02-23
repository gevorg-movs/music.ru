<?php
include "db.php";


// Проверить нажата ли кнопка
If( isset($_POST['register']) && $_POST['username'] != "" && $_POST['password'] != "" ){
try {


// Включение вывода ошибок
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Включение вывода ошибок

// Указать парамерты SQL запроса
$stmt = $connection->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
// Забиндить значения

$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);

// Указать значения

$username = htmlspecialchars($_POST['username']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);




// $pass = password_hash($pass, PASSWORD_DEFAULT);

// Заменить значения в SQL запросес
$stmt->execute();


header ("Location: /register.php");

}catch(PDOException $e){
echo "Ошибка: " . $e->getMessage();
}
$connection = null;

} else {
    echo "Заполните все поля ска";
} ?>