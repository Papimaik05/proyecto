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