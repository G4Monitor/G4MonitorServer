-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Avril 2015 à 17:56
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
-- Structure de la table `error`
--

CREATE TABLE IF NOT EXISTS `error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_mac_adress` varchar(17) NOT NULL,
  `type` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `devicde_mac_adress` (`device_mac_adress`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `error`
--
ALTER TABLE `error`
  ADD CONSTRAINT `FK_device_mac_adress` FOREIGN KEY (`device_mac_adress`) REFERENCES `device` (`deviceMac`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
