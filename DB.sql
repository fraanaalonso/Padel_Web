-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2019 a las 15:10:13
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
-- Estructura de tabla para la tabla `new`
--

CREATE TABLE IF NOT EXISTS `NEW` (
  `id_noticia` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pais` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `foto` tinyblob NOT NULL,
  `rol` enum('administrador','deportista', 'entrenador', 'usuario') NOT NULL,
  PRIMARY KEY(`login`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `dni` (`dni`)   
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `COURT` (

`id_pista` varchar(10) NOT NULL,
`ubicacion` varchar(20) NOT NULL,
`num_pista` varchar(2) NOT NULL,
`terreno` varchar(11) NOT NULL,
`precio` varchar(2) NOT NULL,
`estado` int(1) NOT NULL,

PRIMARY KEY (`id_pista`)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE IF NOT EXISTS `SCHEDULE`(

`id_pista` varchar(10) NOT NULL,

`id_horario` varchar(2) NOT NULL,

`inicio` varchar(5) NOT NULL,

`fin` varchar(5) NOT NULL,

`fecha` varchar(10) NOT NULL,

PRIMARY KEY (`id_pista`,`id_horario`),

FOREIGN KEY(id_pista) REFERENCES COURT(id_pista) ON DELETE CASCADE



)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;





CREATE TABLE IF NOT EXISTS `RESERVATION` (

`login` varchar(20) NOT NULL,

`id_pista` varchar(10) NOT NULL,

`id_horario` varchar(2) NOT NULL,

PRIMARY KEY (`login`,`id_pista`,`id_horario`),

FOREIGN KEY(login) REFERENCES USER(login) ON DELETE CASCADE,

FOREIGN KEY(id_pista) REFERENCES COURT(id_pista) ON DELETE CASCADE,

FOREIGN KEY(id_horario) REFERENCES HORARIOS(id_horario) ON DELETE CASCADE

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE IF NOT EXISTS `MATCH` (

  `id_partido` tinyint NOT NULL AUTO_INCREMENT,

  `id_pista` varchar(10) NOT NULL,

  `inicio` varchar(5) NOT NULL,

  `fin` varchar(5) NOT NULL,

  `fecha` varchar(10) NOT NULL,

  PRIMARY KEY(`id_partido`),

  FOREIGN KEY(`id_pista`) REFERENCES COURT(`id_pista`) ON DELETE CASCADE,

  FOREIGN KEY(`inicio`) REFERENCES SCHEDULE(`inicio`) ON DELETE CASCADE,

  FOREIGN KEY(`fin`) REFERENCES SCHEDULE(`fin`) ON DELETE CASCADE,

  FOREIGN KEY(`fecha`) REFERENCES SCHEDULE(`fecha`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
















--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`, `login`) VALUES
('Codigo1', 'As Cousas de Ramón Lamote', 'Denantes mortas que escravas', 'A pradeira ruxía verde e leda', 'sominho'),
('Codigo2', 'Dooousss', 'Mañá é nadal', 'Veñen os reises e papá noel', 'En Ourense cidade te');










--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`login`, `nombre`, `apellido`, `password`, `dni`, `email`, `pais`, `sexo`, `telefono`, `fecha`, `foto`) VALUES
('admin', 'DELINHA', 'maister', 'admin', '456789', 'mkmkjn@nnnjn.com', 'España', 'Hombre', 567890, '2019-10-16', ''),
('alonso', 'Franco', 'root', 'root', '345678', 'gbyhjuiko@gbhjnik.com', 'yguhui', 'ijoijoijoi', 56789, '0000-00-00', ''),
('root', 'root', 'root', 'root', '567890', 'fghjk@yhujkl.com', 'España', 'Hombre', 456789, '2019-10-17', 0x75736572332e6a7067);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
