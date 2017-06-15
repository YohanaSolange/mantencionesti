-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2017 a las 16:51:00
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmantenciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idadministradores` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idadministradores`, `nombre`, `email`, `contrasena`, `estado`) VALUES
(1, 'admin', 'admin@admin.cl', 'admin', 1),
(2, 'Yohana Calbuyahue', 'practica.ti@yadran.cl', '12345', 1),
(3, 'Osvaldo Alvarado', 'oalvarado@yadran.cl', '12345', 1),
(4, 'Victor Olavarria', 'volavarria@yadran.cl', '12345', 1),
(5, 'Daniel Ponce', 'dponce@yadran.cl', '12345', 1),
(6, 'Erick Barria', 'ebarria@yadran.cl', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadores`
--

CREATE TABLE `computadores` (
  `idcomputadores` int(11) NOT NULL,
  `IPcomputadores` varchar(15) DEFAULT NULL,
  `mac` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `so` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `procesador` varchar(50) DEFAULT NULL,
  `memoriahdd` varchar(50) DEFAULT NULL,
  `programas` varchar(50) DEFAULT NULL,
  `nombreequipo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `usuarios_idusuarios` int(11) DEFAULT NULL,
  `idtipo_equipo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenciones`
--

CREATE TABLE `mantenciones` (
  `idmantenciones` int(11) NOT NULL,
  `IPmantenciones` varchar(15) NOT NULL,
  `fallas` varchar(100) DEFAULT NULL,
  `correcciones` varchar(100) DEFAULT NULL,
  `fecha` date NOT NULL,
  `pendientes` varchar(100) DEFAULT NULL,
  `Administradores_id` int(11) DEFAULT NULL,
  `Computadores_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1',
  `idtipo_mantencion` int(11) NOT NULL,
  `idtipo_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idsolicitud` int(11) NOT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `Usuarios_id` int(11) NOT NULL,
  `idtipo_solicitud` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo_equipo_idtipo_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`idsolicitud`, `comentario`, `fecha`, `estado`, `Usuarios_id`, `idtipo_solicitud`, `email`, `tipo_equipo_idtipo_equipo`) VALUES
(1, 'aaaaaaa', '2017-06-15 15:44:36', 1, 8, 2, 'scandia@yadran.cl', 0),
(3, 'kkk', '2017-06-15 16:20:08', 1, 8, 1, 'scandia@yadran.cl', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `idtipo_equipo` int(11) NOT NULL,
  `glosa` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`idtipo_equipo`, `glosa`, `estado`) VALUES
(1, 'Otros Equipos', 1),
(2, 'Computadores', 1),
(3, 'Etiquetadoras', 1),
(4, 'Celulares', 1),
(5, 'Impresoras', 1),
(6, 'Scanners', 1),
(7, 'Balanzas', 1),
(8, 'Tablets', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mantencion`
--

CREATE TABLE `tipo_mantencion` (
  `idTIPO` int(11) NOT NULL,
  `tipotexto` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_mantencion`
--

INSERT INTO `tipo_mantencion` (`idTIPO`, `tipotexto`, `estado`) VALUES
(1, 'Solicitud', 1),
(2, 'Preventivo', 1),
(3, 'Por fuerza mayor', 1),
(4, 'Otros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `idtipo_solicitud` int(11) NOT NULL,
  `glosa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`idtipo_solicitud`, `glosa`) VALUES
(1, 'Falla'),
(2, 'Checkeo'),
(3, 'Cambio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `nombre`, `email`, `estado`) VALUES
(8, 'Suling Candia', 'scandia@yadran.cl', 1),
(9, 'Jorge Bravo', 'jbravo@yadran.cl', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idadministradores`);

--
-- Indices de la tabla `computadores`
--
ALTER TABLE `computadores`
  ADD PRIMARY KEY (`idcomputadores`),
  ADD KEY `fk_Computadores_usuarios1_idx` (`usuarios_idusuarios`),
  ADD KEY `fk_Computadores_tipo_equipo1_idx` (`idtipo_equipo`);

--
-- Indices de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD PRIMARY KEY (`idmantenciones`),
  ADD KEY `fk_Mantenciones_Administradores1_idx` (`Administradores_id`),
  ADD KEY `fk_Mantenciones_Computadores1_idx` (`Computadores_id`),
  ADD KEY `fk_Mantenciones_tipo1_idx` (`idtipo_mantencion`),
  ADD KEY `fk_Mantenciones_tipo_equipo1_idx` (`idtipo_equipo`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idsolicitud`),
  ADD KEY `fk_solicitud_tipo_solicitud1_idx` (`idtipo_solicitud`),
  ADD KEY `fk_solicitud_tipo_equipo1_idx` (`tipo_equipo_idtipo_equipo`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`idtipo_equipo`);

--
-- Indices de la tabla `tipo_mantencion`
--
ALTER TABLE `tipo_mantencion`
  ADD PRIMARY KEY (`idTIPO`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`idtipo_solicitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idadministradores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `computadores`
--
ALTER TABLE `computadores`
  MODIFY `idcomputadores` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  MODIFY `idmantenciones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `idtipo_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipo_mantencion`
--
ALTER TABLE `tipo_mantencion`
  MODIFY `idTIPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `idtipo_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `computadores`
--
ALTER TABLE `computadores`
  ADD CONSTRAINT `fk_Computadores_tipo_equipo1` FOREIGN KEY (`idtipo_equipo`) REFERENCES `tipo_equipo` (`idtipo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Computadores_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD CONSTRAINT `fk_Mantenciones_Administradores1` FOREIGN KEY (`Administradores_id`) REFERENCES `administradores` (`idadministradores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mantenciones_Computadores1` FOREIGN KEY (`Computadores_id`) REFERENCES `computadores` (`idcomputadores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mantenciones_tipo1` FOREIGN KEY (`idtipo_mantencion`) REFERENCES `tipo_mantencion` (`idTIPO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mantenciones_tipo_equipo1` FOREIGN KEY (`idtipo_equipo`) REFERENCES `tipo_equipo` (`idtipo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_tipo_equipo1` FOREIGN KEY (`tipo_equipo_idtipo_equipo`) REFERENCES `tipo_equipo` (`idtipo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_tipo_solicitud1` FOREIGN KEY (`idtipo_solicitud`) REFERENCES `tipo_solicitud` (`idtipo_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
