-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 03:19 PM
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

--
-- Dumping data for table `artikal`
--

INSERT INTO `artikal` (`artikal_id`, `sifra`, `naziv`, `jedinica_mjere`, `barkod`, `PLU_KOD`) VALUES
(1, '', '', '', '', ''),
(5, '125', 'kaput', 'kom', '1597532684', '4444'),
(6, '234', 'jakna', 'kom', '987456321', '3333');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) DEFAULT NULL,
  `sifra` varbinary(255) DEFAULT NULL,
  `rola_id` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `korisnicko_ime`, `sifra`, `rola_id`) VALUES
(14, 'Maja', 0x243279243130242f7332343372694862527a7a694654393068646d4d2e57486564456c6b76696b4e585077573466735957685578344c4b4e684a7153, 2),
(18, 'admin', 0x2432792431302467767771714a31544836316d484e42304c33676b6e75574652355775454d666854465630644939434d5758395a43544e5248623736, 1);

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

--
-- Dumping data for table `lager`
--

INSERT INTO `lager` (`lager_id`, `artikal_id`, `razpoloziva_kolicina`, `lokacija`) VALUES
(1, 6, '10.00', 'BL'),
(2, 5, '10.00', 'BL');

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
-- Dumping data for table `rola`
--

INSERT INTO `rola` (`rola_id`, `naziv_role`) VALUES
(1, 'admin'),
(2, 'korisnik');

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
  MODIFY `artikal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lager`
--
ALTER TABLE `lager`
  MODIFY `lager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `racun`
--
ALTER TABLE `racun`
  MODIFY `racun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radnik`
--
ALTER TABLE `radnik`
  MODIFY `radnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rola`
--
ALTER TABLE `rola`
  MODIFY `rola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`rola_id`) REFERENCES `rola` (`rola_id`);

--
-- Constraints for table `lager`
--
ALTER TABLE `lager`
  ADD CONSTRAINT `lager_ibfk_1` FOREIGN KEY (`artikal_id`) REFERENCES `artikal` (`artikal_id`);

--
-- Constraints for table `racun`
--
ALTER TABLE `racun`
  ADD CONSTRAINT `racun_ibfk_1` FOREIGN KEY (`racun_id`) REFERENCES `radnik` (`korisnik_id`);

--
-- Constraints for table `racun_stavka`
--
ALTER TABLE `racun_stavka`
  ADD CONSTRAINT `racun_stavka_ibfk_1` FOREIGN KEY (`racun_id`) REFERENCES `racun` (`racun_id`),
  ADD CONSTRAINT `racun_stavka_ibfk_2` FOREIGN KEY (`artikal_id`) REFERENCES `artikal` (`artikal_id`);

--
-- Constraints for table `radnik`
--
ALTER TABLE `radnik`
  ADD CONSTRAINT `radnik_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
