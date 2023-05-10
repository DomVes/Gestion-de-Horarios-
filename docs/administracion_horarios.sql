-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2023 a las 04:56:03
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_usuario_02` (IN `xusu_id` INT(11))   BEGIN
	SELECT * FROM tm_usuario where usu_id=usu_id;
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
  `ID_horario` int(11) NOT NULL,
  `ID_aula` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL,
  `ID_grupo` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia_de_la_semana` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignacion_horarios`
--

INSERT INTO `asignacion_horarios` (`ID_horario`, `ID_aula`, `ID_materia`, `ID_grupo`, `hora_inicio`, `hora_fin`, `dia_de_la_semana`) VALUES
(4, 2, 3, 1, '21:45:00', '21:45:00', '2023-05-16'),
(5, 2, 2, 1, '21:53:00', '21:53:00', 'Lunes - Miercoles'),
(6, 6, 3, 9, '14:31:00', '02:30:00', '2023-05-09');

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
(2, '102', 'B1', 'Laboratorio de Fisica'),
(3, '102', 'B2', 'Calculo Diferencial'),
(4, '2', 'D', 'Laboratorio aplicaciones web'),
(5, '5', 'C', 'Laboratorio diseño de sistemas de información'),
(6, '5', 'B', 'Sala computacional'),
(7, '6', 'C', 'Sala computacional 2'),
(8, '2', 'F', 'Salón general'),
(9, '2', 'I', 'Bloque de investigación'),
(10, '3', 'S', 'Bloque social'),
(11, '102', 'B1', 'Laboratorio de Fisica'),
(12, '30', 'C', 'Clase cálculo');

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

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ID_evento`, `codigo`, `fecha`, `duracion`, `objetivo`) VALUES
(1, '12356', '2023-05-17', '18:34:00', 'SDFERASFGSFGBH'),
(2, '12356', '2023-05-17', '18:34:00', 'SDFERASFGSFGBH'),
(3, 'EV01', '2023-05-11', '13:45:00', 'UIX'),
(4, '0002', '2023-05-20', '10:30:00', 'Capacitación Algebra Lineal'),
(5, '0003', '2023-05-18', '11:00:00', 'Taller Cálculo'),
(6, '0004', '2023-05-17', '09:30:00', 'Parche estudiantil'),
(7, '0005', '2023-05-20', '14:00:00', 'Asesoría Estadística General'),
(8, '0006', '2023-06-30', '10:00:00', 'Reunión para prácticas profesionales'),
(9, '0007', '2023-06-01', '06:00:00', 'Exámenes institucionales'),
(10, '008', '2023-05-24', '10:00:00', 'Orientación sexual'),
(11, '0001', '2023-05-13', '06:00:00', 'Bienvenida');

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
(1, 'EVX43', '32', 41),
(2, 'EVX43', '32', 41),
(3, 'EVG18', '202', 32),
(4, '58031012', '2', 50),
(5, '100031012', '60', 30),
(6, 'EST02GEN85', '3', 50),
(7, 'AP01SER03W', '5', 25),
(8, 'PYTHON5568', '8', 35),
(9, 'MAQ05WEB15', '6', 40),
(10, '589412DIS2', '2', 20),
(11, 'CAL1-25856', '3', 45),
(12, 'ALG01LIN89', '2', 50),
(13, 'EVX4334125', '2022145', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_eventos`
--

CREATE TABLE `inscripcion_eventos` (
  `ID_inscrip` int(11) NOT NULL,
  `evento_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcion_eventos`
--

INSERT INTO `inscripcion_eventos` (`ID_inscrip`, `evento_id`, `grupo_id`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 3, 5),
(4, 5, 7),
(5, 7, 10),
(6, 10, 12),
(7, 4, 5),
(8, 8, 11),
(9, 6, 6),
(11, 7, 1);

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
  `aula_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `docente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_materia`, `id_grupo`, `aula_id`, `nombre`, `docente_id`) VALUES
(2, 3, 6, 'Algebra Lineal', 9),
(3, 6, 8, 'Estadistica General', 4),
(7, 6, 12, 'Calculo diferencial', 1);

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
(2, 'Estudiante', 'ITM', 'user@itm.com', '0192023a7bbd73250516f069df18b500', 1, '3012859682', '2023-03-29 00:00:00', NULL, NULL, 1),
(3, 'Juan Esteban', 'Castaño Castaño', 'castask8@gmail.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 1, '3012859682', '2023-05-05 21:56:38', NULL, NULL, 1),
(4, 'Carmen', 'Arango', 'carmenarango@admin.com', 'fcea920f7412b5da7be0cf42b8c93759', 2, '11111', '2023-05-06 06:43:30', NULL, NULL, 1),
(5, 'Carlos', 'Soto', 'Carlossoto@estudiante.edu.co', 'fcea920f7412b5da7be0cf42b8c93759', 1, '000000', '2023-05-06 06:43:51', NULL, NULL, 1),
(6, 'Alexis', 'Pineda', 'Alexispineda@estudiante.edu.co', 'fcea920f7412b5da7be0cf42b8c93759', 1, '3042569852', '2023-05-06 06:44:19', NULL, NULL, 1),
(7, 'Jhoymar ', 'Isaza', 'Jhoymarisaza@estudiante.edu.co', 'fcea920f7412b5da7be0cf42b8c93759', 1, '5262356262', '2023-05-06 06:44:55', NULL, NULL, 1),
(8, 'Mauricio', 'Agudelo', 'mauricioagudelo203@profesor.co', 'fcea920f7412b5da7be0cf42b8c93759', 1, '7452562015', '2023-05-06 06:45:32', NULL, NULL, 1),
(9, 'Julian', 'Suaza', 'Juliansuaza@profesor.co', 'fcea920f7412b5da7be0cf42b8c93759', 2, '5896251010', '2023-05-06 06:46:03', NULL, NULL, 1),
(10, 'Prueba', 'Itm', 'prueba@prueba.com', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 2, '3012859682', '2023-05-06 14:30:56', NULL, NULL, 1);

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
  ADD PRIMARY KEY (`ID_horario`);

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
  ADD PRIMARY KEY (`ID_inscrip`),
  ADD KEY `ID_grupo` (`grupo_id`),
  ADD KEY `evento_id` (`evento_id`);

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
-- AUTO_INCREMENT de la tabla `asignacion_horarios`
--
ALTER TABLE `asignacion_horarios`
  MODIFY `ID_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `ID_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ID_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `ID_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `inscripcion_eventos`
--
ALTER TABLE `inscripcion_eventos`
  MODIFY `ID_inscrip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `ID_maestro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `inscripcion_eventos_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`ID_evento`),
  ADD CONSTRAINT `inscripcion_eventos_ibfk_2` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`ID_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
