<?php 
include "db.php";
$id = $_GET['id'];


// Проверить нажата ли кнопка
If(isset($_POST['edit'])){
try {

  
// Включение вывода ошибок
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Указать парамерты SQL запроса
$stmt = $connection->prepare("UPDATE `articles` SET `title` = :title, `artist1` = :artist1, `artist2` = :artist2, `length` = :length, `data` = :data WHERE `id` = :id");

// Забиндить значения
$stmt->bindParam(':title', $title);
$stmt->bindParam(':artist1', $artist1);
$stmt->bindParam(':artist2', $artist2);
$stmt->bindParam(':length', $length);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':id', $id);

// Указать значения
$title = strip_tags($_POST['title']);
$artist1 = $_POST['artist1'];
$artist2 = $_POST['artist2'];
$length = strip_tags($_POST['length']);
$data = date("Y-m-d H:i:s");

// Заменить значения в SQL запросе
$stmt->execute();

$url = '/music.php?id=' . $id;
header ("Location: $url");


}catch(PDOException $e){
echo "Ошибка: " . $e->getMessage();
}
$connection = null;

}; ?>
             

                      