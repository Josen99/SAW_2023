-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 17, 2023 alle 23:24
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s4979416`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `acquisti`
--

CREATE TABLE `acquisti` (
  `UserId` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Recensito` tinyint(1) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `acquisti`
--

INSERT INTO `acquisti` (`UserId`, `UserName`, `ProductId`, `Quantity`, `Recensito`, `Date`) VALUES


-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `descrizione` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `sesso` varchar(10) DEFAULT NULL,
  `tipologia` varchar(30) DEFAULT NULL,
  `prezzo` int(11) DEFAULT NULL,
  `quantità` int(4) DEFAULT NULL,
  `data_modifica` datetime DEFAULT NULL,
  `data_aggiunta` datetime DEFAULT NULL,
  `immagine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `descrizione`, `marca`, `sesso`, `tipologia`, `prezzo`, `quantità`, `data_modifica`, `data_aggiunta`, `immagine`) VALUES
(7,'polo','nordica','uomo','abbigliamento',20,NULL,NULL,NULL),(8,'polo','kalengi','donna','abbigliamento',22,NULL,NULL,NULL),(9,'pantaloni','levis','uomo','abbigliamento',35,NULL,NULL,NULL),(10,'maglietta','rams','uomo','abbigliamento',30,NULL,NULL,NULL),(11,'sci','nordica','donna','attrezzatura',150,NULL,NULL,NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `firstname` char(25) NOT NULL,
  `lastname` char(25) NOT NULL,
  `email` char(40) NOT NULL,
  `pass` char(100) NOT NULL,
  `sesso` varchar(5) DEFAULT NULL,
  `DataDiNascita` date DEFAULT NULL,
  `Telefono` bigint(1) DEFAULT NULL,
  `Stato` varchar(15) DEFAULT NULL,
  `Provincia` varchar(20) DEFAULT NULL,
  `Citta` varchar(20) DEFAULT NULL,
  `Indirizzo` varchar(40) DEFAULT NULL,
  `Cap` int(5) DEFAULT NULL,
  `Newsletter` tinyint(1) DEFAULT NULL,
  `ban` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`iduser`, `firstname`, `lastname`, `email`, `pass`, `sesso`, `DataDiNascita`, `Telefono`, `Stato`, `Provincia`, `Citta`, `Indirizzo`, `Cap`, `Newsletter`, `ban`) VALUES
(2, 'admin', 'admin', 'sportsunlimitedsaw@gmail.com', '$2y$10$BTGNozFTyLPgZpJgpkpL6.M1G0NYcCfuku/xxH0/ixkx7iubLOMtm', 'Altro', '1000-01-01', 1234567890, 'cina', 'cina', 'cina', 'via abcd', 123456, 1, 1),
(30, 'user', 'user', 'CHELLAKKUDAM@HOTMAIL.COM', '$2y$10$U8HlQw2BXgnn/KRhFk3YiuLIFIWSvYoylDI2CiEPCHfswNBq2QM32', 'Altro', '1999-12-03', 3342221435, '', 'genova', '', 'via ayroli', 16143, 1, 1),
(38, 'Zwhioxjrb', 'Khroldkjq', 'srdyz@npuqoxjrbc.ylw', '$2y$10$.YdLWfftK23aJl20.ohMu.r9Bzp8HVs9cKni/5XKq7mWgvLue53nq', '', NULL, 0, '', '', '', '', 0, 0, 1),
(39, 'Oztjnqumx', 'Dxqctkuye', 'byizl@brifdmejzu.tow', '$2y$10$xuDgmu/xEDDSRYDBeIJ4zuLp.2fqBCRHlGmIAeUYqp8qCFGVa5uGu', '', NULL, 0, '', '', '', '', 0, 0, 1),
(40, 'Kkcsnphbz', 'Bcymvaqhi', 'oezax@wcrkyipdvm.ekd', '$2y$10$DVHjuTCMr3T4WT27fqsIR.YGKXmEaKtM7zvlSgh8asvmCF/cDRJyG', '', NULL, 0, '', '', '', '', 0, 0, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
