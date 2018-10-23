-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 22 Octobre 2018 à 17:17
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pizzeria`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Mail` (`username`),
  UNIQUE KEY `MotdePasse` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`Id`, `username`, `password`) VALUES
(1, 'admin', 'laila');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Prix` float NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`Id`, `Nom`, `Image`, `Prix`) VALUES
(2, 'Hawaïenne', 'hawaïenne.jpg', 12),
(4, 'Orientale', 'orientale.jpg', 12),
(5, 'Coca Cola', 'coca.png', 2),
(7, 'Fanta', 'fanta.jpg', 2),
(8, 'Vittel', 'vittel.jpg', 2),
(9, 'Yop fraise ', 'yop.jpg', 3),
(10, 'Donuts', 'donuts.jpg', 3),
(11, 'Fondant au chocolat', 'fondant_choco.jpg', 3),
(12, 'Yop', 'yop.jpg', 4),
(13, 'Jambon peperoni', 'jambonpeperoni.jpg', 12),
(14, 'Tomate chorrizo', 'tomatechorrizo.jpg', 12);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `nombre_personne` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `reservation_id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `telephone` (`telephone`),
  KEY `reservation_id` (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Mail` (`mail`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`Id`, `nom`, `mail`, `date`, `password`) VALUES
(1, 'Bouzi', 'laila86@hotmail.fr', '0000-00-00 00:00:00', '66117e76856a498a347c57a178a496d3023f03f4'),
(4, 'laila', 'bouzilaila@outlook.fr', '0000-00-00 00:00:00', '66117e76856a498a347c57a178a496d3023f03f4'),
(5, 'Satouri', 'sabri-60@hotmail.fr', '0000-00-00 00:00:00', '66117e76856a498a347c57a178a496d3023f03f4'),
(9, 'sabri', 'sabrisatouri@hotmail.fr', '0000-00-00 00:00:00', '66117e76856a498a347c57a178a496d3023f03f4'),
(10, 'lina', 'linasat@hotmail.fr', '0000-00-00 00:00:00', '66117e76856a498a347c57a178a496d3023f03f4'),
(11, 'sarah', 'Sarah60@hotmail.fr', '2018-10-01 12:48:04', '66117e76856a498a347c57a178a496d3023f03f4'),
(13, 'lina', 'lina60@hotmail.fr', '2018-10-01 12:59:50', '8cb2237d0679ca88db6464eac60da96345513964'),
(15, 'laila', 'laila60@hotmail.fr', '2018-10-01 13:06:05', '8cb2237d0679ca88db6464eac60da96345513964');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
