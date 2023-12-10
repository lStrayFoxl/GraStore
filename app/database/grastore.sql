-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2023 г., 17:09
-- Версия сервера: 5.6.51
-- Версия PHP: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grastore`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(12) NOT NULL,
  `id_user` int(12) DEFAULT NULL,
  `id_store` int(12) DEFAULT NULL,
  `comment` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_store`, `comment`, `created_date`) VALUES
(3, 2, NULL, 'test_post', '2023-10-09 13:16:15'),
(4, 2, 3, 'test_post 2', '2023-10-09 13:17:02'),
(5, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse felis ligula, facilisis vitae enim quis, convallis dictum lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse dignissim imperdiet pellentesque. Vestibulum vitae leo dapibus, faucibus nisi vel, maximus arcu. Suspendisse potenti. Quisque dignissim dui vitae risus dapibus, et tempus ipsum commodo. Duis euismod iaculis dolor, non volutpat quam maximus eget. Quisque venenatis maximus mag', '2023-10-10 17:53:58'),
(10, 2, 4, 'test_game', '2023-10-10 17:59:16'),
(11, 2, 1, 'test_mag', '2023-10-10 18:01:05'),
(14, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nulla.', '2023-10-10 18:03:08'),
(17, 2, 1, 'good img', '2023-10-19 17:03:38');

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(12) NOT NULL,
  `userid` int(12) DEFAULT NULL,
  `comment` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `review`
--

INSERT INTO `review` (`id`, `userid`, `comment`, `created_date`) VALUES
(1, NULL, 'Test review', '2023-07-28 16:34:39'),
(3, NULL, 'Test review on contact page', '2023-07-28 16:36:22'),
(4, NULL, 'Last Test Change', '2023-07-28 18:54:47'),
(5, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere ante ac lobortis semper. Nunc facilisis elementum maximus. Duis eu gravida ipsum. Curabitur quis vehicula massa. Fusce eu commodo velit. Duis ipsum turpis, mattis quis accumsan nec, ele', '2023-10-13 16:46:56'),
(7, 0, 'Test review for id', '2023-10-20 18:31:16'),
(8, 2, 'Test review for id 3', '2023-10-20 18:34:08');

-- --------------------------------------------------------

--
-- Структура таблицы `store`
--

CREATE TABLE `store` (
  `id` int(12) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `store`
--

INSERT INTO `store` (`id`, `name`, `description`, `photo`) VALUES
(1, 'Магнит', 'Пока простое описание', '1697724180_Magnit_icon.png'),
(3, 'DNS', 'Интернет-магазин техники', 'Тут типо путь'),
(4, 'GameStop', 'Store for game', 'тут тип путь'),
(6, 'TestStore3', 'Test Store 3 for valid img', '1697478373_Magnit_icon.png'),
(7, 'TestStore 4', 'TestStore4 for new valid', '1697632756_Magnit_icon.png'),
(8, 'TestStore 44', 'TestStore4 for new valid', '1698939338_Magnit_icon.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `login` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `admin`, `photo`) VALUES
(1, 'Test1', '1', 0, NULL),
(2, 'testHash', '$2y$10$cZxyml7x.nnpv6lZvJB6ROaOUJyu6gdCDwZovwaGIkkROEI14wUGu', 1, '1699618917_Magnit_icon.png'),
(3, 'LastTest3', '$2y$10$/WwoXTWe0zkSNcKTj6uK4.WjLNKq000.JZg9gEVeicugVgKyU6vdu', 1, '1698167950_Magnit_icon.png'),
(4, 'TestAdd', '$2y$10$Bvlhawrgm2e1CUF/BVK8X.B5BWXr7IdELNBPzfpVpAB3YqAJAyZF.', 0, 'тут тип путь'),
(5, 'TestImg7', '$2y$10$h9ArpD697hvQPqDsJjALXOaZTfeCdF8ZKlccIntVqk4L9NaF7Usty', 1, '1698070801_Magnit_icon.png'),
(6, 'testOppUser', '$2y$10$CD7u/H9ObmHo8YvH0UDH8uglQwF/FkRP.w4zmA/vlwVPmjXKnfnmC', 0, NULL),
(7, 'TestNew7', '$2y$10$kA.VlEDekCZ7YKVXoawgzut0AVuz1ZcCNpMJ.bQT.xH7jOMfgCAhm', 1, '1702132744_Magnit_icon.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `store`
--
ALTER TABLE `store`
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
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `store`
--
ALTER TABLE `store`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
