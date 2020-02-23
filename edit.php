<?php 
include "db.php";
$id = $_GET['id'];



$queryadd = $connection->query('SELECT * FROM artists');
$artists = $queryadd->FETCHALL(PDO::FETCH_ASSOC);

 // Запрос в базу для получения информации про песню
 $sql = "SELECT * FROM `articles` WHERE `id` = :id";
 $stm = $connection->prepare($sql);
 $stm->execute([
      ':id' => $id

      ]);
 $results = $stm->fetch(PDO::FETCH_ASSOC);
 $art1 = $results['artist1'];
 $art2 = $results['artist2'];
 $titler = $results['title'];
 $length = $results['length'];
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
                                           
<h4 class="h4_title">Редактировать <b><?php echo $artist . ' - ' . $titler; ?></b></h4>
<button><a href="music.php?id=<?php echo $results['id'] ?>">Перейти к записи</a></button>         
<form method="post" action="editor.php?id=<?php echo $results['id'] ?>">             

                        <div class="musicadd">
                                <div class="musicadd-names">
                                <select name="artist1" required > 
                                <option value="<?php echo $art1; ?>"><?php echo $art1; ?></option>
                          <?php
                         foreach( $artists   as  $artos )
                        {
                            echo
                            '<option value="' . $artos['artist_name'] . '">' . $artos['artist_name'] .  '</option>';
                         };
                          ?>
                         </select> 

                         <select name="artist2" > 
                                <option value="<?php echo $art2; ?>"><?php echo $art2; ?></option>
                                <option value="">Не выбрать</option>
                          <?php
                         foreach( $artists   as  $artos )
                        {
                            echo
                            '<option value="' . $artos['artist_name'] . '">' . $artos['artist_name'] .  '</option>';
                         };
                          ?>
                         </select>               
    
                         
                                    <input type="text" name="title" placeholder="Название песни" value="<?php echo $titler; ?>" required >
                                    <input type="text" name="length" placeholder="Длительность" value="<?php echo $length; ?>" required>
                                </div>
                               
                                <button class="musicadd-btn" name="edit" type="submit">Отправить</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>