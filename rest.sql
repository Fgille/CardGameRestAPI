-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 17 jan. 2019 à 22:16
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rest`
--

-- --------------------------------------------------------

--
-- Structure de la table `carteschoisi`
--

CREATE TABLE `carteschoisi` (
  `cle` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listecarte`
--

CREATE TABLE `listecarte` (
  `id` int(11) NOT NULL,
  `choisi` varchar(255) NOT NULL DEFAULT 'NON',
  `titre` varchar(255) DEFAULT NULL,
  `texte` varchar(255) DEFAULT NULL,
  `effetstat1oui` int(11) DEFAULT NULL,
  `effetstat2oui` int(11) NOT NULL,
  `effetstat3oui` int(11) NOT NULL,
  `effetstat4oui` int(11) NOT NULL,
  `effetstat1non` int(11) NOT NULL,
  `effetstat2non` int(11) NOT NULL,
  `effetstat3non` int(11) NOT NULL,
  `effetstat4non` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listecarte`
--

INSERT INTO `listecarte` (`id`, `choisi`, `titre`, `texte`, `effetstat1oui`, `effetstat2oui`, `effetstat3oui`, `effetstat4oui`, `effetstat1non`, `effetstat2non`, `effetstat3non`, `effetstat4non`) VALUES
(1, 'NON', 'Test 1', 'Carte de test 1', 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'NON', 'test carte 2', 'Test carte 2', 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `stat`
--

CREATE TABLE `stat` (
  `id` int(11) NOT NULL,
  `stat1` int(11) DEFAULT '5',
  `stat2` int(11) DEFAULT '5',
  `stat3` int(11) DEFAULT '5',
  `stat4` int(11) DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stat`
--

INSERT INTO `stat` (`id`, `stat1`, `stat2`, `stat3`, `stat4`) VALUES
(1, 5, 5, 5, 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carteschoisi`
--
ALTER TABLE `carteschoisi`
  ADD PRIMARY KEY (`cle`);

--
-- Index pour la table `listecarte`
--
ALTER TABLE `listecarte`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stat`
--
ALTER TABLE `stat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carteschoisi`
--
ALTER TABLE `carteschoisi`
  MODIFY `cle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `listecarte`
--
ALTER TABLE `listecarte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `stat`
--
ALTER TABLE `stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
