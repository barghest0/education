-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 07 2021 г., 14:35
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
-- База данных: `provider`
--

-- --------------------------------------------------------

--
-- Структура таблицы `provider_rate`
--

CREATE TABLE `provider_rate` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `speed` int NOT NULL,
  `volume_limit` int NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `provider_rate`
--

INSERT INTO `provider_rate` (`id`, `name`, `price`, `speed`, `volume_limit`, `description`) VALUES
(1, '_-ХхХ_Лучший_Интернет_-ХхХ_', 1000, 300, 0, 'Лучший тариф за свои деньги'),
(2, '(_-ХхХ_Самый_Лучший_Интернет_-ХхХ_)', 1200, 400, 123, '(_-ХхХ_Самый_Лучший_Интернет_-ХхХ_)');

-- --------------------------------------------------------

--
-- Структура таблицы `provider_user`
--

CREATE TABLE `provider_user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate_id` int NOT NULL,
  `debpt` decimal(11,2) NOT NULL,
  `usage_time` date NOT NULL,
  `active` set('Активен','Не активен') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `provider_user`
--

INSERT INTO `provider_user` (`id`, `name`, `rate_id`, `debpt`, `usage_time`, `active`) VALUES
(1, 'Дима', 1, '0.00', '2021-09-30', 'Не активен'),
(2, 'Валера', 2, '1000.00', '2021-10-14', 'Не активен');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `provider_rate`
--
ALTER TABLE `provider_rate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `provider_user`
--
ALTER TABLE `provider_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_id` (`rate_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `provider_rate`
--
ALTER TABLE `provider_rate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `provider_user`
--
ALTER TABLE `provider_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `provider_user`
--
ALTER TABLE `provider_user`
  ADD CONSTRAINT `provider_user_ibfk_1` FOREIGN KEY (`rate_id`) REFERENCES `provider_rate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
