<?php
/* ЗАДАНИЕ 1
- Создайте файл config.php и определите в нём константы DB_NAME, DB_USER, DB_PASSWORD, DB_HOST, DB_CHARSET
- С помощью require_once подключите config.php 
- Подключитесь к серверу MySQL, выберите базу данных
- Установите кодировку по умолчанию для текущего соединения
- 
- Проверьте, была ли корректным образом отправлена форма
- Если она была отправлена: отфильтруйте полученные данные 
  с помощью функций trim(), htmlspecialchars() и mysqli_real_escape_string(),
  сформируйте SQL-оператор на вставку данных в таблицу msgs и выполните его с помощью функции mysqli_query(). 
  После этого с помощью функции header() выполните перезапрос страницы, 
  чтобы избавиться от информации, переданной через форму
*/
require_once 'config.php';

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

mysqli_set_charset($connection, "utf8");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['name'])));
    $email = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email'])));
    $msg = trim(htmlspecialchars(mysqli_real_escape_string($connection, $_POST['msg'])));
    
    if (empty($name) || empty($email) || empty($msg)) {
        echo "Заполните все поля формы";
    } 
    else {
        $query = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
    
    if (mysqli_query($connection, $query)) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
    }
    
}
/*
ЗАДАНИЕ 3
- Проверьте, был ли запрос методом GET на удаление записи
- Если он был: отфильтруйте полученные данные,
  сформируйте SQL-оператор на удаление записи и выполните его.
  После этого выполните перезапрос страницы, чтобы избавиться от информации, переданной методом GET
*/
if (isset($_GET['delete'])) {
    $delete_id = mysqli_real_escape_string($connection, $_GET['delete']);

    $query = "DELETE FROM msgs WHERE id = '$delete_id'";
    
    if (mysqli_query($connection, $query)) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Гостевая книга</title>
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Ваше имя:<br>
<input type="text" name="name"><br>
Ваш E-mail:<br>
<input type="email" name="email"><br>
Сообщение:<br>
<textarea name="msg" cols="50" rows="5"></textarea><br>
<br>
<input type="submit" value="Добавить!">

</form>

<?php
/*
ЗАДАНИЕ 2
- Сформируйте SQL-оператор на выборку всех данных из таблицы
  msgs в обратном порядке и выполните его. Результат выборки
  сохраните в переменной.
- Закройте соединение с БД
-	С помощью функции mysqli_num_rows() получите количество рядов результата выборки и выведите его на экран
- В цикле функцией mysqli_fetch_assoc() получите очередной ряд результата выборки в виде ассоциативного массива.
  Таким образом, используя этот цикл, выведите на экран все сообщения, а также информацию
  об авторе каждого сообщения. После каджого сообщения сформируйте ссылку для удаления этой
  записи. Информацию об идентификаторе удаляемого сообщения передавайте методом GET.
*/

$query = "SELECT * FROM msgs ORDER BY id DESC";
$result = mysqli_query($connection, $query);


$num_rows = mysqli_num_rows($result);
echo "Количество сообщений: " . $num_rows;


while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>";
    echo "Имя: " . htmlspecialchars($row['name']) . "<br>";
    echo "Email: " . htmlspecialchars($row['email']) . "<br>";
    echo "Сообщение: " . htmlspecialchars($row['msg']) . "<br>";
    echo "<a href='?delete=" . $row['id'] . "'>Удалить</a>";
    echo "</div><hr>";
}


mysqli_close($connection);
?>

</body>
</html>