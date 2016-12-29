-- MySQL dump 10.13  Distrib 5.6.16, for Win32 (x86)
--
-- Host: localhost    Database: ristoranet_db
-- ------------------------------------------------------
-- Server version	5.6.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ristoranet_db`
--

/*!40000 DROP DATABASE IF EXISTS `ristoranet_db`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ristoranet_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ristoranet_db`;

--
-- Table structure for table `conta_proveedores`
--

DROP TABLE IF EXISTS `conta_proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conta_proveedores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa` varchar(50) NOT NULL,
  `rut_empresa` char(12) NOT NULL,
  `representante` varchar(50) NOT NULL,
  `telefono_contacto` decimal(10,0) NOT NULL,
  `alternativa_contacto` decimal(10,0) NOT NULL,
  `email_contacto` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta_proveedores`
--

LOCK TABLES `conta_proveedores` WRITE;
/*!40000 ALTER TABLE `conta_proveedores` DISABLE KEYS */;
INSERT INTO `conta_proveedores` VALUES (1,'Agrosuper','54.215.364-6','Patricia Quinzacara',210221,210224,'contacto@agrosuper.cl','Camino La Estrella 401 Of. 7 Sector Punta De Cortés','Rancagua');
/*!40000 ALTER TABLE `conta_proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturas` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `cod_fac` int(6) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  UNIQUE KEY `facturas` (`id`,`cod_fac`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` VALUES (1,14587469,'1/1/1993','Agrosuper','fac_52683d89b5e8b.png'),(2,19283741,'23/10/2013','Agrosuper','fac_526859263e8f2.png'),(3,25414782,'1/1/1993','agro','fac_528b119d2e990.jpg'),(4,234234234,'6/9/2007','aaaaa','fac_528b7aed3cda5.jpg');
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inv_formato`
--

DROP TABLE IF EXISTS `inv_formato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inv_formato` (
  `int` int(1) NOT NULL AUTO_INCREMENT,
  `formato` varchar(50) NOT NULL,
  PRIMARY KEY (`int`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inv_formato`
--

