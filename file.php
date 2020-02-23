<?php

// // Путь загрузки
// $path = 'i/';

// // Обработка запроса
// if ($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//  // Загрузка файла и вывод сообщения
//  if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
//   echo 'Что-то пошло не так';
//  else
//   $img = $_FILES['picture']['name'];
//   echo 'Загрузка удачна ' . "Имя файла: " . $img;
// }



if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0){
   // Директория для закачивания
   $dir = '/i/'; 
   // Допустимые MIME-типы
   $arrType = array('image/jpeg','image/gif','image/png',);
   // Допустимые расширения
   $arrExt = array('png', 'jpg', 'jpeg', 'gif');
   // Получаем расширение файла
   $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
   // 1. Проверка MIME-тип файла и расширение
   $finfo = new finfo(FILEINFO_MIME_TYPE);
   $type = $finfo->file($_FILES['picture']['tmp_name']);
   if (in_array($type, $arrType) && in_array($ext, $arrExt)){
       // 2. Генерирование уникального имени и пути файла
       $filepath = $dir.uniqid().'.'.$ext;
       if(move_uploaded_file($_FILES['picture']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$filepath)){
           // Если файл загружен, то можем вывести его на экран
           echo 'Загружен';            
       } else {
           echo 'Хьюстон! У нас проблемы!';
       }
   }
}


?>
<!DOCTYPE HTML PUBLIC  "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
 <head>
  <title>Загрузка изображения с изменением размеров</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
  <h1>Загрузка изображения с изменением размеров</h1>
  <form method="post" enctype="multipart/form-data">
 <input type="file" name="picture">
 <input type="submit" value="Загрузить">
  </form>
 </body>
</html>