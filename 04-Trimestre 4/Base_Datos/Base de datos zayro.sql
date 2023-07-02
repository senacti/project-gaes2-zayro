-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2023 a las 04:52:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zayro_system`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `ObtenerDatosUsuario` (`IDUsuario` INT) RETURNS VARCHAR(255) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE datosUsuario VARCHAR(255);
    
    SELECT CONCAT('Nombre: ', u.NOMBRE, ', ID Permiso: ', GROUP_CONCAT(p.ID_PERMISO), ', Permiso: ', GROUP_CONCAT(p.PERMISO))
    INTO datosUsuario
    FROM usuario u
    JOIN roles_sistema r ON u.ID_ROL = r.ID_ROL
    JOIN roles_sistema_permisos rp ON r.ID_ROL = rp.ID_ROL
    JOIN permisos p ON rp.ID_PERMISO = p.ID_PERMISO
    WHERE u.ID_USUARIO = IDUsuario;
    
    RETURN datosUsuario;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `ID_ACCESORIO` int(10) NOT NULL,
  `ACCESORIOS` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `accesorios`
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
-- Estructura de tabla para la tabla `campañas`
--

CREATE TABLE `campañas` (
  `ID_CAMPAÑA` int(10) NOT NULL,
  `NOMBRE_CAMPAÑA` varchar(45) DEFAULT NULL,
  `DESCRIPCION` varchar(60) DEFAULT NULL,
  `EMAIL_CLIENTES` varchar(45) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `campañas`
--

INSERT INTO `campañas` (`ID_CAMPAÑA`, `NOMBRE_CAMPAÑA`, `DESCRIPCION`, `EMAIL_CLIENTES`, `FECHA_INICIO`, `FECHA_FIN`, `ID_USUARIO`) VALUES
(1, 'Día del Niño', 'Celebración especial para los niños', 'mario.sanchez@example.com', '2023-07-20 00:00:00', '2023-07-20 00:00:00', 15),
(2, 'Día de la Independencia', 'Celebración con promociones especiales', 'laura.ramirez@example.com', '2023-07-04 00:00:00', '2023-07-04 00:00:00', 22),
(3, 'Regreso a Clases', 'Ofertas en artículos escolares', 'sofia.lopez@example.com', '2023-08-15 00:00:00', '2023-09-15 00:00:00', 10),
(4, 'Fiesta de Halloween', 'Descuentos y eventos temáticos', 'laura.martinez@example.com', '2023-10-31 00:00:00', '2023-10-31 00:00:00', 6),
(5, 'Día de Acción de Gracias', 'Ofertas especiales para agradecer', 'elena.torres@example.com', '2023-11-23 00:00:00', '2023-11-23 00:00:00', 36),
(6, 'Navidad', 'Celebración y promociones navideñas', 'ana.rodriguez@example.com', '2023-12-01 00:00:00', '2023-12-25 00:00:00', 2),
(7, 'Rebajas de Invierno', 'Descuentos para la temporada de invierno', 'sofia.torres@example.com', '2024-01-15 00:00:00', '2024-02-15 00:00:00', 24),
(8, 'Día del Amor y la Amistad', 'Ofertas románticas para parejas', 'laura.morales@example.com', '2024-02-14 00:00:00', '2024-02-14 00:00:00', 18),
(9, 'Semana Santa', 'Descuentos y promociones durante la Semana Santa', 'mario.suarez@example.com', '2024-04-01 00:00:00', '2024-04-07 00:00:00', 39),
(10, 'Día de la Madre', 'Regalos especiales para mamá', 'carolina.rojas@example.com', '2024-05-12 00:00:00', '2024-05-12 00:00:00', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(10) NOT NULL,
  `CATEGORIA` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `CATEGORIA`) VALUES
(1, 'Hombres'),
(2, 'Mujeres'),
(3, 'Niños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `ID_DESCUENTOS` int(10) NOT NULL,
  `PORCENTAJE_DESCUENTO` int(3) DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descuentos`
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
-- Estructura de tabla para la tabla `descuentos_campañas`
--

