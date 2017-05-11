<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;
use sys3classes\sys3corsi;

require 'autoload.php';

$corsi = new sys3corsi;

$iscritti = new sys3iscritti;

error_reporting(E_ALL);

ini_set('display_errors', 1);

$email = $_GET['email'];

$corsi->init();

$sql = sys3db::db()->prepare('INSERT INTO `iscritticorsi` (idCorso, idUtente) VALUES (:idCorso, :idUtente);');

$getIscritti = sys3db::db()->prepare("SELECT `id` FROM `iscritti` WHERE `email` = '$email'");

$getIscritti->execute();

$utente = $getIscritti->fetch(PDO::FETCH_ASSOC);

$getCorsi = sys3db::db()->prepare('SELECT * FROM `corsi`');

$getCorsi->execute();

$corso = $getCorsi->fetchAll();

$sql->bindParam(':idUtente', $utente['id']);
$sql->bindParam(':idCorso', $selcorso);

$selcorso = (!empty($_POST['selcorso'])) ? $_POST['selcorso'] : 0;

print_r($corso);

if(isset($_POST['submit'])) {

  $sql->execute();

  if($sql->rowCount() === 0) {
    if($sql->errorCode() !== "00000") {
      echo 'Si &egrave; verificato un errore durante l\'aggiunta del corso: ' . $sql->errorInfo()[0] . ':' . $sql->errorInfo()[1] . ' ' . $sql->errorInfo()[2];
    }
    echo 'Non &egrave; stato possibile inserire i dati nel database!';
  } else {
    header('location: listIscritti.php');
  }
}

?>

<!DOCTYPE html>
<html style="min-height: 100%; min-width: 100%">
  <head>
    <meta charset="utf-8">
    <title>Systema3 - Aggiungi Corsi</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="assets/flatui/css/flat-ui.min.css">
  </head>
  <body style="background-color: #222d32; position: absolute; min-height: 100%; max-height: 100%; height: 100%; width: 100%; position: absolute">
    <div class="container" style="background-color: white; min-height: 100%;">

      <div class="logo">
        <img src="assets/img/sp5.png" height="135" style="padding: 15px;" alt="">
      </div>

      <div id="navbar" class="navbar-collapse collapse" style="border-bottom: 1px solid black; border-top: 1px solid black">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="listIscritti.php">Utenti</a></li>
              <li><a href="listCorsi.php">Corsi</a></li>
              <li><a href="listNewsletter.php">Newsletter</a></li>
            </ul>
          </div>

      <h1>Aggiungi Corso</h1>

    <form id="form" class="" method="post">

    <div class="form-group">

      <div class="row">

      <div class="col-xs-4">

      <label for="cognome">Data Inizio:</label>
      <select class="form-control" name="selcorso">
        <?php foreach($corso as $course): ?>
        <option value="<?php echo $course['id'] ?>"><?php echo $course['titolo'] ?></option>
        <?php endforeach; ?>
      </select>

      </div>

      </div>

    <div class="row" style="display: flex">

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-primary" type="submit" name="submit" value="Aggiungi">

    </div>

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-warning" on-click="document.getElementById('form').reset()" type="reset" name="" value="Reset">

    </div>

    <div class="col-xs-3">

      <a href="listCorsi.php">Annulla</a>

    </div>

  </div>

    </form>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
