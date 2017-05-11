-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mag 11, 2017 alle 19:01
-- Versione del server: 5.7.18-0ubuntu0.17.04.1
-- Versione PHP: 7.0.18-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni3`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `idCorso` int(11) NOT NULL,
  `Titolo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `corsi`
--

CREATE TABLE `corsi` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `sottocategoria` int(11) NOT NULL,
  `dataInizio` date NOT NULL,
  `dataFine` date NOT NULL,
  `docente` varchar(255) DEFAULT NULL,
  `descrizione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `corsi`
--

INSERT INTO `corsi` (`id`, `titolo`, `categoria`, `sottocategoria`, `dataInizio`, `dataFine`, `docente`, `descrizione`) VALUES
(2, 'Corsa contro la Bora', 0, 0, '2017-09-11', '2018-04-12', 'Marko Pizda', 'Je korsa contro di bora, su molo Audace! Ma je solo per zente sai audace!');

-- --------------------------------------------------------

--
-- Struttura della tabella `iscritti`
--

CREATE TABLE `iscritti` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `nascita` date DEFAULT NULL,
  `indirizzo` varchar(255) DEFAULT NULL,
  `citta` varchar(255) DEFAULT NULL,
  `codfiscale` varchar(255) DEFAULT NULL,
  `tipodocidentita` varchar(255) DEFAULT NULL,
  `numdocidentita` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cellulare` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `annosociale` int(4) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `iscritti`
--

INSERT INTO `iscritti` (`id`, `nome`, `cognome`, `nascita`, `indirizzo`, `citta`, `codfiscale`, `tipodocidentita`, `numdocidentita`, `email`, `cellulare`, `telefono`, `annosociale`, `newsletter`) VALUES
(1, 'Maurizio', 'Zeleznik', '1991-02-12', 'Via Gaspare Tonello, 18', 'Trieste', 'ZLZMRZ91B12E098H', 'Carta d\'Identita`', 'AG123456GA', 'mauriziozeleznik@gmail.com', '3204222122', '040309994', NULL, 1),
(2, 'Giovanni', 'Cogno', '1989-03-08', 'Via della Ginnastica', 'Trieste', 'ZLZMRZ91B12E098H', 'Carta d\'IdentitÃ ', 'AB12345CD', 'mauriziozeleznik@gmail.com', '3204222122', '040309994', NULL, 1),
(5, 'Gigio', 'Pignatigolo', '1991-02-12', 'Via Gaspare Tonello 18', 'Trieste', 'ABCDEFGHIJKLMNOPQ', 'Carta d\'IdentitÃ ', 'AB12345CD', 'zeleznikmaurizio@yahoo.it', '3204222122', '040309994', NULL, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `iscritticorsi`
--

CREATE TABLE `iscritticorsi` (
  `id` int(11) NOT NULL,
  `idCorso` int(11) NOT NULL,
  `idUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `iscritticorsi`
--

INSERT INTO `iscritticorsi` (`id`, `idCorso`, `idUtente`) VALUES
(3, 2, 1),
(5, 2, 5);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `corsi`
--
ALTER TABLE `corsi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `iscritti`
--
ALTER TABLE `iscritti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `iscritticorsi`
--
ALTER TABLE `iscritticorsi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `corsi`
--
ALTER TABLE `corsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `iscritti`
--
ALTER TABLE `iscritti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT per la tabella `iscritticorsi`
--
ALTER TABLE `iscritticorsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
