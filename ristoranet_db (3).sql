-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-04-2015 a las 02:31:21
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ristoranet_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `backuplog`
--

CREATE TABLE IF NOT EXISTS `backuplog` (
`id` int(5) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conta_proveedores`
--

CREATE TABLE IF NOT EXISTS `conta_proveedores` (
`id` int(10) unsigned NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `rut_empresa` char(12) NOT NULL,
  `representante` varchar(50) NOT NULL,
  `telefono_contacto` decimal(10,0) NOT NULL,
  `alternativa_contacto` decimal(10,0) NOT NULL,
  `email_contacto` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `conta_proveedores`
--

INSERT INTO `conta_proveedores` (`id`, `empresa`, `rut_empresa`, `representante`, `telefono_contacto`, `alternativa_contacto`, `email_contacto`, `direccion`, `ciudad`) VALUES
(1, 'Agrosuper', '54.215.364-6', 'Patricia Quinzacara', '210221', '210224', 'contacto@agrosuper.cl', 'Camino La Estrella 401 Of. 7 Sector Punta De Cortés', 'Rancagua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
`id` int(4) unsigned NOT NULL,
  `cod_fac` int(6) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `cod_fac`, `fecha`, `proveedor`, `imagen`) VALUES
(1, 14587469, '1/1/1993', 'Agrosuper', 'fac_52683d89b5e8b.png'),
(2, 19283741, '23/10/2013', 'Agrosuper', 'fac_526859263e8f2.png'),
(3, 25414782, '1/1/1993', 'agro', 'fac_528b119d2e990.jpg'),
(4, 234234234, '6/9/2007', 'aaaaa', 'fac_528b7aed3cda5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inv_formato`
--

CREATE TABLE IF NOT EXISTS `inv_formato` (
`int` int(1) NOT NULL,
  `formato` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `inv_formato`
--

INSERT INTO `inv_formato` (`int`, `formato`) VALUES
(1, 'KG'),
(2, 'LT'),
(3, 'BOTELLA'),
(4, 'FRASCO'),
(5, 'SOBRE'),
(6, 'LATA'),
(7, 'BOLSITA'),
(8, 'BOLSA'),
(9, 'DISPLAY'),
(10, 'BOTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_categorias`
--

CREATE TABLE IF NOT EXISTS `menu_categorias` (
`cod` int(5) unsigned NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `menu_categorias`
--

INSERT INTO `menu_categorias` (`cod`, `categoria`) VALUES
(1, 'Entradas'),
(2, 'Plato Principal'),
(3, 'Postres'),
(8, 'Sándwich'),
(9, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_productos`
--

CREATE TABLE IF NOT EXISTS `menu_productos` (
`cod` int(5) unsigned NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` decimal(5,0) NOT NULL,
  `categoria` int(5) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `stock` decimal(10,0) DEFAULT NULL,
  `nivel` tinyint(4) NOT NULL,
  `visible` int(1) DEFAULT NULL,
  `descripcion` varchar(800) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Volcado de datos para la tabla `menu_productos`
--

INSERT INTO `menu_productos` (`cod`, `producto`, `precio`, `categoria`, `imagen`, `stock`, `nivel`, `visible`, `descripcion`) VALUES
(48, 'Consome de Pollo', '1500', 1, 'thumb540e1273baa7c.jpg', '50', 2, 1, 'Consome de Pollo casero con verduras picadas.'),
(49, 'Palta Reina', '2500', 1, 'thumb540e138c07fe7.jpg', '50', 2, 1, 'Palta reina rellena con atún y mayonesa.'),
(50, 'Cazuela de Vacuno', '5000', 2, 'thumb540e13d462833.jpg', '40', 2, 1, 'Cazuela de Vacuno con Verduras Frescas y verduras de la temporada.'),
(51, 'Cazuela de Ave', '4000', 2, 'thumb540e143110944.jpg', '40', 2, 1, ''),
(52, 'Prieta con Papas Cocidas', '3500', 2, 'thumb540e14553bcec.jpg', '30', 2, 1, ''),
(53, 'Lomo a lo Pobre', '4500', 2, 'thumb540e148157b45.jpg', '40', 2, 1, ''),
(54, 'Cafe Helado', '3000', 3, 'thumb540e14c0ca3e3.png', '50', 2, 1, ''),
(55, 'Tarta de Frutas (Porción)', '2500', 3, 'thumb540e14fb15125.jpg', '24', 2, 1, ''),
(56, 'Lomo Palta Mayo', '3500', 8, 'thumb540e1e24449c3.png', '40', 2, 1, ''),
(57, 'Completo', '2500', 8, 'thumb540e1e3d80085.jpg', '40', 2, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
`id` int(4) unsigned NOT NULL,
  `estado` int(1) NOT NULL,
  `seccion` int(1) NOT NULL,
  `capacidad` int(1) NOT NULL,
  `usuario` int(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `estado`, `seccion`, `capacidad`, `usuario`) VALUES
(1, 1, 1, 5, 0),
(2, 1, 1, 5, 0),
(3, 1, 1, 5, 0),
(4, 1, 1, 5, 0),
(5, 1, 2, 5, 0),
(6, 1, 2, 5, 0),
(7, 1, 2, 5, 0),
(8, 1, 3, 5, 0),
(9, 1, 3, 5, 0),
(10, 1, 3, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas_estados`
--

CREATE TABLE IF NOT EXISTS `mesas_estados` (
`id` int(10) unsigned NOT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `mesas_estados`
--

INSERT INTO `mesas_estados` (`id`, `estado`) VALUES
(1, 'Disponible'),
(2, 'En Espera'),
(3, 'Ocupado'),
(4, 'No Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa_capacidad`
--

CREATE TABLE IF NOT EXISTS `mesa_capacidad` (
  `cod` tinyint(4) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa_capacidad`
--

INSERT INTO `mesa_capacidad` (`cod`, `descripcion`) VALUES
(2, '2'),
(4, '4'),
(5, '+5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE IF NOT EXISTS `metodo_pago` (
`id` int(10) unsigned NOT NULL,
  `metodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE IF NOT EXISTS `motivo` (
`id` int(11) unsigned NOT NULL,
  `motivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
`id_permiso` int(11) NOT NULL,
  `permiso` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `permiso`, `key`) VALUES
(1, 'Tareas de Administracion', 'admin_access'),
(2, 'Agregar Posts', 'nuevo_post'),
(3, 'Editar Posts', 'editar_post'),
(4, 'Eliminar Post', 'eliminar_post'),
(5, 'Acceso POS', 'access_pos'),
(6, 'Acceso Estadistico', 'access_estadistics'),
(7, 'Usar POS', 'pos_use'),
(8, 'Agregar Rol', 'add_role'),
(9, 'Acceso Comanda Electronica', 'access_mobile'),
(10, 'Acceso Visualizador', 'access_visual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_role`
--

CREATE TABLE IF NOT EXISTS `permisos_role` (
  `role` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos_role`
--

INSERT INTO `permisos_role` (`role`, `permiso`, `valor`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(1, 9, 1),
(1, 10, 1),
(2, 1, 1),
(2, 2, 0),
(2, 3, 0),
(2, 6, 1),
(3, 2, 1),
(3, 3, 1),
(13, 1, 0),
(13, 2, 0),
(13, 3, 0),
(13, 4, 0),
(13, 10, 1),
(14, 5, 1),
(14, 7, 1),
(15, 6, 1),
(17, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_usuario`
--

CREATE TABLE IF NOT EXISTS `permisos_usuario` (
  `usuario` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos_usuario`
--

INSERT INTO `permisos_usuario` (`usuario`, `permiso`, `valor`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 5, 1),
(1, 15, 0),
(6, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rnet_invent`
--

CREATE TABLE IF NOT EXISTS `rnet_invent` (
`SNVG_C00COD` int(10) unsigned NOT NULL COMMENT 'Codigo Producto',
  `SNVG_C00101` varchar(100) NOT NULL COMMENT 'Descripcion Producto',
  `SNVG_C00102` varchar(100) NOT NULL COMMENT 'Marca Producto',
  `SNVG_C00103` int(1) NOT NULL COMMENT 'Formato Producto',
  `SNVG_C00104` decimal(10,0) NOT NULL COMMENT 'Existencia/Cantidad Producto',
  `SNVG_C00105` decimal(10,0) NOT NULL COMMENT 'Coste Unitario Producto',
  `SNVG_C00106` decimal(10,0) NOT NULL COMMENT 'Total Coste',
  `SNVG_C00107` date NOT NULL COMMENT 'Ultimo Log'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Inventario Producto' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id_role` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Root'),
(2, 'Administrador'),
(3, 'Usuario'),
(13, 'Chef'),
(14, 'Cajero'),
(15, 'Sub Gerente'),
(16, 'Chef'),
(17, 'Camarero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_mesas`
--

CREATE TABLE IF NOT EXISTS `seccion_mesas` (
`id` int(10) unsigned NOT NULL,
  `seccion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `seccion_mesas`
--

INSERT INTO `seccion_mesas` (`id`, `seccion`) VALUES
(1, 'Principal'),
(2, 'Seccion A'),
(3, 'Seccion B'),
(4, 'Seccion C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snvg_pos`
--

CREATE TABLE IF NOT EXISTS `snvg_pos` (
  `inicio` date NOT NULL,
  `termino` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `snvg_pos`
--

INSERT INTO `snvg_pos` (`inicio`, `termino`) VALUES
('2014-09-22', NULL),
('2014-09-24', NULL),
('2014-09-30', NULL),
('2014-10-06', NULL),
('2014-10-09', NULL),
('2014-10-10', NULL),
('2014-10-13', NULL),
('2014-10-20', '2014-10-20'),
('2015-03-26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snvg_retiropos`
--

CREATE TABLE IF NOT EXISTS `snvg_retiropos` (
`snvg_ccod` int(5) unsigned NOT NULL,
  `snvg_cusuario` int(5) NOT NULL,
  `snvg_cdatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snvg_tclog`
--

CREATE TABLE IF NOT EXISTS `snvg_tclog` (
`SNVG_C00101` int(10) unsigned NOT NULL COMMENT 'Folio Log',
  `SNVG_C00102` datetime NOT NULL COMMENT 'Inicio',
  `SNVG_C00103` int(11) NOT NULL COMMENT 'Monto Inicial',
  `SNVG_C00104` datetime DEFAULT NULL COMMENT 'Cierre',
  `SNVG_C00105` int(11) DEFAULT NULL COMMENT 'Monto Final',
  `SNVG_C00106` int(11) DEFAULT NULL COMMENT 'Ganancia',
  `SNVG_C00107` int(5) NOT NULL COMMENT 'Cod Usuario',
  `SNVG_C00108` int(11) DEFAULT NULL COMMENT 'Saldo Actual',
  `SNVG_C00109` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Observación Cierre de Caja'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Log Movimiento Caja' AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `snvg_tclog`
--

INSERT INTO `snvg_tclog` (`SNVG_C00101`, `SNVG_C00102`, `SNVG_C00103`, `SNVG_C00104`, `SNVG_C00105`, `SNVG_C00106`, `SNVG_C00107`, `SNVG_C00108`, `SNVG_C00109`) VALUES
(7, '2014-09-15 20:22:20', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(8, '2014-09-18 01:33:31', 50000, '2014-09-18 22:22:30', 20000, -30000, 1, 50000, ''),
(9, '2014-09-19 12:25:23', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(10, '2014-09-20 11:37:27', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(11, '2014-09-21 03:02:47', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(12, '2014-09-22 00:12:45', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(13, '2014-09-22 21:28:50', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(14, '2014-09-24 03:20:34', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(15, '2014-09-30 14:11:23', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(16, '2014-10-06 20:35:40', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(17, '2014-10-09 19:55:29', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(18, '2014-10-10 19:10:29', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(19, '2014-10-13 20:27:41', 50000, NULL, NULL, NULL, 1, 50000, NULL),
(21, '2014-10-20 20:35:38', 50000, '2014-10-20 20:42:54', 82130, 32130, 1, 82130, 'Ningun Imprevisto'),
(22, '2015-03-26 15:35:05', 60000, NULL, NULL, NULL, 1, 90940, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snvg_tt012`
--

CREATE TABLE IF NOT EXISTS `snvg_tt012` (
  `SNVG_C00101` decimal(10,0) NOT NULL COMMENT 'Codigo Transaccion',
  `SNVG_C00102` date NOT NULL COMMENT 'Fecha de creacion de Transaccion',
  `SNVG_C00103` time NOT NULL COMMENT 'Tiempo de Inicio',
  `SNVG_C00104` decimal(4,0) NOT NULL COMMENT 'Nombre de Camarero',
  `SNVG_C00105` decimal(4,0) NOT NULL COMMENT 'Codigo de Mesa',
  `SNVG_C00106` char(20) DEFAULT NULL COMMENT 'Codigo de Tabla de Items Enlazada',
  `SNVG_C00107` tinyint(1) NOT NULL COMMENT 'Estado de la transaccion.',
  `SNVG_C00108` decimal(10,0) NOT NULL COMMENT 'Subtotal de Transaccion.',
  `SNVG_C00109` decimal(10,0) NOT NULL COMMENT 'IVA',
  `SNVG_C00110` decimal(10,0) NOT NULL COMMENT 'Total Transaccion',
  `SNVG_C00111` varchar(500) DEFAULT NULL COMMENT 'Comentarios Extras',
  `SNVG_C00112` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Seccion Mesa',
  `SNVG_C00113` int(11) DEFAULT NULL COMMENT 'Monto Pago',
  `SNVG_C00114` int(1) DEFAULT NULL COMMENT 'Método de Pago'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla registro de Transacciones.';

--
-- Volcado de datos para la tabla `snvg_tt012`
--

INSERT INTO `snvg_tt012` (`SNVG_C00101`, `SNVG_C00102`, `SNVG_C00103`, `SNVG_C00104`, `SNVG_C00105`, `SNVG_C00106`, `SNVG_C00107`, `SNVG_C00108`, `SNVG_C00109`, `SNVG_C00110`, `SNVG_C00111`, `SNVG_C00112`, `SNVG_C00113`, `SNVG_C00114`) VALUES
('1165601240', '2014-09-22', '17:57:47', '1', '1', 't_1165601240', 2, '14500', '2755', '17255', '', 'D', 20000, 1),
('3449243089', '2014-09-19', '12:26:56', '2', '1', 't_3449243089', 0, '30000', '5700', '35700', '', 'A', NULL, 0),
('5811993509', '2014-09-22', '17:40:57', '1', '4', 't_5811993509', 2, '21000', '3990', '24990', '-Cazuela sin Papas.', 'B', 25000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snvg_tt013`
--

CREATE TABLE IF NOT EXISTS `snvg_tt013` (
`SNVG_C00COD` int(10) unsigned NOT NULL COMMENT 'Codigo Producto',
  `SNVG_C00101` varchar(100) NOT NULL COMMENT 'Descripcion Producto',
  `SNVG_C00102` varchar(100) NOT NULL COMMENT 'Marca Producto',
  `SNVG_C00103` enum('KG','LT','BOTELLA','FRASCO','SOBRE','LATA','BOLSITA','BOLSA','DISPLAY','BOTE') NOT NULL COMMENT 'Formato Producto',
  `SNVG_C00104` decimal(10,0) NOT NULL COMMENT 'Existencia/Cantidad Producto',
  `SNVG_C00105` decimal(10,0) NOT NULL COMMENT 'Coste Unitario Producto',
  `SNVG_C00106` decimal(10,0) NOT NULL COMMENT 'Total Coste',
  `SNVG_C00107` date NOT NULL COMMENT 'Ultimo Log'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Inventario Producto' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `snvg_tt013`
--

INSERT INTO `snvg_tt013` (`SNVG_C00COD`, `SNVG_C00101`, `SNVG_C00102`, `SNVG_C00103`, `SNVG_C00104`, `SNVG_C00105`, `SNVG_C00106`, `SNVG_C00107`) VALUES
(1, 'Aceite', 'Natura', 'BOTELLA', '10', '250', '125000', '2014-10-20'),
(2, 'Salsa de Tomate', 'Knor', 'SOBRE', '300', '349', '209400', '2014-10-20'),
(3, 'Coca Cola', 'Coca Cola', 'BOTELLA', '200', '250', '125000', '2014-10-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snvg_ttable`
--

CREATE TABLE IF NOT EXISTS `snvg_ttable` (
  `SNVG_C00100` decimal(4,0) NOT NULL COMMENT 'Numero de Mesa',
  `SNVG_C00101` char(1) NOT NULL COMMENT 'Seccion de Mesa',
  `SNVG_C00102` decimal(4,0) NOT NULL COMMENT 'Estado de la Mesa',
  `SNVG_C00103` decimal(4,0) NOT NULL COMMENT 'Capacidad de la Mesa',
  `SNVG_C00104` decimal(10,0) NOT NULL COMMENT 'Transaccion Ligada',
  `SNVG_C00105` decimal(4,0) NOT NULL COMMENT 'Usuario a Cargo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Tablas';

--
-- Volcado de datos para la tabla `snvg_ttable`
--

INSERT INTO `snvg_ttable` (`SNVG_C00100`, `SNVG_C00101`, `SNVG_C00102`, `SNVG_C00103`, `SNVG_C00104`, `SNVG_C00105`) VALUES
('1', 'A', '1', '2', '7817866643', '1'),
('2', 'A', '0', '2', '0', '0'),
('3', 'A', '0', '2', '0', '0'),
('4', 'A', '0', '2', '0', '0'),
('5', 'A', '0', '2', '0', '0'),
('6', 'A', '0', '2', '0', '0'),
('7', 'A', '0', '2', '0', '0'),
('1', 'B', '0', '4', '0', '0'),
('2', 'B', '0', '4', '0', '0'),
('3', 'B', '0', '4', '0', '0'),
('4', 'B', '0', '4', '0', '0'),
('5', 'B', '0', '4', '0', '0'),
('6', 'B', '0', '4', '0', '0'),
('1', 'C', '0', '4', '0', '0'),
('2', 'C', '0', '4', '0', '0'),
('3', 'C', '0', '4', '0', '0'),
('4', 'C', '0', '4', '0', '0'),
('5', 'C', '0', '4', '0', '0'),
('6', 'C', '0', '4', '0', '0'),
('1', 'D', '0', '10', '0', '0'),
('2', 'D', '0', '10', '0', '0'),
('3', 'D', '0', '10', '0', '0'),
('4', 'D', '0', '10', '0', '0'),
('5', 'D', '0', '10', '0', '0'),
('6', 'D', '0', '10', '0', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `snvg_ttslog`
--

CREATE TABLE IF NOT EXISTS `snvg_ttslog` (
`SNVG_C00100` int(8) unsigned NOT NULL,
  `SNVG_C00101` bigint(10) NOT NULL,
  `SNVG_C00102` datetime NOT NULL COMMENT 'Fecha/Hora',
  `SNVG_C00103` int(11) NOT NULL COMMENT 'Cod Camarero',
  `SNVG_C00104` int(11) NOT NULL COMMENT 'Monto Neto',
  `SNVG_C00105` int(11) NOT NULL COMMENT 'Monto IVA',
  `SNVG_C00106` int(11) NOT NULL COMMENT 'Monto Extra',
  `SNVG_C00107` int(11) NOT NULL COMMENT 'Monto Total',
  `SNVG_C00108` int(1) NOT NULL COMMENT 'Motivo',
  `SNVG_C00109` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripcion',
  `SNVG_C00110` int(11) DEFAULT NULL COMMENT 'Monto A Pagar',
  `SNVG_C00111` int(2) DEFAULT NULL COMMENT 'Metodo Pago'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `snvg_ttslog`
--

INSERT INTO `snvg_ttslog` (`SNVG_C00100`, `SNVG_C00101`, `SNVG_C00102`, `SNVG_C00103`, `SNVG_C00104`, `SNVG_C00105`, `SNVG_C00106`, `SNVG_C00107`, `SNVG_C00108`, `SNVG_C00109`, `SNVG_C00110`, `SNVG_C00111`) VALUES
(5, 2147483647, '2014-09-06 19:09:44', 0, 69054, 24000, 3000, 97385, 0, '', NULL, NULL),
(6, 2066073502, '2014-09-06 19:13:59', 0, 0, 0, 0, 0, 3, 'Mish', NULL, NULL),
(7, 2147483647, '2014-09-06 19:15:42', 1, 70000, 3000, 0, 73000, 0, '', NULL, NULL),
(8, 2147483647, '2014-09-06 19:17:09', 0, 0, 0, 0, 0, 3, 'ssssssssssssssssssssssssssssssssssssss', NULL, NULL),
(9, 2147483647, '2014-09-06 21:09:51', 0, 0, 0, 0, 0, 3, 'Mish', NULL, NULL),
(10, 2147483647, '2014-09-07 04:09:38', 0, 0, 0, 0, 0, 3, 'ssss', NULL, NULL),
(11, 2147483647, '2014-09-07 04:09:44', 0, 0, 0, 0, 0, 3, 'ssss', NULL, NULL),
(12, 1810488194, '2014-09-07 04:09:50', 0, 0, 0, 0, 0, 3, 'ssss', NULL, NULL),
(13, 1701485428, '2014-07-14 03:55:44', 6, 24786, 2000, 0, 26000, 0, '', NULL, NULL),
(14, 1235398152, '2014-08-12 11:56:15', 1, 24789, 2100, 0, 26892, 0, '', NULL, NULL),
(15, 2147483647, '2014-09-08 16:31:22', 0, 0, 0, 0, 0, 3, 'p', NULL, NULL),
(16, 2147483647, '2014-09-08 16:31:26', 0, 0, 0, 0, 0, 3, 'p', NULL, NULL),
(17, 2147483647, '2014-09-09 15:09:24', 0, 0, 0, 0, 0, 3, 'lol', NULL, NULL),
(18, 1767827798, '2014-09-09 15:09:31', 0, 0, 0, 0, 0, 3, 'lol', NULL, NULL),
(19, 2147483647, '2014-09-09 15:09:39', 0, 0, 0, 0, 0, 3, 'lol', NULL, NULL),
(20, 2147483647, '2014-09-14 14:56:51', 0, 0, 0, 0, 0, 3, 'Mish', NULL, NULL),
(21, 2147483647, '2014-09-18 00:00:30', 0, 0, 0, 0, 0, 3, 'ssssss', NULL, NULL),
(22, 2147483337, '2014-09-19 11:14:22', 6, 40000, 2000, 0, 42000, 0, '', NULL, NULL),
(23, 9507585818, '2014-09-22 14:16:56', 6, 0, 0, 0, 0, 3, 'jjj', NULL, NULL),
(24, 1220000101, '2014-09-22 17:39:32', 6, 65841, 14278, 0, 67869, 0, '', NULL, NULL),
(25, 5811993509, '0000-00-00 00:00:00', 1, 21000, 3990, 2499, 24990, 0, NULL, NULL, NULL),
(26, 1165601240, '0000-00-00 00:00:00', 1, 14500, 2755, 1726, 17255, 0, NULL, NULL, NULL),
(27, 7817866643, '2014-10-20 16:59:05', 1, 8000, 1520, 952, 9520, 0, '', 10000, 1),
(28, 1265822453, '2014-10-20 17:06:30', 1, 12000, 2280, 1428, 14280, 0, '', 15000, 1),
(29, 3909199246, '2014-10-20 18:12:58', 1, 38500, 7315, 4582, 45815, 0, '', 50000, 1),
(30, 3352674516, '2014-10-20 18:30:50', 1, 28000, 5320, 3332, 33320, 0, '', 50000, 1),
(31, 3879496329, '2014-10-20 18:37:45', 1, 12000, 2280, 1428, 14280, 0, '', 15000, 1),
(32, 3158412926, '2014-10-20 18:45:11', 1, 8000, 1520, 952, 9520, 0, '', 10000, 1),
(33, 6915220673, '2014-10-20 20:41:56', 1, 27000, 5130, 3213, 32130, 0, '', 35000, 1),
(34, 7187176165, '2015-03-26 15:37:11', 1, 26000, 4940, 3094, 30940, 0, '', 35000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_2107030125`
--

CREATE TABLE IF NOT EXISTS `t_2107030125` (
  `id_prod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `espera` int(11) DEFAULT NULL,
  `retirar` int(11) DEFAULT NULL,
  `entregado` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_2107030125`
--

INSERT INTO `t_2107030125` (`id_prod`, `cant`, `precio`, `total`, `espera`, `retirar`, `entregado`, `estado`) VALUES
(48, 15, 1500, 22500, 15, NULL, NULL, 0),
(49, 15, 2500, 37500, 15, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(4) unsigned NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `pass`, `email`, `role`, `estado`) VALUES
(1, 'Jorge Aviles', 'javiles', '7e55608ab7198b47554612ca2acd003a470f57b3', 'jorge.aviles@outlook.com', 1, 1),
(6, 'Francisca Urrutia', 'furrutia', '7e55608ab7198b47554612ca2acd003a470f57b3', 'francisca.urritia@outlook.com', 17, 1),
(7, 'matias', 'mmoreno', '7e55608ab7198b47554612ca2acd003a470f57b3', 'javiles@outlook.cl', 13, 1),
(9, 'Jorge Aviles Moreno', 'jmoreno', '0c76bd0b7fba4fbdda66ea56b61a16b48d33155d', 'jorge.aviles12@gmail.com', 1, 1),
(10, 'Javiera Ossandon', 'jossandon', '7e55608ab7198b47554612ca2acd003a470f57b3', 'jorge.aviles12@gmail.com', 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `void_motivo`
--

CREATE TABLE IF NOT EXISTS `void_motivo` (
`cod_motivo` int(5) unsigned NOT NULL,
  `motivo_desc` varchar(200) NOT NULL,
  `grado_motivo` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `void_motivo`
--

INSERT INTO `void_motivo` (`cod_motivo`, `motivo_desc`, `grado_motivo`) VALUES
(1, 'Problema con Cliente', 5),
(2, 'Cliente se Retira', 5),
(3, 'Cliente descontento', 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `backuplog`
--
ALTER TABLE `backuplog`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `conta_proveedores`
--
ALTER TABLE `conta_proveedores`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
 ADD UNIQUE KEY `facturas` (`id`,`cod_fac`);

--
-- Indices de la tabla `inv_formato`
--
ALTER TABLE `inv_formato`
 ADD PRIMARY KEY (`int`);

--
-- Indices de la tabla `menu_categorias`
--
ALTER TABLE `menu_categorias`
 ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `menu_productos`
--
ALTER TABLE `menu_productos`
 ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas_estados`
--
ALTER TABLE `mesas_estados`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesa_capacidad`
--
ALTER TABLE `mesa_capacidad`
 ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
 ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `permisos_role`
--
ALTER TABLE `permisos_role`
 ADD UNIQUE KEY `role` (`role`,`permiso`);

--
-- Indices de la tabla `permisos_usuario`
--
ALTER TABLE `permisos_usuario`
 ADD UNIQUE KEY `usuario` (`usuario`,`permiso`);

--
-- Indices de la tabla `rnet_invent`
--
ALTER TABLE `rnet_invent`
 ADD PRIMARY KEY (`SNVG_C00COD`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `seccion_mesas`
--
ALTER TABLE `seccion_mesas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `snvg_retiropos`
--
ALTER TABLE `snvg_retiropos`
 ADD PRIMARY KEY (`snvg_ccod`);

--
-- Indices de la tabla `snvg_tclog`
--
ALTER TABLE `snvg_tclog`
 ADD UNIQUE KEY `SNVG_C00101` (`SNVG_C00101`);

--
-- Indices de la tabla `snvg_tt012`
--
ALTER TABLE `snvg_tt012`
 ADD UNIQUE KEY `SNVG_C00101` (`SNVG_C00101`), ADD UNIQUE KEY `SNVG_C00106` (`SNVG_C00106`);

--
-- Indices de la tabla `snvg_tt013`
--
ALTER TABLE `snvg_tt013`
 ADD PRIMARY KEY (`SNVG_C00COD`);

--
-- Indices de la tabla `snvg_ttslog`
--
ALTER TABLE `snvg_ttslog`
 ADD PRIMARY KEY (`SNVG_C00100`);

--
-- Indices de la tabla `t_2107030125`
--
ALTER TABLE `t_2107030125`
 ADD UNIQUE KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `void_motivo`
--
ALTER TABLE `void_motivo`
 ADD PRIMARY KEY (`cod_motivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `backuplog`
--
ALTER TABLE `backuplog`
MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conta_proveedores`
--
ALTER TABLE `conta_proveedores`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `inv_formato`
--
ALTER TABLE `inv_formato`
MODIFY `int` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `menu_categorias`
--
ALTER TABLE `menu_categorias`
MODIFY `cod` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `menu_productos`
--
ALTER TABLE `menu_productos`
MODIFY `cod` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `mesas_estados`
--
ALTER TABLE `mesas_estados`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rnet_invent`
--
ALTER TABLE `rnet_invent`
MODIFY `SNVG_C00COD` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Codigo Producto';
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `seccion_mesas`
--
ALTER TABLE `seccion_mesas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `snvg_retiropos`
--
ALTER TABLE `snvg_retiropos`
MODIFY `snvg_ccod` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `snvg_tclog`
--
ALTER TABLE `snvg_tclog`
MODIFY `SNVG_C00101` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Folio Log',AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `snvg_tt013`
--
ALTER TABLE `snvg_tt013`
MODIFY `SNVG_C00COD` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Codigo Producto',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `snvg_ttslog`
--
ALTER TABLE `snvg_ttslog`
MODIFY `SNVG_C00100` int(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `void_motivo`
--
ALTER TABLE `void_motivo`
MODIFY `cod_motivo` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
