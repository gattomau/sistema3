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

$getIscritti = sys3db::db()->prepare("SELECT `id` FROM `iscritti2017` WHERE `email` = '$email'");

$getIscritti->execute();

$utente = $getIscritti->fetch(PDO::FETCH_ASSOC);

$getCorsi = sys3db::db()->prepare('SELECT * FROM `corsi`');

$getCorsi->execute();

$corso = $getCorsi->fetchAll();

$getCategorie = sys3db::db()->prepare('SELECT * FROM categorie');

$getCategorie->execute();

$categorie = $getCategorie->fetchAll();

$getSottocategorie = sys3db::db()->prepare('SELECT * FROM sottocategorie');

$getSottocategorie->execute();

$sottocategorie = $getSottocategorie->fetchAll();

$sql->bindParam(':idUtente', $utente['id']);
$sql->bindParam(':idCorso', $courseid);

$courseid = (!empty($courseid)) ? $courseid : 0;

if(isset($_GET['courseid'])) {
  $courseid = $_GET['courseid'];

  $sql->execute();

  if($sql->rowCount() === 0) {
    if($sql->errorCode() !== "00000") {
      echo 'Si &egrave; verificato un errore durante l\'aggiunta del corso: ' . $sql->errorInfo()[0] . ':' . $sql->errorInfo()[1] . ' ' . $sql->errorInfo()[2];
    }
    echo 'Non &egrave; stato possibile inserire i dati nel database!';
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

      <h1>Iscrivi ai Corsi</h1>

      <table id="corsiTable" class="table">
        <tr>
          <!-- <td><span style="font-weight: bold"></span></td>
          <td><span style="font-weight: bold"></span></td> -->
          <td><span style="font-weight: bold"><input id="cercaTitolo" onkeyup="cercaTitolo()" type="text" name="titolo" value="" placeholder="Titolo"></span></td>
          <td><span style="font-weight: bold"><input id="cercaDocente" onkeyup="cercaDocente()" type="text" name="docente" value="" placeholder="Docente"></span></td>
          <td colspan="2"><span style="font-weight: bold"><select id="cercaCategoria" onmouseup="cercaCategoria()">
            <option value="Indirizzi">Indirizzi...</option>
            <?php foreach($categorie as $categoria): ?>
            <option value="<?php echo $categoria['Titolo'] ?>"><?php echo $categoria['Titolo'] ?></option>
            <?php endforeach ?>
          </select></span></td>
          <td><span style="font-weight: bold"><select id="cercaSottocategoria" onmouseup="cercaSottocategoria()">
            <option value="Materie">Materie...</option>
            <?php foreach($sottocategorie as $sottocategoria): ?>
            <option value="<?php echo $sottocategoria['Titolo'] ?>"><?php echo $sottocategoria['Titolo'] ?></option>
            <?php endforeach ?>
          </select></span></td>
        </tr>
        <tr>
          <td><span style="font-weight: bold">Titolo</span></td>
          <!-- <td><span style="font-weight: bold">Data Inizio</span></td>
          <td><span style="font-weight: bold">Data Fine</span></td> -->
          <td><span style="font-weight: bold">Docente</span></td>
          <td><span style="font-weight: bold">Indirizzo</span></td>
          <td><span style="font-weight: bold">Materia</span></td>
          <td colspan="3"></td>
        </tr>
      <?php foreach($corsi->recupera() as $course): ?>
        <tr>
          <td><?php echo $course['titolo'] ?></td>
          <td><?php echo $course['docente'] ?></td>
          <td><?php echo $course['titoloCategoria'] ?></td>
          <td><?php echo $course['titoloSottocategoria'] ?></td>
          <td><?php echo '<a href="addIscrittiCorsi.php?email=' . $email . '&courseid=' . $course['id'] . '"><button class="btn btn-block btn-success">Iscrivi</button></a>'; ?></td>
        </tr>
      <?php endforeach ?>
      <tr>
        <td><span style="font-weight: bold"></span></td>
        <td><span style="font-weight: bold"></span></td>
        <td><span style="font-weight: bold"></span></td>
        <td></td>
        <td></td>
        <td></td>
        <td><span style="font-weight: bold"></td>
      </tr>
      </table>

      <span style="margin-bottom: 25px"><a href="listIscritti.php"><button class="btn btn-block btn-info">Completato</button></a></span>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
    <script>
    function cercaTitolo() {

      var input, filter, table, tr, td, i;
      input = document.getElementById('cercaTitolo');
      filter = input.value.toUpperCase();
      table = document.getElementById('corsiTable');
      tr = document.getElementsByTagName('tr');

      for (i = 2; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[1];
        if (td) {
          if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    function cercaDocente() {

      var input, filter, table, tr, td, i;
      input = document.getElementById('cercaDocente');
      filter = input.value.toUpperCase();
      table = document.getElementById('corsiTable');
      tr = document.getElementsByTagName('tr');

      for (i = 2; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[4];
        if (td) {
          if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    function cercaCategoria() {

      var input, filter, table, tr, td, i;
      input = document.getElementById('cercaCategoria');
      filter = input.value.toUpperCase();
      table = document.getElementById('corsiTable');
      tr = document.getElementsByTagName('tr');

      for (i = 2; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[5];
        if (td) {
          if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
  </body>
</html>
