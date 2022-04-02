-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2022 г., 18:09
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php_1.0_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `login` varchar(60) NOT NULL,
  `price` varchar(255) NOT NULL,
  `uniqId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `session_id`, `login`, `price`, `uniqId`) VALUES
(21, 25, '9ph407e45epm6l6d0sf4cp1ndhtqm68r', 'user', '865.00', '1220568689620cd505a1ffc3.34303500'),
(22, 26, '9ph407e45epm6l6d0sf4cp1ndhtqm68r', 'user', '770.50', '1847182938620cd5077dc1f9.74428203'),
(23, 27, '9ph407e45epm6l6d0sf4cp1ndhtqm68r', 'user', '1,580.70', '1554653542620cd508e156a2.06180338'),
(24, 43, 'eqhkai3g7c3g7rj73sf9iamq5pkf1ujf', 'user', '2,960.95', '1124729474620ce22906b790.56141030'),
(25, 29, '0up22br7d8otj56kcu6dspbnac84ng12', '', '230.50', '1091337000620cf3821cfec0.70894707'),
(26, 30, '0up22br7d8otj56kcu6dspbnac84ng12', '', '1,130.70', '1350224746620cf384d3efc0.05309279'),
(27, 29, '0up22br7d8otj56kcu6dspbnac84ng12', '', '230.50', '684894611620cf386a97b28.18221540'),
(28, 44, 'a753oaqauuesu3jjlcn7hnua7kkuhacc', '', '849.95', '911488496620cf3964d2907.61634612'),
(29, 48, 'a753oaqauuesu3jjlcn7hnua7kkuhacc', '', '240.00', '1699606788620cf399d40e19.26257846'),
(30, 25, '9kik4dn3j98ukk90k18dtm4shuq6gfc8', '', '865.00', '91143405620d134d413b53.77556745'),
(31, 25, '9kik4dn3j98ukk90k18dtm4shuq6gfc8', '', '865.00', '1507874034620d134f47beb1.35541045');

-- --------------------------------------------------------

--
-- Структура таблицы `checkout`
--

CREATE TABLE `checkout` (
  `id` int NOT NULL,
  `login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(20) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `checkout`
--

INSERT INTO `checkout` (`id`, `login`, `phone`, `session_id`, `date`, `status`) VALUES
(4, 'user', '956959695623', '9ph407e45epm6l6d0sf4cp1ndhtqm68r', '2022-02-16 13:42:33', 'delete'),
(5, 'user', '4656546', 'eqhkai3g7c3g7rj73sf9iamq5pkf1ujf', '2022-02-16 14:38:24', 'finish'),
(6, '', '64654665', '0up22br7d8otj56kcu6dspbnac84ng12', '2022-02-16 15:52:31', 'await'),
(7, '', '3252352', 'a753oaqauuesu3jjlcn7hnua7kkuhacc', '2022-02-16 15:52:53', 'process');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `id_product`) VALUES
(5, 'fs', '87696', 25),
(12, 'sfsdf', 'rqerqwe', 26),
(20, '324', 'erwr', 25);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `size` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `likes` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `address`, `size`, `name`, `likes`) VALUES
(50, '/img/gallery/thumbnails/4.jpg', 431761, '4.jpg', 0),
(51, '/img/gallery/thumbnails/5.jpg', 467489, '5.jpg', 1),
(54, '/img/gallery/thumbnails/3d_neon_ball-wide.jpg', 521247, '3d_neon_ball-wide.jpg', 1),
(55, '/img/gallery/thumbnails/3d_papagan.jpg', 933152, '3d_papagan.jpg', 2),
(57, '/img/gallery/thumbnails/21.jpg', 678739, '21.jpg', 1),
(58, '/img/gallery/thumbnails/14.jpg', 476595, '14.jpg', 1),
(60, '/img/gallery/thumbnails/BestHDWallpapersPack978_13.jpg', 464098, 'BestHDWallpapersPack978_13.jpg', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `actualPrice` varchar(255) NOT NULL,
  `oldPrice` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `corner` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `actualPrice`, `oldPrice`, `address`, `description`, `corner`, `category`) VALUES
