-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2017 a las 07:17:42
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aparcamiento`
--

CREATE TABLE `aparcamiento` (
  `id` int(11) NOT NULL,
  `plazas` int(11) NOT NULL,
  `espacio` int(11) NOT NULL,
  `universidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coche`
--

CREATE TABLE `coche` (
  `matricula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `acientos` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `coche`
--

INSERT INTO `coche` (`matricula`, `modelo`, `color`, `acientos`, `usuario`, `marca`, `categoria`) VALUES
('11111', '10', 'BLANCO', 2, 'occ10@alu.ua.es', 'A15', 'TURISMO'),
('3214BKK', '10', 'BLANCO', 2, 'occ10@alu.ua.es', 'A15', 'TURISMO'),
('auxx', '10', 'BLANCO', 2, 'aux@aux.com', 'A15', 'TURISMO'),
('nnnn', '10', 'BLANCO', 2, 'yo@hotmail.com', 'A15', 'TURISMO'),
('usuario1', '10', 'BLANCO', 2, 'usuario1@gamail.com', 'A15', 'TURISMO'),
('usuario10', '10', 'BLANCO', 2, 'usuario10@gamail.com', 'A15', 'TURISMO'),
('usuario11', '10', 'BLANCO', 2, 'usuario11@gamail.com', 'A15', 'TURISMO'),
('usuario12', '10', 'BLANCO', 2, 'usuario12@gamail.com', 'A15', 'TURISMO'),
('usuario13', '10', 'BLANCO', 2, 'usuario13@gamail.com', 'A15', 'TURISMO'),
('usuario2', '10', 'BLANCO', 2, 'usuario2@gamail.com', 'A15', 'TURISMO'),
('usuario3', '10', 'BLANCO', 2, 'usuario3', 'A15', 'TURISMO'),
('usuario4', '10', 'BLANCO', 2, 'usuario4@gamail.com', 'A15', 'TURISMO'),
('usuario5', '10', 'BLANCO', 2, 'usuario5@gamail.com', 'A15', 'TURISMO'),
('usuario6', '10', 'BLANCO', 2, 'usuario6@gamail.com', 'A15', 'TURISMO'),
('usuario7', '10', 'BLANCO', 2, 'usuario7@gamail.com', 'A15', 'TURISMO'),
('usuario8', '10', 'BLANCO', 2, 'usuario8@gamail.com', 'A15', 'TURISMO'),
('usuario9', '10', 'BLANCO', 2, 'usuario9@gamail.com', 'A15', 'TURISMO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comenta`
--

CREATE TABLE `comenta` (
  `usuarioA` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `usuarioB` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realizaruta`
--

CREATE TABLE `realizaruta` (
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `coche` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `realizaruta`
--

INSERT INTO `realizaruta` (`usuario`, `coche`, `ruta`) VALUES
('yo@hotmail.com', 'nnnn', 7),
('yo@hotmail.com', 'nnnn', 8),
('aux@aux.com', 'auxx', 9),
('usuario1@gamail.com', 'usuario1', 12),
('usuario2@gamail.com', 'usuario2', 13),
('usuario3', 'usuario3', 14),
('usuario4@gamail.com', 'usuario4', 15),
('usuario5@gamail.com', 'usuario5', 16),
('usuario6@gamail.com', 'usuario6', 17),
('usuario7@gamail.com', 'usuario7', 18),
('usuario8@gamail.com', 'usuario8', 19),
('usuario9@gamail.com', 'usuario9', 20),
('usuario10@gamail.com', 'usuario10', 21),
('usuario11@gamail.com', 'usuario11', 22),
('usuario12@gamail.com', 'usuario12', 24),
('usuario13@gamail.com', 'usuario13', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE `ruta` (
  `id` int(11) NOT NULL,
  `plazas` int(11) NOT NULL,
  `plazasOcupadas` int(11) NOT NULL DEFAULT '0',
  `origen` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `detalles` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `fechaPublicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ruta`
--

INSERT INTO `ruta` (`id`, `plazas`, `plazasOcupadas`, `origen`, `detalles`, `precio`, `fechaPublicacion`) VALUES
(1, 3, 0, 'Elche', 'ejemplo detalle', '3', '2017-04-20'),
(2, 3, 0, 'Torrevieja', 'Ejemplo entrada', '3', '2017-04-20'),
(4, 3, 0, 'Elche', 'aaaaa', '3', '2017-04-20'),
(5, 3, 1, 'Murcia', 'aaaaaaaaaaaaaaaaaaaa', '3', '2017-04-21'),
(6, 4, 2, 'Torrevieja', 'bggggg', '2', '2017-04-21'),
(7, 1, 1, 'Elche', 'dddddd', '3', '2017-07-06'),
(8, 2, 0, 'Altet', '222', '4', '2017-07-09'),
(9, 2, 0, 'Elche', '2222', '3', '2017-07-09'),
(10, 3, 0, 'Elche', '333', '3', '2017-07-09'),
(11, 3, 0, 'Elche', '333', '3', '2017-07-09'),
(12, 3, 0, 'Elche', '333', '4', '2017-07-09'),
(13, 2, 0, 'Elche', '22', '4', '2017-07-09'),
(14, 3, 0, 'Elche', '33', '3', '2017-07-09'),
(15, 3, 0, 'Elche', '33', '3', '2017-07-09'),
(16, 3, 0, 'Elche', '2222', '3', '2017-07-09'),
(17, 3, 0, 'Elche', '33', '4', '2017-07-09'),
(18, 3, 0, 'Elche', '33', '3', '2017-07-09'),
(19, 4, 0, 'Elche', '44', '4', '2017-07-09'),
(20, 3, 0, 'Elche', '2222', '3', '2017-07-09'),
(21, 3, 0, 'Elche', '33', '3', '2017-07-09'),
(22, 2, 0, 'Elche', '222', '4', '2017-07-09'),
(24, 2, 0, 'Elche', '222', '4', '2017-07-09'),
(26, 3, 1, 'Altet', '545555', '3', '2017-07-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `poblacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(2) NOT NULL,
  `contraseña` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `salt` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `nombre`, `apellido`, `edad`, `contraseña`, `telefono`, `salt`, `foto`) VALUES
('almudena@outlook.es', 'almudena', 'marín peñalver', 22, '13QmQr3uwJ1a.', '322222', '1362216284595d38eb427dd0.84791885', ''),
('aux@aux.com', 'aux', 'aux', 22, '15RFBxniQktjE', '444444', '1581691044596220e0a4ba36.25822764', 'crack.jpg'),
('occ10@alu.ua.es', 'almudena', 'marín peñalver', 22, '20z5GPYguNZnY', '322222', '2019619390595d3938021cc0.62033985', ''),
('usuario1@gamail.com', 'usuario1', 'usuario1', 11, '13QmQr3uwJ1a.', '111111', '134147271459626a1f21a8f9.63789328', 'usuario1.jpg'),
('usuario1@gmail.com', 'usuario1', 'usuario1', 1, '103RJbvBIQG6c', '111', '109244307459733325573464.00779894', NULL),
('usuario10@gamail.com', 'usuario10', 'usuario10', 2, '10MBVFM/He7o2', '111111', '1072260405597374390e07d5.77552247', 'usuario10.jpg'),
('usuario11@gamail.com', 'usuario11', 'usuario11', 11, '16l6LdKB6QPA6', '111111', '16791966655973735a220cc8.67046922', 'usuario12.png'),
('usuario12@gamail.com', 'usuario12', 'usuario12', 2, '2222', '2222', '213449497759627251c23a78.00586533', 'usuario12.jpg'),
('usuario13@gamail.com', 'usuario13', 'usuario13', 3, '875qyfQRfUQ96', '111111', '8757128775974584355f030.69403009', 'CHAMIT_-_WIN_20160314_133711.JPG'),
('usuario14@gamail.com', 'usuario14', 'usuario14', 4, '98sAkkRNExwEI', '111111', '982583929596281d2153448.54299698', NULL),
('usuario2@gamail.com', 'usuario2', 'usuario2', 2, '15RFBxniQktjE', '22222', '158796790959626c885c3eb3.75946436', 'usuario2.jpg'),
('usuario3', 'usuario3', 'usuario3', 2, '13QmQr3uwJ1a.', '122', '13926189559626d393bf500.28238558', 'usuario3.jpg'),
('usuario4@gamail.com', 'usuario4', 'usuario4', 3, '858AHQd5SLXYc', '3333', '85671062059626d9ceeffc3.83098530', 'usuario4.jpg'),
('usuario5@gamail.com', 'usuario5', 'usuario5', 2, '29i4RpCFCVZz2', '111111', '29036885759626e7a5c6f55.64193721', 'usuario5.jpg'),
('usuario6@gamail.com', 'usuario6', 'usuario6', 2, '14XUw3mMNsdHA', '111111', '142145994659626ef1d4de12.92018743', 'usuario6.jpg'),
('usuario7@gamail.com', 'usuario7', 'usuario7', 4, '16iklPXZCBs0Q', '111111', '163025456959626f6457ed31.07528948', 'usuario7.png'),
('usuario8@gamail.com', 'usuario8', 'usuario8', 8, '25y9y9JqRTCWQ', '111111', '25117746559626fbe32edf6.01519702', 'usuario8.jpg'),
('usuario9@gamail.com', 'usuario9', 'usuario9', 9, '14XUw3mMNsdHA', '111111', '143932927759627003aaff37.03299018', 'usuario9.jpg'),
('yo@hotmail.com', 'ouadi', 'chamit', 22, '20z5GPYguNZnY', '322222', '2029039250595e68470ec505.14332968', 'walid7.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioaparcacoche`
--

CREATE TABLE `usuarioaparcacoche` (
  `coche` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `aparcamiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aparcamiento`
--
ALTER TABLE `aparcamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `universidad` (`universidad`);

--
-- Indices de la tabla `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `comenta`
--
ALTER TABLE `comenta`
  ADD KEY `comenta_ibfk_1` (`usuarioA`),
  ADD KEY `comenta_ibfk_2` (`usuarioB`);

--
-- Indices de la tabla `realizaruta`
--
ALTER TABLE `realizaruta`
  ADD KEY `coche` (`coche`),
  ADD KEY `ruta` (`ruta`),
  ADD KEY `realizaruta_ibfk_4` (`usuario`);

--
-- Indices de la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `usuarioaparcacoche`
--
ALTER TABLE `usuarioaparcacoche`
  ADD KEY `coche` (`coche`),
  ADD KEY `aparcamiento` (`aparcamiento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ruta`
--
ALTER TABLE `ruta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `coche`
--
ALTER TABLE `coche`
  ADD CONSTRAINT `coche_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comenta`
--
ALTER TABLE `comenta`
  ADD CONSTRAINT `comenta_ibfk_1` FOREIGN KEY (`usuarioA`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comenta_ibfk_2` FOREIGN KEY (`usuarioB`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `realizaruta`
--
ALTER TABLE `realizaruta`
  ADD CONSTRAINT `realizaruta_ibfk_2` FOREIGN KEY (`coche`) REFERENCES `coche` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realizaruta_ibfk_3` FOREIGN KEY (`ruta`) REFERENCES `ruta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realizaruta_ibfk_4` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarioaparcacoche`
--
ALTER TABLE `usuarioaparcacoche`
  ADD CONSTRAINT `usuarioaparcacoche_ibfk_2` FOREIGN KEY (`coche`) REFERENCES `coche` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarioaparcacoche_ibfk_4` FOREIGN KEY (`aparcamiento`) REFERENCES `aparcamiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
