-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 07 Avril 2015 à 16:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `g4monitor`
--

-- --------------------------------------------------------

--
-- Structure de la table `allocation`
--

CREATE TABLE IF NOT EXISTS `allocation` (
  `allocationID` int(11) NOT NULL AUTO_INCREMENT,
  `IPAddress` varchar(15) NOT NULL,
  `deviceMAC` varchar(17) NOT NULL,
  `allocationDate` date NOT NULL,
  PRIMARY KEY (`allocationID`),
  KEY `deviceMAC` (`deviceMAC`),
  KEY `deviceMAC_2` (`deviceMAC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `deviceMac` varchar(17) NOT NULL,
  `deviceName` varchar(50) NOT NULL,
  `deviceOS` varchar(25) NOT NULL,
  `deviceOSVersion` varchar(10) NOT NULL,
  `deviceProcessor` varchar(15) NOT NULL,
  `deviceSaveDate` datetime NOT NULL,
  `deviceLastUpdateDate` datetime NOT NULL,
  PRIMARY KEY (`deviceMac`),
  UNIQUE KEY `deviceMac` (`deviceMac`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `device`
--

INSERT INTO `device` (`deviceMac`, `deviceName`, `deviceOS`, `deviceOSVersion`, `deviceProcessor`, `deviceSaveDate`, `deviceLastUpdateDate`) VALUES
('00:50:56:C0:00:01', 'Portable', 'Windows 8.1\n', '6.3\n', 'undefined', '2015-04-07 15:40:03', '2015-04-07 15:40:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
