
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `tapices_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(255) NOT NULL,
  `telefono_cliente` char(30) NOT NULL,
  `email_cliente` varchar(64) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL,
  `status_cliente` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `RTN` int(14) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `codigo_producto` (`nombre_cliente`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `telefono_cliente`, `email_cliente`, `direccion_cliente`, `status_cliente`, `date_added`, `RTN`) VALUES
(10, 'Eduardo', '1234567', 'hch@hch.tv', 'UNAH', 1, '2018-11-21 23:21:21', 789456123),
(7, 'Jose', '95256874', 'jose@gmail.com', 'Col Kenedy', 1, '2018-11-08 00:40:04', 741258963),
(8, 'Antonio', '1234567', 'chocoyos@unah.hn', 'unah', 0, '2018-11-21 17:50:42', 987456123),
(9, 'Cesar', '1234567', 'cesar@unah.hn', 'Col palmas', 1, '2018-11-21 18:11:46', 123456789);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_cotizacion` (`numero_factura`,`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `condiciones` varchar(30) NOT NULL,
  `total_venta` varchar(20) NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_factura`),
  UNIQUE KEY `numero_cotizacion` (`numero_factura`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `status_producto` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_producto` (`codigo_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `status_producto`, `date_added`, `precio_producto`) VALUES
(14, '0008', 'cuero', 1, '2018-12-02 21:26:39', 3000),
(9, '110', 'Martillo', 1, '2018-10-25 00:39:08', 100),
(10, '0004', 'tela', 1, '2018-11-21 17:49:38', 500),
(11, '0005', 'Pegamento', 1, '2018-11-21 23:21:47', 50),
(12, '0006', 'Masilla', 1, '2018-11-21 23:25:27', 500),
(13, '0007', 'Plastico', 1, '2018-11-21 23:26:35', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

DROP TABLE IF EXISTS `tmp`;
CREATE TABLE IF NOT EXISTS `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `id_producto`, `cantidad_tmp`, `precio_tmp`, `session_id`) VALUES
(15, 9, 1, 100, 'f16gjo88eub22t25s2s50uvrq5'),
(17, 9, 1, 100, 'm7rdf6ld32f82n2stmheb8cfo3'),
(30, 9, 1, 100, 'rrqp16md92ki4upv6k6vlbujq5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(16, 'admin', '456', 'admin', '$2y$10$tXjXtMiqOBFWKUHKxrdd6uVAQg40LskT/wnALa1e3WElsme0K3Pv.', 'admin1@unah.hn', '2018-10-24 18:32:20'),
(20, 'Fernando', 'Padilla', 'asd123', '$2y$10$cgqDMTCdolswYgeZ3tHePOgwslJbgBSGwQjG135qT/2xYqs1Qh8lC', 'asd@unah.hn', '2018-11-21 23:32:36'),
(21, 'Jennifer', 'Escoto', 'jlo', '$2y$10$S7bYXyJ9CVUnPtJ5vWblE.YWOY1f94d8veK6qkWx022/Q0cHzBX/y', 'jlo@unah.hn', '2018-11-21 23:33:42'),
(22, 'Sindy', 'Herrera', 'sherrera', '$2y$10$ZhTMbySj1p/FS34MRaCC3uGUxxfQLsW7C0svmXtPG3sJye.BH9aw6', 'sh@unah.hn', '2018-11-21 23:34:40'),
(23, 'Wendy', 'Herrera', 'wherrera', '$2y$10$3Tg2pAUjg9Jaxg0HMo8i7eneRzZMR/NnqThcf3z/pjH6FEXhJtuQC', 'wh@unah.hn', '2018-11-21 23:36:37'),
(24, 'Stephanie', 'Romero', 'sromero', '$2y$10$XLoY3sDh95NUR4leXy3DDuxXSoC03o9CDSVVapZ6T0/sNz7Zo.NFm', 'sr@unah.hn', '2018-11-21 23:37:54'),
(25, 'Eva', 'Lopez', 'elopez', '$2y$10$2GhYXUEUaMmYfKb5p4vGE.jEXxi1H.D5pKb.cXdz7iQ8Z5wzsG45y', 'el@unah.hn', '2018-11-21 23:38:43'),
(26, 'Oscar', 'Lanza', 'olanza', '$2y$10$0L2DhzxTvPZnwVKYvA87hulbc.xXTtn7Zox.m.M50xP.Qu.I/GzHK', 'ol@unah.hn', '2018-11-21 23:39:20');
COMMIT;
