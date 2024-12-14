<?php
namespace MyProject\Classes;

require_once 'User.php';

class SuperUser extends User {
    public $role;
    
    function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }
    
    function showInfo() {
        parent::showInfo();
        echo "Role: " . $this->role . "\n";
    }
}
?>