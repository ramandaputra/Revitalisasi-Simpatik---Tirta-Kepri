/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.5.9 : Database - kepri_kinerja
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kepri_kinerja` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kepri_kinerja`;

/*Table structure for table `aspek` */

DROP TABLE IF EXISTS `aspek`;

CREATE TABLE `aspek` (
  `aspek_id` int(2) NOT NULL AUTO_INCREMENT,
  `aspek_kinerja` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`aspek_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `aspek` */

insert  into `aspek`(`aspek_id`,`aspek_kinerja`) values 
(1,'Aspek Keuangan'),
(2,'Aspek Pelayanan'),
(3,'Aspek Operasional'),
(4,'Aspek SDM');

/*Table structure for table `distribusi` */

DROP TABLE IF EXISTS `distribusi`;

CREATE TABLE `distribusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jdu` varchar(50) NOT NULL,
  `target` varchar(10) NOT NULL,
  `distribusi` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waduk` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `distribusi` */

insert  into `distribusi`(`id`,`jdu`,`target`,`distribusi`,`waktu`,`waduk`) values 
(1,'HDPE','141129','148845','2024-01-01 12:34:04','Sei Pulai'),
(2,'RPD','65597','69184','2024-01-01 12:34:32','Sei Pulai'),
(3,'PCM','126167','133065','2024-01-01 12:35:06','Sei Pulai'),
(4,'WK','22107','23316','2024-01-01 12:36:10','Sei Pulai'),
(5,'HDPE','141129','150504','2024-02-01 12:38:01','Sei Pulai'),
(6,'RPD','65597','90224','2024-02-01 12:38:27','Sei Pulai'),
(7,'PCM','126167','117345','2024-02-01 12:39:02','Sei Pulai'),
(8,'WK','22107','32921','2024-02-01 12:39:28','Sei Pulai'),
(9,'HDPE','139857','143898','2024-03-01 12:44:51','Sei Pulai'),
(10,'RPD','65006','113761','2024-03-01 12:46:35','Sei Pulai'),
(11,'PCM','125029','124404','2024-03-01 12:47:04','Sei Pulai'),
(12,'WK','21908','30133','2024-03-01 12:47:37','Sei Pulai'),
(13,'HDPE','139857','156524','2024-04-01 12:48:46','Sei Pulai'),
(14,'RPD','65006','75181','2024-04-01 12:49:16','Sei Pulai'),
(15,'PCM','125029','145942','2024-04-01 12:49:43','Sei Pulai'),
(16,'WK','21908','49950','2024-04-01 12:50:14','Sei Pulai'),
(17,'GESEK','137000','141474','2024-01-01 12:51:34','Sei Gesek'),
(18,'GESEK','137000','140688','2024-02-01 12:52:24','Sei Gesek'),
(19,'GESEK','140200','142888','2024-03-01 12:53:12','Sei Gesek'),
(20,'GESEK','140200','143030','2024-04-01 12:55:46','Sei Gesek'),
(21,'KJG','41726','40416','2024-01-01 12:55:51','Kolong Enam'),
(22,'KJG','40649','42868','2024-02-01 12:56:30','Kolong Enam'),
(23,'KJG','40649','41960','2024-03-01 12:57:15','Kolong Enam'),
(24,'KJG','41726','46447','2024-04-01 12:57:55','Kolong Enam'),
(25,'TUB','84000','98923','2024-01-01 12:58:50','Sei Jago'),
(26,'TUB','84000','93060','2024-02-01 12:59:29','Sei Jago'),
(27,'TUB','84000','84630','2024-03-01 13:00:00','Sei Jago'),
(28,'TUB','84000','96541','2024-04-01 13:00:38','Sei Jago');

/*Table structure for table `indikator` */

DROP TABLE IF EXISTS `indikator`;

CREATE TABLE `indikator` (
  `indikator_id` int(2) NOT NULL AUTO_INCREMENT,
  `aspek_id` int(2) NOT NULL,
  `indikator` varchar(100) DEFAULT NULL,
  KEY `indikator_id` (`indikator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `indikator` */

insert  into `indikator`(`indikator_id`,`aspek_id`,`indikator`) values 
(1,1,'Return on Equity'),
(2,1,'Ratio Operasi'),
(3,1,'Cash Ratio'),
(4,1,'Efisiensi Penagihan'),
(5,1,'Solvabilitas'),
(6,2,'Cakupan Pelayanan'),
(7,2,'Pertumbuhan Pelanggan'),
(8,2,'Penyelesaian Pengaduan'),
(9,2,'Kualitas Air Pelanggan'),
(10,2,'Konsumsi Air Pelanggan'),
(11,3,'Ratio Efisiensi Produksi'),
(12,3,'Air Tidak Berekening'),
(13,3,'Jam Operasi Pelayanan'),
(14,3,'Tekanan Air Pelanggan'),
(15,3,'Penggantian Meter Pelanggan'),
(16,4,'Jumlah Pegawai'),
(17,4,'Ratio Pegawai Diklat'),
(18,4,'Ratio Biaya Diklat');

/*Table structure for table `kinerja` */

DROP TABLE IF EXISTS `kinerja`;

CREATE TABLE `kinerja` (
  `aspek_id` int(2) DEFAULT NULL,
  `periode` date DEFAULT NULL,
  `indikator` varchar(200) DEFAULT NULL,
  `deskripsi1` varchar(100) DEFAULT NULL,
  `data1` decimal(50,0) DEFAULT NULL,
  `deskripsi2` varchar(100) DEFAULT NULL,
  `data2` decimal(50,0) DEFAULT NULL,
  `hasil` varchar(10) DEFAULT NULL,
  `score` varchar(3) DEFAULT NULL,
  `bobot` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kinerja` */

insert  into `kinerja`(`aspek_id`,`periode`,`indikator`,`deskripsi1`,`data1`,`deskripsi2`,`data2`,`hasil`,`score`,`bobot`) values 
(1,'2024-01-01','1','Laba Rugi Bersih',-120921083,'Jumlah Ekuitas',92459569324,'-0,02','1.0',NULL),
(1,'2024-01-01','2','Biaya Operasi',2756693639,'Pendapatan Operasi',2635772556,'1,05','1.0',NULL),
(1,'2024-01-01','3','Kas',8388120715,'Hutang Lancar',684946056,'1224,64','5.0',NULL),
(1,'2024-01-01','4','Penerimaan Rekening Air',2021943450,'Rekening Air Ditagihkan',2485824050,'81,34','3.0',NULL),
(1,'2024-01-01','5','Total Aktiva',94476838614,'Total Hutang',2017269290,'4683,40','5.0',NULL),
(2,'2024-01-01','6','Jumlah Penduduk Terlayani',123201,'Jumlah Penduduk Wilayah Pelayanan',267011,'46.14','3.0','0.15'),
(2,'2024-01-01','7','Pelanggan bualan ini - Pelanggan Bulan Lalu',27,'Pelanggan Bulan Lalu (Aktif dan Putus)',30645,NULL,NULL,NULL),
(2,'2024-01-01','8','Pengaduan Selesai',367,'Jumlah Pengaduan',401,NULL,NULL,NULL),
(2,'2024-01-01','9','Jumlah Uji Kualitas yang Memenuhi Syarat',0,'Jumlah yang Diuji',13,NULL,NULL,NULL),
(2,'2024-01-01','10','Air Terjual Domestik',353026,'Pelanggan Domestik',22375,NULL,NULL,NULL),
(1,'2024-02-01','1','Laba Rugi Bersih',-14232668,'Jumlah Ekuitas',92444917756,'-0,13','1.0',NULL),
(1,'2024-02-01','2','Biaya Operasi',2687864718,'Pendapatan Operasi',2673632050,'1,01','1.0',NULL),
(1,'2024-02-01','3','Kas',8553588504,'Utang Lancar',1220758166,'700,68','5.0',NULL),
(1,'2024-02-01','4','Penerimaan Rekening Air',2045198350,'Rekening Air Ditagihkan',2543355150,'80,41','3.0',NULL),
(1,'2024-02-01','5','Total Aktiva',94549907843,'Total Hutang',2104990087,'4491,70','5.0',NULL),
(1,'2024-04-01','1','Laba Rugi Bersih',211093495,'Jumlah Ekuitas',91773199073,'0.23','2.0','0.11'),
(1,'2024-04-01','2','Biaya Operasi',2798167855,'Pendapatan Operasi',3009261350,'0.93','2.0','0.11'),
(1,'2024-04-01','3','Kas',8454108887,'Hutang Lancar',1117846734,'756.29','5.0','0.28'),
(1,'2024-04-01','4','Penerimaan Rekening Air',2033059350,'Rekening Air Ditagihkan',2882740450,'70.53','1.0','0.06'),
(1,'2024-04-01','5','Total Aktiva',93775277728,'Total Hutang',2002078655,'4683.90','5.0','0.15'),
(2,'2024-02-01','6','Jumlah Penduduk Terlayani',123356,'Jumlah Penduduk Wilayah Pelayanan',267011,'46.20','3.0','0.15'),
(1,'2024-04-01','1','Laba Rugi Bersih',211093495,'Jumlah Ekuitas',91773199073,'0.23','2.0','0.11'),
(1,'2024-04-01','2','Biaya Operasi',2798167855,'Pendapatan Operasi',3009261350,'0.93','2.0','0.11'),
(1,'2024-04-01','3','Kas',8454108887,'Hutang Lancar',1117846734,'756.29','5.0','0.28'),
(1,'2024-04-01','4','Penerimaan Rekening Air',2033059350,'Rekening Air Ditagihkan',2882740450,'70.53','1.0','0.06'),
(1,'2024-04-01','5','Total Aktiva',93775277728,'Total Hutang',2002078655,'4683.90','5.0','0.15');

/*Table structure for table `kualitas_air` */

DROP TABLE IF EXISTS `kualitas_air`;

CREATE TABLE `kualitas_air` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` datetime DEFAULT NULL,
  `tds` varchar(100) DEFAULT NULL,
  `ph` varchar(100) DEFAULT NULL,
  `waduk` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kualitas_air` */

insert  into `kualitas_air`(`id`,`waktu`,`tds`,`ph`,`waduk`) values 
(1,'2024-05-01 08:00:00','12.5','12.5','Sei Pulai'),
(2,'2024-05-01 09:00:00','13.0','12.5','Sei Pulai'),
(3,'2024-05-01 10:00:00','12.7','12.5','Sei Pulai'),
(4,'2024-05-01 11:00:00','13.2','12.5','Sei Pulai'),
(5,'2024-05-01 12:00:00','12.9','12.5','Sei Pulai'),
(6,'2024-05-01 13:00:00','13.4','12.5','Sei Gesek'),
(7,'2024-05-01 14:00:00','12.8','12.5','Sei Jago'),
(8,'2024-05-01 15:00:00','13.5','12.5','Kolong Enam');

/*Table structure for table `produksi` */

DROP TABLE IF EXISTS `produksi`;

CREATE TABLE `produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipa` varchar(50) NOT NULL,
  `target` varchar(10) NOT NULL,
  `produksi` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `waduk` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `produksi` */

insert  into `produksi`(`id`,`ipa`,`target`,`produksi`,`waktu`,`waduk`) values 
(1,'','371700','432234','2024-01-01 10:04:39','Sei Pulai'),
(2,'','140000','142995','2024-01-01 10:06:25','Sei Gesek'),
(3,'','371700','447446','2024-02-01 11:48:43','Sei Pulai'),
(4,'','388400','475146','2024-03-01 11:49:44','Sei Pulai'),
(5,'','388400','462795','2024-04-01 11:50:16','Sei Pulai'),
(6,'','140000','142653','2024-02-01 11:51:03','Sei Gesek'),
(7,'','123300','143510','2024-03-01 11:52:19','Sei Gesek'),
(8,'','123300','144157','2024-04-01 11:53:22','Sei Gesek'),
(9,'','45889','47699','2024-01-01 11:54:24','Kolong Enam'),
(10,'','43000','48888','2024-02-01 11:54:50','Kolong Enam'),
(11,'','43000','46657','2024-03-01 11:55:58','Kolong Enam'),
(12,'','45899','51812','2024-04-01 12:04:02','Kolong Enam'),
(13,'','85700','99912','2024-01-01 12:26:49','Sei Jago'),
(14,'','85700','93990','2024-02-01 12:27:33','Sei Jago'),
(15,'','85700','86322','2024-03-01 12:28:07','Sei Jago'),
(16,'','85700','98471','2024-04-01 12:30:00','Sei Jago');

/*Table structure for table `status_pompa` */

DROP TABLE IF EXISTS `status_pompa`;

CREATE TABLE `status_pompa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pompa` varchar(10) DEFAULT NULL,
  `status` enum('Baik','Mati') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `waduk` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `status_pompa` */

insert  into `status_pompa`(`id`,`pompa`,`status`,`waktu`,`waduk`) values 
(1,'PSAB','Baik','2024-06-01 13:24:42','Sei Pulai'),
(2,'PCM','Baik','2024-06-01 13:24:50','Sei Pulai'),
(3,'RPD','Baik','2024-06-01 13:28:53','Sei Pulai'),
(4,'HDPE','Baik','2024-06-01 13:28:58','Sei Pulai');

/*Table structure for table `tma` */

DROP TABLE IF EXISTS `tma`;

CREATE TABLE `tma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tma` float NOT NULL,
  `waduk` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tma` */

insert  into `tma`(`id`,`waktu`,`tma`,`waduk`) values 
(1,'2024-05-01 08:00:00',3.89,'Sei Pulai'),
(2,'2024-05-02 09:00:00',3.88,'Sei Pulai'),
(3,'2024-05-03 10:00:00',3.87,'Sei Pulai'),
(4,'2024-05-04 11:00:00',3.85,'Sei Pulai'),
(5,'2024-05-05 12:00:00',3.89,'Sei Pulai'),
(6,'2024-05-01 13:00:00',13.4,'Sei Gesek'),
(7,'2024-05-01 14:00:00',12.8,'Sei Jago'),
(8,'2024-05-02 15:00:00',13.5,'Kolong Enam'),
(9,'2024-05-06 08:00:00',3.88,'Sei Pulai'),
(10,'2024-05-07 09:00:00',3.86,'Sei Pulai'),
(11,'2024-05-08 10:00:00',3.9,'Sei Pulai'),
(12,'2024-05-09 11:00:00',3.9,'Sei Pulai'),
(13,'2024-05-10 12:00:00',3.88,'Sei Pulai'),
(14,'2024-05-01 13:00:00',13.4,'Sei Gesek'),
(15,'2024-05-01 14:00:00',12.8,'Sei Jago'),
(16,'2024-05-01 15:00:00',13.5,'Kolong Enam');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(7) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nik`,`nama`,`password`,`created_at`) values 
(1,'020233','Farhan','827ccb0eea8a706c4c34a16891f84e7b','2024-05-30 13:47:51');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
