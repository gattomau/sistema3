<?php

use sys3classes\sys3db;
use sys3classes\sys3corsi;

require 'autoload.php';

$id = $_GET['id'];

if(isset($id)) {
  $sql = sys3db::db()->prepare("DELETE FROM sottocategorie WHERE id = '$id'");
  $sql->execute();
}

if($sql->execute()) {
  header('location: listSottocategorie.php');
}
