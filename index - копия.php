<?php 
include "db.php";

?>



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,600,700&display=swap" rel="stylesheet">
    <title>Music</title>
</head>
<body>
<?php include "header.php";

?>



    <main>
        <div class="container">
            <div class="site-content">
                <div class="sidebar">
                    <div class="sidebar-menu">
                        <div class="sidebar-desc">меню</div>
                        <ul>
                            <li><a href="#">Топ Чарты</a></li>
                            <li><a href="#">Рейтинговые треки</a></li>
                            <li><a href="#">Музыкальные сборники</a></li>
                            <li><a href="#">Жанры</a></li>
                            <li><a href="#">ТОП Альбомы</a></li>
                            <li><a href="#">Популярные исполнители</a></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="content">
                    <div class="in-content">
                        <h2>Популярные треки</h2>
                       

                        <?php
                         $id = 5;

                        foreach($connection->query('SELECT * FROM `articles` WHERE `id` = 4') as $row) {
                            
                            
                            $params = [  ':id' => $id ];
                            $stmt = $pdo->prepare($query);
                            $stmt->execute($params);
                            
                            echo $id . ' ' .'<a href="/music.php?id='. $row['id'] .'">link</a>' .
                            '<div class="music">
                            <div class="music-logo">
                                <img class="play-img" src="/img/play.jpg" alt="">
                            </div>
                            <div class="music-logo">
                                <img class="music-img" src="/img/rihanna.jpg" alt="">
                            </div>
                            <div class="music-artist">
                                <div class="music-song"><a href="#">'
                                
                                . '<a href="/music.php?id='. $row['id'] .'"> ' . $row['title'] . ' </a>' .
                                
                            '</a></div>
                                <div class="music-artist-title"><a href="#">' . '<a href="/artist.php?id='. $row['id'] .'"> ' . $row['artist'] . ' </a>' . '</a></div>
                            </div>
                            <div class="music-duration">' . $row['length'] . '</div>
                            <div class="music-download"><a href="#">D</a></div>
                        </div>'  ;
                        }
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>