<?php
	/*
	ЗАДАНИЕ 1
	- Создайте две целочисленные переменные $cols и $rows
	- Присвойте созданным переменным произвольные значения в диапазоне от 1 до 10
	*/
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
	ЗАДАНИЕ 2
	- Используя циклы отрисуйте таблицу умножения в виде HTML-таблицы на следующих условиях
		- Число столбцов должно быть равно значению переменной $cols
		- Число строк должно быть равно значению переменной $rows
		-  Ячейки на пересечении столбцов и строк должны содержать значения, являющиеся произведением порядковых номеров столбца и строки
	- Рекомендуется использовать цикл for	
	
	ЗАДАНИЕ 3
	- Значения в ячейках первой строки и первого столбца должны быть отрисованы полужирным шрифтом и выровнены по центру ячейки
	- Фоновый цвет ячеек первой строки и первого столбца должен быть отличным от фонового цвета таблицы
	*/
	$cols = 9;
	$rows = 9;
	echo '<table>';
	echo '<tbody>';
	for ($i = 1; $i <= $cols; $i++){
	    echo '<tr>';
	    for ($j = 1; $j <= $rows; $j++){
	        if ($i == 1 || $j == 1){
	            echo '<th>';
	            echo '<b>';
	            echo $i * $j;
	            echo '</b>';
	            echo '</th>'; 
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
	?> 
</body>
</html>