-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2019 a las 00:38:37
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestionhoteles`
--


--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ID_CIUDAD` int(11) NOT NULL,
  `NOMBRE` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `ID_CONTROL` bigint(20) UNSIGNED NOT NULL,
  `ID_HOTEL` varchar(20) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ID_TIPO_H` int(11) DEFAULT NULL,
  `ID_TIPOA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `NIT` varchar(20) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(50) DEFAULT NULL,
  `ID_CIUDAD` int(11) DEFAULT NULL,
  `TOTAL_HABITACIONES` int(11) DEFAULT NULL,
  `REPRESENTANTE_LEGAL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ID_CIUDAD`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`ID_CONTROL`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`NIT`);


-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `ID_CONTROL` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
  --
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`ID_CONTROL`, `ID_HOTEL`, `CANTIDAD`, `ID_TIPO_H`, `ID_TIPOA`) VALUES
(1, '1222', 12, 1, 1),
(2, '1222', 12, 1, 1),
(6, '1222', 14, 5, 4),

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`NIT`, `NOMBRE`, `DIRECCION`, `ID_CIUDAD`, `TOTAL_HABITACIONES`, `REPRESENTANTE_LEGAL`) VALUES
('1222', 'Hotel Benalcazar', 'Cra. 80 #23', 1, 50, NULL),
('23232', 'Hotel Hilton', 'Cra. 1 #23 43', 1, 50, NULL),
('554', 'fdg', 'Cra 96f #22k 40', 1, 2, NULL),
('7773', 'Hotel Cartagena', 'Av el dorado', 2, 0, NULL);

-- --------------------------------------------------------


