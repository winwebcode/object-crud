-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 01 2014 г., 20:35
-- Версия сервера: 5.5.34
-- Версия PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cdrom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `klient`
--

CREATE TABLE IF NOT EXISTS `klient` (
  `family` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ot4estvo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ID_klient` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_klient`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `klient`
--

INSERT INTO `klient` (`family`, `name`, `ot4estvo`, `telefon`, `birthdate`, `ID_klient`) VALUES
('Flashkin', 'Gleb', 'Aleksandrovith', '18329382', '10.10.2000', 1),
('Petrov', 'Vasya', 'Vladimirovith', '123024', '08.10.1966', 2),
('Kostilev', 'Artems', 'Olegovith', '4723843', '04.11.19332', 3),
('Borzova', 'Elena', 'Sergeevna', '10431294', '07.03.1900', 4),
('Geforce', 'Cuda', 'Random', '1234567890', '10.10.2010', 5),
('qwerty', 'qaz', 'wsx', '872384723847', '10.09.1809', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
