<?php 
namespace app\models;
use app\controller\DataBaseHandler;
class Signup extends DataBaseHandler
{
  protected function check_uid($uid, $email)
  {
    $sql = 
      'SELECT users_uid FROM users 
      WHERE users_uid = ? OR users_email = ?;';
    $statement = $this->connect()->prepare($sql);
    // check if statement works or not 
    if(! $statement->execute(array($uid, $email))) {
      $statement = null;
      header("Location: ../../index.php?error=statementFailed");
      exit();
    }
    // check if there is row or not 
    $result_check = true;;
    if($statement->rowCount() > 0) {
      $result_check = false;
    }
    return $result_check;
  }

  protected function setUser($uid, $pwd, $email) 
  {
    $sql = 
      'INSERT INTO users (users_uid, users_pwd, users_email)
      VALUES (?, ?, ?);';
    $statement = $this->connect()->prepare($sql);
      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    if(! $statement->execute(array($uid, $hashedPwd, $email))) {
      $statement = null;
      header("Location: ../../index.php?error=statementFailed");
      exit();
    }
    // for security 
    $statement = null;
  }
}