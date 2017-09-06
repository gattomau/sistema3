<?php

require 'vendor/autoload.php';
require 'autoload.php';

use sys3classes\sys3db;
use sys3classes\sys3iscritti;

use Dompdf\Dompdf;

error_reporting(E_ALL);

ini_set('display_errors', 1);

$nome = $_GET['nome'];
$cognome = $_GET['cognome'];

$confirm = sys3db::db()->prepare("UPDATE iscritti2017 SET confirmed = 1 WHERE nome LIKE '%$nome%' AND cognome LIKE '%$cognome%' AND confirmed = 0");

$sql = sys3db::db()->prepare("SELECT nome, cognome, nascita, sesso, indirizzo, citta, email, cellulare, telefono FROM iscritti2017 WHERE nome LIKE '%$nome%' AND cognome LIKE '%$cognome%' ");

$confirm->execute();

$sql->execute();

$user = $sql->fetch(PDO::FETCH_ASSOC);
$name = $user['nome'];
$surname = $user['cognome'];
$nascita = date('d M Y', strtotime($user['nascita']));
$sesso = $user['sesso'];
$citta = $user['citta'];
$indirizzo = $user['indirizzo'];
$email = $user['email'];
$cellulare = $user['cellulare'];
$telefono = $user['telefono'];

$dataDoc = date('d M Y', time());


$dompdf = new Dompdf();

$bang = array('prova1', 'prova2', 'prova3', 'prova4', 'prova5');

$dompdf->loadHtml("

<img src=\"assets/img/sp5.png\" height=\"135\">
<br><br>
<h1>Ricevuta di Iscrizione</h1>
<p>Si riepilogano di seguito i dati di iscrizione dell'utente:</p>
<strong>Nome: </strong> $name <br><br>
<strong>Cognome: </strong> $surname <br><br>
<strong>Data di Nascita: </strong> $nascita <br><br>
<strong>Città: </strong> $citta <br><br>
<strong>Indirizzo: </strong> $indirizzo <br><br>
<strong>E-Mail: </strong> $email <br><br>
<strong>Cellulare: </strong> $cellulare <br><br>
<strong>Telefono: </strong> $telefono <br><br>

<strong>Tipo di Iscrizione: </strong> Iscrizione all'Università della Terza Età per l'a.s. 2017/18<br><br>

<strong>Importo pagato: </strong> € 60.00 <br><br>

<strong>Data emissione documento: </strong> $dataDoc <br><br>
<br><br>
L'Iscritto<br><br>
________________________<br><br>
L'addetto alla Tesoreria<br><br>
________________________

"
);

$dompdf->render();

$dompdf->stream("Skatabang.pdf", array("Attachment" => false));

?>
