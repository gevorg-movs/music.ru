<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="ru">
<head>
<?php include "head.php"; ?>
    <title>Войти</title>
</head>
<body>
<?php include "header.php"; ?>
    <main>
        <div class="container">
            <div class="site-content row">
                <div class="col-md-4 sidebar"><?php include "sidebar.php"; ?></div>
                <div class="col-md-8 content">
                    <div class="in-content">                        
                        <h2>Вход на сайт</h2>  
                        <form action="login-script.php" method="post">
                            <div class="form-group">Логин: <input type="text" name="username" class="form-control"  /></div>
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