<?php

namespace app\controller;
require_once "../../vendor/autoload.php";

use app\models\Login;

class LoginController extends Login
{
  private $uid;
  private $pwd;

  
  public function __construct($uid, $pwd)
  {
      $this->uid = $uid;
      $this->pwd = $pwd;

    }
    public function loginUser() {
    if($this->emptyInput() == false) 
      $this->exitAndGoToIndexWith("emptyInputs");

    $this->getUser($this->uid, $this->pwd);
  }
  private function exitAndGoToIndexWith($error)
  {
    header("Location: ../../index.php?error=$error");
    exit();
  }
  private function emptyInput() 
  {
    $result = true;
    $inputs = $this->getIterator();
    foreach($inputs as $input) {
      if(empty($input)) {
        $result = false;
      }
    }
    return $result;
  }

  public function getIterator(): \Traversable
  {
    return new \ArrayIterator([$this->uid, $this->pwd]);
  }
}