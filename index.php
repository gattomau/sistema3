<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

session_start();

error_reporting(E_ALL);

ini_set('display_errors', 1);

if(isset($_POST['user']) && isset($_POST['pass'])) {

if(isset($_POST['button'])) {

$user = $_POST['user'];

$pass = hash('sha512', $_POST['pass']);

$auth = sys3db::db()->prepare("SELECT username, password FROM utenti WHERE username = :username AND password = :password");

$auth->bindParam(':username', $user);

$auth->bindParam(':password', $pass);

$auth->execute();

if($auth->errorCode() === "00000") {
  if($auth->rowCount() !== 0) {
    header('Location: main.php');
  } else {
    echo "Username o password non corretti, si prega di verificare!";
  }
} else {
  echo "Si e` verificato un errore durante il recupero dei dati dal database. Dettagli: " . $auth->errorCode() . $auth->errorInfo()[2];
  var_dump($pass);
}

}

}
?>

<!DOCTYPE html>
<html style="min-height: 100%; min-width: 100%">
  <head>
    <meta charset="utf-8">
    <title>Systema3 - Aggiungi Categoria</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="assets/flatui/css/flat-ui.min.css">
  </head>
  <body style="background-color: #222d32; position: absolute; min-height: 100%; max-height: 100%; height: 100%; width: 100%; position: absolute">
    <div class="container" style="background-color: white; min-height: 100%;">

      <div class="logo">
        <img src="assets/img/sp5.png" height="135" style="padding: 15px;" alt="">
      </div>

      <h1>Accedi</h1>

    <form id="form" class="" action="index.php" method="post">

    <div class="form-group">

      <div class="row">

      <div class="col-xs-4">

      <label for="user">Username:</label>
      <input class="form-control" type="text" name="user" placeholder="Username" value="">

      </div>

      <div class="col-xs-4">

      <label for="password">Password:</label>
      <input class="form-control" type="password" name="pass" placeholder="Password" value="">

      </div>

      </div>

    </div>

    <div class="row" style="display: flex">

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-primary" type="submit" name="button" value="Login">

    </div>

  </div>

    </form>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