LOCK TABLES `inv_formato` WRITE;
/*!40000 ALTER TABLE `inv_formato` DISABLE KEYS */;
INSERT INTO `inv_formato` VALUES (1,'KG'),(2,'LT'),(3,'BOTELLA'),(4,'FRASCO'),(5,'SOBRE'),(6,'LATA'),(7,'BOLSITA'),(8,'BOLSA'),(9,'DISPLAY'),(10,'BOTE');
/*!40000 ALTER TABLE `inv_formato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_categorias`
--

DROP TABLE IF EXISTS `menu_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_categorias` (
  `cod` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_categorias`
--

LOCK TABLES `menu_categorias` WRITE;
/*!40000 ALTER TABLE `menu_categorias` DISABLE KEYS */;
INSERT INTO `menu_categorias` VALUES (1,'Entradas'),(2,'Plato Principal'),(3,'Postres'),(8,'Sándwich'),(9,'Otros');
/*!40000 ALTER TABLE `menu_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_productos`
--

DROP TABLE IF EXISTS `menu_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_productos` (
  `cod` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `producto` varchar(50) NOT NULL,
  `precio` decimal(5,0) NOT NULL,
  `categoria` int(5) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `stock` decimal(10,0) DEFAULT NULL,
  `nivel` tinyint(4) NOT NULL,
  `visible` int(1) DEFAULT NULL,
  `descripcion` varchar(800) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_productos`
--

LOCK TABLES `menu_productos` WRITE;
/*!40000 ALTER TABLE `menu_productos` DISABLE KEYS */;
INSERT INTO `menu_productos` VALUES (41,'Mamamam',14444,3,'thumb53e2f76e3c29f.png',500,2,1,NULL),(42,'Mamamam',14444,3,'thumb53e2f7c4a465f.png',500,2,1,NULL),(43,'Mamma',10000,3,'thumbc210.png',1000,2,1,NULL),(44,'Mamma',10000,3,'thumba5.png',1000,2,1,NULL),(45,'Lalala',25000,2,'thumb53e2fd511bbd3.png',5000,2,1,NULL),(46,'Lalalala',1500,3,'thumb53e3d93f26f36.png',100,2,1,'aaaaaaaaaaaaa'),(47,'Pizza',1500,2,'thumb53e3fbd438dcc.png',2000,2,1,'Mama mama    mamamama \r\n-akqkqkejai\r\n-klqeoeia\r\n-kaka');
/*!40000 ALTER TABLE `menu_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesa_capacidad`
--

DROP TABLE IF EXISTS `mesa_capacidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesa_capacidad` (
  `cod` tinyint(4) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesa_capacidad`
--

LOCK TABLES `mesa_capacidad` WRITE;
/*!40000 ALTER TABLE `mesa_capacidad` DISABLE KEYS */;
INSERT INTO `mesa_capacidad` VALUES (2,'2'),(4,'4'),(5,'+5');
/*!40000 ALTER TABLE `mesa_capacidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesas`
--

DROP TABLE IF EXISTS `mesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesas` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `estado` int(1) NOT NULL,
  `seccion` int(1) NOT NULL,
  `capacidad` int(1) NOT NULL,
  `usuario` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesas`
--

LOCK TABLES `mesas` WRITE;
/*!40000 ALTER TABLE `mesas` DISABLE KEYS */;
INSERT INTO `mesas` VALUES (1,1,1,5,0),(2,1,1,5,0),(3,1,1,5,0),(4,1,1,5,0),(5,1,2,5,0),(6,1,2,5,0),(7,1,2,5,0),(8,1,3,5,0),(9,1,3,5,0),(10,1,3,5,0);
/*!40000 ALTER TABLE `mesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mesas_estados`
--

DROP TABLE IF EXISTS `mesas_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mesas_estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mesas_estados`
--

LOCK TABLES `mesas_estados` WRITE;
/*!40000 ALTER TABLE `mesas_estados` DISABLE KEYS */;
INSERT INTO `mesas_estados` VALUES (1,'Disponible'),(2,'En Espera'),(3,'Ocupado'),(4,'No Disponible');
/*!40000 ALTER TABLE `mesas_estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodo_pago`
--

DROP TABLE IF EXISTS `metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `metodo_pago` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `metodo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_pago`
--

LOCK TABLES `metodo_pago` WRITE;
/*!40000 ALTER TABLE `metodo_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `motivo`
--

DROP TABLE IF EXISTS `motivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `motivo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `motivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `motivo`
--

LOCK TABLES `motivo` WRITE;
/*!40000 ALTER TABLE `motivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `motivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'Tareas de Administracion','admin_access'),(2,'Agregar Posts','nuevo_post'),(3,'Editar Posts','editar_post'),(4,'Eliminar Post','eliminar_post'),(5,'Acceso POS','access_pos'),(6,'Acceso Estadistico','access_estadistics'),(7,'Usar POS','pos_use'),(8,'Agregar Rol','add_role'),(9,'Acceso Administración','admin_access'),(10,'Acceso Usuario','user_access');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos_role`
--

DROP TABLE IF EXISTS `permisos_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos_role` (
  `role` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) NOT NULL,
  UNIQUE KEY `role` (`role`,`permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos_role`
--

LOCK TABLES `permisos_role` WRITE;
/*!40000 ALTER TABLE `permisos_role` DISABLE KEYS */;
INSERT INTO `permisos_role` VALUES (1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,10,1),(2,1,1),(2,2,1),(2,3,1),(2,4,1),(3,2,1),(3,3,1),(13,1,0),(13,2,0),(13,3,0),(13,4,0);
/*!40000 ALTER TABLE `permisos_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos_usuario`
--

DROP TABLE IF EXISTS `permisos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos_usuario` (
  `usuario` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  `valor` tinyint(4) DEFAULT NULL,
  UNIQUE KEY `usuario` (`usuario`,`permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos_usuario`
--

LOCK TABLES `permisos_usuario` WRITE;
/*!40000 ALTER TABLE `permisos_usuario` DISABLE KEYS */;
INSERT INTO `permisos_usuario` VALUES (1,5,1),(1,15,0);
/*!40000 ALTER TABLE `permisos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rnet_invent`
--

DROP TABLE IF EXISTS `rnet_invent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rnet_invent` (
  `SNVG_C00COD` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Codigo Producto',
  `SNVG_C00101` varchar(100) NOT NULL COMMENT 'Descripcion Producto',
  `SNVG_C00102` varchar(100) NOT NULL COMMENT 'Marca Producto',
  `SNVG_C00103` int(1) NOT NULL COMMENT 'Formato Producto',
  `SNVG_C00104` decimal(10,0) NOT NULL COMMENT 'Existencia/Cantidad Producto',
  `SNVG_C00105` decimal(10,0) NOT NULL COMMENT 'Coste Unitario Producto',
  `SNVG_C00106` decimal(10,0) NOT NULL COMMENT 'Total Coste',
  `SNVG_C00107` date NOT NULL COMMENT 'Ultimo Log',
  PRIMARY KEY (`SNVG_C00COD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Inventario Producto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rnet_invent`
--

LOCK TABLES `rnet_invent` WRITE;
/*!40000 ALTER TABLE `rnet_invent` DISABLE KEYS */;
/*!40000 ALTER TABLE `rnet_invent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Root'),(2,'Administrador'),(3,'Usuario'),(13,'Chef'),(14,'Cajero'),(15,'Sub Gerente'),(16,'Chef'),(17,'Camarero');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion_mesas`
--

DROP TABLE IF EXISTS `seccion_mesas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion_mesas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `seccion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion_mesas`
--

LOCK TABLES `seccion_mesas` WRITE;
/*!40000 ALTER TABLE `seccion_mesas` DISABLE KEYS */;
INSERT INTO `seccion_mesas` VALUES (1,'Principal'),(2,'Seccion A'),(3,'Seccion B'),(4,'Seccion C');
/*!40000 ALTER TABLE `seccion_mesas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_pos`
--

DROP TABLE IF EXISTS `snvg_pos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_pos` (
  `inicio` date NOT NULL,
  `termino` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_pos`
--

LOCK TABLES `snvg_pos` WRITE;
/*!40000 ALTER TABLE `snvg_pos` DISABLE KEYS */;
/*!40000 ALTER TABLE `snvg_pos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_tclog`
--

DROP TABLE IF EXISTS `snvg_tclog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_tclog` (
  `SNVG_C00101` char(5) NOT NULL COMMENT 'Folio Log',
  `SNVG_C00102` datetime NOT NULL COMMENT 'Inicio',
  `SNVG_C00103` int(11) NOT NULL COMMENT 'Monto Inicial',
  `SNVG_C00104` datetime DEFAULT NULL COMMENT 'Cierre',
  `SNVG_C00105` int(11) DEFAULT NULL COMMENT 'Monto Final',
  `SNVG_C00106` int(11) DEFAULT NULL COMMENT 'Ganancia',
  UNIQUE KEY `SNVG_C00101` (`SNVG_C00101`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Log Movimiento Caja';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_tclog`
--

LOCK TABLES `snvg_tclog` WRITE;
/*!40000 ALTER TABLE `snvg_tclog` DISABLE KEYS */;
INSERT INTO `snvg_tclog` VALUES ('A73A1','2014-06-09 08:10:00',50000,'2014-06-09 21:07:00',85600,35600),('A73A2','2014-07-01 08:10:00',50000,'2014-07-01 21:07:00',85600,35600),('A73AU','2014-06-08 08:10:00',50000,'2014-06-08 21:07:00',85600,35600);
/*!40000 ALTER TABLE `snvg_tclog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_tt012`
--

DROP TABLE IF EXISTS `snvg_tt012`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_tt012` (
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
  UNIQUE KEY `SNVG_C00101` (`SNVG_C00101`),
  UNIQUE KEY `SNVG_C00106` (`SNVG_C00106`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla registro de Transacciones.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_tt012`
--

LOCK TABLES `snvg_tt012` WRITE;
/*!40000 ALTER TABLE `snvg_tt012` DISABLE KEYS */;
INSERT INTO `snvg_tt012` VALUES (1037517580,'2014-08-28','00:22:29',1,5,'t_1037517580',0,129500,24605,154105,'Mish','B'),(1160306942,'2014-08-25','17:56:59',1,5,'t_1160306942',0,26500,5035,31535,'mish','A');
/*!40000 ALTER TABLE `snvg_tt012` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_tt013`
--

DROP TABLE IF EXISTS `snvg_tt013`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_tt013` (
  `SNVG_C00COD` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Codigo Producto',
  `SNVG_C00101` varchar(100) NOT NULL COMMENT 'Descripcion Producto',
  `SNVG_C00102` varchar(100) NOT NULL COMMENT 'Marca Producto',
  `SNVG_C00103` enum('KG','LT','BOTELLA','FRASCO','SOBRE','LATA','BOLSITA','BOLSA','DISPLAY','BOTE') NOT NULL COMMENT 'Formato Producto',
  `SNVG_C00104` decimal(10,0) NOT NULL COMMENT 'Existencia/Cantidad Producto',
  `SNVG_C00105` decimal(10,0) NOT NULL COMMENT 'Coste Unitario Producto',
  `SNVG_C00106` decimal(10,0) NOT NULL COMMENT 'Total Coste',
  `SNVG_C00107` date NOT NULL COMMENT 'Ultimo Log',
  PRIMARY KEY (`SNVG_C00COD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Inventario Producto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_tt013`
--

LOCK TABLES `snvg_tt013` WRITE;
/*!40000 ALTER TABLE `snvg_tt013` DISABLE KEYS */;
/*!40000 ALTER TABLE `snvg_tt013` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_ttable`
--

DROP TABLE IF EXISTS `snvg_ttable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_ttable` (
  `SNVG_C00100` decimal(4,0) NOT NULL COMMENT 'Numero de Mesa',
  `SNVG_C00101` char(1) NOT NULL COMMENT 'Seccion de Mesa',
  `SNVG_C00102` decimal(4,0) NOT NULL COMMENT 'Estado de la Mesa',
  `SNVG_C00103` decimal(4,0) NOT NULL COMMENT 'Capacidad de la Mesa',
  `SNVG_C00104` decimal(10,0) NOT NULL COMMENT 'Transaccion Ligada',
  `SNVG_C00105` decimal(4,0) NOT NULL COMMENT 'Usuario a Cargo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Tablas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_ttable`
--

LOCK TABLES `snvg_ttable` WRITE;
/*!40000 ALTER TABLE `snvg_ttable` DISABLE KEYS */;
INSERT INTO `snvg_ttable` VALUES (1,'A',1,2,1,1),(2,'A',1,2,1060781484,1),(3,'A',1,2,1019459585,1),(4,'A',1,2,1383585354,1),(5,'A',1,2,1160306942,1),(6,'A',0,2,0,0),(7,'A',0,2,0,0),(1,'B',1,4,1370733267,1),(2,'B',0,4,0,0),(3,'B',1,4,1328210005,1),(4,'B',0,4,0,0),(5,'B',1,4,1037517580,1),(6,'B',0,4,0,0),(1,'C',1,4,1393221290,1),(2,'C',0,4,0,0),(3,'C',0,4,0,0),(4,'C',0,4,0,0),(5,'C',0,4,0,0),(6,'C',0,4,0,0),(1,'D',1,10,1087336623,1),(2,'D',1,10,1040170592,1),(3,'D',1,10,1220975798,1),(4,'D',0,10,0,0),(5,'D',1,10,1283071274,1),(6,'D',0,10,71518820,0);
/*!40000 ALTER TABLE `snvg_ttable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_ttslog`
--

DROP TABLE IF EXISTS `snvg_ttslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_ttslog` (
  `SNVG_C00101` int(10) unsigned NOT NULL COMMENT 'Cod Transacción',
  `SNVG_C00102` datetime NOT NULL COMMENT 'Fecha/Hora',
  `SNVG_C00103` int(11) NOT NULL COMMENT 'Cod Camarero',
  `SNVG_C00104` int(11) NOT NULL COMMENT 'Monto Neto',
  `SNVG_C00105` int(11) NOT NULL COMMENT 'Monto IVA',
  `SNVG_C00106` int(11) NOT NULL COMMENT 'Monto Extra',
  `SNVG_C00107` int(11) NOT NULL COMMENT 'Monto Total',
  UNIQUE KEY `SNVG_C00101` (`SNVG_C00101`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_ttslog`
--

LOCK TABLES `snvg_ttslog` WRITE;
/*!40000 ALTER TABLE `snvg_ttslog` DISABLE KEYS */;
INSERT INTO `snvg_ttslog` VALUES (2,'2014-06-07 13:39:16',1,18000,3420,2142,21420),(9,'0000-00-00 00:00:00',1,7700,1463,916,9163);
/*!40000 ALTER TABLE `snvg_ttslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_1037517580`
--

DROP TABLE IF EXISTS `t_1037517580`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_1037517580` (
  `id_prod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_1037517580`
--

LOCK TABLES `t_1037517580` WRITE;
/*!40000 ALTER TABLE `t_1037517580` DISABLE KEYS */;
INSERT INTO `t_1037517580` VALUES (45,5,25000,125000,0),(47,3,1500,4500,0);
/*!40000 ALTER TABLE `t_1037517580` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_1160306942`
--

DROP TABLE IF EXISTS `t_1160306942`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_1160306942` (
  `id_prod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_1160306942`
--

LOCK TABLES `t_1160306942` WRITE;
/*!40000 ALTER TABLE `t_1160306942` DISABLE KEYS */;
INSERT INTO `t_1160306942` VALUES (45,1,25000,25000,0),(47,1,1500,1500,0);
/*!40000 ALTER TABLE `t_1160306942` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_1283071274`
--

DROP TABLE IF EXISTS `t_1283071274`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_1283071274` (
  `id_prod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_1283071274`
--

LOCK TABLES `t_1283071274` WRITE;
/*!40000 ALTER TABLE `t_1283071274` DISABLE KEYS */;
INSERT INTO `t_1283071274` VALUES (42,1,14444,14444,0),(41,1,14444,14444,0),(43,2,10000,20000,0),(44,1,10000,10000,0),(47,2,1500,3000,0);
/*!40000 ALTER TABLE `t_1283071274` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_1328210005`
--

DROP TABLE IF EXISTS `t_1328210005`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_1328210005` (
  `id_prod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_1328210005`
--

LOCK TABLES `t_1328210005` WRITE;
/*!40000 ALTER TABLE `t_1328210005` DISABLE KEYS */;
INSERT INTO `t_1328210005` VALUES (45,34,25000,850000,0),(47,35,1500,52500,0),(41,8,14444,115552,0);
/*!40000 ALTER TABLE `t_1328210005` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_1383585354`
--

DROP TABLE IF EXISTS `t_1383585354`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_1383585354` (
  `id_prod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_1383585354`
--

LOCK TABLES `t_1383585354` WRITE;
/*!40000 ALTER TABLE `t_1383585354` DISABLE KEYS */;
INSERT INTO `t_1383585354` VALUES (45,5,25000,125000,0),(41,5,14444,72220,0),(43,1,10000,10000,0),(42,1,14444,14444,0),(44,1,10000,10000,0),(46,1,1500,1500,0);
/*!40000 ALTER TABLE `t_1383585354` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `usuario` varchar(30) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jorge Aviles','javiles','7e55608ab7198b47554612ca2acd003a470f57b3','jorge.aviles@outlook.com',1,1),(6,'Francisca Urrutia','furrutia','7e55608ab7198b47554612ca2acd003a470f57b3','francisca.urritia@outlook.com',2,1),(7,'matias','mmoreno','7e55608ab7198b47554612ca2acd003a470f57b3','javiles@outlook.cl',3,1),(9,'Jorge Aviles Moreno','jmoreno','0c76bd0b7fba4fbdda66ea56b61a16b48d33155d','jorge.aviles12@gmail.com',1,1),(10,'Javiera Ossandon','jossandon','0c76bd0b7fba4fbdda66ea56b61a16b48d33155d','jorge.aviles12@gmail.com',3,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-28  4:46:10
