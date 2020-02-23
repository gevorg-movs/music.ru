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
<?php include "head.php"; ?>
    

    <title><?php echo $results['artist_name']; ?></title>
</head>
<body>
<?php include "header.php";

?>



    <main>
    <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content"><div class="in-content">
                        
                       

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
                    ?>   </div></div>               
            </div>
        </div>
    </main>
</body>
</html>





