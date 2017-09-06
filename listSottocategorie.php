<?php

use sys3classes\sys3db;
use sys3classes\sys3corsi;

require 'autoload.php';

$corsi = new sys3corsi;

$corsi->init();

$getCategorie = sys3db::db()->prepare('SELECT sottocategorie.id AS idSottocat, categorie.Titolo AS titoloCat, sottocategorie.Titolo as titoloSottocat, sottocategorie.categoriaParent FROM sottocategorie JOIN categorie ON sottocategorie.categoriaParent = categorie.id');

$getCategorie->execute();

$categorie = $getCategorie->fetchAll();

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

      <h1>Elenco Sottocategorie</h1>

        <table class="table">
          <tr>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"></span></td>
            <td><span style="font-weight: bold"><a href="addSottocategorie.php"><button class="btn btn-block btn-primary">Aggiungi</button></a></span></td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">ID</span></td>
            <td><span style="font-weight: bold">Categoria</span></td>
            <td><span style="font-weight: bold">Titolo</span></td>
            <td colspan="3"></td>
          </tr>
        <?php foreach($categorie as $categoria): ?>
          <tr>
            <td><?php echo '#' . $categoria['idSottocat'] . '/2017' ?></td>
            <td><?php echo $categoria['titoloCat'] ?></td>
            <td><?php echo $categoria['titoloSottocat'] ?></td>
            <td><?php echo '<a href="updSottocategorie.php' . '?id=' . $categoria['idSottocat'] . '"><button class="btn btn-block btn-warning">Modifica</button></a>'; ?></td>
            <td><?php echo '<a href="delSottocategorie.php' . '?id=' . $categoria['idSottocat'] . '"><button class="btn btn-block btn-danger">Elimina</button></a>'; ?></td>
          </tr>
        <?php endforeach ?>
        </table>


    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>