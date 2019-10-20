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
-- Estructura de tabla para la tabla `court`
--

CREATE TABLE `court` (
  `id_pista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_pista` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `terreno` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new`
--

CREATE TABLE `new` (
  `id_noticia` tinyint(4) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`, `login`) VALUES
(1, 'As Cousas de Ramón Lamote', 'Denantes mortas que escravas', 'A pradeira ruxía verde e leda', 'sominho'),
(2, 'Dooousss', 'Mañá é nadal', 'Veñen os reises e papá noel', 'En Ourense cidade te');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule`
--

CREATE TABLE `schedule` (
  `id_pista` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_horario` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fin` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `rol_id` enum('administrador','deportista','entrenador','usuario') COLLATE utf8_spanish_ci NOT NULL
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `court`
--
ALTER TABLE `court`
  ADD PRIMARY KEY (`id_pista`);

--
-- Indices de la tabla `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_pista`,`id_horario`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `new`
--
ALTER TABLE `new`
  MODIFY `id_noticia` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `court` (`id_pista`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
