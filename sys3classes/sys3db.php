<?php

namespace sys3classes;

use \PDO;

class sys3db
{

  private static $dbname = 'uni3';
  private static $dbhost = 'localhost';
  private static $dbuser = 'root';
  private static $dbpass = 'maurizio';

  private static $db;

  public static function initDb()
  {
    $conn = NULL;

    try {
      $conn = new PDO('mysql:dbname=' . self::$dbname . ';host=' . self::$dbhost, self::$dbuser, self::$dbpass);
    } catch (PDOException $e) {
      echo "An error has occurred while trying to connect to the specified database: " . $e->getMessage();
    }

    self::$db = $conn;

  }

  public static function db() {

    self::initDb();

    if(isset(self::$db)) {
      return self::$db;
    }

  }

  public static function close() {
    if(isset(self::$db)) {
      self::$db = NULL;
    } else {
      echo "You are already disconnected from the database!";
    }
  }

}