CREATE TABLE `descuentos_campañas` (
  `ID_DESCUENTOS` int(10) NOT NULL,
  `ID_CAMPAÑA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `descuentos_campañas`
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
-- Estructura de tabla para la tabla `entrada_producto`
--

CREATE TABLE `entrada_producto` (
  `ID_ENTRADA_PRODUCTO` int(10) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(45) DEFAULT NULL,
  `FECHA_ENTRADA` datetime DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrada_producto`
--

INSERT INTO `entrada_producto` (`ID_ENTRADA_PRODUCTO`, `NOMBRE_PRODUCTO`, `FECHA_ENTRADA`, `ID_INVENTARIO`) VALUES
(1, 'Disfraz de Pirata', '2023-06-12 00:00:00', 4),
(2, 'Disfraz de León', '2023-06-02 00:00:00', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `ID_ENVIO` int(10) NOT NULL,
  `NUMERO_RADICADO_ENVIO` varchar(45) DEFAULT NULL,
  `ID_TRANSPORTADORA` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `envios`
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
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_ESTADO` int(10) NOT NULL,
  `DESCRIPCION_ESTADO` varchar(45) DEFAULT NULL,
  `FECHA_ENVIO` datetime NOT NULL,
  `FECHA_DEVOLUCION` datetime DEFAULT NULL,
  `ID_ENVIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
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
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `ID_INVENTARIO` int(10) NOT NULL,
  `CANTIDAD` int(5) DEFAULT NULL,
  `PRECIO_UNITARIO` int(7) DEFAULT NULL,
  `ID_USUARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
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
(30, 1, 150000, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
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
-- Volcado de datos para la tabla `orden`
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
-- Estructura de tabla para la tabla `orden_producto`
--

CREATE TABLE `orden_producto` (
  `ID_ORDEN` int(10) NOT NULL,
  `ID_PRODUCTO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden_producto`
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
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `ID_PERMISO` int(10) NOT NULL,
  `PERMISO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`ID_PERMISO`, `PERMISO`) VALUES
(1, 'VER'),
(2, 'CREAR'),
(3, 'ACTUALIZAR'),
(4, 'ELIMINAR'),
(5, 'TODO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(10) NOT NULL,
  `NOMBRE_DISFRAZ` varchar(45) DEFAULT NULL,
  `DESCRIPCION` varchar(60) DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL,
  `ID_CATEGORIA` int(10) DEFAULT NULL,
  `ID_TALLA` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE_DISFRAZ`, `DESCRIPCION`, `ID_INVENTARIO`, `ID_CATEGORIA`, `ID_TALLA`) VALUES
(1, 'Disfraz de Superman', 'Disfraz de Superman con capa y logotipo', 1, 1, 1),
(2, 'Disfraz de Hada Madrina', 'Conjunto de hada madrina con alas y varita', 2, 2, 2),
(3, 'Disfraz de Princesa Elsa', 'Elegante vestido de Princesa Elsa con brillo', 3, 3, 3),
(4, 'Disfraz de Pirata', 'Disfraz de pirata con parche y espada', 4, 1, 1),
(5, 'Disfraz de Dragón', 'Traje de dragón con alas y cola', 5, 2, 2),
(6, 'Disfraz de Spider-Man', 'Disfraz de Spider-Man con máscara y telaraña', 6, 3, 3),
(7, 'Disfraz de Batman', 'Disfraz de Batman con capa y cinturón', 7, 1, 1),
(8, 'Disfraz de Princesa Medieval', 'Vestido de princesa medieval con corona', 8, 2, 2),
(9, 'Disfraz de Chef', 'Disfraz de chef con gorro y utensilios', 9, 3, 3),
(10, 'Disfraz de Futbolista', 'Disfraz de futbolista con balón y camiseta', 10, 1, 1),
(11, 'Disfraz de León', 'Disfraz de león con melena y garras', 11, 2, 2),
(12, 'Disfraz de Bella', 'Elegante vestido de Bella con accesorios', 12, 3, 3),
(13, 'Disfraz de Pirata', 'Disfraz de pirata con sombrero y catalejo', 13, 1, 1),
(14, 'Disfraz de Unicornio', 'Disfraz de unicornio con cuerno y tutú', 14, 2, 2),
(15, 'Disfraz de Cenicienta', 'Vestido de Cenicienta con zapatillas de cristal', 15, 3, 3),
(16, 'Disfraz de Iron Man', 'Disfraz de Iron Man con casco y armadura', 16, 1, 1),
(17, 'Disfraz de Caballero Medieval', 'Vestimenta de caballero medieval con escudo', 17, 2, 2),
(18, 'Disfraz de Astronauta', 'Disfraz de astronauta con casco y traje espacial', 18, 3, 3),
(19, 'Disfraz de Tenista', 'Disfraz de tenista con raqueta y gorra', 19, 1, 1),
(20, 'Disfraz de Jirafa', 'Disfraz de jirafa con cuello largo y manchas', 20, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_accesorios`
--

CREATE TABLE `producto_accesorios` (
  `ID_PRODUCTO` int(10) NOT NULL,
  `ID_ACCESORIO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_accesorios`
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
-- Estructura de tabla para la tabla `recibo_venta`
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
-- Volcado de datos para la tabla `recibo_venta`
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
-- Estructura de tabla para la tabla `recibo_venta_producto`
--

CREATE TABLE `recibo_venta_producto` (
  `ID_PRODUCTO` int(10) NOT NULL,
  `ID_RECIBO_VENTA` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recibo_venta_producto`
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
-- Estructura de tabla para la tabla `roles_sistema`
--

CREATE TABLE `roles_sistema` (
  `ID_ROL` int(10) NOT NULL,
  `DESCRIPCION_ROLES` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles_sistema`
--

INSERT INTO `roles_sistema` (`ID_ROL`, `DESCRIPCION_ROLES`) VALUES
(1, 'CLIENTE'),
(2, 'VENDEDOR'),
(3, 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_sistema_permisos`
--

CREATE TABLE `roles_sistema_permisos` (
  `ID_ROL` int(10) NOT NULL,
  `ID_PERMISO` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles_sistema_permisos`
--

INSERT INTO `roles_sistema_permisos` (`ID_ROL`, `ID_PERMISO`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_producto`
--

CREATE TABLE `salida_producto` (
  `ID_SALIDA_PRODUCTO` int(10) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(45) DEFAULT NULL,
  `FECHA_SALIDA` datetime DEFAULT NULL,
  `ID_INVENTARIO` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salida_producto`
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
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `ID_TALLA` int(10) NOT NULL,
  `NUMERO_TALLA` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`ID_TALLA`, `NUMERO_TALLA`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportadora`
--

CREATE TABLE `transportadora` (
  `ID_TRANSPORTADORA` int(10) NOT NULL,
  `NOMBRE_TRANSPORTADORA` varchar(45) DEFAULT NULL,
  `CONTACTO` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transportadora`
--

INSERT INTO `transportadora` (`ID_TRANSPORTADORA`, `NOMBRE_TRANSPORTADORA`, `CONTACTO`) VALUES
(1, 'Coordinadora', '3103157444'),
(2, 'Servientrega', '6017700200'),
(3, 'Interrapidisimo', '3232554455');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(10) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `DIRECCION_BOGOTA` varchar(45) DEFAULT NULL,
  `E_MAIL` varchar(45) DEFAULT NULL,
  `TELEFONO_1` int(10) NOT NULL,
  `TELEFONO_2` int(11) DEFAULT NULL,
  `ID_ROL` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE`, `DIRECCION_BOGOTA`, `E_MAIL`, `TELEFONO_1`, `TELEFONO_2`, `ID_ROL`) VALUES
(49, 'Carlos Perez', 'Calle 43 #32-10, Teusaquillo', 'carlos.perez@example.com', 319283746, 0, 2),
(50, 'Olga D Aleman', 'Carrera 56 #67-89, Santa Bárbara', 'olga.aleman@example.com', 314859372, 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`ID_ACCESORIO`);

--
-- Indices de la tabla `campañas`
--
ALTER TABLE `campañas`
  ADD PRIMARY KEY (`ID_CAMPAÑA`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`ID_DESCUENTOS`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`);

--
-- Indices de la tabla `descuentos_campañas`
--
ALTER TABLE `descuentos_campañas`
  ADD PRIMARY KEY (`ID_DESCUENTOS`,`ID_CAMPAÑA`),
  ADD KEY `ID_CAMPAÑA` (`ID_CAMPAÑA`);

--
-- Indices de la tabla `entrada_producto`
--
ALTER TABLE `entrada_producto`
  ADD PRIMARY KEY (`ID_ENTRADA_PRODUCTO`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`ID_ENVIO`),
  ADD KEY `ID_TRANSPORTADORA` (`ID_TRANSPORTADORA`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD KEY `ID_ENVIO` (`ID_ENVIO`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`ID_INVENTARIO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`ID_ORDEN`),
  ADD KEY `ID_ENVIO` (`ID_ENVIO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`),
  ADD KEY `ID_TALLA` (`ID_TALLA`);

--
-- Indices de la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD PRIMARY KEY (`ID_ORDEN`,`ID_PRODUCTO`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`ID_PERMISO`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`),
  ADD KEY `ID_CATEGORIA` (`ID_CATEGORIA`),
  ADD KEY `ID_TALLA` (`ID_TALLA`);

--
-- Indices de la tabla `producto_accesorios`
--
ALTER TABLE `producto_accesorios`
  ADD PRIMARY KEY (`ID_PRODUCTO`,`ID_ACCESORIO`),
  ADD KEY `ID_ACCESORIO` (`ID_ACCESORIO`);

--
-- Indices de la tabla `recibo_venta`
--
ALTER TABLE `recibo_venta`
  ADD PRIMARY KEY (`ID_RECIBO_VENTA`),
  ADD KEY `ID_ORDEN` (`ID_ORDEN`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `recibo_venta_producto`
--
ALTER TABLE `recibo_venta_producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`,`ID_RECIBO_VENTA`),
  ADD KEY `ID_RECIBO_VENTA` (`ID_RECIBO_VENTA`);

--
-- Indices de la tabla `roles_sistema`
--
ALTER TABLE `roles_sistema`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `roles_sistema_permisos`
--
ALTER TABLE `roles_sistema_permisos`
  ADD PRIMARY KEY (`ID_ROL`,`ID_PERMISO`),
  ADD KEY `ID_PERMISO` (`ID_PERMISO`);

--
-- Indices de la tabla `salida_producto`
--
ALTER TABLE `salida_producto`
  ADD PRIMARY KEY (`ID_SALIDA_PRODUCTO`),
  ADD KEY `ID_INVENTARIO` (`ID_INVENTARIO`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`ID_TALLA`);

--
-- Indices de la tabla `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`ID_TRANSPORTADORA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campañas`
--
ALTER TABLE `campañas`
  ADD CONSTRAINT `campañas_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `descuentos_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`);

--
-- Filtros para la tabla `descuentos_campañas`
--
ALTER TABLE `descuentos_campañas`
  ADD CONSTRAINT `descuentos_campañas_ibfk_1` FOREIGN KEY (`ID_DESCUENTOS`) REFERENCES `descuentos` (`ID_DESCUENTOS`),
  ADD CONSTRAINT `descuentos_campañas_ibfk_2` FOREIGN KEY (`ID_CAMPAÑA`) REFERENCES `campañas` (`ID_CAMPAÑA`);

--
-- Filtros para la tabla `entrada_producto`
--
ALTER TABLE `entrada_producto`
  ADD CONSTRAINT `entrada_producto_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`ID_TRANSPORTADORA`) REFERENCES `transportadora` (`ID_TRANSPORTADORA`);

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`ID_ENVIO`) REFERENCES `envios` (`ID_ENVIO`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`ID_ENVIO`) REFERENCES `envios` (`ID_ENVIO`),
  ADD CONSTRAINT `orden_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `orden_ibfk_3` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`),
  ADD CONSTRAINT `orden_ibfk_4` FOREIGN KEY (`ID_TALLA`) REFERENCES `talla` (`ID_TALLA`);

--
-- Filtros para la tabla `orden_producto`
--
ALTER TABLE `orden_producto`
  ADD CONSTRAINT `orden_producto_ibfk_1` FOREIGN KEY (`ID_ORDEN`) REFERENCES `orden` (`ID_ORDEN`),
  ADD CONSTRAINT `orden_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`ID_TALLA`) REFERENCES `talla` (`ID_TALLA`);

--
-- Filtros para la tabla `producto_accesorios`
--
ALTER TABLE `producto_accesorios`
  ADD CONSTRAINT `producto_accesorios_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `producto_accesorios_ibfk_2` FOREIGN KEY (`ID_ACCESORIO`) REFERENCES `accesorios` (`ID_ACCESORIO`);

--
-- Filtros para la tabla `recibo_venta`
--
ALTER TABLE `recibo_venta`
  ADD CONSTRAINT `recibo_venta_ibfk_1` FOREIGN KEY (`ID_ORDEN`) REFERENCES `orden` (`ID_ORDEN`),
  ADD CONSTRAINT `recibo_venta_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `recibo_venta_producto`
--
ALTER TABLE `recibo_venta_producto`
  ADD CONSTRAINT `recibo_venta_producto_ibfk_1` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`),
  ADD CONSTRAINT `recibo_venta_producto_ibfk_2` FOREIGN KEY (`ID_RECIBO_VENTA`) REFERENCES `recibo_venta` (`ID_RECIBO_VENTA`);

--
-- Filtros para la tabla `roles_sistema_permisos`
--
ALTER TABLE `roles_sistema_permisos`
  ADD CONSTRAINT `roles_sistema_permisos_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `roles_sistema` (`ID_ROL`),
  ADD CONSTRAINT `roles_sistema_permisos_ibfk_2` FOREIGN KEY (`ID_PERMISO`) REFERENCES `permisos` (`ID_PERMISO`);

--
-- Filtros para la tabla `salida_producto`
--
ALTER TABLE `salida_producto`
  ADD CONSTRAINT `salida_producto_ibfk_1` FOREIGN KEY (`ID_INVENTARIO`) REFERENCES `inventario` (`ID_INVENTARIO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_ROL`) REFERENCES `roles_sistema` (`ID_ROL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
