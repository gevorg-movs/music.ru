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
<?php include "head.php"; ?>
    <title><?php echo $artist; ?></title>
</head>
<body>
<?php include "header.php"; ?>
    <main>
        <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content">
                    <div class="in-content">                 
                        <h2 class="text-center">Редактировать<?=  $artist . ' - ' . $titler; ?></h2>
                       
                            <a href="music.php?id=<?= $results['id'] ?>"> <button class="btn btn-primary mb-2">Перейти к записи</button> </a>
                                 
                        <form method="post" action="editor.php?id=<?= $results['id'] ?>">             
                                        <div class="form-group">
                                            <select class="custom-select" name="artist1" required > 
                                                <option selected value="<?= $art1; ?>"><?=$art1; ?></option>
                                                <?php
                                                foreach( $artists   as  $artos )
                                                { ?>
                                               
                                                <option value="<?= $artos['artist_name']?>"><?= $artos['artist_name'] ?></option>

                                                <?php };
                                                                     ?>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select" name="artist2" > 
                                                <option selected value="<?=$art2; ?>"><?= $art2; ?></option>
                                            <?php
                                                foreach( $artists   as  $artos )
                                                { ?>
                                               
                                               <option value="<?= $artos['artist_name']?>"><?= $artos['artist_name'] ?></option>

                                                <?php };
                                                                     ?>
                                                  </select> 
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="title" placeholder="Название песни" value="<?= $titler; ?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="length" placeholder="Длительность" value="<?= $length; ?>" required>
                                        </div>     
                                        <button class="btn btn-success" name="edit" type="submit">Отправить</button>
                                                 
                            </form>
                        </div>
                    </div>               
            </div>
        </div>
    </main>
</body>
</html>





