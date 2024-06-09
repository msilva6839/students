
-- Base de datos: `db_data`

CREATE DATABASE IF NOT EXISTS `db_data` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_data`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleos`
--

DROP TABLE IF EXISTS `empleos`;
CREATE TABLE IF NOT EXISTS `empleos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) DEFAULT NULL,
  `puesto` varchar(50) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleos`
--

INSERT INTO `empleos` (`id`, `id_persona`, `puesto`, `salario`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1, 'Desarrollador', 50000.00, '2023-01-01', NULL),
(2, 2, 'Analista', 45000.00, '2022-02-15', NULL),
(4, 4, 'Diseñador', 40000.00, '2023-05-10', NULL),
(7, 7, 'Consultor', 65000.00, '2018-08-15', '2023-08-14'),
(9, 9, 'Director', 90000.00, '2017-10-10', NULL),
(10, 10, 'Marketing', 42000.00, '2022-11-20', NULL),
(11, 11, 'Desarrollador', 52000.00, '2023-04-15', NULL),
(12, 12, 'Analista', 48000.00, '2022-05-20', NULL),
(13, 13, 'Gerente', 72000.00, '2021-06-25', '2024-06-24'),
(14, 14, 'Diseñador', 42000.00, '2023-07-30', NULL),
(15, 15, 'Administrador', 62000.00, '2020-08-05', NULL),
(16, 16, 'Ingeniero', 57000.00, '2019-09-10', NULL),
(17, 17, 'Consultor', 67000.00, '2018-10-15', '2023-10-14'),
(18, 18, 'Soporte Técnico', 37000.00, '2023-11-20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellido`, `edad`, `genero`, `email`, `telefono`, `direccion`, `fecha_registro`) VALUES
(1, 'Juan', 'Pérez', 30, 'M', 'juan.perez@hotmail.com', '1234567890', 'Calle Falsa 123', '2024-06-08 09:30:16'),
(2, 'María', 'Gómez', 25, 'F', 'maria.gomez@gmail.com', '0987654321', 'Avenida Siempre Viva 456', '2024-06-08 09:30:16'),
(4, 'Ana', 'López', 28, 'F', 'ana.lopez@hotmail.com', '2233445566', 'Calle de la Rosa 101', '2024-06-08 09:30:16'),
(7, 'Carlos', 'García', 45, 'M', 'carlos.garcia@hotmail.com', '5566778899', 'Avenida Estrella 404', '2024-06-08 09:30:16'),
(9, 'Miguel', 'Ramírez', 50, 'M', 'miguel.ramirez@yahoo.com', '7788990011', 'Boulevard del Mar 606', '2024-06-08 09:30:16'),
(10, 'Sofía', 'Ruiz', 22, 'F', 'sofia.ruiz@hotmail.com', '8899001122', 'Avenida del Valle 707', '2024-06-08 09:30:16'),
(11, 'Andrés', 'Sánchez', 33, 'M', 'andres.sanchez@gmail.com', '1122334455', 'Calle Principal 1234', '2024-06-08 09:30:25'),
(12, 'Carolina', 'López', 29, 'F', 'carolina.lopez@hotmail.com', '2233445566', 'Avenida Central 5678', '2024-06-08 09:30:25'),
(13, 'Diego', 'González', 37, 'M', 'diego.gonzalez@yahoo.com', '3344556677', 'Boulevard Norte 910', '2024-06-08 09:30:25'),
(14, 'Eva', 'Fernández', 31, 'F', 'eva.fernandez@gmail.com', '4455667788', 'Calle Secundaria 1112', '2024-06-08 09:30:25'),
(15, 'Fernando', 'Díaz', 42, 'M', 'fernando.diaz@hotmail.com', '5566778899', 'Avenida Este 1314', '2024-06-08 09:30:25'),
(16, 'Gabriela', 'Martínez', 26, 'F', 'gabriela.martinez@yahoo.com', '6677889900', 'Calle Oeste 1516', '2024-06-08 09:30:25'),
(17, 'Hugo', 'Ramírez', 39, 'M', 'hugo.ramirez@gmail.com', '7788990011', 'Avenida Sur 1718', '2024-06-08 09:30:25'),
(18, 'Isabel', 'Torres', 34, 'F', 'isabel.torres@hotmail.com', '8899001122', 'Calle Este 1920', '2024-06-08 09:30:25');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleos`
--
ALTER TABLE `empleos`
  ADD CONSTRAINT `empleos_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
