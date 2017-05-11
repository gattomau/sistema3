<?php

use sys3classes\sys3db;
use sys3classes\sys3corsi;

require 'autoload.php';

$corsi = new sys3corsi;

if(isset($_GET['id'])) {
  $corsi->cancella($_GET['id']);
}

if($corsi->cancella() === 0) {
  header('location: listCorsi.php');
}
