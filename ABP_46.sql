-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2019 a las 17:21:31
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `padelweb`;
CREATE DATABASE `padelweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
--
-- SELECCIONAMOS PARA USAR
--
USE `padelweb`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `padelweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championship`
--

CREATE TABLE `championship` (
  `id_campeonato` tinyint(4) NOT NULL,
  `fecha_inicio` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_limite` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_normativa` tinyint(4) NOT NULL,
  `id_grupo` tinyint(4) NOT NULL,
  `id_categoria` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`id_campeonato`, `fecha_inicio`, `fecha_limite`, `id_normativa`, `id_grupo`, `id_categoria`) VALUES
(1, '17-12-2019', '15-12-2019', 2, 1, 1),
(2, '21-12-2019', '18-12-2019', 1, 3, 3),
(3, '11-11-2019', '09-11-2019', 4, 2, 3),
(4, '22-12-2019', '20-12-2019', 3, 2, 2),
(5, '13-01-2020', '10-01-2020', 3, 2, 2),
(6, '13-02-2020', '10-02-2020', 1, 1, 2),
(7, '15-03-2020', '13-03-2020', 1, 1, 2),
(8, '20-04-2020', '17-04-2020', 3, 1, 3);

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
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clash`
--

CREATE TABLE `clash` (
  `id_enfrentamiento` tinyint(4) NOT NULL,
  `id_pareja1` tinyint(4) NOT NULL,
  `id_pareja2` tinyint(4) NOT NULL,
  `numSetsPareja1` int(1) NOT NULL,
  `numSetsPareja2` int(1) NOT NULL,
  `id_grupo` tinyint(4) NOT NULL,
  `id_categoria` tinyint(4) NOT NULL,
  `hora_inicio` varchar(8) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clash`
--

INSERT INTO `clash` (`id_enfrentamiento`, `id_pareja1`, `id_pareja2`, `numSetsPareja1`, `numSetsPareja2`, `id_grupo`, `id_categoria`, `hora_inicio`) VALUES
(1, 1, 2, 2, 1, 1, 1, '18:50'),
(2, 3, 4, 2, 1, 1, 1, '18:50'),
(3, 5, 6, 2, 1, 1, 1, '18:50'),
(4, 7, 8, 2, 1, 1, 1, '18:50'),
(5, 9, 10, 2, 1, 1, 1, '18:50'),
(6, 11, 12, 2, 1, 1, 1, '18:50'),
(7, 13, 14, 2, 1, 1, 1, '18:50'),
(8, 15, 16, 2, 1, 1, 1, '18:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couple`
--

CREATE TABLE `couple` (
  `id_pareja` tinyint(4) NOT NULL,
  `id_categoria` tinyint(4) NOT NULL,
  `id_grupo` tinyint(4) NOT NULL,
  `login1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `login2` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `couple`
--

INSERT INTO `couple` (`id_pareja`, `id_categoria`, `id_grupo`, `login1`, `login2`) VALUES
(1, 1, 1, 'root', 'admin'),
(2, 1, 1, 'anita32', 'antia12'),
(3, 1, 1, 'antonio_v', 'antiavazquez'),
(4, 1, 1, 'mvarela', 'root'),
(5, 1, 1, 'lucia_atm', 'csmartinez'),
(6, 1, 1, 'sormaria', 'Graham'),
(7, 1, 1, 'fer_rv', 'delinha'),
(8, 1, 1, 'mdolores', 'jmartinez'),
(9, 1, 1, 'mdolores', 'root'),
(10, 1, 1, 'antiavazquez', 'delinha'),
(11, 1, 1, 'anita32', 'mvarela'),
(12, 1, 1, 'admin', 'sormaria'),
(13, 1, 1, 'fer_rv', 'lucia_atm'),
(14, 1, 1, 'jmartinez', 'csmartinez'),
(15, 1, 1, 'mvarela', 'carlosm'),
(16, 1, 1, 'lucia_atm', 'antiavazquez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `court` (
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `court`
--

INSERT INTO `court` (`id_pista`, `descripcion`, `ubicacion`, `precio`, `estado`) VALUES
('P1', 'Cubierta y cristaleras de 50 metros', 'Ala Norte', '5.5', 1),
('P2', 'Descubierta y reglamentaria', 'Ala Sur', '5.5', 1),
('P3', 'Hierba natural', 'Ala Norte', '5.5', 1),
('P4', 'Hierba artificial', 'Ala Oeste', '5.5', 2),
('P5', 'Ancho y largo reglamentario. Bancos exteriores para descanso de los jugadores', 'Ala Este', '5.5', 2),
('P6', 'Otra descripcion', 'Ala Oeste', '5.5', 1),
('P7', 'Con vistas a la ciudad', 'Ala Norte', '5.5', 1),
('P8', 'Escasez de arena', 'Ala Sur', '5.5', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id_partido` tinyint(4) NOT NULL,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `hora_fin` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id_partido`, `id_pista`, `hora_inicio`, `hora_fin`, `fecha`) VALUES
(2, 'P2', '18:50', '20:10', '18-12-2019'),
(3, 'P3', '14:10', '15:30', '14-12-2019'),
(4, 'P4', '15:30', '16:30', '19-12-2019'),
(5, 'P3', '09:45', '10:50', '17-12-2019'),
(6, 'P6', '19:25', '20:25', '11-12-2019'),
(7, 'P7', '12:35', '13:35', '10-12-2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gender`
--

CREATE TABLE `gender` (
  `id_categoria` tinyint(4) NOT NULL,
  `categoria` enum('masculino','femenino','mixto') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gender`
--

INSERT INTO `gender` (`id_categoria`, `categoria`) VALUES
(1, 'masculino'),
(2, 'femenino'),
(3, 'mixto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` tinyint(4) NOT NULL,
  `grupo` enum('principiante','intermedio','avanzado') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `grupo`) VALUES
(1, 'principiante'),
(2, 'intermedio'),
(3, 'avanzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new`
--

CREATE TABLE `new` (
  `id_noticia` tinyint(10) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(7, 'Deporte como forma de vida', 'eeeeeee', 'A pradeira ruxía verde e leda', 'admin'),
(8, 'Mañá é nadal', 'ffffffff', 'En Ourense cidade te', 'admin');

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
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id_reserva`, `id_pista`, `login`, `hora_inicio`, `fecha`) VALUES
(1, 'P2', 'root', '19:00', '17-12-2019'),
(2, 'P3', 'admin', '10:00', '18-12-2019'),
(3, 'P4', 'anita32', '09:00', '14-12-2019'),
(4, 'P3', 'sormaria', '11:00', '19-12-2019'),
(5, 'P6', 'delinha', '15:00', '17-12-2019'),
(6, 'P7', 'antonio_v', '09:30', '11-12-2019');

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
  `foto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`login`, `nombre`, `apellido`, `password`, `dni`, `email`, `pais`, `sexo`, `telefono`, `fecha`, `foto`, `rol_id`) VALUES
('admin', 'Francisco', 'Alonso', 'admin', '46110791T', 'flalonso17@esei.uvigo.es', 'Alemania', 'Hombre', 666133017, '1997-09-15', 'user1.jpg', 1),
('anita32', 'Ana', 'Fernandez', 'root', '44294260D', 'anafer_32@outlook.com', 'España', 'Femenino', 733861201, '1997-09-15', 'banner2.jpg', 2),
('antia12', 'Antia', 'Vazquez', 'root', '05561102R', 'antiavazquez@hotmail.com', 'España', 'Femenino', 698224591, '1998-12-13', 'user2.jpg', 2),
('antiavazquez', 'Antia', 'Vazquez', 'root', '17219555F', 'antiavaz@outlook.es', 'España', 'Femenino', 659224908, '1997-06-04', 'banner2.jpg', 2),
('antonio_v', 'Antonio', 'Velazquez', 'root', '22751863X', 'antonio_v@outlook.com', 'España', 'Masculino', 754291002, '1997-09-12', 'iconUser.jpg', 2),
('carlosm', 'Carlos', 'Alonso', 'root', '30584021R', 'carlosm@gmail.com', 'Portugal', 'Masculino', 773299121, '2012-12-12', 'user3.jpg', 2),
('charlie', 'jnjn', 'jnknk', 'root', '234567', 'jnjnj@nbjnj.com', 'España', 'Hombre', 673322567, '1997-09-15', 'banner2.jpg', 2),
('csmartinez', 'Carlos Enrique', 'Somoza', 'csmartinez', '00289370F', 'csmartinez@gmail.com', 'Grecia', 'masculino', 672341220, '1996-10-23', 'user1.jpg', 4),
('delinha', 'Miguel', 'Atrio', 'delinha', '24156629M', 'mdatrio@gmail.com', 'Suiza', 'Hombre', 658932456, '1997-03-12', 'user3.jpg', 3),
('fer_rv', 'Fernanda', 'Pereira', 'root', '10997721H', 'fernanda_pereira@yahoo.es', 'España', 'Femenino', 665229012, '1998-03-12', 'user2.jpg', 2),
('Graham', 'Benjamin', 'Graham', 'root', '74995099B', 'graham16@gmail.com', 'Suiza', 'Masculino', 666522181, '1998-03-12', 'user3.jpg', 2),
('jmartinez', 'Jose', 'Martinez', 'root', '28000300P', 'jmartinez@gmail.com', 'Francia', 'Masculino', 664923810, '1996-03-12', 'iconUser.jpg', 2),
('lucia_atm', 'Lucia', 'Puga', 'root', '35340416L', 'luciatm@gmail.com', 'España', 'Femenino', 655399823, '1994-12-20', 'banner2.jpg', 2),
('mdolores', 'Maria Dolores', 'Lopez', 'root', '89925329', 'mdolores@gmail.com', 'España', 'femenino', 672199222, '1993-12-11', 'user2.jpg', 2),
('mvarela', 'Manuel', 'Varela', 'root', '96413471R', 'mvarela@gmail.com', 'España', 'masculino', 773452198, '1988-12-12', 'iconUser.jpg', 2),
('root', 'Javier', 'Alonso', 'root', '45159031A', 'paco150997@hotmail.com', 'España', 'masculino', 673322161, '1998-12-12', 'iconUser.jpg', 2),
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
('carlosm', 3),
('fer_rv', 2),
('jmartinez', 6),
('mdolores', 4),
('mvarela', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `championship`
--
ALTER TABLE `championship`
  ADD PRIMARY KEY (`id_campeonato`),
  ADD KEY `id_normativa` (`id_normativa`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `championship_couple`
--
ALTER TABLE `championship_couple`
  ADD PRIMARY KEY (`id_pareja`,`id_campeonato`),
  ADD KEY `id_campeonato` (`id_campeonato`);

--
-- Indices de la tabla `clash`
--
ALTER TABLE `clash`
  ADD PRIMARY KEY (`id_enfrentamiento`),
  ADD KEY `id_pareja1` (`id_pareja1`),
  ADD KEY `id_pareja2` (`id_pareja2`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `couple`
--
ALTER TABLE `couple`
  ADD PRIMARY KEY (`id_pareja`),
  ADD KEY `login1` (`login1`),
  ADD KEY `login2` (`login2`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_grupo` (`id_grupo`);

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
-- Indices de la tabla `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `login` (`login`);

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
-- AUTO_INCREMENT de la tabla `championship`
--
ALTER TABLE `championship`
  MODIFY `id_campeonato` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clash`
--
ALTER TABLE `clash`
  MODIFY `id_enfrentamiento` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `couple`
--
ALTER TABLE `couple`
  MODIFY `id_pareja` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
  MODIFY `id_partido` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `gender`
--
ALTER TABLE `gender`
  MODIFY `id_categoria` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT de la tabla `payment`
--
ALTER TABLE `payment`
  MODIFY `id_pago` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reserva` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `championship_ibfk_1` FOREIGN KEY (`id_normativa`) REFERENCES `rule` (`id_normativa`) ON DELETE CASCADE,
  ADD CONSTRAINT `championship_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `championship_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `gender` (`id_categoria`) ON DELETE CASCADE;

--
-- Filtros para la tabla `championship_couple`
--
ALTER TABLE `championship_couple`
  ADD CONSTRAINT `championship_couple_ibfk_1` FOREIGN KEY (`id_pareja`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `championship_couple_ibfk_2` FOREIGN KEY (`id_campeonato`) REFERENCES `championship` (`id_campeonato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clash`
--
ALTER TABLE `clash`
  ADD CONSTRAINT `clash_ibfk_1` FOREIGN KEY (`id_pareja1`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `clash_ibfk_2` FOREIGN KEY (`id_pareja2`) REFERENCES `couple` (`id_pareja`) ON DELETE CASCADE,
  ADD CONSTRAINT `clash_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE,
  ADD CONSTRAINT `clash_ibfk_4` FOREIGN KEY (`id_categoria`) REFERENCES `gender` (`id_categoria`) ON DELETE CASCADE;

--
-- Filtros para la tabla `couple`
--
ALTER TABLE `couple`
  ADD CONSTRAINT `couple_ibfk_1` FOREIGN KEY (`login1`) REFERENCES `user` (`login`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_ibfk_2` FOREIGN KEY (`login2`) REFERENCES `user` (`login`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `gender` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `couple_ibfk_4` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `court` (`id_pista`) ON DELETE CASCADE;

--
-- Filtros para la tabla `new`
--
ALTER TABLE `new`
  ADD CONSTRAINT `new_ibfk_1` FOREIGN KEY (`login`) REFERENCES `user` (`login`) ON DELETE CASCADE;

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
