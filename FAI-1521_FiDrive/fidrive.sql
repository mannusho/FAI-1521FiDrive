-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-12-2020 a las 16:39:45
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fidrive`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivocargado`
--

CREATE TABLE `archivocargado` (
  `idarchivocargado` int(11) NOT NULL,
  `acnombre` varchar(150) NOT NULL,
  `acdescripcion` text NOT NULL,
  `acicono` varchar(50) NOT NULL,
  `idusuario` bigint(20) NOT NULL,
  `aclinkacceso` text NOT NULL,
  `accantidaddescarga` int(11) NOT NULL,
  `accantidadusada` int(11) NOT NULL,
  `acfechainiciocompartir` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `acefechafincompartir` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `acprotegidoclave` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivocargadoestado`
--

CREATE TABLE `archivocargadoestado` (
  `idarchivocargadoestado` int(11) NOT NULL,
  `idestadotipos` int(11) NOT NULL,
  `acedescripcion` text NOT NULL,
  `idusuario` bigint(20) NOT NULL,
  `acefechaingreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `acefechafin` timestamp NULL DEFAULT NULL,
  `idarchivocargado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadotipos`
--

CREATE TABLE `estadotipos` (
  `idestadotipos` int(11) NOT NULL,
  `etdescripcion` varchar(100) NOT NULL,
  `etactivo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadotipos`
--

INSERT INTO `estadotipos` (`idestadotipos`, `etdescripcion`, `etactivo`) VALUES
(1, 'Cargado', 1),
(2, 'Compartido', 1),
(3, 'No Compartido', 1),
(4, 'Eliminado', 1),
(5, 'Desactivado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `roldescripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `roldescripcion`) VALUES
(1, 'administrador'),
(2, 'premium'),
(3, 'visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` bigint(20) NOT NULL,
  `usnombre` varchar(150) NOT NULL,
  `usapellido` varchar(150) NOT NULL,
  `uslogin` varchar(150) NOT NULL,
  `usclave` text NOT NULL,
  `usactivo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usnombre`, `usapellido`, `uslogin`, `usclave`, `usactivo`) VALUES
(1, 'Manuel', 'Ortiz', 'mannusho', 'ZDQ2MDRkZjhiOGNiNmZhNDg3ZjU4ZGViOTkyYjMyNjY=', 1),
(2, 'Lucas', 'Ortiz', 'lookas', 'OTk5MGI5NTljYTQxOWZmZDllYzhhY2I4MjFkOGNjZDc=', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariorol`
--

CREATE TABLE `usuariorol` (
  `idusuario` bigint(20) NOT NULL,
  `idrol` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariorol`
--

INSERT INTO `usuariorol` (`idusuario`, `idrol`) VALUES
(1, 1),
(2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivocargado`
--
ALTER TABLE `archivocargado`
  ADD PRIMARY KEY (`idarchivocargado`),
  ADD UNIQUE KEY `acnombre` (`acnombre`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `archivocargadoestado`
--
ALTER TABLE `archivocargadoestado`
  ADD PRIMARY KEY (`idarchivocargadoestado`),
  ADD KEY `idestadotipos` (`idestadotipos`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idarchivocargado` (`idarchivocargado`);

--
-- Indices de la tabla `estadotipos`
--
ALTER TABLE `estadotipos`
  ADD PRIMARY KEY (`idestadotipos`),
  ADD UNIQUE KEY `etdescripcion` (`etdescripcion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`),
  ADD UNIQUE KEY `roldescripcion` (`roldescripcion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `uslogin` (`uslogin`);

--
-- Indices de la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD PRIMARY KEY (`idusuario`,`idrol`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivocargado`
--
ALTER TABLE `archivocargado`
  MODIFY `idarchivocargado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivocargadoestado`
--
ALTER TABLE `archivocargadoestado`
  MODIFY `idarchivocargadoestado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadotipos`
--
ALTER TABLE `estadotipos`
  MODIFY `idestadotipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivocargado`
--
ALTER TABLE `archivocargado`
  ADD CONSTRAINT `archivocargado_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `archivocargadoestado`
--
ALTER TABLE `archivocargadoestado`
  ADD CONSTRAINT `archivocargadoestado_ibfk_1` FOREIGN KEY (`idestadotipos`) REFERENCES `estadotipos` (`idestadotipos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `archivocargadoestado_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `archivocargadoestado_ibfk_3` FOREIGN KEY (`idarchivocargado`) REFERENCES `archivocargado` (`idarchivocargado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuariorol`
--
ALTER TABLE `usuariorol`
  ADD CONSTRAINT `usuariorol_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
