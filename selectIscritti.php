<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

session_start();

error_reporting(E_ALL);

ini_set('display_errors', 1);

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

      <h1>Ricerca Utenti</h1>

    <form id="form" class="" action="addIscritti.php" method="get">

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

      </div>

    </div>

    <div class="row" style="display: flex">

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-primary" type="submit" name="button" value="Cerca...">

    </div>

  </div>

    </form>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
