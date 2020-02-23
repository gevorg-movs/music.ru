<?php 
include "db.php";
$name = $_POST['name'];
$email = $_POST['email'];
$text = $_POST['comtext'];
echo $name . $email . $text;

$sql = "UPDATE `comments` SET `name` = :name WHERE `id` = :id";
$params = [
    ':id' => $id,
    ':name' => $name
];
$stm = $connection->prepare($sql);
$stm->execute($params);




?>