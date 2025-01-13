<?php

require_once '../../vendor/autoload.php';
use app\controller\SignupController;


if(isset($_POST["submit"])) {
    //grab data
    $user_id = $_POST["uid"];
    $password = $_POST["pwd"];
    $password_repeat = $_POST["pwdRepeat"];
    $email = $_POST["email"];
    
    $signup = new SignupController(
        $user_id, 
        $password, 
        $password_repeat, 
        $email
    );
    
}