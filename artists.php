<?php 
include "db.php";
$querycon  = $connection->query("SELECT * FROM artists");
$result = $querycon->FETCHALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<?php include "head.php"; ?>
    <title>Исполнители</title>
</head>
<body>
<?php include "header.php"; ?>
<main> 
    <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content">
                    <div class="in-content">
                        <h2>Исполнители</h2>
                        <div class="row mb-2 font-weight-bold">
                            <div class="col-md-1">ID</div>
                            <div class="col-md-6">Имя исполнителя</div>
                            <div class="col-md-5">Количество треков</div>
                        </div>
                         <?php foreach( $result  as  $artist )
                        {
                            $artname = $artist['artist_name']; ?>
                        <div class="row">
                            <div class="col-md-1"><?= $artist['id']; ?></div>
                            <div class="col-md-6">
                                <a href="/artist.php?id=<?=$artist['id'];?>"><?=$artname;?></a>
                            </div>
                            <div class="col-md-5"><?php                                 
                                $numberOfUsers = $connection->query("SELECT COUNT(*) FROM articles 
                         WHERE `artist2` = '$artname' OR `artist1` = '$artname'")->fetchColumn();
                        echo "$numberOfUsers"; ?></div>
                        </div> 
                         <?php
                         };  ?>
                    </div>
                </div>               
            </div>
        </div>
    </main>
</body>
</html>





