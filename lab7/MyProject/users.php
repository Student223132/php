<?php
    function myAutoloader($className) {
        $baseDir = $_SERVER['DOCUMENT_ROOT'] . '/lab7';
        
        $path = str_replace('\\', '/', $className);
        
        $fullPath = $baseDir . '/' . $path . '.php';
        
        echo "(Автоподключение классов) Попытка загрузить файл: " . $fullPath . "<br>";
        
        if (file_exists($fullPath)) {
            require_once($fullPath);
            echo "Файл загружен успешно <br>";
        } 
        else {
            echo "Файл не найден: " . $fullPath . "<br>";
        }
    }
    
    spl_autoload_register('myAutoloader');
    
    use \MyProject\Classes\User as User;
    use \MyProject\Classes\SuperUser as SuperUser;
    
    $user1 = new User("User1", "UserOne", "Password1!");
    $user2 = new User("User2", "UserTwo", "Password2!");
    $user3 = new User("User3", "UserThree", "Password3!");
    
    $user = new SuperUser("User", "User", "Password!", "Пользователь");
    
    echo "<pre>";
    $user1 -> showinfo();
    $user2 -> showinfo();
    $user3 -> showinfo();
    $user -> showinfo();
    echo "</pre>";
?>