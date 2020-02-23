<?php
include "db.php";
// Проверка, есть ли такой исполнитель в базе
$artist1 = $_POST['artist1'];
$artist2 = $_POST['artist2'];
$stm = $connection->prepare("SELECT * FROM `artists` WHERE `artist_name` = :artist1 OR `artist_name` = :artist2");
$stm->execute([ 
   ':artist1' => $artist1,
   ':artist2' => $artist2  ]);
$results = $stm->fetchALL(PDO::FETCH_ASSOC);
// Проверка, есть ли такой исполнитель в базе
?>






<!DOCTYPE html>
<html lang="ru">
<head>
<?php include "head.php"; ?>

    <title>Проверка</title>
</head>
<body>
<?php include "header.php"; ?>
    <main>
    <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content">
                    <div class="in-content">
                        
<h2>Проверка на исполхителя</h2>  
<form action="test.php" method="post">
    <div class="form-group"> Artist1: <input type="text" name="artist1" class="form-control"  /></div>
    <div class="form-group">Artist2: <input type="text" name="artist2" class="form-control" /></div>
    <div class="form-group"><input type="submit" value="Проверить" name="submit" class="btn btn-success" /></div>
 </form>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>