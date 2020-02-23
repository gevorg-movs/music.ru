<?php
include "db.php";

$id = $_GET['id'];
// Проверить нажата ли кнопка
If(isset($_POST['save'])){
try {


// Включение вывода ошибок
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Указать парамерты SQL запроса
$stmt = $connection->prepare("INSERT INTO comments (id, name, email, comtext) VALUES (:id, :name, :email, :comtext)");
// Забиндить значения
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':comtext', $comtext);
// Указать значения
$id = $id;
$name = $_POST['name'];
$email = $_POST['email'];
$comtext = $_POST['comtext'];
// Заменить значения в SQL запросес
$stmt->execute();
header ("location: /music.php?id=$id");
}catch(PDOException $e){
echo "Ошибка: " . $e->getMessage();
}
$connection = null;

} ?>