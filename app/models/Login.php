<?php 
namespace app\models;

require_once "../../vendor/autoload.php";

use app\controller\DataBaseHandler;
class Login extends DataBaseHandler
{
  protected function getUser($uid, $pwd) 
  {
    $sql = 
      'SELECT user_pwd FROM users WHERE user_uid = ? OR user_email = ? OR user_pwd = ?';
    $statement = $this->connect()->prepare($sql);
    //@ because if you want to make an option to login 
    // by email or uid but to but it in the same input
    if(! $statement->execute(array($uid, $uid,  $pwd))) {
      $statement = null;
      header("Location: ../../index.php?error=statementFailed");
      exit();
    }
    $pwd_hashed = $statement->fetchAll(\PDO::FETCH_ASSOC);
    $check_valid_pwd = password_verify($pwd, $pwd_hashed[0]['users_pwd']);

    if($check_valid_pwd == false) {
      $statement = null;
      header("Location: ../../index.php?error=passwordWrong");
      exit();
    } 
    elseif($check_valid_pwd == true) {
      $sql = 
      'SELECT * FROM users WHERE user_uid = ? OR user_email = ? AND user_pwd = ?';
      $statement = $this->connect()->prepare($sql);
      if(! $statement->execute(array($uid, $uid, $pwd))) {
        $statement = null;
        header("Location: ../../index.php?error=statementFailed");
        exit();
      }
      
      if($statement->rowCount() == 0) {
          $statement = null;
        header("Location: ../../index.php?error=userNotFound");
        exit();
      }
      $user = $statement->fetchAll(\PDO::FETCH_ASSOC);
      session_start();
      $_SESSION['user_id'] = $user[0]['users_id'];
      $_SESSION['user_uid'] = $user[0]['users_uid'];
      
      $statement = null;
    }


    $statement = null;
  }
}