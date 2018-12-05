-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 07 2018 г., 06:31
-- Версия сервера: 5.7.22
-- Версия PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cdrom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `klient`
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
-- Дамп данных таблицы `klient`
--

INSERT INTO `klient` (`family`, `name`, `ot4estvo`, `telefon`, `birthdate`, `ID_klient`) VALUES
('Flashkin', 'Gleb', 'Aleksandrovith', '18329382', '10.10.2000', 1),
('Petrov', 'Vasya', 'Vladimirovith', '123024', '08.10.1966', 2),
('Kostilev', 'Artems', 'Olegovith', '4723843', '04.11.19332', 3),
('Borzova', 'Elena', 'Sergeevna', '10431294', '07.03.1900', 4),
('Geforce', 'Cuda', 'Random', '1234567890', '10.10.2010', 5),
('qwerty', 'qaz', 'wsx', '872384723847', '10.09.1809', 6),
('Забарыжный', 'Провайдер', 'Мегабитов', '777', '10.10.2010', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`login`, `password`, `user_id`) VALUES
('admin', 'admin', 1),
('admins', 'admins', 2),
('simpleuser', 'simpleuser', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`ID_klient`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `klient`
--
ALTER TABLE `klient`
  MODIFY `ID_klient` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
