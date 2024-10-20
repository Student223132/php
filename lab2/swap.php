<?php
$a = 3;
$b = 5;
echo 'a = '. $a . ' b = '. $b;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Функция swap</title>
</head>
<body>
	<h1>Функция swap</h1>
	<?php
    function swap(&$x, &$y){
        $z = $x;
        $x = $y;
        $y = $z;
    }
    swap($a, $b);
    echo '<pre>';
    echo "\n". 'a = '. $a . ' b = '. $b;
    echo '</pre>';
	?> 
</body>
</html>