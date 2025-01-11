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


-- Dumping database structure for vege_market
CREATE DATABASE IF NOT EXISTS `vege_market` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `vege_market`;

-- Dumping structure for table vege_market.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table vege_market.products: ~0 rows (approximately)
INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `image`, `stock`, `created_at`, `updated_at`) VALUES
	(1, 'Buah', 'buahahahaha', 12.00, 'products/SFF9u49jlkLlilgBywAVlivSFBNKQNeg1mhzXWco.jpg', 8, '2025-01-06 18:33:44', '2025-01-06 19:59:04');

-- Dumping structure for table vege_market.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','canceled') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transaction_id`),
  KEY `user_id` (`user_id`,`product_id`) USING BTREE,
  KEY `transactions_ibfk` (`product_id`),
  CONSTRAINT `transactions_ibfk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table vege_market.transactions: ~1 rows (approximately)
INSERT INTO `transactions` (`transaction_id`, `user_id`, `product_id`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
	(1, 6, 1, 12, 144.00, 'completed', '2025-01-06 19:59:04', '2025-01-06 20:59:15');

-- Dumping structure for table vege_market.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table vege_market.users: ~3 rows (approximately)
INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(2, 'admin', 'admin@admin.com', '$2y$12$g75FfBtY2/KzeK9.m6VQ2e2F3XwXx8ItfDuFNkH16FYl3W4rf3A/.', 'admin', '2025-01-06 18:24:17', '2025-01-06 18:30:58'),
	(3, 'admin1', 'admin1@admin.com', '$2y$12$J3xuj8VMxUC7KfefRHZvGOld2qIr6djjVPKN.WPGl3k2Vj.sMRjdK', 'customer', '2025-01-06 18:25:14', '2025-01-06 18:25:14'),
	(6, 'Rico', 'rico@email.com', '$2y$12$p682gXL9wZrJGtEoOKbc7uAt4Fq6LNdzBHUcD3F0sCyRE4mSpRbse', 'customer', '2025-01-06 19:10:28', '2025-01-06 19:10:28');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
