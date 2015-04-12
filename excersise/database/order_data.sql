-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2013 at 08:09 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `order_id`, `first_name`, `last_name`, `email`, `phone`) VALUES
(1, 1, 'John', 'Smith', 'name1@returbo.de', '29664566'),
(2, 2, 'John', 'Smith', 'name2@returbo.de', '28729052'),
(3, 3, 'John', 'Smith', 'name3@returbo.de', '21833521'),
(4, 4, 'John', 'Smith', 'name4@returbo.de', '40335020'),
(5, 5, ' John', ' Smith', 'name5@returbo.de', '28140158');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_ord_id` varchar(100) NOT NULL,
  `ship_first_name` varchar(200) NOT NULL,
  `ship_last_name` varchar(200) NOT NULL,
  `ship_company` varchar(200) NOT NULL,
  `ship_street1` varchar(200) NOT NULL,
  `ship_street2` varchar(200) NOT NULL,
  `ship_zip` varchar(10) NOT NULL,
  `ship_city` varchar(100) NOT NULL,
  `ship_state` varchar(100) NOT NULL,
  `ship_country` varchar(100) NOT NULL,
  `inv_first_name` varchar(200) NOT NULL,
  `inv_last_name` varchar(200) NOT NULL,
  `inv_company` varchar(200) NOT NULL,
  `inv_street1` varchar(200) NOT NULL,
  `inv_street2` varchar(200) NOT NULL,
  `inv_zip` varchar(10) NOT NULL,
  `inv_city` varchar(100) NOT NULL,
  `inv_state` varchar(100) NOT NULL,
  `inv_country` varchar(100) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `cust_ord_id`, `ship_first_name`, `ship_last_name`, `ship_company`, `ship_street1`, `ship_street2`, `ship_zip`, `ship_city`, `ship_state`, `ship_country`, `inv_first_name`, `inv_last_name`, `inv_company`, `inv_street1`, `inv_street2`, `inv_zip`, `inv_city`, `inv_state`, `inv_country`, `grand_total`) VALUES
(1, '34324514158-1', 'John', 'Smith', '3', 'Heibergsvej2', '', '8600', 'Silkeborg', 'Silkeborg', 'DK', '', '', '', 'Heibergsvej2', '', '8600', 'Silkeborg', '', '', 5.00),
(2, '34317228111-1', 'John', 'Smith', '3', 'Neckelmannsgade18', '1. Tv', '4800', 'Nykøbing F', 'Nykøbing F', 'DK', '', '', '', 'Neckelmannsgade18', '1. Tv', '4800', 'Nykøbing F', '', '', 5.00),
(3, '34438922536-1', 'John', 'Smith', '3', 'Vestergade83', '2.tv', '8600', 'Silkeborg', 'Silkeborg', 'DK', '', '', '', 'Vestergade83', '2.tv', '8600', 'Silkeborg', '', '', 5.00),
(4, '34411276360-1', 'John', 'Smith', '3', 'Hjortekærskrænten10', '', '2800', 'Kgs. Lyngby', 'Kgs. Lyngby', 'DK', '', '', '', 'Hjortekærskrænten10', '', '2800', 'Kgs. Lyngby', '', '', 5.00),
(5, '34611336404-11', 'John', 'Smith', '3', 'Dybkærvænget10', 'Test1', '2640', 'Hedehusene', 'Hedehusene', 'DK', '', '', '', 'Dybkærvænget10', '', '2640', 'Hedehusene', '', '', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `quantity`, `price`) VALUES
(1, 1, 1, 60.00),
(2, 2, 1, 60.00),
(3, 3, 1, 60.00),
(4, 4, 1, 60.00),
(5, 5, 1, 60.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `order_id`, `sku`, `name`) VALUES
(1, 1, 'SPSCH30902002N', 'Spot DK'),
(2, 2, 'SPSCH30902002N', 'Spot DK'),
(3, 3, 'SPSCH30902002N', 'Spot DK'),
(4, 4, 'SPSCH30902002N', 'Spot DK'),
(5, 5, 'SPSCH30902002N', 'Spot DK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
