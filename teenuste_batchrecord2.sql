-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2020 a las 13:44:18
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teenuste_batchrecord2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_entrega`
--

CREATE TABLE `actividad_entrega` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agitador`
--

CREATE TABLE `agitador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agua`
--

CREATE TABLE `agua` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `caliente` tinyint(1) NOT NULL,
  `fria` tinyint(1) NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `id_usuariorealizado` int(11) NOT NULL,
  `id_usuarioverificado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) CHARACTER SET latin1 NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area_desinfeccion`
--

CREATE TABLE `area_desinfeccion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(40) CHARACTER SET latin1 NOT NULL,
  `id_desinfectante` int(11) NOT NULL,
  `id_observaciones` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `batch`
--

CREATE TABLE `batch` (
  `id_batch` int(11) NOT NULL,
  `numero_orden` int(11) NOT NULL,
  `nombre_referencia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `notificacion_sanitaria` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hoy` date NOT NULL,
  `fecha_programacion` date NOT NULL,
  `numero_lote` int(11) NOT NULL,
  `tamano_lote` int(11) NOT NULL,
  `tamano_lote_presentacion` int(11) NOT NULL,
  `unidades_x_lote` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_propietario` int(11) NOT NULL,
  `id_presentacion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `batch`
--

INSERT INTO `batch` (`id_batch`, `numero_orden`, `nombre_referencia`, `notificacion_sanitaria`, `fecha_hoy`, `fecha_programacion`, `numero_lote`, `tamano_lote`, `tamano_lote_presentacion`, `unidades_x_lote`, `id_linea`, `id_marca`, `id_propietario`, `id_presentacion`, `id_producto`) VALUES
(2, 1023, 'Prueba', '222', '2020-03-26', '2020-04-04', 888, 1000, 20, 50, 2, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `cargo` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concentracion`
--

