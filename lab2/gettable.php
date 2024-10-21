<?php
	/*
	ЗАДАНИЕ 1
	- Опишите функцию getTable()
	- Задайте для функции три аргумента: $cols, $rows, $color

	ЗАДАНИЕ 2
	- Откройте файл table.php
	- Скопируйте код, который отрисовывает таблицу умножения
	- Вставьте скопированный код в тело функции getTable()
	- Измените код таким образом, чтобы таблица отрисовывалась в зависимости от входящих параметров $cols, $rows и $color
	- Добавьте в объявлние функции описание типов аргументов
	*/
	
	/**
	* Рисует таблицу с заданными значениями
    * @param  int $cols, int $rows, string $color
    * @return счётчик вызовов функции $count
    */
	function getTable(int $cols = 9, int $rows = 9, string $color = "#ffebb5"){
	    static $count = 0;
	   	echo '<table border="1">';
	    echo '<tbody>';
	    for ($i = 1; $i <= $cols; $i++){
	        echo '<tr>';
	        for ($j = 1; $j <= $rows; $j++){
	            if ($i == 1 || $j == 1){
	                echo "<td bgcolor=$color>";
	                echo '<b>';
	                echo $i * $j;
	                echo '</b>';
	                echo '</td>'; 
	            }
	            else{
	                echo '<td>';
	                echo $i * $j;
	                echo '</td>';
	            
	            }
	        }
	        echo '</tr>';
	    }
	    echo '</tbody>';
	    echo '</table>';
	    $count++;
	    return $count;
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 2px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 10px;
			border: 1px solid black;
		}

		th {
			background-color: yellow;
		}
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
	/*
	ЗАДАНИЕ 3
	- Отрисуйте таблицу умножения вызывая функцию getTable() с различными параметрами
	- Создайте локальную статическую переменную $count для подсчёта числа вызовов функции getTable()
	- Функция getTable() должна возвращать значение переменной $count
	*/
	/*
	ЗАДАНИЕ 4
	- Измените входящие параметры функции getTable() на параметры по умолчанию
	- Добавьте описание функции getTable() с помощью стандарта PHPDoc https://ru.wikipedia.org/wiki/PHPDoc
	*/
	/*
	ЗАДАНИЕ 5
	- Отрисуйте таблицу умножения вызывая функцию getTable() без параметров
	- Отрисуйте таблицу умножения вызывая функцию getTable() с одним параметром
	- Отрисуйте таблицу умножения вызывая функцию getTable() с двумя параметрами
	- Используя статическую переменную $count выведите общее число вызовов функции getTable()
	*/
	getTable(3, 3, "#cccccc");
	getTable(4);
	$count1 = getTable(8, 4);
	echo "число вызовов функции - $count1";
	?> 
</body>
</html>