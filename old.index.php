<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

error_reporting(E_ALL);

ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html style="min-height: 100%; min-width: 100%">
  <head>
    <meta charset="utf-8">
    <title>Systema3 - Aggiungi Iscritti</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css"> -->
    <link rel="stylesheet" href="assets/flatui/css/flat-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style media="screen">
      .panel {
        background: turquoise;
        border-radius: 10px;
        color: white;
        text-align: center;
        margin: 0 25px;
      }
    </style>
  </head>
  <body style="background-color: #222d32; position: absolute; min-height: 100%; max-height: 100%; height: 100%; width: 100%; position: absolute">
    <div class="container" style="background-color: white; min-height: 100%;">

      <div class="logo">
        <img src="assets/img/sp5.png" height="135" style="padding: 15px;" alt="">
      </div>

      <div id="navbar" class="navbar-collapse collapse" style="border-bottom: 1px solid black; border-top: 1px solid black">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
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

      <h1>Scegli Azione</h1>

      <a href="listIscritti.php">
      <div class="col-md-3 panel">
        <h1><i class="fa fa-user"></i></h1>
        <h4>Iscritti</h4>
      </div>
      </a>

      <a href="addIscritti.php">
      <div class="col-md-3 panel">
        <h1><i class="fa fa-user-plus"></i></h1>
        <h4>Nuova Iscrizione</h4>
      </div>
      </a>

      <a href="listCorsi.php">
      <div class="col-md-3 panel">
        <h1><i class="fa fa-mortar-board"></i></h1>
        <h4>Corsi</h4>
      </div>
      </a>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
