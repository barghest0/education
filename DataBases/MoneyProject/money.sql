-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2021 г., 23:22
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bolshov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `money_account`
--

CREATE TABLE `money_account` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `main` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `money_account`
--

INSERT INTO `money_account` (`id`, `name`, `balance`, `main`, `active`) VALUES
(1, 'Наличные', '1100.00', 1, 1),
(2, 'Карта', '900.00', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `money_category`
--

CREATE TABLE `money_category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` set('Доход','Расход') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `norm` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `money_category`
--

INSERT INTO `money_category` (`id`, `name`, `type`, `norm`) VALUES
(1, 'Подработка', 'Доход', '3000.00'),
(2, 'Покушать', 'Расход', '3000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `money_operation`
--

CREATE TABLE `money_operation` (
  `id` int NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `idCategory` int NOT NULL,
  `idAccount` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `money_transfer`
--

CREATE TABLE `money_transfer` (
  `id` int NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idSrc` int NOT NULL,
  `idDst` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `money_transfer`
--

INSERT INTO `money_transfer` (`id`, `sum`, `date`, `idSrc`, `idDst`) VALUES
(10, '1999.00', '2021-04-29 22:59:34', 2, 1),
(11, '123.00', '2021-04-29 22:59:38', 2, 1),
(12, '123.00', '2021-04-29 23:00:46', 2, 1),
(13, '123.00', '2021-04-29 23:01:22', 2, 1),
(14, '100.00', '2021-04-29 23:09:48', 2, 1),
(15, '100.00', '2021-04-29 23:10:08', 2, 1),
(16, '100.00', '2021-04-29 23:10:20', 2, 1),
(17, '100.00', '2021-04-29 23:12:08', 2, 1),
(18, '-100.00', '2021-04-29 23:12:23', 2, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `money_account`
--
ALTER TABLE `money_account`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `money_category`
--
ALTER TABLE `money_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `money_operation`
--
ALTER TABLE `money_operation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAccount` (`idAccount`),
  ADD KEY `idCategory` (`idCategory`);

--
-- Индексы таблицы `money_transfer`
--
ALTER TABLE `money_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSrc` (`idSrc`),
  ADD KEY `idDst` (`idDst`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `money_account`
--
ALTER TABLE `money_account`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `money_category`
--
ALTER TABLE `money_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `money_operation`
--
ALTER TABLE `money_operation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `money_transfer`
--
ALTER TABLE `money_transfer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `money_operation`
--
ALTER TABLE `money_operation`
  ADD CONSTRAINT `money_operation_ibfk_1` FOREIGN KEY (`idAccount`) REFERENCES `money_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `money_operation_ibfk_2` FOREIGN KEY (`idCategory`) REFERENCES `money_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `money_transfer`
--
ALTER TABLE `money_transfer`
  ADD CONSTRAINT `money_transfer_ibfk_1` FOREIGN KEY (`idSrc`) REFERENCES `money_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `money_transfer_ibfk_2` FOREIGN KEY (`idDst`) REFERENCES `money_account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
