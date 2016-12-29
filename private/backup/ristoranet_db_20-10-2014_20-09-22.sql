-- MySQL dump 10.13  Distrib 5.6.20, for Linux (x86_64)
--
-- Host: localhost    Database: ristoranet_db
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `backuplog`
--

DROP TABLE IF EXISTS `backuplog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backuplog` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `usuario` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backuplog`
--

LOCK TABLES `backuplog` WRITE;
/*!40000 ALTER TABLE `backuplog` DISABLE KEYS */;
/*!40000 ALTER TABLE `backuplog` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_productos`
--

LOCK TABLES `menu_productos` WRITE;
/*!40000 ALTER TABLE `menu_productos` DISABLE KEYS */;
INSERT INTO `menu_productos` VALUES (48,'Consome de Pollo',1500,1,'thumb540e1273baa7c.jpg',50,2,1,'Consome de Pollo casero con verduras picadas.'),(49,'Palta Reina',2500,1,'thumb540e138c07fe7.jpg',50,2,1,'Palta reina rellena con atún y mayonesa.'),(50,'Cazuela de Vacuno',5000,2,'thumb540e13d462833.jpg',40,2,1,'Cazuela de Vacuno con Verduras Frescas y verduras de la temporada.'),(51,'Cazuela de Ave',4000,2,'thumb540e143110944.jpg',40,2,1,''),(52,'Prieta con Papas Cocidas',3500,2,'thumb540e14553bcec.jpg',30,2,1,''),(53,'Lomo a lo Pobre',4500,2,'thumb540e148157b45.jpg',40,2,1,''),(54,'Cafe Helado',3000,3,'thumb540e14c0ca3e3.png',50,2,1,''),(55,'Tarta de Frutas (Porción)',2500,3,'thumb540e14fb15125.jpg',24,2,1,''),(56,'Lomo Palta Mayo',3500,8,'thumb540e1e24449c3.png',40,2,1,''),(57,'Completo',2500,8,'thumb540e1e3d80085.jpg',40,2,1,'');
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
INSERT INTO `permisos` VALUES (1,'Tareas de Administracion','admin_access'),(2,'Agregar Posts','nuevo_post'),(3,'Editar Posts','editar_post'),(4,'Eliminar Post','eliminar_post'),(5,'Acceso POS','access_pos'),(6,'Acceso Estadistico','access_estadistics'),(7,'Usar POS','pos_use'),(8,'Agregar Rol','add_role'),(9,'Acceso Comanda Electronica','access_mobile'),(10,'Acceso Visualizador','access_visual');
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
INSERT INTO `permisos_role` VALUES (1,1,1),(1,2,1),(1,3,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(1,8,1),(1,9,1),(1,10,1),(2,1,1),(2,2,0),(2,3,0),(2,6,1),(3,2,1),(3,3,1),(13,1,0),(13,2,0),(13,3,0),(13,4,0),(13,10,1),(14,5,1),(14,7,1),(15,6,1),(17,9,1);
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
INSERT INTO `permisos_usuario` VALUES (1,1,1),(1,2,1),(1,3,1),(1,5,1),(1,15,0),(6,9,1);
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
INSERT INTO `snvg_pos` VALUES ('2014-09-22',NULL),('2014-09-24',NULL),('2014-09-30',NULL),('2014-10-06',NULL),('2014-10-09',NULL),('2014-10-10',NULL),('2014-10-13',NULL);
/*!40000 ALTER TABLE `snvg_pos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_retiropos`
--

DROP TABLE IF EXISTS `snvg_retiropos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_retiropos` (
  `snvg_ccod` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `snvg_cusuario` int(5) NOT NULL,
  `snvg_cdatetime` datetime NOT NULL,
  PRIMARY KEY (`snvg_ccod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_retiropos`
--

LOCK TABLES `snvg_retiropos` WRITE;
/*!40000 ALTER TABLE `snvg_retiropos` DISABLE KEYS */;
/*!40000 ALTER TABLE `snvg_retiropos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_tclog`
--

DROP TABLE IF EXISTS `snvg_tclog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_tclog` (
  `SNVG_C00101` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Folio Log',
  `SNVG_C00102` datetime NOT NULL COMMENT 'Inicio',
  `SNVG_C00103` int(11) NOT NULL COMMENT 'Monto Inicial',
  `SNVG_C00104` datetime DEFAULT NULL COMMENT 'Cierre',
  `SNVG_C00105` int(11) DEFAULT NULL COMMENT 'Monto Final',
  `SNVG_C00106` int(11) DEFAULT NULL COMMENT 'Ganancia',
  `SNVG_C00107` int(5) NOT NULL COMMENT 'Cod Usuario',
  `SNVG_C00108` int(11) DEFAULT NULL COMMENT 'Saldo Actual',
  `SNVG_C00109` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Observación Cierre de Caja',
  UNIQUE KEY `SNVG_C00101` (`SNVG_C00101`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='Log Movimiento Caja';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_tclog`
--

LOCK TABLES `snvg_tclog` WRITE;
/*!40000 ALTER TABLE `snvg_tclog` DISABLE KEYS */;
INSERT INTO `snvg_tclog` VALUES (7,'2014-09-15 20:22:20',50000,NULL,NULL,NULL,1,50000,NULL),(8,'2014-09-18 01:33:31',50000,'2014-09-18 22:22:30',20000,-30000,1,50000,''),(9,'2014-09-19 12:25:23',50000,NULL,NULL,NULL,1,50000,NULL),(10,'2014-09-20 11:37:27',50000,NULL,NULL,NULL,1,50000,NULL),(11,'2014-09-21 03:02:47',50000,NULL,NULL,NULL,1,50000,NULL),(12,'2014-09-22 00:12:45',50000,NULL,NULL,NULL,1,50000,NULL),(13,'2014-09-22 21:28:50',50000,NULL,NULL,NULL,1,50000,NULL),(14,'2014-09-24 03:20:34',50000,NULL,NULL,NULL,1,50000,NULL),(15,'2014-09-30 14:11:23',50000,NULL,NULL,NULL,1,50000,NULL),(16,'2014-10-06 20:35:40',50000,NULL,NULL,NULL,1,50000,NULL),(17,'2014-10-09 19:55:29',50000,NULL,NULL,NULL,1,50000,NULL),(18,'2014-10-10 19:10:29',50000,NULL,NULL,NULL,1,50000,NULL),(19,'2014-10-13 20:27:41',50000,NULL,NULL,NULL,1,50000,NULL);
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
  `SNVG_C00113` int(11) DEFAULT NULL COMMENT 'Monto Pago',
  `SNVG_C00114` int(1) DEFAULT NULL COMMENT 'Método de Pago',
  UNIQUE KEY `SNVG_C00101` (`SNVG_C00101`),
  UNIQUE KEY `SNVG_C00106` (`SNVG_C00106`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla registro de Transacciones.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_tt012`
--

LOCK TABLES `snvg_tt012` WRITE;
/*!40000 ALTER TABLE `snvg_tt012` DISABLE KEYS */;
INSERT INTO `snvg_tt012` VALUES (1165601240,'2014-09-22','17:57:47',1,1,'t_1165601240',2,14500,2755,17255,'','D',20000,1),(3449243089,'2014-09-19','12:26:56',2,1,'t_3449243089',0,30000,5700,35700,'','A',NULL,0),(5811993509,'2014-09-22','17:40:57',1,4,'t_5811993509',2,21000,3990,24990,'-Cazuela sin Papas.','B',25000,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Inventario Producto';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_tt013`
--

LOCK TABLES `snvg_tt013` WRITE;
/*!40000 ALTER TABLE `snvg_tt013` DISABLE KEYS */;
INSERT INTO `snvg_tt013` VALUES (1,'Aceite','Natura','BOTELLA',10,250,125000,'2014-09-22'),(2,'Salsa de Tomate','Knor','SOBRE',600,349,209400,'2014-09-10'),(3,'Coca Cola','Coca Cola','BOTELLA',500,250,125000,'2014-09-22');
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
INSERT INTO `snvg_ttable` VALUES (1,'A',1,2,7817866643,1),(2,'A',0,2,0,0),(3,'A',0,2,0,0),(4,'A',0,2,0,0),(5,'A',0,2,0,0),(6,'A',0,2,0,0),(7,'A',0,2,0,0),(1,'B',0,4,0,0),(2,'B',0,4,0,0),(3,'B',0,4,0,0),(4,'B',0,4,0,0),(5,'B',0,4,0,0),(6,'B',0,4,0,0),(1,'C',0,4,0,0),(2,'C',0,4,0,0),(3,'C',0,4,0,0),(4,'C',0,4,0,0),(5,'C',0,4,0,0),(6,'C',0,4,0,0),(1,'D',0,10,0,0),(2,'D',0,10,0,0),(3,'D',0,10,0,0),(4,'D',0,10,0,0),(5,'D',0,10,0,0),(6,'D',0,10,0,0);
/*!40000 ALTER TABLE `snvg_ttable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snvg_ttslog`
--

DROP TABLE IF EXISTS `snvg_ttslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snvg_ttslog` (
  `SNVG_C00100` int(8) unsigned NOT NULL AUTO_INCREMENT,
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
  `SNVG_C00111` int(2) DEFAULT NULL COMMENT 'Metodo Pago',
  PRIMARY KEY (`SNVG_C00100`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snvg_ttslog`
--

LOCK TABLES `snvg_ttslog` WRITE;
/*!40000 ALTER TABLE `snvg_ttslog` DISABLE KEYS */;
INSERT INTO `snvg_ttslog` VALUES (5,2147483647,'2014-09-06 19:09:44',0,69054,24000,3000,97385,0,'',NULL,NULL),(6,2066073502,'2014-09-06 19:13:59',0,0,0,0,0,3,'Mish',NULL,NULL),(7,2147483647,'2014-09-06 19:15:42',1,70000,3000,0,73000,0,'',NULL,NULL),(8,2147483647,'2014-09-06 19:17:09',0,0,0,0,0,3,'ssssssssssssssssssssssssssssssssssssss',NULL,NULL),(9,2147483647,'2014-09-06 21:09:51',0,0,0,0,0,3,'Mish',NULL,NULL),(10,2147483647,'2014-09-07 04:09:38',0,0,0,0,0,3,'ssss',NULL,NULL),(11,2147483647,'2014-09-07 04:09:44',0,0,0,0,0,3,'ssss',NULL,NULL),(12,1810488194,'2014-09-07 04:09:50',0,0,0,0,0,3,'ssss',NULL,NULL),(13,1701485428,'2014-07-14 03:55:44',6,24786,2000,0,26000,0,'',NULL,NULL),(14,1235398152,'2014-08-12 11:56:15',1,24789,2100,0,26892,0,'',NULL,NULL),(15,2147483647,'2014-09-08 16:31:22',0,0,0,0,0,3,'p',NULL,NULL),(16,2147483647,'2014-09-08 16:31:26',0,0,0,0,0,3,'p',NULL,NULL),(17,2147483647,'2014-09-09 15:09:24',0,0,0,0,0,3,'lol',NULL,NULL),(18,1767827798,'2014-09-09 15:09:31',0,0,0,0,0,3,'lol',NULL,NULL),(19,2147483647,'2014-09-09 15:09:39',0,0,0,0,0,3,'lol',NULL,NULL),(20,2147483647,'2014-09-14 14:56:51',0,0,0,0,0,3,'Mish',NULL,NULL),(21,2147483647,'2014-09-18 00:00:30',0,0,0,0,0,3,'ssssss',NULL,NULL),(22,2147483337,'2014-09-19 11:14:22',6,40000,2000,0,42000,0,'',NULL,NULL),(23,9507585818,'2014-09-22 14:16:56',6,0,0,0,0,3,'jjj',NULL,NULL),(24,1220000101,'2014-09-22 17:39:32',6,65841,14278,0,67869,0,'',NULL,NULL),(25,5811993509,'0000-00-00 00:00:00',1,21000,3990,2499,24990,0,NULL,NULL,NULL),(26,1165601240,'0000-00-00 00:00:00',1,14500,2755,1726,17255,0,NULL,NULL,NULL),(27,7817866643,'2014-10-20 16:59:05',1,8000,1520,952,9520,0,'',10000,1),(28,1265822453,'2014-10-20 17:06:30',1,12000,2280,1428,14280,0,'',15000,1),(29,3909199246,'2014-10-20 18:12:58',1,38500,7315,4582,45815,0,'',50000,1),(30,3352674516,'2014-10-20 18:30:50',1,28000,5320,3332,33320,0,'',50000,1),(31,3879496329,'2014-10-20 18:37:45',1,12000,2280,1428,14280,0,'',15000,1),(32,3158412926,'2014-10-20 18:45:11',1,8000,1520,952,9520,0,'',10000,1);
/*!40000 ALTER TABLE `snvg_ttslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_2107030125`
--

DROP TABLE IF EXISTS `t_2107030125`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_2107030125` (
  `id_prod` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `espera` int(11) DEFAULT NULL,
  `retirar` int(11) DEFAULT NULL,
  `entregado` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  UNIQUE KEY `id_prod` (`id_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_2107030125`
--

LOCK TABLES `t_2107030125` WRITE;
/*!40000 ALTER TABLE `t_2107030125` DISABLE KEYS */;
INSERT INTO `t_2107030125` VALUES (48,15,1500,22500,15,NULL,NULL,0),(49,15,2500,37500,15,NULL,NULL,0);
/*!40000 ALTER TABLE `t_2107030125` ENABLE KEYS */;
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
INSERT INTO `usuarios` VALUES (1,'Jorge Aviles','javiles','7e55608ab7198b47554612ca2acd003a470f57b3','jorge.aviles@outlook.com',1,1),(6,'Francisca Urrutia','furrutia','7e55608ab7198b47554612ca2acd003a470f57b3','francisca.urritia@outlook.com',17,1),(7,'matias','mmoreno','7e55608ab7198b47554612ca2acd003a470f57b3','javiles@outlook.cl',13,1),(9,'Jorge Aviles Moreno','jmoreno','0c76bd0b7fba4fbdda66ea56b61a16b48d33155d','jorge.aviles12@gmail.com',1,1),(10,'Javiera Ossandon','jossandon','7e55608ab7198b47554612ca2acd003a470f57b3','jorge.aviles12@gmail.com',14,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `void_motivo`
--

DROP TABLE IF EXISTS `void_motivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `void_motivo` (
  `cod_motivo` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `motivo_desc` varchar(200) NOT NULL,
  `grado_motivo` int(5) NOT NULL,
  PRIMARY KEY (`cod_motivo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `void_motivo`
--

LOCK TABLES `void_motivo` WRITE;
/*!40000 ALTER TABLE `void_motivo` DISABLE KEYS */;
INSERT INTO `void_motivo` VALUES (1,'Problema con Cliente',5),(2,'Cliente se Retira',5),(3,'Cliente descontento',6);
/*!40000 ALTER TABLE `void_motivo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-20 20:09:22
