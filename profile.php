<?php 
include "db.php";
$username = $_GET['username'];
 // Запрос в базу для получения информации про пользователя
 $sql = "SELECT * FROM `users` WHERE `username` = :username";
 $stm = $connection->prepare($sql);
 $stm->execute([
      ':username' => $username

      ]);
 $results = $stm->fetch(PDO::FETCH_ASSOC);
 $name = $results['username'];
 $id = $results['id'];
 $status = $results['status'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<?php include "head.php"; ?>

    <title><?= "Профиль " . $name . " - " . $id; ?></title>
</head>
<body>
<?php include "header.php"; ?>
<main>
    <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content">
                    <div class="in-content"> 
                    <h1 class="text-center"><?= $name; ?></h1>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold d-flex">ID пользователя: </div>
                        <div class="col-md-6"><?= $id; ?></div>
                    </div>
                       <div class="row"> 
                        <div class="col-md-6 font-weight-bold d-flex">Логин пользователя: </div>
                        <div class="col-md-6"><?= $name; ?></div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-6 font-weight-bold">Группа пользователя: </div>
                        <div class="col-md-6"><?= $status; ?></div>
                    </div>                                    
                </div>
            </div>
        </div>
    </main>
</body>
</html>