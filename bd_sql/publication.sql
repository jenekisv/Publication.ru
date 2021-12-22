-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2021 г., 07:18
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `publication`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `intro` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` int UNSIGNED NOT NULL,
  `avtor` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `intro`, `text`, `date`, `avtor`) VALUES
(1, 'Пробная статья.', 'Проверка ввода интро.', 'Это пробная статья для проверки работоспособности сайта.', 1639915738, 'evgeniyisv'),
(2, 'Первая статья от Петра', 'Пробуем, пробуем и еще раз пробуем', 'Организовать публикацию статей на сайте с обязательной регистрацией для их публикации. Необходима авторизация и выход с учетной записи. Добавление статей в базу данных через интерфейс сайта. Вывод всех статей из базы данных. Динамически изменяемые страницы статей. Использовать формы добавления комментариев к статьям. Отправка почты с сайта. \nПрограммный продукт предназначен для публикации статей на сайте авторами.', 1639918249, 'petr'),
(3, 'Проблемка.', 'Как решить данную проблему?', 'То, насколько хорошо вы умеете справляться с проблемами, часто определяет ваш успех и счастье. Если вы не можете понять, как решить проблему, попробуйте ее проанализировать и разбить на несколько мелких частей. Подумайте, следует ли подойти к решению проблемы логически или через ощущения и чувства? Найдите творческий подход к этой ситуации, посоветовавшись с другими людьми и посмотрев на эту проблему с разных точек зрения.', 1639918787, 'petr');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mess` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `article_id` int UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `mess`, `article_id`) VALUES
(4, 'Евгений', '1 Отличная запись!', 3),
(5, 'Евгений', '2 Отличная запись!', 3),
(6, 'Евгений', '3 Отличная запись!', 3),
(8, 'evgeniyisv', 'Важная информация.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `login`, `pass`) VALUES
(6, 'Евгений', 'evgeniyisv@yandex.com', 'evgeniyisv', 'dffe0ac8363304a09f3b2e8a1eb7fbe6'),
(13, 'Степан', 'stepa@googl.com', 'stepa999', 'f81bda139d96de26fdf5e173fcc8eaa5'),
(16, 'Денис', 'den@ya.ru', 'den1', '18e493e740233515c67527f57a543ac8'),
(15, 'Дмитрий', 'dima@rift.com', 'dimonishe', '6b27682cb76d422505bb621f3a9a7d2b'),
(17, 'Petr', 'petr@test.com', 'petr', 'f81bda139d96de26fdf5e173fcc8eaa5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
