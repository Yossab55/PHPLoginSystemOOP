<?php

namespace app\controller;

class DataBaseHandler
{
  private function connect() 
  {
    try {
      $dbname = "PHPLoginSystemOOP";
      $username = "root";
      $password = null;
      $db = new \PDO(
        "mysql:host=localhost;dbname=". $dbname,
        $username,
        $password 
      );
      return $db;
    } catch (\PDOException $e) {
      print "Error!" . $e->getMessage() . "<br/>";
      die();
    }
  }
}