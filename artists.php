<?php 
include "db.php";
$querycon  = $connection->query("SELECT * FROM artists");
$result = $querycon->FETCHALL(PDO::FETCH_ASSOC);
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
    <title>Artists</title>
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
                        <?php include "menu.php" ?>
                    </div>
                    
                </div>
                <div class="content">
                    <div class="in-content">
                        <h2>Популярные треки</h2>
                         <?php                   
                         
                        foreach( $result  as  $artist )
                        {
                           ?>

                            <div class="artist">
                                <div class="artist-id"><?php echo $artist['id']; ?></div>
                                <div class="artists-title"><?php 
                                
                                
                                $artname = $artist['artist_name'];
                                
                                echo $artname; ?></div>
                                <div class="artist-num"><?php 
                                
                                $numberOfUsers = $connection->query("SELECT COUNT(*) FROM articles 
                         WHERE `artist2` = '$artname' OR `artist1` = '$artname'")->fetchColumn();
                        echo "$numberOfUsers";
                                
                                
                                
                                
                                
                                ?></div>
                            </div>

                        
                        <?php
                         };
                         
                      ?> 


                           



                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>