CREATE TABLE `concentracion` (
  `id` int(11) NOT NULL,
  `concentracion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicionesmedio`
--

CREATE TABLE `condicionesmedio` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `temperatura` int(11) NOT NULL,
  `humedad` int(11) NOT NULL,
  `id_batch` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desinfectante`
--

CREATE TABLE `desinfectante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_concentracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregamp`
--

CREATE TABLE `entregamp` (
  `id` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `id_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envasadora`
--

CREATE TABLE `envasadora` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(0, 'Inactivo'),
(1, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firma`
--

CREATE TABLE `firma` (
  `id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_primerfirma` int(11) NOT NULL,
  `id_segundafirma` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formula`
--

CREATE TABLE `formula` (
  `id_producto` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_materiaprima` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `id` int(11) NOT NULL,
  `nombre_linea` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`id`, `nombre_linea`) VALUES
(1, 'Semisolidos'),
(2, 'Liquidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

CREATE TABLE `maquinaria` (
  `id` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_batch` int(11) NOT NULL,
  `id_agitador` int(11) NOT NULL,
  `id_envasadora` int(11) NOT NULL,
  `id_marmita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'Mawie'),
(2, 'Lorhan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marmita`
--

CREATE TABLE `marmita` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `referencia` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(11) NOT NULL,
  `observaciones` text COLLATE utf8_spanish_ci NOT NULL,
  `id_batch` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `peso` (
  `id` int(11) NOT NULL,
  `peso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion_comercial`
--

CREATE TABLE `presentacion_comercial` (
  `id` int(11) NOT NULL,
  `presentacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentacion_comercial`
--

INSERT INTO `presentacion_comercial` (`id`, `presentacion`) VALUES
(1, '350ml'),
(2, '500ml');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(40) NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre_producto`) VALUES
(1, 'Shampoo'),
(2, 'Gel Antibacterial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id` int(11) NOT NULL,
  `nombre_propietario` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id`, `nombre_propietario`) VALUES
(1, 'Samara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solucion_pregunta`
--

CREATE TABLE `solucion_pregunta` (
  `id` int(11) NOT NULL,
  `solucion` tinyint(1) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `firma` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `huella` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_entrega`
--
ALTER TABLE `actividad_entrega`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agitador`
--
ALTER TABLE `agitador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `agua`
--
ALTER TABLE `agua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_agua_usuariorealizado` (`id_usuariorealizado`),
  ADD KEY `fk_agua_usuarioverificado` (`id_usuarioverificado`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_area_modulo` (`id_modulo`);

--
-- Indices de la tabla `area_desinfeccion`
--
ALTER TABLE `area_desinfeccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_area_desinfeccion_desinfectante` (`id_desinfectante`),
  ADD KEY `fk_area_desinfeccion_observaciones` (`id_observaciones`),
  ADD KEY `fk_area_desinfeccion_modulo` (`id_modulo`),
  ADD KEY `fk_area_desinfeccion_batch` (`id_batch`);

--
-- Indices de la tabla `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id_batch`),
  ADD UNIQUE KEY `id_linea` (`id_linea`,`id_marca`,`id_propietario`,`id_presentacion`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_presentacion` (`id_presentacion`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concentracion`
--
ALTER TABLE `concentracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `condicionesmedio`
--
ALTER TABLE `condicionesmedio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_condicionesmedio_batch` (`id_batch`),
  ADD KEY `fk_condicionesmedio_modulo` (`id_modulo`);

--
-- Indices de la tabla `desinfectante`
--
ALTER TABLE `desinfectante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_desinfectante_concentracion` (`id_concentracion`);

--
-- Indices de la tabla `entregamp`
--
ALTER TABLE `entregamp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entregaMP_actividad` (`id_actividad`),
  ADD KEY `fk_entregaMP_batch` (`id_batch`),
  ADD KEY `fk_entregaMP_cargo` (`id_cargo`);

--
-- Indices de la tabla `envasadora`
--
ALTER TABLE `envasadora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `firma`
--
ALTER TABLE `firma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_firma_area` (`id_area`),
  ADD KEY `fk_firma_batch` (`id_batch`),
  ADD KEY `fk_firma_primerfirma` (`id_primerfirma`),
  ADD KEY `fk_firma_segundafirma` (`id_segundafirma`);

--
-- Indices de la tabla `formula`
--
ALTER TABLE `formula`
  ADD KEY `fk_formula_materiaprima` (`id_materiaprima`),
  ADD KEY `fk_formula_producto` (`id_producto`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_maquinaria_marmita` (`id_marmita`),
  ADD KEY `fk_maquinaria_agitador` (`id_agitador`),
  ADD KEY `fk_maquinaria_envasadora` (`id_envasadora`),
  ADD KEY `fk_maquinaria_batch` (`id_batch`),
  ADD KEY `fk_maquinaria_modulo` (`id_modulo`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marmita`
--
ALTER TABLE `marmita`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`referencia`),
  ADD KEY `fk_materiaprima_peso` (`id_peso`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_observaciones_batch` (`id_batch`),
  ADD KEY `fk_observaciones_modulo` (`id_modulo`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `peso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presentacion_comercial`
--
ALTER TABLE `presentacion_comercial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solucion_pregunta`
--
ALTER TABLE `solucion_pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_solucion_preguntas` (`id_pregunta`),
  ADD KEY `fk_solucion_modulo` (`id_modulo`),
  ADD KEY `fk_solucion_batch` (`id_batch`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_modulo` (`id_modulo`),
  ADD KEY `fk_usuario_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_entrega`
--
ALTER TABLE `actividad_entrega`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `agitador`
--
ALTER TABLE `agitador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `agua`
--
ALTER TABLE `agua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area_desinfeccion`
--
ALTER TABLE `area_desinfeccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `batch`
--
ALTER TABLE `batch`
  MODIFY `id_batch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `concentracion`
--
ALTER TABLE `concentracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `condicionesmedio`
--
ALTER TABLE `condicionesmedio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `desinfectante`
--
ALTER TABLE `desinfectante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `entregamp`
--
ALTER TABLE `entregamp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `envasadora`
--
ALTER TABLE `envasadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `firma`
--
ALTER TABLE `firma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marmita`
--
ALTER TABLE `marmita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `peso`
--
ALTER TABLE `peso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `presentacion_comercial`
--
ALTER TABLE `presentacion_comercial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `solucion_pregunta`
--
ALTER TABLE `solucion_pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agua`
--
ALTER TABLE `agua`
  ADD CONSTRAINT `fk_agua_usuariorealizado` FOREIGN KEY (`id_usuariorealizado`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_agua_usuarioverificado` FOREIGN KEY (`id_usuarioverificado`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_area_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `area_desinfeccion`
--
ALTER TABLE `area_desinfeccion`
  ADD CONSTRAINT `fk_area_desinfeccion_batch` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_area_desinfeccion_desinfectante` FOREIGN KEY (`id_desinfectante`) REFERENCES `desinfectante` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_area_desinfeccion_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_area_desinfeccion_observaciones` FOREIGN KEY (`id_observaciones`) REFERENCES `observaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `batch_ibfk_2` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id`),
  ADD CONSTRAINT `batch_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `batch_ibfk_4` FOREIGN KEY (`id_presentacion`) REFERENCES `presentacion_comercial` (`id`),
  ADD CONSTRAINT `batch_ibfk_5` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id`);

--
-- Filtros para la tabla `condicionesmedio`
--
ALTER TABLE `condicionesmedio`
  ADD CONSTRAINT `fk_condicionesmedio_batch` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_condicionesmedio_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `desinfectante`
--
ALTER TABLE `desinfectante`
  ADD CONSTRAINT `fk_desinfectante_concentracion` FOREIGN KEY (`id_concentracion`) REFERENCES `concentracion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregamp`
--
ALTER TABLE `entregamp`
  ADD CONSTRAINT `fk_entregaMP_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividad_entrega` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entregaMP_batch` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_entregaMP_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `firma`
--
ALTER TABLE `firma`
  ADD CONSTRAINT `fk_firma_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_firma_batch` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_firma_primerfirma` FOREIGN KEY (`id_primerfirma`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_firma_segundafirma` FOREIGN KEY (`id_segundafirma`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formula`
--
ALTER TABLE `formula`
  ADD CONSTRAINT `fk_formula_materiaprima` FOREIGN KEY (`id_materiaprima`) REFERENCES `materia_prima` (`referencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD CONSTRAINT `fk_maquinaria_agitador` FOREIGN KEY (`id_agitador`) REFERENCES `agitador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maquinaria_batch` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maquinaria_envasadora` FOREIGN KEY (`id_envasadora`) REFERENCES `envasadora` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maquinaria_marmita` FOREIGN KEY (`id_marmita`) REFERENCES `marmita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_maquinaria_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD CONSTRAINT `fk_materiaprima_peso` FOREIGN KEY (`id_peso`) REFERENCES `peso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `fk_observaciones_batch` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_observaciones_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solucion_pregunta`
--
ALTER TABLE `solucion_pregunta`
  ADD CONSTRAINT `fk_solucion_batch` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solucion_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_solucion_preguntas` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`),
  ADD CONSTRAINT `fk_usuario_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
