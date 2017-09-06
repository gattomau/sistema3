<?php

use sys3classes\sys3db;
use sys3classes\sys3corsi;

require 'autoload.php';

$corsi = new sys3corsi;

$courseid = $_GET['id'];

$sql = sys3db::db()->prepare("UPDATE `corsi` SET titolo=:titolo, dataInizio=:dataInizio, dataFine=:dataFine, docente=:docente, descrizione=:descrizione WHERE id='$courseid'");

$sql->bindParam(':titolo', $titolo);
$sql->bindParam(':dataInizio', $dataInizio);
$sql->bindParam(':dataFine', $dataFine);
$sql->bindParam(':docente', $docente);
$sql->bindParam(':descrizione', $descrizione);

$titolo = (!empty($_POST['titolo'])) ? $_POST['titolo'] : NULL;
$dataInizio = (!empty($_POST['dataInizio'])) ? $_POST['dataInizio'] : NULL;
$dataFine = (!empty($_POST['dataFine'])) ? $_POST['dataFine'] : NULL;
$docente = (!empty($_POST['docente'])) ? $_POST['docente'] : NULL;
$descrizione = (!empty($_POST['descrizione'])) ? $_POST['descrizione'] : NULL;

if(isset($_POST['submit'])) {
  $sql->execute();
  header('location: listCorsi.php');
}

?>

<!DOCTYPE html>
<html style="min-height: 100%; min-width: 100%">
  <head>
    <meta charset="utf-8">
    <title>Systema3 - Modifica Iscritto</title>
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

      <h1>Modifica Corso</h1>

    <?php foreach($corsi->recuperauno($courseid) as $course): ?>

      <form id="form" class="" method="post">

      <div class="form-group">

        <div class="row">

        <div class="col-xs-4">

        <label for="nome">Titolo:</label>
        <input class="form-control" type="text" name="titolo" placeholder="Titolo" value="<?php echo $course['titolo'] ?>">

        </div>


        <div class="col-xs-4">

        <label for="cognome">Data Inizio:</label>
        <input class="form-control" type="text" name="dataInizio" placeholder="Data Inizio" value="<?php echo $course['dataInizio'] ?>">

        </div>

        <div class="col-xs-4">

        <label for="nascita">Data Fine::</label>
        <input class="form-control" type="text" name="dataFine" placeholder="Data Fine" value="<?php echo $course['dataFine'] ?>">

        </div>

        </div>

        <div class="row">

        <div class="col-xs-4">

        <label for="indirizzo">Docente:</label>
        <input class="form-control" type="text" name="docente" placeholder="Docente" value="<?php echo $course['docente'] ?>">

        </div>

        <div class="col-xs-4">


        <label for="citta">Descrizione:</label>
        <textarea class="form-control" rows="8" cols="80" name="descrizione" placeholder="Descrizione" value=""><?php echo $course['descrizione'] ?></textarea>

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

        <a href="listCorsi.php">Annulla</a>

      </div>

    </div>

      </form>

  <?php endforeach ?>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
