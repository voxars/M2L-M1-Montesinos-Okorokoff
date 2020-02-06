-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 06 Février 2020 à 10:12
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l_appli`
--

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `idAssociation` int(3) NOT NULL,
  `libelleAssociation` varchar(30) DEFAULT NULL,
  `imageAssociation` varchar(40) NOT NULL,
  `descriptionAssociation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `association`
--

INSERT INTO `association` (`idAssociation`, `libelleAssociation`, `imageAssociation`, `descriptionAssociation`) VALUES
(1, 'ligue de plongée', 'plongee.png', 'plouf plouf'),
(2, 'ligue de ping-pong', 'ping-pong.jpg', 'poc poc');

-- --------------------------------------------------------

--
-- Structure de la table `civilite`
--

CREATE TABLE `civilite` (
  `idCivilite` int(11) NOT NULL,
  `libelleCivilite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `galerieavatar`
--

CREATE TABLE `galerieavatar` (
  `idAvatar` int(11) NOT NULL,
  `lienImage` varchar(100) NOT NULL,
  `ageMin` int(11) NOT NULL,
  `ageMax` int(11) NOT NULL,
  `idCivilite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL,
  `libellePays` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `idAssociation` int(3) NOT NULL,
  `idStatut` int(3) NOT NULL,
  `libelleStatut` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`idAssociation`, `idStatut`, `libelleStatut`) VALUES
(1, 1, 'Membre du bureau'),
(1, 2, 'Adhérent'),
(1, 3, 'Abonné'),
(2, 1, 'Membre du bureau'),
(2, 2, 'Adhérent');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo` varchar(30) NOT NULL,
  `nom` varchar(43) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `idStatut` int(11) NOT NULL,
  `idPays` int(11) NOT NULL,
  `idCivilite` int(11) NOT NULL,
  `idAvatar` int(11) NOT NULL,
  `idAssociation` int(11) NOT NULL,
  `dateNaissance` DATE NOT NULL,
  `adresseMail` VARCHAR(60) NOT NULL,
  `motsPasse` VARCHAR(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`idAssociation`);

--
-- Index pour la table `civilite`
--
ALTER TABLE `civilite`
  ADD PRIMARY KEY (`idCivilite`);

--
-- Index pour la table `galerieavatar`
--
ALTER TABLE `galerieavatar`
  ADD PRIMARY KEY (`idAvatar`),
  ADD KEY `galerieAvatar_civilite_FK` (`idCivilite`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPays`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`idAssociation`,`idStatut`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo`),
  ADD KEY `utilisateur_pays0_FK` (`idPays`),
  ADD KEY `utilisateur_civilite1_FK` (`idCivilite`),
  ADD KEY `utilisateur_galerieAvatar2_FK` (`idAvatar`),
  ADD KEY `utilisateurFKassoStatut` (`idAssociation`,`idStatut`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `galerieavatar`
--
ALTER TABLE `galerieavatar`
  ADD CONSTRAINT `galerieAvatar_civilite_FK` FOREIGN KEY (`idCivilite`) REFERENCES `civilite` (`idCivilite`);

--
-- Contraintes pour la table `statut`
--
ALTER TABLE `statut`
  ADD CONSTRAINT `statut_ibfk_1` FOREIGN KEY (`idAssociation`) REFERENCES `association` (`idAssociation`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateurFKassoStatut` FOREIGN KEY (`idAssociation`,`idStatut`) REFERENCES `statut` (`idAssociation`, `idStatut`),
  ADD CONSTRAINT `utilisateur_civilite1_FK` FOREIGN KEY (`idCivilite`) REFERENCES `civilite` (`idCivilite`),
  ADD CONSTRAINT `utilisateur_galerieAvatar2_FK` FOREIGN KEY (`idAvatar`) REFERENCES `galerieavatar` (`idAvatar`),
  ADD CONSTRAINT `utilisateur_pays0_FK` FOREIGN KEY (`idPays`) REFERENCES `pays` (`idPays`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
