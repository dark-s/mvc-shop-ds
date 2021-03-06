
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 29 2016 г., 21:49
-- Версия сервера: 10.0.20-MariaDB
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u916088242_ds`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Мужская обувь', 1, 1),
(2, 'Женская обувь', 2, 1),
(3, 'Детская обувь', 3, 1),
(4, 'Кроссовки', 4, 1),
(5, 'Кеды', 5, 1),
(6, 'Мокасины', 6, 1),
(7, 'Test', NULL, 1),
(8, 'asd123123', 132, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `prod_name` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `index` int(7) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `user_id`, `phone`, `prod_name`, `country`, `city`, `address`, `index`, `comment`, `date`, `status`) VALUES
(3, 'Владимир', 19, '+380730115333', '{"17":1,"14":2,"7":1,"13":1}', 'Украина', 'Харьков', 'улица Ивана Камышева 28/10', 61038, 'Квартира #5', '2016-08-29 20:57:16', 1),
(4, 'admin', 19, '+380634658857', '{"17":1}', 'Украина', 'Kharkov', 'улица Ивана Камышева 28/10', 61038, 'Квартира #6', '2016-08-29 21:48:29', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `description` text NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `is_new` int(11) DEFAULT NULL,
  `is_recommended` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `price` float DEFAULT NULL,
  `cat_id` int(10) NOT NULL,
  `date_adding` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `code`, `description`, `seo_description`, `availability`, `brand`, `is_new`, `is_recommended`, `image`, `price`, `cat_id`, `date_adding`, `status`) VALUES
(1, 'Кроссовки для тенниса мужские', 'Кроссовки для тенниса мужские', 0, 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание новых предложений. Не следует, однако забывать, что новая модель организационной деятельности позволяет оценить значение модели развития.', 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание но', '1', 'PEAK', 1, 1, '1.jpg', 909, 1, '2016-07-30', 1),
(2, 'Кроссовки мужские', 'Кроссовки мужские', 0, 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание новых предложений. Не следует, однако забывать, что новая модель организационной деятельности позволяет оценить значение модели развития.', 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития.', '<span style="color:red">Нет в наличии</span>', 'PEAK', 0, 1, '2.jpg', 999, 1, '2016-07-30', 1),
(3, 'Кроссовки мужские', 'Кроссовки мужские', 0, '', '', '0', 'PEAK', 1, 1, '3.jpg', 999, 1, '2016-07-30', 1),
(7, 'name', '', 0, 'description', 'seo_description', 'availability', 'brand', 1, 1, '', 123, 1, '0000-00-00', 1),
(8, 'name', '', 0, 'description', 'seo_description', 'availability', 'brand', 1, 1, '', 123, 1, '0000-00-00', 1),
(17, 'ФЫВФЫВФЫВ', 'title', 12, '12312312123123123123123', '12312312123123123123123', '1', '123123', 1, 1, '', 123123, 1, '0000-00-00', 1),
(16, '3123123', '', 0, '', '', '1', '', 0, 0, '', 0, 1, '0000-00-00', 0),
(15, '3123123', '', 0, '', '', '1', '', 0, 0, '', 0, 1, '0000-00-00', 0),
(13, 'Test', '', 123, '123123 123123 1231214 12442 412 4', '123123 124124 123123', '1', 'Adidas', 0, 0, '', 600, 2, '2016-08-29', 1),
(14, 'Test', '', 123, '123123', '1231232', '1', 'Adidas', 0, 0, '', 600, 2, '0000-00-00', 1),
(19, '123', '', 213, '', '', '1', '', 1, 1, '', 123, 2, '0000-00-00', 1),
(4, 'Кроссовки мужские', 'Кроссовки мужские', 0, 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание новых предложений. Не следует, однако забывать, что новая модель организационной деятельности позволяет оценить значение модели развития.', 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития.', '<span style="color:green">В наличии</span>', 'PEAK', 0, 1, '4.jpg', 999, 1, '2016-07-30', 1),
(5, 'Кроссовки мужские', 'Кроссовки мужские', 0, 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание новых предложений. Не следует, однако забывать, что новая модель организационной деятельности позволяет оценить значение модели развития.', 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития.', '<span style="color:green">В наличии</span>', 'PEAK', 0, 1, '5.jpg', 999, 1, '2016-07-30', 1),
(6, 'Кроссовки баскетбольные мужские', 'Кроссовки баскетбольные мужские', 0, 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития. Значимость этих проблем настолько очевидна, что консультация с широким активом в значительной степени обуславливает создание новых предложений. Не следует, однако забывать, что новая модель организационной деятельности позволяет оценить значение модели развития.', 'Идейные соображения высшего порядка, а также сложившаяся структура организации требуют определения и уточнения модели развития.', '<span style="color:red">Нет в наличии</span>', 'PEAK', 1, NULL, '6.jpg', 1399, 1, '2016-07-30', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role`) VALUES
(18, 'Владимир', 'darksmetana92@gmail.com22', '1e3d66bf54b90e820a670f2d92a10729', ''),
(16, 'Vladimir', 'darksmetana92@gmail.com', '96e79218965eb72c92a549dd5a330112', ''),
(17, 'Vladimir', 'darksmetana92@gmail.com2', '96e79218965eb72c92a549dd5a330112', ''),
(19, 'admin', 'stempelv@gmail.com', 'ba0e1873c584c3a8a2c2c75ee78191b6', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
