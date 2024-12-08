<?php
/*
ЗАДАНИЕ 1
- Установите константу для хранения имени файла
- Проверьте, отправлялась ли форма и корректно ли отправлены данные из формы
- В случае, если форма была отправлена, отфильтруйте полученные значения 
  с помощью функций trim(), htmlspecialchars()
- Сформируйте строку для записи с файл
- Откройте соединение с файлом и запишите в него сформированную строку
- Используя функцию header() выполните перезапрос текущей страницы 
  (чтобы избавиться от данных, отправленных методом POST)
*/
 define("FILENAME", "text.txt");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name1 = filter_input(INPUT_POST, 'fname');
    $name2 = filter_input(INPUT_POST, 'lname');
    trim($name1);
    trim($name2);
    htmlspecialchars($name1);
    htmlspecialchars($name2);
    $str = "$name1". ' '. "$name2 \n";
    $fd = fopen("db/". FILENAME, 'a') or die("не удалось создать файл");
    fseek($fd, 0, SEEK_END);
    fwrite($fd, $str);
    fclose($fd);
    header("Location: http://f1035596.xsph.ru/lab5/file.php");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">

Имя: <input type="text" name="fname"><br>
Фамилия: <input type="text" name="lname"><br>

<br>

<input type="submit" value="Отправить!">

</form>
<pre>
 <?php
/*
ЗАДАНИЕ 2
- Проверьте, существует ли файл с информацией о пользователях
- Если файл существует, получите все содержимое файла в виде массива строк 
  с помощью функции file()
- В цикле выведите все строки данного файла с порядковым номером строки
- После этого выведите размер файла в байтах.
*/
if (file_exists("db/". FILENAME)){
    echo "Файл найден \n";
}
else{
        echo "Файл не найден \n";
}
$lines = file("db/". FILENAME);
$i = 0;
foreach ($lines as $line){
    $i++;
    echo "$i $line \n";
}
echo "размер файла - ". filesize("db/". FILENAME). " байт \n";
?>   
</pre>


</body>
</html>