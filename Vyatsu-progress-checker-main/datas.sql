-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 04 2024 г., 01:57
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
  `totalLabs` int DEFAULT NULL,
  `lastUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `labsProg` int DEFAULT NULL,
  `labsInf` int DEFAULT NULL,
  `labsPhys` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `datas`
--

INSERT INTO `datas` (`id`, `name`, `lastName`, `totalExams`, `attendedExams`, `pointsProg`, `totalProg`, `pointsMath`, `totalMath`, `pointsInfo`, `totalInfo`, `pointsEng`, `totalEng`, `pointsPhys`, `totalPhys`, `pointsLabs`, `totalLabs`, `lastUpdated`, `labsProg`, `labsInf`, `labsPhys`) VALUES
('user1', 'Иван', 'Иванов', 4, 1, 54, 60, 14, 25, 2, 60, 62, 60, 30, 30, 12, 14, '2024-05-04 00:24:36', 3, 4, 5),
('user2', 'Петр', 'Петров', 4, 2, 43, 60, 20, 25, 43, 60, 32, 60, 12, 30, 14, 14, '2024-05-04 00:29:57', 3, 6, 5),
('user3', 'Анна', 'Сидорова', 4, 4, 54, 60, 14, 25, 2, 60, 62, 60, 30, 30, 6, 14, '2024-05-04 00:29:57', 1, 2, 3),
('user4', 'Елена', 'Павлова', 4, 1, 54, 60, 14, 25, 2, 60, 62, 60, 30, 30, 6, 14, '2024-05-04 00:29:57', 0, 4, 2),
('user5', 'Антон', 'Петров', 4, 4, 21, 24, 11, 16, 19, 25, 11, 16, 0, 0, 14, 16, '2024-05-04 00:29:57', 4, 6, 4);

--
-- Триггеры `datas`
--
DELIMITER $$
CREATE TRIGGER `update_pointsLabs` BEFORE UPDATE ON `datas` FOR EACH ROW BEGIN
    SET NEW.pointsLabs = NEW.labsProg + NEW.labsInf + NEW.labsPhys;
END
$$
DELIMITER ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
