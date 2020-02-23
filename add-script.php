<?php
include "db.php";


// Проверить нажата ли кнопка
If(isset($_POST['add'])){
try {


// Включение вывода ошибок
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Указать парамерты SQL запроса
$stmt = $connection->prepare("INSERT INTO articles (title, artist1, artist2, length, data) VALUES (:title, :artist1, :artist2, :length, :data)");
// Забиндить значения

$stmt->bindParam(':title', $title);
$stmt->bindParam(':artist1', $artist1);
$stmt->bindParam(':artist2', $artist2);
$stmt->bindParam(':length', $length);
$stmt->bindParam(':data', $data);
// Указать значения

$title = strip_tags($_POST['title']);
$artist1 = $_POST['artist1'];
$artist2 = $_POST['artist2'];
$length = strip_tags($_POST['length']);
$data = date("Y-m-d H:i:s");
// Заменить значения в SQL запросес
$stmt->execute();


header ("Location: /");

}catch(PDOException $e){
echo "Ошибка: " . $e->getMessage();
}
$connection = null;

}; ?>