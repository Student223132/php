<?php
/*
ЗАДАНИЕ 1
- Проверьте, была ли корректно отправлена форма
- Если она была отправлена, отфильтруйте полученные значения
- В зависимости от оператора производите различные математические действия
- В случае деления, проверьте, делитель на равенство с нулем (на ноль делить нельзя)
- Сохраните полученный результат вычисления в переменной
*/

// Проверяем, была ли форма отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Фильтруем и получаем значения из формы
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Выполняем вычисления в зависимости от оператора
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            // Проверяем деление на ноль
            if ($num2 == 0) {
                $result = "Ошибка: деление на ноль";
            } else {
                $result = $num1 / $num2;
            }
            break;
        default:
            $result = "Ошибка: некорректный оператор";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
</head>
<body>

<h1>Калькулятор</h1>

<?php
/*
ЗАДАНИЕ 2
- Если результат существует, выведите его
*/

// Выводим результат
if (isset($result)) {
    echo "<p>Результат: " . $result . "</p>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" selected >+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" required></p>

<button type="submit">Считать!</button>

</form>

</body>
</html>