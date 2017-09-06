<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

$iscritti = new sys3iscritti;

$userid = $_GET['id'];

$user = $iscritti->recuperauno($userid);

$sql = sys3db::db()->prepare("UPDATE `iscritti` SET nome=:nome, cognome=:cognome, nascita=:nascita, sesso=:sesso, indirizzo=:indirizzo, citta=:citta, email=:email, cellulare=:cellulare, telefono=:telefono, annosociale=:annosociale, newsletter=:newsletter WHERE id='$userid'");

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

$nome = (!empty($_POST['nome'])) ? $_POST['nome'] : NULL;
$cognome = (!empty($_POST['cognome'])) ? $_POST['cognome'] : NULL;
$nascita = (!empty($_POST['nascita'])) ? $_POST['nascita'] : NULL;
$indirizzo = (!empty($_POST['indirizzo'])) ? $_POST['indirizzo'] : NULL;
$citta = (!empty($_POST['citta'])) ? $_POST['citta'] : NULL;
$sesso = (!empty($_POST['sesso'])) ? $_POST['sesso'] : NULL;
$cellulare = (!empty($_POST['cellulare'])) ? $_POST['cellulare'] : NULL;
$telefono = (!empty($_POST['telefono'])) ? $_POST['telefono'] : NULL;
$annosociale = (!empty($_POST['annosociale'])) ? $_POST['annosociale'] : NULL;
$newsletter = (!empty($_POST['newsletter'])) ? $_POST['newsletter'] : NULL;

if(isset($_POST['submit'])) {
  $sql->execute();
  header('location: listIscritti.php');
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
              <li class="active"><a href="main.php">Home</a></li>
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

      <h1>Modifica Iscrizione</h1>

    <form id="form" class="" method="post">

      <div class="form-group">

        <div class="row">

        <div class="col-xs-4">

          <label for="nome">Nome:</label>
          <input class="form-control" type="text" name="nome" placeholder="Nome" value="<?php echo (!empty($user['nome']) ? $user['nome'] : '') ?>" required>

        </div>


        <div class="col-xs-4">

          <label for="cognome">Cognome:</label>
          <input class="form-control" type="text" name="cognome" placeholder="Cognome" value="<?php echo (!empty($user['cognome']) ? $user['cognome'] : '') ?>" required>

        </div>

        <div class="col-xs-4">

          <label for="nascita">Data di Nascita::</label>
          <input class="form-control" type="date" name="nascita" placeholder="Data di Nascita" value="<?php echo (!empty($user['nascita']) ? $user['nascita'] : '') ?>">

        </div>

        </div>

        <div class="row">

        <div class="col-xs-4">

          <label for="sesso">Sesso:</label>
          <input class="form-control" type="text" name="sesso" placeholder="Sesso" value="<?php echo (!empty($user['sesso']) ? $user['sesso'] : '') ?>" maxlength="1">

        </div>

        <div class="col-xs-4">

          <label for="indirizzo">Indirizzo:</label>
          <input class="form-control" type="text" name="indirizzo" placeholder="Indirizzo" value="<?php echo (!empty($user['indirizzo']) ? $user['indirizzo'] : '') ?>">

        </div>

        <div class="col-xs-4">


          <label for="citta">Citta`:</label>
          <input class="form-control" type="text" name="citta" placeholder="Citta`" value="<?php echo (!empty($user['citta']) ? $user['citta'] : '') ?>">

        </div>

        </div>

        <div class="row">

        <div class="col-xs-4">

          <label for="email">E-Mail:</label>
          <input class="form-control" type="email" name="email" placeholder="E-Mail" value="<?php echo (!empty($user['email']) ? $user['email'] : '') ?>" required>

        </div>

        <div class="col-xs-4">

          <label for="cellulare">Cellulare:</label>
          <input class="form-control" type="text" name="cellulare" placeholder="Cellulare" value="<?php echo (!empty($user['cellulare']) ? $user['cellulare'] : '') ?>">

        </div>

        <div class="col-xs-4">

          <label for="telefono">Telefono:</label>
          <input class="form-control" type="text" name="telefono" placeholder="Telefono" value="<?php echo (!empty($user['telefono']) ? $user['telefono'] : '') ?>">

        </div>

        </div>



      </div>

    <div class="row" style="display: flex">

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-primary" type="submit" name="submit" value="Modifica Iscritto">

    </div>

    <div class="col-xs-3">

      <input class="btn btn-block btn-lg btn-warning" on-click="document.getElementById('form').reset()" type="reset" name="" value="Svuota Modulo">

    </div>

    <div class="col-xs-3">

      <a href="listIscritti.php">Annulla</a>

    </div>
  </div>

    </form>

    </div>

    <script src="assets/jquery/jquery.min.js" charset="utf-8"></script>
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js" charset="utf-8"></script> -->
    <script src="assets/flatui/js/flat-ui.min.js" charset="utf-8"></script>
  </body>
</html>
