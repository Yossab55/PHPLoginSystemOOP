<?php

use app\controller\SignupController;

if(isset($_POST["submit"])) {
  //grab data
  $user_id = $_POST["uid"];
  $password = $_POST["pwd"];
  $password_repeat = $_POST["pwdRepeat"];
  $email = $_POST["emil"];
  //initialize signup control class 
  $signupController = new SignupController(
    $user_id, 
    $password, 
    $password_repeat, 
    $email
  );
  // error handel
  // go to to home page
}