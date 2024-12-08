<?php
$visit_count = isset($_COOKIE['visit_count']) ? (int)$_COOKIE['visit_count'] + 1 : 1;

$last_visit = '';
if (isset($_COOKIE['last_visit'])) {
    $last_visit = trim(htmlspecialchars($_COOKIE['last_visit']));
}


setcookie('visit_count', $visit_count, time() + 86400, '/');
setcookie('last_visit', date('d-m-Y H:i:s'), time() + 86400, '/');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Последний визит</title>
</head>
<body>
<h1>Последний визит</h1>

<?php
if ($visit_count === 1) {
    echo "Добро пожаловать!";
} else {
    echo "Вы зашли на страницу {$visit_count} раз";
}

if (!empty($last_visit)) {
    echo "<p>Последнее посещение: {$last_visit}</p>";
}
?>

</body>
</html>
