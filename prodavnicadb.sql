-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 03:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodavnicadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikId` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ulogaId` int(11) NOT NULL,
  `vremeRegistracije` int(50) NOT NULL,
  `aktivacioniKod` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktivan` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikId`, `ime`, `prezime`, `email`, `adresa`, `telefon`, `username`, `password`, `ulogaId`, `vremeRegistracije`, `aktivacioniKod`, `aktivan`) VALUES
(34, 'Stefan', 'Stankovic', 'stefan.stankovic.97.16@ict.edu.rs', 'Kragujevacka 3', '0651236549', 'stele997', '31e610deaeb7b3b437f042de91a5f0a2', 1, 1551727035, '51998d0ca130c730059097f6c5289275', 1);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbina`
--

CREATE TABLE `narudzbina` (
  `narudzbinaId` int(11) NOT NULL,
  `korisnikId` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proizvodId` int(11) NOT NULL,
  `cena` int(32) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `vreme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narudzbina`
--

INSERT INTO `narudzbina` (`narudzbinaId`, `korisnikId`, `ime`, `prezime`, `adresa`, `email`, `telefon`, `proizvodId`, `cena`, `kolicina`, `vreme`) VALUES
(1, 34, 'Stefan', 'Stankovic', 'Kragujevacka 3', 'stefan.stankovic.97.16@ict.edu.rs', '0651236549', 2, 98, 1, 1552043676);

-- --------------------------------------------------------

--
-- Table structure for table `pol`
--

CREATE TABLE `pol` (
  `polId` int(11) NOT NULL,
  `nazivPola` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pol`
--

INSERT INTO `pol` (`polId`, `nazivPola`) VALUES
(1, 'Men'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `proizvodId` int(11) NOT NULL,
  `nazivProizvoda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` int(5) NOT NULL,
  `kolicina` int(5) NOT NULL,
  `polId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`proizvodId`, `nazivProizvoda`, `slika`, `alt`, `cena`, `kolicina`, `polId`) VALUES
(1, 'Big guy T-shirt', 'bigGuy.jpg', 'tshirt', 39, 150, 1),
(2, 'Black T-shirt', 'black.jpg', 'tshirt', 98, 111, 1),
(3, 'Black slim T-Shirt', 'blackSlim.jpg', 'tshirt', 77, 250, 1),
(4, 'Brown slim T-Shirt', 'brown.jpg', 'tshirt', 24, 150, 1),
(5, 'Gray T-Shirt', 'gray.jpg', 'tshirt', 15, 300, 1),
(6, 'Red T-Shirt', 'red.jpg', 'tshirt', 22, 190, 1),
(7, 'Strip T-Shirt', 'stripShirt.jpg', 'tshirt', 50, 160, 1),
(8, 'White T-Shirt', 'white.jpg', 'tshirt', 35, 250, 1),
(9, 'White slim T-Shirt', 'whiteSlim.jpg', 'tshirt', 20, 360, 1),
(10, 'Zombies', 'zombies.jpg', 'tshirt', 50, 150, 1),
(12, 'Cat', 'cat.jpg', 'cat', 32, 342, 2),
(13, 'Christmas tree', 'christmas.jpg', 'christmas', 12, 543, 2),
(14, 'Fila', 'fila.jpg', 'fila', 123, 111, 2),
(15, 'Flowers', 'fowers.jpg', 'flowers', 21, 10, 2),
(16, 'Light blue', 'lightBlue.jpg', 'blue', 12, 435, 2),
(17, 'Long blue', 'longBlue.jpg', 'long', 23, 214, 2),
(18, 'Rose', 'rose.jpg', 'rose', 33, 123, 2),
(19, 'Sunshine', 'sunshine.jpg', 'sunshine', 22, 123, 2);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `ulogaId` int(11) NOT NULL,
  `nazivUloge` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`ulogaId`, `nazivUloge`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikId`),
  ADD KEY `ulogaId` (`ulogaId`);

--
-- Indexes for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD PRIMARY KEY (`narudzbinaId`),
  ADD KEY `korisnikId` (`korisnikId`),
  ADD KEY `proizvodId` (`proizvodId`);

--
-- Indexes for table `pol`
--
ALTER TABLE `pol`
  ADD PRIMARY KEY (`polId`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`proizvodId`),
  ADD KEY `polId` (`polId`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`ulogaId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `narudzbina`
--
ALTER TABLE `narudzbina`
  MODIFY `narudzbinaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pol`
--
ALTER TABLE `pol`
  MODIFY `polId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `proizvodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `ulogaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`ulogaId`) REFERENCES `uloga` (`ulogaId`);

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `proizvod_ibfk_1` FOREIGN KEY (`polId`) REFERENCES `pol` (`polId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
