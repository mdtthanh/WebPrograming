-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for product
CREATE DATABASE IF NOT EXISTS `product` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `product`;

-- Dumping structure for table product.tblproduct
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `platforms` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table product.tblproduct: ~5 rows (approximately)
INSERT INTO `tblproduct` (`id`, `name`, `code`, `publisher`, `platforms`, `image`, `price`) VALUES
	(1, 'Microsoft Access 2020', '1', 'Microsoft', 'Windows', 'img/phan-mem-access.jpeg', 20.00),
	(2, 'Microsoft Office Word 2020', '2', 'Microsoft', 'Windows', 'img/Word-2020.jpg', 90.00),
	(3, 'Microsoft Office Excel 2020', '3', 'Apple', 'MacOS', 'img/excel-2020.png', 80.00),
	(4, 'Microsoft Office PowerPoimt 2020', '4', 'Microsoft', 'Windows', 'img/powerpoint-2020.png', 50.00),
	(5, 'Oracle 2020', '5', 'Microsoft', 'Windows', 'img/Oracle-2020.jpg', 60.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
