-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2019 a las 18:04:41
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

DROP DATABASE IF EXISTS `abp46`;
CREATE DATABASE `abp46` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

USE `abp46`;

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
('P0', 'Cubierta y cristaleras de 50 metros', 'Ala Norte', '5.5', 1),
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
  `cuerpo` mediumtext COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `new`
--

INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`) VALUES
(2, 'Poseidon', 'bbbbbbb', 'Lorem ipsum dolor sit amet consectetur adipiscing elit magna ultricies tristique, condimentum consequat scelerisque platea metus euismod quam orci mollis, porta mauris facilisis leo ridiculus pretium eget nulla duis. Quam pellentesque taciti dictum nullam fringilla risus nisi, tortor montes sodales non tristique commodo ac dapibus, fusce vulputate sapien elementum urna venenatis. Urna blandit pulvinar fringilla class phasellus velit fusce, nibh at euismod nam tristique ultrices sem molestie, ante vivamus congue massa etiam sociis.\r\n\r\nParturient eget imperdiet purus potenti pretium tellus porttitor penatibus nibh in mattis eleifend, taciti platea aliquet fames lacinia est aptent scelerisque urna conubia habitasse. A fringilla ligula egestas posuere sodales porttitor quisque dictumst tincidunt, inceptos malesuada curabitur praesent viverra vivamus ut purus libero, conubia lectus erat magnis phasellus morbi dui nostra. Dapibus pretium tortor inceptos taciti a aenean congue vestibulum duis blandit, elementum penatibus vel accumsan est mattis sociis mi pellentesque, parturient bibendum posuere conubia sapien porta imperdiet fermentum vulputate.\r\n\r\nEst fames sodales vehicula faucibus nibh velit, nec ligula rutrum eros malesuada, inceptos praesent diam odio vivamus. Fames ornare mollis torquent primis aliquet ut cum, sodales hendrerit leo felis orci facilisis a enim, ac turpis purus curae rutrum varius. Senectus placerat tempor mi odio iaculis porttitor etiam pulvinar mattis elementum faucibus, eget luctus libero curabitur maecenas facilisi eleifend tempus pellentesque class cursus fusce, nostra non leo diam vivamus facilisis rhoncus ridiculus himenaeos aptent.\r\n\r\nNam convallis penatibus magna quisque tristique torquent id fames, natoque potenti pulvinar curae etiam lacus conubia praesent, ac primis lectus sociosqu facilisis pretium mollis. Quam elementum vitae habitasse eget tempus taciti aliquam quisque dictum, sapien molestie auctor etiam proin natoque massa mi, laoreet quis semper ornare dictumst malesuada lectus eros. Quam at sagittis euismod odio feugiat habitasse nisl hendrerit convallis, elementum luctus lacus urna leo duis a platea egestas hac, sociis nibh natoque magnis cubilia conubia accumsan per.\r\n\r\nClass conubia proin metus in tincidunt vestibulum aptent porttitor maecenas etiam, dapibus nisl habitant faucibus dui mi eu suspendisse ultrices, consequat aenean inceptos condimentum lacinia neque auctor natoque accumsan. Volutpat libero vel iaculis blandit lacinia gravida litora posuere molestie cum mi, faucibus nam turpis netus magna facilisi fusce interdum vitae torquent, ad nascetur dapibus sociis aliquam cursus pellentesque hendrerit quis duis. Rutrum cubilia in habitant tempus ac vestibulum commodo velit facilisis, massa vitae vivamus libero mus nec nam turpis, nisl imperdiet penatibus molestie non dignissim venenatis class.\r\n\r\nNetus purus est aenean pulvinar fermentum torquent vehicula montes sem, vel arcu mus ullamcorper erat non sociis ac, at sociosqu aliquet nunc fringilla magnis molestie dignissim. Nulla dis tincidunt vel nibh placerat eleifend libero ultrices vulputate hendrerit massa ullamcorper sollicitudin, dictum odio elementum id potenti quis pretium faucibus sem praesent aenean porta. Libero volutpat eleifend placerat rhoncus gravida ut leo nulla, neque curabitur sodales vitae dui laoreet torquent, potenti pellentesque odio id eros orci sed. Rutrum phasellus dis in ultrices mauris mus mattis urna tempus laoreet, tellus class per placerat facilisis magna torquent suscipit ante consequat convallis, enim quis montes praesent eu magnis habitasse at nullam. Convallis laoreet dictum fermentum litora euismod parturient volutpat aliquam sem justo natoque, curabitur condimentum sodales congue blandit morbi ridiculus mi quis.\r\n\r\nProin sollicitudin augue ad est mattis etiam tristique vestibulum quisque ornare suspendisse sociosqu, dis cras quam mollis luctus morbi aenean vehicula consequat cum venenatis, aliquam imperdiet diam erat mus netus id tortor viverra aptent integer. Mauris blandit nam arcu viverra odio nisi pharetra proin metus venenatis quam tristique eros, iaculis nibh facilisis lacinia eget condimentum torquent mus rutrum phasellus convallis. Ultrices pharetra mi rutrum proin dapibus sociosqu tempus tristique, augue natoque fringilla donec quis placerat id curae, ultricies sodales ut et risus aliquet eu. Accumsan suspendisse laoreet nulla torquent dictumst a sociis curae, dignissim pretium dui augue facilisi varius vitae ultrices, dapibus dictum quisque maecenas cras ac magnis.\r\n\r\nFusce nunc sem rutrum hendrerit faucibus tellus nullam congue porta auctor vitae, id lectus dapibus habitasse nascetur morbi felis odio nibh mattis vestibulum porttitor, cras mi et dui nostra lacinia ullamcorper integer habitant curae. Sapien accumsan in dictumst risus quam sociosqu maecenas egestas tortor, fringilla mollis dui augue molestie condimentum litora. Laoreet nam ut nulla tempor semper gravida et aptent suscipit tincidunt, fusce rutrum a curabitur nec habitant netus facilisis in auctor, nascetur sociosqu euismod eros orci congue integer blandit sodales. Porta euismod pharetra sollicitudin dictum habitant felis at mollis ridiculus orci aenean proin torquent, magnis a nibh per eget consequat mus tortor sociosqu mi natoque.\r\n\r\nNascetur integer consequat sociis semper mattis scelerisque luctus vivamus cursus vulputate eget, sagittis ullamcorper sodales at gravida taciti natoque lacus cras pellentesque, cum volutpat porta phasellus pulvinar feugiat fermentum torquent platea magnis. Elementum aliquam eros viverra neque aptent, quis felis dignissim feugiat, euismod a inceptos pharetra. Nibh curae parturient duis potenti sapien lacus phasellus et, ornare cum sem pulvinar fames massa est, id molestie porttitor praesent faucibus auctor libero. Tempor netus aptent convallis est eleifend sed maecenas, lobortis nostra fusce id congue placerat. Lacinia tincidunt vestibulum primis rhoncus volutpat accumsan fames ligula velit in ullamcorper dictumst, nam facilisi diam turpis gravida laoreet quis et fringilla ut.\r\n\r\nAt iaculis netus suspendisse praesent, non parturient tincidunt inceptos, nibh sodales bibendum. Curabitur at iaculis purus nulla penatibus sollicitudin sed integer, curae scelerisque eros phasellus torquent tortor. Porta magnis vitae dis per dictumst metus sapien massa, commodo morbi penatibus habitasse suscipit nulla facilisi hac est, non aliquet montes eros proin integer quam. Accumsan diam cursus platea aenean lectus blandit in nostra facilisi vivamus pellentesque ullamcorper, vehicula ornare nisi magna vestibulum torquent dis hac curabitur rutrum.\r\n\r\nCum augue tempus a urna mus sodales nec, massa parturient neque eleifend nisl metus, vulputate sem dignissim molestie dapibus duis. Neque cum pretium vel cras urna libero torquent dictum tristique pharetra, felis malesuada primis vestibulum rhoncus aliquam posuere ullamcorper pellentesque, iaculis interdum mi aliquet quam vivamus phasellus nullam ligula. Vel nullam congue platea porttitor pulvinar augue, nisi lectus cum a pharetra primis libero, euismod sapien nascetur convallis ultrices.\r\n\r\nNon dictum auctor ac quisque varius hac vivamus mattis hendrerit, ultrices eleifend penatibus montes ridiculus inceptos nulla cubilia nisl eget, aliquet scelerisque luctus orci cursus a felis dui. Dapibus ut hendrerit potenti venenatis curabitur nisl conubia bibendum velit phasellus, ante purus et primis odio convallis elementum leo congue. Praesent cubilia vulputate metus pulvinar odio ligula integer, dictumst donec felis potenti vivamus id tristique, fusce vel dui facilisis in risus.\r\n\r\nMauris quis mattis proin quisque aliquam rutrum augue nisi potenti interdum eros nulla scelerisque sem cubilia erat, taciti curabitur senectus maecenas ornare vestibulum dui tortor euismod fusce varius auctor nisl ac. Aptent at aliquet ultricies penatibus diam molestie, mattis purus mauris donec erat, ad id platea rutrum conubia. Justo arcu netus tristique volutpat enim per diam purus aliquet cursus, nulla sed ultrices malesuada curabitur semper sociis porttitor senectus dis commodo, nisl facilisi gravida aptent proin fringilla euismod sodales posuere.\r\n\r\nLaoreet dui et odio ut est feugiat turpis arcu facilisi consequat integer, quis scelerisque lobortis netus ornare purus ultrices volutpat mollis dignissim tellus leo, suscipit litora fermentum elementum nec hendrerit platea senectus magna ad. Id bibendum sociosqu potenti posuere pharetra feugiat imperdiet, laoreet sociis enim cum sem risus, dui eleifend dignissim pulvinar vel tincidunt. Enim porta tristique nisi potenti aliquet curabitur ac lacus rhoncus, lectus aliquam magna senectus tempus penatibus auctor dignissim, quis imperdiet etiam vulputate leo montes viverra blandit at, dapibus facilisis massa gravida egestas sodales natoque.\r\n\r\nUltricies vestibulum nulla interdum netus feugiat tristique pulvinar gravida augue, nisi convallis taciti lectus dictumst platea erat metus magnis, at libero purus maecenas porta nullam pretium aenean. Platea ac leo neque porta consequat bibendum inceptos ultrices taciti pretium, arcu eros ornare hendrerit nascetur fames erat blandit placerat varius, a massa id lectus gravida suscipit montes feugiat facilisi. Aptent rhoncus ligula aliquet proin penatibus tristique scelerisque suscipit purus a volutpat himenaeos posuere porta suspendisse ornare potenti, morbi sociis nascetur taciti arcu varius nec in conubia sed class primis magnis pulvinar sem mattis.\r\n\r\nHendrerit nulla in pellentesque convallis cras tellus posuere magnis, accumsan quisque auctor erat velit tempor viverra non ultrices, facilisi quam sagittis platea volutpat porttitor lectus. Pharetra pellentesque parturient phasellus ornare vehicula mattis ut suscipit, egestas nullam cursus ultricies augue eros ullamcorper, curae sagittis fringilla tristique leo vel tortor. Lacinia himenaeos tempus taciti nascetur primis morbi senectus proin et neque cursus, magna etiam posuere laoreet curabitur magnis hac dui enim torquent tincidunt litora, orci molestie pharetra nullam hendrerit tortor sed duis sodales phasellus. Ut nam nulla habitant cubilia sed dignissim dis porttitor, natoque euismod est velit accumsan quam sem vivamus taciti, montes vulputate etiam nascetur rutrum fames pellentesque.\r\n\r\nPurus faucibus ante pretium fusce sodales commodo venenatis a laoreet, porta hendrerit dictum nibh penatibus odio nostra curae, malesuada nulla nisi suscipit per rhoncus nunc tempor. Morbi volutpat cubilia platea magnis netus nascetur semper quisque vehicula, imperdiet eget parturient aenean cursus malesuada duis aliquet vel, et justo ante torquent tristique phasellus diam potenti. Gravida tempus rhoncus nunc lacinia consequat odio, mi quis vel dui posuere, tellus porttitor tempor ante curabitur.\r\n\r\nSagittis odio id vitae sociosqu cras ornare mauris rutrum, per phasellus nunc gravida netus ut proin tempus donec, torquent arcu neque posuere ligula aliquam dignissim. Tincidunt phasellus pretium nibh in ultricies viverra lacinia dapibus eros integer, fusce mi scelerisque non curabitur nisl sed mus. Libero maecenas habitasse imperdiet vulputate justo sociosqu ultrices semper inceptos, magnis tincidunt metus commodo lectus diam dapibus facilisis, pretium himenaeos montes potenti egestas vestibulum primis purus. Tristique orci semper ridiculus tempor iaculis ante bibendum pulvinar morbi arcu, donec fermentum mauris turpis habitasse blandit magnis maecenas lacinia nulla, id vitae ad condimentum aptent metus euismod sem posuere.\r\n\r\nLectus magnis pulvinar viverra arcu quis ligula porttitor suspendisse purus, vel dictum hendrerit augue netus habitasse feugiat integer ridiculus, malesuada commodo quisque sociosqu convallis accumsan non ad. Lobortis nascetur ac sapien laoreet tempus porttitor, curae pharetra morbi iaculis luctus, convallis neque primis metus parturient. Urna quis viverra pharetra varius class nam metus blandit cum curae iaculis odio convallis diam auctor, mollis ornare mus malesuada sociosqu ante litora tortor eros sapien aliquam himenaeos maecenas ut.\r\n\r\nUllamcorper consequat conubia est at nec suscipit sodales eleifend ultricies magnis nostra, libero vehicula dapibus fusce habitasse torquent ultrices id quisque praesent. Neque ullamcorper tempus placerat fringilla etiam vitae fermentum eget dictum mus tristique, magnis euismod erat per lacinia faucibus pulvinar ut dui. Eget senectus phasellus varius vel lacus augue porttitor molestie per mollis, facilisis ad hendrerit cubilia maecenas nascetur non bibendum mattis vivamus, dignissim litora sapien faucibus rhoncus quam venenatis nulla parturient. Condimentum lobortis felis sollicitudin nunc mattis ridiculus magnis, suspendisse montes erat ultricies libero neque bibendum, nisl facilisis ultrices netus nibh placerat.\r\n\r\nRutrum enim eu arcu neque aenean turpis tellus vitae fames feugiat nascetur conubia venenatis, facilisis dictumst suspendisse platea at blandit suscipit porttitor laoreet lacinia in senectus. Nulla ultrices curae tristique proin volutpat imperdiet vestibulum lacus dapibus sodales tempor torquent nisi non, erat quam penatibus ad massa elementum dictumst iaculis fermentum inceptos himenaeos ultricies. Aptent dis leo nascetur cras placerat egestas imperdiet, lectus morbi libero ligula phasellus facilisi.\r\n\r\nCongue porta et pellentesque volutpat dignissim dictum ornare cum penatibus duis facilisi non morbi enim habitasse, tincidunt cras a platea convallis varius augue magnis sed mus lacinia torquent ridiculus. Semper nostra libero mauris ultricies ullamcorper eu praesent tellus integer sem, commodo gravida massa cursus magna primis sapien habitasse cras. Donec consequat vel laoreet lacinia molestie per conubia, vitae aptent maecenas euismod hendrerit sodales, pulvinar vivamus nam magnis ullamcorper neque. Cras phasellus euismod nulla id congue etiam condimentum, neque sociis morbi quam dis eleifend tempor, potenti tristique praesent vehicula convallis curabitur.\r\n\r\nVivamus eros in potenti himenaeos malesuada nascetur, parturient phasellus auctor nec magnis neque ultricies, at nibh eleifend varius quam. Proin eros fermentum hendrerit nec risus odio integer sociis nascetur, imperdiet ad porta ac molestie consequat porttitor taciti augue phasellus, velit felis vehicula netus viverra potenti aptent vel. Morbi bibendum ac cursus praesent himenaeos fames ante pretium cras nullam, feugiat dignissim dapibus fringilla a rutrum semper viverra integer netus id, leo penatibus aliquet consequat quisque volutpat in donec curae. Enim volutpat urna aliquam varius tortor elementum bibendum, nisi nunc consequat odio diam augue.\r\n\r\nSed aliquet per nunc faucibus facilisis sapien, pellentesque in mus magnis conubia, etiam lobortis et cum cras. Ac enim vel vivamus per est conubia vulputate magnis netus ad suscipit proin, nam luctus leo curabitur nulla metus orci lobortis taciti penatibus. Odio massa nulla aliquet turpis nibh pharetra, porttitor malesuada tortor eu in bibendum, tellus habitasse morbi vehicula purus. Fames mi quisque sociis pellentesque accumsan euismod tortor senectus cursus luctus, sed venenatis sapien mattis semper arcu tincidunt sodales odio.\r\n\r\nPretium natoque aliquam purus accumsan egestas mus, cras sed eleifend turpis class erat tristique, sociosqu donec taciti ornare dis. Augue dui venenatis semper tellus sed blandit faucibus bibendum fusce, parturient ac habitant ut torquent imperdiet cum facilisis class, ultricies quis himenaeos platea rutrum etiam ligula orci. Auctor in accumsan duis euismod augue viverra enim metus nostra fusce cum bibendum vitae hendrerit dictum a gravida, cubilia turpis pharetra est proin ac habitasse quisque congue ultrices senectus quis tristique arcu eu litora.\r\n\r\nPurus et phasellus aliquam orci augue arcu magnis in elementum conubia, porta dui montes torquent nunc feugiat class dapibus potenti fusce magna, velit ornare tempus nisi suspendisse himenaeos netus metus facilisis. Et porta mollis dui tortor placerat, per massa felis tincidunt habitasse integer, senectus nisl etiam lobortis. Lobortis integer justo morbi eget felis ultricies taciti aliquam pellentesque fusce donec mauris sociosqu cubilia, est vulputate tempus etiam maecenas torquent libero nostra phasellus quam rhoncus suspendisse. Sociosqu eget dis fames a mus per felis turpis condimentum, vel quisque pretium sem parturient diam urna suspendisse litora, platea elementum habitant mauris nulla in odio feugiat.\r\n\r\nId mi faucibus elementum nibh molestie blandit dignissim eget nisl cum eu ridiculus, vel habitasse inceptos etiam sociis per ut laoreet proin feugiat. Eget sollicitudin cras massa ut vivamus vulputate litora nisi dictum porta montes luctus convallis, facilisi mollis proin rutrum quisque ligula urna sed potenti sociis tempus. Accumsan aliquam erat interdum ante ornare sociosqu mi pellentesque est dui etiam phasellus pretium lacus, proin litora pharetra vehicula mauris netus fermentum posuere suspendisse at potenti augue. Tristique fusce fermentum mus tincidunt facilisis senectus, habitasse leo sociis sagittis at laoreet, orci iaculis ultricies luctus euismod.\r\n\r\nEget sollicitudin facilisis suscipit bibendum porttitor vulputate curae tortor maecenas, fusce ornare massa nibh taciti faucibus quis metus, est auctor dui eleifend venenatis viverra arcu per. Nunc etiam sed nulla imperdiet quis litora suscipit, per vehicula curae ligula dapibus inceptos, neque magnis nullam habitasse taciti dictum. Curabitur cubilia natoque duis est molestie tellus netus convallis per dignissim cursus augue suspendisse, pulvinar vestibulum leo eros tincidunt neque faucibus massa et dictumst tempus.\r\n\r\nAc maecenas molestie morbi porta nullam et senectus ad facilisi, diam magna interdum dignissim mus mollis tellus felis sollicitudin a, cubilia id parturient proin primis himenaeos varius enim. Eu congue imperdiet orci proin ridiculus tempus aptent nibh, risus mattis enim metus leo tristique laoreet elementum vestibulum, semper at natoque himenaeos praesent senectus habitant. Ac morbi etiam dictum nisi penatibus per varius, cras aptent sollicitudin lacus diam rhoncus ad, faucibus mollis metus dapibus primis taciti.\r\n\r\nLaoreet orci rutrum iaculis maecenas nisi eros hac elementum, ac vivamus inceptos fringilla fusce nascetur egestas, pretium dictumst litora cras leo vitae penatibus. Luctus habitant faucibus quam euismod primis egestas, etiam sociis massa quisque lobortis ad, mi placerat condimentum morbi nulla. Donec ante habitant tellus arcu libero at tempor, convallis lobortis ligula montes faucibus sollicitudin conubia quam, natoque est pretium feugiat inceptos dignissim.\r\n\r\nNisi vitae libero magna sed justo per habitant egestas aenean inceptos torquent iaculis ante netus, facilisi consequat montes ridiculus massa suspendisse dapibus phasellus tempus class tortor elementum. Ad parturient aliquam feugiat dictumst litora aliquet morbi condimentum ligula sed, fermentum inceptos montes nec eleifend sodales in neque hendrerit dictum, habitasse luctus pharetra pulvinar aenean maecenas nibh ante placerat. Egestas arcu vel nibh torquent laoreet faucibus parturient aenean taciti lobortis turpis nisl facilisis class fames venenatis, neque in eros a sociis ullamcorper tempor elementum praesent nunc primis gravida eu urna feugiat. Blandit rhoncus penatibus mollis nostra netus lacinia, pretium rutrum varius lobortis natoque tempus cras, vestibulum libero potenti phasellus tincidunt.\r\n\r\nTortor egestas dignissim dui phasellus vehicula maecenas feugiat mollis habitasse ridiculus, dictumst fames malesuada himenaeos rutrum a tincidunt facilisi leo iaculis, habitant nec posuere nullam fringilla ligula inceptos torquent non. Fusce mauris dapibus nisl vitae dignissim curabitur morbi, lacus eget consequat senectus eros tincidunt fringilla ultricies, imperdiet sapien pharetra tellus a turpis. Luctus aliquam etiam mi turpis primis cursus congue sem, duis ultricies neque tortor varius viverra nascetur phasellus, pellentesque vel diam inceptos lacinia vestibulum cubilia. Taciti convallis odio integer habitasse suspendisse curabitur placerat suscipit lacus, ac eu pellentesque nam tincidunt porta purus natoque magnis, vitae a nisl proin eleifend consequat neque quis.\r\n\r\nId sollicitudin accumsan litora at et ultrices, nostra fermentum imperdiet facilisi commodo. Etiam maecenas torquent pellentesque sociis nibh class quam pharetra lobortis cursus malesuada, conubia velit natoque nec sed taciti leo in sem pretium mi, lacinia proin et laoreet molestie tortor congue nascetur aliquam senectus. Ut nibh hac eleifend vel tortor odio suscipit interdum blandit, ultricies nascetur phasellus tristique facilisi parturient eu porta semper ridiculus, dui massa malesuada ante vehicula accumsan condimentum netus. Per tellus vestibulum lacus viverra ullamcorper nulla imperdiet luctus primis class quis porta, nibh massa tristique mattis nam mollis egestas molestie eu arcu rhoncus.\r\n\r\nUltricies sem sociis tortor dis egestas dictum diam aptent, aliquet urna convallis vitae cursus ligula est, metus hac dui vehicula ac taciti molestie. Sagittis sollicitudin praesent et taciti mi neque quisque faucibus morbi tellus condimentum luctus sodales, per facilisi risus natoque lectus orci tristique torquent justo duis aliquam eu. Nam sollicitudin porta facilisi in dis ultrices eu fringilla sem, consequat tellus porttitor integer magna vitae tincidunt sagittis libero, tortor luctus ante posuere mus himenaeos massa ut. Potenti hac ultrices aptent rutrum blandit lectus diam curabitur lacus scelerisque, vulputate inceptos tempus tincidunt posuere pellentesque gravida felis praesent, ornare sociosqu feugiat lacinia varius sociis ante a suspendisse.\r\n\r\nDui auctor sodales dignissim scelerisque praesent augue sollicitudin potenti semper vestibulum, ultricies habitant penatibus sociis mattis morbi per est vitae. Euismod ultricies pharetra fusce tempus nisl ad rhoncus phasellus odio, ultrices est hendrerit leo fermentum suscipit suspendisse vulputate scelerisque, morbi senectus facilisis curae enim posuere torquent elementum. Dignissim maecenas magna ut ad ac non tortor class venenatis taciti, morbi mattis vehicula eleifend aliquet phasellus enim auctor habitant, fames ullamcorper malesuada vulputate curae aptent pellentesque fusce nascetur. Nunc nisi litora fermentum non per donec ac mollis parturient, natoque facilisis elementum dapibus aliquam vivamus mattis pharetra ligula, habitasse aptent penatibus vehicula dignissim lacus rhoncus at.\r\n\r\nTurpis condimentum viverra litora parturient scelerisque suspendisse tristique tempus sem neque leo, dictum penatibus arcu rhoncus magnis sagittis phasellus tortor blandit diam a, nostra facilisi nunc tincidunt laoreet sodales consequat platea eleifend vitae. Commodo mauris pellentesque in senectus torquent penatibus sociosqu, eget libero sem praesent eros nisi, fringilla integer parturient varius ornare ante. Nisi fermentum sem cum rhoncus ante platea consequat magnis mauris convallis, vestibulum mus odio quisque rutrum netus maecenas vulputate vivamus commodo, fames neque penatibus molestie ridiculus ut habitant cubilia facilisi. Eros tristique aptent libero nisl feugiat lacus habitasse ut, auctor pretium augue sollicitudin montes litora nulla.\r\n\r\nPharetra aptent rutrum placerat luctus neque ullamcorper parturient sagittis donec, penatibus mi aliquet euismod suscipit varius lectus porta, et urna vestibulum libero netus mattis convallis metus. Elementum justo placerat sem augue fusce maecenas, litora nisi eleifend commodo ad risus, tempor at hac ullamcorper lectus. Volutpat ligula venenatis porta etiam nostra vestibulum nisl proin lacus neque netus, primis inceptos lectus habitant euismod eros vehicula metus at dictumst, in ad potenti risus litora taciti felis conubia nullam velit.\r\n\r\nUllamcorper senectus non tincidunt mattis accumsan volutpat, purus varius dapibus aptent ridiculus, nascetur neque nisl cras tempus. Ultrices est arcu consequat viverra velit eu facilisis orci fermentum a nostra, elementum ut vestibulum rhoncus magna habitant dapibus semper mollis lectus, eleifend senectus venenatis sodales nulla cubilia natoque metus blandit mauris. Dignissim placerat augue primis eros scelerisque enim montes nulla, erat et nullam dapibus euismod metus odio duis, aliquet ullamcorper morbi natoque ligula dictum viverra. Dis molestie tortor eleifend ornare in pulvinar venenatis, semper aliquet varius montes inceptos mattis nibh magna, potenti vehicula sociis interdum vestibulum non.\r\n\r\nNec malesuada volutpat eget cursus dignissim etiam, interdum mattis arcu a enim nunc class, libero magna mi dui vulputate. Platea mattis interdum tellus sociosqu ut ac integer sollicitudin senectus id eu phasellus porta vulputate enim est, quis conubia convallis ridiculus nascetur a tempor sed gravida torquent mollis odio fusce nec ante. Quam ac potenti luctus accumsan parturient sed vel blandit neque, erat placerat class feugiat vestibulum dui curabitur malesuada congue mauris, bibendum pellentesque aenean ridiculus suscipit magna felis inceptos.\r\n\r\nScelerisque mollis viverra vestibulum ante non euismod feugiat, volutpat quam praesent lacus pulvinar. Torquent porttitor neque quis molestie venenatis auctor ornare laoreet mattis, vivamus orci risus ultricies ultrices fringilla eu vulputate tristique nisl, volutpat lacinia enim a in accumsan viverra parturient. Mi posuere risus per cum nisl nulla cubilia aliquet, maecenas suspendisse orci sed vivamus tempus accumsan diam ornare, proin hendrerit conubia platea interdum tempor vitae.\r\n\r\nFacilisi hendrerit platea enim inceptos cubilia ornare per habitant dis iaculis fringilla curabitur fermentum class mus, vehicula tempus velit vestibulum dapibus litora consequat viverra tellus lacus integer primis tempor donec. Dapibus nibh platea blandit egestas vehicula vel, tincidunt maecenas quisque sodales lacus mauris penatibus, class luctus varius mus ut. Ac augue velit donec massa molestie congue orci feugiat, litora porta diam ridiculus quisque pulvinar per habitasse, sem nunc dictumst curabitur ultricies hac tortor.\r\n\r\nLuctus cubilia id habitant facilisis auctor pellentesque, porttitor hendrerit penatibus ultricies senectus rutrum in, ullamcorper sollicitudin nulla leo dictumst. Parturient nisi lacus dis nam sagittis vivamus vulputate justo mattis, ac ad arcu fringilla mus accumsan feugiat curae nunc placerat, taciti aenean quisque porttitor fusce magna litora sociosqu. Iaculis neque dapibus sodales congue penatibus natoque pharetra fusce curabitur quam curae cubilia, risus praesent eget tellus dis accumsan consequat pretium donec suspendisse.\r\n\r\nParturient taciti maecenas donec suscipit eros vulputate dictum tellus vivamus turpis, tempor cubilia curae fames orci tincidunt blandit fringilla lectus, volutpat in duis venenatis faucibus cras litora mattis ut. Iaculis commodo aptent tincidunt ut cursus scelerisque proin posuere rhoncus facilisis tristique porttitor interdum dictum volutpat, magna sagittis dignissim gravida id ornare nostra vitae quis nec aliquet phasellus congue. Blandit faucibus ornare at congue conubia euismod aliquam pellentesque sagittis suspendisse vulputate, in venenatis a tincidunt cubilia orci suscipit enim himenaeos convallis, sociis non egestas quisque interdum libero phasellus nascetur platea et.\r\n\r\nUltrices pellentesque quisque commodo cubilia nisl laoreet viverra dapibus ad tellus urna sed integer, tempus praesent eu quis sodales nostra tempor lobortis euismod et vulputate. Ligula fames sodales dictum et pharetra cursus imperdiet fusce aliquet libero primis tempor, montes interdum est sed gravida convallis penatibus parturient conubia sapien tempus. Facilisi penatibus venenatis leo nisl tempus torquent, turpis molestie scelerisque purus integer odio, cum montes suspendisse interdum accumsan. In faucibus vivamus mus ad senectus ornare ultrices nec consequat, convallis vestibulum torquent metus netus tincidunt etiam montes commodo venenatis, sem taciti cursus habitant dis viverra pulvinar penatibus.\r\n\r\nMalesuada senectus ornare proin sapien maecenas ridiculus vestibulum scelerisque vehicula montes sollicitudin, condimentum ullamcorper lectus mus eleifend purus nascetur pellentesque potenti aptent gravida parturient, nisl etiam cras in egestas tristique vulputate felis varius lacus. Platea aenean eros varius luctus cras placerat cursus senectus, iaculis condimentum sem massa congue morbi natoque, hac quis mus aptent mauris pulvinar suspendisse. Nec posuere risus quam luctus aliquam et dis ultrices rhoncus, dui nisl facilisi proin convallis diam tortor praesent, ad orci aliquet libero eu penatibus quisque natoque.\r\n\r\nVulputate natoque sociis iaculis nisl varius, curae fermentum class lacinia condimentum venenatis, etiam penatibus ante ligula. Porttitor quam vel at sagittis ad blandit nunc hac, varius etiam aptent interdum tristique consequat aliquet, sollicitudin cum auctor ante nascetur porta magnis. Cubilia faucibus taciti blandit erat elementum nulla cursus commodo, habitant aliquet velit odio eros mollis vulputate curae diam, litora nullam morbi viverra est quis neque. Massa mus taciti volutpat laoreet curabitur hac praesent consequat, egestas libero porttitor iaculis enim id tristique etiam cum, vestibulum quis hendrerit nibh eros pellentesque ultricies.\r\n\r\nMauris suspendisse aptent maecenas curabitur nec ultrices parturient sagittis quis, lobortis odio donec habitant nam cum posuere curae, eu metus nullam leo feugiat cras dapibus dictum. Pulvinar aenean turpis id cursus augue cubilia pellentesque posuere faucibus vehicula, elementum vestibulum semper malesuada imperdiet pretium et donec nunc non, nisl luctus risus aliquam pharetra lacinia condimentum fringilla penatibus. Potenti ullamcorper mauris felis suscipit feugiat sodales varius viverra dui nibh, egestas mi vulputate fermentum praesent platea sollicitudin nisi nascetur, bibendum pretium vestibulum maecenas mus ac vitae integer morbi.\r\n\r\nVenenatis feugiat justo aptent magna vulputate dictum imperdiet aliquam ridiculus mus, cursus massa varius porta eget eu metus himenaeos facilisis, senectus vestibulum vel vitae torquent dui augue montes curae. Integer purus primis cubilia penatibus lobortis nibh mi quam dapibus, augue nulla laoreet suscipit mollis mauris non ultrices, euismod vulputate facilisis magna blandit netus varius habitant. Donec morbi aliquam sociis in orci elementum enim non, varius mi turpis viverra vel molestie inceptos dictum metus, consequat nec maecenas risus dis penatibus dignissim.\r\n\r\nDonec malesuada diam ad mi neque mus quisque rhoncus, varius molestie commodo sollicitudin ornare scelerisque fringilla sed, id ligula vel integer facilisis justo quam. Penatibus at lacus cubilia rutrum tellus bibendum porta nunc tortor mauris, platea pellentesque arcu semper ante etiam tincidunt parturient mattis nam, viverra non purus porttitor ligula gravida nisi vel vehicula. Sem orci montes ullamcorper scelerisque habitant malesuada purus, felis pulvinar non suscipit nullam mus.\r\n\r\nNam non quisque laoreet mauris porta iaculis praesent taciti sed sociosqu, erat pellentesque augue fringilla euismod nisi urna id cras, per tincidunt nec metus sociis viverra leo dapibus potenti. Mi nascetur vivamus metus aliquam dictumst fringilla mattis senectus etiam, curae ut aenean laoreet congue vulputate lobortis rhoncus id, accumsan convallis malesuada natoque turpis maecenas sem hendrerit. Porta nulla torquent consequat molestie aliquet erat gravida condimentum vivamus, mattis nibh auctor bibendum hac et ultrices massa luctus, mollis donec hendrerit curabitur integer mus nisi platea. Sagittis litora class varius iaculis porttitor euismod natoque, quis suscipit id hendrerit dictumst eleifend scelerisque nisi, ut malesuada phasellus lobortis duis laoreet.\r\n\r\nMorbi quisque velit sollicitudin cursus netus tristique aenean vulputate, senectus sem elementum volutpat lectus fusce curae, fames mi interdum tempor orci curabitur ante. Tellus conubia arcu vitae sociosqu pulvinar sociis ridiculus luctus, mauris quam posuere hendrerit torquent class fermentum. A dis tempor fringilla vel sodales neque urna nulla natoque, metus in id donec tincidunt bibendum ridiculus dignissim morbi, massa montes per conubia nam lobortis curae aptent.\r\n\r\nEros aliquet curabitur massa justo vel porta fames vestibulum, facilisis mattis facilisi praesent torquent ridiculus ligula sociosqu netus, condimentum tortor scelerisque gravida iaculis dictum cursus. Magna porta tristique scelerisque ultrices platea tellus praesent magnis dignissim nunc quisque, cum vehicula mattis interdum semper dictumst vitae libero varius quis, morbi augue arcu suspendisse convallis sociis ligula nascetur iaculis aliquam. Donec class lacinia curabitur fames magnis fusce condimentum ornare, etiam malesuada at eget enim ultricies magna curae, faucibus auctor ridiculus nisi porttitor fermentum maecenas.\r\n\r\nSagittis eleifend donec hac urna fringilla aenean sem proin tempus lacus, luctus velit lectus facilisi tortor mi sociosqu cursus vitae vel natoque, conubia est fames eget taciti massa ultricies praesent elementum. Quam proin gravida tincidunt lectus lacinia fermentum natoque eros, penatibus curae diam congue sollicitudin sodales viverra erat porta, ante nibh rhoncus mattis vehicula scelerisque in. Interdum suspendisse nec nisi vehicula dignissim a penatibus cubilia facilisi aliquet quam tincidunt pellentesque eros mi sociosqu, augue risus nunc pretium praesent nulla sapien sollicitudin varius nisl molestie eget platea sodales magna.\r\n\r\nMontes inceptos nostra luctus venenatis consequat ac id commodo fringilla, sociosqu aptent ultrices neque netus interdum platea potenti, mi malesuada posuere accumsan semper facilisi litora cras. Lacus vel eu porta praesent senectus ut blandit curae mus, suscipit facilisi commodo sociis quis pharetra mattis parturient libero, metus sociosqu et imperdiet venenatis enim semper nascetur. Neque ridiculus cubilia sem facilisi rhoncus lectus molestie commodo, condimentum maecenas posuere interdum himenaeos habitant turpis. Nisl eu interdum posuere hendrerit ac bibendum facilisis natoque luctus maecenas ante, congue ad arcu netus vehicula tellus porttitor primis tempor ridiculus per nascetur, quis nisi dictum dictumst metus eros tincidunt potenti montes cursus.\r\n\r\nDis tempor himenaeos nulla congue rutrum arcu aptent mauris donec justo, nascetur neque pharetra elementum sem vel habitant cum eros. Tellus cras curae dictum ultrices a tristique pharetra facilisi hendrerit iaculis magna, euismod viverra urna proin non commodo platea pretium justo nisl. Hac nec risus diam erat sociis senectus fusce, nostra vitae nunc litora libero purus.\r\n\r\nConubia ac aliquet netus vel interdum, viverra elementum nec tempus. Rhoncus nulla rutrum magnis maecenas integer aliquam lectus nec malesuada, sem iaculis bibendum facilisis pellentesque tortor commodo nunc ad massa, habitant justo viverra augue dictum dapibus neque molestie. Sociosqu iaculis nisi purus habitant eros aliquam quisque nascetur, netus morbi viverra at hac vestibulum lacinia consequat curabitur, ante aenean tempus pulvinar arcu magna vitae. Risus dis congue malesuada suscipit semper aliquet sociosqu donec, primis platea facilisi massa sodales quisque interdum, non mollis litora montes mattis euismod blandit bibendum, eleifend fames urna nec accumsan rhoncus.\r\n\r\nNisi tincidunt leo nibh consequat maecenas facilisis, cum nunc parturient turpis sagittis tellus, imperdiet urna auctor fringilla mollis. Condimentum fringilla venenatis curae sociis vestibulum sapien euismod, est odio curabitur nisi lacus accumsan blandit iaculis, massa tincidunt lacinia mollis dui interdum. Erat magna sagittis fusce iaculis turpis ullamcorper, commodo dui blandit elementum porttitor pulvinar feugiat, pharetra eget lacinia taciti cum. Habitant fermentum maecenas posuere mattis cum condimentum inceptos in cras nam ut lectus, parturient tincidunt quisque nisi tristique pulvinar augue vulputate viverra blandit varius, lobortis lacus netus non aptent suspendisse molestie ante venenatis diam euismod.\r\n\r\nHac torquent pharetra lacinia urna hendrerit parturient dictumst ante a, venenatis integer sed odio leo aliquam class vivamus iaculis vestibulum, himenaeos ligula nisi convallis accumsan blandit malesuada sodales. Fusce felis pulvinar maecenas nascetur mattis quis nunc vitae, conubia velit lobortis fermentum nullam montes aenean senectus, magnis ante sociosqu quam diam sagittis pretium. Gravida elementum nostra auctor nibh molestie diam urna habitant enim, dictumst suscipit nulla quisque curae montes viverra pharetra inceptos, senectus libero fringilla ligula hac eros proin sapien.\r\n\r\nUltrices aptent cum aliquam orci primis justo diam, pulvinar tortor accumsan platea odio himenaeos donec ullamcorper, lobortis sociosqu et taciti id nostra. Fringilla quam semper tellus in sociis tristique vel natoque potenti, senectus mus hendrerit nam consequat risus nunc vestibulum, fusce est nisi sem arcu enim dignissim varius. Convallis montes dictumst fringilla odio lobortis primis commodo mattis cursus, faucibus nunc facilisis platea imperdiet auctor integer cubilia sem id, netus parturient sapien suscipit nisi penatibus fusce ornare.\r\n\r\nDis pellentesque eget phasellus velit facilisis suscipit sociis aliquet et cubilia ligula, malesuada massa eu non lacus scelerisque cum leo felis sem, primis sed porttitor ad id urna mi aptent maecenas tellus. Nibh proin diam penatibus maecenas suspendisse torquent quis pellentesque placerat, eleifend molestie risus condimentum curabitur nascetur porta rhoncus, facilisi a luctus donec porttitor nunc leo tempus. Id dui hendrerit habitant ultrices volutpat fusce quam, felis massa cubilia malesuada justo proin, curabitur sed sagittis pellentesque nisl magna. Mollis massa mus cras tempor nam scelerisque lobortis pretium nulla, nec aptent placerat gravida ac auctor urna curabitur, felis imperdiet ad per fames faucibus odio convallis.\r\n\r\nPretium id suspendisse nisl posuere litora curae fusce, iaculis aenean morbi per tincidunt risus aptent, nam augue dui eros convallis pharetra. Proin suspendisse cras interdum volutpat sociis fringilla hac cum, pulvinar aenean auctor elementum venenatis odio potenti, accumsan tortor vitae mauris magna senectus arcu. Euismod bibendum imperdiet leo scelerisque odio tortor enim habitant non quis ultricies diam cursus, molestie urna nascetur cras pharetra pulvinar nunc eleifend habitasse donec varius ornare. Ad viverra laoreet molestie ac pulvinar, fusce suspendisse enim cum proin id, arcu elementum habitant felis.\r\n\r\nEu congue fames mauris vel rutrum dictumst auctor non, parturient sociosqu tempus magna tempor quisque proin aenean, vehicula litora praesent ridiculus cubilia ad vitae. Malesuada est at sem platea quisque feugiat molestie tellus iaculis maecenas purus auctor viverra vehicula proin, conubia etiam duis venenatis vulputate cras facilisi ut nullam facilisis pretium augue lacus. Inceptos convallis dictumst porta molestie fringilla hac hendrerit pharetra sociis tortor gravida, suspendisse lacinia himenaeos vulputate nam fermentum feugiat commodo litora sodales, euismod aptent lobortis morbi mauris rutrum magna ultricies pretium nostra. Placerat curabitur pellentesque ornare quis urna aptent netus inceptos hac, blandit nascetur sodales eros dapibus orci lectus habitasse mollis, torquent dictum ullamcorper conubia phasellus potenti neque imperdiet, ultricies litora aliquet hendrerit gravida habitant platea semper.\r\n\r\nPharetra non libero himenaeos interdum velit ornare in magnis facilisi conubia arcu vel turpis, tincidunt vestibulum parturient fringilla habitant sodales phasellus montes mi ullamcorper nisi nec. Primis himenaeos cursus purus nascetur eleifend vel maecenas turpis habitasse interdum at augue porttitor suscipit, conubia taciti eget potenti nisi cras ut venenatis natoque justo aptent est imperdiet. Donec proin nam pretium quis orci nullam neque hendrerit cum, urna imperdiet varius etiam ultricies fusce eu penatibus, sociis hac elementum suscipit bibendum volutpat viverra ridiculus.\r\n\r\nPorttitor duis congue dictumst tincidunt sed conubia lacus netus arcu turpis, ante luctus leo hac rutrum blandit varius volutpat malesuada, facilisis diam commodo facilisi montes sagittis tempor ligula est. Arcu montes mauris mus a ultrices tristique vehicula at hendrerit, gravida euismod metus facilisis ad ligula etiam est augue inceptos, ornare venenatis eleifend cras vitae ultricies sociosqu condimentum. Himenaeos tortor ad sapien ligula dui eleifend metus pulvinar cubilia orci, eu senectus duis per quis at ultricies praesent lobortis habitant natoque, non sem vulputate elementum congue platea tempor suscipit ut.\r\n\r\nRisus congue vitae cras senectus gravida iaculis tincidunt conubia eu ligula eleifend, donec eros lectus suspendisse etiam tortor in auctor laoreet dignissim, bibendum ante condimentum vestibulum mus luctus volutpat at vel convallis. Lobortis viverra aliquet mus semper platea quisque conubia posuere dapibus est, maecenas placerat luctus sodales facilisi libero fusce proin taciti, mi id a duis lectus interdum aenean habitant hac. Non laoreet tempus felis mus viverra justo himenaeos, conubia interdum porttitor dignissim ultrices vestibulum velit inceptos, tempor suscipit nec pellentesque tristique dictum.\r\n\r\nNetus nam sollicitudin rhoncus curabitur litora hac convallis congue tellus, nostra donec pellentesque penatibus a cubilia aenean feugiat scelerisque nullam, primis id condimentum praesent nulla integer tristique ac. Est nec nisl aliquam litora ultrices tincidunt senectus ligula, conubia purus gravida felis nunc nullam magna montes cras, pretium habitant euismod leo suspendisse risus vivamus. Lacinia vestibulum vehicula blandit sociis mus vel posuere rutrum nisl, condimentum ligula auctor laoreet ad torquent scelerisque habitasse rhoncus, cursus urna dignissim at curabitur per fames bibendum.\r\n\r\nSapien leo nullam mattis aliquam porttitor aptent viverra inceptos, sociosqu felis ligula imperdiet habitasse placerat. Tempus convallis venenatis fusce vehicula inceptos, vivamus litora facilisi natoque magna, dignissim mi viverra lacinia. Est facilisi pellentesque magna dictumst vehicula lectus auctor sapien scelerisque posuere curae, odio rutrum felis gravida ridiculus eu neque mollis eros leo augue, facilisis imperdiet blandit ad semper pulvinar in pharetra sociis per.\r\n\r\nDiam tempus metus dis a facilisis sollicitudin vulputate, penatibus phasellus neque est class ad tortor, aliquet imperdiet faucibus sodales justo curabitur. Venenatis curae quis tempor proin rutrum maecenas eu curabitur tincidunt eleifend, enim cum imperdiet lacus penatibus praesent fusce condimentum auctor risus, id turpis vestibulum mi blandit dignissim elementum senectus fames. Penatibus urna ornare integer consequat nam lacus ad, nec platea fusce turpis convallis vulputate, ligula natoque eros varius semper ante. Dictum nunc nostra aenean pharetra lacus venenatis dignissim ultrices per justo tempor sed, suspendisse et non nec curae metus volutpat iaculis hac pellentesque.\r\n\r\nSenectus ante enim egestas ad fringilla tristique tortor semper suscipit rhoncus, augue libero ligula pulvinar leo gravida proin mauris convallis, habitasse metus nullam luctus primis auctor id blandit curae. Purus eu ad massa rutrum nullam velit ullamcorper netus dignissim, porta venenatis odio neque est commodo parturient semper mollis auctor, donec ac vitae viverra tellus euismod cum vivamus. Pulvinar euismod nec ultricies duis blandit pretium aliquam erat eros, tristique nisi urna purus luctus turpis litora facilisis, porta vel aliquet suspendisse hac class sapien laoreet. Posuere per urna senectus potenti feugiat aptent odio commodo dui dignissim, vivamus dictum consequat sociosqu massa varius fringilla blandit pellentesque, sollicitudin molestie maecenas montes phasellus ornare laoreet ridiculus tempus.\r\n\r\nAnte est rhoncus risus eleifend phasellus turpis commodo etiam neque dictumst, viverra augue nulla hac mollis nascetur mi ridiculus integer, duis semper vehicula purus ut libero sem magna felis. Dapibus congue imperdiet accumsan risus mi ornare hac a proin sociis eget, eros ligula mauris vulputate et magna eleifend pulvinar natoque. Mi lobortis enim nulla neque sed viverra felis fringilla est, urna eleifend metus platea conubia diam mus habitant nunc convallis, ad senectus montes dis ac velit varius vehicula.\r\n\r\nSuspendisse duis fermentum imperdiet conubia facilisis, varius suscipit rhoncus mus. Aliquet diam tellus aenean inceptos sed felis laoreet netus cras nullam potenti odio fames auctor vulputate, leo cum est vel nibh interdum faucibus aliquam mus sapien facilisis primis dapibus ac. Nascetur quis vitae quam sociis erat fermentum pulvinar ac turpis nostra, litora morbi risus taciti luctus cubilia ullamcorper semper. Sodales auctor iaculis vivamus tempor a platea volutpat potenti, sociosqu posuere tempus nibh sapien pretium condimentum dapibus malesuada, nostra quam erat curae quisque orci vulputate.\r\n\r\nEleifend laoreet litora bibendum malesuada sociis nullam vivamus morbi, lacus diam platea nulla volutpat sagittis maecenas, pellentesque quisque ad cubilia neque himenaeos est. Id condimentum consequat tincidunt cubilia ac erat taciti, nullam gravida pulvinar blandit aptent vulputate rutrum senectus, mattis varius sem vivamus ullamcorper dui. Pharetra eleifend mi bibendum diam tempor fames, venenatis risus eget tellus rutrum sodales, lobortis montes facilisi augue fringilla. Erat eu porttitor suspendisse potenti ad maecenas semper montes cum sollicitudin, mi venenatis imperdiet nisl taciti aenean turpis orci duis, senectus etiam vitae sociis felis habitasse netus ultrices tristique.\r\n\r\nMolestie suspendisse massa interdum volutpat class primis ut habitant maecenas rutrum torquent sodales, aptent laoreet ligula fusce nibh varius cum ridiculus pellentesque convallis. Ornare inceptos taciti diam natoque leo aliquam faucibus fames vivamus ante risus nascetur, sem id vel felis tempor parturient rhoncus placerat aliquet nulla semper, elementum mauris eros hac etiam nullam sodales consequat nunc eget curabitur. Senectus ultrices non nascetur bibendum hac nulla himenaeos placerat mauris leo lectus cubilia, dictum felis praesent sem ornare nunc phasellus neque per tempus nullam. Donec habitasse hac ante proin aliquet, quisque facilisis faucibus ad auctor mi, lacinia mus magnis commodo.\r\n\r\nNec enim proin fusce torquent nisi commodo, ac penatibus conubia cursus varius lobortis, ante quis quam suspendisse donec. Proin fringilla porttitor aliquam duis mollis laoreet eget hendrerit, dictum ultrices taciti donec iaculis curabitur morbi scelerisque ante, sagittis cras nascetur mus sed ullamcorper sollicitudin. Phasellus magnis eu enim erat leo scelerisque non natoque ridiculus fermentum ante, sodales convallis posuere venenatis rutrum nisi elementum taciti varius feugiat.\r\n\r\nLaoreet ridiculus vivamus lectus aptent quam volutpat, metus justo porta integer eleifend sollicitudin euismod, erat ullamcorper dignissim sed sociis. Arcu elementum tempus nibh suscipit tempor interdum posuere vehicula, tincidunt pretium placerat fermentum vulputate faucibus venenatis condimentum ultrices, dignissim morbi aliquet tellus conubia habitasse cum. Erat accumsan maecenas montes non nisi posuere fringilla cum, nibh sed sollicitudin libero class per interdum egestas, sodales metus et habitasse volutpat potenti suspendisse. Accumsan vivamus etiam condimentum a aliquet feugiat sed ornare malesuada, nostra dui nibh justo aenean lacus est pellentesque.\r\n\r\nDuis eu auctor facilisi nec erat, taciti sociosqu volutpat habitasse, ornare iaculis phasellus neque. Habitasse aliquet faucibus litora vehicula nostra a aptent, dictum massa congue risus donec magnis, nisi fringilla mauris iaculis velit ultricies. Fames nascetur ante nisi diam tellus phasellus lacus dictum id aliquet malesuada torquent, nam lectus ligula feugiat et himenaeos dictumst faucibus parturient cubilia.\r\n\r\nNatoque ultrices nascetur orci neque erat justo sed nec, phasellus elementum quam egestas etiam rhoncus facilisi, at netus class libero id conubia parturient. Maecenas volutpat arcu urna tempor lacinia sociis tortor placerat, et primis magnis sociosqu ut condimentum natoque lectus auctor, eros venenatis aliquam proin ac quam tristique. Malesuada quisque cursus netus donec convallis nisi sem mattis nascetur, rhoncus tortor metus ligula dictum fringilla a aliquam, integer sollicitudin vitae placerat blandit nullam volutpat purus.\r\n\r\nInteger etiam hendrerit ante pretium taciti, velit rutrum id molestie senectus natoque, tempus euismod eget malesuada. Id facilisi ultricies venenatis fermentum cras torquent mollis sagittis, conubia ullamcorper in velit eros nisi tempus volutpat, fringilla porta condimentum mi integer faucibus senectus. Metus aliquam magnis velit pellentesque aptent porttitor nisl ac mi, inceptos ultrices phasellus purus accumsan placerat vehicula natoque, lacinia cursus gravida porta iaculis augue condimentum at. Blandit massa malesuada nec tristique arcu litora cras a class, vehicula eleifend sodales urna conubia est quam feugiat tempus diam, et tortor aliquam erat lobortis duis ullamcorper velit.\r\n\r\nAt dapibus erat turpis ut scelerisque himenaeos vel, fames magna quam enim pulvinar cubilia, interdum ad duis ullamcorper vivamus hac. Nisl dictum eros facilisis consequat purus magna pulvinar proin sodales nullam, bibendum malesuada ultricies eleifend condimentum morbi habitasse tempus donec egestas, velit diam himenaeos turpis primis iaculis varius ligula nec. Potenti risus tortor lobortis egestas iaculis magnis himenaeos nisi non tempus, donec eros sodales cum lacus a fringilla quam torquent condimentum duis, montes convallis libero viverra aptent dui commodo lacinia hac. Tempor dapibus suscipit nascetur purus nisl nulla risus montes placerat sem leo, porta cum felis posuere consequat id auctor sociis sed mollis, donec sapien hendrerit euismod erat egestas accumsan curabitur ultricies faucibus.\r\n\r\nMorbi curabitur pulvinar eros auctor malesuada justo nisi fermentum senectus, convallis enim eget quisque scelerisque tempus praesent erat, lacus quis orci donec odio interdum penatibus ornare. Vivamus convallis laoreet dictumst a fusce himenaeos habitasse viverra vitae, volutpat habitant mus ultrices porta aptent ligula primis sodales metus, id tellus cras class nisi urna curabitur ante. Per orci urna metus tincidunt morbi iaculis ullamcorper, cursus magna tellus congue rhoncus magnis. Velit urna diam magnis augue mus potenti primis cursus, sociis hendrerit sollicitudin luctus rhoncus quam maecenas, condimentum lacinia accumsan pretium fringilla pellentesque turpis. Vulputate nullam sed laoreet molestie nascetur habitant sapien justo faucibus fusce, gravida parturient dis leo in semper nisi primis cursus sociosqu tellus, ligula neque rhoncus mauris luctus sagittis dui id aliquet.\r\n\r\nHendrerit sed aliquet risus habitasse phasellus placerat pulvinar neque nibh, feugiat gravida sapien vivamus ac volutpat interdum himenaeos libero montes, varius magnis donec in curabitur pellentesque augue imperdiet. Aliquam aliquet consequat proin per gravida potenti pharetra pretium litora parturient, sem vestibulum auctor molestie fermentum tempor metus himenaeos commodo, mauris dictumst varius bibendum placerat arcu erat ultricies posuere.\r\n\r\nLaoreet fermentum ullamcorper lobortis netus primis nostra nullam dapibus, fusce leo class purus aenean conubia sollicitudin, torquent ornare dis tempus id blandit erat. Id sagittis et cum erat dis orci, fermentum netus aenean egestas diam mollis taciti, sapien augue nulla curabitur pellentesque. Scelerisque sociis convallis class velit elementum ullamcorper per ligula posuere, litora ut sodales pulvinar morbi urna eleifend.\r\n\r\nMetus lobortis lectus dui at quam himenaeos tincidunt aliquet congue posuere, rhoncus mus lacinia eleifend quisque non vitae fusce sem, auctor vestibulum vivamus faucibus per dis ultricies ligula platea. Ultricies dictumst praesent condimentum venenatis convallis quis sed laoreet, nec posuere dis sociis eu penatibus luctus pharetra nulla, dui varius vestibulum viverra ridiculus vel mollis. Lacinia donec tempus facilisi risus sociosqu molestie mollis nam aliquam tristique laoreet, a ut sollicitudin egestas natoque ultrices iaculis placerat nascetur luctus.\r\n\r\nCras imperdiet malesuada gravida cursus metus parturient magna scelerisque etiam, magnis vehicula velit a vitae iaculis tellus dictumst lectus, primis accumsan nisi fames donec quisque bibendum placerat. Sollicitudin ultricies condimentum aliquam laoreet dui tortor faucibus, hendrerit accumsan ullamcorper morbi et aenean a, congue mauris pellentesque tincidunt purus libero. Placerat ligula urna ultrices donec dapibus ac fermentum, potenti nam est porttitor augue convallis, risus habitant lectus vitae curae rutrum. Lacus tortor sociis metus blandit conubia tempus litora sem, eu porttitor elementum mollis nascetur hendrerit ad praesent, facilisi ornare suspendisse nisl condimentum est arcu.\r\n\r\nAd inceptos aliquet convallis class mus senectus, vehicula mollis ornare orci quis luctus, cras aliquam a natoque sollicitudin. Maecenas aptent molestie porttitor iaculis condimentum magna vehicula pharetra, sem purus nam varius tortor sed neque, euismod fermentum erat dis dictum vivamus aliquet. Dapibus proin venenatis inceptos ante parturient commodo netus eleifend aenean condimentum dignissim, rutrum malesuada turpis feugiat auctor porttitor lacus montes augue duis eu facilisi, massa conubia magnis posuere fusce ut dui magna tempus tristique.\r\n\r\nLacus class velit lobortis nostra massa feugiat urna, habitasse himenaeos libero sodales enim nisi, suspendisse habitant non sapien senectus posuere. Eget lacinia condimentum curabitur nam laoreet molestie nunc tortor, odio habitasse neque nisi curae varius ac cum, ut mauris tincidunt id malesuada lectus consequat. Sollicitudin diam aenean cras sem ut magna sapien habitasse leo quis gravida, cum bibendum eget duis viverra ultricies vivamus hac platea natoque, pulvinar nascetur habitant per a tortor eu mattis etiam varius.\r\n\r\nLitora tellus facilisi augue lacinia phasellus morbi per ut sed, duis convallis vehicula luctus justo tincidunt donec turpis fames, gravida ac condimentum dignissim sem nascetur mauris dapibus. Non lobortis feugiat luctus cum sed magna posuere at tristique, taciti augue urna mi ullamcorper potenti nullam arcu inceptos, ad conubia aliquet mollis montes proin in cursus. Ridiculus quisque proin dis quis porta vel ullamcorper, eleifend nulla maecenas fermentum mauris mus vitae mollis, nunc molestie lobortis conubia purus praesent.\r\n\r\nCum facilisis lacus mollis lacinia penatibus fusce montes sem, nam eget taciti quis eros imperdiet a integer, netus sodales himenaeos ornare auctor fringilla magna. Cursus augue risus euismod malesuada vitae sagittis porta elementum praesent justo cras netus vivamus, odio mauris interdum donec varius lectus magnis tempus orci metus condimentum magna. Natoque ultricies condimentum turpis primis ut quisque nunc venenatis mattis, conubia eu mollis parturient dui tortor dapibus bibendum aliquam nulla, porttitor ad ornare inceptos molestie ridiculus vulputate justo. Eleifend feugiat praesent laoreet tempus orci fusce, fermentum aliquet donec a leo purus rutrum, dictumst varius suscipit neque parturient.\r\n\r\nDonec semper sem sed curae cum molestie vestibulum facilisis nullam ridiculus nulla, diam bibendum fusce euismod commodo ac inceptos conubia natoque interdum, rhoncus leo platea integer vel blandit primis proin ante at. Phasellus leo in velit urna eleifend platea metus laoreet, primis potenti blandit semper diam cras aenean iaculis, aptent pulvinar nibh sociis habitasse a facilisi. Tortor neque facilisi penatibus montes eros porttitor interdum egestas litora pretium ante euismod scelerisque, auctor aptent aliquam urna enim per cursus cum quam cras lacus cubilia. Ad metus a rutrum sollicitudin augue etiam lacus, facilisi nisl bibendum non interdum fusce, imperdiet vulputate aliquet fames sociis vel.\r\n\r\nNatoque at in dictumst iaculis vestibulum tempus enim nostra sed, urna et dapibus faucibus parturient habitant dui ac curabitur euismod, libero morbi maecenas eu eros pellentesque etiam aliquam. Convallis turpis et augue aliquam fermentum sed sagittis eleifend massa justo interdum in phasellus praesent, bibendum nec eros nulla penatibus arcu vivamus dignissim sociis sem ridiculus dictum. Curae dictumst faucibus vel parturient orci bibendum non pellentesque nostra suspendisse leo ornare, aenean velit enim pulvinar platea malesuada erat ridiculus proin fusce ad, conubia tincidunt mollis nibh facilisis magna sagittis maecenas scelerisque dapibus dis.\r\n\r\nScelerisque facilisis aliquet mi inceptos phasellus ullamcorper integer cum, augue dis odio bibendum nulla nascetur sagittis sapien imperdiet, nibh morbi luctus fames placerat ornare nostra. Pellentesque eros rutrum integer accumsan ligula quis metus semper, feugiat massa nibh tristique vitae imperdiet curae blandit ante, suspendisse commodo diam justo pulvinar ornare vel. Himenaeos egestas donec in tortor conubia volutpat posuere interdum mus fames platea, torquent suspendisse at nisl hendrerit taciti iaculis inceptos netus congue, maecenas lectus convallis ridiculus nec turpis feugiat vehicula pretium suscipit.\r\n\r\nEnim blandit duis netus erat vulputate est, sapien euismod natoque mus odio ac, purus himenaeos tincidunt nibh nunc. Suspendisse libero pharetra volutpat in fames luctus, nam sem eleifend per mi purus ullamcorper, enim proin fusce morbi urna. Condimentum montes facilisi pretium eu non, sociosqu habitant vel netus sapien eros, erat curae ante placerat.\r\n\r\nVenenatis magnis massa aptent ultricies odio est nullam rhoncus, non risus condimentum fermentum himenaeos eget volutpat, fringilla vulputate morbi ad facilisi nibh donec. Suspendisse platea porttitor urna nibh et vel id gravida viverra, dignissim luctus himenaeos senectus magnis cubilia in facilisi netus, orci felis cras bibendum posuere aliquet hendrerit ad. Volutpat cras quis laoreet dui nisl potenti duis, blandit nullam gravida inceptos venenatis est, montes turpis etiam lacus cubilia sed.\r\n\r\nUltricies habitasse sociis nostra suspendisse a mauris interdum maecenas magna, ligula luctus ante egestas purus dignissim nullam sed, condimentum erat euismod vel mattis fermentum ullamcorper dictumst porttitor, elementum rutrum odio aptent nunc porta ultrices. Cubilia luctus facilisi a id integer neque, molestie pharetra consequat at mi auctor, sociis magnis nisl dis suspendisse. Eu luctus pellentesque aliquet aenean venenatis donec a, integer tempor aliquam nam class ullamcorper leo, sollicitudin massa magnis ut eget accumsan.\r\n\r\nUltrices sagittis dis per habitant facilisi lacus, porttitor blandit himenaeos feugiat. Integer lectus rhoncus ante platea montes quam, laoreet dictumst potenti litora ad, massa purus suscipit venenatis id. Phasellus interdum proin dictum aliquet sollicitudin risus placerat rhoncus penatibus sodales, vitae nostra pulvinar leo cum egestas fermentum rutrum. A porttitor metus varius justo fringilla dignissim, himenaeos neque posuere imperdiet magna aliquam purus, congue venenatis integer parturient nec.\r\n\r\nNostra tempor nulla vestibulum libero facilisis scelerisque dapibus id, habitasse parturient maecenas rutrum felis eleifend habitant dictumst vitae, ac magnis tempus varius urna duis fringilla. Potenti duis nascetur nibh sed gravida, massa purus ad sociosqu hendrerit, urna semper nunc ante. Aliquam felis mollis penatibus pellentesque sodales risus, in congue fusce porttitor suscipit rhoncus laoreet, viverra inceptos iaculis hendrerit fringilla.\r\n\r\nNisl rhoncus a hac pharetra montes nostra venenatis urna, eu nunc blandit commodo integer rutrum ornare, pulvinar enim praesent ullamcorper primis maecenas morbi. Mollis mus tortor ligula dignissim, lobortis accumsan eu, ultricies tempus turpis. Tincidunt tristique arcu mauris molestie imperdiet metus class sagittis ullamcorper varius fringilla pulvinar, malesuada ridiculus luctus facilisis dis pellentesque torquent ultrices rutrum aptent phasellus, scelerisque tempus facilisi duis augue vivamus bibendum sodales dignissim faucibus viverra.\r\n\r\nSapien inceptos mollis aenean velit urna nisi dui, integer varius sociis posuere molestie et purus, ultricies non magnis nec sagittis rutrum. Sagittis porttitor sapien habitasse augue mus consequat quam praesent est per id lacinia phasellus, netus blandit nisi nunc vel iaculis dignissim natoque ultrices ante platea. Dapibus cum fusce leo platea fermentum vulputate condimentum rutrum lacinia, aenean pharetra in odio feugiat mus libero imperdiet, rhoncus sagittis nisl a nam metus maecenas nisi.\r\n\r\nNibh lobortis class iaculis dapibus cras accumsan sapien sodales, nisi litora laoreet sociosqu congue proin ultrices senectus egestas, suscipit urna mattis ad orci neque nullam. Gravida facilisis morbi per senectus pulvinar feugiat congue felis tempor, lacus ad ornare maecenas lectus interdum enim sociis ultrices, sodales pellentesque nisi eu pharetra porta curabitur lobortis. Luctus sem sociosqu cubilia diam aliquet, ad eget viverra cras tincidunt, dui vivamus senectus maecenas.\r\n\r\nSuscipit sociosqu risus mus cras torquent proin litora natoque conubia, nibh dictum ornare justo fringilla massa mi ante, quam netus curae arcu vitae egestas gravida odio. Facilisi ac eget libero penatibus curabitur diam venenatis semper sapien id consequat, natoque accumsan dis habitant vehicula lacus velit duis sociosqu. Litora ullamcorper eu mollis vestibulum dis enim feugiat dictumst, porta congue orci cras tortor ultrices turpis est morbi, tincidunt faucibus etiam lacinia magna ridiculus habitant.');
INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`) VALUES
(3, 'Tonecho de Rebordechao', 'bbbbbbbbb', 'Lorem ipsum dolor sit amet consectetur adipiscing elit magna ultricies tristique, condimentum consequat scelerisque platea metus euismod quam orci mollis, porta mauris facilisis leo ridiculus pretium eget nulla duis. Quam pellentesque taciti dictum nullam fringilla risus nisi, tortor montes sodales non tristique commodo ac dapibus, fusce vulputate sapien elementum urna venenatis. Urna blandit pulvinar fringilla class phasellus velit fusce, nibh at euismod nam tristique ultrices sem molestie, ante vivamus congue massa etiam sociis.\r\n\r\nParturient eget imperdiet purus potenti pretium tellus porttitor penatibus nibh in mattis eleifend, taciti platea aliquet fames lacinia est aptent scelerisque urna conubia habitasse. A fringilla ligula egestas posuere sodales porttitor quisque dictumst tincidunt, inceptos malesuada curabitur praesent viverra vivamus ut purus libero, conubia lectus erat magnis phasellus morbi dui nostra. Dapibus pretium tortor inceptos taciti a aenean congue vestibulum duis blandit, elementum penatibus vel accumsan est mattis sociis mi pellentesque, parturient bibendum posuere conubia sapien porta imperdiet fermentum vulputate.\r\n\r\nEst fames sodales vehicula faucibus nibh velit, nec ligula rutrum eros malesuada, inceptos praesent diam odio vivamus. Fames ornare mollis torquent primis aliquet ut cum, sodales hendrerit leo felis orci facilisis a enim, ac turpis purus curae rutrum varius. Senectus placerat tempor mi odio iaculis porttitor etiam pulvinar mattis elementum faucibus, eget luctus libero curabitur maecenas facilisi eleifend tempus pellentesque class cursus fusce, nostra non leo diam vivamus facilisis rhoncus ridiculus himenaeos aptent.\r\n\r\nNam convallis penatibus magna quisque tristique torquent id fames, natoque potenti pulvinar curae etiam lacus conubia praesent, ac primis lectus sociosqu facilisis pretium mollis. Quam elementum vitae habitasse eget tempus taciti aliquam quisque dictum, sapien molestie auctor etiam proin natoque massa mi, laoreet quis semper ornare dictumst malesuada lectus eros. Quam at sagittis euismod odio feugiat habitasse nisl hendrerit convallis, elementum luctus lacus urna leo duis a platea egestas hac, sociis nibh natoque magnis cubilia conubia accumsan per.\r\n\r\nClass conubia proin metus in tincidunt vestibulum aptent porttitor maecenas etiam, dapibus nisl habitant faucibus dui mi eu suspendisse ultrices, consequat aenean inceptos condimentum lacinia neque auctor natoque accumsan. Volutpat libero vel iaculis blandit lacinia gravida litora posuere molestie cum mi, faucibus nam turpis netus magna facilisi fusce interdum vitae torquent, ad nascetur dapibus sociis aliquam cursus pellentesque hendrerit quis duis. Rutrum cubilia in habitant tempus ac vestibulum commodo velit facilisis, massa vitae vivamus libero mus nec nam turpis, nisl imperdiet penatibus molestie non dignissim venenatis class.\r\n\r\nNetus purus est aenean pulvinar fermentum torquent vehicula montes sem, vel arcu mus ullamcorper erat non sociis ac, at sociosqu aliquet nunc fringilla magnis molestie dignissim. Nulla dis tincidunt vel nibh placerat eleifend libero ultrices vulputate hendrerit massa ullamcorper sollicitudin, dictum odio elementum id potenti quis pretium faucibus sem praesent aenean porta. Libero volutpat eleifend placerat rhoncus gravida ut leo nulla, neque curabitur sodales vitae dui laoreet torquent, potenti pellentesque odio id eros orci sed. Rutrum phasellus dis in ultrices mauris mus mattis urna tempus laoreet, tellus class per placerat facilisis magna torquent suscipit ante consequat convallis, enim quis montes praesent eu magnis habitasse at nullam. Convallis laoreet dictum fermentum litora euismod parturient volutpat aliquam sem justo natoque, curabitur condimentum sodales congue blandit morbi ridiculus mi quis.\r\n\r\nProin sollicitudin augue ad est mattis etiam tristique vestibulum quisque ornare suspendisse sociosqu, dis cras quam mollis luctus morbi aenean vehicula consequat cum venenatis, aliquam imperdiet diam erat mus netus id tortor viverra aptent integer. Mauris blandit nam arcu viverra odio nisi pharetra proin metus venenatis quam tristique eros, iaculis nibh facilisis lacinia eget condimentum torquent mus rutrum phasellus convallis. Ultrices pharetra mi rutrum proin dapibus sociosqu tempus tristique, augue natoque fringilla donec quis placerat id curae, ultricies sodales ut et risus aliquet eu. Accumsan suspendisse laoreet nulla torquent dictumst a sociis curae, dignissim pretium dui augue facilisi varius vitae ultrices, dapibus dictum quisque maecenas cras ac magnis.\r\n\r\nFusce nunc sem rutrum hendrerit faucibus tellus nullam congue porta auctor vitae, id lectus dapibus habitasse nascetur morbi felis odio nibh mattis vestibulum porttitor, cras mi et dui nostra lacinia ullamcorper integer habitant curae. Sapien accumsan in dictumst risus quam sociosqu maecenas egestas tortor, fringilla mollis dui augue molestie condimentum litora. Laoreet nam ut nulla tempor semper gravida et aptent suscipit tincidunt, fusce rutrum a curabitur nec habitant netus facilisis in auctor, nascetur sociosqu euismod eros orci congue integer blandit sodales. Porta euismod pharetra sollicitudin dictum habitant felis at mollis ridiculus orci aenean proin torquent, magnis a nibh per eget consequat mus tortor sociosqu mi natoque.\r\n\r\nNascetur integer consequat sociis semper mattis scelerisque luctus vivamus cursus vulputate eget, sagittis ullamcorper sodales at gravida taciti natoque lacus cras pellentesque, cum volutpat porta phasellus pulvinar feugiat fermentum torquent platea magnis. Elementum aliquam eros viverra neque aptent, quis felis dignissim feugiat, euismod a inceptos pharetra. Nibh curae parturient duis potenti sapien lacus phasellus et, ornare cum sem pulvinar fames massa est, id molestie porttitor praesent faucibus auctor libero. Tempor netus aptent convallis est eleifend sed maecenas, lobortis nostra fusce id congue placerat. Lacinia tincidunt vestibulum primis rhoncus volutpat accumsan fames ligula velit in ullamcorper dictumst, nam facilisi diam turpis gravida laoreet quis et fringilla ut.\r\n\r\nAt iaculis netus suspendisse praesent, non parturient tincidunt inceptos, nibh sodales bibendum. Curabitur at iaculis purus nulla penatibus sollicitudin sed integer, curae scelerisque eros phasellus torquent tortor. Porta magnis vitae dis per dictumst metus sapien massa, commodo morbi penatibus habitasse suscipit nulla facilisi hac est, non aliquet montes eros proin integer quam. Accumsan diam cursus platea aenean lectus blandit in nostra facilisi vivamus pellentesque ullamcorper, vehicula ornare nisi magna vestibulum torquent dis hac curabitur rutrum.\r\n\r\nCum augue tempus a urna mus sodales nec, massa parturient neque eleifend nisl metus, vulputate sem dignissim molestie dapibus duis. Neque cum pretium vel cras urna libero torquent dictum tristique pharetra, felis malesuada primis vestibulum rhoncus aliquam posuere ullamcorper pellentesque, iaculis interdum mi aliquet quam vivamus phasellus nullam ligula. Vel nullam congue platea porttitor pulvinar augue, nisi lectus cum a pharetra primis libero, euismod sapien nascetur convallis ultrices.\r\n\r\nNon dictum auctor ac quisque varius hac vivamus mattis hendrerit, ultrices eleifend penatibus montes ridiculus inceptos nulla cubilia nisl eget, aliquet scelerisque luctus orci cursus a felis dui. Dapibus ut hendrerit potenti venenatis curabitur nisl conubia bibendum velit phasellus, ante purus et primis odio convallis elementum leo congue. Praesent cubilia vulputate metus pulvinar odio ligula integer, dictumst donec felis potenti vivamus id tristique, fusce vel dui facilisis in risus.\r\n\r\nMauris quis mattis proin quisque aliquam rutrum augue nisi potenti interdum eros nulla scelerisque sem cubilia erat, taciti curabitur senectus maecenas ornare vestibulum dui tortor euismod fusce varius auctor nisl ac. Aptent at aliquet ultricies penatibus diam molestie, mattis purus mauris donec erat, ad id platea rutrum conubia. Justo arcu netus tristique volutpat enim per diam purus aliquet cursus, nulla sed ultrices malesuada curabitur semper sociis porttitor senectus dis commodo, nisl facilisi gravida aptent proin fringilla euismod sodales posuere.\r\n\r\nLaoreet dui et odio ut est feugiat turpis arcu facilisi consequat integer, quis scelerisque lobortis netus ornare purus ultrices volutpat mollis dignissim tellus leo, suscipit litora fermentum elementum nec hendrerit platea senectus magna ad. Id bibendum sociosqu potenti posuere pharetra feugiat imperdiet, laoreet sociis enim cum sem risus, dui eleifend dignissim pulvinar vel tincidunt. Enim porta tristique nisi potenti aliquet curabitur ac lacus rhoncus, lectus aliquam magna senectus tempus penatibus auctor dignissim, quis imperdiet etiam vulputate leo montes viverra blandit at, dapibus facilisis massa gravida egestas sodales natoque.\r\n\r\nUltricies vestibulum nulla interdum netus feugiat tristique pulvinar gravida augue, nisi convallis taciti lectus dictumst platea erat metus magnis, at libero purus maecenas porta nullam pretium aenean. Platea ac leo neque porta consequat bibendum inceptos ultrices taciti pretium, arcu eros ornare hendrerit nascetur fames erat blandit placerat varius, a massa id lectus gravida suscipit montes feugiat facilisi. Aptent rhoncus ligula aliquet proin penatibus tristique scelerisque suscipit purus a volutpat himenaeos posuere porta suspendisse ornare potenti, morbi sociis nascetur taciti arcu varius nec in conubia sed class primis magnis pulvinar sem mattis.\r\n\r\nHendrerit nulla in pellentesque convallis cras tellus posuere magnis, accumsan quisque auctor erat velit tempor viverra non ultrices, facilisi quam sagittis platea volutpat porttitor lectus. Pharetra pellentesque parturient phasellus ornare vehicula mattis ut suscipit, egestas nullam cursus ultricies augue eros ullamcorper, curae sagittis fringilla tristique leo vel tortor. Lacinia himenaeos tempus taciti nascetur primis morbi senectus proin et neque cursus, magna etiam posuere laoreet curabitur magnis hac dui enim torquent tincidunt litora, orci molestie pharetra nullam hendrerit tortor sed duis sodales phasellus. Ut nam nulla habitant cubilia sed dignissim dis porttitor, natoque euismod est velit accumsan quam sem vivamus taciti, montes vulputate etiam nascetur rutrum fames pellentesque.\r\n\r\nPurus faucibus ante pretium fusce sodales commodo venenatis a laoreet, porta hendrerit dictum nibh penatibus odio nostra curae, malesuada nulla nisi suscipit per rhoncus nunc tempor. Morbi volutpat cubilia platea magnis netus nascetur semper quisque vehicula, imperdiet eget parturient aenean cursus malesuada duis aliquet vel, et justo ante torquent tristique phasellus diam potenti. Gravida tempus rhoncus nunc lacinia consequat odio, mi quis vel dui posuere, tellus porttitor tempor ante curabitur.\r\n\r\nSagittis odio id vitae sociosqu cras ornare mauris rutrum, per phasellus nunc gravida netus ut proin tempus donec, torquent arcu neque posuere ligula aliquam dignissim. Tincidunt phasellus pretium nibh in ultricies viverra lacinia dapibus eros integer, fusce mi scelerisque non curabitur nisl sed mus. Libero maecenas habitasse imperdiet vulputate justo sociosqu ultrices semper inceptos, magnis tincidunt metus commodo lectus diam dapibus facilisis, pretium himenaeos montes potenti egestas vestibulum primis purus. Tristique orci semper ridiculus tempor iaculis ante bibendum pulvinar morbi arcu, donec fermentum mauris turpis habitasse blandit magnis maecenas lacinia nulla, id vitae ad condimentum aptent metus euismod sem posuere.\r\n\r\nLectus magnis pulvinar viverra arcu quis ligula porttitor suspendisse purus, vel dictum hendrerit augue netus habitasse feugiat integer ridiculus, malesuada commodo quisque sociosqu convallis accumsan non ad. Lobortis nascetur ac sapien laoreet tempus porttitor, curae pharetra morbi iaculis luctus, convallis neque primis metus parturient. Urna quis viverra pharetra varius class nam metus blandit cum curae iaculis odio convallis diam auctor, mollis ornare mus malesuada sociosqu ante litora tortor eros sapien aliquam himenaeos maecenas ut.\r\n\r\nUllamcorper consequat conubia est at nec suscipit sodales eleifend ultricies magnis nostra, libero vehicula dapibus fusce habitasse torquent ultrices id quisque praesent. Neque ullamcorper tempus placerat fringilla etiam vitae fermentum eget dictum mus tristique, magnis euismod erat per lacinia faucibus pulvinar ut dui. Eget senectus phasellus varius vel lacus augue porttitor molestie per mollis, facilisis ad hendrerit cubilia maecenas nascetur non bibendum mattis vivamus, dignissim litora sapien faucibus rhoncus quam venenatis nulla parturient. Condimentum lobortis felis sollicitudin nunc mattis ridiculus magnis, suspendisse montes erat ultricies libero neque bibendum, nisl facilisis ultrices netus nibh placerat.\r\n\r\nRutrum enim eu arcu neque aenean turpis tellus vitae fames feugiat nascetur conubia venenatis, facilisis dictumst suspendisse platea at blandit suscipit porttitor laoreet lacinia in senectus. Nulla ultrices curae tristique proin volutpat imperdiet vestibulum lacus dapibus sodales tempor torquent nisi non, erat quam penatibus ad massa elementum dictumst iaculis fermentum inceptos himenaeos ultricies. Aptent dis leo nascetur cras placerat egestas imperdiet, lectus morbi libero ligula phasellus facilisi.\r\n\r\nCongue porta et pellentesque volutpat dignissim dictum ornare cum penatibus duis facilisi non morbi enim habitasse, tincidunt cras a platea convallis varius augue magnis sed mus lacinia torquent ridiculus. Semper nostra libero mauris ultricies ullamcorper eu praesent tellus integer sem, commodo gravida massa cursus magna primis sapien habitasse cras. Donec consequat vel laoreet lacinia molestie per conubia, vitae aptent maecenas euismod hendrerit sodales, pulvinar vivamus nam magnis ullamcorper neque. Cras phasellus euismod nulla id congue etiam condimentum, neque sociis morbi quam dis eleifend tempor, potenti tristique praesent vehicula convallis curabitur.\r\n\r\nVivamus eros in potenti himenaeos malesuada nascetur, parturient phasellus auctor nec magnis neque ultricies, at nibh eleifend varius quam. Proin eros fermentum hendrerit nec risus odio integer sociis nascetur, imperdiet ad porta ac molestie consequat porttitor taciti augue phasellus, velit felis vehicula netus viverra potenti aptent vel. Morbi bibendum ac cursus praesent himenaeos fames ante pretium cras nullam, feugiat dignissim dapibus fringilla a rutrum semper viverra integer netus id, leo penatibus aliquet consequat quisque volutpat in donec curae. Enim volutpat urna aliquam varius tortor elementum bibendum, nisi nunc consequat odio diam augue.\r\n\r\nSed aliquet per nunc faucibus facilisis sapien, pellentesque in mus magnis conubia, etiam lobortis et cum cras. Ac enim vel vivamus per est conubia vulputate magnis netus ad suscipit proin, nam luctus leo curabitur nulla metus orci lobortis taciti penatibus. Odio massa nulla aliquet turpis nibh pharetra, porttitor malesuada tortor eu in bibendum, tellus habitasse morbi vehicula purus. Fames mi quisque sociis pellentesque accumsan euismod tortor senectus cursus luctus, sed venenatis sapien mattis semper arcu tincidunt sodales odio.\r\n\r\nPretium natoque aliquam purus accumsan egestas mus, cras sed eleifend turpis class erat tristique, sociosqu donec taciti ornare dis. Augue dui venenatis semper tellus sed blandit faucibus bibendum fusce, parturient ac habitant ut torquent imperdiet cum facilisis class, ultricies quis himenaeos platea rutrum etiam ligula orci. Auctor in accumsan duis euismod augue viverra enim metus nostra fusce cum bibendum vitae hendrerit dictum a gravida, cubilia turpis pharetra est proin ac habitasse quisque congue ultrices senectus quis tristique arcu eu litora.\r\n\r\nPurus et phasellus aliquam orci augue arcu magnis in elementum conubia, porta dui montes torquent nunc feugiat class dapibus potenti fusce magna, velit ornare tempus nisi suspendisse himenaeos netus metus facilisis. Et porta mollis dui tortor placerat, per massa felis tincidunt habitasse integer, senectus nisl etiam lobortis. Lobortis integer justo morbi eget felis ultricies taciti aliquam pellentesque fusce donec mauris sociosqu cubilia, est vulputate tempus etiam maecenas torquent libero nostra phasellus quam rhoncus suspendisse. Sociosqu eget dis fames a mus per felis turpis condimentum, vel quisque pretium sem parturient diam urna suspendisse litora, platea elementum habitant mauris nulla in odio feugiat.\r\n\r\nId mi faucibus elementum nibh molestie blandit dignissim eget nisl cum eu ridiculus, vel habitasse inceptos etiam sociis per ut laoreet proin feugiat. Eget sollicitudin cras massa ut vivamus vulputate litora nisi dictum porta montes luctus convallis, facilisi mollis proin rutrum quisque ligula urna sed potenti sociis tempus. Accumsan aliquam erat interdum ante ornare sociosqu mi pellentesque est dui etiam phasellus pretium lacus, proin litora pharetra vehicula mauris netus fermentum posuere suspendisse at potenti augue. Tristique fusce fermentum mus tincidunt facilisis senectus, habitasse leo sociis sagittis at laoreet, orci iaculis ultricies luctus euismod.\r\n\r\nEget sollicitudin facilisis suscipit bibendum porttitor vulputate curae tortor maecenas, fusce ornare massa nibh taciti faucibus quis metus, est auctor dui eleifend venenatis viverra arcu per. Nunc etiam sed nulla imperdiet quis litora suscipit, per vehicula curae ligula dapibus inceptos, neque magnis nullam habitasse taciti dictum. Curabitur cubilia natoque duis est molestie tellus netus convallis per dignissim cursus augue suspendisse, pulvinar vestibulum leo eros tincidunt neque faucibus massa et dictumst tempus.\r\n\r\nAc maecenas molestie morbi porta nullam et senectus ad facilisi, diam magna interdum dignissim mus mollis tellus felis sollicitudin a, cubilia id parturient proin primis himenaeos varius enim. Eu congue imperdiet orci proin ridiculus tempus aptent nibh, risus mattis enim metus leo tristique laoreet elementum vestibulum, semper at natoque himenaeos praesent senectus habitant. Ac morbi etiam dictum nisi penatibus per varius, cras aptent sollicitudin lacus diam rhoncus ad, faucibus mollis metus dapibus primis taciti.\r\n\r\nLaoreet orci rutrum iaculis maecenas nisi eros hac elementum, ac vivamus inceptos fringilla fusce nascetur egestas, pretium dictumst litora cras leo vitae penatibus. Luctus habitant faucibus quam euismod primis egestas, etiam sociis massa quisque lobortis ad, mi placerat condimentum morbi nulla. Donec ante habitant tellus arcu libero at tempor, convallis lobortis ligula montes faucibus sollicitudin conubia quam, natoque est pretium feugiat inceptos dignissim.\r\n\r\nNisi vitae libero magna sed justo per habitant egestas aenean inceptos torquent iaculis ante netus, facilisi consequat montes ridiculus massa suspendisse dapibus phasellus tempus class tortor elementum. Ad parturient aliquam feugiat dictumst litora aliquet morbi condimentum ligula sed, fermentum inceptos montes nec eleifend sodales in neque hendrerit dictum, habitasse luctus pharetra pulvinar aenean maecenas nibh ante placerat. Egestas arcu vel nibh torquent laoreet faucibus parturient aenean taciti lobortis turpis nisl facilisis class fames venenatis, neque in eros a sociis ullamcorper tempor elementum praesent nunc primis gravida eu urna feugiat. Blandit rhoncus penatibus mollis nostra netus lacinia, pretium rutrum varius lobortis natoque tempus cras, vestibulum libero potenti phasellus tincidunt.\r\n\r\nTortor egestas dignissim dui phasellus vehicula maecenas feugiat mollis habitasse ridiculus, dictumst fames malesuada himenaeos rutrum a tincidunt facilisi leo iaculis, habitant nec posuere nullam fringilla ligula inceptos torquent non. Fusce mauris dapibus nisl vitae dignissim curabitur morbi, lacus eget consequat senectus eros tincidunt fringilla ultricies, imperdiet sapien pharetra tellus a turpis. Luctus aliquam etiam mi turpis primis cursus congue sem, duis ultricies neque tortor varius viverra nascetur phasellus, pellentesque vel diam inceptos lacinia vestibulum cubilia. Taciti convallis odio integer habitasse suspendisse curabitur placerat suscipit lacus, ac eu pellentesque nam tincidunt porta purus natoque magnis, vitae a nisl proin eleifend consequat neque quis.\r\n\r\nId sollicitudin accumsan litora at et ultrices, nostra fermentum imperdiet facilisi commodo. Etiam maecenas torquent pellentesque sociis nibh class quam pharetra lobortis cursus malesuada, conubia velit natoque nec sed taciti leo in sem pretium mi, lacinia proin et laoreet molestie tortor congue nascetur aliquam senectus. Ut nibh hac eleifend vel tortor odio suscipit interdum blandit, ultricies nascetur phasellus tristique facilisi parturient eu porta semper ridiculus, dui massa malesuada ante vehicula accumsan condimentum netus. Per tellus vestibulum lacus viverra ullamcorper nulla imperdiet luctus primis class quis porta, nibh massa tristique mattis nam mollis egestas molestie eu arcu rhoncus.\r\n\r\nUltricies sem sociis tortor dis egestas dictum diam aptent, aliquet urna convallis vitae cursus ligula est, metus hac dui vehicula ac taciti molestie. Sagittis sollicitudin praesent et taciti mi neque quisque faucibus morbi tellus condimentum luctus sodales, per facilisi risus natoque lectus orci tristique torquent justo duis aliquam eu. Nam sollicitudin porta facilisi in dis ultrices eu fringilla sem, consequat tellus porttitor integer magna vitae tincidunt sagittis libero, tortor luctus ante posuere mus himenaeos massa ut. Potenti hac ultrices aptent rutrum blandit lectus diam curabitur lacus scelerisque, vulputate inceptos tempus tincidunt posuere pellentesque gravida felis praesent, ornare sociosqu feugiat lacinia varius sociis ante a suspendisse.\r\n\r\nDui auctor sodales dignissim scelerisque praesent augue sollicitudin potenti semper vestibulum, ultricies habitant penatibus sociis mattis morbi per est vitae. Euismod ultricies pharetra fusce tempus nisl ad rhoncus phasellus odio, ultrices est hendrerit leo fermentum suscipit suspendisse vulputate scelerisque, morbi senectus facilisis curae enim posuere torquent elementum. Dignissim maecenas magna ut ad ac non tortor class venenatis taciti, morbi mattis vehicula eleifend aliquet phasellus enim auctor habitant, fames ullamcorper malesuada vulputate curae aptent pellentesque fusce nascetur. Nunc nisi litora fermentum non per donec ac mollis parturient, natoque facilisis elementum dapibus aliquam vivamus mattis pharetra ligula, habitasse aptent penatibus vehicula dignissim lacus rhoncus at.\r\n\r\nTurpis condimentum viverra litora parturient scelerisque suspendisse tristique tempus sem neque leo, dictum penatibus arcu rhoncus magnis sagittis phasellus tortor blandit diam a, nostra facilisi nunc tincidunt laoreet sodales consequat platea eleifend vitae. Commodo mauris pellentesque in senectus torquent penatibus sociosqu, eget libero sem praesent eros nisi, fringilla integer parturient varius ornare ante. Nisi fermentum sem cum rhoncus ante platea consequat magnis mauris convallis, vestibulum mus odio quisque rutrum netus maecenas vulputate vivamus commodo, fames neque penatibus molestie ridiculus ut habitant cubilia facilisi. Eros tristique aptent libero nisl feugiat lacus habitasse ut, auctor pretium augue sollicitudin montes litora nulla.\r\n\r\nPharetra aptent rutrum placerat luctus neque ullamcorper parturient sagittis donec, penatibus mi aliquet euismod suscipit varius lectus porta, et urna vestibulum libero netus mattis convallis metus. Elementum justo placerat sem augue fusce maecenas, litora nisi eleifend commodo ad risus, tempor at hac ullamcorper lectus. Volutpat ligula venenatis porta etiam nostra vestibulum nisl proin lacus neque netus, primis inceptos lectus habitant euismod eros vehicula metus at dictumst, in ad potenti risus litora taciti felis conubia nullam velit.\r\n\r\nUllamcorper senectus non tincidunt mattis accumsan volutpat, purus varius dapibus aptent ridiculus, nascetur neque nisl cras tempus. Ultrices est arcu consequat viverra velit eu facilisis orci fermentum a nostra, elementum ut vestibulum rhoncus magna habitant dapibus semper mollis lectus, eleifend senectus venenatis sodales nulla cubilia natoque metus blandit mauris. Dignissim placerat augue primis eros scelerisque enim montes nulla, erat et nullam dapibus euismod metus odio duis, aliquet ullamcorper morbi natoque ligula dictum viverra. Dis molestie tortor eleifend ornare in pulvinar venenatis, semper aliquet varius montes inceptos mattis nibh magna, potenti vehicula sociis interdum vestibulum non.\r\n\r\nNec malesuada volutpat eget cursus dignissim etiam, interdum mattis arcu a enim nunc class, libero magna mi dui vulputate. Platea mattis interdum tellus sociosqu ut ac integer sollicitudin senectus id eu phasellus porta vulputate enim est, quis conubia convallis ridiculus nascetur a tempor sed gravida torquent mollis odio fusce nec ante. Quam ac potenti luctus accumsan parturient sed vel blandit neque, erat placerat class feugiat vestibulum dui curabitur malesuada congue mauris, bibendum pellentesque aenean ridiculus suscipit magna felis inceptos.\r\n\r\nScelerisque mollis viverra vestibulum ante non euismod feugiat, volutpat quam praesent lacus pulvinar. Torquent porttitor neque quis molestie venenatis auctor ornare laoreet mattis, vivamus orci risus ultricies ultrices fringilla eu vulputate tristique nisl, volutpat lacinia enim a in accumsan viverra parturient. Mi posuere risus per cum nisl nulla cubilia aliquet, maecenas suspendisse orci sed vivamus tempus accumsan diam ornare, proin hendrerit conubia platea interdum tempor vitae.\r\n\r\nFacilisi hendrerit platea enim inceptos cubilia ornare per habitant dis iaculis fringilla curabitur fermentum class mus, vehicula tempus velit vestibulum dapibus litora consequat viverra tellus lacus integer primis tempor donec. Dapibus nibh platea blandit egestas vehicula vel, tincidunt maecenas quisque sodales lacus mauris penatibus, class luctus varius mus ut. Ac augue velit donec massa molestie congue orci feugiat, litora porta diam ridiculus quisque pulvinar per habitasse, sem nunc dictumst curabitur ultricies hac tortor.\r\n\r\nLuctus cubilia id habitant facilisis auctor pellentesque, porttitor hendrerit penatibus ultricies senectus rutrum in, ullamcorper sollicitudin nulla leo dictumst. Parturient nisi lacus dis nam sagittis vivamus vulputate justo mattis, ac ad arcu fringilla mus accumsan feugiat curae nunc placerat, taciti aenean quisque porttitor fusce magna litora sociosqu. Iaculis neque dapibus sodales congue penatibus natoque pharetra fusce curabitur quam curae cubilia, risus praesent eget tellus dis accumsan consequat pretium donec suspendisse.\r\n\r\nParturient taciti maecenas donec suscipit eros vulputate dictum tellus vivamus turpis, tempor cubilia curae fames orci tincidunt blandit fringilla lectus, volutpat in duis venenatis faucibus cras litora mattis ut. Iaculis commodo aptent tincidunt ut cursus scelerisque proin posuere rhoncus facilisis tristique porttitor interdum dictum volutpat, magna sagittis dignissim gravida id ornare nostra vitae quis nec aliquet phasellus congue. Blandit faucibus ornare at congue conubia euismod aliquam pellentesque sagittis suspendisse vulputate, in venenatis a tincidunt cubilia orci suscipit enim himenaeos convallis, sociis non egestas quisque interdum libero phasellus nascetur platea et.\r\n\r\nUltrices pellentesque quisque commodo cubilia nisl laoreet viverra dapibus ad tellus urna sed integer, tempus praesent eu quis sodales nostra tempor lobortis euismod et vulputate. Ligula fames sodales dictum et pharetra cursus imperdiet fusce aliquet libero primis tempor, montes interdum est sed gravida convallis penatibus parturient conubia sapien tempus. Facilisi penatibus venenatis leo nisl tempus torquent, turpis molestie scelerisque purus integer odio, cum montes suspendisse interdum accumsan. In faucibus vivamus mus ad senectus ornare ultrices nec consequat, convallis vestibulum torquent metus netus tincidunt etiam montes commodo venenatis, sem taciti cursus habitant dis viverra pulvinar penatibus.\r\n\r\nMalesuada senectus ornare proin sapien maecenas ridiculus vestibulum scelerisque vehicula montes sollicitudin, condimentum ullamcorper lectus mus eleifend purus nascetur pellentesque potenti aptent gravida parturient, nisl etiam cras in egestas tristique vulputate felis varius lacus. Platea aenean eros varius luctus cras placerat cursus senectus, iaculis condimentum sem massa congue morbi natoque, hac quis mus aptent mauris pulvinar suspendisse. Nec posuere risus quam luctus aliquam et dis ultrices rhoncus, dui nisl facilisi proin convallis diam tortor praesent, ad orci aliquet libero eu penatibus quisque natoque.\r\n\r\nVulputate natoque sociis iaculis nisl varius, curae fermentum class lacinia condimentum venenatis, etiam penatibus ante ligula. Porttitor quam vel at sagittis ad blandit nunc hac, varius etiam aptent interdum tristique consequat aliquet, sollicitudin cum auctor ante nascetur porta magnis. Cubilia faucibus taciti blandit erat elementum nulla cursus commodo, habitant aliquet velit odio eros mollis vulputate curae diam, litora nullam morbi viverra est quis neque. Massa mus taciti volutpat laoreet curabitur hac praesent consequat, egestas libero porttitor iaculis enim id tristique etiam cum, vestibulum quis hendrerit nibh eros pellentesque ultricies.\r\n\r\nMauris suspendisse aptent maecenas curabitur nec ultrices parturient sagittis quis, lobortis odio donec habitant nam cum posuere curae, eu metus nullam leo feugiat cras dapibus dictum. Pulvinar aenean turpis id cursus augue cubilia pellentesque posuere faucibus vehicula, elementum vestibulum semper malesuada imperdiet pretium et donec nunc non, nisl luctus risus aliquam pharetra lacinia condimentum fringilla penatibus. Potenti ullamcorper mauris felis suscipit feugiat sodales varius viverra dui nibh, egestas mi vulputate fermentum praesent platea sollicitudin nisi nascetur, bibendum pretium vestibulum maecenas mus ac vitae integer morbi.\r\n\r\nVenenatis feugiat justo aptent magna vulputate dictum imperdiet aliquam ridiculus mus, cursus massa varius porta eget eu metus himenaeos facilisis, senectus vestibulum vel vitae torquent dui augue montes curae. Integer purus primis cubilia penatibus lobortis nibh mi quam dapibus, augue nulla laoreet suscipit mollis mauris non ultrices, euismod vulputate facilisis magna blandit netus varius habitant. Donec morbi aliquam sociis in orci elementum enim non, varius mi turpis viverra vel molestie inceptos dictum metus, consequat nec maecenas risus dis penatibus dignissim.\r\n\r\nDonec malesuada diam ad mi neque mus quisque rhoncus, varius molestie commodo sollicitudin ornare scelerisque fringilla sed, id ligula vel integer facilisis justo quam. Penatibus at lacus cubilia rutrum tellus bibendum porta nunc tortor mauris, platea pellentesque arcu semper ante etiam tincidunt parturient mattis nam, viverra non purus porttitor ligula gravida nisi vel vehicula. Sem orci montes ullamcorper scelerisque habitant malesuada purus, felis pulvinar non suscipit nullam mus.\r\n\r\nNam non quisque laoreet mauris porta iaculis praesent taciti sed sociosqu, erat pellentesque augue fringilla euismod nisi urna id cras, per tincidunt nec metus sociis viverra leo dapibus potenti. Mi nascetur vivamus metus aliquam dictumst fringilla mattis senectus etiam, curae ut aenean laoreet congue vulputate lobortis rhoncus id, accumsan convallis malesuada natoque turpis maecenas sem hendrerit. Porta nulla torquent consequat molestie aliquet erat gravida condimentum vivamus, mattis nibh auctor bibendum hac et ultrices massa luctus, mollis donec hendrerit curabitur integer mus nisi platea. Sagittis litora class varius iaculis porttitor euismod natoque, quis suscipit id hendrerit dictumst eleifend scelerisque nisi, ut malesuada phasellus lobortis duis laoreet.\r\n\r\nMorbi quisque velit sollicitudin cursus netus tristique aenean vulputate, senectus sem elementum volutpat lectus fusce curae, fames mi interdum tempor orci curabitur ante. Tellus conubia arcu vitae sociosqu pulvinar sociis ridiculus luctus, mauris quam posuere hendrerit torquent class fermentum. A dis tempor fringilla vel sodales neque urna nulla natoque, metus in id donec tincidunt bibendum ridiculus dignissim morbi, massa montes per conubia nam lobortis curae aptent.\r\n\r\nEros aliquet curabitur massa justo vel porta fames vestibulum, facilisis mattis facilisi praesent torquent ridiculus ligula sociosqu netus, condimentum tortor scelerisque gravida iaculis dictum cursus. Magna porta tristique scelerisque ultrices platea tellus praesent magnis dignissim nunc quisque, cum vehicula mattis interdum semper dictumst vitae libero varius quis, morbi augue arcu suspendisse convallis sociis ligula nascetur iaculis aliquam. Donec class lacinia curabitur fames magnis fusce condimentum ornare, etiam malesuada at eget enim ultricies magna curae, faucibus auctor ridiculus nisi porttitor fermentum maecenas.\r\n\r\nSagittis eleifend donec hac urna fringilla aenean sem proin tempus lacus, luctus velit lectus facilisi tortor mi sociosqu cursus vitae vel natoque, conubia est fames eget taciti massa ultricies praesent elementum. Quam proin gravida tincidunt lectus lacinia fermentum natoque eros, penatibus curae diam congue sollicitudin sodales viverra erat porta, ante nibh rhoncus mattis vehicula scelerisque in. Interdum suspendisse nec nisi vehicula dignissim a penatibus cubilia facilisi aliquet quam tincidunt pellentesque eros mi sociosqu, augue risus nunc pretium praesent nulla sapien sollicitudin varius nisl molestie eget platea sodales magna.\r\n\r\nMontes inceptos nostra luctus venenatis consequat ac id commodo fringilla, sociosqu aptent ultrices neque netus interdum platea potenti, mi malesuada posuere accumsan semper facilisi litora cras. Lacus vel eu porta praesent senectus ut blandit curae mus, suscipit facilisi commodo sociis quis pharetra mattis parturient libero, metus sociosqu et imperdiet venenatis enim semper nascetur. Neque ridiculus cubilia sem facilisi rhoncus lectus molestie commodo, condimentum maecenas posuere interdum himenaeos habitant turpis. Nisl eu interdum posuere hendrerit ac bibendum facilisis natoque luctus maecenas ante, congue ad arcu netus vehicula tellus porttitor primis tempor ridiculus per nascetur, quis nisi dictum dictumst metus eros tincidunt potenti montes cursus.\r\n\r\nDis tempor himenaeos nulla congue rutrum arcu aptent mauris donec justo, nascetur neque pharetra elementum sem vel habitant cum eros. Tellus cras curae dictum ultrices a tristique pharetra facilisi hendrerit iaculis magna, euismod viverra urna proin non commodo platea pretium justo nisl. Hac nec risus diam erat sociis senectus fusce, nostra vitae nunc litora libero purus.\r\n\r\nConubia ac aliquet netus vel interdum, viverra elementum nec tempus. Rhoncus nulla rutrum magnis maecenas integer aliquam lectus nec malesuada, sem iaculis bibendum facilisis pellentesque tortor commodo nunc ad massa, habitant justo viverra augue dictum dapibus neque molestie. Sociosqu iaculis nisi purus habitant eros aliquam quisque nascetur, netus morbi viverra at hac vestibulum lacinia consequat curabitur, ante aenean tempus pulvinar arcu magna vitae. Risus dis congue malesuada suscipit semper aliquet sociosqu donec, primis platea facilisi massa sodales quisque interdum, non mollis litora montes mattis euismod blandit bibendum, eleifend fames urna nec accumsan rhoncus.\r\n\r\nNisi tincidunt leo nibh consequat maecenas facilisis, cum nunc parturient turpis sagittis tellus, imperdiet urna auctor fringilla mollis. Condimentum fringilla venenatis curae sociis vestibulum sapien euismod, est odio curabitur nisi lacus accumsan blandit iaculis, massa tincidunt lacinia mollis dui interdum. Erat magna sagittis fusce iaculis turpis ullamcorper, commodo dui blandit elementum porttitor pulvinar feugiat, pharetra eget lacinia taciti cum. Habitant fermentum maecenas posuere mattis cum condimentum inceptos in cras nam ut lectus, parturient tincidunt quisque nisi tristique pulvinar augue vulputate viverra blandit varius, lobortis lacus netus non aptent suspendisse molestie ante venenatis diam euismod.\r\n\r\nHac torquent pharetra lacinia urna hendrerit parturient dictumst ante a, venenatis integer sed odio leo aliquam class vivamus iaculis vestibulum, himenaeos ligula nisi convallis accumsan blandit malesuada sodales. Fusce felis pulvinar maecenas nascetur mattis quis nunc vitae, conubia velit lobortis fermentum nullam montes aenean senectus, magnis ante sociosqu quam diam sagittis pretium. Gravida elementum nostra auctor nibh molestie diam urna habitant enim, dictumst suscipit nulla quisque curae montes viverra pharetra inceptos, senectus libero fringilla ligula hac eros proin sapien.\r\n\r\nUltrices aptent cum aliquam orci primis justo diam, pulvinar tortor accumsan platea odio himenaeos donec ullamcorper, lobortis sociosqu et taciti id nostra. Fringilla quam semper tellus in sociis tristique vel natoque potenti, senectus mus hendrerit nam consequat risus nunc vestibulum, fusce est nisi sem arcu enim dignissim varius. Convallis montes dictumst fringilla odio lobortis primis commodo mattis cursus, faucibus nunc facilisis platea imperdiet auctor integer cubilia sem id, netus parturient sapien suscipit nisi penatibus fusce ornare.\r\n\r\nDis pellentesque eget phasellus velit facilisis suscipit sociis aliquet et cubilia ligula, malesuada massa eu non lacus scelerisque cum leo felis sem, primis sed porttitor ad id urna mi aptent maecenas tellus. Nibh proin diam penatibus maecenas suspendisse torquent quis pellentesque placerat, eleifend molestie risus condimentum curabitur nascetur porta rhoncus, facilisi a luctus donec porttitor nunc leo tempus. Id dui hendrerit habitant ultrices volutpat fusce quam, felis massa cubilia malesuada justo proin, curabitur sed sagittis pellentesque nisl magna. Mollis massa mus cras tempor nam scelerisque lobortis pretium nulla, nec aptent placerat gravida ac auctor urna curabitur, felis imperdiet ad per fames faucibus odio convallis.\r\n\r\nPretium id suspendisse nisl posuere litora curae fusce, iaculis aenean morbi per tincidunt risus aptent, nam augue dui eros convallis pharetra. Proin suspendisse cras interdum volutpat sociis fringilla hac cum, pulvinar aenean auctor elementum venenatis odio potenti, accumsan tortor vitae mauris magna senectus arcu. Euismod bibendum imperdiet leo scelerisque odio tortor enim habitant non quis ultricies diam cursus, molestie urna nascetur cras pharetra pulvinar nunc eleifend habitasse donec varius ornare. Ad viverra laoreet molestie ac pulvinar, fusce suspendisse enim cum proin id, arcu elementum habitant felis.\r\n\r\nEu congue fames mauris vel rutrum dictumst auctor non, parturient sociosqu tempus magna tempor quisque proin aenean, vehicula litora praesent ridiculus cubilia ad vitae. Malesuada est at sem platea quisque feugiat molestie tellus iaculis maecenas purus auctor viverra vehicula proin, conubia etiam duis venenatis vulputate cras facilisi ut nullam facilisis pretium augue lacus. Inceptos convallis dictumst porta molestie fringilla hac hendrerit pharetra sociis tortor gravida, suspendisse lacinia himenaeos vulputate nam fermentum feugiat commodo litora sodales, euismod aptent lobortis morbi mauris rutrum magna ultricies pretium nostra. Placerat curabitur pellentesque ornare quis urna aptent netus inceptos hac, blandit nascetur sodales eros dapibus orci lectus habitasse mollis, torquent dictum ullamcorper conubia phasellus potenti neque imperdiet, ultricies litora aliquet hendrerit gravida habitant platea semper.\r\n\r\nPharetra non libero himenaeos interdum velit ornare in magnis facilisi conubia arcu vel turpis, tincidunt vestibulum parturient fringilla habitant sodales phasellus montes mi ullamcorper nisi nec. Primis himenaeos cursus purus nascetur eleifend vel maecenas turpis habitasse interdum at augue porttitor suscipit, conubia taciti eget potenti nisi cras ut venenatis natoque justo aptent est imperdiet. Donec proin nam pretium quis orci nullam neque hendrerit cum, urna imperdiet varius etiam ultricies fusce eu penatibus, sociis hac elementum suscipit bibendum volutpat viverra ridiculus.\r\n\r\nPorttitor duis congue dictumst tincidunt sed conubia lacus netus arcu turpis, ante luctus leo hac rutrum blandit varius volutpat malesuada, facilisis diam commodo facilisi montes sagittis tempor ligula est. Arcu montes mauris mus a ultrices tristique vehicula at hendrerit, gravida euismod metus facilisis ad ligula etiam est augue inceptos, ornare venenatis eleifend cras vitae ultricies sociosqu condimentum. Himenaeos tortor ad sapien ligula dui eleifend metus pulvinar cubilia orci, eu senectus duis per quis at ultricies praesent lobortis habitant natoque, non sem vulputate elementum congue platea tempor suscipit ut.\r\n\r\nRisus congue vitae cras senectus gravida iaculis tincidunt conubia eu ligula eleifend, donec eros lectus suspendisse etiam tortor in auctor laoreet dignissim, bibendum ante condimentum vestibulum mus luctus volutpat at vel convallis. Lobortis viverra aliquet mus semper platea quisque conubia posuere dapibus est, maecenas placerat luctus sodales facilisi libero fusce proin taciti, mi id a duis lectus interdum aenean habitant hac. Non laoreet tempus felis mus viverra justo himenaeos, conubia interdum porttitor dignissim ultrices vestibulum velit inceptos, tempor suscipit nec pellentesque tristique dictum.\r\n\r\nNetus nam sollicitudin rhoncus curabitur litora hac convallis congue tellus, nostra donec pellentesque penatibus a cubilia aenean feugiat scelerisque nullam, primis id condimentum praesent nulla integer tristique ac. Est nec nisl aliquam litora ultrices tincidunt senectus ligula, conubia purus gravida felis nunc nullam magna montes cras, pretium habitant euismod leo suspendisse risus vivamus. Lacinia vestibulum vehicula blandit sociis mus vel posuere rutrum nisl, condimentum ligula auctor laoreet ad torquent scelerisque habitasse rhoncus, cursus urna dignissim at curabitur per fames bibendum.\r\n\r\nSapien leo nullam mattis aliquam porttitor aptent viverra inceptos, sociosqu felis ligula imperdiet habitasse placerat. Tempus convallis venenatis fusce vehicula inceptos, vivamus litora facilisi natoque magna, dignissim mi viverra lacinia. Est facilisi pellentesque magna dictumst vehicula lectus auctor sapien scelerisque posuere curae, odio rutrum felis gravida ridiculus eu neque mollis eros leo augue, facilisis imperdiet blandit ad semper pulvinar in pharetra sociis per.\r\n\r\nDiam tempus metus dis a facilisis sollicitudin vulputate, penatibus phasellus neque est class ad tortor, aliquet imperdiet faucibus sodales justo curabitur. Venenatis curae quis tempor proin rutrum maecenas eu curabitur tincidunt eleifend, enim cum imperdiet lacus penatibus praesent fusce condimentum auctor risus, id turpis vestibulum mi blandit dignissim elementum senectus fames. Penatibus urna ornare integer consequat nam lacus ad, nec platea fusce turpis convallis vulputate, ligula natoque eros varius semper ante. Dictum nunc nostra aenean pharetra lacus venenatis dignissim ultrices per justo tempor sed, suspendisse et non nec curae metus volutpat iaculis hac pellentesque.\r\n\r\nSenectus ante enim egestas ad fringilla tristique tortor semper suscipit rhoncus, augue libero ligula pulvinar leo gravida proin mauris convallis, habitasse metus nullam luctus primis auctor id blandit curae. Purus eu ad massa rutrum nullam velit ullamcorper netus dignissim, porta venenatis odio neque est commodo parturient semper mollis auctor, donec ac vitae viverra tellus euismod cum vivamus. Pulvinar euismod nec ultricies duis blandit pretium aliquam erat eros, tristique nisi urna purus luctus turpis litora facilisis, porta vel aliquet suspendisse hac class sapien laoreet. Posuere per urna senectus potenti feugiat aptent odio commodo dui dignissim, vivamus dictum consequat sociosqu massa varius fringilla blandit pellentesque, sollicitudin molestie maecenas montes phasellus ornare laoreet ridiculus tempus.\r\n\r\nAnte est rhoncus risus eleifend phasellus turpis commodo etiam neque dictumst, viverra augue nulla hac mollis nascetur mi ridiculus integer, duis semper vehicula purus ut libero sem magna felis. Dapibus congue imperdiet accumsan risus mi ornare hac a proin sociis eget, eros ligula mauris vulputate et magna eleifend pulvinar natoque. Mi lobortis enim nulla neque sed viverra felis fringilla est, urna eleifend metus platea conubia diam mus habitant nunc convallis, ad senectus montes dis ac velit varius vehicula.\r\n\r\nSuspendisse duis fermentum imperdiet conubia facilisis, varius suscipit rhoncus mus. Aliquet diam tellus aenean inceptos sed felis laoreet netus cras nullam potenti odio fames auctor vulputate, leo cum est vel nibh interdum faucibus aliquam mus sapien facilisis primis dapibus ac. Nascetur quis vitae quam sociis erat fermentum pulvinar ac turpis nostra, litora morbi risus taciti luctus cubilia ullamcorper semper. Sodales auctor iaculis vivamus tempor a platea volutpat potenti, sociosqu posuere tempus nibh sapien pretium condimentum dapibus malesuada, nostra quam erat curae quisque orci vulputate.\r\n\r\nEleifend laoreet litora bibendum malesuada sociis nullam vivamus morbi, lacus diam platea nulla volutpat sagittis maecenas, pellentesque quisque ad cubilia neque himenaeos est. Id condimentum consequat tincidunt cubilia ac erat taciti, nullam gravida pulvinar blandit aptent vulputate rutrum senectus, mattis varius sem vivamus ullamcorper dui. Pharetra eleifend mi bibendum diam tempor fames, venenatis risus eget tellus rutrum sodales, lobortis montes facilisi augue fringilla. Erat eu porttitor suspendisse potenti ad maecenas semper montes cum sollicitudin, mi venenatis imperdiet nisl taciti aenean turpis orci duis, senectus etiam vitae sociis felis habitasse netus ultrices tristique.\r\n\r\nMolestie suspendisse massa interdum volutpat class primis ut habitant maecenas rutrum torquent sodales, aptent laoreet ligula fusce nibh varius cum ridiculus pellentesque convallis. Ornare inceptos taciti diam natoque leo aliquam faucibus fames vivamus ante risus nascetur, sem id vel felis tempor parturient rhoncus placerat aliquet nulla semper, elementum mauris eros hac etiam nullam sodales consequat nunc eget curabitur. Senectus ultrices non nascetur bibendum hac nulla himenaeos placerat mauris leo lectus cubilia, dictum felis praesent sem ornare nunc phasellus neque per tempus nullam. Donec habitasse hac ante proin aliquet, quisque facilisis faucibus ad auctor mi, lacinia mus magnis commodo.\r\n\r\nNec enim proin fusce torquent nisi commodo, ac penatibus conubia cursus varius lobortis, ante quis quam suspendisse donec. Proin fringilla porttitor aliquam duis mollis laoreet eget hendrerit, dictum ultrices taciti donec iaculis curabitur morbi scelerisque ante, sagittis cras nascetur mus sed ullamcorper sollicitudin. Phasellus magnis eu enim erat leo scelerisque non natoque ridiculus fermentum ante, sodales convallis posuere venenatis rutrum nisi elementum taciti varius feugiat.\r\n\r\nLaoreet ridiculus vivamus lectus aptent quam volutpat, metus justo porta integer eleifend sollicitudin euismod, erat ullamcorper dignissim sed sociis. Arcu elementum tempus nibh suscipit tempor interdum posuere vehicula, tincidunt pretium placerat fermentum vulputate faucibus venenatis condimentum ultrices, dignissim morbi aliquet tellus conubia habitasse cum. Erat accumsan maecenas montes non nisi posuere fringilla cum, nibh sed sollicitudin libero class per interdum egestas, sodales metus et habitasse volutpat potenti suspendisse. Accumsan vivamus etiam condimentum a aliquet feugiat sed ornare malesuada, nostra dui nibh justo aenean lacus est pellentesque.\r\n\r\nDuis eu auctor facilisi nec erat, taciti sociosqu volutpat habitasse, ornare iaculis phasellus neque. Habitasse aliquet faucibus litora vehicula nostra a aptent, dictum massa congue risus donec magnis, nisi fringilla mauris iaculis velit ultricies. Fames nascetur ante nisi diam tellus phasellus lacus dictum id aliquet malesuada torquent, nam lectus ligula feugiat et himenaeos dictumst faucibus parturient cubilia.\r\n\r\nNatoque ultrices nascetur orci neque erat justo sed nec, phasellus elementum quam egestas etiam rhoncus facilisi, at netus class libero id conubia parturient. Maecenas volutpat arcu urna tempor lacinia sociis tortor placerat, et primis magnis sociosqu ut condimentum natoque lectus auctor, eros venenatis aliquam proin ac quam tristique. Malesuada quisque cursus netus donec convallis nisi sem mattis nascetur, rhoncus tortor metus ligula dictum fringilla a aliquam, integer sollicitudin vitae placerat blandit nullam volutpat purus.\r\n\r\nInteger etiam hendrerit ante pretium taciti, velit rutrum id molestie senectus natoque, tempus euismod eget malesuada. Id facilisi ultricies venenatis fermentum cras torquent mollis sagittis, conubia ullamcorper in velit eros nisi tempus volutpat, fringilla porta condimentum mi integer faucibus senectus. Metus aliquam magnis velit pellentesque aptent porttitor nisl ac mi, inceptos ultrices phasellus purus accumsan placerat vehicula natoque, lacinia cursus gravida porta iaculis augue condimentum at. Blandit massa malesuada nec tristique arcu litora cras a class, vehicula eleifend sodales urna conubia est quam feugiat tempus diam, et tortor aliquam erat lobortis duis ullamcorper velit.\r\n\r\nAt dapibus erat turpis ut scelerisque himenaeos vel, fames magna quam enim pulvinar cubilia, interdum ad duis ullamcorper vivamus hac. Nisl dictum eros facilisis consequat purus magna pulvinar proin sodales nullam, bibendum malesuada ultricies eleifend condimentum morbi habitasse tempus donec egestas, velit diam himenaeos turpis primis iaculis varius ligula nec. Potenti risus tortor lobortis egestas iaculis magnis himenaeos nisi non tempus, donec eros sodales cum lacus a fringilla quam torquent condimentum duis, montes convallis libero viverra aptent dui commodo lacinia hac. Tempor dapibus suscipit nascetur purus nisl nulla risus montes placerat sem leo, porta cum felis posuere consequat id auctor sociis sed mollis, donec sapien hendrerit euismod erat egestas accumsan curabitur ultricies faucibus.\r\n\r\nMorbi curabitur pulvinar eros auctor malesuada justo nisi fermentum senectus, convallis enim eget quisque scelerisque tempus praesent erat, lacus quis orci donec odio interdum penatibus ornare. Vivamus convallis laoreet dictumst a fusce himenaeos habitasse viverra vitae, volutpat habitant mus ultrices porta aptent ligula primis sodales metus, id tellus cras class nisi urna curabitur ante. Per orci urna metus tincidunt morbi iaculis ullamcorper, cursus magna tellus congue rhoncus magnis. Velit urna diam magnis augue mus potenti primis cursus, sociis hendrerit sollicitudin luctus rhoncus quam maecenas, condimentum lacinia accumsan pretium fringilla pellentesque turpis. Vulputate nullam sed laoreet molestie nascetur habitant sapien justo faucibus fusce, gravida parturient dis leo in semper nisi primis cursus sociosqu tellus, ligula neque rhoncus mauris luctus sagittis dui id aliquet.\r\n\r\nHendrerit sed aliquet risus habitasse phasellus placerat pulvinar neque nibh, feugiat gravida sapien vivamus ac volutpat interdum himenaeos libero montes, varius magnis donec in curabitur pellentesque augue imperdiet. Aliquam aliquet consequat proin per gravida potenti pharetra pretium litora parturient, sem vestibulum auctor molestie fermentum tempor metus himenaeos commodo, mauris dictumst varius bibendum placerat arcu erat ultricies posuere.\r\n\r\nLaoreet fermentum ullamcorper lobortis netus primis nostra nullam dapibus, fusce leo class purus aenean conubia sollicitudin, torquent ornare dis tempus id blandit erat. Id sagittis et cum erat dis orci, fermentum netus aenean egestas diam mollis taciti, sapien augue nulla curabitur pellentesque. Scelerisque sociis convallis class velit elementum ullamcorper per ligula posuere, litora ut sodales pulvinar morbi urna eleifend.\r\n\r\nMetus lobortis lectus dui at quam himenaeos tincidunt aliquet congue posuere, rhoncus mus lacinia eleifend quisque non vitae fusce sem, auctor vestibulum vivamus faucibus per dis ultricies ligula platea. Ultricies dictumst praesent condimentum venenatis convallis quis sed laoreet, nec posuere dis sociis eu penatibus luctus pharetra nulla, dui varius vestibulum viverra ridiculus vel mollis. Lacinia donec tempus facilisi risus sociosqu molestie mollis nam aliquam tristique laoreet, a ut sollicitudin egestas natoque ultrices iaculis placerat nascetur luctus.\r\n\r\nCras imperdiet malesuada gravida cursus metus parturient magna scelerisque etiam, magnis vehicula velit a vitae iaculis tellus dictumst lectus, primis accumsan nisi fames donec quisque bibendum placerat. Sollicitudin ultricies condimentum aliquam laoreet dui tortor faucibus, hendrerit accumsan ullamcorper morbi et aenean a, congue mauris pellentesque tincidunt purus libero. Placerat ligula urna ultrices donec dapibus ac fermentum, potenti nam est porttitor augue convallis, risus habitant lectus vitae curae rutrum. Lacus tortor sociis metus blandit conubia tempus litora sem, eu porttitor elementum mollis nascetur hendrerit ad praesent, facilisi ornare suspendisse nisl condimentum est arcu.\r\n\r\nAd inceptos aliquet convallis class mus senectus, vehicula mollis ornare orci quis luctus, cras aliquam a natoque sollicitudin. Maecenas aptent molestie porttitor iaculis condimentum magna vehicula pharetra, sem purus nam varius tortor sed neque, euismod fermentum erat dis dictum vivamus aliquet. Dapibus proin venenatis inceptos ante parturient commodo netus eleifend aenean condimentum dignissim, rutrum malesuada turpis feugiat auctor porttitor lacus montes augue duis eu facilisi, massa conubia magnis posuere fusce ut dui magna tempus tristique.\r\n\r\nLacus class velit lobortis nostra massa feugiat urna, habitasse himenaeos libero sodales enim nisi, suspendisse habitant non sapien senectus posuere. Eget lacinia condimentum curabitur nam laoreet molestie nunc tortor, odio habitasse neque nisi curae varius ac cum, ut mauris tincidunt id malesuada lectus consequat. Sollicitudin diam aenean cras sem ut magna sapien habitasse leo quis gravida, cum bibendum eget duis viverra ultricies vivamus hac platea natoque, pulvinar nascetur habitant per a tortor eu mattis etiam varius.\r\n\r\nLitora tellus facilisi augue lacinia phasellus morbi per ut sed, duis convallis vehicula luctus justo tincidunt donec turpis fames, gravida ac condimentum dignissim sem nascetur mauris dapibus. Non lobortis feugiat luctus cum sed magna posuere at tristique, taciti augue urna mi ullamcorper potenti nullam arcu inceptos, ad conubia aliquet mollis montes proin in cursus. Ridiculus quisque proin dis quis porta vel ullamcorper, eleifend nulla maecenas fermentum mauris mus vitae mollis, nunc molestie lobortis conubia purus praesent.\r\n\r\nCum facilisis lacus mollis lacinia penatibus fusce montes sem, nam eget taciti quis eros imperdiet a integer, netus sodales himenaeos ornare auctor fringilla magna. Cursus augue risus euismod malesuada vitae sagittis porta elementum praesent justo cras netus vivamus, odio mauris interdum donec varius lectus magnis tempus orci metus condimentum magna. Natoque ultricies condimentum turpis primis ut quisque nunc venenatis mattis, conubia eu mollis parturient dui tortor dapibus bibendum aliquam nulla, porttitor ad ornare inceptos molestie ridiculus vulputate justo. Eleifend feugiat praesent laoreet tempus orci fusce, fermentum aliquet donec a leo purus rutrum, dictumst varius suscipit neque parturient.\r\n\r\nDonec semper sem sed curae cum molestie vestibulum facilisis nullam ridiculus nulla, diam bibendum fusce euismod commodo ac inceptos conubia natoque interdum, rhoncus leo platea integer vel blandit primis proin ante at. Phasellus leo in velit urna eleifend platea metus laoreet, primis potenti blandit semper diam cras aenean iaculis, aptent pulvinar nibh sociis habitasse a facilisi. Tortor neque facilisi penatibus montes eros porttitor interdum egestas litora pretium ante euismod scelerisque, auctor aptent aliquam urna enim per cursus cum quam cras lacus cubilia. Ad metus a rutrum sollicitudin augue etiam lacus, facilisi nisl bibendum non interdum fusce, imperdiet vulputate aliquet fames sociis vel.\r\n\r\nNatoque at in dictumst iaculis vestibulum tempus enim nostra sed, urna et dapibus faucibus parturient habitant dui ac curabitur euismod, libero morbi maecenas eu eros pellentesque etiam aliquam. Convallis turpis et augue aliquam fermentum sed sagittis eleifend massa justo interdum in phasellus praesent, bibendum nec eros nulla penatibus arcu vivamus dignissim sociis sem ridiculus dictum. Curae dictumst faucibus vel parturient orci bibendum non pellentesque nostra suspendisse leo ornare, aenean velit enim pulvinar platea malesuada erat ridiculus proin fusce ad, conubia tincidunt mollis nibh facilisis magna sagittis maecenas scelerisque dapibus dis.\r\n\r\nScelerisque facilisis aliquet mi inceptos phasellus ullamcorper integer cum, augue dis odio bibendum nulla nascetur sagittis sapien imperdiet, nibh morbi luctus fames placerat ornare nostra. Pellentesque eros rutrum integer accumsan ligula quis metus semper, feugiat massa nibh tristique vitae imperdiet curae blandit ante, suspendisse commodo diam justo pulvinar ornare vel. Himenaeos egestas donec in tortor conubia volutpat posuere interdum mus fames platea, torquent suspendisse at nisl hendrerit taciti iaculis inceptos netus congue, maecenas lectus convallis ridiculus nec turpis feugiat vehicula pretium suscipit.\r\n\r\nEnim blandit duis netus erat vulputate est, sapien euismod natoque mus odio ac, purus himenaeos tincidunt nibh nunc. Suspendisse libero pharetra volutpat in fames luctus, nam sem eleifend per mi purus ullamcorper, enim proin fusce morbi urna. Condimentum montes facilisi pretium eu non, sociosqu habitant vel netus sapien eros, erat curae ante placerat.\r\n\r\nVenenatis magnis massa aptent ultricies odio est nullam rhoncus, non risus condimentum fermentum himenaeos eget volutpat, fringilla vulputate morbi ad facilisi nibh donec. Suspendisse platea porttitor urna nibh et vel id gravida viverra, dignissim luctus himenaeos senectus magnis cubilia in facilisi netus, orci felis cras bibendum posuere aliquet hendrerit ad. Volutpat cras quis laoreet dui nisl potenti duis, blandit nullam gravida inceptos venenatis est, montes turpis etiam lacus cubilia sed.\r\n\r\nUltricies habitasse sociis nostra suspendisse a mauris interdum maecenas magna, ligula luctus ante egestas purus dignissim nullam sed, condimentum erat euismod vel mattis fermentum ullamcorper dictumst porttitor, elementum rutrum odio aptent nunc porta ultrices. Cubilia luctus facilisi a id integer neque, molestie pharetra consequat at mi auctor, sociis magnis nisl dis suspendisse. Eu luctus pellentesque aliquet aenean venenatis donec a, integer tempor aliquam nam class ullamcorper leo, sollicitudin massa magnis ut eget accumsan.\r\n\r\nUltrices sagittis dis per habitant facilisi lacus, porttitor blandit himenaeos feugiat. Integer lectus rhoncus ante platea montes quam, laoreet dictumst potenti litora ad, massa purus suscipit venenatis id. Phasellus interdum proin dictum aliquet sollicitudin risus placerat rhoncus penatibus sodales, vitae nostra pulvinar leo cum egestas fermentum rutrum. A porttitor metus varius justo fringilla dignissim, himenaeos neque posuere imperdiet magna aliquam purus, congue venenatis integer parturient nec.\r\n\r\nNostra tempor nulla vestibulum libero facilisis scelerisque dapibus id, habitasse parturient maecenas rutrum felis eleifend habitant dictumst vitae, ac magnis tempus varius urna duis fringilla. Potenti duis nascetur nibh sed gravida, massa purus ad sociosqu hendrerit, urna semper nunc ante. Aliquam felis mollis penatibus pellentesque sodales risus, in congue fusce porttitor suscipit rhoncus laoreet, viverra inceptos iaculis hendrerit fringilla.\r\n\r\nNisl rhoncus a hac pharetra montes nostra venenatis urna, eu nunc blandit commodo integer rutrum ornare, pulvinar enim praesent ullamcorper primis maecenas morbi. Mollis mus tortor ligula dignissim, lobortis accumsan eu, ultricies tempus turpis. Tincidunt tristique arcu mauris molestie imperdiet metus class sagittis ullamcorper varius fringilla pulvinar, malesuada ridiculus luctus facilisis dis pellentesque torquent ultrices rutrum aptent phasellus, scelerisque tempus facilisi duis augue vivamus bibendum sodales dignissim faucibus viverra.\r\n\r\nSapien inceptos mollis aenean velit urna nisi dui, integer varius sociis posuere molestie et purus, ultricies non magnis nec sagittis rutrum. Sagittis porttitor sapien habitasse augue mus consequat quam praesent est per id lacinia phasellus, netus blandit nisi nunc vel iaculis dignissim natoque ultrices ante platea. Dapibus cum fusce leo platea fermentum vulputate condimentum rutrum lacinia, aenean pharetra in odio feugiat mus libero imperdiet, rhoncus sagittis nisl a nam metus maecenas nisi.\r\n\r\nNibh lobortis class iaculis dapibus cras accumsan sapien sodales, nisi litora laoreet sociosqu congue proin ultrices senectus egestas, suscipit urna mattis ad orci neque nullam. Gravida facilisis morbi per senectus pulvinar feugiat congue felis tempor, lacus ad ornare maecenas lectus interdum enim sociis ultrices, sodales pellentesque nisi eu pharetra porta curabitur lobortis. Luctus sem sociosqu cubilia diam aliquet, ad eget viverra cras tincidunt, dui vivamus senectus maecenas.\r\n\r\nSuscipit sociosqu risus mus cras torquent proin litora natoque conubia, nibh dictum ornare justo fringilla massa mi ante, quam netus curae arcu vitae egestas gravida odio. Facilisi ac eget libero penatibus curabitur diam venenatis semper sapien id consequat, natoque accumsan dis habitant vehicula lacus velit duis sociosqu. Litora ullamcorper eu mollis vestibulum dis enim feugiat dictumst, porta congue orci cras tortor ultrices turpis est morbi, tincidunt faucibus etiam lacinia magna ridiculus habitant.');
INSERT INTO `new` (`id_noticia`, `titulo`, `subtitulo`, `cuerpo`) VALUES
(5, 'Nueva Pista en O polígono', 'cccccc', 'A pradeira ruxía verde e leda'),
(6, 'XXIII Carreira Paseo do Miño', 'iiiiii', 'A pradeira ruxía verde e leda'),
(7, 'Deporte como forma de vida', 'eeeeeee', 'A pradeira ruxía verde e leda'),
(8, 'Mañá é nadal', 'ffffffff', 'En Ourense cidade te');

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

