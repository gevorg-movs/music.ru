<?php 
include "db.php";
?>



<!DOCTYPE html>
<html lang="ru">
<head>
<?php include "head.php"; ?>

    <title>Регистрация</title>
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
                    <div class="in-content">
                        
                 <h2>Регистрация</h2>      
<form action="register-script.php" method="post">
    <div class="form-group"> Логин: <input type="text" name="username" class="form-control" required /></div>
    <div class="form-group">Пароль: <input type="password" name="password" class="form-control" required/></div>
    <div class="form-group"><input type="submit" value="Регистрация" name="register" class="btn btn-success" /></div>
 </form>



        
       
        
        
            

                


                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>