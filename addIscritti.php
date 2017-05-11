<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

$iscritti = new sys3iscritti;

$iscritti->init();

$sql = sys3db::db()->prepare('INSERT INTO `iscritti` (nome, cognome, nascita, indirizzo, citta, codfiscale, tipodocidentita, numdocidentita, email, cellulare, telefono, annosociale, newsletter) VALUES (:nome, :cognome, :nascita, :indirizzo, :citta, :codfiscale, :tipodocidentita, :numdocidentita, :email, :cellulare, :telefono, :annosociale, :newsletter);');

$sql->bindParam(':nome', $nome);
$sql->bindParam(':cognome', $cognome);
$sql->bindParam(':nascita', $nascita);
$sql->bindParam(':indirizzo', $indirizzo);
$sql->bindParam(':citta', $citta);
$sql->bindParam(':codfiscale', $codfiscale);
$sql->bindParam(':tipodocidentita', $tipodocidentita);
$sql->bindParam(':numdocidentita', $numdocidentita);
$sql->bindParam(':email', $email);
$sql->bindParam(':cellulare', $cellulare);
$sql->bindParam(':telefono', $telefono);
$sql->bindParam(':annosociale', $annosociale);
$sql->bindParam(':newsletter', $newsletter);

$nome = (!empty($_POST['nome'])) ? $_POST['nome'] : NULL;
$cognome = (!empty($_POST['cognome'])) ? $_POST['cognome'] : NULL;
$nascita = (!empty($_POST['nascita'])) ? $_POST['nascita'] : NULL;
$indirizzo = (!empty($_POST['indirizzo'])) ? $_POST['indirizzo'] : NULL;
$citta = (!empty($_POST['citta'])) ? $_POST['citta'] : NULL;
$codfiscale = (!empty($_POST['codfiscale'])) ? $_POST['codfiscale'] : NULL;
$tipodocidentita = (!empty($_POST['tipodocidentita'])) ? $_POST['tipodocidentita'] : NULL;
$numdocidentita = (!empty($_POST['numdocidentita'])) ? $_POST['numdocidentita'] : NULL;
$email = (!empty($_POST['email'])) ? $_POST['email'] : NULL;
$cellulare = (!empty($_POST['cellulare'])) ? $_POST['cellulare'] : NULL;
$telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : NULL;
$annosociale = (!empty($_POST['annosociale'])) ? $_POST['annosociale'] : NULL;
$newsletter = (!empty($_POST['newsletter'])) ? $_POST['newsletter'] : NULL;

if(isset($_POST['submit'])) {
  $sql->execute();

  if($sql->rowCount() === 0) {
    if($sql->errorCode() !== "00000") {
      echo 'Si &egrave; verificato un errore durante l\'inserimento dei dati: ' . $sql->errorCode();
    }
    echo 'Si &egrave; verificato un errore durante l\'inserimento dei dati.';
  } else {
    header('location: addIscrittiCorsi.php?email=' . $_POST['email']);
  }
}

?>

<!DOCTYPE html>
<html style="min-height: 100%; min-width: 100%">
  <head>
    <meta charset="utf-8">
    <title>Systema3 - Aggiungi Iscritti</title>
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

      <h1>Iscrizione Utente</h1>

    <form id="form" class="" method="post">

    <div class="form-group">

      <div class="row">

      <div class="col-xs-4">

        <label for="nome">Nome:</label>
        <input class="form-control" type="text" name="nome" placeholder="Nome" value="">

      </div>


      <div class="col-xs-4">

        <label for="cognome">Cognome:</label>
        <input class="form-control" type="text" name="cognome" placeholder="Cognome" value="">

      </div>

      <div class="col-xs-4">

        <label for="nascita">Data di Nascita::</label>
        <input class="form-control" type="date" name="nascita" placeholder="Data di Nascita" value="">

      </div>

      </div>

      <div class="row">

      <div class="col-xs-4">

        <label for="indirizzo">Indirizzo:</label>
        <input class="form-control" type="text" name="indirizzo" placeholder="Indirizzo" value="">

      </div>

      <div class="col-xs-4">


        <label for="citta">Citta`:</label>
        <input class="form-control" type="text" name="citta" placeholder="Citta`" value="">

      </div>

      <div class="col-xs-4">

        <label for="codfiscale">Codice Fiscale:</label>
        <input class="form-control" type="text" name="codfiscale" placeholder="Codice Fiscale" value="">

      </div>

      </div>

      <div class="row">

      <div class="col-xs-4">

        <label for="tipodocidentita">Tipo Documento d'Identita`:</label>
        <input class="form-control" type="text" name="tipodocidentita" placeholder="Tipo Documento Identita`" value="">

      </div>

      <div class="col-xs-4">

        <label for="numdocidentita">Numero Documento d'Identita`:</label>
        <input class="form-control" type="text" name="numdocidentita" placeholder="Numero Documento Identita`" value="">

      </div>

      <div class="col-xs-4">

        <label for="email">E-Mail:</label>
        <input class="form-control" type="email" name="email" placeholder="E-Mail" value="">

      </div>

      </div>

      <div class="row">

      <div class="col-xs-4">

        <label for="cellulare">Cellulare:</label>
        <input class="form-control" type="text" name="cellulare" placeholder="Cellulare" value="">

      </div>

      <div class="col-xs-4">

        <label for="telefono">Telefono:</label>
        <input class="form-control" type="text" name="telefono" placeholder="Telefono" value="">

      </div>


      <div class="col-xs-4">

        <label for="annosociale">Anno Sociale:</label>
        <input class="form-control" type="text" name="annosociale" placeholder="Anno Sociale" value="2017/2018" disabled>

      </div>

      </div>

      <div class="row">
      <div class="col-xs-4">

      <label for="newsletter">Newsletter:</label>
      <select class="form-control" name="newsletter">
        <option value="0">---</option>
        <option value="1">Si</option>
        <option value="0">No</option>
      </select>

      </div>
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

      <a href="listIscritti.php">Annulla</a>

    </div>

  </div>

    </form>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
