-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2022 at 10:38 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solutoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `indicadorfinanciero`
--

DROP TABLE IF EXISTS `indicadorfinanciero`;
CREATE TABLE IF NOT EXISTS `indicadorfinanciero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreIndicador` varchar(5000) NOT NULL,
  `codigoIndicador` varchar(5000) NOT NULL,
  `unidadMedidaIndicador` varchar(5000) NOT NULL,
  `valorIndicador` double NOT NULL,
  `fechaIndicador` varchar(5000) NOT NULL,
  `tiempoIndicador` varchar(5000) DEFAULT NULL,
  `origenIndicador` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1935 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
