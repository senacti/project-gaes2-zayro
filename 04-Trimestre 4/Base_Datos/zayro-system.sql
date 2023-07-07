-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 03:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zayro-system`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ObtenerDatosEnvio` (IN `IDEnvio` INT)   BEGIN
    DECLARE transportadora VARCHAR(100);
    DECLARE estado VARCHAR(100);
    DECLARE numero_radicado VARCHAR(50);
    
    SELECT t.`NOMBRE_TRANSPORTADORA` INTO transportadora
    FROM TRANSPORTADORA t
    INNER JOIN ENVIOS e ON t.`ID_TRANSPORTADORA` = e.`ID_TRANSPORTADORA`
    WHERE e.`ID_ENVIO` = IDEnvio;
    
    SELECT es.`DESCRIPCION_ESTADO` INTO estado
    FROM ESTADO es
    INNER JOIN ENVIOS e ON es.`ID_ENVIO` = e.`ID_ENVIO`
    WHERE e.`ID_ENVIO` = IDEnvio;
    
    SELECT e.`NUMERO_RADICADO_ENVIO` INTO numero_radicado
    FROM ENVIOS e
    WHERE e.`ID_ENVIO` = IDEnvio;
    
    SELECT numero_radicado AS 'Número de Radicado', transportadora AS 'Transportadora', estado AS 'Estado';
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `ObtenerDatosProducto` (`IDProducto` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE datosProducto VARCHAR(255);
    DECLARE nombreCategoria VARCHAR(50);
    DECLARE talla VARCHAR(10);
    
    SELECT p.`NOMBRE_DISFRAZ`, c.`CATEGORIA`, t.`NUMERO_TALLA`
    INTO datosProducto, nombreCategoria, talla
    FROM PRODUCTO p
    INNER JOIN CATEGORIA c ON p.`ID_CATEGORIA` = c.`ID_CATEGORIA`
    INNER JOIN TALLA t ON p.`ID_TALLA` = t.`ID_TALLA`
    WHERE p.`ID_PRODUCTO` = IDProducto;
    
    SET datosProducto = CONCAT(datosProducto, ', Categoría: ', nombreCategoria, ', Talla: ', talla);
    
    RETURN datosProducto;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `ObtenerDatosUsuario` (`IDUsuario` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE datosUsuario VARCHAR(255);
    
    SELECT CONCAT('Nombre: ', u.NOMBRE, ', ID Permiso: ', GROUP_CONCAT(p.ID_PERMISO), ', Permiso: ', GROUP_CONCAT(p.PERMISO))
    INTO datosUsuario
    FROM usuarios u
    JOIN roles_sistema r ON u.ID_ROL = r.ID_ROL
    JOIN roles_sistema_permisos rp ON r.ID_ROL = rp.ID_ROL
    JOIN permisos p ON rp.ID_PERMISO = p.ID_PERMISO
    WHERE u.ID_USUARIO = IDUsuario;
    
    RETURN datosUsuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `accesorios`
--

CREATE TABLE `accesorios` (
  `ID_ACCESORIO` int(10) NOT NULL,
  `ACCESORIOS` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accesorios`
--

INSERT INTO `accesorios` (`ID_ACCESORIO`, `ACCESORIOS`) VALUES
(0, 'Sin accesorios'),
(1, 'Capa'),
(2, 'Varita mágica'),
(3, 'Corona'),
(4, 'Espada'),
(5, 'Alas'),
(6, 'Máscara'),
(7, 'Cinturón'),
(8, 'Gorro'),
(9, 'Utensilios de cocina'),
(10, 'Balón de fútbol'),
(11, 'Melena de león'),
(12, 'Accesorios de Bella'),
(13, 'Sombrero de pirata'),
(14, 'Cuerno de unicornio'),
(15, 'Zapatillas de cristal'),
(16, 'Casco de Iron Man'),
(17, 'Escudo de caballero medieval'),
(18, 'Casco de astronauta'),
(19, 'Raqueta de tenis'),
(20, 'Collar de jirafa');

-- --------------------------------------------------------

--
-- Table structure for table `cambio_campaña`
--

CREATE TABLE `cambio_campaña` (
  `id` int(255) NOT NULL,
  `ACCION` int(255) NOT NULL,
  `FECHA_HORA` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cambio_campaña`
--

INSERT INTO `cambio_campaña` (`id`, `ACCION`, `FECHA_HORA`) VALUES
(1, 0, '2023-07-06 17:50:38'),
(2, 0, '2023-07-06 17:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `campañas`
--

CREATE TABLE `campañas` (
  `ID_CAMPAÑA` int(10) NOT NULL,
  `NOMBRE_CAMPAÑA` varchar(45) DEFAULT NULL,
  `DESCRIPCION` varchar(60) DEFAULT NULL,
  `EMAIL_CLIENTES` varchar(45) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `ID_USUARIO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campañas`
--

INSERT INTO `campañas` (`ID_CAMPAÑA`, `NOMBRE_CAMPAÑA`, `DESCRIPCION`, `EMAIL_CLIENTES`, `FECHA_INICIO`, `FECHA_FIN`, `ID_USUARIO`) VALUES
(1, 'Dia del Niño', 'Celebracion especial para los niños ', 'cesar@example.com', '2023-07-18 00:00:00', '2023-07-25 00:00:00', 15),
(2, 'Día de la Independencia', 'Celebración con promociones especiales', 'laura.ramirez@example.com', '2023-07-04 00:00:00', '2023-07-04 00:00:00', 22),
(3, 'Regreso a Clases', 'Ofertas en artículos escolares', 'sofia.lopez@example.com', '2023-08-15 00:00:00', '2023-09-15 00:00:00', 10),
(4, 'Fiesta de Halloween', 'Descuentos y eventos temáticos', 'laura.martinez@example.com', '2023-10-31 00:00:00', '2023-10-31 00:00:00', 6),
(5, 'Día de Acción de Gracias', 'Ofertas especiales para agradecer', 'elena.torres@example.com', '2023-11-23 00:00:00', '2023-11-23 00:00:00', 36),
(6, 'Navidad', 'Celebración y promociones navideñas', 'ana.rodriguez@example.com', '2023-12-01 00:00:00', '2023-12-25 00:00:00', 2),
(7, 'Rebajas de Invierno', 'Descuentos para la temporada de invierno', 'sofia.torres@example.com', '2024-01-15 00:00:00', '2024-02-15 00:00:00', 24),
(8, 'Día del Amor y la Amistad', 'Ofertas románticas para parejas', 'laura.morales@example.com', '2024-02-14 00:00:00', '2024-02-14 00:00:00', 18),
(9, 'Semana Santa', 'Descuentos y promociones durante la Semana Santa', 'mario.suarez@example.com', '2024-04-01 00:00:00', '2024-04-07 00:00:00', 39),
(10, 'Día de la Madre', 'Regalos especiales para mamá', 'carolina.rojas@example.com', '2024-05-12 00:00:00', '2024-05-12 00:00:00', 14);

--
-- Triggers `campañas`
--
DELIMITER $$
CREATE TRIGGER `disparador_campaña` AFTER UPDATE ON `campañas` FOR EACH ROW INSERT INTO cambio_campaña (accion) VALUES ('cambios campaña')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(10) NOT NULL,
  `CATEGORIA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `CATEGORIA`) VALUES
(1, 'Hombres'),
(2, 'Mujeres'),
(3, 'Niños');

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `ID_CONTROL` int(11) NOT NULL,
  `USUARIOC` varchar(55) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `FECHA_HORA` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`ID_CONTROL`, `USUARIOC`, `DESCRIPCION`, `FECHA_HORA`) VALUES
(1, 'root@localhost', 'Registro de un nuevo usuario', '2023-07-06 17:14:32'),
(2, 'root@localhost', 'Registro de un nuevo usuario', '2023-07-07 04:55:22'),
(3, 'root@localhost', 'Registro de un nuevo usuario', '2023-07-07 05:41:53'),
(4, 'root@localhost', 'Registro de un nuevo usuario', '2023-07-07 06:21:52'),
(5, 'root@localhost', 'Registro de un nuevo usuario', '2023-07-07 06:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `descuentos`
--

CREATE TABLE `descuentos` (
  `ID_DESCUENTOS` int(10) NOT NULL,
  `PORCENTAJE_DESCUENTO` int(3) DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `descuentos`
--

INSERT INTO `descuentos` (`ID_DESCUENTOS`, `PORCENTAJE_DESCUENTO`, `ID_INVENTARIO`) VALUES
(1, 20, 1),
(2, 10, 2),
(3, 15, 3),
(4, 30, 4),
(5, 25, 5),
(6, 35, 6),
(7, 5, 7),
(8, 40, 8),
(9, 12, 9),
(10, 18, 10),
(11, 22, 11),
(12, 45, 12),
(13, 8, 13),
(14, 50, 14),
(15, 32, 15),
(16, 7, 16),
(17, 28, 17),
(18, 13, 18),
(19, 38, 19),
(20, 17, 20);

-- --------------------------------------------------------

--
-- Table structure for table `descuentos_campañas`
--

CREATE TABLE `descuentos_campañas` (
  `ID_DESCUENTOS` int(10) NOT NULL,
  `ID_CAMPAÑA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `descuentos_campañas`
--

INSERT INTO `descuentos_campañas` (`ID_DESCUENTOS`, `ID_CAMPAÑA`) VALUES
(1, 7),
(2, 3),
(3, 5),
(4, 9),
(5, 2),
(6, 6),
(7, 8),
(8, 1),
(9, 4),
(10, 10),
(11, 2),
(12, 6),
(13, 3),
(14, 9),
(15, 5),
(16, 1),
(17, 8),
(18, 10),
(19, 4),
(20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `disparador`
--

CREATE TABLE `disparador` (
  `id` int(255) NOT NULL,
  `accion` varchar(255) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disparador`
--

INSERT INTO `disparador` (`id`, `accion`, `fecha_hora`) VALUES
(1, 'actualizacion de productos', '2023-07-06 17:41:37'),
(2, 'actualizacion de productos', '2023-07-06 17:44:28'),
(3, 'actualizacion de productos', '2023-07-06 22:26:08'),
(4, 'actualizacion de productos', '2023-07-06 23:07:41'),
(5, 'actualizacion de productos', '2023-07-07 00:40:09'),
(6, 'actualizacion de productos', '2023-07-07 00:40:27'),
(7, 'actualizacion de productos', '2023-07-07 00:55:58'),
(8, 'actualizacion de productos', '2023-07-07 00:57:31'),
(9, 'actualizacion de productos', '2023-07-07 01:23:02'),
(10, 'actualizacion de productos', '2023-07-07 01:48:29'),
(11, 'actualizacion de productos', '2023-07-07 01:58:21'),
(12, 'actualizacion de productos', '2023-07-07 01:59:07'),
(13, 'actualizacion de productos', '2023-07-07 01:59:12'),
(14, 'actualizacion de productos', '2023-07-07 02:04:03'),
(15, 'actualizacion de productos', '2023-07-07 02:04:32'),
(16, 'actualizacion de productos', '2023-07-07 02:31:51'),
(17, 'actualizacion de productos', '2023-07-07 02:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `entrada_producto`
--

CREATE TABLE `entrada_producto` (
  `ID_ENTRADA_PRODUCTO` int(10) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(45) DEFAULT NULL,
  `FECHA_ENTRADA` datetime DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entrada_producto`
--

INSERT INTO `entrada_producto` (`ID_ENTRADA_PRODUCTO`, `NOMBRE_PRODUCTO`, `FECHA_ENTRADA`, `ID_INVENTARIO`) VALUES
(1, 'Disfraz de Pirata', '2023-06-12 00:00:00', 4),
(2, 'Disfraz de León', '2023-06-02 00:00:00', 11);

-- --------------------------------------------------------

--
-- Table structure for table `envios`
--

CREATE TABLE `envios` (
  `ID_ENVIO` int(10) NOT NULL,
  `NUMERO_RADICADO_ENVIO` varchar(45) DEFAULT NULL,
  `ID_TRANSPORTADORA` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `envios`
--

INSERT INTO `envios` (`ID_ENVIO`, `NUMERO_RADICADO_ENVIO`, `ID_TRANSPORTADORA`) VALUES
(1, 'RAD-123456', 1),
(2, 'RAD-654321', 2),
(3, 'RAD-987654', 3),
(4, 'RAD-456789', 1),
(5, 'RAD-987654', 2),
(6, 'RAD-321654', 3),
(7, 'RAD-654789', 1),
(8, 'RAD-789654', 2),
(9, 'RAD-456123', 3),
(10, 'RAD-321789', 1),
(11, 'RAD-654123', 2),
(12, 'RAD-789321', 3),
(13, 'RAD-123789', 1),
(14, 'RAD-456321', 2),
(15, 'RAD-789123', 3),
(16, 'RAD-123456', 1),
(17, 'RAD-654321', 2),
(18, 'RAD-987654', 3),
(19, 'RAD-456789', 1),
(20, 'RAD-987654', 2);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `ID_ESTADO` int(10) NOT NULL,
  `DESCRIPCION_ESTADO` varchar(45) DEFAULT NULL,
  `FECHA_ENVIO` datetime NOT NULL,
  `FECHA_DEVOLUCION` datetime DEFAULT NULL,
  `ID_ENVIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`ID_ESTADO`, `DESCRIPCION_ESTADO`, `FECHA_ENVIO`, `FECHA_DEVOLUCION`, `ID_ENVIO`) VALUES
(1, 'En proceso', '2023-06-01 00:00:00', NULL, 1),
(2, 'En tránsito', '2023-06-05 00:00:00', NULL, 2),
(3, 'Entregado', '2023-06-08 00:00:00', NULL, 3),
(4, 'Devuelto', '2023-06-12 00:00:00', '2023-06-15 00:00:00', 4),
(5, 'En proceso', '2023-06-03 00:00:00', NULL, 5),
(6, 'Entregado', '2023-06-07 00:00:00', NULL, 6),
(7, 'En tránsito', '2023-06-09 00:00:00', NULL, 7),
(8, 'En proceso', '2023-06-04 00:00:00', NULL, 8),
(9, 'En tránsito', '2023-06-06 00:00:00', NULL, 9),
(10, 'Entregado', '2023-06-10 00:00:00', NULL, 10),
(11, 'Devuelto', '2023-06-02 00:00:00', '2023-06-14 00:00:00', 11),
(12, 'En proceso', '2023-06-07 00:00:00', NULL, 12),
(13, 'Entregado', '2023-06-09 00:00:00', NULL, 13),
(14, 'En tránsito', '2023-06-11 00:00:00', NULL, 14),
(15, 'En proceso', '2023-06-06 00:00:00', NULL, 15),
(16, 'En tránsito', '2023-06-08 00:00:00', NULL, 16),
(17, 'Entregado', '2023-06-11 00:00:00', NULL, 17),
(18, 'En proceso', '2023-06-04 00:00:00', NULL, 18),
(19, 'En tránsito', '2023-06-07 00:00:00', NULL, 19),
(20, 'Entregado', '2023-06-10 00:00:00', NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `ID_INVENTARIO` int(10) NOT NULL,
  `CANTIDAD` int(5) DEFAULT NULL,
  `PRECIO_UNITARIO` int(7) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`ID_INVENTARIO`, `CANTIDAD`, `PRECIO_UNITARIO`, `ID_USUARIO`) VALUES
(1, 2, 120000, 47),
(2, 1, 150000, 49),
(3, 2, 180000, 48),
(4, 1, 100000, 46),
(5, 2, 200000, 50),
(6, 1, 170000, 48),
(7, 2, 90000, 47),
(8, 1, 130000, 46),
(9, 2, 160000, 49),
(10, 1, 80000, 50),
(11, 2, 110000, 49),
(12, 1, 140000, 46),
(13, 2, 170000, 47),
(14, 1, 90000, 50),
(15, 2, 120000, 48),
(16, 1, 150000, 46),
(17, 2, 180000, 49),
(18, 1, 100000, 47),
(19, 2, 200000, 50),
(20, 1, 170000, 48),
(21, 2, 90000, 46),
(22, 1, 130000, 50),
(23, 2, 160000, 47),
(24, 1, 80000, 49),
(25, 2, 110000, 48),
(26, 1, 140000, 46),
(27, 2, 170000, 50),
(28, 1, 90000, 49),
(29, 2, 120000, 48),
(30, 1, 150000, 47),
(31, 43, 343434, NULL),
(32, 4, 22424, NULL),
(33, 55, 82424, NULL),
(34, 4, 242444, NULL),
(35, 5, 62666, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_06_215550_add_status_to_producto', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `ID_ORDEN` int(10) NOT NULL,
  `CANTIDAD` int(5) DEFAULT NULL,
  `METODO_PAGO` varchar(45) DEFAULT NULL,
  `PRECIO` int(7) DEFAULT NULL,
  `PRECIO_TOTAL` int(7) DEFAULT NULL,
  `ID_ENVIO` int(10) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL,
  `ID_TALLA` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orden`
--

INSERT INTO `orden` (`ID_ORDEN`, `CANTIDAD`, `METODO_PAGO`, `PRECIO`, `PRECIO_TOTAL`, `ID_ENVIO`, `ID_USUARIO`, `ID_INVENTARIO`, `ID_TALLA`) VALUES
(1, 2, 'Efectivo', 120000, 240000, 1, 34, 1, 3),
(2, 1, 'Tarjeta', 150000, 150000, 2, 20, 2, 2),
(3, 2, 'Efectivo', 180000, 360000, 3, 5, 3, 1),
(4, 1, 'Tarjeta', 100000, 100000, 4, 18, 4, 4),
(5, 2, 'Efectivo', 200000, 400000, 5, 38, 5, 5),
(6, 1, 'Tarjeta', 170000, 170000, 6, 25, 6, 2),
(7, 2, 'Efectivo', 90000, 180000, 7, 42, 7, 1),
(8, 1, 'Tarjeta', 130000, 130000, 8, 29, 8, 3),
(9, 2, 'Efectivo', 160000, 320000, 9, 7, 9, 2),
(10, 1, 'Tarjeta', 80000, 80000, 10, 14, 10, 3),
(11, 2, 'Efectivo', 110000, 220000, 11, 21, 11, 1),
(12, 1, 'Tarjeta', 140000, 140000, 12, 37, 12, 4),
(13, 2, 'Efectivo', 170000, 340000, 13, 9, 13, 3),
(14, 1, 'Tarjeta', 90000, 90000, 14, 32, 14, 5),
(15, 2, 'Efectivo', 120000, 240000, 15, 43, 15, 1),
(16, 1, 'Tarjeta', 150000, 150000, 16, 26, 16, 2),
(17, 2, 'Efectivo', 180000, 360000, 17, 41, 17, 3),
(18, 1, 'Tarjeta', 100000, 100000, 18, 10, 18, 4),
(19, 2, 'Efectivo', 200000, 400000, 19, 16, 19, 5),
(20, 1, 'Tarjeta', 170000, 170000, 20, 8, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orden_producto`
--

CREATE TABLE `orden_producto` (
  `ID_ORDEN` int(10) NOT NULL,
  `ID_PRODUCTO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orden_producto`
--

INSERT INTO `orden_producto` (`ID_ORDEN`, `ID_PRODUCTO`) VALUES
(1, 7),
(2, 15),
(3, 2),
(4, 12),
(5, 5),
(6, 10),
(7, 3),
(8, 9),
(9, 16),
(10, 1),
(11, 6),
(12, 18),
(13, 4),
(14, 11),
(15, 8),
(16, 14),
(17, 19),
(18, 13),
(19, 20),
(20, 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `ID_PERMISO` int(10) NOT NULL,
  `PERMISO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permisos`
--

INSERT INTO `permisos` (`ID_PERMISO`, `PERMISO`) VALUES
(1, 'VER'),
(2, 'CREAR'),
(3, 'ACTUALIZAR'),
(4, 'ELIMINAR'),
(5, 'TODO');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(10) NOT NULL,
  `NOMBRE_DISFRAZ` varchar(45) DEFAULT NULL,
  `DESCRIPCION` varchar(60) DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL,
  `ID_CATEGORIA` int(10) DEFAULT NULL,
  `ID_TALLA` int(10) DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE_DISFRAZ`, `DESCRIPCION`, `ID_INVENTARIO`, `ID_CATEGORIA`, `ID_TALLA`, `STATUS`) VALUES
(1, 'Disfraz de Superman', 'Disfraz de Superman con capa y logotipo', 1, 1, 1, 1),
(2, 'Disfraz de Hada Madrina', 'Conjunto de hada madrina con alas y varita', 2, 2, 2, 1),
(3, 'Disfraz de Princesa Elsa', 'Elegante vestido de Princesa Elsa con brillo', 3, 3, 3, 1),
(4, 'Disfraz de Pirata', 'Disfraz de pirata con parche y espada', 4, 1, 1, 1),
(5, 'Disfraz de Dragón', 'Traje de dragón con alas y cola', 5, 2, 2, 1),
(6, 'Disfraz de Spider-Man', 'Disfraz de Spider-Man con máscara y telaraña', 6, 3, 3, 1),
(7, 'Disfraz de Batman', 'Disfraz de Batman con capa y cinturón', 7, 1, 1, 1),
(8, 'Disfraz de Princesa Medieval', 'Vestido de princesa medieval con corona', 8, 2, 2, 1),
(9, 'Disfraz de Chef', 'Disfraz de chef con gorro y utensilios', 9, 3, 3, 1),
(10, 'Disfraz de Futbolista', 'Disfraz de futbolista con balón y camiseta', 10, 1, 1, 1),
(11, 'Disfraz de León', 'Disfraz de león con melena y garras', 11, 2, 2, 1),
(12, 'Disfraz de Bella', 'Elegante vestido de Bella con accesorios', 12, 3, 3, 1),
(13, 'Disfraz de Pirata', 'Disfraz de pirata con sombrero y catalejo', 13, 1, 1, 1),
(14, 'Disfraz de Unicornio', 'Disfraz de unicornio con cuerno y tutú', 14, 2, 1, 1),
(15, 'Disfraz de Cenicienta', 'Vestido de Cenicienta con zapatillas de cristal', 15, 3, 3, 1),
(16, 'Disfraz de Iron Man', 'Disfraz de Iron Man con casco y armadura', 16, 1, 1, 1),
(17, 'Disfraz de Caballero Medieval', 'Vestimenta de caballero medieval con escudo', 17, 2, 2, 1),
(18, 'Disfraz de Astronauta', 'Disfraz de astronauta con casco y traje espacial', 18, 3, 3, 1),
(19, 'Disfraz de Tenista', 'Disfraz de tenista con raqueta y gorra', 19, 1, 1, 1),
(20, 'Disfraz de Jirafa', 'Disfraz de jirafa con cuello largo y manchas', 20, 2, 2, 1),
(33, 'disfraz huehue', 'huehue a tu adauasd', 33, 1, 1, 0),
(34, 'dasdasd', 'dadad', 34, 3, 3, 0),
(35, 'dadasdasd', 'dsadasdad', 35, 3, 2, 0);

--
-- Triggers `producto`
--
DELIMITER $$
CREATE TRIGGER `disparador_producto` AFTER UPDATE ON `producto` FOR EACH ROW insert into disparador (accion) VALUES ('actualizacion de productos')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `producto_accesorios`
--

CREATE TABLE `producto_accesorios` (
  `ID_PRODUCTO` int(10) NOT NULL,
  `ID_ACCESORIO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producto_accesorios`
--

INSERT INTO `producto_accesorios` (`ID_PRODUCTO`, `ID_ACCESORIO`) VALUES
(1, 10),
(2, 3),
(3, 7),
(4, 13),
(5, 5),
(6, 11),
(7, 1),
(8, 15),
(9, 8),
(10, 6),
(11, 14),
(12, 4),
(13, 18),
(14, 16),
(15, 2),
(16, 9),
(17, 20),
(18, 12),
(19, 17),
(20, 19);

-- --------------------------------------------------------

--
-- Table structure for table `recibo_venta`
--

CREATE TABLE `recibo_venta` (
  `ID_RECIBO_VENTA` int(10) NOT NULL,
  `CANTIDAD` int(3) DEFAULT NULL,
  `METODO_PAGO` varchar(45) DEFAULT NULL,
  `PRECIO_UNIDAD` int(7) DEFAULT NULL,
  `PRECIO_TOTAL` int(7) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `ID_ORDEN` int(10) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recibo_venta`
--

INSERT INTO `recibo_venta` (`ID_RECIBO_VENTA`, `CANTIDAD`, `METODO_PAGO`, `PRECIO_UNIDAD`, `PRECIO_TOTAL`, `FECHA`, `ID_ORDEN`, `ID_USUARIO`) VALUES
(1, 2, 'Efectivo', 120000, 240000, '2023-06-01 00:00:00', 1, 34),
(2, 1, 'Tarjeta', 150000, 150000, '2023-06-02 00:00:00', 2, 20),
(3, 2, 'Efectivo', 180000, 360000, '2023-06-03 00:00:00', 3, 5),
(4, 1, 'Tarjeta', 100000, 100000, '2023-06-04 00:00:00', 4, 18),
(5, 2, 'Efectivo', 200000, 400000, '2023-06-05 00:00:00', 5, 38),
(6, 1, 'Tarjeta', 170000, 170000, '2023-06-06 00:00:00', 6, 25),
(7, 2, 'Efectivo', 90000, 180000, '2023-06-07 00:00:00', 7, 42),
(8, 1, 'Tarjeta', 130000, 130000, '2023-06-08 00:00:00', 8, 29),
(9, 2, 'Efectivo', 160000, 320000, '2023-06-09 00:00:00', 9, 7),
(10, 1, 'Tarjeta', 80000, 80000, '2023-06-10 00:00:00', 10, 14),
(11, 2, 'Efectivo', 110000, 220000, '2023-06-11 00:00:00', 11, 21),
(12, 1, 'Tarjeta', 140000, 140000, '2023-06-12 00:00:00', 12, 37),
(13, 2, 'Efectivo', 170000, 340000, '2023-06-13 00:00:00', 13, 9),
(14, 1, 'Tarjeta', 90000, 90000, '2023-06-14 00:00:00', 14, 32),
(15, 2, 'Efectivo', 120000, 240000, '2023-06-15 00:00:00', 15, 43),
(16, 1, 'Tarjeta', 150000, 150000, '2023-06-16 00:00:00', 16, 26),
(17, 2, 'Efectivo', 180000, 360000, '2023-06-17 00:00:00', 17, 41),
(18, 1, 'Tarjeta', 100000, 100000, '2023-06-18 00:00:00', 18, 10),
(19, 2, 'Efectivo', 200000, 400000, '2023-06-19 00:00:00', 19, 16),
(20, 1, 'Tarjeta', 170000, 170000, '2023-06-20 00:00:00', 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `recibo_venta_producto`
--

CREATE TABLE `recibo_venta_producto` (
  `ID_PRODUCTO` int(10) NOT NULL,
  `ID_RECIBO_VENTA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recibo_venta_producto`
--

INSERT INTO `recibo_venta_producto` (`ID_PRODUCTO`, `ID_RECIBO_VENTA`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `roles_sistema`
--

CREATE TABLE `roles_sistema` (
  `ID_ROL` int(10) NOT NULL,
  `DESCRIPCION_ROLES` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles_sistema`
--

INSERT INTO `roles_sistema` (`ID_ROL`, `DESCRIPCION_ROLES`) VALUES
(1, 'CLIENTE'),
(2, 'VENDEDOR'),
(3, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Table structure for table `roles_sistema_permisos`
--

CREATE TABLE `roles_sistema_permisos` (
  `ID_ROL` int(10) NOT NULL,
  `ID_PERMISO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles_sistema_permisos`
--

INSERT INTO `roles_sistema_permisos` (`ID_ROL`, `ID_PERMISO`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `salida_producto`
--

CREATE TABLE `salida_producto` (
  `ID_SALIDA_PRODUCTO` int(10) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(45) DEFAULT NULL,
  `FECHA_SALIDA` datetime DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salida_producto`
--

INSERT INTO `salida_producto` (`ID_SALIDA_PRODUCTO`, `NOMBRE_PRODUCTO`, `FECHA_SALIDA`, `ID_INVENTARIO`) VALUES
(1, 'Disfraz de Superman', '2023-06-01 00:00:00', 1),
(2, 'Disfraz de Hada Madrina', '2023-06-05 00:00:00', 2),
(3, 'Disfraz de Princesa Elsa', '2023-06-08 00:00:00', 3),
(4, 'Disfraz de Spider-Man', '2023-06-07 00:00:00', 6),
(5, 'Disfraz de Futbolista', '2023-06-10 00:00:00', 10),
(6, 'Disfraz de Pirata', '2023-06-13 00:00:00', 13),
(7, 'Disfraz de Caballero Medieval', '2023-06-11 00:00:00', 17),
(8, 'Disfraz de Astronauta', '2023-06-04 00:00:00', 18),
(9, 'Disfraz de Tenista', '2023-06-07 00:00:00', 19),
(10, 'Disfraz de Jirafa', '2023-06-10 00:00:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `talla`
--

CREATE TABLE `talla` (
  `ID_TALLA` int(10) NOT NULL,
  `NUMERO_TALLA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `talla`
--

INSERT INTO `talla` (`ID_TALLA`, `NUMERO_TALLA`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `transportadora`
--

CREATE TABLE `transportadora` (
  `ID_TRANSPORTADORA` int(10) NOT NULL,
  `NOMBRE_TRANSPORTADORA` varchar(45) DEFAULT NULL,
  `CONTACTO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportadora`
--

INSERT INTO `transportadora` (`ID_TRANSPORTADORA`, `NOMBRE_TRANSPORTADORA`, `CONTACTO`) VALUES
(1, 'Coordinadora', '3103157444'),
(2, 'Servientrega', '6017700200'),
(3, 'Interrapidisimo', '3232554455');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(10) UNSIGNED NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `DIRECCION_BOGOTA` varchar(250) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `TELEFONO_1` varchar(20) NOT NULL,
  `TELEFONO_2` varchar(20) DEFAULT NULL,
  `ID_ROL` int(10) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `NOMBRE`, `DIRECCION_BOGOTA`, `email`, `TELEFONO_1`, `TELEFONO_2`, `ID_ROL`, `password`, `FECHA_NACIMIENTO`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brian Parada', 'Calle 25s #70b-29', 'brian@gmail.com', '3144435848', '3162352773', 1, 'empanadas', '2002-04-19', NULL, NULL, NULL, NULL),
(2, 'Ana Rodriguez', 'Carrera 56 #12-34, Chapinero', 'ana.rodriguez@example.com', '321312521', '0', 1, 'abc123', '1960-03-10', NULL, NULL, NULL, NULL),
(5, 'Pedro Ramirez', 'Calle 54 #32-10, Santa Bárbara', 'pedro.ramirez@example.com', '321309536', '310987654', 1, 'password123', '1961-06-15', NULL, NULL, NULL, NULL),
(6, 'Laura Martinez', 'Carrera 23 #67-89, La Macarena', 'laura.martinez@example.com', '311246484', '0', 1, 'qwerty', '1962-11-25', NULL, NULL, NULL, NULL),
(7, 'Carlos Torres', 'Calle 80 #43-21, Chapinero', 'carlos.torres@example.com', '317381432', '0', 1, '123456', '1963-07-03', NULL, NULL, NULL, NULL),
(8, 'Andrea Gomez', 'Carrera 35 #56-78, La Soledad', 'andrea.gomez@example.com', '320382374', '0', 1, 'secret', '1964-02-18', NULL, NULL, NULL, NULL),
(9, 'Oscar Rodriguez', 'Calle 46 #87-65, Quinta Camacho', 'oscar.rodriguez@example.com', '312462838', '315876543', 1, 'pass1234', '1965-09-30', NULL, NULL, NULL, NULL),
(10, 'Sofia Lopez', 'Calle 14 #30-12, La Candelaria', 'sofia.lopez@example.com', '311265783', '0', 1, 'hello123', '1966-05-07', NULL, NULL, NULL, NULL),
(14, 'Carolina Rojas', 'Carrera 10 #76-54, Chapinero', 'carolina.rojas@example.com', '317282937', '323456789', 1, 'mypassword', '1967-12-21', NULL, NULL, NULL, NULL),
(15, 'Mario Sanchez', 'Calle 32 #65-98, Teusaquillo', 'mario.sanchez@example.com', '313582763', '0', 1, '987654321', '1968-08-02', NULL, NULL, NULL, NULL),
(16, 'Isabel Castro', 'Carrera 12 #54-87, Chapinero', 'isabel.castro@example.com', '314827349', '0', 1, 'testpass', '1969-01-13', NULL, NULL, NULL, NULL),
(18, 'Laura Morales', 'Carrera 45 #67-89, Usaquén', 'laura.morales@example.com', '322918473', '314567890', 1, 'abcd1234', '1970-07-26', NULL, NULL, NULL, NULL),
(20, 'Camila Suarez', 'Carrera 23 #32-10, Chapinero', 'camila.suarez@example.com', '313276491', '0', 1, 'password1', '1971-02-09', NULL, NULL, NULL, NULL),
(21, 'Daniel Castro', 'Calle 67 #43-21, Teusaquillo', 'daniel.castro@example.com', '312389475', '0', 1, 'admin123', '1972-09-22', NULL, NULL, NULL, NULL),
(22, 'Laura Ramirez', 'Carrera 89 #12-34, La Candelaria', 'laura.ramirez@example.com', '314592837', '0', 1, 'welcome123', '1973-04-06', NULL, NULL, NULL, NULL),
(24, 'Sofia Torres', 'Carrera 76 #87-65, Chapinero', 'sofia.torres@example.com', '315764829', '0', 1, '654321', '1974-11-18', NULL, NULL, NULL, NULL),
(25, 'Carlos Perez', 'Calle 43 #21-43, Teusaquillo', 'carlos.perez@example.com', '319283746', '318765432', 1, 'football', '1975-07-01', NULL, NULL, NULL, NULL),
(26, 'Laura Rodriguez', 'Carrera 56 #34-98, La Macarena', 'laura.rodriguez@example.com', '314859372', '0', 1, 'letmein123', '1976-12-14', NULL, NULL, NULL, NULL),
(29, 'Luis Ramirez', 'Calle 67 #43-21, Chapinero', 'luis.ramirez@example.com', '313592846', '0', 1, '1234567890', '1977-05-28', NULL, NULL, NULL, NULL),
(32, 'Laura Rojas', 'Carrera 35 #54-87, Chapinero', 'laura.rojas@example.com', '312876451', '0', 1, 'pass123', '1978-01-10', NULL, NULL, NULL, NULL),
(34, 'Sofia Rodriguez', 'Calle 14 #43-21, La Candelaria', 'sofia.rodriguez@example.com', '314769281', '300987654', 1, '$2y$10$e2ThiHF4moypz9XZ1mgh4eNByTb0Qnf3JvBu3Q.qwLrZfhH2nIZti', '1997-05-10', NULL, NULL, '2023-07-04 12:26:19', '2023-07-04 12:26:19'),
(36, 'Elena Torres', 'Calle 45 #21-43, Teusaquillo', 'elena.torres@example.com', '319274651', '0', 1, 'sunshine', '1979-08-24', NULL, NULL, NULL, NULL),
(37, 'Andres Morales', 'Carrera 67 #56-78, La Macarena', 'andres.morales@example.com', '313498726', '322345678', 1, '987654', '1980-03-07', NULL, NULL, NULL, NULL),
(38, 'Carolina Soto', 'Carrera 10 #90-21, Quinta Camacho', 'carolina.soto@example.com', '315892476', '324567890', 1, 'qwerty123', '1981-10-20', NULL, NULL, NULL, NULL),
(39, 'Mario Suarez', 'Calle 32 #76-54, Chapinero', 'mario.suarez@example.com', '318476291', '325678901', 1, '123abc', '1982-05-03', NULL, NULL, NULL, NULL),
(41, 'Alejandro Ruiz', 'Calle 76 #32-10, Teusaquillo', 'alejandro.ruiz@example.com', '319874561', '327890123', 1, 'test123', '1983-12-16', NULL, NULL, NULL, NULL),
(42, 'Laura Morales', 'Carrera 45 #67-89, Chapinero', 'laura.morales@example.com', '322918763', '328901234', 1, 'password1234', '1984-06-29', NULL, NULL, NULL, NULL),
(43, 'Gabriel Soto', 'Calle 98 #21-43, La Macarena', 'gabriel.soto@example.com', '316547389', '329012345', 1, 'hello1234', '1986-01-12', NULL, NULL, NULL, NULL),
(46, 'Laura Ramirez', 'Carrera 89 #76-54, Chapinero', 'laura.ramirez@example.com', '314592837', '0', 2, 'adminadmin', '1987-08-25', NULL, NULL, NULL, NULL),
(47, 'Sergio Morales', 'Calle 32 #43-21, Quinta Camacho', 'sergio.morales@example.com', '318273495', '0', 2, 'letmein', '1989-03-07', NULL, NULL, NULL, NULL),
(48, 'Sofia Torres', 'Carrera 76 #21-43, La Candelaria', 'sofia.torres@example.com', '315764829', '0', 2, 'abcd123', '1990-10-20', NULL, NULL, NULL, NULL),
(49, 'Carlos Perez', 'Calle 43 #32-10, Teusaquillo', 'carlos.perez@example.com', '319283746', '0', 2, 'welcome', '1991-05-01', NULL, NULL, NULL, NULL),
(50, 'Olga D Aleman', 'Carrera 56 #67-89, Santa Bárbara', 'olga.aleman@example.com', '314859372', '0', 3, '1234567', '1992-12-14', NULL, NULL, NULL, NULL),
(51, 'Diego Jose Navarro Ruiz', 'CL 67 A bis sur #9-25 TO 5 AP 602 Quintas del portal IV', 'diegojose150@gmail.com', '+573003391905', NULL, 1, '$2y$10$Cnb1cYRE7N7OUDn.jqLFuuUWMOw4RpAs4xBWVuiYkQU2lZA5xR5/G', '1999-10-13', NULL, NULL, '2023-07-01 13:23:10', '2023-07-01 13:23:10'),
(59, 'Pepe Perez', 'dasdasdasd', 'pepeperez@pepe.com', '3131313313', NULL, 1, '$2y$10$BPHX4K1DmszEq4s9qLRXB.Xs5fBH8EmzB9ZBfIbK4iqqntSWYPnAe', '0013-03-03', NULL, NULL, '2023-07-07 14:55:22', '2023-07-07 14:55:22'),
(61, 'diego nava', 'Calle 65 # 59-24 Casa 99', 'djnr149@gmail.com', '3003391905', NULL, 1, '$2y$10$r/hcnn93aXp74ElAQyB.4OSvFpdvzpat6Uy/f.8iHOVkhp8uehGkS', '1999-10-13', NULL, NULL, '2023-07-07 16:21:52', '2023-07-07 16:21:52');

--
-- Triggers `usuarios`
--
DELIMITER $$
CREATE TRIGGER `Insert_Registro_usuario` AFTER INSERT ON `usuarios` FOR EACH ROW INSERT INTO control(USUARIOC, DESCRIPCION, FECHA_HORA) VALUES(CURRENT_USER, "Registro de un nuevo usuario", NOW())
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`ID_ACCESORIO`);

--
-- Indexes for table `cambio_campaña`
--
ALTER TABLE `cambio_campaña`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campañas`
--
ALTER TABLE `campañas`
  ADD PRIMARY KEY (`ID_CAMPAÑA`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`ID_CONTROL`);

--
-- Indexes for table `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`ID_DESCUENTOS`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`);

--
-- Indexes for table `descuentos_campañas`
--
ALTER TABLE `descuentos_campañas`
  ADD PRIMARY KEY (`ID_DESCUENTOS`,`ID_CAMPAÑA`),
  ADD KEY `ID_CAMPAÑA` (`ID_CAMPAÑA`);

--
-- Indexes for table `disparador`
--
ALTER TABLE `disparador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrada_producto`
--
ALTER TABLE `entrada_producto`
  ADD PRIMARY KEY (`ID_ENTRADA_PRODUCTO`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`);

--
-- Indexes for table `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`ID_ENVIO`),
  ADD KEY `ID_TRANSPORTADORA` (`ID_TRANSPORTADORA`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD KEY `ID_ENVIO` (`ID_ENVIO`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ID_INVENTARIO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ID_ORDEN`),
  ADD KEY `ID_ENVIO` (`ID_ENVIO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`),
  ADD KEY `ID_TALLA` (`ID_TALLA`);

--
-- Indexes for table `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD PRIMARY KEY (`ID_ORDEN`,`ID_PRODUCTO`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`ID_PERMISO`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
  ADD KEY `ID_TALLA` (`ID_TALLA`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`) USING BTREE;

--
-- Indexes for table `producto_accesorios`
--
ALTER TABLE `producto_accesorios`
  ADD PRIMARY KEY (`ID_PRODUCTO`,`ID_ACCESORIO`),
  ADD KEY `ID_ACCESORIO` (`ID_ACCESORIO`);

--
-- Indexes for table `recibo_venta`
--
ALTER TABLE `recibo_venta`
  ADD PRIMARY KEY (`ID_RECIBO_VENTA`),
  ADD KEY `ID_ORDEN` (`ID_ORDEN`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indexes for table `recibo_venta_producto`
--
ALTER TABLE `recibo_venta_producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`,`ID_RECIBO_VENTA`),
  ADD KEY `ID_RECIBO_VENTA` (`ID_RECIBO_VENTA`);

--
-- Indexes for table `roles_sistema`
--
ALTER TABLE `roles_sistema`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indexes for table `roles_sistema_permisos`
--
ALTER TABLE `roles_sistema_permisos`
  ADD PRIMARY KEY (`ID_ROL`,`ID_PERMISO`),
  ADD KEY `ID_PERMISO` (`ID_PERMISO`);

--
-- Indexes for table `salida_producto`
--
ALTER TABLE `salida_producto`
  ADD PRIMARY KEY (`ID_SALIDA_PRODUCTO`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`);

--
-- Indexes for table `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`ID_TALLA`);

--
-- Indexes for table `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`ID_TRANSPORTADORA`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cambio_campaña`
--
ALTER TABLE `cambio_campaña`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `control`
--
ALTER TABLE `control`
  MODIFY `ID_CONTROL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `disparador`
--
ALTER TABLE `disparador`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `ID_INVENTARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_PRODUCTO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `descuentos_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`);

--
-- Constraints for table `descuentos_campañas`
--
ALTER TABLE `descuentos_campañas`
  ADD CONSTRAINT `descuentos_campañas_ibfk_1` FOREIGN KEY (`ID_DESCUENTOS`) REFERENCES `descuentos` (`ID_DESCUENTOS`),
  ADD CONSTRAINT `descuentos_campañas_ibfk_2` FOREIGN KEY (`ID_CAMPAÑA`) REFERENCES `campañas` (`ID_CAMPAÑA`);

--
-- Constraints for table `entrada_producto`
--
ALTER TABLE `entrada_producto`
  ADD CONSTRAINT `entrada_producto_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`);

--
-- Constraints for table `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`ID_TRANSPORTADORA`) REFERENCES `transportadora` (`ID_TRANSPORTADORA`);

--
-- Constraints for table `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`ID_ENVIO`) REFERENCES `envios` (`ID_ENVIO`);

--
-- Constraints for table `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`ID_ENVIO`) REFERENCES `envios` (`ID_ENVIO`),
  ADD CONSTRAINT `orden_ibfk_3` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`),
  ADD CONSTRAINT `orden_ibfk_4` FOREIGN KEY (`ID_TALLA`) REFERENCES `talla` (`ID_TALLA`);

--
-- Constraints for table `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD CONSTRAINT `orden_producto_ibfk_1` FOREIGN KEY (`ID_ORDEN`) REFERENCES `orden` (`ID_ORDEN`),
  ADD CONSTRAINT `orden_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`ID_TALLA`) REFERENCES `talla` (`ID_TALLA`);

--
-- Constraints for table `producto_accesorios`
--
ALTER TABLE `producto_accesorios`
  ADD CONSTRAINT `producto_accesorios_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `producto_accesorios_ibfk_2` FOREIGN KEY (`ID_ACCESORIO`) REFERENCES `accesorios` (`ID_ACCESORIO`);

--
-- Constraints for table `recibo_venta`
--
ALTER TABLE `recibo_venta`
  ADD CONSTRAINT `recibo_venta_ibfk_1` FOREIGN KEY (`ID_ORDEN`) REFERENCES `orden` (`ID_ORDEN`);

--
-- Constraints for table `recibo_venta_producto`
--
ALTER TABLE `recibo_venta_producto`
  ADD CONSTRAINT `recibo_venta_producto_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `recibo_venta_producto_ibfk_2` FOREIGN KEY (`ID_RECIBO_VENTA`) REFERENCES `recibo_venta` (`ID_RECIBO_VENTA`);

--
-- Constraints for table `roles_sistema_permisos`
--
ALTER TABLE `roles_sistema_permisos`
  ADD CONSTRAINT `roles_sistema_permisos_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `roles_sistema` (`ID_ROL`),
  ADD CONSTRAINT `roles_sistema_permisos_ibfk_2` FOREIGN KEY (`ID_PERMISO`) REFERENCES `permisos` (`ID_PERMISO`);

--
-- Constraints for table `salida_producto`
--
ALTER TABLE `salida_producto`
  ADD CONSTRAINT `salida_producto_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `roles_sistema` (`ID_ROL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
