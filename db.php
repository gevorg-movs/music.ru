<?php 
session_start();
$connection = new PDO('mysql:host=localhost;dbname=ca17463_music', 'ca17463_music', '123456789');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect = mysqli_connect('localhost', 'ca17463_music', '123456789', 'ca17463_music');  
