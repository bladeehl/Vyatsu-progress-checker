-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 20 2024 г., 13:05
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `datas`
--

CREATE TABLE `datas` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `totalExams` int DEFAULT NULL,
  `attendedExams` int DEFAULT NULL,
  `pointsProg` int DEFAULT NULL,
  `totalProg` int DEFAULT NULL,
  `pointsMath` int DEFAULT NULL,
  `totalMath` int DEFAULT NULL,
  `pointsInfo` int DEFAULT NULL,
  `totalInfo` int DEFAULT NULL,
  `pointsEng` int DEFAULT NULL,
  `totalEng` int DEFAULT NULL,
  `pointsPhys` int DEFAULT NULL,
  `totalPhys` int DEFAULT NULL,
  `pointsLabs` int DEFAULT NULL,
  `totalLabs` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `datas`
--

INSERT INTO `datas` (`id`, `name`, `lastName`, `totalExams`, `attendedExams`, `pointsProg`, `totalProg`, `pointsMath`, `totalMath`, `pointsInfo`, `totalInfo`, `pointsEng`, `totalEng`, `pointsPhys`, `totalPhys`, `pointsLabs`, `totalLabs`) VALUES
('user1', 'Иван', 'Иванов', 4, 3, 54, 60, 14, 25, 2, 60, 62, 60, 30, 30, 12, 14),
('user2', 'Петр', 'Петров', 4, 2, 43, 60, 20, 25, 43, 60, 32, 60, 12, 30, 14, 14),
('user3', 'Анна', 'Сидорова', 4, 4, 54, 60, 14, 25, 2, 60, 62, 60, 30, 30, 12, 14),
('user4', 'Елена', 'Павлова', 4, 1, 54, 60, 14, 25, 2, 60, 62, 60, 30, 30, 12, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'user1', 'password1'),
(2, 'user2', 'password2'),
(3, 'user3', 'password3'),
(4, 'user4', 'password4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
