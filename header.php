<header>
        <div class="container">
            <div class="header-content">
                <div class="logo"><a href="/"><img class="logo-img" src="/img/logo.png" alt=""></a> </div>
                <div class="search"><input type="text" placeholder="Поиск"></div>
            </div>
        </div> 
    </header>

    <?php 
    if (!empty($_COOKIE['user'])) 
    {
    	?> 
				<div class="font-weight-bold text-center">
					Вы вошли на сайт как  <a href="/profile.php?username=<?=$_COOKIE['user'] ?>"><?=$_COOKIE['user'] ?> </a>
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