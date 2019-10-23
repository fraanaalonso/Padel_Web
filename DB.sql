-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2019 a las 00:19:59
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
-- Base de datos: `padelweb`
--

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
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` enum('administrador','deportista','entrenador','usuario') COLLATE utf8_spanish_ci NOT NULL,
   PRIMARY KEY (`login`),
   UNIQUE KEY `email` (`email`),
   UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `new`
--

CREATE TABLE `new` (
  `id_noticia` tinyint(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `court` (
  `id_pista` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_pista` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `terreno` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,

  PRIMARY KEY (`id_pista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `match` (
  `id_partido` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pista` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `hora_fin` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(8) COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_partido`),
  FOREIGN KEY (`id_pista`) REFERENCES COURT(`id_pista`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--
-- Estructura de tabla para la tabla `user_match`
--

CREATE TABLE `user_match` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_partido` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,


  PRIMARY KEY (`login`, `id_partido`),
  FOREIGN KEY (`login`) REFERENCES USER(`login`) ON DELETE CASCADE
  FOREIGN KEY (`id_partido`) REFERENCES MATCH(`id_partido`) ON DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `reservation` (
  `id_reserva` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pista` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(8) COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_reserva`, `id_pista`,`login`),
  FOREIGN KEY (`id_pista`) REFERENCES COURT(`id_pista`) ON DELETE CASCADE,
  FOREIGN KEY (`login`) REFERENCES USER(`login`) ON DELETE CASCADE,
  FOREIGN KEY (`id_partido`) REFERENCES MATCH(`id_partido`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Estructura de tabla para la tabla `user_match`
--

CREATE TABLE `user_match` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_partido` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,


  PRIMARY KEY (`login`, `id_partido`),
  FOREIGN KEY (`login`) REFERENCES USER(`login`) ON DELETE CASCADE,
  FOREIGN KEY (`id_partido`) REFERENCES MATCH(`id_partido`) ON DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;





--
-- Estructura de tabla para la tabla `rule`
--

CREATE TABLE `rule` (
  `id_normativa` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `bases`  mediumtext COLLATE utf8_spanish_ci NOT NULL,,

  PRIMARY KEY (`id_normativa`),

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `championship`
--



CREATE TABLE `championship` (
  `id_campeonato` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pista` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `fecha_inicio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_limite` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_normativa` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,

  PRIMARY KEY (`id_campeonato`),
   FOREIGN KEY (`id_normativa`) REFERENCES RULE(`id_normativa`) ON DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;





--
-- Estructura de tabla para la tabla `group`
--

CREATE TABLE `group` (
  `id_grupo` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `grupo` enum('principiante','intermedio','avanzado') COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_grupo`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Estructura de tabla para la tabla `rank`
--

CREATE TABLE `rank` (
  `id_categoria` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `categoria` enum('masculino','femenino','mixto') COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_categoria`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `couple`
--


CREATE TABLE `couple` (
  `id_pareja` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_categoria` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_grupo` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `login1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `login2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_pareja`),
  FOREIGN KEY (`login1`) REFERENCES USER(`login`) on DELETE CASCADE,
  FOREIGN KEY (`login2`) REFERENCES USER(`login`) on DELETE CASCADE,
  FOREIGN KEY (`id_categoria`) REFERENCES RANK(`id_categoria`) on DELETE CASCADE,
  FOREIGN KEY (`id_grupo`) REFERENCES GROUP(`id_grupo`) on DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `championship-couple`
--

CREATE TABLE `championship_couple` (
  `id_pareja` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_campeonato` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,

  PRIMARY KEY (`id_pareja`,`id_campeonato`),
  FOREIGN KEY (`id_pareja`) REFERENCES COUPLE(`id_pareja`) on DELETE CASCADE,
  FOREIGN KEY (`id_campeonato`) REFERENCES CHAMPIONSHIP(`id_campeonato`) on DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--
-- Estructura de tabla para la tabla `clash`
--

CREATE TABLE `clash` (
  `id_enfrentamiento` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pareja1` tinyint NOT NULL,
  `id_pareja2` tinyint NOT NULL,
  `numSetsPareja1` int(1) NOT NULL,
  `numSetsPareja2` int(1) NOT NULL,
  `id_grupo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(8) COLLATE utf8_spanish_ci NOT NULL,


  PRIMARY KEY (`id_enfrentamiento`),
  FOREIGN KEY (`id_pareja1`) REFERENCES COUPLE(`id_pareja`) on DELETE CASCADE,
  FOREIGN KEY (`id_pareja2`) REFERENCES COUPLE(`id_pareja`) on DELETE CASCADE,
  FOREIGN KEY (`id_grupo`) REFERENCES GROUP(`id_grupo`) on DELETE CASCADE
  FOREIGN KEY (`id_categoria`) REFERENCES RANK(`id_categoria`) on DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id_pago` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,


  PRIMARY KEY (`id_pago`),
  FOREIGN KEY (`login`) REFERENCES USER(`login`) on DELETE CASCADE,


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `ranking` (
  `codigo` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pareja` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `partidos_jugados` int(2) NOT NULL,
  `partidos_ganados` int(2) NOT NULL,
  `partidos_perdidos`int(2) NOT NULL,
  `partidos_empatados` int(2) NOT NULL,
  `puntos` int(3) NOT NULL,

  PRIMARY KEY (`codigo`),
  FOREIGN KEY (`id_pareja`) REFERENCES COUPLE(`id_pareja`) on DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;





--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `results` (
  `codigo` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pareja` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_enfrentamiento` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `resultado` varchar(3) NOT NULL

  PRIMARY KEY (`codigo`),
  FOREIGN KEY (`id_pareja`) REFERENCES COUPLE(`id_pareja`) on DELETE CASCADE,
  FOREIGN KEY (`id_enfrentamiento`) REFERENCES CLASH(`id_enfrentamiento`) on DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`login`, `nombre`, `apellido`, `password`, `dni`, `email`, `pais`, `sexo`, `telefono`, `fecha`, `rol_id`) VALUES
('admin', 'DELINHA', 'maister', 'admin', '456789', 'mkmkjn@nnnjn.com', 'España', 'Hombre', 567890, '2019-10-16', 'administrador'),
('alonso', 'Franco', 'root', 'root', '345678', 'gbyhjuiko@gbhjnik.com', 'yguhui', 'ijoijoijoi', 56789, '0000-00-00', 'entrenador'),
('dous', 'njknjknjk', 'jnkjnkjn', 'dous', '5467890', 'kjnkjnjk@xn--biquios-8za.com', 'España', 'Hombre', 234567, '1996-09-16', 'deportista'),
('fran', 'jijioj', 'nnionji', 'fran', '4567890', 'bhj@hnuiu.com', 'España', 'Hombre', 4567890, '1997-09-15', 'deportista'),
('meu', 'bbjunb', 'bb', 'meu', '45678', 'uihniuh@hbui.com', 'España', 'Hombre', 5678, '9977-09-15', 'deportista'),
('root', 'root', 'root', 'root', '567890', 'fghjk@yhujkl.com', 'España', 'Hombre', 456789, '2019-10-17', 'deportista'),
('sominho', 'ujbujb', 'uhbujbhuhbiu', 'sominho', '34567890', 'niknuinui@huiuu.com', 'España', 'Hombre', 34567890, '1998-09-17', 'deportista'),
('somo', 'njunjjn', 'inikjnj', 'somo', '3456789', 'mjikji@niuji.com', 'España', 'Hombre', 4567890, '1997-09-15', 'deportista');

--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`, `login`) VALUES
(1, 'As Cousas de Ramón Lamote', 'Denantes mortas que escravas', 'A pradeira ruxía verde e leda', 'sominho'),
(2, 'Dooousss', 'Mañá é nadal', 'Veñen os reises e papá noel', 'En Ourense cidade te');

-- --------------------------------------------------------