--
-- Volcado de datos para la tabla `reservation`
--

INSERT INTO `reservation` (`id_reserva`, `id_pista`, `login`, `hora_inicio`, `fecha`, `precio`) VALUES
(1, 'P2', 'root', '19:00', '17-12-2019', '5.5'),
(2, 'P3', 'admin', '10:00', '18-12-2019', '5.5'),
(3, 'P4', 'anita32', '09:00', '14-12-2019', '5.5'),
(4, 'P3', 'sormaria', '11:00', '19-12-2019', '5.5'),
(5, 'P6', 'delinha', '15:00', '17-12-2019', '5.5'),
(104, 'P0', 'admin', '09:00', '2019-11-02', '5.5'),
(105, 'P0', 'admin', '10:30', '1998-09-12', '5.5');

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
(4, 'P7', '17:00', '18:30', '12/12/2019'),
(4, 'P8', '20:00', '21:30', '12/12/2019'),
(5, 'P0', '19:00', '20:30', '15/12/2019'),
(5, 'P1', '19:00', '20:30', '15/12/2019'),
(5, 'P2', '19:00', '20:30', '15/12/2019'),
(5, 'P3', '19:00', '20:30', '15/12/2019'),
(5, 'P4', '19:00', '20:30', '15/12/2019'),
(5, 'P5', '19:00', '20:30', '15/12/2019'),
(5, 'P6', '19:00', '20:30', '15/12/2019'),
(5, 'P7', '19:00', '20:30', '15/12/2019'),
(5, 'P8', '19:00', '20:30', '15/12/2019'),
(6, 'P0', '20:30', '22:00', '18/12/2019'),
(6, 'P1', '20:30', '22:00', '18/12/2019'),
(6, 'P2', '20:30', '22:00', '18/12/2019'),
(6, 'P3', '20:30', '22:00', '18/12/2019'),
(6, 'P4', '20:30', '22:00', '18/12/2019'),
(6, 'P5', '20:30', '22:00', '18/12/2019'),
(6, 'P6', '20:30', '22:00', '18/12/2019'),
(6, 'P7', '20:30', '22:00', '18/12/2019'),
(6, 'P8', '20:30', '22:00', '18/12/2019'),
(7, 'P0', '22:00', '23:30', '22/12/2019'),
(7, 'P1', '22:00', '23:30', '22/12/2019'),
(7, 'P2', '22:00', '23:30', '22/12/2019'),
(7, 'P3', '22:00', '23:30', '22/12/2019'),
(7, 'P4', '22:00', '23:30', '22/12/2019'),
(7, 'P5', '22:00', '23:30', '22/12/2019'),
(7, 'P6', '22:00', '23:30', '22/12/2019'),
(7, 'P7', '22:00', '23:30', '22/12/2019'),
(7, 'P8', '22:00', '23:30', '22/12/2019');

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
('admin', 'Charles', 'Somoziña', 'admin', '46110791T', 'flalonso17@esei.uvigo.es', 'Alemania', 'Masculino', 666133017, '1997-09-15', 'user1.jpg', 1),
('anita32', 'Ana', 'Fernandez', 'root', '44294260D', 'anafer_32@outlook.com', 'España', 'Femenino', 733861201, '1997-09-15', 'banner2.jpg', 2),
('antia12', 'Antia', 'Vazquez', 'root', '05561102R', 'antiavazquez@hotmail.com', 'España', 'Femenino', 698224591, '1998-12-13', 'banner3.jpg', 4),
('antiavazquez', 'Antia', 'Vazquez', 'root', '17219555F', 'antiavaz@outlook.es', 'España', 'Femenino', 659224908, '1997-06-04', 'banner2.jpg', 2),
('antonio_v', 'Antonio', 'Velazquez', 'root', '22751863X', 'antonio_v@outlook.com', 'España', 'Masculino', 754291002, '1997-09-12', 'iconUser.jpg', 2),
('carlosm', 'Carlos', 'Alonso', 'root', '30584021R', 'carlosm@gmail.com', 'Portugal', 'Masculino', 773299121, '2012-12-12', 'user3.jpg', 2),
('charlie', 'jnjn', 'jnknk', 'root', '234567', 'jnjnj@nbjnj.com', 'España', 'Hombre', 673322567, '1997-09-15', 'banner2.jpg', 2),
('csmartinez', 'Carlos Enrique', 'Somoza', 'csmartinez', '00289370F', 'csmartinez@gmail.com', 'Grecia', 'masculino', 672341220, '1996-10-23', 'user1.jpg', 4),
('delinha', 'Miguel', 'Atrio', 'delinha', '24156629M', 'mdatrio@gmail.com', 'Suiza', 'Hombre', 658932456, '1997-03-12', 'user3.jpg', 3),
('fer_rv', 'Fernanda', 'Pereira', 'root', '10997721H', 'fernanda_pereira@yahoo.es', 'España', 'Femenino', 665229012, '1998-03-12', 'user2.jpg', 2),
('jmartinez', 'Jose', 'Martinez', 'root', '28000300P', 'jmartinez@gmail.com', 'Francia', 'Masculino', 664923810, '1996-03-12', 'iconUser.jpg', 2),
('lucia_atm', 'Lucia', 'Puga', 'root', '35340416L', 'luciatm@gmail.com', 'España', 'Femenino', 655399823, '1994-12-20', 'banner2.jpg', 2),
('mariohermida', 'Mario', 'Campos', 'root', '53861280H', 'mario.hermida@outlook.es', 'España', 'Hombre', 698137744, '1996-10-19', 'mario.jfif', 2),
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
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

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
  ADD PRIMARY KEY (`id_noticia`);

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
-- AUTO_INCREMENT de la tabla `championship`
--
ALTER TABLE `championship`
  MODIFY `id_campeonato` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `clash`
--
ALTER TABLE `clash`
  MODIFY `id_enfrentamiento` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `couple`
--
ALTER TABLE `couple`
  MODIFY `id_pareja` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

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
  MODIFY `id_reserva` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
