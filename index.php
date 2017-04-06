<?php

use db\Connect as db;

ob_start();
session_start();

include 'autoload.php';
include 'config.php';

if(!isset($_SESSION['user'])) {
  http_response_code(403);
  exit;
}

$stmt = db::Connected()->prepare('SELECT * FROM names WHERE nome = :nome');

$stmt->bindParam(':nome', $nome);

$nome = "Marko";

$stmt->execute();

echo '<table>';

while($row = $stmt->fetch()) {
  echo '<tr>';
  echo '<td>';
  echo $row['nome'];
  echo '</td>';
  echo '<td>';
  echo $row['cognome'];
  echo '</td>';
  echo '<td>';
  echo $row['eta'];
  echo '</td>';
  echo '<td>';
  echo $row['genere'];
  echo '</td>';
  echo '<td>';
  echo '<a href="vwuser.php?id=' . $row['id'] . '" target="_blank">View User</a>';
  echo '</tr>';
}
echo '</table>';
