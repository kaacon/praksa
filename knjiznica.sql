-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 21. apr 2023 ob 08.45
-- Različica strežnika: 10.4.28-MariaDB
-- Različica PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `knjiznica`
--

-- --------------------------------------------------------

--
-- Struktura tabele `knjiga`
--

CREATE TABLE `knjiga` (
  `id_knjiga` int(45) NOT NULL,
  `naslov` varchar(45) DEFAULT NULL,
  `avtor` varchar(45) DEFAULT NULL,
  `leto_izdaje` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `knjiga`
--

INSERT INTO `knjiga` (`id_knjiga`, `naslov`, `avtor`, `leto_izdaje`) VALUES
(1, 'Dober voznik bom', 'Borut Boc', '2009'),
(2, 'Rdeča črta čez ograde', 'Ivan Artač', '1967'),
(3, 'Marjetica', 'Anton Koder', '1877'),
(4, 'Amerikanci', 'Zofka Kveder', '1908'),
(5, 'Samotna hiša', 'Bogdan Novak', '2003'),
(6, 'Zguba', 'Lenart Zajc', '2001');

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id` int(10) NOT NULL,
  `uporabnisko_ime` varchar(45) DEFAULT NULL,
  `geslo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `uporabnisko_ime`, `geslo`) VALUES
(1, 'neja', 'neja1'),
(2, 'admin', 'admin');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `knjiga`
--
ALTER TABLE `knjiga`
  ADD PRIMARY KEY (`id_knjiga`);

--
-- Indeksi tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
