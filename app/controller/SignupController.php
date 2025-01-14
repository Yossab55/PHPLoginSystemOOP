<?php

namespace app\controller;

use app\models\Signup;

class SignupController extends Signup
{
  private $uid;
  private $pwd;
  private $pwdRepeat;
  private $email;
  
  public function __construct($uid, $pwd, $pwdRepeat, $email)
  {
      $this->uid = $uid;
      $this->pwd = $pwd;
      $this->pwdRepeat = $pwdRepeat;
      $this->email = $email;
  }
  private function signupUser() {
    if($this->emptyInput() == false) 
      $this->exitAndGoToIndexWith("emptyInputs");

    if($this->invalidUid() == false) 
      $this->exitAndGoToIndexWith("username");

    if($this->invalidEmail() == false) 
      $this->exitAndGoToIndexWith("email");

    if($this->passwordMatches() == false) 
      $this->exitAndGoToIndexWith("passwordMatches");

    if($this->uidTakenCheck() == false) 
      $this->exitAndGoToIndexWith("userIdOrEmailTaken");

    $this->setUser();
  }
  private function exitAndGoToIndexWith($error) {
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
  private function invalidUid() 
  {
    $result = true;
    if(!preg_match("/^[a-zA-Z0-9]+$", $this->uid)) {
      $result = false;
    }
    return $result;
  }
  private function invalidEmail() 
  {
    $result = true;
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $result = false;
    }
    return $result;
  }
  private function passwordMatches() 
  {
    $result = true;
    if(!$this->pwd == $this->pwdRepeat) {
      $result = false;
    }
    return $result;
  }
  private function uidTakenCheck() {
    $result = true;
    if(! $this->check_uid($this->uid, $this->email)) $result = false;
    return $result;
  }
  public function getIterator(): \Traversable
  {
    return new \ArrayIterator([$this->uid, $this->pwd, $this->pwdRepeat, $this->email]);
  }
}