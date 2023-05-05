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
('Barcas de Retiro', 7, 'Disfruta de un relajante paseo por el lago del retiro en las góndolas madrileñas. Impresiona con la cita mas romántica de la capital.', 50, 0, 1, './img/barcas.jpg'),
('Observa delfines', 8, '¡Descubre la emoción de avistar delfines y ballenas en libertad en las aguas de La Gomera! Podrás disfrutar de la maravillosa experiencia de ver estos animales majestuosos en su hábitat natural, sin interferir en su entorno. La actividad se realiza cumpliendo con los compromisos de calidad turística para garantizar un avistamiento responsable y respetuoso, sin barreras que interrumpan la vista del maravilloso océano Atlántico. ¡Aprovecha esta oportunidad única para conectarte con la naturaleza y crear recuerdos inolvidables!', 120, 0, 2, './img/delfines.jpg'),
('Paddle Surf', 9, '¡Aventúrate en el agua con nuestra emocionante excursión de paddle surf! Descubre la belleza del mar mientras haces ejercicio y disfrutas del aire libre en una tabla de surf especialmente diseñada. Nuestros guías expertos te enseñarán todo lo que necesitas saber para navegar y remar con seguridad mientras te sumerges en la naturaleza. Además, podrás disfrutar de impresionantes vistas y sorprenderte con la fauna marina. ¡Únete a nosotros para una experiencia inolvidable en el mar!', 180, 1, 5, './img/paddle'),
('Excursion en Kayak', 10, '¡Sumérgete en la naturaleza y disfruta de una experiencia única en el agua con nuestra emocionante excursión en kayak! Rema en tu propio ritmo mientras exploras hermosas costas, ríos y lagos, y descubre la vida silvestre que habita en sus alrededores. No necesitas experiencia previa, nuestro equipo de guías expertos te dará las instrucciones necesarias y te acompañarán durante toda la aventura. ¡Ven y descubre la belleza del entorno desde una perspectiva diferente!', 170, 0, 2, './img/kayak.jpg'),
('Surf Extremo', 11, '¡Bienvenido al emocionante mundo del surf para los más valientes! Si eres un amante de la adrenalina y la emoción, esta actividad es para ti. Con tu tabla y tu traje de neopreno, podrás desafiar las olas más grandes y hacer maniobras que te llevarán al límite de tus habilidades.', 220, 2, 10, './img/surfear.jpg'),
('Paseo en Catamaran', 12, '¿Te imaginas disfrutar de un día increíble navegando por el mar en compañía de tus amigos o familia? Con una salida en catamarán podrás vivir una experiencia inolvidable, llena de diversión y relajación. Podrás disfrutar de las impresionantes vistas del mar y la costa, bañarte en aguas cristalinas y practicar snorkel para descubrir la belleza del fondo marino. Además, podrás disfrutar de una deliciosa comida a bordo y refrescarte con bebidas mientras te relajas bajo el sol y la brisa marina. ¡No hay nada mejor que disfrutar del mar en buena compañía en una experiencia de catamarán!', 250, 0, 2, './img/catamaran.jpg'),
('Gran Barrera De Coral', 13, 'La Gran Barrera de Coral Australia es todo un Jardín del Edén para los buceadores. En la zona de Queensland, esta aventura puede convertirse en una pesadilla si no se toman precauciones ante las letales medusas. Un ejemplo: la especie irukandji puede provocar la muerte con sus picaduras. Su veneno es cien veces más toxico que el de la cobra.', 260, 2, 10, './img/coral.jpg'),
('Rafting', 14, '¿Estás buscando una aventura emocionante y refrescante? ¡El rafting es la actividad perfecta para ti y tus amigos o familia! Desciende por un río en un bote inflable mientras trabajas en equipo para superar los rápidos y obstáculos en el camino. ¡Es una experiencia emocionante, llena de adrenalina y diversión para todas las edades y niveles de habilidad! Además, disfrutarás de vistas impresionantes de la naturaleza y un entorno único. Los guías expertos te proporcionarán todo el equipo necesario y te enseñarán las técnicas adecuadas para navegar en el río de manera segura. ¡No te pierdas esta experiencia única y divertida que nunca olvidarás!', 180, 1, 5, './img/rafting.jpg'),
('Descenso del Sella', 15, '¡Bienvenido a la emocionante aventura del Descenso del Sella! Prepárate para disfrutar de un día lleno de diversión y adrenalina en medio de la naturaleza asturiana. Descenderás por el río Sella en una balsa neumática, acompañado por tus amigos o familiares, y un guía experto que te ayudará en todo momento. A medida que avanzas por el río, te sorprenderás con paisajes de ensueño, con montañas y bosques verdes que rodean el río. Sentirás la emoción de las corrientes del río y tendrás que sortear obstáculos naturales, como rápidos y cascadas, que pondrán a prueba tu habilidad en el agua. ', 160, 0, 2, './img/sella.jpg'),
('Kite-Surf', 16, '¿Quieres sentir la emoción de volar sobre el agua y la brisa en tu rostro? El kite-surf es el deporte acuático perfecto para ti. Aprenderás a controlar una cometa gigante que te impulsará sobre tu tabla, realizando saltos impresionantes y maniobras acrobáticas en el agua. Nuestros instructores expertos te guiarán en todo momento para que tengas una experiencia segura y emocionante. ¡Sé parte de la comunidad de kite-surf y descubre una nueva forma de sentir la adrenalina en el agua!', 220, 1, 5, './img/kite-surf.jpg');

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
('Lancha Morsa',11, 'Lancha todoterreno con cuatro modos de velocidad que se adaptan según tus gustos, no te lo pierdas y pruébala!', 3, 5000, './img/lancha.jpg'),
('Crocs Boreales',12, 'Crocs cómodas para caminar de la manera más cómoda por la arena de la playa.', 26, 50, './img/crocs.jpg'),
('Nevera portátil', 13, 'Con su diseño aislado térmicamente y la ayuda de algunos cubitos de hielo, esta nevera portátil es la compañera perfecta para mantener tus bebidas y alimentos frescos en cualquier lugar y en cualquier momento. ', 7, 30, './img/nevera.jpg'),
('Silla playera', 14, 'Se trata de un espectacular modelo de silla con un espaldar y asiento en malla transpirable que incluye soporte para vasos, para estar cerca de la arena. Una manera de estar muy cómodos.', 13, 52, '.img/silla.jpg'),
('Neopreno', 15, 'Es el mejor amigo de los nadadores, surfistas y buceadores, manteniéndolos calientes y protegidos mientras disfrutan de las aguas frías del océano. Así que si alguna vez te encuentras necesitando una capa extra de protección para tus próximas aventuras, no dudes en buscar algo hecho de neopreno. ¡Te encantará!', 28, 120, './img/neopreno.jpg'),
('Flotador ', 16, 'Este flotador para niños es la herramienta perfecta para que los más pequeños de la casa aprendan a nadar y se diviertan en la playa. Con su diseño ergonómico y seguro, este flotador está hecho con materiales de alta calidad y resistentes al agua, para asegurar la durabilidad del producto.', 18, 10, './img/flotador.jpg'),
('Kit Buceo Niños', 17, '¿Estás buscando una aventura emocionante en el agua con tus hijos? ¡Nuestro kit de buceo para niños es perfecto para ti! Diseñado para los pequeños exploradores submarinos, nuestro kit incluye todo lo que necesitan para sumergirse en el mundo del buceo de manera segura y divertida.', 23, 15, './img/kitBuceo.jpg'),
('Bronceador', 18, 'Nuestro bronceador te ayudará a obtener ese tono dorado que tanto deseas mientras disfrutas de un relajante paseo en barca. Además, su fórmula especial te protegerá de los rayos UV dañinos del sol, manteniendo tu piel sana y hermosa', 12, 14, './img/bronceador.jpg'),
('Barca Hinchable', 19, 'Perfecta para pasar un día en la playa o en el lago con amigos o familiares, esta barca hinchable es fácil de transportar y almacenar. Con capacidad para varias personas, podrás relajarte y disfrutar de la brisa marina mientras te deslizas por el agua. ¡No esperes más para tener tu propia barca hinchable y vivir grandes aventuras acuáticas!', 12, 67, './img/barcaHinchable.jpg'),
('Escarpines', 20, 'Los escarpines son el complemento perfecto para tus aventuras acuáticas. Estos zapatos de neopreno son ligeros y cómodos, y están diseñados para proteger tus pies en el agua y en la orilla. Con su suela antideslizante, podrás caminar con confianza sobre rocas y superficies resbaladizas, mientras que su ajuste ceñido te garantizará un gran ajuste y flexibilidad para poder moverte libremente. ', 15, 25, './img/escarpines.jpg'),
('Chaleco Salvavidas', 21, 'Un chaleco salvavidas es el mejor amigo de cualquier persona que se divierte en el agua. Es como un abrazo cálido y protector que te da seguridad y tranquilidad, sabiendo que te mantendrá a flote en caso de emergencia. Con un diseño cómodo y ajustable, puedes sentirte libre de moverte con facilidad y disfrutar al máximo de tus actividades acuáticas favoritas, sabiendo que siempre estarás seguro y protegido.', 17, 38, './img/chaleco.jpg'),
('Tabla Paddle Surf', 22, '¡Prepárate para disfrutar de la naturaleza con estilo en una tabla de paddle surf! Con una tabla de paddle surf, podrás navegar por el agua en cualquier lugar que desees, desde tranquilas aguas cristalinas hasta grandes olas del océano. Las tablas de paddle surf son fáciles de usar y se adaptan a cualquier nivel de habilidad, desde principiantes hasta expertos. Además, son una excelente manera de mantenerse en forma mientras disfrutas del aire libre y la belleza natural de los cuerpos de agua.', 19, 200, './img/tabla.jpg'),
('Casco Surf', 23, '¡Protege tu cabeza mientras surfeas con estilo con nuestro casco de surf! Este casco ha sido diseñado pensando en tu seguridad y comodidad, lo que significa que puedes concentrarte en montar las mejores olas. Con una carcasa resistente y un acolchado suave en el interior, este casco te mantendrá protegido de cualquier impacto mientras te deslizas sobre el agua. Además, su diseño ligero y ventilado te mantendrá fresco incluso en los días más calurosos. ¡Prepárate para montar olas con confianza con nuestro casco de surf!', 26, 35, './img/casco.jpg'),
('Piragua', 24, '¡La aventura está a solo unos remos de distancia con nuestra piragua! Disfruta de la naturaleza y explora los lagos y ríos cercanos en una de nuestras piraguas de alta calidad. Ya sea que seas un novato o un experto, nuestras piraguas ofrecen una experiencia divertida y emocionante en el agua. Con su diseño resistente y cómodo, podrás remar sin preocupaciones y disfrutar del paisaje mientras te mantienes activo y en forma. ', 11, 150, './img/piragua.jpg');

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
