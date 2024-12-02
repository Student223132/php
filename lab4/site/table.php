    <!-- Область основного контента -->
    <form action='<?=$_SERVER['REQUEST_URI']?>' method = "POST">
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='text' value='<?php if (isset($_POST['cols'])) echo $_POST['cols'] ?>'>
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='text' value='<?php if (isset($_POST['rows'])) echo $_POST['rows'] ?>'>
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value='<?php if (isset($_POST['color'])) echo $_POST['color'] ?>' list="listColors">
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
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
	        $cols = abs((int) $_POST['cols']);
	        $rows = abs((int) $_POST['rows']);
	        $color = trim(strip_tags($_POST['color']));
        }
        $cols = ($cols) ? $cols : 10;
        $rows = ($rows) ? $rows : 10;
        $color = ($color) ? $color : '#ffff00';
        
        if(isset($cols, $rows, $color)){
          drawTable($cols, $rows, $color);  
        }
        
    ?>
    <!-- Таблица -->
    <!-- Область основного контента -->