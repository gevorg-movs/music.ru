<?php 
session_start();
$connection = new PDO('mysql:host=localhost;dbname=g67166_db', 'g67166_dbuser', 'RjDyWPZUXn&iSjCi');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect = mysqli_connect('localhost', 'g67166_db', 'RjDyWPZUXn&iSjCi', 'g67166_dbuser');  
