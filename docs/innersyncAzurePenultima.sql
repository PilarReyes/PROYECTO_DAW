-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-06-2024 a las 07:50:41
-- Versión del servidor: 8.0.36-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `innersync`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `ubicacion`) VALUES
(20, 'ir de viaje a suiza en junio', '', '2024-07-06 18:01:00', '2024-06-09 18:22:00', ''),
(21, 'Entregar proyecto', '', '2024-06-06 15:57:00', '2024-06-12 18:22:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventosespeciales`
--

CREATE TABLE `eventosespeciales` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` enum('cumpleaños','aniversario') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notas` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventosespeciales`
--

INSERT INTO `eventosespeciales` (`id`, `nombre`, `fecha`, `tipo`, `notas`) VALUES
(12, 'mundomar', '2024-06-08', 'cumpleaños', ''),
(14, 'cumple jorge', '2024-05-31', 'cumpleaños', ''),
(15, 'Cumple Noel', '2024-12-31', 'cumpleaños', ''),
(16, 'Cumpleaños María', '2024-06-21', 'cumpleaños', ''),
(17, 'Fran', '2024-09-05', 'cumpleaños', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitos`
--

CREATE TABLE `habitos` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `activo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitos`
--

INSERT INTO `habitos` (`id`, `nombre`, `descripcion`, `activo`) VALUES
(27, 'pasear por la playa', 'y caminar descalza por la orilla', 0),
(28, 'jugar a los coches', 'con mi hijo Noel', 0),
(29, 'Ejercicio Diario', 'Realizar al menos 30 minutos de actividad física cada día.', 1),
(30, 'Hidratación', 'Beber 8 vasos de agua al día.', 1),
(31, 'Dieta Saludable', 'Consumir 5 porciones de frutas y verduras cada día.', 1),
(32, 'Yoga/Meditación', 'Practicar yoga o meditación al menos 15 minutos al día.', 1),
(33, 'Lectura de Libros', 'Leer 20 páginas de un libro cada día.', 1),
(34, 'Skincare', 'Dedicar tiempo cada día a limpiar, hidratar y proteger la piel, adecuado para la mañana y la noche.', 1),
(35, 'correr cada mañana', 'por el paseo', 1),
(36, 'ir al cine', 'el sabado', 1),
(37, 'pasear por la playa', 'del cura', 1),
(38, 'Sueño', 'Dormir al menos 7-8 horas cada noche.', 0),
(39, 'Sueño', 'Dormir al menos 7-8 horas cada noche.', 1),
(40, 'Sueño', 'Dormir al menos 7-8 horas cada noche.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitospredefinidos`
--

CREATE TABLE `habitospredefinidos` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitospredefinidos`
--

INSERT INTO `habitospredefinidos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Ejercicio Diario', 'Realizar al menos 30 minutos de actividad física cada día.'),
(2, 'Hidratación', 'Beber 8 vasos de agua al día.'),
(3, 'Dieta Saludable', 'Consumir 5 porciones de frutas y verduras cada día.'),
(4, 'Sueño', 'Dormir al menos 7-8 horas cada noche.'),
(5, 'Yoga/Meditación', 'Practicar yoga o meditación al menos 15 minutos al día.'),
(7, 'Tiempo en la Naturaleza', 'Pasar tiempo al aire libre al menos 30 minutos al día.'),
(8, 'Lectura de Libros', 'Leer 20 páginas de un libro cada día.'),
(9, 'Planificación Diaria', 'Planificar las actividades del día siguiente cada noche.'),
(10, 'Skincare', 'Dedicar tiempo cada día a limpiar, hidratar y proteger la piel, adecuado para la mañana y la noche.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialmood`
--

CREATE TABLE `historialmood` (
  `id` int NOT NULL,
  `estado_animo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historialmood`
--

INSERT INTO `historialmood` (`id`, `estado_animo`, `fecha`) VALUES
(4, 'Feliz', '2024-05-06'),
(5, 'Motivado', '2024-05-07'),
(6, 'Feliz', '2024-05-07'),
(7, 'Entusiasta', '2024-05-08'),
(8, 'Motivado', '2024-05-08'),
(9, 'Agradecido', '2024-05-15'),
(10, 'Estresado', '2024-05-22'),
(11, 'Entusiasta', '2024-05-23'),
(12, 'Feliz', '2024-05-24'),
(13, 'Motivado', '2024-05-25'),
(14, 'Triste', '2024-05-26'),
(15, 'Tranquilo', '2024-05-27'),
(16, 'Apático', '2024-05-28'),
(17, 'Agradecido', '2024-05-29'),
(18, 'Entusiasta', '2024-05-30'),
(19, 'Motivado', '2024-05-31'),
(20, '', '2024-06-02'),
(21, '', '2024-06-02'),
(22, '', '2024-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicohabitos`
--

CREATE TABLE `historicohabitos` (
  `id` int NOT NULL,
  `id_habito` int NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historicohabitos`
--

INSERT INTO `historicohabitos` (`id`, `id_habito`, `fecha`) VALUES
(33, 27, '2024-05-15'),
(34, 32, '2024-05-15'),
(35, 34, '2024-05-15'),
(43, 27, '2024-05-18'),
(44, 28, '2024-05-18'),
(45, 27, '2024-05-18'),
(46, 28, '2024-05-18'),
(47, 27, '2024-05-18'),
(48, 27, '2024-05-18'),
(49, 35, '2024-05-20'),
(50, 36, '2024-05-20'),
(51, 37, '2024-05-20'),
(52, 32, '2024-05-20'),
(53, 33, '2024-05-20'),
(54, 31, '2024-05-22'),
(55, 32, '2024-05-22'),
(56, 33, '2024-05-22'),
(57, 34, '2024-05-22'),
(58, 29, '2024-05-23'),
(59, 30, '2024-05-23'),
(60, 32, '2024-05-23'),
(61, 35, '2024-05-23'),
(62, 31, '2024-05-24'),
(63, 32, '2024-05-24'),
(64, 35, '2024-05-24'),
(65, 36, '2024-05-24'),
(66, 37, '2024-05-24'),
(67, 29, '2024-05-25'),
(68, 30, '2024-05-25'),
(69, 31, '2024-05-25'),
(70, 34, '2024-05-25'),
(71, 31, '2024-05-26'),
(72, 32, '2024-05-26'),
(73, 33, '2024-05-26'),
(74, 31, '2024-05-27'),
(75, 32, '2024-05-27'),
(76, 34, '2024-05-27'),
(77, 35, '2024-05-27'),
(78, 31, '2024-05-28'),
(79, 32, '2024-05-28'),
(80, 33, '2024-05-28'),
(81, 34, '2024-05-28'),
(82, 36, '2024-05-29'),
(83, 37, '2024-05-29'),
(84, 35, '2024-05-30'),
(85, 36, '2024-05-30'),
(86, 37, '2024-05-30'),
(87, 39, '2024-05-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moodtracker`
--

CREATE TABLE `moodtracker` (
  `id` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `estado_animo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `moodtracker`
--

INSERT INTO `moodtracker` (`id`, `fecha`, `estado_animo`) VALUES
(1, '2024-04-17', 'Feliz'),
(2, '2024-04-17', 'Triste'),
(3, '2024-04-17', 'Tranquilo'),
(4, '2024-04-17', 'Estresado'),
(5, '2024-04-17', 'Motivado'),
(6, '2024-04-17', 'Apático'),
(7, '2024-04-17', 'Entusiasta'),
(8, '2024-04-17', 'Desanimado'),
(9, '2024-04-17', 'Agradecido'),
(10, '2024-04-17', 'Indiferente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `fecha` date DEFAULT NULL,
  `estado` enum('pendiente','completada','aplazada','cancelada') COLLATE utf8mb4_general_ci NOT NULL,
  `prioridad` enum('alta','media','baja') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `titulo`, `descripcion`, `fecha`, `estado`, `prioridad`) VALUES
(97, 'Reunión cliente', 'Por video conferencia', '2024-05-15', '', ''),
(99, 'Cita con el dentista', '', '2024-05-23', '', ''),
(100, 'comprar zapatos a Noël', '', '2024-05-24', '', ''),
(101, 'comprar regalo a Leo', '', '2024-05-08', '', ''),
(102, 'comprar ropa para Noel', '', '2024-06-08', '', ''),
(104, 'hacer la compra', 'En mercadona', '2024-06-11', 'pendiente', 'alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `usuario`) VALUES
(3, 'Pilar', 'Perez Osuna', 'pilposuna@hotmail.com', '$2y$10$SuDV4S5qzNNn4bNjN1.VueBZIu6K8rTIscBbP4RhJu419yoahIDFq', 'pili'),
(4, 'Noel', 'Veyrat Perez', 'pilosuna@gmail.com', '$2y$10$y.oQNZnf2kxqeobdfC/.VOGiRH1VdVjgYf8coiP/HO13N8F3TddAy', 'noel'),
(5, 'Francois', 'Veyrat', 'francois.veyrat@didomi.io', '$2y$10$CtSZHM7M9qSg9WQ9/DapEeHl4Qtcf36lPihiPpOFKs.1SPEzyweU2', 'franico'),
(7, 'Alfonso', 'profe', 'alfonso.serrano@iestorrevigia.es', '$2y$10$b.gTcedbpV0b09dm/hyQd.92fsUHjdP6qYj7SQmK1A668Txd8im8.', 'alfonso1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventosespeciales`
--
ALTER TABLE `eventosespeciales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitos`
--
ALTER TABLE `habitos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitospredefinidos`
--
ALTER TABLE `habitospredefinidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historialmood`
--
ALTER TABLE `historialmood`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historicohabitos`
--
ALTER TABLE `historicohabitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habito` (`id_habito`);

--
-- Indices de la tabla `moodtracker`
--
ALTER TABLE `moodtracker`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `eventosespeciales`
--
ALTER TABLE `eventosespeciales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `habitos`
--
ALTER TABLE `habitos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `habitospredefinidos`
--
ALTER TABLE `habitospredefinidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historialmood`
--
ALTER TABLE `historialmood`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `historicohabitos`
--
ALTER TABLE `historicohabitos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `moodtracker`
--
ALTER TABLE `moodtracker`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historicohabitos`
--
ALTER TABLE `historicohabitos`
  ADD CONSTRAINT `historicohabitos_ibfk_1` FOREIGN KEY (`id_habito`) REFERENCES `habitos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
