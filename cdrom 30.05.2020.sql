-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2020 at 09:23 AM
-- Server version: 5.7.22
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdrom`
--

-- --------------------------------------------------------

--
-- Table structure for table `klient`
--

CREATE TABLE `klient` (
  `family` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ot4estvo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ID_klient` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`family`, `name`, `ot4estvo`, `telefon`, `birthdate`, `ID_klient`) VALUES
('Flashkin', 'Gleb', 'Aleksandrovith', '18329382', '10.10.2000', 1),
('Borzova', 'Elena', 'Sergeevna', '10431777', '07.03.1900', 4),
('qwerty', 'qaz', 'wsx', '872384723847', '10.09.1809', 6),
('Бугундяев', 'Лашман', 'Ярбекович', '312937912', '10101928', 9),
('ара', 'ара', 'ара', '32', '2423', 15),
('324', '324', '4234', '432', '423', 16),
('324', '324', '4234', '432', '423', 17),
('2354', '1234', 'куцык', 'кцу', 'цку', 18),
('2354', '1234', 'куцык', 'кцу', 'цку', 19),
('кцу', 'цеу', 'ецу', 'цец', 'ецу', 20),
('уцфе', 'цецфу', 'ефцуе', 'ецфуе', 'уефцу', 22),
('532', '235', '523', '532', '523', 23),
('532', '235', '523', '532', '523', 24),
('35', '235', '532', '532', '523', 26),
('122', '124', '412', '412', '4124', 27),
('122', '124', '412', '412', '4124', 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `password`, `user_id`) VALUES
('admin', 'admin', 1),
('admins', 'admin', 2),
('blat', 'admin', 3),
('new', 'admin', 4),
('faq', 'admin', 5),
('admin1', 'admin', 6),
('qwe', 'qwe', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`ID_klient`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `ID_klient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
