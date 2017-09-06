<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$iscritti = new sys3iscritti;

$iscritti->init();

$sql = sys3db::db()->prepare('INSERT INTO `iscritti2017` (nome, cognome, nascita, sesso, indirizzo, citta, email, cellulare, telefono, annosociale, newsletter, data, confirmed, removed) VALUES (:nome, :cognome, :nascita, :sesso, :indirizzo, :citta, :email, :cellulare, :telefono, :annosociale, :newsletter, :data, :confirmed, :removed);');

$sql->bindParam(':nome', $nome);
$sql->bindParam(':cognome', $cognome);
$sql->bindParam(':nascita', $nascita);
$sql->bindParam(':sesso', $sesso);
$sql->bindParam(':indirizzo', $indirizzo);
$sql->bindParam(':citta', $citta);
$sql->bindParam(':email', $email);
$sql->bindParam(':cellulare', $cellulare);
$sql->bindParam(':telefono', $telefono);
$sql->bindParam(':annosociale', $annosociale);
$sql->bindParam(':newsletter', $newsletter);
$sql->bindParam(':data', $now);
$sql->bindParam(':confirmed', $confirmed);
$sql->bindParam(':removed', $removed);

$nome = (!empty($_POST['nome'])) ? $_POST['nome'] : NULL;
$cognome = (!empty($_POST['cognome'])) ? $_POST['cognome'] : NULL;
$nascita = (!empty($_POST['nascita'])) ? $_POST['nascita'] : NULL;
$sesso = (!empty($_POST['sesso'])) ? $_POST['sesso'] : NULL;
$indirizzo = (!empty($_POST['indirizzo'])) ? $_POST['indirizzo'] : NULL;
$citta = (!empty($_POST['citta'])) ? $_POST['citta'] : NULL;
$email = (!empty($_POST['email'])) ? $_POST['email'] : NULL;
$cellulare = (!empty($_POST['cellulare'])) ? $_POST['cellulare'] : NULL;
$telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : NULL;
$annosociale = (!empty($_POST['annosociale'])) ? $_POST['annosociale'] : NULL;
$newsletter = (!empty($_POST['newsletter'])) ? $_POST['newsletter'] : NULL;
$confirmed = false;
$removed = $confirmed;
$now = time();

if(isset($_POST['submit'])) {
  $sql->execute();

  if($sql->rowCount() === 0) {
    if($sql->errorCode() !== "00000") {
      echo 'Si &egrave; verificato un errore durante l\'inserimento dei dati: ' . $sql->errorCode();
    }
    echo 'Si &egrave; verificato un errore durante l\'inserimento dei dati.';
  } else {
    header('location: selectIscritti.php');
  }
}

if(isset($_GET['nome']) && isset($_GET['cognome'])) {

$name = $_GET['nome'];

$surname = $_GET['cognome'];

$alrsub = sys3db::db()->prepare("SELECT nome, cognome, nascita, indirizzo, citta, email, cellulare, telefono FROM iscritti WHERE nome LIKE '%$name%' AND cognome LIKE '%$surname%' ");

$alrsub->execute();

$gotsub = $alrsub->fetch(PDO::FETCH_ASSOC);

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
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Corsi <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="listCorsi.php">Lista</a></li>
                  <li><a href="addCorsi.php">Nuovo Corso</a></li>
                  <li><a href="listCategorie.php">Categorie</a></li>
                  <li><a href="listSottocategorie.php">Sottocategorie</a></li>
                </ul>
              </li>
              <li><a href="listNewsletter.php">Newsletter</a></li>
            </ul>
          </div>

      <h1>Iscrizione Utente</h1>

    <form id="form" class="" method="post">

    <div class="form-group">

      <div class="row">

      <div class="col-xs-4">

        <label for="nome">Nome:</label>
        <input class="form-control" type="text" name="nome" placeholder="Nome" value="<?php echo (!empty($gotsub['nome']) ? $gotsub['nome'] : $name) ?>" required>

      </div>


      <div class="col-xs-4">

        <label for="cognome">Cognome:</label>
        <input class="form-control" type="text" name="cognome" placeholder="Cognome" value="<?php echo (!empty($gotsub['cognome']) ? $gotsub['cognome'] : $surname) ?>" required>

      </div>

      <div class="col-xs-4">

        <label for="nascita">Data di Nascita::</label>
        <input class="form-control" type="date" name="nascita" placeholder="Data di Nascita" value="<?php echo (!empty($gotsub['nascita']) ? $gotsub['nascita'] : '') ?>">

      </div>

      </div>

      <div class="row">

      <div class="col-xs-4">

        <label for="sesso">Sesso:</label>
        <input class="form-control" type="text" name="sesso" placeholder="Sesso" value="<?php echo (!empty($gotsub['sesso']) ? $gotsub['sesso'] : '') ?>" maxlength="1">

      </div>

      <div class="col-xs-4">

        <label for="indirizzo">Indirizzo:</label>
        <input class="form-control" type="text" name="indirizzo" placeholder="Indirizzo" value="<?php echo (!empty($gotsub['indirizzo']) ? $gotsub['indirizzo'] : '') ?>">

      </div>

      <div class="col-xs-4">


        <label for="citta">Citta`:</label>
        <input class="form-control" type="text" name="citta" placeholder="Citta`" value="<?php echo (!empty($gotsub['citta']) ? $gotsub['citta'] : '') ?>">

      </div>

      </div>

      <div class="row">

      <div class="col-xs-4">

        <label for="email">E-Mail:</label>
        <input class="form-control" type="email" name="email" placeholder="E-Mail" value="<?php echo (!empty($gotsub['email']) ? $gotsub['email'] : '') ?>" required>

      </div>

      <div class="col-xs-4">

        <label for="cellulare">Cellulare:</label>
        <input class="form-control" type="text" name="cellulare" placeholder="Cellulare" value="<?php echo (!empty($gotsub['cellulare']) ? $gotsub['cellulare'] : '') ?>">

      </div>

      <div class="col-xs-4">

        <label for="telefono">Telefono:</label>
        <input class="form-control" type="text" name="telefono" placeholder="Telefono" value="<?php echo (!empty($gotsub['telefono']) ? $gotsub['telefono'] : '') ?>">

      </div>

      </div>



    </div>

    <div class="row" style="display: flex">

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-primary" type="submit" name="submit" value="Iscrivi">

    </div>

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-warning" on-click="document.getElementById('form').reset()" type="reset" name="" value="Svuota Modulo">

    </div>

    <div class="col-xs-3">

      <a href="selectIscritti.php">Annulla</a>

    </div>

  </div>

    </form>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
