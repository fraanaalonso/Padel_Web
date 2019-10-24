-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2019 a las 00:19:59
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';


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
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` tinyint NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


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
  `rol_id` tinyint COLLATE utf8_spanish_ci NOT NULL,
   PRIMARY KEY (`login`),
   UNIQUE KEY `email` (`email`),
   UNIQUE KEY `dni` (`dni`),
   FOREIGN KEY (`rol_id`) REFERENCES ROL(`id_rol`) ON DELETE CASCADE
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
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,

  PRIMARY KEY (`id_pista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `id_partido` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `hora_fin` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_partido`),
  FOREIGN KEY (`id_pista`) REFERENCES COURT(`id_pista`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE `reservation` (
  `id_reserva` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_pista` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_reserva`, `id_pista`,`login`),
  FOREIGN KEY (`id_pista`) REFERENCES COURT(`id_pista`) ON DELETE CASCADE,
  FOREIGN KEY (`login`) REFERENCES USER(`login`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;





--
-- Estructura de tabla para la tabla `user_game`
--

CREATE TABLE `user_game` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_partido` tinyint NOT NULL,

  PRIMARY KEY (`login`,`id_partido`),
  FOREIGN KEY (`login`) REFERENCES  USER(`login`) ON DELETE CASCADE,
  FOREIGN KEY (`id_partido`) REFERENCES game(`id_partido`) ON DELETE CASCADE


)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;






--
-- Estructura de tabla para la tabla `rule`
--

