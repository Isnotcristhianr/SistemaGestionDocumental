-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 14:30:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_documental`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_escuela`
--

CREATE TABLE `tbl_escuela` (
  `esc_id` int(11) NOT NULL,
  `esc_padre` int(11) NOT NULL,
  `esc_nombre` varchar(255) NOT NULL,
  `esc_campus` int(11) NOT NULL DEFAULT 1,
  `esc_vigente` int(11) NOT NULL DEFAULT 2,
  `esc_estado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_escuela`
--

INSERT INTO `tbl_escuela` (`esc_id`, `esc_padre`, `esc_nombre`, `esc_campus`, `esc_vigente`, `esc_estado`) VALUES
(3, 1, 'CONSTRUCCIONES CIVILES', 1, 2, 0),
(4, 4, 'ARQUITECTURA', 1, 2, 0),
(5, 5, 'COMUNICACIÓN', 1, 2, 0),
(6, 6, 'DISEÑO', 1, 2, 0),
(7, 7, 'ECAA', 1, 1, 0),
(8, 8, 'ENCI', 1, 1, 0),
(9, 9, 'GESTIÓN DE EMPRESAS TURÍSTICAS Y HOTELERAS', 1, 1, 0),
(10, 10, 'JURISPRUDENCIA', 1, 1, 0),
(11, 11, 'CIENCIAS SOCIALES Y HUMANÍSTICAS', 1, 1, 0),
(12, 12, 'INGENIERÍA', 1, 1, 0),
(13, 13, 'ARQUITECTURA DISEÑO Y ARTES', 1, 1, 0),
(14, 50, 'LENGUAS Y LINGÜÍSTICA', 1, 2, 0),
(15, 98, 'PUCE-TEC', 1, 1, 0),
(16, 100, 'ENCI (TULCÁN)', 2, 2, 0),
(17, 101, 'COMERCIO INTERNACIONAL', 2, 2, 0),
(18, 102, 'CIENCIAS DE LA EDUCACIÓN', 2, 2, 0),
(20, 104, 'ESCUELA SECRETARIADO EJECUTIVO BILINGÜE', 2, 2, 0),
(21, 105, 'CONSTRUCCIONES CIVILES (TULCÁN)', 2, 2, 0),
(22, 106, 'INFORMÁTICA (TULCÁN)', 2, 2, 0),
(23, 20, 'SECRETARIADO EJECUTIVO BILINGUE', 1, 2, 0),
(24, 15, 'DISEÑO (TULCÁN)', 2, 2, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_escuela`
--
ALTER TABLE `tbl_escuela`
  ADD PRIMARY KEY (`esc_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_escuela`
--
ALTER TABLE `tbl_escuela`
  MODIFY `esc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
