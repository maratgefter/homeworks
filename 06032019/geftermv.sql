-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 06 2019 г., 23:26
-- Версия сервера: 5.7.23
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geftermv`
--
CREATE DATABASE IF NOT EXISTS `geftermv` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `geftermv`;

-- --------------------------------------------------------

--
-- Структура таблицы `vedomost`
--

CREATE TABLE `vedomost` (
  `id` int(11) NOT NULL,
  `fio` varchar(150) NOT NULL,
  `otdel` varchar(150) NOT NULL,
  `zp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vedomost`
--

INSERT INTO `vedomost` (`id`, `fio`, `otdel`, `zp`) VALUES
(1, 'Иванов Петр Сергеевич', 'Отдел главного энергетика', 250),
(2, 'Сидорова Мария Борисовна', 'Бухгалтерия', 1000),
(3, 'Евстигнеев Евгений Леонидович', 'Центральный склад', 750),
(4, 'Егоров Петр Егорович', 'Отдел главного энергетика', 158.06),
(5, 'Апполонова Евгения Андреевна', 'Бухгалтерия', 1510.25),
(6, 'Чапаев Карен Платонович', 'Центральный склад', 751),
(7, 'Аганезова Клара Викторовна', 'Бухгалтерия', 1236),
(8, 'Всеволодова Мария Павловна', 'Центральный склад', 658.06),
(9, 'Лошков Леонид Валерьевич', 'Отдел главного энергетика', 250.01),
(10, 'Павлова Валентина Никоноровна', 'Отдел главного энергетика', 350.25);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `vedomost`
--
ALTER TABLE `vedomost`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `vedomost`
--
ALTER TABLE `vedomost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
