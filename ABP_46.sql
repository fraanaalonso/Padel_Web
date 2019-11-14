-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2019 a las 19:18:37
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


DROP DATABASE IF EXISTS `abp46`;
CREATE DATABASE `abp46` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `abp46`;
--
-- Base de datos: `abp46`
--

-- --------------------------------------------------------

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
  `id_normativa` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`id_campeonato`, `fecha_inicio`, `fecha_limite`, `id_normativa`) VALUES
(1, '2019-12-17', '2019-12-15', 2),
(2, '2019-12-21', '2019-12-18', 1),
(3, '2019-11-11', '2019-11-09', 4);

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
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship_couple`
--

CREATE TABLE `championship_couple` (
  `id_pareja` tinyint(4) NOT NULL,
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
(12, 1),
(13, 1),
(14, 1),
(15, 1);

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
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3);

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
(26, 'jmartinez', 'Como digáis vosotros', '03/11/2019', '18:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clash`
--

CREATE TABLE `clash` (
  `id_enfrentamiento` tinyint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL,
  `id_pareja1` tinyint(4) NOT NULL,
  `id_pareja2` tinyint(4) NOT NULL,
  `numSetsPareja1` int(1) NOT NULL,
  `numSetsPareja2` int(1) NOT NULL,
  `hora_inicio` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clash`
--

INSERT INTO `clash` (`id_enfrentamiento`, `id_campeonato`, `id_pareja1`, `id_pareja2`, `numSetsPareja1`, `numSetsPareja2`, `hora_inicio`, `fecha`) VALUES
(1, 1, 1, 3, 2, 1, '09:00', '2019-12-11'),
(2, 1, 2, 4, 2, 1, '10:30', '2019-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple`
--

CREATE TABLE `couple` (
  `id_pareja` tinyint(4) NOT NULL,
  `login1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `login2` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple`
--

INSERT INTO `couple` (`id_pareja`, `login1`, `login2`) VALUES
(1, 'fer_rv', 'delinha'),
(2, 'mdolores', 'jmartinez'),
(3, 'mdolores', 'root'),
(4, 'anita32', 'mvarela'),
(5, 'fer_rv', 'lucia_atm'),
(6, 'jmartinez', 'csmartinez'),
(7, 'mvarela', 'carlosm'),
(8, 'admin', 'charlie'),
(9, 'antiavazquez', 'lucia_atm'),
(10, 'antiavazquez', 'delinha'),
(11, 'admin', 'antonio_v'),
(12, 'santos_leon', 'santi_abascal'),
(13, 'ivan_espinosa', 'merxearz'),
(14, 'joan_roda', 'laura_vega'),
(15, 'Luis_Clemente_Guadil', 'mariohermida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple_categoria`
--

CREATE TABLE `couple_categoria` (
  `id_categoria` tinyint(4) NOT NULL,
  `id_pareja` tinyint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple_categoria`
--

INSERT INTO `couple_categoria` (`id_categoria`, `id_pareja`, `id_campeonato`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(1, 12, 1),
(1, 15, 1),
(3, 13, 1),
(3, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple_grupo`
--

CREATE TABLE `couple_grupo` (
  `id_grupo` tinyint(4) NOT NULL,
  `id_pareja` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple_grupo`
--

INSERT INTO `couple_grupo` (`id_grupo`, `id_pareja`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple_nivel`
--

CREATE TABLE `couple_nivel` (
  `id_nivel` tinyint(4) NOT NULL,
  `id_pareja` tinyint(4) NOT NULL,
  `id_campeonato` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple_nivel`
--

INSERT INTO `couple_nivel` (`id_nivel`, `id_pareja`, `id_campeonato`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(2, 12, 1),
(2, 13, 1),
(3, 14, 1),
(3, 15, 1);

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
(2, 'P2', '09:00', '2019-12-18'),
(3, 'P3', '17:00', '2019-12-14'),
(4, 'P4', '10:30', '2019-11-14'),
(5, 'P3', '20:00', '2019-12-17'),
(6, 'P6', '21:30', '2019-11-17'),
(7, 'P7', '18:30', '2019-12-10');

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
(1, 3, 1, 1),
(2, 3, 1, 1),
(3, 3, 1, 1);

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
(2, 'XXIII Carreira Paseo do Miño', 'iiiiii', 'A pradeira ruxía verde e leda', '03/02/2017', '08:34'),
(3, 'Deporte como forma de vida', 'eeeeeee', 'A pradeira ruxía verde e leda', '18/09/2019', '17:16');

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
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id_reserva` tinyint(4) NOT NULL,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'Mayores de 18 años masculino y nivel avanzado'),
(2, 'Entre 12 y 15 años mixto y principiante'),
(3, 'Entre 16 y 18 años femenino y nievel intermedio'),
(4, 'Mayores de 55 años femenino y nivel principiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `id_horario` tinyint(4) NOT NULL,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `hora_fin` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `schedule`
--

INSERT INTO `schedule` (`id_horario`, `id_pista`, `hora_inicio`, `hora_fin`, `fecha_inicio`) VALUES
(0, 'P0', '09:00', '10:30', '26/11/2019'),
(0, 'P1', '09:00', '10:30', '26/11/2019'),
(0, 'P2', '09:00', '10:30', '26/11/2019'),
(0, 'P3', '09:00', '10:30', '26/11/2019'),
(0, 'P4', '09:00', '10:30', '26/11/2019'),
(0, 'P5', '09:00', '10:30', '26/11/2019'),
(0, 'P6', '09:00', '10:30', '26/11/2019'),
(0, 'P7', '09:00', '10:30', '26/11/2019'),
(0, 'P8', '09:00', '10:30', '26/11/2019'),
(1, 'P0', '10:30', '12:00', '30/11/2019'),
(1, 'P1', '10:30', '12:00', '30/11/2019'),
(1, 'P2', '10:30', '12:00', '30/11/2019'),
(1, 'P3', '10:30', '12:00', '30/11/2019'),
(1, 'P4', '10:30', '12:00', '30/11/2019'),
(1, 'P5', '10:30', '12:00', '30/11/2019'),
(1, 'P6', '10:30', '12:00', '30/11/2019'),
(1, 'P7', '10:30', '12:00', '30/11/2019'),
(1, 'P8', '10:30', '12:00', '30/11/2019'),
(2, 'P0', '12:00', '13:30', '02/12/2019'),
(2, 'P1', '12:00', '13:30', '02/12/2019'),
(2, 'P2', '12:00', '13:30', '02/12/2019'),
(2, 'P3', '12:00', '13:30', '02/12/2019'),
(2, 'P4', '12:00', '13:30', '02/12/2019'),
(2, 'P5', '12:00', '13:30', '02/12/2019'),
(2, 'P6', '12:00', '13:30', '02/12/2019'),
(2, 'P7', '12:00', '13:30', '02/12/2019'),
(2, 'P8', '12:00', '13:30', '02/12/2019'),
(3, 'P0', '13:30', '15:00', '08/12/2019'),
(3, 'P1', '13:30', '15:00', '08/12/2019'),
(3, 'P2', '13:30', '15:00', '08/12/2019'),
(3, 'P3', '13:30', '15:00', '08/12/2019'),
(3, 'P4', '13:30', '15:00', '08/12/2019'),
(3, 'P5', '13:30', '15:00', '08/12/2019'),
(3, 'P6', '13:30', '15:00', '08/12/2019'),
(3, 'P7', '13:30', '15:00', '08/12/2019'),
(3, 'P8', '13:30', '15:00', '08/12/2019'),
(4, 'P0', '17:00', '18:30', '12/12/2019'),
(4, 'P1', '17:00', '18:30', '12/12/2019'),
(4, 'P2', '17:00', '18:30', '12/12/2019'),
(4, 'P3', '17:00', '18:30', '12/12/2019'),
(4, 'P4', '17:00', '18:30', '12/12/2019'),
(4, 'P5', '17:00', '18:30', '12/12/2019'),
(4, 'P6', '17:00', '18:30', '12/12/2019'),
(4, 'P7', '17:00', '18:00', '12/12/2019'),
(4, 'P8', '17:00', '18:00', '12/12/2019'),
(5, 'P0', '18:30', '20:00', '15/12/2019'),
(5, 'P1', '18:30', '20:00', '15/12/2019'),
(5, 'P2', '18:30', '20:00', '15/12/2019'),
(5, 'P3', '18:30', '20:00', '15/12/2019'),
(5, 'P4', '18:30', '20:00', '15/12/2019'),
(5, 'P5', '18:30', '20:00', '15/12/2019'),
(5, 'P6', '18:30', '20:00', '15/12/2019'),
(5, 'P7', '18:30', '20:00', '15/12/2019'),
(5, 'P8', '18:30', '20:00', '15/12/2019'),
(6, 'P0', '20:00', '21:30', '18/12/2019'),
(6, 'P1', '20:00', '21:30', '18/12/2019'),
(6, 'P2', '20:00', '21:30', '18/12/2019'),
(6, 'P3', '20:00', '21:30', '18/12/2019'),
(6, 'P4', '20:00', '21:30', '18/12/2019'),
(6, 'P5', '20:00', '21:30', '18/12/2019'),
(6, 'P6', '20:00', '21:30', '18/12/2019'),
(6, 'P7', '20:00', '21:30', '18/12/2019'),
(6, 'P8', '20:00', '21:30', '18/12/2019'),
(7, 'P0', '21:30', '23:00', '22/12/2019'),
(7, 'P1', '21:30', '23:00', '22/12/2019'),
(7, 'P2', '21:30', '23:00', '22/12/2019'),
(7, 'P3', '21:30', '23:00', '22/12/2019'),
(7, 'P4', '21:30', '23:00', '22/12/2019'),
(7, 'P5', '21:30', '23:00', '22/12/2019'),
(7, 'P6', '21:30', '23:00', '22/12/2019'),
(7, 'P7', '21:30', '23:00', '22/12/2019'),
(7, 'P8', '21:30', '23:00', '22/12/2019');

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
  `rol_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`login`, `nombre`, `apellido`, `password`, `dni`, `email`, `pais`, `sexo`, `telefono`, `fecha`, `foto`, `rol_id`) VALUES
('admin', 'Charles', 'Somoziña', 'admin', '46110791T', 'flalonso17@esei.uvigo.es', 'Alemania', 'Masculino', 666133017, '1997-09-15', 'user1.jpg', 1),
('anita32', 'Ana', 'Fernandez', 'root', '44294260D', 'anafer_32@outlook.com', 'España', 'Femenino', 733861201, '1997-09-15', 'banner2.jpg', 2),
('antia12', 'Antia', 'Vazquez', 'root', '05561102R', 'antiavazquez@hotmail.com', 'España', 'Femenino', 698224591, '1998-12-13', 'banner3.jpg', 4),
('antiavazquez', 'Antia', 'Vazquez', 'root', '17219555F', 'antiavaz@outlook.es', 'España', 'Femenino', 659224908, '1997-06-04', 'banner2.jpg', 2),
('antonio_v', 'Antonio', 'Velazquez', 'root', '22751863X', 'antonio_v@outlook.com', 'España', 'Masculino', 754291002, '1997-09-12', 'iconUser.jpg', 2),
('carlosm', 'Carlos', 'Alonso', 'root', '30584021R', 'carlosm@gmail.com', 'Portugal', 'Masculino', 773299121, '2012-12-12', 'user3.jpg', 2),
('charlie', 'jnjn', 'jnknk', 'root', '234567', 'jnjnj@nbjnj.com', 'España', 'Masculino', 673322567, '1997-09-15', 'banner2.jpg', 2),
('csmartinez', 'Carlos Enrique', 'Somoza', 'csmartinez', '00289370F', 'csmartinez@gmail.com', 'Grecia', 'Masculino', 672341220, '1996-10-23', 'user1.jpg', 4),
('delinha', 'Miguel', 'Atrio', 'delinha', '24156629M', 'mdatrio@gmail.com', 'Suiza', 'Masculino', 658932456, '1997-03-12', 'user3.jpg', 3),
('fer_rv', 'Fernanda', 'Pereira', 'root', '10997721H', 'fernanda_pereira@yahoo.es', 'España', 'Femenino', 665229012, '1998-03-12', 'user2.jpg', 2),
('ivan_espinosa', 'Ivan', 'de la Concepcion', 'root', '78816661Z', 'ivanito_espi@gmail.com', 'España', 'Masculino', 2147483647, '1998-12-11', 'banner2.jpg', 2),
('jmartinez', 'Jose', 'Martinez', 'root', '28000300P', 'jmartinez@gmail.com', 'Francia', 'Masculino', 664923810, '1996-03-12', 'iconUser.jpg', 2),
('joan_roda', 'Joan', 'Roda', 'root', '78836661M', 'joan_roda_barral@gmail.com', 'España', 'Masculino', 466723402, '1998-12-11', 'banner2.jpg', 2),
('josefa_barea', 'Josefa', 'Barea', 'root', '78325661S', 'josefi_barral@gmail.com', 'España', 'Femenino', 266724402, '1970-12-11', 'banner2.jpg', 2),
('laura_borras', 'Laura', 'Borras', 'root', '78836661D', 'laura_barral@gmail.com', 'España', 'Femenino', 366723402, '1998-12-11', 'banner2.jpg', 2),
('laura_vega', 'Laura', 'Vega', 'root', '28836661K', 'laura_vega_barral@gmail.com', 'España', 'Femenino', 566723402, '1998-12-11', 'banner2.jpg', 2),
('lucia_atm', 'Lucia', 'Puga', 'root', '35340416L', 'luciatm@gmail.com', 'España', 'Femenino', 655399823, '1994-12-20', 'banner2.jpg', 2),
('Luis_Clemente_Guadil', 'Luis', 'Clemente', 'root', '78836661S', 'luis_guadilla_rral@gmail.com', 'España', 'Masculino', 966723402, '1998-12-11', 'banner2.jpg', 2),
('mariohermida', 'Mario', 'Campos', 'root', '53861280H', 'mario.hermida@outlook.es', 'España', 'Masculino', 698137744, '1996-10-19', 'mario.jfif', 2),
('mdolores', 'Maria Dolores', 'Lopez', 'root', '89925329', 'mdolores@gmail.com', 'España', 'Femenino', 672199222, '1993-12-11', 'user2.jpg', 2),
('merxearz', 'Mertxe', 'Arzallus', 'root', '78836651K', 'mertxe_arzallus@gmail.com', 'España', 'Femenino', 666723442, '1948-12-11', 'banner2.jpg', 2),
('mvarela', 'Manuel', 'Varela', 'root', '96413471R', 'mvarela@gmail.com', 'España', 'Masculino', 773452198, '1988-12-12', 'iconUser.jpg', 2),
('root', 'Javier', 'Alonso', 'root', '45159031A', 'paco150997@hotmail.com', 'España', 'Masculino', 673322161, '1998-12-12', 'iconUser.jpg', 2),
('santi_abascal', 'Santiago', 'Abascal', 'root', '78836661L', 'santi_barral@gmail.com', 'España', 'Masculino', 636723402, '1998-12-11', 'banner2.jpg', 2),
('santos_leon', 'Santos', 'Leon', 'root', '78836661G', 'santos_leon_barral@gmail.com', 'España', 'Masculino', 866723402, '1998-12-11', 'banner2.jpg', 2),
('sormaria', 'Maria', 'de la Concepcion', 'root', '78836661K', 'maria_barral@gmail.com', 'España', 'Femenino', 666723402, '1998-12-11', 'banner2.jpg', 2);

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
('admin', 2),
('carlosm', 3),
('fer_rv', 2),
('jmartinez', 6),
('mdolores', 4),
('mvarela', 5);

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
  ADD KEY `clash_ibfk_0` (`id_campeonato`);

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
  ADD PRIMARY KEY (`id_grupo`,`id_pareja`),
  ADD KEY `couple_grupo_ibfk_2` (`id_pareja`);

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
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_horario`,`id_pista`),
  ADD KEY `id_pista` (`id_pista`);

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
  MODIFY `id_campeonato` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `clash`
--
ALTER TABLE `clash`
  MODIFY `id_enfrentamiento` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `couple`
--
ALTER TABLE `couple`
  MODIFY `id_pareja` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id_partido` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_pago` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reserva` tinyint(4) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `clash_ibfk_2` FOREIGN KEY (`id_pareja2`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `couple_grupo_ibfk_2` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE;

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
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `court` (`id_pista`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE;

--
-- Filtros para la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `court` (`id_pista`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
