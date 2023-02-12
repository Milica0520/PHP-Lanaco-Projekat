-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 02:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikal`
--

CREATE TABLE `artikal` (
  `artikal_id` int(11) NOT NULL,
  `sifra` varchar(50) DEFAULT NULL,
  `naziv` varchar(50) DEFAULT NULL,
  `jedinica_mjere` char(3) DEFAULT NULL,
  `barkod` varchar(50) DEFAULT NULL,
  `PLU_KOD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) DEFAULT NULL,
  `sifra` varbinary(255) DEFAULT NULL,
  `rola_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lager`
--

CREATE TABLE `lager` (
  `lager_id` int(11) NOT NULL,
  `artikal_id` int(11) DEFAULT NULL,
  `razpoloziva_kolicina` decimal(18,2) DEFAULT NULL,
  `lokacija` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE `racun` (
  `racun_id` int(11) NOT NULL,
  `radnik_id` int(11) NOT NULL,
  `datum_racuna` datetime NOT NULL,
  `broj_racuna` varchar(30) DEFAULT NULL,
  `ukupni_iznos` decimal(18,2) DEFAULT NULL,
  `iznos_PDV` decimal(18,2) DEFAULT NULL,
  `iznos_bezPDV` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `racun_stavka`
--

CREATE TABLE `racun_stavka` (
  `racun_id` int(11) NOT NULL,
  `stavka_id` int(11) NOT NULL,
  `artikal_id` int(11) DEFAULT NULL,
  `kolicina` decimal(18,2) DEFAULT NULL,
  `cijena` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

CREATE TABLE `radnik` (
  `radnik_id` int(11) NOT NULL,
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL,
  `broj_telefona` varchar(50) DEFAULT NULL,
  `adresa` varchar(100) DEFAULT NULL,
  `grad` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `JMBG` char(13) DEFAULT NULL,
  `korisnik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rola`
--

CREATE TABLE `rola` (
  `rola_id` int(11) NOT NULL,
  `naziv_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikal`
--
ALTER TABLE `artikal`
  ADD PRIMARY KEY (`artikal_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `rola_id` (`rola_id`);

--
-- Indexes for table `lager`
--
ALTER TABLE `lager`
  ADD PRIMARY KEY (`lager_id`),
  ADD KEY `artikal_id` (`artikal_id`);

--
-- Indexes for table `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`racun_id`),
  ADD KEY `radnik_id` (`radnik_id`);

--
-- Indexes for table `racun_stavka`
--
ALTER TABLE `racun_stavka`
  ADD PRIMARY KEY (`racun_id`,`stavka_id`),
  ADD KEY `artikal_id` (`artikal_id`);

--
-- Indexes for table `radnik`
--
ALTER TABLE `radnik`
  ADD PRIMARY KEY (`radnik_id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`rola_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikal`
--
ALTER TABLE `artikal`
  MODIFY `artikal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lager`
--
ALTER TABLE `lager`
  MODIFY `lager_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `racun`
--
ALTER TABLE `racun`
  MODIFY `racun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radnik`
--
ALTER TABLE `radnik`
  MODIFY `radnik_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
  MODIFY `rola_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikal`
--
ALTER TABLE `artikal`
  ADD CONSTRAINT `artikal_ibfk_1` FOREIGN KEY (`artikal_id`) REFERENCES `lager` (`artikal_id`),
  ADD CONSTRAINT `artikal_ibfk_2` FOREIGN KEY (`artikal_id`) REFERENCES `racun_stavka` (`artikal_id`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `radnik` (`korisnik_id`);

--
-- Constraints for table `racun`
--
ALTER TABLE `racun`
  ADD CONSTRAINT `racun_ibfk_1` FOREIGN KEY (`racun_id`) REFERENCES `racun_stavka` (`racun_id`);

--
-- Constraints for table `radnik`
--
ALTER TABLE `radnik`
  ADD CONSTRAINT `radnik_ibfk_1` FOREIGN KEY (`radnik_id`) REFERENCES `racun` (`radnik_id`);

--
-- Constraints for table `rola`
--
ALTER TABLE `rola`
  ADD CONSTRAINT `rola_ibfk_1` FOREIGN KEY (`rola_id`) REFERENCES `korisnik` (`rola_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
