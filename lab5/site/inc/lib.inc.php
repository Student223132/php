<?php
    function drawTable(int $cols = 9, int $rows = 9, string $color = "#ffebb5"){
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
	
	function getMenu($menu = [], bool $vertical = true){
	    if ($vertical){
	        echo '<ul>';
	    }
	    else {
	        echo '<ul class="vertical">';
	    }
	    foreach($menu as $item){
	        echo '<li><a href='.$item['href'].'>'.$item['link'].'</a></li>';
	        }
	    echo '</ul>';
	}
?>