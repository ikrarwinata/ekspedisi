/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ ekspedisi /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE ekspedisi;

DROP TABLE IF EXISTS admin;
CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `hp` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS deliver;
CREATE TABLE `deliver` (
  `id` varchar(25) NOT NULL,
  `resi` varchar(50) NOT NULL,
  `username_kurir` varchar(50) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `keterangan` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `harga` bigint(15) NOT NULL,
  `hp` varchar(25) DEFAULT NULL,
  `valid` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS kurir;
CREATE TABLE `kurir` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `hp` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS master;
CREATE TABLE `master` (
  `resi` varchar(50) NOT NULL,
  `id_pickup` varchar(25) DEFAULT NULL,
  `id_olshop` varchar(25) NOT NULL,
  `foto` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `harga` float NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`resi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS olshop;
CREATE TABLE `olshop` (
  `id` varchar(25) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS pickup;
CREATE TABLE `pickup` (
  `id` varchar(25) NOT NULL,
  `id_olshop` varchar(25) NOT NULL,
  `jumlah_barang` int(11) NOT NULL DEFAULT 0,
  `kurir` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO admin(username,password,nama,hp,email) VALUES('admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','admin');


INSERT INTO kurir(username,password,nama,hp,email) VALUES('kurir1','25d55ad283aa400af464c76d713c07ad','kurir1','kurir1','kurir1');


INSERT INTO olshop(id,nama,alamat) VALUES('OSP1633952497','Olshop1',X'6a6a6a6a6a6a');