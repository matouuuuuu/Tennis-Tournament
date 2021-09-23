-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 juin 2021 à 10:01
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tennis`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

DROP TABLE IF EXISTS `matchs`;
CREATE TABLE IF NOT EXISTS `matchs` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `joueur1id` int(50) NOT NULL,
  `joueur2id` int(50) NOT NULL,
  `vainqueurid` int(50) NOT NULL,
  `tournoisId` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`id`, `joueur1id`, `joueur2id`, `vainqueurid`, `tournoisId`) VALUES
(68, 2, 1, 2, 28),
(67, 1, 3, 1, 28),
(66, 2, 4, 2, 28);

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `playerName` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `nat` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `participe` tinyint(1) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tournois`
--

DROP TABLE IF EXISTS `tournois`;
CREATE TABLE IF NOT EXISTS `tournois` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `tournoisName` varchar(50) NOT NULL,
  `nbJoueur` int(50) NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `listMatch` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tournois`
--

INSERT INTO `tournois` (`id`, `tournoisName`, `nbJoueur`, `etat`, `listMatch`) VALUES
(28, 'Je suis intelligent', 4, 0, '[\"2\"]');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
