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
        $artistlink = "<a href =\"/artist.php?artid=$artid1\">  $art1 </a>" . "<a href =\"/artist.php?artid=$artid2\">  $art2 </a>";
        
    }
    else 
     {
        $artist = $art1;
     };


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
    

    <title><?php echo $artist; ?></title>
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
                        '<h1 class="text-center">' . $artist . ' - ' . $results['title'] . '</h1>' . 
                        '                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold d-flex">Исполнитель: </div>
                        <div class="col-md-6">' . $artist . '</div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold">Трек: </div>
                        <div class="col-md-6">' . $results['title'] . '</div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold">Дата добавления: </div>
                        <div class="col-md-6">' . $results['data'] . '</div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold">Продолжительность: </div>
                        <div class="col-md-6">' . $results['length'] . '</div>
                    </div>';
                     ?> 

<!-- Удаление записи -->
<form method="post" action="music.php?id=<?php echo $results['id'] ?>"> 
<button class="delete-btn" name="delete" type="submit">Удалить</button>
<button class="edit-btn" ><a href="/edit.php?id=<?php echo $results['id'] ?>  ">Редактировать</a></button>
<?php
If(isset($_POST['delete'])) {
$querydell = "DELETE FROM `articles` WHERE `id` = ?";
$paramsdell = [$id];
$stdell = $connection->prepare($querydell);
$stdell->execute($paramsdell);
echo 'Пост удален, перенаправление на главную';
echo '<script>setTimeout(function(){location.replace("/");}, 1000);</script>';
};
?>
</form>
<!-- Конец кода удаления -->

<!-- Вывод комментариев -->
<h4 class="h4_title">Комментарии</h4>
<?php
               $connect = mysqli_connect('localhost', 'root', '', 'music_db');  
                $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `id` = $id");
                while ($com = mysqli_fetch_assoc($comments)) {
                echo '<div class="comments">
                <div class="comments-avatar"><img src="/img/avatar.jpg" alt="">
                <div class="comments-name">' . $com['name'] . '</div>
                </div>
                <div class="comments-content">' . $com['comtext'] . '</div>
            </div>';
             }                        
?>
<!-- Вывод комментариев -->
<h4 class="h4_title">Добавить комментарий</h4>
             <form method="post" action="music.php?id=<?php echo $results['id'] ?>">  

             
<?php

// Проверить нажата ли кнопка
If(isset($_POST['save'])){
try {


// Включение вывода ошибок
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Указать парамерты SQL запроса
$stmt = $connection->prepare("INSERT INTO comments (id, name, email, comtext) VALUES (:id, :name, :email, :comtext)");
// Забиндить значения
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':comtext', $comtext);
// Указать значения
$id = $id;
$name = $_POST['name'];
$email = $_POST['email'];
$comtext = $_POST['comtext'];
// Заменить значения в SQL запросес
$stmt->execute();
echo "Ваш комментарий добавлен";
}catch(PDOException $e){
echo "Ошибка: " . $e->getMessage();
}
$connection = null;

} ?>

                        <div class="commentadd">
                                <div class="commentadd-names">
                                    <input type="text" name="name" placeholder="Ваше имя" required>
                                    <input type="email" name="email" placeholder="Ваш E-Mail" required>
                                </div>
                                <textarea name="comtext" id="" cols="30" rows="10" placeholder="Ваш комментарий" required></textarea>
                                <button class="commentadd-btn" name="save" type="submit">Отправить</button>
                        </div>
                    </form>


                



                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>