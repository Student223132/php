<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Константы</title>
</head>
<body>
    <pre>
        <?php
        foreach(get_loaded_extensions() as $extension){
            echo "$extension \n";
            print_r(get_extension_funcs($extension));
            echo "\n";
        }
        ?>   
    </pre>
</body>
</html>