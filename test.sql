/*
SQLyog Ultimate v8.82 
MySQL - 8.0.30 : Database - test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `test`;

/*Table structure for table `alumnos` */

DROP TABLE IF EXISTS `alumnos`;

CREATE TABLE `alumnos` (
  `matricula` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `alumnos` */

insert  into `alumnos`(`matricula`,`nombre`,`fecha_registro`) values ('CA04','carlos mancia','2024-05-03'),('JN12','juan martinez','2024-06-01'),('LO46','Manuel Villa','2024-06-02'),('LO74','Manuel Pacheco','2024-06-02'),('LP12','Juan Valle','2024-05-30'),('PO55','Maria Villeda','2024-06-01');

/*Table structure for table `asignaciones` */

DROP TABLE IF EXISTS `asignaciones`;

CREATE TABLE `asignaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clave` int DEFAULT NULL,
  `matricula` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_asignaciones` (`clave`),
  KEY `FK_asignaciones2` (`matricula`),
  CONSTRAINT `FK_asignaciones` FOREIGN KEY (`clave`) REFERENCES `materias` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_asignaciones2` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `asignaciones` */

insert  into `asignaciones`(`id`,`clave`,`matricula`) values (19,8542,'PO55'),(25,8549,'LO46');

/*Table structure for table `materias` */

DROP TABLE IF EXISTS `materias`;

CREATE TABLE `materias` (
  `clave` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `materias` */

insert  into `materias`(`clave`,`nombre`) values (1425,'ingles'),(1526,'matemática'),(8542,'lenguaje'),(8549,'sociales');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
