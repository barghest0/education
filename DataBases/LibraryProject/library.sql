-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 12 2021 г., 15:49
-- Версия сервера: 10.6.4-MariaDB
-- Версия PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lib_books`
--

CREATE TABLE `lib_books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_publisher` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `lib_books`
--

INSERT INTO `lib_books` (`id`, `name`, `id_publisher`, `id_genre`) VALUES
(1, 'Фантастический мир', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lib_genres`
--

CREATE TABLE `lib_genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `lib_genres`
--

INSERT INTO `lib_genres` (`id`, `name`) VALUES
(1, 'Фантастика');

-- --------------------------------------------------------

--
-- Структура таблицы `lib_lending`
--

CREATE TABLE `lib_lending` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `id_book` int(11) NOT NULL,
  `is_overdue` set('Просрочено','Не просрочено') NOT NULL DEFAULT 'Не просрочено'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `lib_lending`
--

INSERT INTO `lib_lending` (`id`, `id_user`, `date_from`, `date_to`, `id_book`, `is_overdue`) VALUES
(2, 1, '2021-11-02', '2021-11-17', 1, 'Не просрочено');

-- --------------------------------------------------------

--
-- Структура таблицы `lib_publishers`
--

CREATE TABLE `lib_publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `lib_publishers`
--

INSERT INTO `lib_publishers` (`id`, `name`) VALUES
(1, 'Фантастический издатель');

-- --------------------------------------------------------

--
-- Структура таблицы `lib_users`
--

CREATE TABLE `lib_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `lib_users`
--

INSERT INTO `lib_users` (`id`, `name`, `age`) VALUES
(1, 'Дима', 18);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lib_books`
--
ALTER TABLE `lib_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_publisher` (`id_publisher`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Индексы таблицы `lib_genres`
--
ALTER TABLE `lib_genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lib_lending`
--
ALTER TABLE `lib_lending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_book` (`id_book`);

--
-- Индексы таблицы `lib_publishers`
--
ALTER TABLE `lib_publishers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lib_users`
--
ALTER TABLE `lib_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lib_books`
--
ALTER TABLE `lib_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `lib_genres`
--
ALTER TABLE `lib_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `lib_lending`
--
ALTER TABLE `lib_lending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `lib_publishers`
--
ALTER TABLE `lib_publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `lib_users`
--
ALTER TABLE `lib_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lib_books`
--
ALTER TABLE `lib_books`
  ADD CONSTRAINT `lib_books_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `lib_genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lib_books_ibfk_2` FOREIGN KEY (`id_publisher`) REFERENCES `lib_publishers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lib_lending`
--
ALTER TABLE `lib_lending`
  ADD CONSTRAINT `lib_lending_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `lib_books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lib_lending_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `lib_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
