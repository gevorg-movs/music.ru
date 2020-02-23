<?php 
setcookie('user', $username, time() - 600, "/");
header('Location: /');
 ?>