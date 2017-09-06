<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$iscritti = new sys3iscritti;

if(isset($_GET['nome'])) {

  $nome = $_GET['nome'];

  $getIscritti = sys3db::db()->prepare("SELECT * FROM `iscritti` WHERE `nome` LIKE '%$nome%'");

  $getIscritti->execute();

  $resIscritti = $getIscritti->fetchAll();

  var_dump($resIscritti);

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
              <li class="active"><a href="main.php">Home</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utenti <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="listIscritti.php">Lista Utenti</a></li>
                  <li><a href="tshIscritti.php">Cestino Utenti</a></li>
                </ul>
              </li>
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

      <h1>Utenti Iscritti</h1>

        <table id="userTable" class="table">
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><span style="font-weight: bold"><input id="inputCercaNome" onkeyup="myFunction()" type="text" name="" value="" placeholder="Nome"></span></td>
            <td><span style="font-weight: bold"><input id="inputCercaCognome" onkeyup="hisFunction()" type="text" name="" value="" placeholder="Cognome"></span></td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">ID</span></td>
            <td><span style="font-weight: bold">Nome</span></td>
            <td><span style="font-weight: bold">Cognome</span></td>
            <td><span style="font-weight: bold">E-Mail</span></td>
            <td><span style="font-weight: bold">Dettagli</span></td>
            <td><span style="font-weight: bold">Modifica</span></td>
            <td><span style="font-weight: bold">Elimina</span></td>
          </tr>
        <?php foreach($iscritti->recupera() as $sub): ?>
          <tr>
            <td><?php echo '#' . $sub['id'] . '/2017' ?></td>
            <td><?php echo $sub['nome'] ?></td>
            <td><?php echo $sub['cognome'] ?></td>
            <td><?php echo '<a href="mailto:' . $sub['email'] . '">' . $sub['email'] . '</a>' ?></td>
            <td><?php echo '<a href="vwIscritti.php' . '?id=' . $sub['id'] . '"><button class="btn btn-block btn-success">Dettagli</button></a>'; ?></td>
            <td><?php echo '<a href="updIscritti.php' . '?id=' . $sub['id'] . '"><button class="btn btn-block btn-warning">Modifica</button></a>'; ?></td>
            <td><?php echo '<a href="delIscritti.php' . '?id=' . $sub['id'] . '"><button class="btn btn-block btn-danger">Elimina</button></a>'; ?></td>
          </tr>
        <?php endforeach ?>
        </table>


    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
    <script>
    function myFunction() {

      var input, filter, table, tr, td, i;
      input = document.getElementById('inputCercaNome');
      filter = input.value.toUpperCase();
      table = document.getElementById('userTable');
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

    function hisFunction() {

      var input, filter, table, tr, td, i;
      input = document.getElementById('inputCercaCognome');
      filter = input.value.toUpperCase();
      table = document.getElementById('userTable');
      tr = document.getElementsByTagName('tr');

      for (i = 2; i < tr.length; i++) {
        td = tr[i].getElementsByTagName('td')[2];
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
