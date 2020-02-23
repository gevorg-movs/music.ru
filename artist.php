<?php 
include "db.php";
$id = $_GET['id'];

 // Запрос в базу для получения информации про песню
 $sql = "SELECT * FROM `artists` WHERE `id` = :id";
 $stm = $connection->prepare($sql);
 $stm->execute([
      ':id' => $id

      ]);
 $results = $stm->fetch(PDO::FETCH_ASSOC);
 $name = $results['artist_name'];

//Количество песен исполнителя
  $numberOfarticles = $connection->query("SELECT COUNT(*) FROM articles 
                         WHERE `artist2` = '$name' OR `artist1` = '$name'")->fetchColumn();
                        
//Количество песен исполнителя
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
    

    <title><?php echo $results['artist_name']; ?></title>
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
                        
                       

                         <?php
                         
                         
                        
                         // Проверим, есть ли второй испольнитель, если да, то выводим именя двух испольнителей
                        echo
                        '<h1 class="text-center">' . $name . '</h1>' . 
                        '                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold d-flex">Исполнитель: </div>
                        <div class="col-md-6">' . $name . '</div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold">Трек: </div>
                        <div class="col-md-6">' . $numberOfarticles . '</div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold">Дата добавления: </div>
                        <div class="col-md-6">' . $results['date'] . '</div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold">Продолжительность: </div>
                        <div class="col-md-6">' . $results['length'] . '</div>
                    </div>';
                     ?> 






                



                    
                </div>
            </div>
        </div>
    </main>
</body>
</html>