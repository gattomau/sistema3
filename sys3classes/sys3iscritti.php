<?php

namespace sys3classes;

use \PDO;

class sys3iscritti
{

  public function init() {
      $sql = sys3db::db()->prepare('CREATE TABLE IF NOT EXISTS `iscritti` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `cognome` VARCHAR(255) NOT NULL , `nascita` DATE NOT NULL , `indirizzo` VARCHAR(255) NOT NULL , `citta` VARCHAR(255) NOT NULL , `codfiscale` VARCHAR(255) NOT NULL , `tipodocidentita` VARCHAR(255) NOT NULL , `numdocidentita` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `cellulare` VARCHAR(255) NOT NULL , `telefono` VARCHAR(255) NOT NULL , `annosociale` INT(4) NOT NULL , `newsletter` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

      if($sql->execute()) {
        return 0;
      }
  }

  public function recupera() {

    $sql = 'SELECT id, nome, cognome, nascita, indirizzo, citta, codfiscale, tipodocidentita, numdocidentita, email, cellulare, telefono, annosociale, newsletter FROM iscritti';

    $esegui = sys3db::db()->query($sql);

    return $esegui;

  }

  public function recuperauno($id) {

    $sql = "SELECT id, nome, cognome, nascita, indirizzo, citta, codfiscale, tipodocidentita, numdocidentita, email, cellulare, telefono, annosociale, newsletter FROM iscritti WHERE id='$id'";

    $esegui = sys3db::db()->query($sql);

    return $esegui;
  }

  public function recuperanews() {

    $sql = 'SELECT id, nome, cognome, nascita, indirizzo, citta, codfiscale, tipodocidentita, numdocidentita, email, cellulare, telefono, annosociale, newsletter FROM iscritti WHERE newsletter=1';

    $esegui = sys3db::db()->query($sql);

    return $esegui;

  }

  public function cancella($id) {
    $sql = sys3db::db()->prepare("DELETE FROM `iscritti` WHERE id = '$id'");

    if($sql->execute()) {
      return 0;
    }
  }

  public function cancellanews($id) {
    $sql = sys3db::db()->prepare("UPDATE `iscritti` SET newsletter=0 WHERE id = '$id'");

    if($sql->execute()) {
      return 0;
    }
  }

}
