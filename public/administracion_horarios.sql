-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 05:31:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `administracion_horarios`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_usuario_01` ()   BEGIN
	SELECT * FROM tm_usuario where est='1';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_aulas_materias`
--

CREATE TABLE `asignacion_aulas_materias` (
  `ID_aula` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_horarios`
--

CREATE TABLE `asignacion_horarios` (
  `ID_aula` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL,
  `ID_grupo` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia_de_la_semana` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_materias_maestros`
--

CREATE TABLE `asignacion_materias_maestros` (
  `ID_maestro` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `ID_aula` int(11) NOT NULL,
  `numero_de_aula` varchar(10) NOT NULL,
  `bloque` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`ID_aula`, `numero_de_aula`, `bloque`, `descripcion`) VALUES
(2, '102', 'B1', 'Laboratorio de Fisica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ID_evento` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `duracion` time NOT NULL,
  `objetivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `ID_grupo` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `numero_de_grupo` varchar(10) NOT NULL,
  `cantidad_de_estudiantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`ID_grupo`, `codigo`, `numero_de_grupo`, `cantidad_de_estudiantes`) VALUES
(1, 'EVX43', '32', 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_eventos`
--

CREATE TABLE `inscripcion_eventos` (
  `ID_evento` int(11) NOT NULL,
  `ID_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `ID_maestro` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID_materia` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `docente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_nom` varchar(150) DEFAULT NULL,
  `usu_ape` varchar(150) DEFAULT NULL,
  `usu_correo` varchar(150) NOT NULL,
  `usu_pass` varchar(150) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `usu_telf` varchar(12) NOT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla Mantenedor de Usuarios';

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_ape`, `usu_correo`, `usu_pass`, `rol_id`, `usu_telf`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 'Soporte 1', 'CRM', 'soporte@itm.com', '0192023a7bbd73250516f069df18b500', 2, '', '2023-03-16 22:10:12', NULL, NULL, 1),
(2, 'Estudiante', 'ITM', 'user@itm.com', '0192023a7bbd73250516f069df18b500', 1, '3012859682', '2023-03-29 00:00:00', NULL, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_aulas_materias`
--
ALTER TABLE `asignacion_aulas_materias`
  ADD PRIMARY KEY (`ID_aula`,`ID_materia`),
  ADD KEY `ID_materia` (`ID_materia`);

--
-- Indices de la tabla `asignacion_horarios`
--
ALTER TABLE `asignacion_horarios`
  ADD PRIMARY KEY (`ID_aula`,`ID_materia`,`ID_grupo`,`hora_inicio`,`dia_de_la_semana`),
  ADD KEY `ID_materia` (`ID_materia`),
  ADD KEY `ID_grupo` (`ID_grupo`);

--
-- Indices de la tabla `asignacion_materias_maestros`
--
ALTER TABLE `asignacion_materias_maestros`
  ADD PRIMARY KEY (`ID_maestro`,`ID_materia`),
  ADD KEY `ID_materia` (`ID_materia`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`ID_aula`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ID_evento`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`ID_grupo`);

--
-- Indices de la tabla `inscripcion_eventos`
--
ALTER TABLE `inscripcion_eventos`
  ADD PRIMARY KEY (`ID_evento`,`ID_grupo`),
  ADD KEY `ID_grupo` (`ID_grupo`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`ID_maestro`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID_materia`);

--
-- Indices de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `ID_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `ID_maestro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_materia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion_aulas_materias`
--
ALTER TABLE `asignacion_aulas_materias`
  ADD CONSTRAINT `asignacion_aulas_materias_ibfk_1` FOREIGN KEY (`ID_aula`) REFERENCES `aulas` (`ID_aula`),
  ADD CONSTRAINT `asignacion_aulas_materias_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materias` (`ID_materia`);

--
-- Filtros para la tabla `asignacion_horarios`
--
ALTER TABLE `asignacion_horarios`
  ADD CONSTRAINT `asignacion_horarios_ibfk_1` FOREIGN KEY (`ID_aula`) REFERENCES `aulas` (`ID_aula`),
  ADD CONSTRAINT `asignacion_horarios_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materias` (`ID_materia`),
  ADD CONSTRAINT `asignacion_horarios_ibfk_3` FOREIGN KEY (`ID_grupo`) REFERENCES `grupos` (`ID_grupo`);

--
-- Filtros para la tabla `asignacion_materias_maestros`
--
ALTER TABLE `asignacion_materias_maestros`
  ADD CONSTRAINT `asignacion_materias_maestros_ibfk_1` FOREIGN KEY (`ID_maestro`) REFERENCES `maestros` (`ID_maestro`),
  ADD CONSTRAINT `asignacion_materias_maestros_ibfk_2` FOREIGN KEY (`ID_materia`) REFERENCES `materias` (`ID_materia`);

--
-- Filtros para la tabla `inscripcion_eventos`
--
ALTER TABLE `inscripcion_eventos`
  ADD CONSTRAINT `inscripcion_eventos_ibfk_1` FOREIGN KEY (`ID_evento`) REFERENCES `eventos` (`ID_evento`),
  ADD CONSTRAINT `inscripcion_eventos_ibfk_2` FOREIGN KEY (`ID_grupo`) REFERENCES `grupos` (`ID_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
