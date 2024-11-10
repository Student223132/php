<?php
	/*
	ЗАДАНИЕ 1
	- Создайте строковую переменную $login и присвойте ей значение ' User '
	- Создайте строковую переменную $passw0rd и присвойте ей значение 'megaP@ssw0rd'
	- Создайте строковую переменную $name и присвойте ей значение 'иван'
	- Создайте строковую переменную $email и присвойте ей значение 'ivan@petrov.ru'
	- Создайте строковую переменную $code и присвойте ей значение '<?=$login?>'
	*/
	$login = ' User ';
	$password = 'megaP@ssword';
	$name = 'иван';
	$email = 'ivan@petrov.ru';
	$code = '<?=$login?>';
	if(!function_exists('mb_ucfirst')) {
	    function mb_ucfirst($str) {
		    $fc = mb_strtoupper(mb_substr($str, 0, 1));
		    return $fc . mb_substr($str, 1);
	    }
    }
	
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>
<pre>
<?php
	/*
	ЗАДАНИЕ 2
	- Используя строковые функции, удалите пробельные символы в начале и конце переменной $login, а также сделайте все символы строчными (малыми)
	- Проверьте значение переменной $password на сложность: пароль должен содержать минимум одну заглавную латинскую букву, одну строчную и одну цифру, а длина должна быть не меньше 8 символов. Оформите полученный код в виде пользовательской функции.
	- Используя строковые функции, сделайте первый символ значения переменной $name прописной (большой)
	- Используя функцию фильтрации переменных проверьте корректность значения $email
	- Используя строковые функции выведите значение переменной $code в браузер в том же виде как она задана в коде
	*/
	$login = trim($login);
	$login = strtolower($login);
	echo $login;
	echo "\n";
	
	if (!preg_match('/[A-Z]/', $password)) {
    echo 'В пароле должна быть хотя бы одна большая буква';
    echo "\n";
    }
    if (!preg_match('/[a-z]/', $password)) {
    echo 'В пароле должна быть хотя бы одна маленькая буква';
    echo "\n";
    }
    if (!preg_match('/[0-9]/', $password)) {
    echo 'В пароле должна быть хотя бы одна цифра';
    echo "\n";
    }
    if (strlen($password)<8) {
        echo 'В пароле должно быть хотя бы 8 символов';
        echo "\n";
    }
    
    $name = mb_ucfirst($name);
    echo $name;
    echo "\n";
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
        echo 'Всё в порядке, email правильный';
        echo "\n";
    }
    else{
        echo 'В синтаксисе email допущена ошибка';
        echo "\n";
    }
    
    echo htmlentities($code);
?>
</pre>
</body>
</html>