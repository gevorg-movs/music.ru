<?php 
include "db.php";
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
    

    <title>Войти</title>
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
                        
<h2>Вход на сайт</h2>  
<form action="login-script.php" method="post">
    <div class="form-group"> Логин: <input type="text" name="username" class="form-control"  /></div>
    <div class="form-group">Пароль: <input type="password" name="password" class="form-control" /></div>
    <div class="form-group"><input type="submit" value="Войти на сайт" name="register" class="btn btn-success" /></div>
 </form>



        
       
        
        
            

                


                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>