CREATE TABLE `rule` (
  `id_normativa` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `bases`  mediumtext COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_normativa`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `grupo` enum('principiante','intermedio','avanzado') COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_grupo`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Estructura de tabla para la tabla `gender`
--

CREATE TABLE `gender` (
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
  `id_normativa` tinyint  NOT NULL,
  `id_grupo` tinyint  NOT NULL,
  `id_categoria` tinyint  NOT NULL,
  

   PRIMARY KEY (`id_campeonato`),
   FOREIGN KEY (`id_normativa`) REFERENCES RULE(`id_normativa`) ON DELETE CASCADE,
   FOREIGN KEY (`id_grupo`) REFERENCES grupo(`id_grupo`) ON DELETE CASCADE,
   FOREIGN KEY (`id_categoria`) REFERENCES gender(`id_categoria`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;






--
-- Estructura de tabla para la tabla `couple`
--


CREATE TABLE `couple` (
  `id_pareja` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `id_categoria` tinyint  NOT NULL,
  `id_grupo` tinyint  NOT NULL,
  `login1` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `login2` varchar(20) COLLATE utf8_spanish_ci NOT NULL,

  PRIMARY KEY (`id_pareja`),
  FOREIGN KEY (`login1`) REFERENCES USER(`login`) on DELETE CASCADE,
  FOREIGN KEY (`login2`) REFERENCES USER(`login`) on DELETE CASCADE,
  FOREIGN KEY (`id_categoria`) REFERENCES gender(`id_categoria`) on DELETE CASCADE,
  FOREIGN KEY (`id_grupo`) REFERENCES grupo(`id_grupo`) on DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


--
-- Estructura de tabla para la tabla `championship-couple`
--

CREATE TABLE `championship_couple` (
  `id_pareja` tinyint  NOT NULL,
  `id_campeonato` tinyint  NOT NULL,

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
  `id_grupo` tinyint  NOT NULL,
  `id_categoria`tinyint  NOT NULL,
  `hora_inicio` varchar(8) COLLATE utf8_spanish_ci NOT NULL,


  PRIMARY KEY (`id_enfrentamiento`),
  FOREIGN KEY (`id_pareja1`) REFERENCES COUPLE(`id_pareja`) on DELETE CASCADE,
  FOREIGN KEY (`id_pareja2`) REFERENCES COUPLE(`id_pareja`) on DELETE CASCADE,
  FOREIGN KEY (`id_grupo`) REFERENCES grupo(`id_grupo`) on DELETE CASCADE,
  FOREIGN KEY (`id_categoria`) REFERENCES gender(`id_categoria`) on DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;




--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE `payment` (
  `id_pago` tinyint COLLATE utf8_spanish_ci NOT NULL AUTO_INCREMENT,
  `concepto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,


  PRIMARY KEY (`id_pago`),
  FOREIGN KEY (`login`) REFERENCES USER(`login`) on DELETE CASCADE


) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



--
-- Volcado de datos para la tabla `rol`
--


INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'deportista'),
(3, 'entrenador'),
(4, 'usuario');

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`login`, `nombre`, `apellido`, `password`, `dni`, `email`, `pais`, `sexo`, `telefono`, `fecha`, `rol_id`) VALUES
('admin', 'Francisco', 'Alonso', 'admin', '46110791T', 'flalonso17@esei.uvigo.es', 'Alemania', 'Hombre', 666133017, '1997-09-15', 1),
('anita32', 'Ana', 'Fernandez', 'root', '44294260D', 'anafer_32@outlook.com', 'España', 'Femenino', 733861201, '12-08-1995', 2),
('antia12', 'Antia', 'Vazquez', 'root', '05561102R', 'antiavazquez@hotmail.com', 'España', 'Femenino', 698224591, '12/07/1992', 2),
('antonio_v', 'Antonio', 'Velazquez', 'root', '22751863X', 'antonio_v@outlook.com', 'España', 'Masculino', 754291002, '12-08-1995', 2),
('carlosm', 'Carlos', 'Alonso', 'root', '30584021R', 'carlosm@gmail.com', 'Portugal', 'Masculino', 773299121, '12/08/1995', 2),
('csmartinez', 'Carlos Enrique', 'Somoza', 'csmartinez', '00289370F', 'csmartinez@gmail.com', 'Grecia', 'masculino', 672341220, '15-10-1994', 4),
('delinha', 'Miguel', 'Atrio', 'delinha', '24156629M', 'mdatrio@gmail.com', 'Suiza', 'Hombre', 658932456, '1997-03-12', 3),
('fer_rv', 'Fernanda', 'Pereira', 'root', '10997721H', 'fernanda_pereira@yahoo.es', 'España', 'Femenino', 665229012, '16/01/1998', 2),
('Graham', 'Benjamin', 'Graham', 'root', '74995099B', 'graham16@gmail.com', 'Suiza', 'Masculino', 666522181, '12/03/2001', 2),
('jmartinez', 'Jose', 'Martinez', 'root', '28000300P', 'jmartinez@gmail.com', 'Francia', 'Masculino', 664923810, '1996-03-12', 2),
('lucia_atm', 'Lucia', 'Puga', 'root', '35340416L', 'luciatm@gmail.com', 'España', 'Femenino', 655399823, '12-08-1991', 2),
('mdolores', 'Maria Dolores', 'Lopez', 'root', '89925329', 'mdolores@gmail.com', 'España', 'femenino', 672199222, '12-10-1992', 2),
('mvarela', 'Manuel', 'Varela', 'root', '96413471R', 'mvarela@gmail.com', 'España', 'masculino', 773452198, '21-12-1996', 2),
('root', 'Javier', 'Alonso', 'root', '45159031A', 'paco150997@hotmail.com', 'España', 'masculino', 673322161, '15-09-1997', 1),
('sormaria', 'Maria', 'de la Concepcion', 'root', '78836661K', 'maria_barral@gmail.com', 'España', 'Femenino', 666723402, '12/03/1970', 2);



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
(8, 'Mañá é nadal', 'ffffffff', 'En Ourense cidade te', 'admin');




--
-- Volcado de datos para la tabla `court`
--

INSERT INTO `court` (`id_pista`,`descripcion`, `ubicacion`, `precio`, `estado`) VALUES
('P1','Cubierta y cristaleras de 50 metros', 'Ala Norte', 5.5 , 1),
('P2', 'Descubierta y reglamentaria', 'Ala Sur', 5.5 , 1),
('P3', 'Hierba natural', 'Ala Norte', 5.5, 1),
('P4', 'Hierba artificial', 'Ala Oeste', 5.5, 2),
('P5', 'Ancho y largo reglamentario. Bancos exteriores para descanso de los jugadores', 'Ala Este', 5.5, 2),
('P6', 'Otra descripcion', 'Ala Oeste', 5.5, 1),
('P7', 'Con vistas a la ciudad', 'Ala Norte',5.5, 1),
('P8', 'Escasez de arena', 'Ala Sur', 5.5, 2);




--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`id_partido`, `id_pista`, `hora_inicio`, `hora_fin`, `fecha`) VALUES
(1, 'P1', '17:50','18:50', '17-12-2019'),
(2, 'P2', '18:50', '20:10', '18-12-2019'),
(3, 'P3', '14:10', '15:30', '14-12-2019'),
(4, 'P4', '15:30', '16:30', '19-12-2019'),
(5, 'P3', '09:45', '10:50', '17-12-2019'),
(6, 'P6', '19:25', '20:25', '11-12-2019'),
(7, 'P7', '12:35','13:35', '10-12-2019'),
(8, 'P1', '11:30', '12:35', '13-12-2019');



 
 --
-- Volcado de datos para la tabla `user_game`
--

/*

INSERT INTO `user_game` (`login`, `id_partido`) VALUES
('fer_rv', 1),
('csmartinez', 2),
('antiavazquez', 3),
('anita32', 4),
('sominho', 5),
('somo', 6);

*/



--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id_reserva`, `id_pista`, `login`,`hora_inicio`, `fecha`) VALUES
(1, 'P1', 'root', '19:00',  '17-12-2019'),
(2, 'P2', 'somo', '10:00', '18-12-2019'),
(3, 'P3', 'sominho' , '09:00', '14-12-2019'),
(4, 'P4', 'sormaria','11:00', '19-12-2019'),
(5, 'P3', 'delinha', '15:00', '17-12-2019'),
(6, 'P6', 'antonio_v','09:30', '11-12-2019'),
(7, 'P7', 'anafer_32','17:10', '10-12-2019'),
(8, 'P1', 'antia12','09:55', '13-12-2019');

 --
-- Volcado de datos para la tabla `rule`
--

INSERT INTO `rule` (`id_normativa`, `bases`) VALUES
(1, 'Mayores de 18 años, masculino y nivel avanzado'),
(2, 'Entre 12 y 15 años, mixto y principiante'),
(3, 'Entre 16 y 18 años, femenino y nievel intermedio'),
(4, 'Mayores de 55 años, femenino y nivel principiante');




 --
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `grupo`) VALUES
(1, 'principiante'),
(2, 'intermedio'),
(3, 'avanzado');





 --
-- Volcado de datos para la tabla `gender`
--

INSERT INTO `gender` (`id_categoria`, `categoria`) VALUES
(1, 'masculino'),
(2, 'femenino'),
(3, 'mixto');





--
-- Volcado de datos para la tabla `championship`
--

INSERT INTO `championship` (`id_campeonato`, `fecha_inicio`, `fecha_limite`, `id_grupo`,`id_categoria`, `id_normativa`) VALUES
(1, '17-12-2019', '15-12-2019', 1,1, 2),
(2, '21-12-2019', '18-12-2019', 3,3, 1),
(3, '11-11-2019', '09-11-2019', 2,3, 4),
(4, '22-12-2019', '20-12-2019', 2,2, 3),
(5, '13-01-2020', '10-01-2020', 2,2, 3),
(6, '13-02-2020', '10-02-2020', 1,2, 1),
(7, '15-03-2020', '13-03-2020',1,2, 1),
(8, '20-04-2020', '17-04-2020', 1,3, 3);




--
-- Volcado de datos para la tabla `couple`
--

INSERT INTO `couple` (`id_pareja`, `id_categoria`, `id_grupo`, `login1`, `login2`) VALUES
(1, 1,1, 'root', 'admin'),
(2, 1,1, 'anita32', 'antia12'),
(3, 1,1, 'antonio_v', 'antiavazquez'),
(4,1,1, 'mvarela', 'carlosm'),
(5, 1,1, 'lucia_atm', 'csmartinez'),
(6, 1,1, 'sormaria', 'Graham'),
(7,1,1, 'fer_rv', 'delinha'),
(8, 1,1, 'mdolores', 'jmartinez'),
(9, 1,1, 'mdolores', 'root'),
(10, 1,1, 'antiavazquez', 'delinha'),
(11, 1,1, 'anita32', 'mvarela'),
(12, 1,1, 'admin', 'sormaria'),
(13, 1,1, 'fer_rv', 'lucia_atm'),
(14,1,1,'jmartinez','csmartinez'),
(15,1,1,'mvarela','carlosm'),
(16,1,1,'root','admin');


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

INSERT INTO `clash` (`id_enfrentamiento`,`id_campeonato`, `id_pareja1`, `id_pareja2`, `numSetsPareja1`,`numSetsPareja2`, `id_grupo`,`id_categoria`, `hora_inicio`) VALUES
(1, 1, 1, 2, 2, 1, 1, 1, '18:50'),
(2, 1, 3, 4, 2, 1, 1, 1, '18:50'),
(3, 1, 5, 6, 2, 1, 1, 1, '18:50'),
(4, 1, 7, 8, 2, 1, 1, 1, '18:50'),
(5, 1, 9, 10, 2, 1, 1, 1, '18:50'),
(6, 1, 11, 12, 2, 1, 1, 1, '18:50'),
(7, 1, 13, 14, 2, 1, 1, 1, '18:50'),
(8, 1, 15, 16, 2, 1, 1, 1, '18:50');















