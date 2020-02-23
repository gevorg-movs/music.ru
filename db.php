<?php 
 session_start();
$connection = new PDO('mysql:host=localhost;dbname=music_db', 'root', '');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect = mysqli_connect('localhost', 'root', '', 'music_db');  
