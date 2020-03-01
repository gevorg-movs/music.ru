<?php include "db.php"; 
$search = $_GET['search-text'];
$querycon = $connection->prepare("SELECT * FROM articles WHERE `artist1` LIKE :search OR `artist2` LIKE :search");
$querycon->execute([ ':search' => $search  ]);
$result = $querycon->FETCHALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php include "head.php"; ?>
    <title>Поиск по запросу <?=$search; ?></title>
</head> 
<body>
<?php include "header.php"; ?>
    <main>
        <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content"><div class="in-content">
                        <h2 class="m-2">Поиск по запросу: <?=$search; ?></h2>
                        <p>Найдено: <?= count($result); ?></p>
                         <?php                   
                      foreach( $result  as  $results )
                        {   ?>

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
                         <?php } ?> 
                    </div>
                </div>               
            </div>
        </div>
    </main>
</body>
</html>