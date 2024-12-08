-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 25 2021 г., 15:37
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `polyclinic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bron`
--

CREATE TABLE IF NOT EXISTS `bron` (
  `ID врача` int(11) NOT NULL,
  `Дата` date NOT NULL,
  `8:00 - 8:20` varchar(255) DEFAULT NULL,
  `8:20 - 8:40` varchar(255) DEFAULT NULL,
  `8:40 - 9:00` varchar(255) DEFAULT NULL,
  `9:00 - 9:20` varchar(255) DEFAULT NULL,
  `9:20 - 9:40` varchar(255) DEFAULT NULL,
  `9:40 - 10:00` varchar(255) DEFAULT NULL,
  `10:00 - 10:20` varchar(255) DEFAULT NULL,
  `10:20 - 10:40` varchar(255) DEFAULT NULL,
  `10:40 - 11:00` varchar(255) DEFAULT NULL,
  `11:00 - 11:20` varchar(255) DEFAULT NULL,
  `11:20 - 11:40` varchar(255) DEFAULT NULL,
  `11:40 - 12:00` varchar(255) DEFAULT NULL,
  `13:00 - 13:20` varchar(255) DEFAULT NULL,
  `13:20 - 13:40` varchar(255) DEFAULT NULL,
  `13:40 - 14:00` varchar(255) DEFAULT NULL,
  `14:00 - 14:20` varchar(255) DEFAULT NULL,
  `14:20 - 14:40` varchar(255) DEFAULT NULL,
  `14:40 - 15:00` varchar(255) DEFAULT NULL,
  `15:00 - 15:20` varchar(255) DEFAULT NULL,
  `15:20 - 15:40` varchar(255) DEFAULT NULL,
  `15:40 - 16:00` varchar(255) DEFAULT NULL,
  `16:00 - 16:20` varchar(255) DEFAULT NULL,
  `16:20 - 16:40` varchar(255) DEFAULT NULL,
  `16:40 - 17:00` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bron`
--

INSERT INTO `bron` (`ID врача`, `Дата`, `8:00 - 8:20`, `8:20 - 8:40`, `8:40 - 9:00`, `9:00 - 9:20`, `9:20 - 9:40`, `9:40 - 10:00`, `10:00 - 10:20`, `10:20 - 10:40`, `10:40 - 11:00`, `11:00 - 11:20`, `11:20 - 11:40`, `11:40 - 12:00`, `13:00 - 13:20`, `13:20 - 13:40`, `13:40 - 14:00`, `14:00 - 14:20`, `14:20 - 14:40`, `14:40 - 15:00`, `15:00 - 15:20`, `15:20 - 15:40`, `15:40 - 16:00`, `16:00 - 16:20`, `16:20 - 16:40`, `16:40 - 17:00`) VALUES
(1, '2021-01-31', 'Иван Иван Иванович', 'Пупкин Григорий Иванович', NULL, 'Пупкин Григорий Иванович', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, '2021-01-30', 'Михайлов Виталий Васильевич', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `ID врача` int(11) NOT NULL AUTO_INCREMENT,
  `ФИО врача` varchar(255) NOT NULL,
  `Кабинет` int(11) NOT NULL,
  `Специализация` varchar(255) NOT NULL,
  PRIMARY KEY (`ID врача`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `doctor`
--

INSERT INTO `doctor` (`ID врача`, `ФИО врача`, `Кабинет`, `Специализация`) VALUES
(1, 'Иванова Мария Васильевна', 1, 'Уролог'),
(2, 'Ситников Валентин Григорьевич', 2, 'Хирург'),
(3, 'Петрова Надежда Сергеевна', 3, 'Окулист'),
(4, 'Сидоров Владимир Степанович', 4, 'Терапевт');

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_password`
--

CREATE TABLE IF NOT EXISTS `doctor_password` (
  `ID врача` int(11) NOT NULL,
  `Пароль` varchar(255) NOT NULL,
  PRIMARY KEY (`ID врача`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `doctor_password`
--

INSERT INTO `doctor_password` (`ID врача`, `Пароль`) VALUES
(1, '123'),
(2, '123'),
(3, '123'),
(4, '123');

-- --------------------------------------------------------

--
-- Структура таблицы `pacient`
--

CREATE TABLE IF NOT EXISTS `pacient` (
  `ФИО пациента` varchar(255) NOT NULL,
  `Дата рождения` date NOT NULL,
  `Телефон` varchar(12) NOT NULL,
  `Полис` varchar(20) NOT NULL,
  `Место жительства` varchar(255) NOT NULL,
  UNIQUE KEY `Полис` (`Полис`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pacient`
--

INSERT INTO `pacient` (`ФИО пациента`, `Дата рождения`, `Телефон`, `Полис`, `Место жительства`) VALUES
('Михайлов Виталий Васильевич', '2000-12-26', '89275221223', '1111333322221111', 'г. Волгоград ул. Танкистов 11'),
('Иван Иван Иванович', '2089-01-01', '89990824343', '1212121212121212', 'г. Волгоград Ул. Танкистов 15'),
('Пупкин Григорий Иванович', '2001-01-26', '89097775252', '2222333344445555', 'г. Волгоград ул. Космонавтов д.200 кв. 40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
