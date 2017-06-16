-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2017 a las 15:30:59
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
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `nombre`, `email`, `contrasena`, `estado`) VALUES
(1, 'Osvaldo Alvarado', 'oalvarado@yadran.cl', '12345', 1),
(2, 'Erick Barria', 'ebarria@yadran.cl', '12345', 1),
(3, 'Daniel Ponce', 'dponce@yadran.cl', '12345', 1),
(4, 'Victor Olavarria', 'volavarria@yadran.cl', '12345', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `IPequipo` varchar(15) DEFAULT NULL,
  `mac` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `so` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `procesador` varchar(50) DEFAULT NULL,
  `memoriahdd` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `nombreequipo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `id_usuario` int(11) DEFAULT NULL,
  `id_tipo_equipo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenciones`
--

CREATE TABLE `mantenciones` (
  `id_mantencion` int(11) NOT NULL,
  `IPmantencion` varchar(15) NOT NULL,
  `falla` varchar(100) DEFAULT NULL,
  `correcciones` varchar(100) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `pendiente` varchar(100) DEFAULT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `id_tipo_mantencion` int(11) NOT NULL,
  `id_tipo_equipo` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` int(11) NOT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `id_usuario` int(11) NOT NULL,
  `id_tipo_solicitud` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_tipo_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_equipo`
--

CREATE TABLE `tipo_equipo` (
  `id_tipo_equipo` int(11) NOT NULL,
  `glosa_tipo_equipo` varchar(60) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_equipo`
--

INSERT INTO `tipo_equipo` (`id_tipo_equipo`, `glosa_tipo_equipo`, `estado`) VALUES
(1, 'Otros', 1),
(2, 'Computadores', 1),
(3, 'Tables', 1),
(4, 'Celulares', 1),
(5, 'Impresoras', 1),
(6, 'Etiquetas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mantenciones`
--

CREATE TABLE `tipo_mantenciones` (
  `id_tipo_mantencion` int(11) NOT NULL,
  `glosa_tipo_mantencion` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_mantenciones`
--

INSERT INTO `tipo_mantenciones` (`id_tipo_mantencion`, `glosa_tipo_mantencion`, `estado`) VALUES
(1, 'Otros', 1),
(2, 'Preventiva', 1),
(3, 'Solicitud', 1),
(4, 'Por fuerza mayor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `id_tipo_solicitud` int(11) NOT NULL,
  `glosa_tipo_solicitud` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`id_tipo_solicitud`, `glosa_tipo_solicitud`, `estado`) VALUES
(1, 'Checkeo', 1),
(2, 'Cambio', 1),
(3, 'Falla', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `estado`) VALUES
(1, 'Suling Candia', 'scandia@yadran.cl', 1),
(2, 'Jorge Bravo', 'jbravo@yadran.cl', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `fk_Computadores_usuarios1_idx` (`id_usuario`),
  ADD KEY `fk_Computadores_tipo_equipo1_idx` (`id_tipo_equipo`);

--
-- Indices de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD PRIMARY KEY (`id_mantencion`),
  ADD KEY `fk_Mantenciones_tipo1_idx` (`id_tipo_mantencion`),
  ADD KEY `fk_Mantenciones_tipo_equipo1_idx` (`id_tipo_equipo`),
  ADD KEY `fk_Mantenciones_Administradores1_idx` (`id_administrador`),
  ADD KEY `fk_mantenciones_equipos1_idx` (`id_equipo`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_solicitud_tipo_solicitud1_idx` (`id_tipo_solicitud`),
  ADD KEY `fk_solicitud_tipo_equipo1_idx` (`id_tipo_equipo`);

--
-- Indices de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  ADD PRIMARY KEY (`id_tipo_equipo`);

--
-- Indices de la tabla `tipo_mantenciones`
--
ALTER TABLE `tipo_mantenciones`
  ADD PRIMARY KEY (`id_tipo_mantencion`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`id_tipo_solicitud`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  MODIFY `id_mantencion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_equipo`
--
ALTER TABLE `tipo_equipo`
  MODIFY `id_tipo_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo_mantenciones`
--
ALTER TABLE `tipo_mantenciones`
  MODIFY `id_tipo_mantencion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `id_tipo_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `fk_Computadores_tipo_equipo1` FOREIGN KEY (`id_tipo_equipo`) REFERENCES `tipo_equipo` (`id_tipo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Computadores_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD CONSTRAINT `fk_Mantenciones_Administradores1` FOREIGN KEY (`id_administrador`) REFERENCES `administradores` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mantenciones_tipo1` FOREIGN KEY (`id_tipo_mantencion`) REFERENCES `tipo_mantenciones` (`id_tipo_mantencion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Mantenciones_tipo_equipo1` FOREIGN KEY (`id_tipo_equipo`) REFERENCES `tipo_equipo` (`id_tipo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mantenciones_equipos1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `fk_solicitud_tipo_equipo1` FOREIGN KEY (`id_tipo_equipo`) REFERENCES `tipo_equipo` (`id_tipo_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_solicitud_tipo_solicitud1` FOREIGN KEY (`id_tipo_solicitud`) REFERENCES `tipo_solicitud` (`id_tipo_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
