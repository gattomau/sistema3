<?php

use sys3classes\sys3db;
use sys3classes\sys3corsi;

require 'autoload.php';

$corsi = new sys3corsi;

$courseid = $_GET['id'];

$getjoin = sys3db::db()->prepare('SELECT `iscritti`.`nome`, `iscritti`.`cognome`, `iscritti`.`email`
                                   FROM `corsi`
                                   JOIN `iscritticorsi`
                                   ON `corsi`.`id` = `iscritticorsi`.`idCorso`
                                   JOIN `iscritti`
                                   ON `iscritticorsi`.`idUtente` = `iscritti`.`id`');

$getjoin->execute();

$row = $getjoin->fetchAll();

print_r($row);

?>

<!DOCTYPE html>
<html style="min-height: 100%; min-width: 100%">
  <head>
    <meta charset="utf-8">
    <title>Systema3 - Visualizzazione Corso</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="assets/flatui/css/flat-ui.min.css">
  </head>
  <body style="background-color: #222d32; position: absolute; min-height: 100%; max-height: 100%; height: 100%; width: 100%; position: absolute">
    <div class="container" style="background-color: white; min-height: 100%; min-width: 100%">

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

      <h1>Dettagli Corso</h1>

        <table class="table">
          <tr>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"><a href="listCorsi.php"><button class="btn btn-block btn-primary">Indietro</button></a></span></td>
          </tr>
          <tr>
            <td colspan="8"><h4>Dati Corso</h4></td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">ID</span></td>
            <td><span style="font-weight: bold">Titolo</span></td>
            <td><span style="font-weight: bold">Data Inizio</span></td>
            <td><span style="font-weight: bold">Data Fine</span></td>
            <td><span style="font-weight: bold">Docente</span></td>
            <td><span style="font-weight: bold">Descrizione</span></td>
          </tr>
        <?php foreach($corsi->recuperauno($courseid) as $course): ?>
          <tr>
            <td><?php echo '#' . $course['id'] . '/2017' ?></td>
            <td><?php echo $course['titolo'] ?></td>
            <td><?php echo $course['dataInizio'] ?></td>
            <td><?php echo date('d M Y', strtotime($course['dataFine'])) ?></td>
            <td><?php echo $course['docente'] ?></td>
            <td><?php echo $course['descrizione'] ?></td>
          </tr>
        <?php endforeach ?>
        <tr>
          <td colspan="6"><h4>Utenti Iscritti</h4></td>
        </tr>
        <tr>
          <td><span style="font-weight: bold">Nome</span></td>
          <td><span style="font-weight: bold">Cognome</span></td>
          <td><span style="font-weight: bold">E-Mail</span></td>
        </tr>
        <?php foreach($row as $utenteIscritto): ?>
        <tr>
          <td><span><?php echo $utenteIscritto['nome'] ?></span></td>
          <td><span><?php echo $utenteIscritto['cognome'] ?></span></td>
          <td><span><?php echo $utenteIscritto['email'] ?></span></td>
        </tr>
      <?php endforeach ?>
        </table>
        <!-- <td><?php echo '<a href="mailto:' . $user['email'] . '">' . $user['email'] . '</a>' ?></td> -->


    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
