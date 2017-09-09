-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2017 a las 07:39:19
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webpeliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pelicula` int(11) NOT NULL,
  `fechahora` datetime NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `usuario`, `pelicula`, `fechahora`, `texto`) VALUES
(1, 1, 5, '2017-01-25 03:14:17', 'Esta película me encantó cuando la vi, me parece una de las mejores películas de superhéroes de la historia.'),
(4, 1, 2, '2017-01-25 18:30:22', 'Esta peli me encantó en el cine!! Seguro que si la ves en casa pierde su gracia.'),
(5, 1, 2, '2017-01-25 18:39:59', 'Vamos, esta peli mola mucho, vaya música!'),
(6, 1, 2, '2017-01-25 18:42:58', 'Vaya con la peli, me encantó su música!'),
(11, 1, 18, '2017-01-27 07:20:12', 'Esta peli la he visto en el cine y me ha encantado!!'),
(12, 4, 18, '2017-01-27 07:21:56', 'A mí también, y eso que al principio me pareció algo pesada, pero luego va mejorando. Un 8!'),
(13, 4, 2, '2017-01-27 07:22:58', 'Totalmente de acuerdo. Ese final es brutal, a la altura de las mejores. Un 9!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `abreviacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `abreviacion`) VALUES
(1, 'España', 'ES'),
(2, 'Francia', 'FR'),
(3, 'Estados Unidos', 'EEUU'),
(4, 'Reino Unido', 'UK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id`, `nombre`, `apellidos`) VALUES
(1, 'John', 'Musker'),
(2, 'Ron', 'Clements'),
(3, 'Don', 'Hall'),
(4, 'Chris', 'Williams'),
(5, 'Rob', 'Dressel'),
(6, 'Damien', 'Chazelle'),
(7, 'Ryan', 'Gosling'),
(8, 'Emma', 'Stone'),
(9, 'Barry', 'Jenkins'),
(10, 'Mahershala', 'Ali'),
(11, 'Ben', 'Falcone'),
(12, 'Melissa', 'McCarthy'),
(13, 'Christopher', 'Nolan'),
(14, 'Christian', 'Bale'),
(15, 'Mike', 'Thurmeier'),
(16, 'Galen T.', 'Chu'),
(17, 'Alfred', 'Hitchcock'),
(18, 'Anthony', 'Perkins'),
(19, 'Miles', 'Teller'),
(20, 'D.J.', 'Caruso'),
(21, 'Vin', 'Diesel'),
(22, 'Quentin', 'Tarantino'),
(23, 'Jamie', 'Foxx'),
(24, 'Martin', 'Scorsese'),
(25, 'Andrew', 'Garfield'),
(26, 'Jaume', 'Collet-Serra'),
(27, 'Blake', 'Lively'),
(28, 'Kevin', 'Smith'),
(29, 'Lorenza', 'Izzo'),
(30, 'David', 'Yates'),
(31, 'Alexander', 'Skarsgård'),
(32, 'Timur', 'Bekmambetov'),
(33, 'Jack', 'Huston'),
(34, 'Paul', 'Greengrass'),
(35, 'Matt', 'Damon'),
(36, 'Derek', 'Cianfrance'),
(37, 'Michael', 'Fassbender'),
(38, 'Steven', 'Spielberg'),
(39, 'Ruby', 'Barnhill');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantepremio`
--

CREATE TABLE `participantepremio` (
  `participante` int(11) NOT NULL,
  `premio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantetipoparticipante`
--

CREATE TABLE `participantetipoparticipante` (
  `participante` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `participantetipoparticipante`
--

INSERT INTO `participantetipoparticipante` (`participante`, `tipo`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 4),
(6, 1),
(7, 2),
(8, 2),
(9, 1),
(10, 2),
(11, 1),
(12, 2),
(13, 1),
(14, 2),
(15, 1),
(16, 1),
(17, 1),
(18, 2),
(19, 2),
(20, 1),
(21, 2),
(22, 1),
(23, 2),
(24, 1),
(25, 2),
(26, 1),
(27, 2),
(28, 1),
(29, 2),
(30, 1),
(31, 2),
(32, 1),
(33, 2),
(34, 1),
(35, 2),
(36, 1),
(37, 2),
(38, 1),
(39, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaPublicacion` datetime NOT NULL,
  `duracion` time NOT NULL,
  `sinopsis` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` int(11) NOT NULL,
  `cartelera` tinyint(1) NOT NULL COMMENT '1 -> Si está en cartelera; 0 -> Si no está en cartelera.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `fechaPublicacion`, `duracion`, `sinopsis`, `pais`, `cartelera`) VALUES
(1, 'Vaiana', '2016-08-16 00:00:00', '01:48:00', 'La historia se desarrolla hace dos milenios en unas islas del sur del Pacífico. La protagonista es Vaiana Waialiki, una joven que desea explorar el mundo navegando por el océano. Ella es la única hija de un importante capitán que pertenece a una familia con varias generaciones de marinos.\r\n', 3, 0),
(2, 'La ciudad de las estrellas (La La Land)', '2017-01-13 00:00:00', '02:00:00', 'Narra una tempestuosa historia de amor que se verá obstaculizada por el afán de triunfo de los protagonistas. Mia, una aspirante a actriz que trabaja como camarera, y Sebastian, un pianista de jazz que se gana la vida tocando en sórdidos tugurios, se enamoran, pero su gran ambición por llegar a la cima amenaza con separarlos.\r\n', 3, 1),
(3, 'Moonlight', '2017-01-13 00:00:00', '02:00:00', 'Chiron es un joven de Miami que, en plena guerra de los carteles de la droga en los suburbios de la ciudad, va descubriendo su homosexualidad.\r\n', 3, 1),
(4, 'Es la jefa', '2017-01-29 00:00:00', '02:00:00', 'La mujer más rica de América es enviada a prisión al ser encontrada culpable por tráfico de influencias. Tras su salida y lista para renacer como la empresaria favorita de Estados Unidos, se encuentra con que tiene que empezar de cero junto a una antigua empleada suya.\r\n', 3, 0),
(5, 'El caballero oscuro', '2008-01-03 00:00:00', '02:30:00', 'Batman/Bruce Wayne (Christian Bale) regresa para continuar su guerra contra el crimen. Con la ayuda del teniente Jim Gordon (Gary Oldman) y del Fiscal del Distrito Harvey Dent (Aaron Eckhart), Batman se propone destruir el crimen organizado en la ciudad de Gotham. El triunvirato demuestra su eficacia, pero, de repente, aparece Joker (Heath Ledger), un nuevo criminal que desencadena el caos y tiene aterrados a los ciudadanos.\r\n', 3, 0),
(6, 'Ice Age: El gran cataclismo', '2016-09-16 00:00:00', '01:35:00', 'La obsesiva búsqueda de bellotas por parte de Scrat acaba provocando un accidente: que un asteroide se dirija a a la Tierra, amenazando con acabar con la Edad de Hielo. Sid, Manny, Diego y los demás miembros de la manada intentarán impedirlo por todos los medios.\r\n', 3, 0),
(7, 'Psicosis', '1960-01-14 00:00:00', '01:47:00', 'Marion Crane, una joven secretaria, tras cometer el robo de un dinero en su empresa, huye de la ciudad y, después de conducir durante horas, decide descansar en un pequeño y apartado motel de carretera regentado por un tímido joven llamado Norman Bates, que vive en la casa de al lado con su madre.\r\n', 3, 0),
(8, 'Whiplash', '2017-01-16 00:00:00', '02:00:00', 'El objetivo de Andrew Neiman (Miles Teller), un joven y ambicioso baterista de jazz, es triunfar en el elitista Conservatorio de Música de la Costa Este. Marcado por el fracaso de la carrera literaria de su padre, Andrew alberga sueños de grandeza. Terence Fletcher (J.K. Simmons), un profesor conocido tanto por su talento como por sus rigurosos métodos de enseñanza, dirige el mejor conjunto de jazz del Conservatorio. Cuando Fletcher elige a Andrew para formar parte del grupo, la vida del joven cambiará.\r\n', 3, 0),
(9, 'xXx: Reactivado', '2017-01-28 00:00:00', '01:50:00', 'Xander Cage es dado por muerto tras un incidente, sin embargo regresa a la acción secretamente para una misión con su mano derecha Augustus Gibbons.\r\n', 3, 0),
(10, 'Django Desencadenado', '2014-01-16 00:00:00', '02:33:00', 'El objetivo de Andrew Neiman (Miles Teller), un joven y ambicioso baterista de jazz, es triunfar en el elitista Conservatorio de Música de la Costa Este. Marcado por el fracaso de la carrera literaria de su padre, Andrew alberga sueños de grandeza. Terence Fletcher (J.K. Simmons), un profesor conocido tanto por su talento como por sus rigurosos métodos de enseñanza, dirige el mejor conjunto de jazz del Conservatorio. Cuando Fletcher elige a Andrew para formar parte del grupo, la vida del joven cambiará.\r\n', 3, 0),
(11, 'Silencio', '2017-01-06 00:00:00', '02:16:00', 'Segunda mitad del siglo XVII. Dos jesuitas portugueses viajan a Japón en busca de un misionero que, tras ser perseguido y torturado, ha renunciado a su fe. Ellos mismos vivirán el suplicio y la violencia con que los japoneses reciben a los cristianos. Adaptación de la novela de Shusaku Endo.\r\n', 3, 1),
(12, 'Infierno azul', '2016-11-16 00:00:00', '01:24:00', 'Nancy (Blake Lively) es una joven que trata de superar la pérdida de su madre. Un día, practicando surf en una solitaria playa mexicana se queda atrapada en un islote a sólo cien metros de la costa. El problema está en que un enorme tiburón blanco se interpone entre ella y la otra orilla.\r\n', 3, 0),
(13, 'Holidays', '2017-01-27 00:00:00', '01:50:00', 'Antología de terror que reúne una serie de relatos cortos, cada uno inspirado en una celebración distinta, entre la que encontramos Navidad, San Valentín o Pascua. Pero todos con el punto en común de darle una vuelta escalofriante a las tradiciones y el folclore.\r\n', 3, 1),
(14, 'La leyenda de Tarzán', '2016-10-18 00:00:00', '02:00:00', 'Ya hace años que Tarzán (Alexander Skarsgård) abandonó la jungla africana para llevar una vida aburguesada como John Clayton III, Lord Greystoke, junto a su esposa Jane (Margot Robbie). Pero un día le ofrecen el cargo de embajador en el Congo. En realidad, todo forma parte de un plan ideado por un capitán belga (Christoph Waltz), aunque los responsables de llevarlo a cabo no están preparados para ello.\r\n', 3, 0),
(15, 'Ben-Hur', '2017-01-16 00:00:00', '03:00:00', 'Judah Ben-Hur (Jack Huston) es un príncipe falsamente acusado de traición por su hermano adoptivo Messala (Toby Kebbell), un oficial del ejército romano. Desposeído de su título y separado de su familia y de la mujer que ama (Nazanin Boniadi), Judah es condenado a la esclavitud en las galeras. Después de varios años, Judah regresa a su tierra natal en busca de venganza, pero encontrará su propia redención.', 3, 0),
(16, 'Jason Bourne', '2016-09-12 00:00:00', '02:00:00', 'Jason Bourne ha recuperado su memoria, pero eso no significa que el más letal agente de los cuerpos de élite de la CIA lo sepa todo. Han pasado 12 años desde la última vez que Bourne operara en las sombras. Pero todavía le quedan muchas preguntas por responder. En medio de un mundo convulso, azotado por la crisis económica y la guerra cibernética, Jason Bourne vuelve a surgir, de forma inesperada, cuando desde el pasado reaparece Nicky Parsons (Julia Stiles) con información sobre él de vital importancia. Desde un lugar oscuro y torturado, Bourne reanudará la búsqueda de respuestas sobre su pasado.\r\n', 3, 0),
(17, 'La luz entre los océanos', '2017-01-20 00:00:00', '02:00:00', 'Australia, 1926. Un bote encalla en una isla remota y a su encuentro acuden el farero Tom Sherbourne y su joven esposa Isabel. En el interior del bote yacen un hombre muerto y un bebé que llora con desesperación. Tom e Isabel adoptan al niño y deciden criarlo sin informar a las autoridades. Todo se complica cuando descubren que la madre biológica del bebé está viva.\r\n', 3, 1),
(18, 'Mi amigo el gigante', '2016-09-16 00:00:00', '02:00:00', 'Adaptación del cuento de Roald Dahl sobre una niña que se alía con la Reina de Inglaterra y con un gigante bonachón para impedir una invasión de malvados gigantes que se preparan para comerse a todos los niños del país.\r\n', 3, 1),
(19, 'Película Ejemplo Sin Imagen', '2017-01-29 00:00:00', '00:00:00', 'aaaaa', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculaparticipante`
--

CREATE TABLE `peliculaparticipante` (
  `pelicula` int(11) NOT NULL,
  `participante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculaparticipante`
--

INSERT INTO `peliculaparticipante` (`pelicula`, `participante`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(5, 1),
(5, 12),
(5, 13),
(6, 14),
(6, 15),
(7, 16),
(7, 17),
(8, 18),
(8, 19),
(9, 20),
(9, 21),
(10, 22),
(10, 23),
(11, 24),
(11, 25),
(12, 26),
(12, 27),
(13, 28),
(13, 29),
(14, 30),
(14, 31),
(15, 32),
(15, 33),
(16, 34),
(16, 35),
(17, 36),
(17, 37),
(18, 38),
(18, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculapremio`
--

CREATE TABLE `peliculapremio` (
  `pelicula` int(11) NOT NULL,
  `premio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculapremio`
--

INSERT INTO `peliculapremio` (`pelicula`, `premio`) VALUES
(2, 7),
(2, 8),
(5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premio`
--

CREATE TABLE `premio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `premio`
--

INSERT INTO `premio` (`id`, `nombre`) VALUES
(1, 'Óscar Mejor Película'),
(2, 'Óscar Mejor Director'),
(3, 'Óscar Mejor Actor'),
(4, 'Óscar Mejor Actriz'),
(5, 'Goya Mejor Película'),
(6, 'Goya Mejor Director'),
(7, 'Globo de Oro Mejor Película'),
(8, 'Globo de Oro Mejor Director');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipogenero`
--

CREATE TABLE `tipogenero` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipogenero`
--

INSERT INTO `tipogenero` (`id`, `nombre`) VALUES
(1, 'Comedia'),
(2, 'Drama'),
(3, 'Musical'),
(4, 'Acción'),
(6, 'Aventuras'),
(7, 'Animación'),
(8, 'Terror');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipogeneropelicula`
--

CREATE TABLE `tipogeneropelicula` (
  `genero` int(11) NOT NULL,
  `pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipogeneropelicula`
--

INSERT INTO `tipogeneropelicula` (`genero`, `pelicula`) VALUES
(1, 2),
(1, 9),
(2, 3),
(2, 5),
(2, 7),
(2, 10),
(2, 19),
(3, 6),
(4, 5),
(4, 17),
(6, 5),
(6, 15),
(7, 1),
(7, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoparticipante`
--

CREATE TABLE `tipoparticipante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipoparticipante`
--

INSERT INTO `tipoparticipante` (`id`, `nombre`) VALUES
(1, 'Director/a'),
(2, 'Actor/Actriz'),
(3, 'Guionista'),
(4, 'Director fotografía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`, `email`, `tipo`) VALUES
(1, 'manuel', 'manuel', 'manuel@manuel.com', 1),
(4, 'ouadi', 'ouadi', 'ouadi@ouadi.com', 2),
(5, 'manu', 'manue', 'manu@manu.com', 2),
(9, 'chamit5', 'kkkkkk', 'chamit5@chamit.com', 2),
(10, 'chamit2', 'chamit2', 'chamit2@chamit.com', 2),
(12, 'juan', 'juan', 'juan@juan.com', 2),
(13, 'juanma', 'juanma', 'juanma@juanma.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariovotapelicula`
--

CREATE TABLE `usuariovotapelicula` (
  `usuario` int(11) NOT NULL,
  `pelicula` int(11) NOT NULL,
  `voto` decimal(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuariovotapelicula`
--

INSERT INTO `usuariovotapelicula` (`usuario`, `pelicula`, `voto`) VALUES
(1, 1, '7.0'),
(1, 2, '10.0'),
(1, 5, '10.0'),
(4, 2, '9.0'),
(4, 18, '8.0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelicula` (`pelicula`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `participantepremio`
--
ALTER TABLE `participantepremio`
  ADD PRIMARY KEY (`participante`,`premio`),
  ADD KEY `premio` (`premio`);

--
-- Indices de la tabla `participantetipoparticipante`
--
ALTER TABLE `participantetipoparticipante`
  ADD PRIMARY KEY (`participante`,`tipo`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `pais` (`pais`);

--
-- Indices de la tabla `peliculaparticipante`
--
ALTER TABLE `peliculaparticipante`
  ADD PRIMARY KEY (`pelicula`,`participante`),
  ADD KEY `participante` (`participante`);

--
-- Indices de la tabla `peliculapremio`
--
ALTER TABLE `peliculapremio`
  ADD PRIMARY KEY (`pelicula`,`premio`),
  ADD KEY `premio` (`premio`);

--
-- Indices de la tabla `premio`
--
ALTER TABLE `premio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipogenero`
--
ALTER TABLE `tipogenero`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `tipogeneropelicula`
--
ALTER TABLE `tipogeneropelicula`
  ADD PRIMARY KEY (`genero`,`pelicula`),
  ADD KEY `pelicula` (`pelicula`);

--
-- Indices de la tabla `tipoparticipante`
--
ALTER TABLE `tipoparticipante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuariovotapelicula`
--
ALTER TABLE `usuariovotapelicula`
  ADD PRIMARY KEY (`usuario`,`pelicula`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `pelicula` (`pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `premio`
--
ALTER TABLE `premio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipogenero`
--
ALTER TABLE `tipogenero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipoparticipante`
--
ALTER TABLE `tipoparticipante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participantepremio`
--
ALTER TABLE `participantepremio`
  ADD CONSTRAINT `participantepremio_ibfk_2` FOREIGN KEY (`premio`) REFERENCES `premio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participantepremio_ibfk_3` FOREIGN KEY (`participante`) REFERENCES `participante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participantetipoparticipante`
--
ALTER TABLE `participantetipoparticipante`
  ADD CONSTRAINT `participantetipoparticipante_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tipoparticipante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participantetipoparticipante_ibfk_3` FOREIGN KEY (`participante`) REFERENCES `participante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`pais`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculaparticipante`
--
ALTER TABLE `peliculaparticipante`
  ADD CONSTRAINT `peliculaparticipante_ibfk_1` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculaparticipante_ibfk_2` FOREIGN KEY (`participante`) REFERENCES `participante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peliculapremio`
--
ALTER TABLE `peliculapremio`
  ADD CONSTRAINT `peliculapremio_ibfk_1` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculapremio_ibfk_2` FOREIGN KEY (`premio`) REFERENCES `premio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipogeneropelicula`
--
ALTER TABLE `tipogeneropelicula`
  ADD CONSTRAINT `tipogeneropelicula_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `tipogenero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tipogeneropelicula_ibfk_2` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariovotapelicula`
--
ALTER TABLE `usuariovotapelicula`
  ADD CONSTRAINT `usuariovotapelicula_ibfk_2` FOREIGN KEY (`pelicula`) REFERENCES `pelicula` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariovotapelicula_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
