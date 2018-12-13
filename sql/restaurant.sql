-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Novembre 2018 à 04:27
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `restaurant`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `nom`, `image`, `prix`) VALUES
(1, 'Vittel ', '../Images/vittel.jpg', 3),
(2, 'Sprite', '../Images/sprite.png', 3),
(3, 'Fanta', '../Images/fanta.jpg', 3),
(5, 'Coca cola', '../Images/coca.png', 3),
(6, 'Tiramisu', '../Images/tiramisu.jpg', 7),
(7, 'CrÃ¨me brulÃ©e ', '../Images/creme_brule.jpg', 8),
(8, 'Fraisier', '../Images/fraisier.jpg', 8),
(9, 'Fondant au chocolat', '../Images/fondant_choco.jpg', 6),
(10, 'Donuts', '../Images/donuts.jpg', 5),
(12, 'Tomate chorizo', '../Images/tomatechorizo.jpg', 12),
(13, 'Traditionnelle', '../Images/pizzatraditionnelle.png', 11),
(14, 'Orientale', '../Images/orientale.jpg', 13),
(15, 'HawaÃ¯enne', '../Images/hawaienne.jpg', 13),
(16, 'Jambon peperoni', '../Images/jambonpeperoni.jpg', 12),
(17, 'Margherita', '../Images/margherita.jpg', 11);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `date` varchar(255) NOT NULL,
  `heure` varchar(2) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `nombre_personne` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `nom`, `date`, `heure`, `telephone`, `nombre_personne`) VALUES
(1, 'laila', '11/30/2018', '21', '0000000000', '7'),
(2, 'Olga', '11/16/2018', '19', '1111111111', '7'),
(3, 'Sacha', '11/30/2018', '22', '2222222222', '3'),
(4, 'Natacha', '11/30/2018', '12', '4444444444', '1'),
(5, 'Natacha', '11/30/2018', '12', '4444444444', '1');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `mail`, `password`, `date`) VALUES
(1, 'laila', 'laila86@hotmail.fr', '8cb2237d0679ca88db6464eac60da96345513964', '2018-11-20 00:58:01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
