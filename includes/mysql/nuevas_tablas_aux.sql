-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2023 a las 19:10:11
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

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
-- Estructura de tabla para la tabla `compraexperiencia`
--

CREATE TABLE `compraexperiencia` (
  `nombre_usuario` varchar(20) NOT NULL,
  `id_experiencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compraproducto`
--

CREATE TABLE `compraproducto` (
  `nombre_usuario` varchar(20) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `nombre` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `nivelminimo` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `experiencias`
--

INSERT INTO `experiencias` (`nombre`, `id`, `descripcion`, `precio`, `nivelminimo`, `puntos`, `imagen`) VALUES
('Pesca con Iñaki', 1, 'Sumérgete en esta aventura para poder vivir la experiencia de pescar con el inigualable Iñaki Arrizabalaga.', 150, 0, 2, './img/pesca_inaki.jpg'),
('Conoce a los pinguinos', 2, 'Adéntrate en esta aventura única en la que podrás relacionarte con los pinguinos y jugar a numerosos juegos entretenidos y originales.', 189, 0, 3, './img/pinguinos_madagascar.jpg'),
('Busquemos a Nemo', 3, 'Revive la experiencia de nuevo viviendo en primera persona la inigualable historia de buscando a Nemo.', 250, 1, 5, './img/nemo.jpg'),
('Nada entre tiburones', 4, 'Atrévete a disfrutar la máxima experiencia de esta tienda, ¡NADAR ENTRE TIBURONES!, SERÁ INOLVIDABLE.', 379, 2, 10, './img/jaula_tiburones.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `minimo` int(11) NOT NULL,
  `maximo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`numero`, `nombre`, `minimo`, `maximo`) VALUES
(0, 'cangrejo', 0, 4),
(1, 'delfin', 5, 9),
(2, 'megalodon', 10, 19),
(3, 'poseidon', 20, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `nombre` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `unidades` int(11) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nombre`, `id`, `descripcion`, `unidades`, `precio`, `imagen`) VALUES
('Snorkel Ultrapower', 1, 'Gafas y snorkel de polietileno y titaneo parar resispar sin parar.', 3, 20, './img/snorkel.jpg'),
('Submarino el coloso', 2, 'Submarino premium delux ideal para disfrutar de nuestras excursiones con el mayor confort imaginado.\r\nSurca los mares descubriendo sus profundidades gracias a la más última tecnolodia de este navío.', 1, 50000, './img/submarino.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`numero`, `nombre`) VALUES
(0, 'admin'),
(1, 'usuario'),
(2, 'Gestor de Contenido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(20) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `email`, `rol`, `puntos`) VALUES
('admin', '$2y$10$6JpecvUdOny8.gxnaa4pmusrTX4kPeynEJxaK2b9hgFMk3arvRoKe', 'camore12@ucm.es', 0, 99),
('anita', '$2y$10$kmQw/zxL.XK4qlpKULsF1.HrLRrRsnGvRH2.gmPI/F4A26GGPkY1e', 'dinamita@gmail.com', 1, 0),
('gestor', '$2y$10$CRbtcLzhW2RSreauttF7iOkQCMkS7z3taJfl7TA/wBJ34o1EZJcN2', 'gestor@gmail.com', 2, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compraexperiencia`
--
ALTER TABLE `compraexperiencia`
  ADD KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `id_experiencia` (`id_experiencia`);

--
-- Indices de la tabla `compraproducto`
--
ALTER TABLE `compraproducto`
  ADD KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nivelminimo` (`nivelminimo`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`numero`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`username`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

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
