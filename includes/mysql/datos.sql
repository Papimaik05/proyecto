/*
  Recuerda que deshabilitar la opción "Enable foreign key checks" para evitar problemas a la hora de importar el script.
*/
TRUNCATE TABLE `experiencias`;
TRUNCATE TABLE `nivel`;
TRUNCATE TABLE `producto`;
TRUNCATE TABLE `rol`;
TRUNCATE TABLE `usuario`;
TRUNCATE TABLE `compraproducto`;
TRUNCATE TABLE `compraexperiencia`;
TRUNCATE TABLE `noticia`;

INSERT INTO `rol` (`numero`, `nombre`) VALUES
(0, 'admin'),
(1, 'usuario'),
(2, 'Gestor de Contenido');

-- usuario : admin  password:adminpass
-- admin: gestor password:gestorpass
INSERT INTO `usuario` (`username`, `password`, `email`, `rol`, `puntos`) VALUES
('admin', '$2y$10$6JpecvUdOny8.gxnaa4pmusrTX4kPeynEJxaK2b9hgFMk3arvRoKe', 'camore12@ucm.es', 0, 99),
('gestor', '$2y$10$CRbtcLzhW2RSreauttF7iOkQCMkS7z3taJfl7TA/wBJ34o1EZJcN2', 'gestor@gmail.com', 2, 7),
('user', '$2y$10$acRxAvLfMm6zc69p0pOPV.xWqZ7KmKpnZ.CS/38MfLqirSCYDNcP.', 'user@gmail.com', 1, 0);

INSERT INTO `nivel` (`numero`, `nombre`, `minimo`, `maximo`) VALUES
(0, 'cangrejo', 0, 4),
(1, 'delfin', 5, 9),
(2, 'megalodon', 10, 19),
(3, 'poseidon', 20, 1000000);

INSERT INTO `producto` (`nombre`, `id`, `descripcion`, `unidades`, `precio`, `imagen`) VALUES
('Snorkel Ultrapower', 1, 'Gafas y snorkel de polietileno y titaneo parar resispar sin parar.', 3, 20, './img/snorkel.jpg'),
('Submarino el coloso', 2, 'Submarino premium delux ideal para disfrutar de nuestras excursiones con el mayor confort imaginado.\r\nSurca los mares descubriendo sus profundidades gracias a la más última tecnolodia de este navío.', 1, 50000, './img/submarino.jpg'),
('Aletas Coral',3,'Las mejores aletas del mundo para nadar con los animales marinos a toda velocidad!',6,17.99,'./img/aletas.jpg'),
('Caña Anguila',4,'Con esta caña podrás pescar cualquier animal bajo el mar.',8,79.99,'./img/cana.jpg'),
('Kayak Titán',5,'Kayak titánico para surcar los mares.',2,350,'./img/kayak.jpg'),
('Tabla de surf dragón',6,'Tabla de surf para levitar sobre el agua sin ningún esfuerzo.',9,277,'./img/surf.jpg'),
('Bañador Sportacus',7,'Bañador de pinguinos para sumergirte y ser uno más de ellos.',33,9.99,'./img/banador.jpg');

INSERT INTO `experiencias` (`nombre`, `id`, `descripcion`, `precio`, `nivelminimo`, `puntos`, `imagen`) VALUES
('Pesca con Iñaki', 1, 'Sumérgete en esta aventura para poder vivir la experiencia de pescar con el inigualable Iñaki Arrizabalaga.', 150, 0, 2, './img/pesca_inaki.jpg'),
('Conoce a los pinguinos', 2, 'Adéntrate en esta aventura única en la que podrás relacionarte con los pinguinos y jugar a numerosos juegos entretenidos y originales.', 189, 0, 3, './img/pinguinos_madagascar.jpg'),
('Busquemos a Nemo', 3, 'Revive la experiencia de nuevo viviendo en primera persona la inigualable historia de buscando a Nemo.', 250, 1, 5, './img/nemo.jpg'),
('Nada entre tiburones', 4, 'Atrévete a disfrutar la máxima experiencia de esta tienda ¡NADAR ENTRE TIBURONES! SERÁ INOLVIDABLE.', 379, 2, 10, './img/jaula_tiburones.jpg');

INSERT INTO `noticia` (`id`, `imagen`, `descripción`, `fecha`, `titulo`) VALUES
(1, './img/noticia1.jpg', 'El tráfico naval está creciendo y repercute sobre el transporte global, la cadena alimenticia, la defensa nacional e incluso el tiempo libre. Más de 100 000 buques comerciales y 25 000 buques militares operan en todo el mundo. En la actualidad, el 80 % de toda la carga pasa por los puertos, lo que los convierte en los centros de distribución de mercancías a granel más activos del mundo.\r\n\r\nMira a tu alrededor en un buque moderno y verás que Danfoss está dándolo todo para reducir los costes de energía y las emisiones, tanto en la sala de máquinas como en otras áreas.\r\n\r\n \r\n\r\nTanto en buques comerciales como navales, desde cruceros hasta cargueros y portacontenedores, obtendrás ventajas significativas en cuestión de seguridad, velocidad, logística y eficiencia, así como en la reducción de las emisiones al mínimo absoluto. Elige entre una amplia gama de soluciones marinas de Danfoss para la seguridad contra incendios, la obtención de agua limpia a bordo, la supervisión minuciosa de todas las funciones del motor y un control preciso y flexible de la conversión de potencia, a fin de satisfacer las necesidades de todos los procesos tanto a bordo como en tierra.', '2023-04-26', 'Aumentan nuestras instalaciones');