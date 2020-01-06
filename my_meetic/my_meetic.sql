-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 30 juin 2019 à 21:10
-- Version du serveur :  10.3.12-MariaDB
-- Version de PHP :  7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_meetic`
--

-- --------------------------------------------------------

--
-- Structure de la table `info_user`
--

CREATE TABLE `info_user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_de_naissance` date NOT NULL,
  `sexe` varchar(255) COLLATE utf8_bin NOT NULL,
  `ville` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `info_user`
--

INSERT INTO `info_user` (`id`, `nom`, `prenom`, `date_de_naissance`, `sexe`, `ville`, `email`, `password`) VALUES
(1, 'morel', 'mickael', '1998-06-25', 'homme', 'LE KREMLIN BICETRE', 'mickael.morel@epitech.eu', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(2, 'pierre', 'paul', '1995-01-01', 'homme', 'Noisy Le Roi', 'pg.flauw@gmail.com', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(3, 'Sardou', 'Michel', '1970-09-26', 'homme', 'Paris', 'mhdzb@bceh.fr', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(4, 'khalifa', 'Mia', '1989-06-23', 'femme', 'Drancy', 'dfgh@fgh.com', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(5, 'Loutre', 'Loutre', '1992-01-01', 'autre', 'Sevran', 'azert@azertyu.com', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(6, 'Obama', 'Michelle', '1968-02-13', 'femme', 'Marseille', 'michlle.obama@epitech.eu', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(7, 'jenkins', 'leeroy', '1999-01-01', 'homme', 'Paris', 'leroy.jenkins@epitech.eu', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(8, 'jacky', 'Michel', '1960-12-09', 'homme', 'Tours', 'ghjk@ghj.fr', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0'),
(9, 'Miskina', 'Starf', '1983-02-12', 'femme', 'Paris', 'sdfghj@sdfg.net', '72905e7b32d847468edcdbf99f7d218e466cd828300306f1d9f8c3e0512e44fe4394644b581ed52656a2870c9a67c592bc40ca322099aa52bf528c54f9cabde0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `info_user`
--
ALTER TABLE `info_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
