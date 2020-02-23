<?php 
include "db.php";
$queryadd = $connection->query('SELECT * FROM artists');
    $artists = $queryadd->FETCHALL(PDO::FETCH_ASSOC);
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
    

    <title>Add music</title>
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
                        
                       

                         




<h4 class="h4_title text-center">Добавить пост</h4>
             <form method="post" action="add-script.php">  
                              <div class="musicadd">
                                <div class="musicadd-names">
                                <select name="artist1" required> 
                                <option value="">Выберите исполнителя</option>
                          <?php
                         foreach( $artists   as  $artos )
                        {
                            echo
                            '<option value="' . $artos['artist_name'] . '">' . $artos['id'] . ' ' . $artos['artist_name'] .  '</option>';
                         };
                          ?>
                         </select>                 
    
                         </select>
                          <select name="artist2" required> 
                          <option value="">Выберите исполнителя</option>
                          <?php
                         foreach( $artists   as  $artos )
                        {
                            echo
                            '<option value="' . $artos['artist_name'] . '">' . $artos['id'] . ' ' . $artos['artist_name'] .  '</option>';
                         }; ?>
                         </select>
                                    <input type="text" name="title" placeholder="Название песни" required>
                                    <input type="text" name="length" placeholder="Длительность" required>
                                </div>
                               
                                <button class="musicadd-btn" name="add" type="submit">Отправить</button>
                        </div>
                    </form>


                



                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>  