(25, 'Single Thruster 2014', '865.00', '0', '/img/surfhouse/products/surf1.jpg', 'Single Thruster 2014', 'productUnitNew', 'New products'),
(26, 'Freestyle Wave FSW', '770.50', '1,270.15', '/img/surfhouse/products/surf2.jpg', 'Freestyle Wave FSW', 'productUnitHot', 'New products'),
(27, 'The White Collection\n                SURFBOARD 2014', '1,580.70', '0', '/img/surfhouse/products/surf3.jpg', 'The White Collection\n                SURFBOARD 2014', '', 'New products'),
(28, 'OG SCALLOP SOLID', '765.00', '0', '/img/surfhouse/products/surf4.jpg', 'OG SCALLOP SOLID', '', 'New products'),
(29, 'STRIPE 19 QS', '230.50', '0', '/img/surfhouse/products/surf5.jpg', 'STRIPE 19 QS', '', 'New products'),
(30, 'YOKE 19 QS', '1,130.70', '0', '/img/surfhouse/products/surf6.jpg', 'YOKE 19 QS', '', 'New products'),
(31, 'Ushingham\n                Lightning 2014', '2,960.95', '3,100.15', '/img/surfhouse/products/springsuit1.jpg', 'Ushingham\n                Lightning 2014', '', 'top Products'),
(32, 'CYPHER HEAT VES M', '849.95', '0', '/img/surfhouse/products/springsuit2.jpg', 'CYPHER HEAT VES M', '', 'top Products'),
(33, 'SYNCRO WOMENS\n                QS M', '1,110.99', '0', '/img/surfhouse/products/springsuit3.jpg', 'SYNCRO WOMENS\n                QS M', '', 'top Products'),
(34, 'SYNCRO MENS QS M', '249.95', '450.15', '/img/surfhouse/products/rashguard.jpg', 'SYNCRO MENS QS M', '', 'sale Products'),
(35, 'RAMOS - SHIRT FOR MEN', '459.65', '570.65', '/img/surfhouse/products/springsuit2.jpg', 'RAMOS - SHIRT FOR MEN', '', 'sale Products'),
(36, 'SixSixOne Evo Wired Full Face', '240.00', '370.65', '/img/surfhouse/products/springsuit3.jpg', 'SixSixOne Evo Wired Full Face', '', 'sale Products'),
(37, 'Single Thruster 2014', '865.00', '0', '/img/surfhouse/products/surf1.jpg', 'Single Thruster 2014', 'productUnitNew', 'New products'),
(38, 'Freestyle Wave FSW', '770.50', '1,270.15', '/img/surfhouse/products/surf2.jpg', 'Freestyle Wave FSW', 'productUnitHot', 'New products'),
(39, 'The White Collection\n                SURFBOARD 2014', '1,580.70', '0', '/img/surfhouse/products/surf3.jpg', 'The White Collection\n                SURFBOARD 2014', '', 'New products'),
(40, 'OG SCALLOP SOLID', '765.00', '0', '/img/surfhouse/products/surf4.jpg', 'OG SCALLOP SOLID', '', 'New products'),
(41, 'STRIPE 19 QS', '230.50', '0', '/img/surfhouse/products/surf5.jpg', 'STRIPE 19 QS', '', 'New products'),
(42, 'YOKE 19 QS', '1,130.70', '0', '/img/surfhouse/products/surf6.jpg', 'YOKE 19 QS', '', 'New products'),
(43, 'Ushingham\n                Lightning 2014', '2,960.95', '3,100.15', '/img/surfhouse/products/springsuit1.jpg', 'Ushingham\n                Lightning 2014', '', 'top Products'),
(44, 'CYPHER HEAT VES M', '849.95', '0', '/img/surfhouse/products/springsuit2.jpg', 'CYPHER HEAT VES M', '', 'top Products'),
(45, 'SYNCRO WOMENS\n                QS M', '1,110.99', '0', '/img/surfhouse/products/springsuit3.jpg', 'SYNCRO WOMENS\n                QS M', '', 'top Products'),
(46, 'SYNCRO MENS QS M', '249.95', '450.15', '/img/surfhouse/products/rashguard.jpg', 'SYNCRO MENS QS M', '', 'sale Products'),
(47, 'RAMOS - SHIRT FOR MEN', '459.65', '570.65', '/img/surfhouse/products/springsuit2.jpg', 'RAMOS - SHIRT FOR MEN', '', 'sale Products'),
(48, 'SixSixOne Evo Wired Full Face', '240.00', '370.65', '/img/surfhouse/products/springsuit3.jpg', 'SixSixOne Evo Wired Full Face', '', 'sale Products');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`, `role`) VALUES
(1, 'admin', '$2y$10$4jwiT14LK4enFGWIDaADcO/BGAA2x/X8g7usfIYYA2flzMiG4AOkW', '16226620116208b9a1e88ea1.04535081', 1),
(2, 'user', '$2y$10$oqTxCcd.qLon0DjqWA62JOrT6mjiDaNFO.VDmy1XBxLhgeZ5jZ1G.', '1876434325620cd4fd7cd5a9.50535768', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
