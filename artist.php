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
 
                        
//Количество песен исполнителя



$fid = $_SESSION['id'];

$querycon  = $connection->query("SELECT * FROM articles  WHERE `artist2` = '$name' OR `artist1` = '$name'");
 $result = $querycon->FETCHALL(PDO::FETCH_ASSOC);
 $numberOfarticles = count($result);

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
                <div class="col-md-8 content">
                    <div class="in-content">
                        
                       
                    <h1 class="text-center mb-4"> <?=  $name  ?></h1>
                       <div class="row"> 
                        <div class="col-md-4 offset-md-1 font-weight-bold d-flex">Исполнитель: </div>
                        <div class="col-md-6"> <?=  $name  ?></div>
                    </div>
                    <div class="row mb-5"> 
                        <div class="col-md-4 offset-md-1 font-weight-bold">Треков: </div>
                        <div class="col-md-6"> <?= $numberOfarticles ?> </div>
                    </div>
                    
                 
                    <?php
                    foreach( $result  as  $results )
                        { 
                         ?>

                        <div class="row">
                          <div class="col-md-1">
                          <img class="avatar" src="/img/avatar.png" alt="">
                          </div>
                          <div class="col-md-7">
                              <div class="row">
                                <div class="col-md-12 font-weight-bold"><a href="/music.php?id=<?= $results['id']; ?>"><?= $results['title']; ?></a></div>
                                <div class="col-md-12"><?php
                                 echo $results['artist1'];
                                    if($results['artist2']) 
                                    {
                                        echo ", " . $results['artist2'];
                                    }
                                 ?></div>
                              </div>
                          </div>
                          <div class="col-md-3">
                          <?= $results['length']; ?>
                          </div>
                        </div>

                         <?php
                         } ?> 



                    
   
                    
                    
                    
                     </div></div>               
            </div>
        </div>
    </main>
</body>
</html>





