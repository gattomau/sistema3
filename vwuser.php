<?php

use db\Connect as db;

// if root directory is not defined, define it now;

if(!defined('ROOTDIR')) {
  define('ROOTDIR', dirname(__FILE__) . '/');
}

// Including needed files;

include ROOTDIR . 'autoload.php';
include ROOTDIR . 'config.php';

echo trim($_GET['monaqui'], '\/*#@$');

// Instantiating prepared statement;

$vwuser = db::Connected()->prepare("SELECT * FROM names WHERE id = ?");

// Binding values to prepared statement;

$vwuser->bindParam(1, $_GET['id']);

$vwuser->execute();

// while($row = $vwuser->fetch()) {
//   echo $row['nome'];
//   echo $row['cognome'];
//   echo $row['eta'];
//   echo $row['genere'];
// }
?>

<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">

    <title>Sistema3 - Visualizza Utente</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  </head>
  <body>
    <table>
      <tr>
      <?php while($row = $vwuser->fetch()): ?>
        <td><?php echo $row['nome'] ?></td>
        <td><?php echo $row['cognome'] ?></td>
        <td><?php echo $row['eta'] ?></td>
        <td><?php echo $row['genere'] ?></td>
      <?php endwhile ?>
      </tr>
    </table>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
