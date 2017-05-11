<?php

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

require 'autoload.php';

$iscritti = new sys3iscritti;

if(isset($_GET['id'])) {
  $iscritti->cancellanews($_GET['id']);
}

if($iscritti->cancellanews() === 0) {
  header('location: listNewsletter.php');
}
