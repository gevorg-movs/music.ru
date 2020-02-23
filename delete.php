<?php
include "db.php";
$id = $_GET['id'];


$querydell = "DELETE FROM `articles` WHERE `id` = ?";
$paramsdell = [$id];
$stdell = $connection->prepare($querydell);
$stdell->execute($paramsdell);
header ('location: /');
?>