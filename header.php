<header>
    <div class="container">
        <div class="row pt-4 pb-2 align-items-center">
            <div class="logo offset-md-2 col-md-4"><a href="/"><img class="logo-img" src="/img/logo.png" alt=""></a> </div>
            <div class="search col-md-4">
               <form action="search.php">
               <input class="form-control" name="search-text" type="text" placeholder="Поиск">
                <input type="submit" class="d-none">
               </form>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-12 m-4">
        <?php 

if (!empty($_SESSION['username'])) { ?> 
   <div class="font-weight-bold text-center">
       Вы вошли на сайт как  <a href="/profile.php?username=<?=$_SESSION['username']; ?>"><?=$_SESSION['username']; ?> </a>
       <a href="/exit.php"><button class="btn btn-sm btn-danger ml-2">Выйти</button></a>
   </div>
   <?php 
} else {
   ?> 
   <div class="font-weight-bold text-center">
       Вы не авторизованы, чтобы войти нажмите 
       <a href="/login.php"><button class="btn btn-sm btn-primary ml-2">Вход</button></a>
   </div>
   <?php } ?>
        </div>    
    </div>
</header>

