-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 06:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthone`
--

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` int(9) NOT NULL,
  `model` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `firm` varchar(255),
  `issue` varchar(255),
  `ticketed` varchar(255) NOT NULL,
  `notes` varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `model`, `sn`, `status`, `firm`, `issue`, `ticketed`, `notes`) VALUES
(1, 'HADES', 'JWE20220420225', 'Defect Retour', 'Test', 'Geen Klanten Scherm', 'Ja', 'Retour gekregen windows crash, kd hergebruikt' );

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `huidigeMed` text NOT NULL,
  `medHis` text NOT NULL,
  `notes` mediumtext NOT NULL,
  `adres` varchar(100) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `zknummer` varchar(12) NOT NULL,
  `geboortedatum` varchar(12) NOT NULL,
  `soortVerzekering` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `naam`, `huidigeMed`, `medHis`, `notes`, `adres`, `woonplaats`, `zknummer`, `geboortedatum`, `soortVerzekering`) VALUES
(25, 'anton hensbergen', '', '', '', 'tinburg 12', 'VOORBURG', 'zk 222', '1-1-1970', 'all in'),
(30, 'Henk de Vries', 'Ritalin', 'Amfexa', 'Meneer de Vries krijgt allergische reacties na het nemen van Amfexa en is hierdoor gestop ', 'Ambachtsweg 25c 2218 BG', 'Den Helder', '87438743', '1955-10-04', 'Basis Exclusief');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pswrd` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pswrd`, `role`) VALUES
(1, 'Admin', '8C6976E5B5410415BDE908BD4DEE15DFB167A9C873FC4BB8A81F6F2AB448A918', 'admin'),
(2, 'User', '907DECFCC13A76FABFE69870E501DFDB560C947509D7376424721716FBF54B30', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `med`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `med`
--
ALTER TABLE `med`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
