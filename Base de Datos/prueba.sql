/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.22-MariaDB : Database - prueba
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `prueba`;

/*Table structure for table `informacion_usuario` */

DROP TABLE IF EXISTS `informacion_usuario`;

CREATE TABLE `informacion_usuario` (
  `id_Usuario` bigint(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `tipo_documento` int(11) DEFAULT NULL,
  `numero_documento` bigint(110) DEFAULT NULL,
  PRIMARY KEY (`id_Usuario`),
  KEY `tipo_documento` (`tipo_documento`),
  CONSTRAINT `informacion_usuario_ibfk_1` FOREIGN KEY (`tipo_documento`) REFERENCES `tipo_documento` (`id_tipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `informacion_usuario` */

insert  into `informacion_usuario`(`id_Usuario`,`nombre`,`apellido`,`tipo_documento`,`numero_documento`) values (1,'Dehison','Arango',2,1000161172),(2,'Alejandro','Rodriguez',2,12345123152),(3,'Maria','Cuervo',2,232342451),(4,'Valentina','Acevedo',1,45367162),(5,'Camilo','Acevedo',1,1234567),(6,'Camila','Lopez Rivera',1,123213213132),(7,'Laura Maria','Forest Marin',2,486261782673),(9,'Sean','Fire',2,3928712231),(10,'Paul Walker','Marin Becerra',2,90103049912),(12,'Valery','Forest Marin',2,237743636627),(13,'Tatiana','Pinzon Ramirez',2,439921037721),(14,'Laura','Ricaute',1,1233423523),(17,'Valentina','lopez',1,222123441),(19,'Camila Andrea','Ramirez Moreno',2,9873271623),(22,'Dereck','Ibarguen',2,115431412),(24,'Dehider','Arango',2,145633213),(25,'Diana','Hernandez',3,234412466),(26,'Valentina','Galindo',3,224523126),(28,'Diego','Rodriguez',2,10002348912),(29,'Oscar','Cuervo',2,1234567),(30,'Camila','Acevedo Lopez',1,213214);

/*Table structure for table `tipo_documento` */

DROP TABLE IF EXISTS `tipo_documento`;

CREATE TABLE `tipo_documento` (
  `id_tipoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `TDocumento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_tipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tipo_documento` */

insert  into `tipo_documento`(`id_tipoDocumento`,`TDocumento`) values (1,'Tarjeda de Identidad'),(2,'Cedula Ciudadana'),(3,'Cedula Extranjera');

/*Table structure for table `ubicacion` */

DROP TABLE IF EXISTS `ubicacion`;

CREATE TABLE `ubicacion` (
  `id_ubicacion` bigint(255) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(255) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  PRIMARY KEY (`id_ubicacion`),
  KEY `ubicacion` (`id_usuario`),
  CONSTRAINT `ubicacion` FOREIGN KEY (`id_usuario`) REFERENCES `informacion_usuario` (`id_Usuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `ubicacion` */

insert  into `ubicacion`(`id_ubicacion`,`id_usuario`,`latitud`,`longitud`) values (1,1,-74.1592163,4.6402618),(2,2,-74.1592163,4.6402618),(3,3,-74.1592163,4.6402618),(4,4,-74.1592163,4.6402618),(5,5,4.6586601,4.6402618),(6,6,4.6586601,-74.1592163),(7,7,4.6586601,-74.1592163),(9,9,-74.1592163,4.6586601),(10,10,-74.1592163,4.6586601),(12,12,-74.1592163,4.6586601),(13,13,-74.1592163,4.6586601),(14,14,-74.1592163,4.6586601),(17,17,-74.1592163,4.6586601),(19,19,-74.1592163,4.6586601),(22,22,-74.1592163,4.6586601),(24,24,-74.1592163,4.6586601),(25,25,0,0),(26,26,-74.1592163,4.6586601),(28,28,0,0),(29,29,-74.03568987891899,4.746954485594469),(30,30,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
