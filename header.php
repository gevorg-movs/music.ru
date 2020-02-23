<header>
    <div class="container">
        <div class="row pt-4 pb-2 align-items-center">
            <div class="logo offset-md-2 col-md-4"><a href="/"><img class="logo-img" src="/img/logo.png" alt=""></a> </div>
            <div class="search col-md-4"><input class="form-control" type="text" placeholder="Поиск"></div>
        </div>
    </div> 

    <div class="row">
        <div class="col-md-12 m-4">
        <?php 

if (!empty($_SESSION['username'])) 
{
   ?> 
   <div class="font-weight-bold text-center">
       Вы вошли на сайт как  <a href="/profile.php?username=<?=$_SESSION['username'] ?>"><?=$_SESSION['username'] . " - " . $_SESSION['id'] ?> </a>
       <a href="/exit.php">Выход.</a>
   </div>
   <?php 
} else {
   ?> 
   <div class="font-weight-bold text-center">
       Вы не авторизованы, чтобы войти нажмите 
       <a href="/login.php">Вход</a>
   </div>
   <?php 
} ?>
        </div>    
    </div>


</header>

