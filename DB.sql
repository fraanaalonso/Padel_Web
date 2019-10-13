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

CREATE TABLE `new` (
  `id_noticia` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cuerpo` text COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`, `login`) VALUES
('Codigo1', 'As Cousas de Ramón Lamote', 'Denantes mortas que escravas', 'A pradeira ruxía verde e leda', 'sominho'),
('Codigo2', 'Dooousss', 'Mañá é nadal', 'Veñen os reises e papá noel', 'En Ourense cidade te');

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
  `fecha` date NOT NULL,
  `foto` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`login`, `nombre`, `apellido`, `password`, `dni`, `email`, `pais`, `sexo`, `telefono`, `fecha`, `foto`) VALUES
('admin', 'DELINHA', 'maister', 'admin', '456789', 'mkmkjn@nnnjn.com', 'España', 'Hombre', 567890, '2019-10-16', ''),
('alonso', 'Franco', 'root', 'root', '345678', 'gbyhjuiko@gbhjnik.com', 'yguhui', 'ijoijoijoi', 56789, '0000-00-00', ''),
('root', 'root', 'root', 'root', '567890', 'fghjk@yhujkl.com', 'España', 'Hombre', 456789, '2019-10-17', 0x75736572332e6a7067);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
