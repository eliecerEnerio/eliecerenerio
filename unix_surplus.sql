/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.31 : Database - unix_surplus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`unix_surplus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `unix_surplus`;

/*Table structure for table `chasis` */

DROP TABLE IF EXISTS `chasis`;

CREATE TABLE `chasis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chassis_sku` varchar(255) DEFAULT NULL,
  `chassis_title` varchar(255) DEFAULT NULL,
  `form_factor` varchar(255) DEFAULT NULL,
  `backplane` varchar(255) DEFAULT NULL,
  `motherboard` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `chasis` */

insert  into `chasis`(`id`,`chassis_sku`,`chassis_title`,`form_factor`,`backplane`,`motherboard`) values 
(1,'1U-R630-8BS-H730','Dell 1U R630 Base 8 Bay SFF 4x 1G H730 750W','Proprietary','SAS3','R630'),
(2,'1U-X9SCI-LN4F-4BLTQ-1xE3-1270V2','1U X9SCI-LN4F 4BAY LFF TQ 1xE3-1270V2 SERVER 2Rx8 Edimm Mem Single PS','ATX','TQ','X9SCI-LN4F'),
(3,'1U-X10DRD-LTP-4BL-TQ-2x10GSFP-2PS','1U X10DRD-LTP 4BAY LFF SERVER 2 2x10G SFP+ No 1GB NIC 8 memory slots 1x PCI-E 3.0 x8 Full-height 2PS','EATX','TQ','X10DRD-LTP'),
(4,'1U-X9SCI-LN4F-4BLTQ-1xE3-1270V1','1U X9SCI-LN4F 4BAY LFF TQ 1xE3-1270 V1 SERVER 2Rx8 Edimm Mem Single PS','ETX','TQ','X9SCI-LN4F'),
(5,'2U-X10DRI-LN4+-12BLS3','2U X10DRi-LN4+ 12BAY LFF SAS3 Single Exp 24 Mem Slots 2x 920Watt SQ','EEATX','SAS3','X10DRi-LN4+'),
(6,'Linux 1141','LN-009','AS','SA','LIX');

/*Table structure for table `motherboards` */

DROP TABLE IF EXISTS `motherboards`;

CREATE TABLE `motherboards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chasis_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `cpu_family` varchar(255) DEFAULT NULL,
  `memory_type` varchar(255) DEFAULT NULL,
  `form_factor` varchar(255) DEFAULT NULL,
  `ob_nick` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `motherboards` */

insert  into `motherboards`(`id`,`chasis_id`,`model`,`cpu_family`,`memory_type`,`form_factor`,`ob_nick`) values 
(1,1,'R630','E5-2600 V3V4','DDR4','Proprietary','4x RJ45 1GBase-T Mezzanine'),
(2,2,'X9SCI-LN4F','E3-1200 V1V2V3V4','DDR3-x8','ATX','4x RJ45 1GBase-T'),
(3,3,'X10DRi-LN4+','E5-2400 V3V4','DDR4','EEATX','2x RJ45 1GBase-T'),
(4,4,'X10DRD-LTP','E5-2600 V3V4','DDR4','EATX','2x RJ45 1GBase-T'),
(5,6,'UNIX','0.5','DDR5','EATX','2x RJ45 1GBase-T');

/*Table structure for table `prices` */

DROP TABLE IF EXISTS `prices`;

CREATE TABLE `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motherboard_id` int(11) DEFAULT NULL,
  `par` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `prices` */

insert  into `prices`(`id`,`motherboard_id`,`par`,`price`) values 
(1,1,'R630','100'),
(2,2,'X9SCI-LN4F','200'),
(3,3,'X10DRi-LN4+','300'),
(4,4,'X10DRD-LTP','400'),
(5,5,'LINUX-SERVER','1000');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
