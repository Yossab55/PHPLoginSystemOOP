<?php

require_once '../../vendor/autoload.php';
use app\controller\LoginController;


if(isset($_POST["submit"])) {
    //grab data
    $user_id = $_POST["uid"];
    $password = $_POST["pwd"];
    
    $login = new LoginController(
        $user_id, 
        $password
    );
    $login->loginUser();
    header("Location: ../../index.php?error=none");
}