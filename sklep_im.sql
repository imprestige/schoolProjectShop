-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 22 2025 г., 21:12
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sklep_im`
--

-- --------------------------------------------------------

--
-- Структура таблицы `koszyk`
--

CREATE TABLE `koszyk` (
  `id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `koszyk`
--

INSERT INTO `koszyk` (`id`, `produkt_id`, `user_id`) VALUES
(21, 2, 5),
(23, 17, 5),
(29, 1, 6),
(30, 1, 6),
(31, 1, 6),
(32, 1, 6),
(33, 1, 6),
(76, 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `towary`
--

CREATE TABLE `towary` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `nazwa` varchar(255) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `iloscOdwiedzen` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `towary`
--

INSERT INTO `towary` (`id`, `image`, `nazwa`, `cena`, `iloscOdwiedzen`) VALUES
(1, 'images/product1.jpg', 'Kubek ceramiczny', 19.99, 39),
(2, 'images/product2.jpg', 'T-shirt z nadrukiem', 45.50, 35),
(3, 'images/product3.jpg', 'Zestaw długopisów', 12.75, 16),
(4, 'images/product4.jpg', 'Kalendarz 2025', 21.30, 9),
(5, 'images/product5.jpg', 'Podkładka pod mysz', 16.99, 12),
(6, 'images/product6.jpg', 'Butelka termiczna', 34.90, 2),
(7, 'images/product7.jpg', 'Notatnik A5', 14.50, 6),
(8, 'images/product8.jpg', 'Okulary ', 59.99, 10),
(9, 'images/product9.jpg', 'Torba na zakupy', 22.40, 0),
(10, 'images/product10.jpg', 'Powerbank ', 89.90, 1),
(11, 'images/product11.jpg', 'Słuchawki ', 129.00, 45),
(12, 'images/product12.jpg', 'Zegarek sportowy', 199.99, 1),
(13, 'images/product13.jpg', 'Parasol składany', 27.20, 3),
(14, 'images/product14.jpg', 'Mysz bezprzewodowa', 38.45, 10),
(15, 'images/product15.jpg', 'Ładowarka USB-C', 24.60, 4),
(16, 'images/product16.jpg', 'Etui na telefon', 29.90, 4),
(17, 'images/product17.jpg', 'Portfel skórzany', 75.00, 10),
(18, 'images/product18.jpg', 'Zestaw narzędzi mini', 64.80, 3),
(19, 'images/product19.jpg', 'Latarka LED', 33.75, 0),
(20, 'images/product20.jpg', 'Termos stalowy', 49.90, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `password`) VALUES
(1, 'dsa@gmail.com', 'dasdas', 'dasdsa'),
(2, 'dsa@gmail.com', 'Igor', 'qwerty');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produkt_id` (`produkt_id`);

--
-- Индексы таблицы `towary`
--
ALTER TABLE `towary`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT для таблицы `towary`
--
ALTER TABLE `towary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `koszyk_ibfk_1` FOREIGN KEY (`produkt_id`) REFERENCES `towary` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
