-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2020 at 06:12 PM
-- Server version: 5.1.62
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+05:30";



--
-- Database: `foodorder`
--

-- --------------------------------------------------------
CREATE DATABASE `foodorder` DEFAULT CHARACTER SET utf8;
USE `foodorder`;
--
-- Table structure for table `CANTEENS`
--

CREATE TABLE IF NOT EXISTS `CANTEENS` (
  `R_ID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `M_ID` varchar(30) NOT NULL,
  PRIMARY KEY (`R_ID`),
  UNIQUE KEY `M_ID_2` (`M_ID`),
  KEY `M_ID` (`M_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `CANTEENS`
--

INSERT INTO `CANTEENS` (`R_ID`, `name`, `email`, `contact`, `address`, `M_ID`) VALUES
(1, 'V-LOUNGE', 'vlounge@vit.edu.in', '9837636736', 'D-Block', 'akash12');

-- --------------------------------------------------------

--
-- Table structure for table `CONTACT`
--

CREATE TABLE IF NOT EXISTS `CONTACT` (
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mobile` varchar(250) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CONTACT`
--

INSERT INTO `CONTACT` (`Name`, `Email`, `Mobile`, `Subject`, `Message`) VALUES
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('BIRJU KUMAR', 'ckj40856@gmail.com', '8903079750', 'asd', 'asdasdasd'),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'asd', 'hfgdsfsx'),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'sa', ''),
('BIRJU KUMAR', 'ckj40856@gmail.com', '8903079750', 'asd', 'asdasdasd'),
('CHANDAN KUMAR', 'ckj40856@gmail.com', '9487810674', 'asd', 'hfgdsfsx'),
('Ghjh', 'hugv@gh.kkk', '8968', 'Vhh', 'Fhbb');

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE IF NOT EXISTS `CUSTOMER` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CUSTOMER`
--

INSERT INTO `CUSTOMER` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('pratik', 'Pratik Bhoir', 'pratik@vit.edu.in', '8376363736', 'H no 123, building, kalyan', 'pratik@123'),
('12akash34', 'Samaleti Akash Umesh', 'akashusamaleti19@gmail.com', '9156595153', '483, dyawanpelli bldg, 3rd floor, 4th room, Near g', 'Akash@123');

-- --------------------------------------------------------

--
-- Table structure for table `FOOD`
--

CREATE TABLE IF NOT EXISTS `FOOD` (
  `F_ID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'ENABLE',
  PRIMARY KEY (`F_ID`,`R_ID`),
  KEY `R_ID` (`R_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `FOOD`
--

INSERT INTO `FOOD` (`F_ID`, `name`, `price`, `description`, `R_ID`, `images_path`, `options`) VALUES
(96, 'French fries', 75, 'Pure veg and tasty', 1, 'images/frenchfries.jpg', 'ENABLE'),
(97, 'Salad', 30, 'Tasty', 1, 'images/salad_30.jpg', 'ENABLE'),
(94, 'Cake', 200, 'A moment of friendship', 1, 'images/cake_300.jpg', 'ENABLE'),
(95, 'Vadapav', 25, 'Desi breakfast', 1, 'images/vadapav_15.jpg', 'ENABLE'),
(92, 'Tea', 10, 'Taaza', 1, 'images/tea_10.jpg', 'ENABLE'),
(93, 'Coffee', 15, 'Taaza', 1, 'images/coffee.jpg', 'ENABLE'),
(90, 'Samosa', 25, 'Crispy, masaledar', 1, 'images/samosa.jpg', 'ENABLE'),
(89, 'Idli Sambhar', 30, 'Puffy, tasty idli', 1, 'images/idli_15.jpg', 'ENABLE'),
(91, 'Veg Soup', 30, 'Hot and spicy', 1, 'images/soup_30.jpg', 'ENABLE'),
(87, 'Pizza', 80, 'Veggie and tasty', 1, 'images/_pizza_100.jpg', 'ENABLE'),
(88, 'Noodles', 50, 'Hot and spicy', 1, 'images/noodles_50.jpg', 'ENABLE'),
(1, 'Fried Rice', 50, 'Hot and spicy', 1, 'images/friedrice_50.jpg', 'ENABLE');

-- --------------------------------------------------------

--
-- Table structure for table `MANAGER`
--

CREATE TABLE IF NOT EXISTS `MANAGER` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MANAGER`
--

INSERT INTO `MANAGER` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('akash12', 'Akash Samaleti', 'akash@gm.com', '4653577644', 'Bhiwandi', 'akash@124');

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE IF NOT EXISTS `ORDERS` (
  `order_ID` int(30) NOT NULL AUTO_INCREMENT,
  `F_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  `R_ID` int(30) NOT NULL,
  PRIMARY KEY (`order_ID`),
  KEY `F_ID` (`F_ID`),
  KEY `username` (`username`),
  KEY `R_ID` (`R_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`order_ID`, `F_ID`, `foodname`, `price`, `quantity`, `order_date`, `username`, `R_ID`) VALUES
(179, 87, 'Pizza', 80, 2, '2020-10-20 00:00:00', '12akash34', 1),
(178, 1, 'Fried Rice', 50, 2, '2020-10-20 00:00:00', '12akash34', 1),
(177, 96, 'French fries', 75, 2, '2020-10-20 00:00:00', '12akash34', 1),
(176, 92, 'Tea', 10, 5, '2020-10-20 00:00:00', '12akash34', 1),
(173, 90, 'Samosa', 25, 4, '2020-10-20 00:00:00', 'pratik', 1),
(172, 88, 'Noodles', 50, 3, '2020-10-20 00:00:00', 'pratik', 1),
(171, 1, 'Fried Rice', 50, 2, '2020-10-20 00:00:00', '12akash34', 1),
(170, 87, 'Pizza', 80, 2, '2020-10-20 00:00:00', '12akash34', 1),
(180, 1, 'Fried Rice', 50, 1, '2020-10-20 16:04:39', '12akash34', 1),
(181, 1, 'Fried Rice', 50, 1, '2020-10-20 16:05:49', '12akash34', 1),
(182, 87, 'Pizza', 80, 1, '2020-10-20 16:06:48', '12akash34', 1),
(183, 1, 'Fried Rice', 50, 2, '2020-10-20 20:34:09', '12akash34', 1),
(184, 90, 'Samosa', 25, 2, '2020-10-20 20:34:09', '12akash34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_in`
--

CREATE TABLE IF NOT EXISTS `wallet_in` (
  `username` varchar(130) NOT NULL,
  `amount` double NOT NULL,
  `code` varchar(50) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('1','0') NOT NULL DEFAULT '0',
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `code_2` (`code`),
  UNIQUE KEY `code_3` (`code`),
  UNIQUE KEY `code_4` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet_in`
--

INSERT INTO `wallet_in` (`username`, `amount`, `code`, `time`, `deleted`) VALUES
('pratik', 10000, 'Txn_908968', '2020-10-20 15:38:43', '0'),
('12akash34', 10000, 'Txn_186141', '2020-10-20 15:38:30', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_out`
--

CREATE TABLE IF NOT EXISTS `wallet_out` (
  `username` varchar(130) NOT NULL,
  `amount` double NOT NULL,
  `code` varchar(150) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` enum('1','0') NOT NULL DEFAULT '0',
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `Transaction_Code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet_out`
--

INSERT INTO `wallet_out` (`username`, `amount`, `code`, `time`, `deleted`) VALUES
('12akash34', 260, 'Txn_189155', '2020-10-20 15:39:32', '0'),
('pratik', 250, 'Txn_834680', '2020-10-20 15:40:23', '0'),
('12akash34', 200, 'Txn_377864', '2020-10-20 16:01:22', '0'),
('12akash34', 260, 'Txn_145633', '2020-10-20 16:35:55', '0'),
('12akash34', 50, 'Txn_856976', '2020-10-20 19:34:39', '0'),
('12akash34', 0, 'Txn_629410', '2020-10-20 19:34:57', '0'),
('12akash34', 50, 'Txn_186298', '2020-10-20 19:35:49', '0'),
('12akash34', 0, 'Txn_687691', '2020-10-20 19:36:13', '0'),
('12akash34', 80, 'Txn_200555', '2020-10-20 19:36:48', '0'),
('', 0, 'Txn_394148', '2020-10-20 19:44:04', '0'),
('12akash34', 150, 'Txn_188734', '2020-10-21 00:04:09', '0'),
('12akash34', 0, 'Txn_721441', '2020-10-21 00:04:37', '0');

