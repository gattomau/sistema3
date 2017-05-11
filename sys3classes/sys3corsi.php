<?php

namespace sys3classes;

use \PDO;

class sys3corsi
{

  public function init() {
      $sql = sys3db::db()->prepare('CREATE TABLE IF NOT EXISTS `corsi` ( `id` INT NOT NULL AUTO_INCREMENT , `titolo` VARCHAR(255) NULL , `dataInizio` DATE NULL , `dataFine` DATE NULL , `docente` VARCHAR(255) NULL , `descrizione` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

      if($sql->execute()) {
        return 0;
      }
  }

  public function recupera() {

    $sql = 'SELECT id, titolo, dataInizio, dataFine, docente, descrizione FROM corsi';

    $esegui = sys3db::db()->query($sql);

    return $esegui;

  }

  public function recuperauno($id) {

    $sql = "SELECT titolo, dataInizio, dataFine, docente, descrizione FROM corsi WHERE id='$id'";

    $esegui = sys3db::db()->query($sql);

    return $esegui;
  }

  public function cancella($id) {
    $sql = sys3db::db()->prepare("DELETE FROM `corsi` WHERE id = '$id'");

    if($sql->execute()) {
      return 0;
    }
  }

}
