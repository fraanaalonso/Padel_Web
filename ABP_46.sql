-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2019 a las 14:24:06
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `abp46`
--

-- --------------------------------------------------------



DROP DATABASE IF EXISTS `abp46`;
CREATE DATABASE `abp46` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `abp46`;



--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` tinyint(4) NOT NULL,
  `categoria` enum('Masculino','Femenino','Mixto') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship`
--

CREATE TABLE `championship` (
  `id_campeonato` tinyint(4) NOT NULL,
  `fecha_inicio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_limite` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_normativa` tinyint(4) NOT NULL,
  `precio` varchar(7) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`id_campeonato`, `fecha_inicio`, `fecha_limite`, `id_normativa`, `precio`) VALUES
(1, '2020-01-10', '2020-01-09', 2, '34.99'),
(2, '2020-02-03', '2020-02-02', 3, '34.99'),
(3, '2020-02-04', '2020-02-02', 3, '34.99'),
(4, '2020-03-02', '2020-03-01', 3, '34.99'),
(5, '2020-01-04', '2020-01-02', 3, '34.99'),
(6, '2020-01-16', '2020-01-15', 4, '34.99'),
(7, '2020-01-20', '2020-01-19', 4, '34.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship_categoria`
--

CREATE TABLE `championship_categoria` (
  `id_campeonato` tinyint(4) NOT NULL,
  `id_categoria` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `championship_categoria`
--

INSERT INTO `championship_categoria` (`id_campeonato`, `id_categoria`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(5, 3),
(6, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship_couple`
--

CREATE TABLE `championship_couple` (
  `id_pareja` bigint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `championship_couple`
--

INSERT INTO `championship_couple` (`id_pareja`, `id_campeonato`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(14, 1),
(16, 1),
(18, 1),
(19, 1),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship_nivel`
--

CREATE TABLE `championship_nivel` (
  `id_campeonato` tinyint(4) NOT NULL,
  `id_nivel` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `championship_nivel`
--

INSERT INTO `championship_nivel` (`id_campeonato`, `id_nivel`) VALUES
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 1),
(6, 2),
(6, 3),
(7, 1),
(7, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id_chat` tinyint(4) NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` longtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha_mensaje` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora_mensaje` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id_chat`, `login`, `mensaje`, `fecha_mensaje`, `hora_mensaje`) VALUES
(19, 'admin', 'Buenos días a todo@s! Mañana con toda seguridad habrá sobre 5 pistas libres. ¿Quién se anima a echar un partido?', '03/11/2019', '17:57'),
(20, 'fer_rv', 'Yo no puedo, tengo curro toda la tarde', '03/11/2019', '17:59'),
(21, 'lucia_atm', 'Yo puedo a partir de la 17:00. Salgo de clase a las 16:00. Asique me apunto', '03/11/2019', '17:59'),
(22, 'admin', 'Vale Lucía, te apunto entonces', '03/11/2019', '18:00'),
(23, 'jmartinez', 'Por mi no habría problema tampoco', '03/11/2019', '18:01'),
(24, 'jmartinez', 'Como digáis vosotros', '03/11/2019', '18:01'),
(25, 'admin', 'Graaande!!! El resto ya me váis diciendo', '03/11/2019', '18:02'),
(26, 'jmartinez', 'Como digáis vosotros', '03/11/2019', '18:01'),
(27, 'bros_mario', 'Hola', '16/11/2019', '8:47'),
(28, 'bros_mario', 'Hola', '16/11/2019', '8:47'),
(29, 'bros_mario', 'Hola', '16/11/2019', '8:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clash`
--

CREATE TABLE `clash` (
  `id_enfrentamiento` bigint(7) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL,
  `id_pareja1` bigint(4) NOT NULL,
  `id_pareja2` bigint(4) NOT NULL,
  `resultado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numSetsPareja1` int(1) NOT NULL,
  `numSetsPareja2` int(1) NOT NULL,
  `hora_inicio` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('liga','octavos','cuartos','semifinales','final') COLLATE utf8_spanish_ci NOT NULL,
  `id_grupo` tinyint(4) NOT NULL,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clash`
--

INSERT INTO `clash` (`id_enfrentamiento`, `id_campeonato`, `id_pareja1`, `id_pareja2`, `resultado`, `numSetsPareja1`, `numSetsPareja2`, `hora_inicio`, `fecha`, `tipo`, `id_grupo`, `id_pista`) VALUES
(122, 1, 1, 3, '0', 0, 0, '13:30', '2020-01-11', 'liga', 1, 'P7'),
(123, 1, 1, 4, '0', 0, 0, '18:30', '2020-01-12', 'liga', 1, 'P2'),
(124, 1, 1, 5, '0', 0, 0, '12:00', '2020-01-13', 'liga', 1, 'P7'),
(125, 1, 1, 6, '0', 0, 0, '10:30', '2020-01-14', 'liga', 1, 'P7'),
(126, 1, 1, 7, '0', 0, 0, '10:30', '2020-01-15', 'liga', 1, 'P1'),
(127, 1, 1, 8, '0', 0, 0, '20:00', '2020-01-16', 'liga', 1, 'P8'),
(128, 1, 1, 9, '0', 0, 0, '17:00', '2020-01-17', 'liga', 1, 'P3'),
(129, 1, 1, 10, '0', 0, 0, '20:00', '2020-01-18', 'liga', 1, 'P5'),
(130, 1, 1, 11, '0', 0, 0, '13:30', '2020-01-19', 'liga', 1, 'P2'),
(131, 1, 1, 14, '0', 0, 0, '13:30', '2020-01-20', 'liga', 1, 'P8'),
(132, 1, 1, 16, '0', 0, 0, '21:30', '2020-01-21', 'liga', 1, 'P8'),
(133, 1, 3, 4, '0', 0, 0, '18:30', '2020-01-22', 'liga', 1, 'P0'),
(134, 1, 3, 5, '0', 0, 0, '13:30', '2020-01-23', 'liga', 1, 'P6'),
(135, 1, 3, 6, '0', 0, 0, '12:00', '2020-01-24', 'liga', 1, 'P1'),
(136, 1, 3, 7, '0', 0, 0, '13:30', '2020-01-25', 'liga', 1, 'P2'),
(137, 1, 3, 8, '0', 0, 0, '09:00', '2020-01-26', 'liga', 1, 'P0'),
(138, 1, 3, 9, '0', 0, 0, '10:30', '2020-01-27', 'liga', 1, 'P5'),
(139, 1, 3, 10, '0', 0, 0, '21:30', '2020-01-28', 'liga', 1, 'P3'),
(140, 1, 3, 11, '0', 0, 0, '13:30', '2020-01-29', 'liga', 1, 'P3'),
(141, 1, 3, 14, '0', 0, 0, '10:30', '2020-01-30', 'liga', 1, 'P6'),
(142, 1, 3, 16, '0', 0, 0, '17:00', '2020-01-31', 'liga', 1, 'P1'),
(143, 1, 4, 5, '0', 0, 0, '13:30', '2020-02-01', 'liga', 1, 'P1'),
(144, 1, 4, 6, '0', 0, 0, '09:00', '2020-02-02', 'liga', 1, 'P3'),
(145, 1, 4, 7, '0', 0, 0, '20:00', '2020-02-03', 'liga', 1, 'P6'),
(146, 1, 4, 8, '0', 0, 0, '20:00', '2020-02-04', 'liga', 1, 'P5'),
(147, 1, 4, 9, '0', 0, 0, '09:00', '2020-02-05', 'liga', 1, 'P2'),
(148, 1, 4, 10, '0', 0, 0, '21:30', '2020-02-06', 'liga', 1, 'P3'),
(149, 1, 4, 11, '0', 0, 0, '09:00', '2020-02-07', 'liga', 1, 'P7'),
(150, 1, 4, 14, '0', 0, 0, '17:00', '2020-02-08', 'liga', 1, 'P2'),
(151, 1, 4, 16, '0', 0, 0, '17:00', '2020-02-09', 'liga', 1, 'P4'),
(152, 1, 5, 6, '0', 0, 0, '09:00', '2020-02-10', 'liga', 1, 'P7'),
(153, 1, 5, 7, '0', 0, 0, '20:00', '2020-02-11', 'liga', 1, 'P8'),
(154, 1, 5, 8, '0', 0, 0, '21:30', '2020-02-12', 'liga', 1, 'P8'),
(155, 1, 5, 9, '0', 0, 0, '20:00', '2020-02-13', 'liga', 1, 'P7'),
(156, 1, 5, 10, '0', 0, 0, '17:00', '2020-02-14', 'liga', 1, 'P3'),
(157, 1, 5, 11, '0', 0, 0, '13:30', '2020-02-15', 'liga', 1, 'P4'),
(158, 1, 5, 14, '0', 0, 0, '09:00', '2020-02-16', 'liga', 1, 'P5'),
(159, 1, 5, 16, '0', 0, 0, '09:00', '2020-02-17', 'liga', 1, 'P1'),
(160, 1, 6, 7, '0', 0, 0, '12:00', '2020-02-18', 'liga', 1, 'P4'),
(161, 1, 6, 8, '0', 0, 0, '10:30', '2020-02-19', 'liga', 1, 'P1'),
(162, 1, 6, 9, '0', 0, 0, '09:00', '2020-02-20', 'liga', 1, 'P6'),
(163, 1, 6, 10, '0', 0, 0, '18:30', '2020-02-21', 'liga', 1, 'P7'),
(164, 1, 6, 11, '0', 0, 0, '20:00', '2020-02-22', 'liga', 1, 'P8'),
(165, 1, 6, 14, '0', 0, 0, '13:30', '2020-02-23', 'liga', 1, 'P2'),
(166, 1, 6, 16, '0', 0, 0, '17:00', '2020-02-24', 'liga', 1, 'P7'),
(167, 1, 7, 8, '0', 0, 0, '10:30', '2020-02-25', 'liga', 1, 'P3'),
(168, 1, 7, 9, '0', 0, 0, '09:00', '2020-02-26', 'liga', 1, 'P1'),
(169, 1, 7, 10, '0', 0, 0, '21:30', '2020-02-27', 'liga', 1, 'P7'),
(170, 1, 7, 11, '0', 0, 0, '13:30', '2020-02-28', 'liga', 1, 'P7'),
(171, 1, 7, 14, '0', 0, 0, '13:30', '2020-02-29', 'liga', 1, 'P2'),
(172, 1, 7, 16, '0', 0, 0, '12:00', '2020-03-01', 'liga', 1, 'P2'),
(173, 1, 8, 9, '0', 0, 0, '10:30', '2020-03-02', 'liga', 1, 'P8'),
(174, 1, 8, 10, '0', 0, 0, '18:30', '2020-03-03', 'liga', 1, 'P5'),
(175, 1, 8, 11, '0', 0, 0, '17:00', '2020-03-04', 'liga', 1, 'P4'),
(176, 1, 8, 14, '0', 0, 0, '13:30', '2020-03-05', 'liga', 1, 'P4'),
(177, 1, 8, 16, '0', 0, 0, '17:00', '2020-03-06', 'liga', 1, 'P5'),
(178, 1, 9, 10, '0', 0, 0, '13:30', '2020-03-07', 'liga', 1, 'P7'),
(179, 1, 9, 11, '0', 0, 0, '18:30', '2020-03-08', 'liga', 1, 'P8'),
(180, 1, 9, 14, '0', 0, 0, '21:30', '2020-03-09', 'liga', 1, 'P6'),
(181, 1, 9, 16, '0', 0, 0, '18:30', '2020-03-10', 'liga', 1, 'P1'),
(182, 1, 10, 11, '0', 0, 0, '09:00', '2020-03-11', 'liga', 1, 'P2'),
(183, 1, 10, 14, '0', 0, 0, '09:00', '2020-03-12', 'liga', 1, 'P8'),
(184, 1, 10, 16, '0', 0, 0, '10:30', '2020-03-13', 'liga', 1, 'P8'),
(185, 1, 11, 14, '0', 0, 0, '09:00', '2020-03-14', 'liga', 1, 'P6'),
(186, 1, 11, 16, '0', 0, 0, '21:30', '2020-03-15', 'liga', 1, 'P8'),
(188, 1, 14, 16, '0', 0, 0, '20:00', '2020-03-16', 'liga', 1, 'P2'),
(189, 2, 20, 21, '6-3/6-2/6-1', 3, 0, '09:00', '2020-02-04', 'liga', 4, 'P8'),
(190, 2, 20, 22, '0', 0, 0, '10:30', '2020-02-05', 'liga', 4, 'P6'),
(191, 2, 20, 23, '0', 0, 0, '12:00', '2020-02-06', 'liga', 4, 'P4'),
(192, 2, 20, 24, '0', 0, 0, '09:00', '2020-02-07', 'liga', 4, 'P6'),
(193, 2, 20, 25, '0', 0, 0, '18:30', '2020-02-08', 'liga', 4, 'P2'),
(194, 2, 20, 26, '0', 0, 0, '18:30', '2020-02-09', 'liga', 4, 'P3'),
(195, 2, 20, 27, '0', 0, 0, '18:30', '2020-02-10', 'liga', 4, 'P2'),
(196, 2, 20, 28, '0', 0, 0, '20:00', '2020-02-11', 'liga', 4, 'P4'),
(197, 2, 20, 29, '0', 0, 0, '09:00', '2020-02-12', 'liga', 4, 'P6'),
(198, 2, 20, 30, '0', 0, 0, '21:30', '2020-02-13', 'liga', 4, 'P2'),
(199, 2, 20, 31, '0', 0, 0, '10:30', '2020-02-14', 'liga', 4, 'P8'),
(200, 2, 21, 22, '0', 0, 0, '12:00', '2020-02-15', 'liga', 4, 'P8'),
(201, 2, 21, 23, '0', 0, 0, '18:30', '2020-02-16', 'liga', 4, 'P8'),
(202, 2, 21, 24, '0', 0, 0, '10:30', '2020-02-17', 'liga', 4, 'P6'),
(203, 2, 21, 25, '0', 0, 0, '20:00', '2020-02-18', 'liga', 4, 'P8'),
(204, 2, 21, 26, '0', 0, 0, '18:30', '2020-02-19', 'liga', 4, 'P2'),
(205, 2, 21, 27, '0', 0, 0, '21:30', '2020-02-20', 'liga', 4, 'P5'),
(206, 2, 21, 28, '0', 0, 0, '09:00', '2020-02-21', 'liga', 4, 'P2'),
(207, 2, 21, 29, '0', 0, 0, '20:00', '2020-02-22', 'liga', 4, 'P5'),
(208, 2, 21, 30, '0', 0, 0, '12:00', '2020-02-23', 'liga', 4, 'P6'),
(209, 2, 21, 31, '0', 0, 0, '18:30', '2020-02-24', 'liga', 4, 'P1'),
(210, 2, 22, 23, '0', 0, 0, '10:30', '2020-02-25', 'liga', 4, 'P3'),
(211, 2, 22, 24, '0', 0, 0, '21:30', '2020-02-26', 'liga', 4, 'P1'),
(212, 2, 22, 25, '0', 0, 0, '18:30', '2020-02-27', 'liga', 4, 'P4'),
(213, 2, 22, 26, '0', 0, 0, '20:00', '2020-02-28', 'liga', 4, 'P4'),
(214, 2, 22, 27, '0', 0, 0, '13:30', '2020-02-29', 'liga', 4, 'P2'),
(215, 2, 22, 28, '0', 0, 0, '10:30', '2020-03-01', 'liga', 4, 'P6'),
(216, 2, 22, 29, '0', 0, 0, '21:30', '2020-03-02', 'liga', 4, 'P6'),
(217, 2, 22, 30, '0', 0, 0, '18:30', '2020-03-03', 'liga', 4, 'P1'),
(218, 2, 22, 31, '0', 0, 0, '21:30', '2020-03-04', 'liga', 4, 'P6'),
(219, 2, 23, 24, '0', 0, 0, '09:00', '2020-03-05', 'liga', 4, 'P2'),
(220, 2, 23, 25, '0', 0, 0, '20:00', '2020-03-06', 'liga', 4, 'P6'),
(221, 2, 23, 26, '0', 0, 0, '10:30', '2020-03-07', 'liga', 4, 'P2'),
(222, 2, 23, 27, '0', 0, 0, '13:30', '2020-03-08', 'liga', 4, 'P4'),
(223, 2, 23, 28, '0', 0, 0, '21:30', '2020-03-09', 'liga', 4, 'P3'),
(224, 2, 23, 29, '0', 0, 0, '09:00', '2020-03-10', 'liga', 4, 'P1'),
(225, 2, 23, 30, '0', 0, 0, '18:30', '2020-03-11', 'liga', 4, 'P8'),
(226, 2, 23, 31, '0', 0, 0, '10:30', '2020-03-12', 'liga', 4, 'P8'),
(227, 2, 24, 25, '0', 0, 0, '17:00', '2020-03-13', 'liga', 4, 'P8'),
(228, 2, 24, 26, '0', 0, 0, '12:00', '2020-03-14', 'liga', 4, 'P8'),
(229, 2, 24, 27, '0', 0, 0, '21:30', '2020-03-15', 'liga', 4, 'P3'),
(230, 2, 24, 28, '0', 0, 0, '10:30', '2020-03-16', 'liga', 4, 'P3'),
(231, 2, 24, 29, '0', 0, 0, '20:00', '2020-03-17', 'liga', 4, 'P5'),
(232, 2, 24, 30, '0', 0, 0, '10:30', '2020-03-18', 'liga', 4, 'P1'),
(233, 2, 24, 31, '0', 0, 0, '10:30', '2020-03-19', 'liga', 4, 'P7'),
(234, 2, 25, 26, '0', 0, 0, '12:00', '2020-03-20', 'liga', 4, 'P1'),
(235, 2, 25, 27, '0', 0, 0, '09:00', '2020-03-21', 'liga', 4, 'P1'),
(236, 2, 25, 28, '0', 0, 0, '09:00', '2020-03-22', 'liga', 4, 'P5'),
(237, 2, 25, 29, '0', 0, 0, '20:00', '2020-03-23', 'liga', 4, 'P8'),
(238, 2, 25, 30, '0', 0, 0, '20:00', '2020-03-24', 'liga', 4, 'P4'),
(239, 2, 25, 31, '0', 0, 0, '09:00', '2020-03-25', 'liga', 4, 'P8'),
(240, 2, 26, 27, '0', 0, 0, '21:30', '2020-03-26', 'liga', 4, 'P2'),
(241, 2, 26, 28, '0', 0, 0, '12:00', '2020-03-27', 'liga', 4, 'P7'),
(242, 2, 26, 29, '0', 0, 0, '12:00', '2020-03-28', 'liga', 4, 'P3'),
(243, 2, 26, 30, '0', 0, 0, '21:30', '2020-03-29', 'liga', 4, 'P7'),
(244, 2, 26, 31, '0', 0, 0, '12:00', '2020-03-30', 'liga', 4, 'P8'),
(245, 2, 27, 28, '0', 0, 0, '18:30', '2020-03-31', 'liga', 4, 'P6'),
(246, 2, 27, 29, '0', 0, 0, '21:30', '2020-04-01', 'liga', 4, 'P0'),
(247, 2, 27, 30, '0', 0, 0, '20:00', '2020-04-02', 'liga', 4, 'P2'),
(248, 2, 27, 31, '0', 0, 0, '20:00', '2020-04-03', 'liga', 4, 'P1'),
(249, 2, 28, 29, '0', 0, 0, '21:30', '2020-04-04', 'liga', 4, 'P8'),
(250, 2, 28, 30, '0', 0, 0, '10:30', '2020-04-05', 'liga', 4, 'P5'),
(251, 2, 28, 31, '0', 0, 0, '20:00', '2020-04-06', 'liga', 4, 'P8'),
(252, 2, 29, 30, '0', 0, 0, '18:30', '2020-04-07', 'liga', 4, 'P3'),
(253, 2, 29, 31, '0', 0, 0, '18:30', '2020-04-08', 'liga', 4, 'P7'),
(255, 2, 30, 31, '0', 0, 0, '12:00', '2020-04-09', 'liga', 4, 'P6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clash_confirm`
--

CREATE TABLE `clash_confirm` (
  `id_enfrentamiento` bigint(7) NOT NULL,
  `id_pareja` bigint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clash_confirm`
--

INSERT INTO `clash_confirm` (`id_enfrentamiento`, `id_pareja`) VALUES
(122, 1),
(122, 3),
(123, 1),
(124, 1),
(125, 1),
(125, 6),
(126, 1),
(127, 1),
(130, 1),
(133, 3),
(134, 3),
(139, 3),
(140, 3),
(141, 3),
(142, 3),
(189, 20),
(189, 21),
(190, 20),
(191, 20),
(192, 20),
(193, 20),
(195, 20),
(200, 21),
(201, 21),
(204, 21),
(234, 25),
(235, 25),
(237, 25),
(238, 25),
(239, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple`
--

CREATE TABLE `couple` (
  `id_pareja` bigint(4) NOT NULL,
  `login1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `login2` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple`
--

INSERT INTO `couple` (`id_pareja`, `login1`, `login2`) VALUES
(1, 'admin', 'mariohermida'),
(2, 'lara', 'lucia_atm'),
(3, 'abeijon_antonio', 'santi_abascal'),
(4, 'delinha', 'charlie'),
(5, 'esteban_aitor', 'pimentel_luis'),
(6, 'pantoja_enrique', 'libertad_franco'),
(7, 'rego_nestor', 'torres_xan'),
(8, 'torra_quim', 'dasilva_perico'),
(9, 'camino_antonio', 'velasco_dionisio'),
(10, 'canto_toni', 'rodriguez_suso'),
(11, 'santos_leon', 'seoane_luis'),
(14, 'loser', 'somoza_mateo'),
(16, 'joan_roda', 'Luis_Clemente_Guadil'),
(18, 'mvarela', 'miranda_daniel'),
(19, 'terelu91', 'laura_vega'),
(20, 'admin', 'charlie'),
(21, 'santi_abascal', 'mariohermida'),
(22, 'esteban_aitor', 'santos_leon'),
(23, 'seoane_luis', 'somoza_mateo'),
(24, 'rego_nestor', 'rodriguez_suso'),
(25, 'abeijon_antonio', 'sesto_camilo'),
(26, 'pantoja_enrique', 'dasilva_perico'),
(27, 'dacuÃ±a_jose', 'bros_mario'),
(28, 'blas_fernando', 'gallego_xaquin'),
(29, 'vilanova_pedro', 'garcia_manuel'),
(30, 'torra_quim', 'roca_tino'),
(31, 'joan_roda', 'loser'),
(32, 'libertad_franco', 'velasco_dionisio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple_categoria`
--

CREATE TABLE `couple_categoria` (
  `id_categoria` tinyint(4) NOT NULL,
  `id_pareja` bigint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple_categoria`
--

INSERT INTO `couple_categoria` (`id_categoria`, `id_pareja`, `id_campeonato`) VALUES
(1, 1, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 14, 1),
(1, 16, 1),
(1, 18, 1),
(1, 20, 2),
(1, 21, 2),
(1, 22, 2),
(1, 23, 2),
(1, 24, 2),
(1, 25, 2),
(1, 26, 2),
(1, 27, 2),
(1, 28, 2),
(1, 29, 2),
(1, 30, 2),
(1, 31, 2),
(1, 32, 2),
(2, 2, 1),
(2, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple_grupo`
--

CREATE TABLE `couple_grupo` (
  `id_grupo` tinyint(4) NOT NULL,
  `id_pareja` bigint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple_grupo`
--

INSERT INTO `couple_grupo` (`id_grupo`, `id_pareja`, `id_campeonato`) VALUES
(1, 1, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 14, 1),
(1, 16, 1),
(2, 2, 1),
(2, 19, 1),
(3, 18, 1),
(4, 20, 2),
(4, 21, 2),
(4, 22, 2),
(4, 23, 2),
(4, 24, 2),
(4, 25, 2),
(4, 26, 2),
(4, 27, 2),
(4, 28, 2),
(4, 29, 2),
(4, 30, 2),
(4, 31, 2),
(5, 32, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple_nivel`
--

CREATE TABLE `couple_nivel` (
  `id_nivel` tinyint(4) NOT NULL,
  `id_pareja` bigint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple_nivel`
--

INSERT INTO `couple_nivel` (`id_nivel`, `id_pareja`, `id_campeonato`) VALUES
(1, 20, 2),
(1, 21, 2),
(1, 22, 2),
(1, 23, 2),
(1, 24, 2),
(1, 25, 2),
(1, 26, 2),
(1, 27, 2),
(1, 28, 2),
(1, 29, 2),
(1, 30, 2),
(1, 31, 2),
(1, 32, 2),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(2, 5, 1),
(2, 6, 1),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 14, 1),
(2, 16, 1),
(2, 18, 1),
(2, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `court` (
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `court`
--

INSERT INTO `court` (`id_pista`, `descripcion`, `ubicacion`, `precio`) VALUES
('P0', 'Cubierta y cristaleras de 50 metros', 'Ala Norte', '5.5'),
('P1', 'Cubierta y cristaleras de 50 metros', 'Ala Norte', '5.5'),
('P2', 'Descubierta y reglamentaria', 'Ala Sur', '5.5'),
('P3', 'Hierba natural', 'Ala Norte', '5.5'),
('P4', 'Hierba artificial', 'Ala Oeste', '5.5'),
('P5', 'Ancho y largo reglamentario. Bancos exteriores para descanso de los jugadores', 'Ala Este', '5.5'),
('P6', 'Otra descripcion', 'Ala Oeste', '5.5'),
('P7', 'Con vistas a la ciudad', 'Ala Norte', '5.5'),
('P8', 'Escasez de arena', 'Ala Sur', '5.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id_partido` tinyint(4) NOT NULL,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id_partido`, `id_pista`, `hora_inicio`, `fecha`) VALUES
(1, 'P2', '09:00', '2019-12-18'),
(2, 'P3', '17:00', '2019-12-14'),
(3, 'P3', '20:00', '2019-12-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` tinyint(4) NOT NULL,
  `id_categoria` tinyint(4) NOT NULL,
  `id_nivel` tinyint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `id_categoria`, `id_nivel`, `id_campeonato`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 1),
(3, 1, 2, 1),
(4, 1, 1, 2),
(5, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new`
--

CREATE TABLE `new` (
  `id_noticia` tinyint(10) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`, `fecha`, `hora`) VALUES
(1, 'Nueva Pista en O polígono', 'cccccc', 'A pradeira ruxía verde e leda', '10/08/2018', '15:41'),
(2, 'XXIII Carreira Paseo do Miño', 'iiiiii', 'A pradeira ruxía verde e leda', '03/02/2017', '08:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` tinyint(4) NOT NULL,
  `nivel` enum('Principiante','Intermedio','Avanzado') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `nivel`) VALUES
(1, 'Principiante'),
(2, 'Intermedio'),
(3, 'Avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id_pago` tinyint(4) NOT NULL,
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id_pago`, `concepto`, `cantidad`, `estado`, `login`) VALUES
(5, 'Campeonato', '34.99', 'Pagado', 'joan_roda'),
(6, 'Campeonato', '34.99', 'Pagado', 'joan_roda'),
(7, 'Campeonato', '34.99', 'Pagado', 'fati'),
(8, 'Campeonato', '34.99', 'Pagado', 'mvarela'),
(9, 'Campeonato', '34.99', 'Pagado', 'terelu91'),
(10, 'Campeonato', '34.99', 'Pagado', 'admin'),
(11, 'Campeonato', '34.99', 'Pagado', 'santi_abascal'),
(12, 'Campeonato', '34.99', 'Pagado', 'esteban_aitor'),
(13, 'Campeonato', '34.99', 'Pagado', 'seoane_luis'),
(14, 'Campeonato', '34.99', 'Pagado', 'rego_nestor'),
(15, 'Campeonato', '34.99', 'Pagado', 'abeijon_antonio'),
(16, 'Campeonato', '34.99', 'Pagado', 'pantoja_enrique'),
(17, 'Campeonato', '34.99', 'Pagado', 'dacuÃ±a_jose'),
(18, 'Campeonato', '34.99', 'Pagado', 'blas_fernando'),
(19, 'Campeonato', '34.99', 'Pagado', 'vilanova_pedro'),
(20, 'Campeonato', '34.99', 'Pagado', 'torra_quim'),
(21, 'Campeonato', '34.99', 'Pagado', 'joan_roda'),
(22, 'Campeonato', '34.99', 'Pagado', 'libertad_franco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id_plan` tinyint(4) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `precio` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plan`
--

INSERT INTO `plan` (`id_plan`, `tipo`, `precio`) VALUES
(1, 'Mensual', '9.99'),
(2, 'Trimestral', '23,95'),
(3, 'Semestral', '57,95'),
(4, 'Anual', '89,99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `ranking` (
  `id_pareja` bigint(4) NOT NULL,
  `p_jugados` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `p_ganados` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `puntos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ranking`
--

INSERT INTO `ranking` (`id_pareja`, `p_jugados`, `p_ganados`, `puntos`) VALUES
(1, '1', '1', 3),
(3, '1', '0', 1),
(4, '0', '0', 0),
(5, '0', '0', 0),
(6, '0', '0', 0),
(7, '0', '0', 0),
(8, '0', '0', 0),
(9, '0', '0', 0),
(10, '0', '0', 0),
(11, '0', '0', 0),
(14, '0', '0', 0),
(16, '0', '0', 0),
(20, '1', '1', 3),
(21, '1', '0', 1),
(22, '0', '0', 0),
(23, '0', '0', 0),
(24, '0', '0', 0),
(25, '0', '0', 0),
(26, '0', '0', 0),
(27, '0', '0', 0),
(28, '0', '0', 0),
(29, '0', '0', 0),
(30, '0', '0', 0),
(31, '0', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id_reserva` bigint(4) NOT NULL,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id_reserva`, `id_pista`, `login`, `hora_inicio`, `fecha`, `precio`) VALUES
(128, 'P4', 'root', '18:00', '1997-12-11', '5'),
(129, 'P7', 'admin', '13:30', '2020-01-11', '0'),
(131, 'P7', 'pantoja_enrique', '10:30', '2020-01-14', '0'),
(132, 'P8', 'santi_abascal', '09:00', '2020-02-04', '0'),
(133, 'P0', 'camino_antonio', '09:00', '2019-12-17', '5.5'),
(134, 'P0', 'camino_antonio', '10:30', '2019-12-17', '5.5'),
(135, 'P0', 'camino_antonio', '12:00', '2019-12-17', '5.5'),
(136, 'P0', 'camino_antonio', '13:30', '2019-12-17', '5.5'),
(137, 'P0', 'camino_antonio', '09:00', '2019-12-18', '5.5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` tinyint(4) NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'deportista'),
(3, 'entrenador'),
(4, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rule`
--

CREATE TABLE `rule` (
  `id_normativa` tinyint(4) NOT NULL,
  `bases` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rule`
--

INSERT INTO `rule` (`id_normativa`, `bases`) VALUES
(1, 'La altura mínima libre será\r\nde 6 metros en toda la\r\nsuperficie de la pista, sin\r\nque exista ningún elemento\r\nque invada dicho espacio\r\n(Ejemplo: focos). Para las\r\nnuevas construcciones se\r\nsugiere que la altura\r\nmínima libre sea de 8\r\nmetros en toda la superficie\r\nde la pista, sin que exista\r\nningún elemento que\r\ninvada dicho espacio.\r\n\r\nLa red tiene una\r\nlongitud de 10 metros y una\r\naltura de 0,88 metros en su\r\ncentro, elevándose en sus\r\nextremos hasta un máximo\r\nde 0,92 metros (con una\r\ntolerancia máxima de 0,005\r\nmetros).'),
(2, 'Se encuentra\r\nsuspendida por un cable\r\nmetálico de diámetro\r\nmáximo 0,01 metros, cuyos\r\nextremos están unidos a\r\ndos postes laterales de una\r\naltura máxima de 1,05\r\nmetros o de la propia\r\nestructura que lo sujetan y\r\ntensan.\r\nEl dispositivo de\r\ntensión del cable debe de\r\nestar concebido de tal modo\r\nque no se suelte de forma\r\ninesperada y no constituya\r\nun riesgo para los\r\njugadores'),
(3, 'Los postes de la red tienen sus caras exteriores coincidiendo con los límites\r\nlaterales de la pista (abertura, puerta o malla metálica). Pueden ser de sección\r\ncircular o cuadrada pero tendrán\r\nsus aristas redondeadas.\r\nLa red se remata con una\r\nbanda superior de fondo blanco\r\nde anchura entre 5,0 y 6,3 cm\r\nque una vez plegada, por su\r\ninterior va el cable de sujeción a\r\nla red. Podrá llevar una faja\r\nadicional con publicidad que no\r\nsupere la anchura de 9,0 cm.'),
(4, 'Reglamentariamente se admiten dos variantes en los cerramientos\r\nlaterales:\r\nVariante 1\r\nCompuesta por zonas escalonadas de pared en ambos extremos, de 3\r\nmetros de altura por 2 metros de longitud el primer paño y de 2 metros de altura\r\npor 2 metros de longitud el segundo paño. Las zonas de malla metálica\r\ncompletan el cerramiento hasta 3 metros de altura en los 16 metros centrales y\r\nhasta 4 metros de altura en los dos metros extremos.\r\nVariante 2\r\nCompuesta por zonas escalonadas de pared en ambos extremos, de 3\r\nmetros de altura por 2 metros de longitud el primer paño y de 2 metros de altura\r\npor 2 metros de longitud el segundo paño. Las zonas de malla metálica\r\ncompletan hasta 4 metros la altura en toda la longitud del cerramiento.\r\nLas dimensiones dadas son desde el interior de la pista.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `school`
--

CREATE TABLE `school` (
  `codigo` tinyint(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  `administrador` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `capacidad` varchar(4) NOT NULL,
  `num_clases` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `school`
--

INSERT INTO `school` (`codigo`, `nombre`, `ubicacion`, `administrador`, `capacidad`, `num_clases`) VALUES
(2, 'ESEI', 'C Velasco', 'admin', '125', '55'),
(3, 'ESEI2', 'Barcelona', 'admin', '120', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` enum('Masculino','Femenino') COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` tinyint(4) NOT NULL,
  `socio` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`login`, `nombre`, `apellido`, `password`, `dni`, `email`, `pais`, `sexo`, `telefono`, `fecha`, `foto`, `rol_id`, `socio`) VALUES
('abeijon_antonio', 'Antonio', 'Abeijon', 'root', '99116644H', 'abeijon_antonio@gmail.com', 'EspaÃ±a', 'Masculino', 633170771, '1946-01-01', 'ABP46_Diagrma Lógico.png', 1, '0'),
('acarmen', 'Carmen', 'Agueda', 'root', '43464269P', 'carminha@outlook.com', 'España', 'Femenino', 766661242, '1992-07-05', 'banner2.jpg', 2, '0'),
('admin', 'Charles', 'Somoziña', 'admin', '46110791T', 'flalonso17@esei.uvigo.es', 'Suiza', 'Masculino', 666133017, '1997-09-15', 'cancel.png', 1, '1'),
('aine', 'Aine', 'Rocha', 'root', '43509260I', 'aine@outlook.com', 'España', 'Femenino', 786861231, '1998-08-26', 'banner2.jpg', 2, '0'),
('andreita', 'Andrea', 'Calleja', 'root', '44554222L', 'andreita@outlook.com', 'España', 'Femenino', 666661201, '1997-12-07', 'banner2.jpg', 2, '0'),
('anita32', 'Ana', 'Fernandez', 'root', '44294260D', 'anafer_32@outlook.com', 'España', 'Femenino', 733861201, '1997-09-15', 'banner2.jpg', 2, '0'),
('antelo_esteban', 'Esteban', 'Antelo', 'root', '59216583V', 'antelo_esteban@gmail.com', 'EspaÃ±a', 'Masculino', 617285374, '1997-07-13', 'banner2.jpg', 1, '0'),
('antia12', 'Antia', 'Vazquez', 'root', '05561102R', 'antiavazquez@hotmail.com', 'España', 'Femenino', 698224591, '1998-12-13', 'banner3.jpg', 4, '0'),
('antiavazquez', 'Antia', 'Vazquez', 'root', '17219555F', 'antiavaz@outlook.es', 'España', 'Femenino', 659224908, '1997-06-04', 'banner2.jpg', 2, '0'),
('antonio_v', 'Antonio', 'Velazquez', 'root', '22751863X', 'antonio_v@outlook.com', 'España', 'Masculino', 754291002, '1997-09-12', 'iconUser.jpg', 2, '0'),
('apasionado_roberto', 'Roberto', 'Apasionado', 'root', '78583920X', 'apasionado_roberto@gmail.com', 'EspaÃ±a', 'Masculino', 675453433, '1999-08-01', 'banner2.jpg', 1, '0'),
('ares_alfonso', 'Vitor', 'Hugo', 'root', '85329482Y', 'hugo_vitor@gmail.com', 'EspaÃ±a', 'Masculino', 667438276, '1998-05-11', 'banner2.jpg', 1, '0'),
('aurelio_marco', 'Marco', 'Aurelio', 'root', '03265386Q', 'aurelio_marco@gmail.com', 'EspaÃ±a', 'Masculino', 689169644, '1987-08-23', 'banner2.jpg', 1, '0'),
('barbi', 'Barbara', 'Vidal', 'root', '53294353H', 'barbi@outlook.com', 'España', 'Femenino', 635555202, '1998-06-18', 'banner2.jpg', 2, '0'),
('belenchu', 'Belen', 'Roman', 'root', '494260D', 'belenchu@outlook.com', 'España', 'Femenino', 689861212, '1999-06-12', 'banner2.jpg', 2, '0'),
('blas_fernando', 'Fernando', 'Blas', 'root', '32893312X', 'blas_fernando@gmail.com', 'EspaÃ±a', 'Masculino', 623467567, '1996-04-21', 'banner2.jpg', 1, '0'),
('bros_mario', 'Mario', 'Bros', 'root', '32516273U', 'bros_mario@gmail.com', 'EspaÃ±a', 'Masculino', 687654999, '1998-02-16', 'banner2.jpg', 1, '0'),
('camino_antonio', 'Antonio', 'Camilo', 'root', '85432875G', 'camino_antonio@gmail.com', 'EspaÃ±a', 'Masculino', 643804721, '1982-03-14', 'banner2.jpg', 1, '0'),
('candela11', 'Candela', 'Touriño', 'root', '43454260B', 'candela@outlook.com', 'España', 'Femenino', 633001201, '1999-09-14', 'banner2.jpg', 2, '0'),
('cantalapiedra_jorge', 'Jorge', 'Cantalapiedra', 'root', '75592893Q', 'torres_n@gmail.com', 'EspaÃ±a', 'Masculino', 676352433, '1973-06-25', 'banner2.jpg', 1, '0'),
('canto_toni', 'Antonio', 'Canto', 'root', '73421198K', 'canto_toni@gmail.com', 'EspaÃ±a', 'Masculino', 634298764, '1966-01-30', 'banner2.jpg', 2, '0'),
('carla95', 'Carla', 'Suarez', 'root', '43170433Y', 'carlasuarez@outlook.com', 'España', 'Femenino', 654367762, '1987-04-15', 'banner2.jpg', 2, '0'),
('carlosm', 'Carlos', 'Alonso', 'root', '30584021R', 'carlosm@gmail.com', 'Portugal', 'Masculino', 773299121, '2012-12-12', 'user3.jpg', 2, '0'),
('carol', 'Carolina', 'Aguilar', 'root', '53293233Z', 'carol@outlook.com', 'España', 'Femenino', 633551255, '1996-03-18', 'banner2.jpg', 2, '0'),
('casteldefels_lluis', 'Lluis', 'Casteldefels', 'root', '04859873L', 'casteldefels_lluis@gmail.com', 'EspaÃ±a', 'Masculino', 696584644, '1954-01-03', 'banner2.jpg', 1, '0'),
('castro_romulo', 'Romulo', 'Castro', 'root', '74389098Y', 'castro_romulo@gmail.com', 'EspaÃ±a', 'Masculino', 622134521, '1977-07-07', 'banner2.jpg', 1, '0'),
('castro_ze', 'Ze', 'Castro', 'root', '89432176B', 'castro_ze@gmail.com', 'EspaÃ±a', 'Masculino', 673273682, '1967-01-22', 'banner2.jpg', 1, '0'),
('cela_jose', 'Jose', 'Cela', 'root', '49302743L', 'tres_xoan@gmail.com', 'EspaÃ±a', 'Masculino', 645939293, '1954-09-14', 'banner2.jpg', 1, '0'),
('celiag', 'Celia', 'Gonçalves', 'root', '56793121C', 'celia99@outlook.com', 'Portugal', 'Femenino', 733861201, '1999-01-01', 'banner2.jpg', 2, '0'),
('charlie', 'jnjn', 'jnknk', 'root', '234567', 'jnjnj@nbjnj.com', 'España', 'Masculino', 673322567, '1997-09-15', 'banner2.jpg', 2, '0'),
('clau96', 'Claudia', 'Campelo', 'root', '45674245K', 'clauuu@outlook.com', 'España', 'Femenino', 600861200, '1996-04-19', 'banner2.jpg', 2, '0'),
('csmartinez', 'Carlos Enrique', 'Somoza', 'csmartinez', '00289370F', 'csmartinez@gmail.com', 'Grecia', 'Masculino', 672341220, '1996-10-23', 'user1.jpg', 4, '0'),
('csousa', 'Cristina', 'Sousa', 'root', '36294260D', 'csousa94@outlook.com', 'Portugal', 'Femenino', 744362201, '1994-05-15', 'banner2.jpg', 2, '0'),
('cuevillas_floro', 'Florentino', 'Cuevillas', 'root', '61723450T', 'cuevillas_florentino@gmail.com', 'EspaÃ±a', 'Masculino', 603487355, '1959-01-23', 'banner2.jpg', 1, '0'),
('dacuÃ±a_jose', 'Jose', 'DacuÃ±a', 'root', '73425162S', 'dacunha_jose@gmail.com', 'EspaÃ±a', 'Masculino', 657492839, '1955-10-25', 'banner2.jpg', 1, '0'),
('dasilva_perico', 'Perico', 'Dasilva', 'root', '23175432A', 'dasilva_perico@gmail.com', 'EspaÃ±a', 'Masculino', 698745768, '1978-10-24', 'banner2.jpg', 1, '0'),
('delapenha_jesus', 'Jesus', 'Delapenha', 'root', '39201839Ã', 'delapenha_jesus@gmail.com', 'EspaÃ±a', 'Masculino', 627845875, '1921-04-10', 'banner2.jpg', 1, '0'),
('delinha', 'Miguel', 'Atrio', 'delinha', '24156629M', 'mdatrio@gmail.com', 'Suiza', 'Masculino', 658932456, '1997-03-12', 'user3.jpg', 3, '0'),
('elenanito', 'Elena', 'Romero', 'root', '54294272A', 'elenanito@outlook.com', 'España', 'Femenino', 754863201, '1996-07-09', 'banner2.jpg', 2, '0'),
('eli', 'Elisa', 'Albas', 'root', '4423500D', 'eli@outlook.com', 'España', 'Femenino', 744861244, '1996-09-16', 'banner2.jpg', 2, '0'),
('esteban_aitor', 'Aitor', 'Esteban', 'root', '35462218P', 'esteban_aitor@gmail.com', 'EspaÃ±a', 'Masculino', 676324152, '1957-02-27', 'banner2.jpg', 1, '0'),
('estere', 'Ester', 'Miragaya', 'root', '56794260D', 'esteree@outlook.com', 'España', 'Femenino', 678961278, '1996-07-13', 'banner2.jpg', 2, '0'),
('fati', 'Fatima', 'Vilas', 'root', '55594255S', 'fati@outlook.com', 'España', 'Femenino', 673431201, '1995-10-05', 'banner2.jpg', 2, '1'),
('fer_rv', 'Fernanda', 'Pereira', 'root', '10997721H', 'fernanda_pereira@yahoo.es', 'España', 'Femenino', 665229012, '1998-03-12', 'user2.jpg', 2, '0'),
('figueira_luis', 'Luis', 'Figuerira', 'root', '48932728U', 'figueira_luis@gmail.com', 'EspaÃ±a', 'Masculino', 674362333, '1968-07-04', 'banner2.jpg', 1, '0'),
('flores_antorio', 'Antonio', 'Flores', 'root', '48392039V', 'flores_antorio@gmail.com', 'EspaÃ±a', 'Masculino', 609579635, '1956-02-09', 'banner2.jpg', 1, '0'),
('francesca', 'Francesca', 'Totti', 'root', '43214260P', 'francesca97@outlook.com', 'Italia', 'Femenino', 703861431, '1997-05-19', 'banner2.jpg', 2, '0'),
('franky', 'fran', 'alonso', 'root', '6578298F', 'fraloal97@gmail.com', 'España', 'Masculino', 273222161, '15-09-1997', '../img/banner.jpg', 2, '0'),
('gallego_xaquin', 'Xaquin', 'Gallego', 'root', '38485390O', 'gallego_xaquin@gmail.com', 'EspaÃ±a', 'Masculino', 637463243, '1934-11-14', 'banner2.jpg', 1, '0'),
('garcia_manuel', 'Manuel', 'Garcia', 'root', '65748392W', 'garcia_manuel@gmail.com', 'EspaÃ±a', 'Masculino', 633225500, '1999-12-31', 'banner2.jpg', 2, '0'),
('garcia_pedro', 'Pedro', 'Garcia', 'root', '98356834N', 'garcia_pedro@gmail.com', 'EspaÃ±a', 'Masculino', 632443434, '1956-07-30', 'banner2.jpg', 1, '0'),
('gema123', 'Gema', 'Rodriguez', 'root', '41294060W', 'gema123@outlook.com', 'España', 'Femenino', 757861341, '1994-02-13', 'banner2.jpg', 2, '0'),
('giovana94', 'Giovanna', 'Campagna', 'root', '41221260Q', 'giovanna@outlook.com', 'Italia', 'Femenino', 635361202, '1994-11-11', 'banner2.jpg', 2, '0'),
('gise93', 'Gisela', 'Pereira', 'root', '44494442P', 'gisela93@outlook.com', 'España', 'Femenino', 611861111, '1993-02-27', 'banner2.jpg', 2, '0'),
('gomez_mario', 'Mario', 'Gomez', 'root', '95439864S', 'gomez_mario@gmail.com', 'EspaÃ±a', 'Masculino', 645657224, '1999-10-17', 'banner2.jpg', 1, '0'),
('inesga99', 'Ines', 'Garrido', 'root', '59294289M', 'inesita@outlook.com', 'España', 'Femenino', 673361633, '1999-05-30', 'banner2.jpg', 2, '0'),
('inma96', 'Inma', 'Verdejo', 'root', '55294000W', 'inma96@outlook.com', 'España', 'Femenino', 666861299, '1996-02-25', 'banner2.jpg', 2, '0'),
('ireneee', 'Irene', 'Sanchez', 'root', '55291133U', 'ire@outlook.com', 'España', 'Femenino', 684327569, '1997-12-03', 'banner2.jpg', 2, '0'),
('ivan_espinosa', 'Ivan', 'de la Concepcion', 'root', '78816661Z', 'ivanito_espi@gmail.com', 'España', 'Masculino', 2147483647, '1998-12-11', 'banner2.jpg', 2, '0'),
('jessi', 'Jessica', 'House', 'root', '32294320W', 'jessi@outlook.com', 'Inglaterra', 'Femenino', 666661221, '1995-04-23', 'banner2.jpg', 2, '0'),
('jmartinez', 'Jose', 'Martinez', 'root', '28000300P', 'jmartinez@gmail.com', 'Francia', 'Masculino', 664923810, '1996-03-12', 'iconUser.jpg', 2, '0'),
('joan_roda', 'Joan', 'Roda', 'root', '78836661M', 'joan_roda_barral@gmail.com', 'España', 'Masculino', 466723402, '1998-12-11', 'banner2.jpg', 2, '0'),
('josefa_barea', 'Josefa', 'Barea', 'root', '78325661S', 'josefi_barral@gmail.com', 'España', 'Femenino', 266724402, '1970-12-11', 'banner2.jpg', 2, '0'),
('juliaaa', 'Julia', 'Martinez', 'root', '56697277D', 'juliamar@outlook.com', 'España', 'Femenino', 698861232, '1996-06-06', 'banner2.jpg', 2, '0'),
('lara', 'Lara', 'Pimentel', 'root', '47774260S', 'lara98@outlook.com', 'España', 'Femenino', 656861207, '1998-07-5', 'banner2.jpg', 2, '0'),
('laura_borras', 'Laura', 'Borras', 'root', '78836661D', 'laura_barral@gmail.com', 'España', 'Femenino', 366723402, '1998-12-11', 'banner2.jpg', 2, '0'),
('laura_vega', 'Laura', 'Vega', 'root', '28836661K', 'laura_vega_barral@gmail.com', 'España', 'Femenino', 566723402, '1998-12-11', 'banner2.jpg', 2, '0'),
('laura66', 'Laura', 'Quintans', 'root', '4237260T', 'laura66@outlook.com', 'España', 'Femenino', 689447310, '1999-01-2', 'banner2.jpg', 2, '0'),
('leti96', 'Ana', 'Medina', 'root', '84294260D', 'leti96@outlook.com', 'España', 'Femenino', 789866788, '1996-01-08', 'banner2.jpg', 2, '0'),
('libertad_franco', 'Franco', 'Libertad', 'root', '38248189J', 'libertad_franco@gmail.com', 'EspaÃ±a', 'Masculino', 690275369, '1974-09-29', 'banner2.jpg', 1, '0'),
('lola', 'Lola', 'Agra', 'root', '45674232E', 'lola68@outlook.com', 'España', 'Femenino', 698861201, '1968-03-11', 'banner2.jpg', 2, '0'),
('loser', 'Antonio', 'López', 'root', '32901894S', 'antonio_lr@yahoo.es', 'España', 'Masculino', 663009701, '1962-09-29', 'banner1.jpg', 2, '0'),
('lucia_atm', 'Lucia', 'Puga', 'root', '35340416L', 'luciatm@gmail.com', 'España', 'Femenino', 655399823, '1994-12-20', 'banner2.jpg', 2, '0'),
('lucilu', 'Lucia', 'Ramirez', 'root', '54294765G', 'lucilu56@outlook.com', 'España', 'Femenino', 634461539, '1996-05-06', 'banner2.jpg', 2, '0'),
('Luis_Clemente_Guadil', 'Luis', 'Clemente', 'root', '78836661S', 'luis_guadilla_rral@gmail.com', 'España', 'Masculino', 966723402, '1998-12-11', 'banner2.jpg', 2, '0'),
('maldonado_javier', 'Javier', 'Maldonado', 'root', '47568321R', 'maldonado_javier@gmail.com', 'EspaÃ±a', 'Masculino', 619837846, '1980-06-18', 'banner2.jpg', 1, '0'),
('manzanares_alberto', 'Alberto', 'Manzanares', 'root', '89598365R', 'manzanares_alberto@gmail.com', 'EspaÃ±a', 'Masculino', 685344223, '1963-05-07', 'banner2.jpg', 1, '0'),
('manzanares_alfonso', 'Alfonso', 'Manzanares', 'root', '89759629E', 'manzanares_alfonso@gmail.com', 'EspaÃ±a', 'Masculino', 674325332, '1979-05-04', 'banner2.jpg', 1, '0'),
('mariam', 'Maria', 'Mendez', 'root', '57994269N', 'mmendez@outlook.com', 'España', 'Femenino', 756861568, '1993-09-25', 'banner2.jpg', 2, '0'),
('marina124', 'Marina', 'Cabaleiro', 'root', '43294211F', 'marina124@outlook.com', 'España', 'Femenino', 643862222, '1994-02-01', 'banner2.jpg', 2, '0'),
('mariohermida', 'Mario', 'Campos', 'root', '53861280H', 'mario.hermida@outlook.es', 'España', 'Masculino', 698137744, '1996-10-19', 'mario.jfif', 2, '0'),
('marlen', 'Marlen', 'Valado', 'root', '43294243B', 'valadom@outlook.com', 'España', 'Femenino', 649868301, '1996-08-24', 'banner2.jpg', 2, '0'),
('marta45', 'Marta', 'Vila', 'root', '53192260S', 'afer_32@outlook.com', 'España', 'Femenino', 767861266, '1995-06-05', 'banner2.jpg', 2, '0'),
('mdolores', 'Maria Dolores', 'Lopez', 'root', '89925329', 'mdolores@gmail.com', 'España', 'Femenino', 672199222, '1993-12-11', 'user2.jpg', 2, '0'),
('medialba', 'Alba', 'Patallo', 'root', '74294260D', 'albamedina@outlook.com', 'España', 'Femenino', 643231203, '1996-12-15', 'banner2.jpg', 2, '0'),
('mendez_carlos', 'Carlos', 'Mendez', 'root', '65437284E', 'mendez_carlos@gmail.com', 'EspaÃ±a', 'Masculino', 652783644, '1956-10-13', 'banner2.jpg', 1, '0'),
('merxearz', 'Mertxe', 'Arzallus', 'root', '78836651K', 'mertxe_arzallus@gmail.com', 'España', 'Femenino', 666723442, '1948-12-11', 'banner2.jpg', 2, '0'),
('mila', 'Milagros', 'Pintos', 'root', '44494320C', 'ar_32@outlook.com', 'España', 'Femenino', 654861243, '1994-05-19', 'banner2.jpg', 2, '0'),
('miragaya_txeroki', 'Txeroki', 'Miragaya', 'root', '58392984K', 'miragaya_txeroki@gmail.com', 'EspaÃ±a', 'Masculino', 698279555, '1976-08-28', 'banner2.jpg', 1, '0'),
('miranda_daniel', 'Daniel', 'Miranda', 'root', '98364522L', 'miranda_daniel@gmail.com', 'EspaÃ±a', 'Masculino', 673768765, '1981-12-19', 'banner2.jpg', 1, '0'),
('mire96', 'Mirella', 'Arribas', 'root', '4429426D', 'lamire@outlook.com', 'España', 'Femenino', 689861201, '1996-05-17', 'banner2.jpg', 2, '0'),
('miriam89', 'Miriam', 'Castro', 'root', '45554320D', 'miri@outlook.com', 'España', 'Femenino', 660861245, '1989-02-12', 'banner2.jpg', 2, '0'),
('montes_hilario', 'Hilario', 'Montes', 'root', '38492012I', 'montes_hilario@gmail.com', 'EspaÃ±a', 'Masculino', 609876542, '1954-01-30', 'banner2.jpg', 1, '0'),
('mvarela', 'Manuel', 'Varela', 'root', '96413471R', 'mvarela@gmail.com', 'España', 'Masculino', 773452198, '1988-12-12', 'iconUser.jpg', 2, '0'),
('nata64', 'Natalia', 'Vazquez', 'root', '49994D', 'nata64@outlook.com', 'España', 'Femenino', 789789201, '1996-06-04', 'banner2.jpg', 2, '0'),
('nerea34', 'Nerea', 'Ariño', 'root', '44293110R', 'nerea34@outlook.com', 'España', 'Femenino', 654861201, '1997-09-15', 'banner2.jpg', 2, '0'),
('novoa_jesus', 'Jesus', 'Novoa', 'root', '64352175F', 'novoa_jesus@gmail.com', 'EspaÃ±a', 'Masculino', 682647434, '1976-07-22', 'banner2.jpg', 1, '0'),
('novoneira_uxi', 'Uxio', '	Novoneira', 'root', '23751327G', 'novoneira_uxio@gmail.com', 'España', 'Masculino', 654398143, '1988-03-12', 'banner2.jpg', 4, '0'),
('nuria77', 'Nuria', 'Miranda', 'root', '53294320B', 'nuri@outlook.com', 'España', 'Femenino', 733861201, '1977-02-19', 'banner2.jpg', 2, '0'),
('osborne_jordi', 'Jordi', 'Osborne', 'root', '07328995I', 'osborne_jordi@gmail.com', 'EspaÃ±a', 'Masculino', 628943515, '1976-10-17', 'banner2.jpg', 1, '0'),
('pallares_ramon', 'Ramon', 'Pallares', 'root', '89756535B', 'pallares_ramon@gmail.com', 'EspaÃ±a', 'Masculino', 647565545, '1968-01-30', 'banner2.jpg', 1, '0'),
('pame', 'Pamela', 'Crespo', 'root', '55294265E', 'pamela@outlook.com', 'España', 'Femenino', 777861201, '1985-09-13', 'banner2.jpg', 2, '0'),
('pantoja_enrique', 'Enrique', 'Pantoja', 'root', '32754832N', 'pantoja_enrique@gmail.com', 'EspaÃ±a', 'Masculino', 689636735, '1988-01-20', 'banner2.jpg', 1, '0'),
('patri97', 'Patri', 'Hernandez', 'root', '54294260U', 'patriarca@outlook.com', 'España', 'Femenino', 676761201, '1997-08-18', 'banner2.jpg', 2, '0'),
('paula', 'Paula', 'Gomez', 'root', '59294260C', 'paula@outlook.com', 'España', 'Femenino', 639861211, '1998-12-30', 'banner2.jpg', 2, '0'),
('pimentel_luis', 'Luis', 'Pimentel', 'root', '00987620L', 'pimentel_luis@gmail.com', 'EspaÃ±a', 'Masculino', 600998877, '1996-08-23', 'banner2.jpg', 1, '0'),
('pradi', 'Pradi', 'Mejuto', 'root', '44344232Q', 'pradi45@outlook.com', 'España', 'Femenino', 699861299, '1997-01-25', 'banner2.jpg', 2, '0'),
('rebecape', 'Rebeca', 'Perez', 'root', '44593260D', 'rebe@outlook.com', 'España', 'Femenino', 638561202, '1998-11-1', 'banner2.jpg', 2, '0'),
('rego_nestor', 'Nestor', 'Rego', 'root', '47382923R', 'rego_nestor@gmail.com', 'EspaÃ±a', 'Masculino', 697853265, '1999-09-07', 'banner2.jpg', 1, '0'),
('roca_tino', 'Tino', 'Roca', 'root', '39456784W', 'roca_tino@gmail.com', 'EspaÃ±a', 'Masculino', 665434566, '1997-07-15', 'banner2.jpg', 1, '0'),
('rodriguez_suso', 'Suso', 'Rodriguez', 'root', '12746845C', 'rodriguez_suso@gmail.com', 'EspaÃ±a', 'Masculino', 675663533, '1969-04-29', 'banner2.jpg', 1, '0'),
('root', 'Javier', 'Alonso', 'root', '45159031A', 'paco150997@hotmail.com', 'España', 'Masculino', 673322161, '1998-12-12', 'iconUser.jpg', 2, '0'),
('rosio96', 'Rocio', 'Garcia', 'root', '59007260D', 'rosio96@outlook.com', 'España', 'Femenino', 689061201, '1996-09-25', 'banner2.jpg', 2, '0'),
('sabina23', 'Sabina', 'Domingo', 'root', '56294260L', 'sabina@outlook.com', 'España', 'Femenino', 630865401, '1992-10-29', 'banner2.jpg', 2, '0'),
('sandri97', 'Sandra', 'Chamarro', 'root', '54694255J', 'chamisa@outlook.com', 'España', 'Femenino', 678861245, '1997-09-11', 'banner2.jpg', 2, '0'),
('santi_abascal', 'Santiago', 'Abascal', 'root', '78836661L', 'santi_barral@gmail.com', 'España', 'Masculino', 636723402, '1998-12-11', 'banner2.jpg', 2, '0'),
('santos_leon', 'Santos', 'Leon', 'root', '78836661G', 'santos_leon_barral@gmail.com', 'España', 'Masculino', 866723402, '1998-12-11', 'banner2.jpg', 2, '0'),
('seoane_luis', 'Luis', 'Seoane', 'root', '76332211E', 'seoane_luis@gmail.com', 'EspaÃ±a', 'Masculino', 658263640, '1943-08-03', 'banner2.jpg', 1, '0'),
('sesto_camilo', 'Camilo', 'Sesto', 'root', '47829848H', 'sesto_camilo@gmail.com', 'EspaÃ±a', 'Masculino', 690756552, '1958-07-26', 'banner2.jpg', 1, '0'),
('somoza_mateo', 'Mateo', 'Somoza', 'root', '43829125P', 'somoza_mateo@gmail.com', 'EspaÃ±a', 'Masculino', 682364862, '1979-07-18', 'banner2.jpg', 1, '0'),
('sormaria', 'Maria', 'de la Concepcion', 'root', '78836661K', 'maria_barral@gmail.com', 'España', 'Femenino', 666723402, '1998-12-11', 'banner2.jpg', 2, '0'),
('terelu91', 'Teresa', 'Pacheco', 'root', '55594260M', 'terelu@outlook.com', 'España', 'Femenino', 2147483647, '1991-11-11', 'banner2.jpg', 2, '0'),
('torra_quim', 'Quim', 'Torra', 'root', '84959393M', 'torra_quim@gmail.com', 'EspaÃ±a', 'Masculino', 609729695, '1978-07-08', 'banner2.jpg', 1, '0'),
('torres_xan', 'Xoan', 'Torres', 'root', '4743649E', 'ores_xoan@gml.com', 'España', 'Masculino', 67850670, '1976-11-25', 'banner2.jpg', 1, '0'),
('torres_xoan', 'Xoan', 'Torres', 'root', '47436349E', 'torres_xoan@gmail.com', 'EspaÃ±a', 'Masculino', 678546790, '1976-11-25', 'banner2.jpg', 1, '0'),
('varela_pepe', 'Pepe', 'Varela', 'root', '54300772Z', 'varela_pepe@gmail.com', 'EspaÃ±a', 'Masculino', 678546790, '1965-04-18', 'banner2.jpg', 1, '0'),
('velasco_dionisio', 'Dionisio', 'Velasco', 'root', '57283921D', 'velasco_dionisio@gmail.com', 'EspaÃ±a', 'Masculino', 692398525, '1977-06-12', 'banner2.jpg', 1, '0'),
('vicky', 'Victoria', 'Beltran', 'root', '53294210F', 'vicky55@outlook.com', 'España', 'Femenino', 733861201, '1997-05-05', 'banner2.jpg', 2, '0'),
('vilanova_pedro', 'Pedro', 'Vilanova', 'root', '21654372D', 'vilanova_pedro@gmail.com', 'EspaÃ±a', 'Masculino', 689364222, '1944-11-25', 'banner2.jpg', 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_game`
--

CREATE TABLE `user_game` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_partido` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_game`
--

INSERT INTO `user_game` (`login`, `id_partido`) VALUES
('bros_mario', 1),
('camino_antonio', 1),
('carlosm', 1),
('fer_rv', 2),
('jmartinez', 2),
('lucia_atm', 2),
('mdolores', 3),
('mvarela', 3),
('root', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_plan`
--

CREATE TABLE `user_plan` (
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_plan` tinyint(4) NOT NULL,
  `caducacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user_plan`
--

INSERT INTO `user_plan` (`login`, `id_plan`, `caducacion`) VALUES
('admin', 3, '2020-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_school`
--

CREATE TABLE `user_school` (
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `championship`
--
ALTER TABLE `championship`
  ADD PRIMARY KEY (`id_campeonato`),
  ADD KEY `id_normativa` (`id_normativa`);

--
-- Indices de la tabla `championship_categoria`
--
ALTER TABLE `championship_categoria`
  ADD PRIMARY KEY (`id_campeonato`,`id_categoria`),
  ADD KEY `championship_categoria_ibfk_1` (`id_categoria`);

--
-- Indices de la tabla `championship_couple`
--
ALTER TABLE `championship_couple`
  ADD PRIMARY KEY (`id_pareja`,`id_campeonato`),
  ADD KEY `id_campeonato` (`id_campeonato`);

--
-- Indices de la tabla `championship_nivel`
--
ALTER TABLE `championship_nivel`
  ADD PRIMARY KEY (`id_campeonato`,`id_nivel`),
  ADD KEY `championship_nivel_ibfk_1` (`id_nivel`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indices de la tabla `clash`
--
ALTER TABLE `clash`
  ADD PRIMARY KEY (`id_enfrentamiento`,`id_campeonato`),
  ADD KEY `id_pareja1` (`id_pareja1`),
  ADD KEY `id_pareja2` (`id_pareja2`),
  ADD KEY `clash_ibfk_0` (`id_campeonato`),
  ADD KEY `clash_ibfk_3` (`id_grupo`),
  ADD KEY `clash_ifbk_4` (`id_pista`);

--
-- Indices de la tabla `clash_confirm`
--
ALTER TABLE `clash_confirm`
  ADD PRIMARY KEY (`id_enfrentamiento`,`id_pareja`),
  ADD KEY `confirm_fk_1` (`id_enfrentamiento`),
  ADD KEY `confirm_fk_2` (`id_pareja`);

--
-- Indices de la tabla `couple`
--
ALTER TABLE `couple`
  ADD PRIMARY KEY (`id_pareja`),
  ADD KEY `login1` (`login1`),
  ADD KEY `login2` (`login2`);

--
-- Indices de la tabla `couple_categoria`
--
ALTER TABLE `couple_categoria`
  ADD PRIMARY KEY (`id_categoria`,`id_pareja`,`id_campeonato`),
  ADD KEY `couple_categoria_ibfk_2` (`id_pareja`),
  ADD KEY `couple_categoria_ibfk_3` (`id_campeonato`);

--
-- Indices de la tabla `couple_grupo`
--
ALTER TABLE `couple_grupo`
  ADD PRIMARY KEY (`id_grupo`,`id_pareja`,`id_campeonato`),
  ADD KEY `couple_grupo_ibfk_2` (`id_pareja`),
  ADD KEY `couple_grupo_ibfk_3` (`id_campeonato`);

--
-- Indices de la tabla `couple_nivel`
--
ALTER TABLE `couple_nivel`
  ADD PRIMARY KEY (`id_nivel`,`id_pareja`,`id_campeonato`),
  ADD KEY `couple_nivel_ibfk_2` (`id_pareja`),
  ADD KEY `couple_nivel_ibfk_3` (`id_campeonato`);

--
-- Indices de la tabla `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`id_pista`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_partido`),
  ADD KEY `id_pista` (`id_pista`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `grupo_ibfk_1` (`id_categoria`),
  ADD KEY `grupo_ibfk_2` (`id_nivel`),
  ADD KEY `grupo_ibfk_3` (`id_campeonato`);

--
-- Indices de la tabla `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `login` (`login`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_pareja`);

--
-- Indices de la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reserva`,`id_pista`,`login`),
  ADD KEY `id_pista` (`id_pista`),
  ADD KEY `login` (`login`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_normativa`);

--
-- Indices de la tabla `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `school_fb_1` (`administrador`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `user_game`
--
ALTER TABLE `user_game`
  ADD PRIMARY KEY (`login`,`id_partido`),
  ADD KEY `id_partido` (`id_partido`);

--
-- Indices de la tabla `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`login`,`id_plan`),
  ADD KEY `user_plan_fk_2` (`id_plan`);

--
-- Indices de la tabla `user_school`
--
ALTER TABLE `user_school`
  ADD PRIMARY KEY (`login`,`codigo`),
  ADD KEY `school_user_fk_2` (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `championship`
--
ALTER TABLE `championship`
  MODIFY `id_campeonato` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `clash`
--
ALTER TABLE `clash`
  MODIFY `id_enfrentamiento` bigint(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT de la tabla `couple`
--
ALTER TABLE `couple`
  MODIFY `id_pareja` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id_partido` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `new`
--
ALTER TABLE `new`
  MODIFY `id_noticia` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id_pago` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id_plan` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reserva` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rule`
--
ALTER TABLE `rule`
  MODIFY `id_normativa` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `school`
--
ALTER TABLE `school`
  MODIFY `codigo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `championship`
--
ALTER TABLE `championship`
  ADD CONSTRAINT `championship_ibfk_1` FOREIGN KEY (`id_normativa`) REFERENCES `rule` (`id_normativa`) ON DELETE CASCADE;

--
-- Filtros para la tabla `championship_categoria`
--
ALTER TABLE `championship_categoria`
  ADD CONSTRAINT `championship_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `championship_categoria_ibfk_2` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `championship_couple`
--
ALTER TABLE `championship_couple`
  ADD CONSTRAINT `championship_couple_ibfk_1` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `championship_couple_ibfk_2` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `championship_nivel`
--
ALTER TABLE `championship_nivel`
  ADD CONSTRAINT `championship_nivel_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE CASCADE,
  ADD CONSTRAINT `championship_nivel_ibfk_2` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clash`
--
ALTER TABLE `clash`
  ADD CONSTRAINT `clash_ibfk_0` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE,
  ADD CONSTRAINT `clash_ibfk_1` FOREIGN KEY (`id_pareja1`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `clash_ibfk_2` FOREIGN KEY (`id_pareja2`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `clash_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clash_ifbk_4` FOREIGN KEY (`id_pista`) REFERENCES `court` (`id_pista`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clash_confirm`
--
ALTER TABLE `clash_confirm`
  ADD CONSTRAINT `confirm_fk_1` FOREIGN KEY (`id_enfrentamiento`) REFERENCES `clash` (`id_enfrentamiento`) ON DELETE CASCADE,
  ADD CONSTRAINT `confirm_fk_2` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE;

--
-- Filtros para la tabla `couple`
--
ALTER TABLE `couple`
  ADD CONSTRAINT `couple_ibfk_1` FOREIGN KEY (`login1`) REFERENCES `user` (`login`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_ibfk_2` FOREIGN KEY (`login2`) REFERENCES `user` (`login`) ON DELETE CASCADE;

--
-- Filtros para la tabla `couple_categoria`
--
ALTER TABLE `couple_categoria`
  ADD CONSTRAINT `couple_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_categoria_ibfk_2` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_categoria_ibfk_3` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `couple_grupo`
--
ALTER TABLE `couple_grupo`
  ADD CONSTRAINT `couple_grupo_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_grupo_ibfk_2` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_grupo_ibfk_3` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `couple_nivel`
--
ALTER TABLE `couple_nivel`
  ADD CONSTRAINT `couple_nivel_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_nivel_ibfk_2` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_nivel_ibfk_3` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `court` (`id_pista`) ON DELETE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE CASCADE,
  ADD CONSTRAINT `grupo_ibfk_3` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ifbk_1` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `court` (`id_pista`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE;

--
-- Filtros para la tabla `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_fb_1` FOREIGN KEY (`administrador`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_game`
--
ALTER TABLE `user_game`
  ADD CONSTRAINT `user_game_ibfk_1` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_game_ibfk_2` FOREIGN KEY (`id_partido`) REFERENCES `game` (`id_partido`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_plan`
--
ALTER TABLE `user_plan`
  ADD CONSTRAINT `user_plan_fk_1` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_plan_fk_2` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_school`
--
ALTER TABLE `user_school`
  ADD CONSTRAINT `school_user_fk_1` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE,
  ADD CONSTRAINT `school_user_fk_2` FOREIGN KEY (`codigo`) REFERENCES `school` (`codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
