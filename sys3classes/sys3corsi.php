<?php

namespace sys3classes;

use \PDO;

class sys3corsi
{

  public function init() {
      $sql = sys3db::db()->prepare('CREATE TABLE IF NOT EXISTS `corsi` ( `id` INT NOT NULL AUTO_INCREMENT , `titolo` VARCHAR(255) NULL, `categoria` INT NOT NULL, `sottocategoria` INT NOT NULL, `dataInizio` DATE NULL , `dataFine` DATE NULL , `docente` VARCHAR(255) NULL , `orarioInizio` TIME NULL, `orarioFine` TIME NULL, `incontri` VARCHAR(255) NULL, `cadenza` VARCHAR(255) NULL, `descrizione` TEXT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;');

      if($sql->execute()) {
        return 0;
      }
  }

  public function recupera() {

    $sql = 'SELECT corsi.id, corsi.titolo, corsi.dataInizio, corsi.dataFine, corsi.docente, corsi.descrizione, categorie.Titolo AS titoloCategoria, sottocategorie.Titolo AS titoloSottocategoria FROM corsi JOIN categorie ON corsi.categoria = categorie.id JOIN sottocategorie ON corsi.sottocategoria = sottocategorie.id';

    $esegui = sys3db::db()->query($sql);

    return $esegui;

  }

  public function recuperauno($id) {

    $sql = "SELECT corsi.titolo, corsi.dataInizio, corsi.dataFine, corsi.docente, corsi.descrizione, categorie.Titolo AS titoloCategoria, sottocategorie.Titolo as titoloSottocategoria FROM corsi JOIN categorie ON corsi.categoria = categorie.id JOIN sottocategorie ON corsi.sottocategoria = sottocategorie.id WHERE corsi.id='$id'";

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
