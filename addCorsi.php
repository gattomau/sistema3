<?php

use sys3classes\sys3db;
use sys3classes\sys3corsi;

require 'autoload.php';

$corsi = new sys3corsi;

error_reporting(E_ALL);

ini_set('display_errors', 1);

$corsi->init();

$getCategorie = sys3db::db()->prepare("SELECT * FROM categorie");

$getCategorie->execute();

$categorie = $getCategorie->fetchAll();

$getSottocategorie = sys3db::db()->prepare("SELECT * FROM sottocategorie");

$getSottocategorie->execute();

$sottocategorie = $getSottocategorie->fetchAll();

$sql = sys3db::db()->prepare('INSERT INTO `corsi` (titolo, categoria, sottocategoria, dataInizio, dataFine, orarioInizio, orarioFine, incontri, cadenza, docente, descrizione) VALUES (:titolo, :categoria, :sottocategoria, :dataInizio, :dataFine, :orarioInizio, :orarioFine, :incontri, :cadenza, :docente, :descrizione);');

$sql->bindParam(':titolo', $titolo);
$sql->bindParam(':categoria', $categoria);
$sql->bindParam(':sottocategoria', $sottocategoria);
$sql->bindParam(':dataInizio', $dataInizio);
$sql->bindParam(':dataFine', $dataFine);
$sql->bindParam(':orarioInizio', $orarioInizio);
$sql->bindParam(':orarioFine', $orarioFine);
$sql->bindParam(':incontri', $incontri);
$sql->bindParam(':cadenza', $cadenza);
$sql->bindParam(':docente', $docente);
$sql->bindParam(':descrizione', $descrizione);

$titolo = (!empty($_POST['titolo'])) ? $_POST['titolo'] : NULL;
$categoria = (!empty($_POST['categoria'])) ? $_POST['categoria'] : 0;
$sottocategoria = (!empty($_POST['sottocategoria'])) ? $_POST['sottocategoria'] : 0;
$dataInizio = (!empty($_POST['dataInizio'])) ? $_POST['dataInizio'] : NULL;
$dataFine = (!empty($_POST['dataFine'])) ? $_POST['dataFine'] : NULL;
$orarioInizio = (!empty($_POST['orarioInizio'])) ? $_POST['orarioInizio'] : NULL;
$orarioFine = (!empty($_POST['orarioFine'])) ? $_POST['orarioFine'] : NULL;
$incontri = (!empty($_POST['incontri'])) ? $_POST['incontri'] : NULL;
$cadenza = (!empty($_POST['cadenza'])) ? $_POST['cadenza'] : NULL;
$docente = (!empty($_POST['docente'])) ? $_POST['docente'] : NULL;
$descrizione = (!empty($_POST['descrizione'])) ? $_POST['descrizione'] : NULL;

if(isset($_POST['submit'])) {

  $sql->execute();

  if($sql->rowCount() === 0) {
    if($sql->errorCode() !== "00000") {
      echo 'Si &egrave; verificato un errore durante l\'aggiunta del corso: ' . $sql->errorInfo()[0] . ':' . $sql->errorInfo()[1] . ' ' . $sql->errorInfo()[2];
    }
    echo 'Non &egrave; stato possibile inserire i dati nel database!';
  } else {
    header('location: listCorsi.php');
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

      <h1>Aggiungi Corso</h1>

    <form id="form" class="" method="post">

    <div class="form-group">

      <div class="row">

      <div class="col-xs-4">

      <label for="nome">Titolo:</label>
      <input class="form-control" type="text" name="titolo" placeholder="Titolo" value="">

      </div>

      <div class="col-xs-4">

      <label for="docente">Docente:</label>
      <input class="form-control" type="text" name="docente" placeholder="Docente" value="">

      </div>

      <div class="col-xs-4">

      <label for="categoria">Indirizzo:</label>
      <select class="form-control" name="categoria">
        <option value="">---</option>
        <?php foreach($categorie as $categoria): ?>
        <option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['Titolo'] ?></option>
        <?php endforeach ?>
      </select>

      </div>

      </div>

      <div class="row">

        <div class="col-xs-4">

        <label for="sottocategoria">Materia:</label>
        <select class="form-control" name="sottocategoria">
          <option value="">---</option>
          <?php foreach($sottocategorie as $sottocategoria): ?>
          <option value="<?php echo $sottocategoria['id'] ?>"><?php echo $sottocategoria['Titolo'] ?></option>
          <?php endforeach ?>
        </select>

        </div>

        <div class="col-xs-4">

        <label for="dataInizio">Data Inizio:</label>
        <input class="form-control" type="date" name="dataInizio" placeholder="Data Inizio" value="">

        </div>

        <div class="col-xs-4">

        <label for="dataFine">Data Fine:</label>
        <input class="form-control" type="date" name="dataFine" placeholder="Data Fine" value="">

        </div>

      </div>

      <div class="row">

        <div class="col-xs-4">
          <label for="orarioInizio">Orario di Inizio:</label>
          <input class="form-control" type="text" name="orarioInizio" placeholder="Orario di Inizio" value="">
        </div>

        <div class="col-xs-4">
          <label for="orarioFine">Orario di Fine:</label>
          <input class="form-control" type="text" name="orarioFine" placeholder="Orario di Fine" value="">
        </div>

        <div class="col-xs-4">
          <label for="incontri">Incontri:</label>
          <input class="form-control" type="text" name="incontri" placeholder="Numero Incontri" value="">
        </div>

      </div>

      <div class="row">

        <div class="col-xs-4">
          <label for="cadenza">Cadenza:</label>
          <input type="text" name="cadenza" value="">
        </div>

      </div>

      <div class="row">

        <div class="col-xs-12">


        <label for="descrizione">Descrizione:</label>
        <textarea class="form-control" rows="8" cols="80" name="descrizione" placeholder="Descrizione" value=""></textarea>

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

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
