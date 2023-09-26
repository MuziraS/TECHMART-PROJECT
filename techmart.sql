-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2023 at 05:55 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `product` int NOT NULL,
  `user` int NOT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`product`,`user`),
  KEY `cart_FK2` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(35) NOT NULL,
  `image_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `image_name`) VALUES
(1, 'laptops', 'laptop.jpeg'),
(2, 'monitors', 'monitor.jpeg'),
(3, 'printers', 'printer.jpeg'),
(4, 'tablets', 'tablet.png'),
(5, 'head phones', 'headphones.jpeg'),
(6, 'wearables', 'applewatch.jpeg'),
(7, 'phones', 'phone.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `current_price` int NOT NULL,
  `previous_price` int DEFAULT NULL,
  `image_name` varchar(100) NOT NULL,
  `qty` int NOT NULL,
  `category` int NOT NULL,
  `tag` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_FK1` (`tag`),
  KEY `product_FK2` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `current_price`, `previous_price`, `image_name`, `qty`, `category`, `tag`) VALUES
(1, 'Hp Elitebook 820(12.5-inch,Core i5,8GB RAM,500 GB,Refurbished) - Black', 750000, 1200000, 'h.jpeg', 20, 1, 1),
(33, 'we', 34, 12, 'techMart.svg', 23, 4, 3),
(3, 'Lenovo V14 Intel Celeron 4GB RAM 1TB HDD 14.\" Win 10 - Grey', 950000, 1300000, 'macoffer.jpeg', 3, 1, 1),
(4, 'Lenovo Thinkpad Refurbished 11\'ThinkPad X130e AMD 4GBRAM 320GB HDD -Black', 416000, 789000, 'macbook.jpeg', 23, 1, 2),
(6, 'Lenovo Thinkpad Refurbished 11e Mini Laptop,11.6 Inch Screen, 4GB RAM,500GB HDD - Black', 499000, 600000, 'The Newest MacBook Air 2022 Mockups 10 Professional Mockups;.jpg', 25, 1, 4),
(7, 'Hp Refurbished 840 14 Inches Fast 12GB RAM 1000GB/ 1TB HDD - Black', 1600000, 1900000, 'Hp Laptop.jpg', 38, 1, NULL),
(32, 'dff', 20, 23, 'options .png', 2, 5, 1),
(11, 'Konica Minolta KONICA BIZHUB C454 COLORED PRINTER/SCANNER', 750000, 900000, 'Brother Dcp-L3550Cdw A4 Colour Wireless Led 3-In-1 Printer - White -.jpg', 5, 3, 4),
(12, 'IPS Screen Monitor for CPU GPU RAM HDD Computer Monitor Compact for PC', 117000, 175000, 'ASUS VG248QE 24_ Full HD 1920x1080 144Hz 1ms HDMI Gaming Monitor.jpg', 20, 2, NULL),
(13, 'SAMSUNG T350 Series 22-Inch FHD 1080p Computer Monitor, 75Hz, IPS Panel, HDMI, VGA (D-Sub), 3-Sided Border-Less, FreeSync (LF22T350FHNXZA)', 300000, 370000, 'Samsung Monitor.jpg', 20, 2, 4),
(14, 'ViewSonic VA2447-MHU 24 Inch Full HD 1080p USB C Monitor with Ultra-Thin Bezel, Adaptive Sync, 75Hz, Eye Care, 15W Charging, HDMI, and VGA Inputs for Home and Office', 370000, 400000, 'BenQ - Designer PD2700Q 27_ IPS LED HD Monitor - Black.jpg', 10, 2, NULL),
(15, 'Acer KB272 EBI 27\" IPS Full HD (1920 x 1080) Zero-Frame Gaming Office Monitor | AMD FreeSync Technology | Up to 100Hz Refresh | 1ms (VRB) | Low Blue Light | Tilt | HDMI & VGA Ports,Black', 230000, 300000, 'ASUS VG248QE 24_ Full HD 1920x1080 144Hz 1ms HDMI Gaming Monitor.jpg', 20, 2, NULL),
(16, 'SAMSUNG T350 Series 22-Inch FHD 1080p Computer Monitor, 75Hz, IPS Panel, HDMI, VGA (D-Sub), 3-Sided Border-Less, FreeSync (LF22T350FHNXZA)', 399000, 415000, 'HP led monitor.jpg', 10, 2, 2),
(17, 'Redmi Note 12 5G 6.67\" 6GB RAM 128GB ROM 48MP 5000mAh - Green', 965000, 1200000, '1.jpg', 5, 7, NULL),
(18, 'Nokia 105 DS 1.8\' Dual Sim, FM Radio, Torch light, 800MAH African Edition - Black', 53000, 70000, '2.jpg', 50, 7, NULL),
(19, 'Infinix Hot 12i - 6.6\" 2GB RAM 64GB ROM 13MP 5000mAh - Black', 431000, 700000, '3.jpg', 30, 7, 1),
(20, 'Samsung Galaxy A13 - 6.6\" 4GB RAM 128GB ROM 50MP 5000mAh - Blue', 700000, 900000, '4.jpg', 5, 7, NULL),
(21, 'Sony ZX Series Wired On-Ear Headphones, Black MDR-ZX110, 7.87 x 1.81 x 5.87 inches', 50000, 75000, 'Shure SRH550DJ Professional Quality Headphones.jpg', 10, 5, NULL),
(22, 'Panasonic Headphones, On-Ear Lightweight Earphones with XBS for Extra Bass and Clear, Natural Sound, 3.5mm Jack for Phones and Laptops, Work from Home - RP-HT21 (Black & Silver)', 120000, 153000, 'Ashdown OV-1-B-CONNECT Over-ear Active Noise Canceling Bluetooth Headphones - White.jpg', 40, 5, NULL),
(23, 'Beats Studio Buds – True Wireless Noise Cancelling Earbuds – Compatible with Apple & Android, Built-in Microphone, IPX4 Rating, Sweat Resistant Earphones, Class 1 Bluetooth Headphones - Moon Gray', 175000, 200000, '100.jpg', 50, 5, NULL),
(24, 'House of Marley Positive Vibration 2: Over-Ear Wired Headphones with Microphone, Plush Ear Cushions, and Sustainable Materials (Black)', 150000, 185000, 'Sorry buddy.jpg', 20, 5, 2),
(25, 'Amazfit Band 5 Activity Fitness Tracker with Alexa Built-in, 15-Day Battery Life, Blood Oxygen, Heart Rate, Sleep & Stress Monitoring, 5 ATM Water Resistant, Fitness Watch for Men Women Kids, Black', 200000, 250000, 'Wearable Devices_ How Much Tech Fits on Your Wrist_.jpg', 20, 6, 1),
(26, 'MUSE 2: The Brain Sensing Headband - Meditation Tracker - Multi Sensor Headset Monitor with Responsive Sound Feedback Guidance from Brain Wave, Heart, Body & Breath Activity', 200000, 215000, 'brain_sense.png', 25, 6, 0),
(27, 'Vufine VUF-110 Wearable Display', 375000, 400000, 'Exploring the Google Glass UX _ UX Booth.jpg', 20, 6, 2),
(28, 'Nokia T20 - 10.4\" 4GB RAM 64GB ROM 8MP 8200mAh - Deep Ocean', 500000, 570000, '20 Best Digital Drawing Tablets That Will Satisfy Your Artistic Soul.jpg', 20, 5, 4),
(29, 'SAMSUNG Galaxy Tab A8 10.5” 64GB Android Tablet, LCD Screen, Kids Content, Smart Switch, Long Lasting Battery, US Version, 2022, Silver, Amazon Exclusive', 780000, 900000, 'Samsung Galaxy Tab S6 Lite Tablet with S Pen, Android, 64GB, 4GB RAM, Wi-Fi, 10_4.jpg', 12, 4, 2),
(30, 'Lenovo Tab M8 Tablet, HD Android Tablet, Quad-Core Processor, 2GHz, 32GB Storage, Full Metal Cover, Long Battery Life, Android 10 Pie, Iron Grey', 800000, 820000, 'Tablet 4G Mediacom.jpg', 12, 4, 4),
(31, 'Apple iPad (9th Generation): with A13 Bionic chip, 10.2-inch Retina Display, 64GB, Wi-Fi, 12MP front/8MP Back Camera, Touch ID, All-Day Battery Life – Space Gray', 900000, 1300000, '$50 or Less_ Low Cost Graphics Tablet Comparison -.jpg', 25, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag_name`) VALUES
(1, 'flash sales'),
(2, 'top picks'),
(3, 'phones exclusive'),
(4, 'best offers'),
(5, 'new arrivals');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
