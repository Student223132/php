<?php
include 'inc/lib.inc.php'
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <!-- Заголовок -->
    <h1>Таблица умножения</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <form action='' method = "post">
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='text' value=''>
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='text' value=''>
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value='#fae3a2' list="listColors">
	<datalist id="listColors">
		<option>#fae3a2</option>
		<option>#8de39f</option>
		<option>#5b89d9</option>
	</datalist>
      <br>
      <br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <?php
        if(isset($_POST['cols'])){
            $cols = (int) $_POST['cols'];
        }
        if(isset($_POST['rows'])){
            $rows = (int) $_POST['rows'];
        }
        if(isset($_POST['color'])){
            $color = (string) $_POST['color'];
        }  
        if(isset($cols, $rows, $color)){
          getTable($cols, $rows, $color);  
        }
        
    ?>
    <!-- Таблица -->
    <!-- Область основного контента -->
  </section>
  <nav>
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <ul>
      <li><a href='index.php'>Домой</a></li>
      <li><a href='about.php'>О нас</a></li>
      <li><a href='contact.php'>Контакты</a></li>
      <li><a href='table.php'>Таблица умножения</a></li>
      <li><a href='calc.php'>Калькулятор</a></li>
    </ul>
    <!-- Меню -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>