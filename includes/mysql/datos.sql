-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2023 a las 12:48:40
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

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `titulo`, `usuario`, `padre`, `contenido`, `fecha_de_creacion`, `me_gusta`) VALUES
(26, 'Hice con mis hijos Buscando a Nemo', 'admin', 0, 'Que experiencia mas divertida. Mis hijos salieron encantados. Ideal para pasarlo en grande en familia. Recomiendo llevar bocatas sumergibles, puede entrar el hambre bajo el mar y no hay  muchos Mercadonas por allí abajo. Repetiremos encantados', '2023-05-03', 0),
(27, 'Genial', 'admin', 26, 'Estaba dudando si ir con mi abuela de 60 años, ahora tengo claro que es una idea nefasta, muchas gracias', '2023-05-03', 0),
(28, 'Las aletas van genial', 'admin', 0, 'Compre las aletas de la tienda y estoy encantado, que maravilla. Voy nadando al trabajo y llego enseguida. Que gran producto', '2023-05-03', 0);
--
-- Volcado de datos para la tabla `experiencias`
--

INSERT INTO `experiencias` (`nombre`, `id`, `descripcion`, `precio`, `nivelminimo`, `puntos`, `imagen`) VALUES
('Pesca con Iñaki', 1, 'Sumérgete en esta aventura para poder vivir la experiencia de pescar con el inigualable Iñaki Arrizabalaga.', 150, 0, 2, './img/pesca_inaki.jpg'),
('Conoce a los pinguinos', 2, 'Adéntrate en esta aventura única en la que podrás relacionarte con los pinguinos y jugar a numerosos juegos entretenidos y originales.', 189, 0, 3, './img/pinguinos_madagascar.jpg'),
('Busquemos a Nemo', 3, 'Revive la experiencia de nuevo viviendo en primera persona la inigualable historia de buscando a Nemo.', 250, 1, 5, './img/nemo.jpg'),
('Nada entre tiburones', 4, 'Atrévete a disfrutar la máxima experiencia de esta tienda ¡NADAR ENTRE TIBURONES! SERÁ INOLVIDABLE.', 379, 2, 10, './img/jaula_tiburones.jpg'),
('Visita la Atlantida', 6, 'Dicen los rumores que bajo el lago del retiro de Madrid se encuentra una ciudad sumergida. Adéntrate con nuestros profesionales y descubre este enigma.', 120, 1, 4, './img/atlantida.jpg'),
('Barcas de Retiro', 7, 'Disfruta de un relajante paseo por el lago del retiro en las góndolas madrileñas. Impresiona con la cita mas romántica de la capital.', 50, 0, 1, './img/barcas.jpg');

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`numero`, `nombre`, `minimo`, `maximo`) VALUES
(0, 'cangrejo', 0, 4),
(1, 'delfin', 5, 9),
(2, 'megalodon', 10, 19),
(3, 'poseidon', 20, 1000000);

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id`, `imagen`, `descripción`, `fecha`, `titulo`) VALUES
(1, './img/noticia1.jpg', 'Nuestra empresa crece, y amigos marinos abre una nueva sede en Cantabria. Contamos con un nuevo aquario con las especies marinas más alucinantes. Dentro de poco abriremos nuevas experiencias para que sigais disfrutando del océano!', '2023-04-26', 'Aumentan nuestras instalaciones'),
(2, './img/atlantida.jpg', 'Disfruta de nuestra nueva experiencia: ¡VISITA LA ATLANTIDA! Cómprala ya y disfrútala con tus mejores amigos', '2023-05-03', 'Nueva Experiencia');
--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nombre`, `id`, `descripcion`, `unidades`, `precio`, `imagen`) VALUES
('Snorkel Ultrapower', 1, 'Gafas y snorkel de polietileno y titaneo parar respirar sin parar.', 3, 20, './img/snorkel.jpg'),
('Submarino el coloso', 2, 'Submarino premium delux ideal para disfrutar de nuestras excursiones con el mayor confort imaginado.\r\nSurca los mares descubriendo sus profundidades gracias a la más última tecnolodia de este navío.', 1, 50000, './img/submarino.jpg'),
('Aletas Coral', 3, 'Las mejores aletas del mundo para nadar con los animales marinos a toda velocidad!', 6, 17.99, './img/aletas.jpg'),
('Caña Anguila', 4, 'Con esta caña podrás pescar cualquier animal bajo el mar.', 8, 79.99, './img/cana.jpg'),
('Kayak Titán', 5, 'Kayak titánico para surcar los mares.', 2, 350, './img/kayak.jpg'),
('Tabla de surf dragón', 6, 'Tabla de surf para levitar sobre el agua sin ningún esfuerzo.', 9, 277, './img/surf.jpg'),
('Bañador Sportacus Hombre', 7, 'Bañador de pinguinos masculino para sumergirte y ser uno más de ellos.', 33, 9.99, './img/banador.jpg'),
('Bombona de oxígeno', 8, 'Este mini tanque de buceo tiene una capacidad de 0,5 l y puede respirar bajo el agua durante 5-10 minutos. Al mismo tiempo, el botella de buceo tiene un dispositivo de filtración de tres capas, que evita de manera efectiva la entrada de polvo e impurezas, lo que hace que el gas inhalado sea más limpio. (Atención: la profundidad de buceo, la temperatura y la frecuencia respiratoria afectarán el tiempo de uso del tanque de buceo)', 12, 129, './img/bombona.jpg'),
('Bañador Sportacus Mujer', 9, 'Bañador de pinguinos femenino para sumergirte y ser uno más de ellos.', 45, 14, './img/banadorm.jpg'),
('Sombrilla H2O',10, 'Sobrilla perfecta para protegerte de los rayos solares malignos.', 7, 46, './img/sombrilla.jpg'),
('Lancha',11, 'Lancha todoterreno con cuatro modos de velocidad que se adaptan según tus gustos, no te lo pierdas y pruébala!  ', 3, 5000, './img/lancha.jpg'),
('Crocs',12, 'Crocs cómodas para caminar de la manera más cómoda por la arena de la playa.', 26, 50, './img/crocs.jpg');


--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`numero`, `nombre`) VALUES
(0, 'admin'),
(1, 'usuario'),
(2, 'Gestor de Contenido'),
(3, 'moderador');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `email`, `rol`, `puntos`) VALUES
('admin', '$2y$10$6JpecvUdOny8.gxnaa4pmusrTX4kPeynEJxaK2b9hgFMk3arvRoKe', 'camore12@ucm.es', 0, 99),
('gestor', '$2y$10$CRbtcLzhW2RSreauttF7iOkQCMkS7z3taJfl7TA/wBJ34o1EZJcN2', 'gestor@gmail.com', 2, 7),
('moderador', '$2y$10$oH6cYF42VokJa60raKAmEuCpDQRNx8AVxjNOU9P61wCQBP3cK549S', 'moderador@gmail.com', 3, 10),
('user', '$2y$10$acRxAvLfMm6zc69p0pOPV.xWqZ7KmKpnZ.CS/38MfLqirSCYDNcP.', 'user@gmail.com', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
