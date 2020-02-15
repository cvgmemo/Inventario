-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2017 a las 23:56:51
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deminventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'Monitor', 'Monitor', 1),
(2, 'CPU', 'Cpu', 1),
(3, 'Teclado', 'Teclado', 1),
(4, 'Mouse', 'Mouse', 1),
(5, 'Regulador', 'Regulador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id_dependencia` int(11) NOT NULL,
  `dependencia` varchar(256) COLLATE utf8_spanish2_ci NOT NULL,
  `id_materia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id_dependencia`, `dependencia`, `id_materia`, `cantidad`) VALUES
(1, 'DAR - Oficina', 6, 0),
(2, 'Servicios Judiciales', 6, 0),
(3, 'Almacen', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_trabajo`
--

CREATE TABLE `est_trabajo` (
  `id_etrabajo` int(11) NOT NULL,
  `id_dependencia` int(11) DEFAULT NULL,
  `id_monitor` int(11) DEFAULT NULL,
  `id_cpu` int(11) DEFAULT NULL,
  `id_mouse` int(11) DEFAULT NULL,
  `id_teclado` int(11) DEFAULT NULL,
  `id_regulador` int(11) DEFAULT NULL,
  `id_impresora` int(11) DEFAULT NULL,
  `id_swicth` int(11) DEFAULT NULL,
  `id_camara` int(11) DEFAULT NULL,
  `id_portatil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `modelo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `serial` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bien_nac` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `id_dependencia` int(11) DEFAULT NULL,
  `nombre_equipo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_etrabajo` int(11) DEFAULT NULL,
  `observacion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idarticulo`, `idcategoria`, `modelo`, `marca`, `serial`, `bien_nac`, `status`, `id_dependencia`, `nombre_equipo`, `id_etrabajo`, `observacion`, `imagen`) VALUES
(1, 1, 'SK-8809', 'IBM', '02194645', '4669', 'Activo', 3, '', 0, '', 'telcado.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `area_materia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `area_materia`, `descripcion`, `cantidad`) VALUES
(1, 'Penal San Cristóbal', 'Circuito Judicial Penal', 0),
(2, 'Civil', 'Tribunales Civiles San Cristobal', 0),
(3, 'Laboral', 'Circuito Judicial Laboral', 0),
(4, 'Protección', 'Circuito de Protección del Niño, Niña y Adolescente', 0),
(5, 'Violencia', 'Circuito Género de Violencia', 0),
(6, 'DAR', 'Oficina Administrativa Regional', 0),
(7, 'Penal San Antonio', 'Circuito Judicial Penal Extensión San Antonio', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id_dependencia`),
  ADD UNIQUE KEY `id_Dependencias_UNIQUE` (`id_dependencia`),
  ADD KEY `Materia_Id_idx` (`id_materia`);

--
-- Indices de la tabla `est_trabajo`
--
ALTER TABLE `est_trabajo`
  ADD PRIMARY KEY (`id_etrabajo`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `Id_Ttipo_idx` (`idcategoria`),
  ADD KEY `Id_Ddependenc_idx` (`id_dependencia`),
  ADD KEY `Id_Etrabajo_idx` (`id_etrabajo`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD UNIQUE KEY `id_Materia_UNIQUE` (`id_materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id_dependencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `est_trabajo`
--
ALTER TABLE `est_trabajo`
  MODIFY `id_etrabajo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD CONSTRAINT `Materia_Id` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `Id_Ddependenc` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id_dependencia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Id_Ttipo` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
