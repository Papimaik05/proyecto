-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2023 a las 12:47:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--
-- Creación: 30-04-2023 a las 10:43:31
-- Última actualización: 30-04-2023 a las 10:42:49
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `padre` int(11) DEFAULT NULL,
  `contenido` text NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `me_gusta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Titulo` (`titulo`),
  KEY `Usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraexperiencia`
--
-- Creación: 30-04-2023 a las 10:21:10
--

DROP TABLE IF EXISTS `compraexperiencia`;
CREATE TABLE IF NOT EXISTS `compraexperiencia` (
  `nombre_usuario` varchar(20) NOT NULL,
  `id_experiencia` int(11) NOT NULL,
  KEY `nombre_usuario` (`nombre_usuario`),
  KEY `id_experiencia` (`id_experiencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraproducto`
--
-- Creación: 30-04-2023 a las 10:21:10
--

DROP TABLE IF EXISTS `compraproducto`;
CREATE TABLE IF NOT EXISTS `compraproducto` (
  `nombre_usuario` varchar(20) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `unidades` int(11) NOT NULL,
  KEY `nombre_usuario` (`nombre_usuario`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--
-- Creación: 30-04-2023 a las 10:21:10
--

DROP TABLE IF EXISTS `experiencias`;
CREATE TABLE IF NOT EXISTS `experiencias` (
  `nombre` varchar(25) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `nivelminimo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivelminimo` (`nivelminimo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--
-- Creación: 30-04-2023 a las 10:21:10
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `minimo` int(11) NOT NULL,
  `maximo` int(11) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--
-- Creación: 30-04-2023 a las 10:21:10
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `imagen` text NOT NULL,
  `descripción` text NOT NULL,
  `fecha` date NOT NULL,
  `titulo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--
-- Creación: 30-04-2023 a las 10:21:10
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `nombre` varchar(25) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `unidades` int(11) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--
-- Creación: 30-04-2023 a las 10:21:10
-- Última actualización: 30-04-2023 a las 10:44:47
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 30-04-2023 a las 10:21:10
-- Última actualización: 30-04-2023 a las 10:45:47
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `username` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraexperiencia`
--
ALTER TABLE `compraexperiencia`
  ADD CONSTRAINT `compraexperiencia_ibfk_1` FOREIGN KEY (`id_experiencia`) REFERENCES `experiencias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compraexperiencia_ibfk_2` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`username`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compraproducto`
--
ALTER TABLE `compraproducto`
  ADD CONSTRAINT `compraproducto_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compraproducto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`nivelminimo`) REFERENCES `nivel` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`numero`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
