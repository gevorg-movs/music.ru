<?php 
include "db.php";
$id = $_GET['id'];

 // Запрос в базу для получения информации про песню
 $sql = "SELECT * FROM `articles` WHERE `id` = :id";
 $stm = $connection->prepare($sql);
 $stm->execute([
      ':id' => $id

      ]);
 $results = $stm->fetch(PDO::FETCH_ASSOC);
 $art1 = $results['artist1'];
 $art2 = $results['artist2'];
 // Конец запроса
    if($results['artist2']) { 
        
        $artist = $art1 . ', ' . $art2;              
    }
    else 
     {
        $artist = $art1;
     };

?>



<!DOCTYPE html>
<html lang="ru">
<head>
<?php include "head.php"; ?>
    <title><?php echo $artist . " - " . $results['title']; ?></title>
</head>
<body>
<?php include "header.php";?>
    <main>
        <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content">
                    <div class="in-content">                       
                    <h1 class="text-center mb-4"> <?= $artist . ' - ' . $results['title']  ?></h1>
                       <div class="row"> 
                        <div class="col-md-4 offset-md-1 font-weight-bold d-flex">Исполнитель: </div>
                        <div class="col-md-6"> <?= $artist  ?></div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-4 offset-md-1 font-weight-bold">Трек: </div>
                        <div class="col-md-6"> <?=$results['title'] ?> </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-4 offset-md-1 font-weight-bold">Дата добавления: </div>
                        <div class="col-md-6"><?= $results['data'] ?></div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-4 offset-md-1 font-weight-bold">Продолжительность: </div>
                        <div class="col-md-6"> <?= $results['length'] ?> </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4"> 
                        <a href="/delete.php?id=<?=$results['id'] ?>"><button class="mr-2 btn btn-danger">Удалить</button></a>
                        <a href="/edit.php?id=<?= $results['id'] ?>  "><button class="btn btn-primary" >Редактировать</button></a>
                    </div>

<!-- Вывод комментариев -->
<h2 class="text-center m-5">Комментарии</h2>
<?php
$querycom  = $connection->query("SELECT * FROM `comments` WHERE `id` = '$id'");
$result = $querycom->FETCHALL(PDO::FETCH_ASSOC);
foreach( $result  as  $comment )
{ ?>
    <div class="comment-box">
        <div class="d-flex align-items-center mb-3">
            <div class="comment-avatar"><img class="comment-avatar" src="/img/avatar.jpg" alt=""></div>
            <div class="">
                <div class="row">
                    <div class="col-md-12"><h5 class=""><?= $comment['name']; ?></h5></div>
                    <div class="col-md-12"><p><?= $comment['comtext']; ?></p></div>
                </div>
                
            </div>
        </div>
    </div>
<?php } ?>
<!-- Вывод комментариев -->

<!-- Добавление комментариев -->
<h4>Добавить комментарий</h4>
<form method="post" action="comment-add.php?id=<?php echo $results['id'] ?>">  
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Ваше имя" required>
                        </div>
                    
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <input  class="form-control"  type="email" name="email" placeholder="Ваш E-Mail" required>
                        </div>
                    </div>
                    
                </div>
                <div class="form-group">
                    <textarea class="form-control"  name="comtext" id="" cols="30" rows="10" placeholder="Ваш комментарий" required></textarea>
                </div>
                <button class="btn btn-success" name="save" type="submit">Отправить</button>                       
            </form>  
<!-- Добавление комментариев --> 
                    </div>
                </div>               
            </div>
        </div>
    </main>
</body>
</html>