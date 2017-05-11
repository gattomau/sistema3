<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

error_reporting(E_ALL);

ini_set('display_errors', 1);

$iscritti = new sys3iscritti;

$userid = $_GET['id'];

$iscritti->recuperauno($userid);

$getjoin = sys3db::db()->prepare('SELECT `corsi`.`titolo`, `corsi`.`dataInizio`, `corsi`.`dataFine`, `corsi`.`docente`
                                   FROM `iscritti`
                                   JOIN `iscritticorsi`
                                   ON `iscritti`.`id` = `iscritticorsi`.`idUtente`
                                   JOIN `corsi`
                                   ON `corsi`.`id` = `iscritticorsi`.`idCorso`');

$getjoin->execute();

$row = $getjoin->fetch(PDO::FETCH_ASSOC);

var_dump($row);

?>

<!DOCTYPE html>
<html style="min-height: 100%; min-width: 100%">
  <head>
    <meta charset="utf-8">
    <title>Systema3 - Visualizzazione Utente</title>
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

      <h1>Dettagli Iscritto</h1>

        <table class="table">
          <tr>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"><a href="listIscritti.php"><button class="btn btn-block btn-primary">Indietro</button></a></span></td>
          </tr>
          <tr>
            <td colspan="8"><h4>Dati Anagrafici</h4></td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">ID</span></td>
            <td><span style="font-weight: bold">Nome</span></td>
            <td><span style="font-weight: bold">Cognome</span></td>
            <td><span style="font-weight: bold">Data di Nascita</span></td>
            <td><span style="font-weight: bold">Indirizzo</span></td>
            <td><span style="font-weight: bold">Città</span></td>
          </tr>
        <?php foreach($iscritti->recuperauno($userid) as $user): ?>
          <tr>
            <td><?php echo '#' . $user['id'] . '/2017' ?></td>
            <td><?php echo $user['nome'] ?></td>
            <td><?php echo $user['cognome'] ?></td>
            <td><?php echo date('d M Y', strtotime($user['nascita'])) ?></td>
            <td><?php echo $user['indirizzo'] ?></td>
            <td><?php echo $user['citta'] ?></td>
          </tr>
          <tr>
            <td colspan="6"><h4>Documenti Censiti</h4></td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">Codice Fiscale</span></td>
            <td><span style="font-weight: bold">Documento</span></td>
            <td><span style="font-weight: bold">Num. Documento</span></td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td><?php echo $user['codfiscale'] ?></td>
            <td><?php echo $user['tipodocidentita'] ?></td>
            <td><?php echo $user['numdocidentita'] ?></td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td colspan="6"><h4>Contatti</h4></td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">E-Mail</span></td>
            <td><span style="font-weight: bold">Telefono</span></td>
            <td><span style="font-weight: bold">Cellulare</span></td>
            <td colspan="3"></td>
          </tr>
          <tr>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['telefono'] ?></td>
            <td><?php echo $user['cellulare'] ?></td>
            <td colspan="5"></td>
          </tr>
        <?php endforeach ?>
        <tr>
          <td colspan="6"><h4>Dettagli Corsi</h4></td>
        </tr>
        <tr>
          <td><span style="font-weight: bold">Titolo</span></td>
          <td><span style="font-weight: bold">Data Inizio</span></td>
          <td><span style="font-weight: bold">Data Fine</span></td>
          <td><span style="font-weight: bold">Docente</span></td>
          <td colspan="3"></td>
        </tr>
        <tr>
          <td><span><?php echo $row['titolo'] ?></span></td>
          <td><span><?php echo $row['dataInizio'] ?></span></td>
          <td><span><?php echo $row['dataFine'] ?></span></td>
          <td><span><?php echo $row['docente'] ?></span></td>
          <td colspan="3"></td>
        </tr>
        </table>
        <!-- <td><?php echo '<a href="mailto:' . $user['email'] . '">' . $user['email'] . '</a>' ?></td> -->


    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
