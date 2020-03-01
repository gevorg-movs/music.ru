<?php 
include "db.php";
$queryadd = $connection->query('SELECT * FROM artists');
$artists = $queryadd->FETCHALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <?php include "head.php"; ?>
        <title>Добавить песню</title>
    </head>
<body>
        <?php include "header.php"; ?>
    <main>
        <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content"><div class="in-content">
                        <h4 class=" text-center">Добавить пост</h4>
                        <form method="post" action="add-script.php">                               
                            <div class="form-group">
                                <select class="custom-select" name="artist1" required="required">
                                    <option selected value="">Выберите исполнителя</option>
                                        <?php
                                            foreach( $artists   as  $artos )
                                            { ?>
                                    <option value="<?=$artos['artist_name']; ?>"><?= $artos['id'] . ' ' . $artos['artist_name']; ?></option>
                                            <?php }; ?>
                                </select>
                                </select>
                            </div>
                            <div class="form-group">
                                    <select class="custom-select" name="artist2">
                                        <option selected value="">Выберите исполнителя</option>
                                            <?php
                                            foreach( $artists   as  $artos )
                                            { ?>
                                        <option value="<?=$artos['artist_name']; ?>"><?= $artos['id'] . ' ' . $artos['artist_name']; ?></option>
                                            <?php }; ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text"  name="title" placeholder="Название песни" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="length" placeholder="Длительность" required>
                            </div>                  
                            <div class="form-group text-center">
                                <button class="btn btn-primary " name="add" type="submit">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>               
            </div>
        </div>
    </main>
</body>
</html>





