<?php

use db\Connect as db;

ob_start();

session_start();

if(!defined('ROOTDIR')) {
  define('ROOTDIR', dirname(__FILE__) . '/');
}

include ROOTDIR . 'autoload.php';
include ROOTDIR . 'config.php';

if(isset($_SESSION['user']) != "") {
  header('Location: index.php');
  exit;
}

if(isset($_POST['btn-login'])) {

  $username = trim($_POST['username']);
  $username = strip_tags($_POST['username']);
  $username = htmlspecialchars($_POST['username']);

  $pass = trim($_POST['password']);
  $pass = strip_tags($_POST['password']);
  $pass = htmlspecialchars($_POST['password']);

  if (empty($username)) {
    $error = true;
    echo "The 'Username' field cannot be empty!";
  }
}

if (empty($pass)) {
  $error = true;
  echo "The 'Password' field cannot be empty!";
}

if(!$error) {
  $sql = "SELECT nome, cognome FROM names WHERE cognome = '$pass'";

  $checkval = array();

  foreach(db::Connected()->query($sql) as $res) {
    array_push($checkval, $res);
  }

  if(count($checkval) != 0) {
    $_SESSION['user'] = $checkval[0];
    header('Location: index.php');
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>am pape</title>
  </head>
  <body>
    <form class="" action="sys3-login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" name="username" value="">
      <label for="password"></label>
      <input type="password" name="password" value="">
      <button type="submit" name="btn-login">Login now!</button>
    </form>
  </body>
</html>
<?php ob_end_flush(); ?>
