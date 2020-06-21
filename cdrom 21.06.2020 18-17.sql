-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2020 at 11:17 AM
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
  `patronymic` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_klient` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`family`, `name`, `patronymic`, `phone`, `birth_date`, `id_klient`) VALUES
('Flashkin', 'Gleb', 'Aleksandrovith', '444003333', '10.10.2000', 1),
('Borzova', 'Elena', 'Sergeevna', '10431777', '07.03.1900', 4),
('qwerty', 'qaz', 'wsx', '872384723847', '10.09.1809', 6),
('Бугундяев', 'Лашман', 'Ярбекович', '31293791222', '10101928', 9),
('Клентов', 'Иван', 'Алексеевич', '+79589657899', '10.10.2010', 85);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `login` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `log` varchar(255) DEFAULT NULL,
  `role` varchar(15) NOT NULL,
  `ban` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`login`, `password`, `user_id`, `log`, `role`, `ban`) VALUES
('administrator', '$2y$10$pB1QNtDdaigbDuaQfkQu4OZvcmsfvKKLtmYdJ1vwljLU18yi/ejve', 49, 'IP: 127.0.0.1, Дата: Fri Jun 19 11:43:35 UTC 2020', 'admin', ''),
('newadmin', '$2y$10$BVKOyOYch2WeI3/c.t09hOyPeB/Dc4WFBnOsp1ZaUYvrteSYBIVOG', 51, 'IP: 127.0.0.1, Дата: Wed Jun 17 06:27:06 UTC 2020', 'user', NULL),
('wewewe', '$2y$10$mTxg1hqFxyy7BbQyRF.LR.QPx21av1/4AwiW61X/RUdJGxLeOp5/m', 55, 'IP: 127.0.0.1, Дата: Thu Jun 18 10:49:59 UTC 2020', 'admin', ''),
('user1', '$2y$10$EHDH7hY100XjdRPfgNCzpuOAeUy4glenimQ2Jz5xfQcuWv5MkQlQq', 56, 'IP: 127.0.0.1, Дата: Sat Jun 20 08:58:59 UTC 2020', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id_klient`);

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
  MODIFY `id_klient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
