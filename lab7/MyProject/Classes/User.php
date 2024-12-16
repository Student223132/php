<?php
namespace MyProject\Classes;

class User {
    public $name, $login;
    private $password;
    
    function __construct($name, $login, $password){
        $this -> name = $name;
        $this -> login = $login;
        $this -> password = $password;
    }
    function __destruct(){
        echo "Пользователь " . $this -> login . " удалён </br>";
    }
    function setpassword($psswrd){
        $this -> password = $psswrd;
    }
    function showinfo(){
        $password1 = $this -> password;
        echo $this -> name ." ". $this -> login ." ". $password1 . "\n";
    }
}
