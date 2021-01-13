-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mer. 13 jan. 2021 à 15:47
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `mapping1table`
--
DROP DATABASE IF EXISTS `mapping1table`;
CREATE DATABASE IF NOT EXISTS `mapping1table` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mapping1table`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
                                         `idarticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `articleTitle` varchar(180) NOT NULL,
                                         `articleSlug` varchar(180) DEFAULT NULL,
                                         `articleText` text NOT NULL,
                                         `articleDateTime` datetime DEFAULT NULL,
                                         `articleAuthor` varchar(250) NOT NULL,
                                         PRIMARY KEY (`idarticle`),
                                         UNIQUE KEY `articleSlug_UNIQUE` (`articleSlug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idarticle`, `articleTitle`, `articleSlug`, `articleText`, `articleDateTime`, `articleAuthor`) VALUES
(1, 'Bienvenue à tous!', 'bienvenue-a-tous', 'Voici un simple texte pour que notre table ne soit pas vide.\r\n\r\nA bientôt !', '2021-01-13 15:45:47', 'Pitz Michaël');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
