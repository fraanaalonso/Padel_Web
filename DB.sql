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
  PRIMARY KEY (`id_noticia`),
  FOREIGN KEY (`login`) REFERENCES USER(`login`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `court` (
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,

  PRIMARY KEY (`id_pista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `match` (
  `id_partido` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
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
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
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
-- Estructura de tabla para la tabla `championship`
--



CREATE TABLE `championship` (
  `id_campeonato` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `fecha_inicio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_limite` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
 `id_grupo` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
 `id_categoria` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_normativa` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,

  PRIMARY KEY (`id_campeonato`),
   FOREIGN KEY (`id_normativa`) REFERENCES RULE(`id_normativa`) ON DELETE CASCADE,
   FOREIGN KEY (`id_grupo`) REFERENCES GROUP(`id_grupo`) ON DELETE CASCADE,
   FOREIGN KEY (`id_categoria`) REFERENCES RANK(`id_categoria`) ON DELETE CASCADE

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
  `id_grupo` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_categoria` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
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


------------------------------------------------------------------------------------------------------------


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

-------------------------------------------------------------------------------------

--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`, `login`) VALUES
(1, 'As Cousas de Ramón Lamote', 'aaaaaa', 'A pradeira ruxía verde e leda', 'admin'),
(2, 'Poseidon', 'bbbbbbb', 'A pradeira ruxía verde e leda', 'admin'),
(3, 'Tonecho de Rebordechao', 'bbbbbbbbb', 'A pradeira ruxía verde e leda', 'admin'),
(4, 'Fundamentos de Sistemas de Base de Datos', 'bbbbbbbb', 'A pradeira ruxía verde e leda', 'admin'),
(5, 'Nueva Pista en O polígono', 'cccccc', 'A pradeira ruxía verde e leda', 'admin'),
(6, 'XXIII Carreira Paseo do Miño', 'iiiiii', 'A pradeira ruxía verde e leda', 'admin'),
(7, 'Deporte como forma de vida', 'eeeeeee', 'A pradeira ruxía verde e leda','admin'),
(8, 'Calistenia', 'Mañá é nadal', 'ffffffff', 'En Ourense cidade te', 'admin');

-- --------------------------------------------------------




--
-- Volcado de datos para la tabla `court`
--

INSERT INTO `court` (`id_pista`, `ubicacion`, `precio`, `estado`) VALUES
("P1", 'Ala Norte', 5.5 , 1),
("P2", 'Ala Sur', 5.5 , 1),
("P3", 'Ala Norte', 5.5, 1),
("P4", 'Ala Oeste', 5.5, 2),
("P5", 'Ala Este', 5.5, 2),
("P6", 'Ala Oeste', 5.5, 1),
("P7", 'Ala Norte',5.5, 1),
("P8", 'Ala Sur', 5.5, 2);




--
-- Volcado de datos para la tabla `match`
--

INSERT INTO `match` (`id_partido`, `id_pista`, `hora_inicio`, `hora_fin`, `fecha`) VALUES
(1, 'P1', '17:50',"18:50", "17-12-2019"),
(2, 'P2', '18:50', "20:10", "18-12-2019"),
(3, 'P3', '14:10', "15:30", "14-12-2019"),
(4, 'P4', '15:30', "16:30", "19-12-2019"),
(5, 'P3', '09:45', "10:50", "17-12-2019"),
(6, 'P6', '19:25', '20:25', "11-12-2019"),
(7, 'P7', '12:35',"13:35", "10-12-2019"),
(8, 'P1', '11:30', "12:35", "13-12-2019");



 
 --
-- Volcado de datos para la tabla `user_match`
--

INSERT INTO `user_match` (`login`, `id_partido`) VALUES
('admin', 1),
('root', 2),
('dous', 3),
('meu', 4),
('sominho', 5),
('somo', 6);





--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id_reserva`, `id_pista`, `login`, `fecha`) VALUES
(1, 'P1', "root"  "17-12-2019"),
(2, 'P2', "somo", "18-12-2019"),
(3, 'P3', "sominho" , "14-12-2019"),
(4, 'P4', "meu", "19-12-2019"),
(5, 'P3', "meu", "17-12-2019"),
(6, 'P6', "sominho", "11-12-2019"),
(7, 'P7', "alonso", "10-12-2019"),
(8, 'P1', "root", "13-12-2019");

 --
-- Volcado de datos para la tabla `rule`
--

INSERT INTO `rule` (`id_normativa`, `bases`) VALUES
(1, 'Mayores de 18 años, masculino y nivel avanzado'),
(2, 'Entre 12 y 15 años, mixto y principiante'),
(3, 'Entre 16 y 18 años, femenino y nievel intermedio'),
(4, 'Mayores de 55 años, femenino y nivel principiante');




 --
-- Volcado de datos para la tabla `group`
--

INSERT INTO `group` (`id_grupo`, `grupo`) VALUES
(1, "principiante"),
(2, "intermedio"),
(3, "avanzado");





 --
-- Volcado de datos para la tabla `rank`
--

INSERT INTO `rank` (`id_categoria`, `categoria`) VALUES
(1, "masculino"),
(2, "femenino"),
(3, "mixto");





--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`id_campeonato`, `fecha_inicio`, `fecha_limite`, `id_grupo`,`id_categoria`, `id_normativa`) VALUES
(1, "17-12-2019", "15-12-2019", 1,1, 2),
(2, "21-12-2019", "18-12-2019", 3,3, 1),
(3, "11-11-2019", "09-11-2019", 2,3, 4),
(4, "22-12-2019", "20-12-2019", 2,2, 3),
(5, "13-01-2020", "10-01-2020", 2,2, 3),
(6, "13-02-2020", "10-02-2020", 1,2, 1),
(7, "15-03-2020", "13-03-2020",1,2, 1),
(8, "20-04-2020", "17-04-2020", 1,3, 3);




--
-- Volcado de datos para la tabla `couple`
--

INSERT INTO `couple` (`id_pareja`, `id_categoria`, `id_grupo`, `login1`, `login2`) VALUES
(1, 1,1, "root", "admin"),
(2, 3,3, "meu", "alonso"),
(3, 2,3, "sominho", "delinha"),
(4,2,2, "somo", "alonso"),
(5, 2,2, "root", "delinha"),
(6, 1,2, "jose12", "root"),
(7,1,2, "admin", "alonso"),
(8, 1,3, "meu", "puri");



--
-- Volcado de datos para la tabla `championship_couple`
--

INSERT INTO `championship_couple` (`id_pareja`,`id_campeonato`) VALUES
(1, 1),
(2, 1),
(3, 1),
(8, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1);



--
-- Volcado de datos para la tabla `clash`
--

INSERT INTO `clash` (`id_campeonato`, `id_pareja1`, `id_pareja2`, `numSetsPareja1`,`numSetsPareja2`, `id_grupo`,`id_categoria`, `hora_inicio`) VALUES
(1, 1, 2, 2, 1, 1, 1, "18:50"),
(1, 3, 4, 2, 1, 1, 1, "18:50"),
(1, 5, 6, 2, 1, 1, 1, "18:50"),
(1, 7, 8, 2, 1, 1, 1, "18:50"),
(1, 9, 10, 2, 1, 1, 1, "18:50"),
(1, 11, 12, 2, 1, 1, 1, "18:50"),
(1, 13, 14, 2, 1, 1, 1, "18:50"),
(1, 15, 16, 2, 1, 1, 1, "18:50");















