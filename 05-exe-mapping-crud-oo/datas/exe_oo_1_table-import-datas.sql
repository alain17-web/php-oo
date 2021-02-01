-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : lun. 01 fév. 2021 à 10:37
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `exe_oo_1_table`
--
CREATE DATABASE IF NOT EXISTS `exe_oo_1_table` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `exe_oo_1_table`;



-- --------------------------------------------------------

--
-- Structure de la table `theuser`
--

DROP TABLE IF EXISTS `theuser`;
CREATE TABLE IF NOT EXISTS `theuser` (
                                         `idtheUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `theUserLogin` varchar(60) DEFAULT NULL,
                                         `theUserPwd` varchar(60) NOT NULL,
                                         PRIMARY KEY (`idtheUser`),
                                         UNIQUE KEY `theUserLogin_UNIQUE` (`theUserLogin`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `thenews`
--

DROP TABLE IF EXISTS `thenews`;
CREATE TABLE IF NOT EXISTS `thenews` (
                                         `idtheNews` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `theNewsTitle` varchar(150) NOT NULL,
                                         `theNewsText` text NOT NULL,
                                         `theNewsDate` datetime DEFAULT current_timestamp(),
                                         `theUser_idtheUser` int(10) UNSIGNED NOT NULL,
                                         PRIMARY KEY (`idtheNews`),
                                         KEY `fk_theNews_theUser_idx` (`theUser_idtheUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theuser`
--

INSERT INTO `theuser` (`idtheUser`, `theUserLogin`, `theUserPwd`) VALUES
(1, 'Mattia', 'Mattia'),
(2, 'Bryan', 'Bryan'),
(3, 'Rocio', 'Rocio'),
(4, 'Audrey', 'Audrey'),
(5, 'Marjorie', 'Marjorie'),
(6, 'Jessica', 'Jessica'),
(7, 'Alain', 'Alain'),
(8, 'Chihab', 'Chihab'),
(9, 'Kieran', 'Kieran'),
(10, 'Adrien', 'Adrien'),
(11, 'Clovis', 'Clovis'),
(12, 'Saadallah', 'Saadallah'),
(13, 'Virgile', 'Virgile'),
(14, 'Michaël', 'Michaël');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `thenews`
--
ALTER TABLE `thenews`
    ADD CONSTRAINT `fk_theNews_theUser` FOREIGN KEY (`theUser_idtheUser`) REFERENCES `theuser` (`idtheUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
