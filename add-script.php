<?php include "db.php";
// Проверка, есть ли такой исполнитель в базе
$artist1 = $_POST['artist1'];
$artist2 = $_POST['artist2'];
$stm = $connection->prepare("SELECT * FROM `artists` WHERE `artist_name` = :artist1 OR `artist_name` = :artist2");
$stm->execute([ 
   ':artist1' => $artist1,
   ':artist2' => $artist2  ]);
$results = $stm->fetchALL(PDO::FETCH_ASSOC);

// Проверить нажата ли кнопка 
If(isset($_POST['add']) && !empty($results) ){

// Включение вывода ошибок
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Указать парамерты SQL запроса
$stmt = $connection->prepare("INSERT INTO articles (title, artist1, artist2, length, data, author_id) VALUES (:title, :artist1, :artist2, :length, :data, :author_id)");

// Забиндить значения
$stmt->bindParam(':title', $title);
$stmt->bindParam(':artist1', $artist1);
$stmt->bindParam(':artist2', $artist2);
$stmt->bindParam(':length', $length);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':author_id', $author_id);

// Указать значения 
$title = strip_tags($_POST['title']);
$artist1 = $_POST['artist1'];
$artist2 = $_POST['artist2'];
$length = strip_tags($_POST['length']);
$data = date("Y-m-d H:i:s");
$author_id = $_SESSION['id'];
// Заменить значения в SQL запросес
$stmt->execute();
// Перенаправления на главную после добавления материала
header ("Location: /");

}; ?>