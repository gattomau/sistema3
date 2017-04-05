<?php

namespace db;

use \PDO;

class Connect
{
  private static $db;

  public static function Connect($dbname, $dbhost, $dbuser, $dbpass)
  {
    $conn = NULL;

    try {
      $conn = new PDO('mysql:dbname=' . $dbname . ';$dbhost=' . $dbhost, $dbuser, $dbpass);
    } catch (PDOException $e) {
      echo 'An error has occurred while trying to connect to the specified database: ' . $e->getMessage();
    }

    self::$db = $conn;
  }

  public static function Connected()
  {
    return self::$db;
  }

  public static function Disconnect()
  {
    if (!self::$db)
    {
      echo "Nothing to do here, you're already disconnected!";
    } else {
      self::$db = NULL;
      echo "You are now disconnected from the database!";
    }
  }
}
