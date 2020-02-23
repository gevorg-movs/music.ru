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
    <link rel="stylesheet" href="/css/bootstrap.css">
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
                        <?php include "menu.php"; ?>
                    </div>
                    
                </div>
                <div class="content">
                    <div class="in-content">
                        <h2>Популярные треки</h2>
                         <?php                   
                         $querycon  = $connection->query("SELECT * FROM articles LIMIT 15");
                        $result = $querycon->FETCHALL(PDO::FETCH_ASSOC);
                        foreach( $result  as  $results )
                        {
                            echo  
                            '<a href="/blyatt"><div class="music">
                            <div class="music-logo"><img class="play-img" src="/img/play.jpg" alt=""> </div>
                            <div class="music-logo"><img class="music-img" src="/img/rihanna.jpg" alt=""></div>
                            <div class="music-artist">
                                <div class="music-song"><a href="/music.php?id='. $results['id'] .'">' . $results['title'] . ' </a></div>
                                <div class="music-artist-title"><a href="/artist.php?id='. $results['id'] .'">' . $results['artist1'] . ' </a></div>
                            </div>
                            <div class="music-duration">' . $results['length'] . '</div>
                            <div class="music-download"><a href="#">' . $results['views'] . '</a></div>
                            </div></a>';
                         } ?> 

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>