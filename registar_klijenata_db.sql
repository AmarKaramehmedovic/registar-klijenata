-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 04:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registar_klijenata_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kontakti`
--

CREATE TABLE `kontakti` (
  `id` int(11) NOT NULL,
  `nazivSubjekta` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `ime` varchar(16) COLLATE utf8mb4_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_croatian_ci NOT NULL,
  `kontaktBr` varchar(15) COLLATE utf8mb4_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `kontakti`
--

INSERT INTO `kontakti` (`id`, `nazivSubjekta`, `ime`, `prezime`, `email`, `kontaktBr`) VALUES
(1, 'LEDO PLUS d.o.o.', 'Marina', 'Kovačić', 'marinak@ledo.hr', '0981234567'),
(2, 'LEDO PLUS d.o.o.', 'Ivan', 'Horvat', 'ivanh@ledo.hr', '0982345678'),
(3, 'JAMNICA d.d.', 'Ana', 'Vuković', 'anav@jamnica.hr', '0983456789'),
(4, 'JAMNICA d.d.', 'Marko', 'Babić', 'markob@jamnica.hr', '0984567890'),
(5, 'KRAŠ prehrambena industrija d.d.', 'Petra', 'Knežević', 'petrak@kras.hr', '0985678901'),
(6, 'KRAŠ prehrambena industrija d.d.', 'Luka', 'Novak', 'lukan@kras.hr', '0986789012');

-- --------------------------------------------------------

--
-- Table structure for table `subjekti`
--

CREATE TABLE `subjekti` (
  `id` int(11) NOT NULL,
  `nazivSubjekta` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `adresa` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `postBr` int(6) NOT NULL,
  `mjesto` varchar(32) COLLATE utf8mb4_croatian_ci NOT NULL,
  `kontaktBr` varchar(15) COLLATE utf8mb4_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `subjekti`
--

INSERT INTO `subjekti` (`id`, `nazivSubjekta`, `adresa`, `postBr`, `mjesto`, `kontaktBr`) VALUES
(1, 'LEDO PLUS d.o.o.', 'Čavićeva 1a', 10000, 'ZAGREB', '01 2385 555'),
(2, 'JAMNICA d.d.', 'Getaldićeva 3', 10000, 'ZAGREB', '01 2393 111'),
(3, 'KRAŠ prehrambena industrija d.d.', 'Ravnice 48', 10000, 'ZAGREB', '01 2396 111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontakti`
--
ALTER TABLE `kontakti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjekti`
--
ALTER TABLE `subjekti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontakti`
--
ALTER TABLE `kontakti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subjekti`
--
ALTER TABLE `subjekti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
