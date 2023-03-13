/*
  Recuerda que deshabilitar la opción "Enable foreign key checks" para evitar problemas a la hora de importar el script.
*/
TRUNCATE TABLE `experiencias`;
TRUNCATE TABLE `nivel`;
TRUNCATE TABLE `producto`;
TRUNCATE TABLE `rol`;
TRUNCATE TABLE `usuario`;

INSERT INTO `rol` (`numero`, `nombre`) VALUES
(0, 'admin'),
(1, 'usuario'),
(2, 'Gestor de Contenido');

INSERT INTO `usuario` (`username`, `password`, `email`, `rol`, `puntos`) VALUES
('admin', 'adminpass', 'camore12@ucm.es', 0, 99);

INSERT INTO `nivel` (`numero`, `nombre`, `minimo`, `maximo`) VALUES
(0, 'cangrejo', 0, 4),
(1, 'delfin', 5, 9),
(2, 'megalodon', 10, 19),
(3, 'poseidon', 20, 100);

INSERT INTO `producto` (`nombre`, `id`, `descripcion`, `unidades`, `precio`, `imagen`) VALUES
('Snorkel Ultrapower', 1, 'Gafas y snorkel de polietileno y titaneo parar resispar sin parar.', 3, 20, './img/snorkel.jpg'),
('Submarino el coloso', 2, 'Submarino premium delux ideal para disfrutar de nuestras excursiones con el mayor confort imaginado.\r\nSurca los mares descubriendo sus profundidades gracias a la más última tecnolodia de este navío.', 1, 50000, './img/submarino.jpg');
