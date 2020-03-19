-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 18 Mars 2020 à 15:44
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

--
-- Contenu de la table `civilite`
--

INSERT INTO `civilite` (`idCivilite`, `libelleCivilite`) VALUES
(1, 'monsieur'),
(2, 'madame'),
(3, 'non renseigné');

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

--
-- Contenu de la table `galerieavatar`
--

INSERT INTO `galerieavatar` (`idAvatar`, `lienImage`, `ageMin`, `ageMax`, `idCivilite`) VALUES
(1, 'galerie_avatars/hommes/junior/HJ1.png', 0, 24, 1),
(2, 'galerie_avatars/hommes/junior/HJ2.png', 0, 24, 1),
(3, 'galerie_avatars/hommes/junior/HJ3.png', 0, 24, 1),
(4, 'galerie_avatars/hommes/junior/HJ4.png', 0, 24, 1),
(5, 'galerie_avatars/hommes/medium/HM1.png', 25, 49, 1),
(6, 'galerie_avatars/hommes/medium/HM2.png', 25, 49, 1),
(7, 'galerie_avatars/hommes/medium/HM3.png', 25, 49, 1),
(8, 'galerie_avatars/hommes/medium/HM4.png', 25, 49, 1),
(9, 'galerie_avatars/hommes/senior/HS1.png', 50, 140, 1),
(10, 'galerie_avatars/hommes/senior/HS2.png', 50, 140, 1),
(11, 'galerie_avatars/hommes/senior/HS3.png', 50, 140, 1),
(12, 'galerie_avatars/hommes/senior/HS4.png', 50, 140, 1),
(13, 'galerie_avatars/femmes/junior/FJ1.png', 0, 24, 2),
(14, 'galerie_avatars/femmes/junior/FJ2.png', 0, 24, 2),
(15, 'galerie_avatars/femmes/junior/FJ3.png', 0, 24, 2),
(16, 'galerie_avatars/femmes/junior/FJ4.png', 0, 24, 2),
(17, 'galerie_avatars/femmes/medium/FM1.png', 25, 49, 2),
(18, 'galerie_avatars/femmes/medium/FM2.png', 25, 49, 2),
(19, 'galerie_avatars/femmes/medium/FM3.png', 25, 49, 2),
(20, 'galerie_avatars/femmes/medium/FM4.png', 25, 49, 2),
(21, 'galerie_avatars/femmes/senior/FS1.png', 50, 140, 2),
(22, 'galerie_avatars/femmes/senior/FS2.png', 50, 140, 2),
(23, 'galerie_avatars/femmes/senior/FS3.png', 50, 140, 2),
(24, 'galerie_avatars/femmes/senior/FS4.png', 50, 140, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL,
  `libellePays` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`idPays`, `libellePays`) VALUES
(132, 'Afghanistan'),
(133, 'Albanie'),
(134, 'Antarctique'),
(135, 'Algérie'),
(136, 'Samoa Américaines'),
(137, 'Andorre'),
(138, 'Angola'),
(139, 'Antigua-et-Barbuda'),
(140, 'Azerbaïdjan'),
(141, 'Argentine'),
(142, 'Australie'),
(143, 'Autriche'),
(144, 'Bahamas'),
(145, 'Bahreïn'),
(146, 'Bangladesh'),
(147, 'Arménie'),
(148, 'Barbade'),
(149, 'Belgique'),
(150, 'Bermudes'),
(151, 'Bhoutan'),
(152, 'Bolivie'),
(153, 'Bosnie-Herzégovine'),
(154, 'Botswana'),
(155, 'Île Bouvet'),
(156, 'Brésil'),
(157, 'Belize'),
(158, 'Territoire Britannique de'),
(159, 'Îles Salomon'),
(160, 'Îles Vierges Britanniques'),
(161, 'Brunéi Darussalam'),
(162, 'Bulgarie'),
(163, 'Myanmar'),
(164, 'Burundi'),
(165, 'Bélarus'),
(166, 'Cambodge'),
(167, 'Cameroun'),
(168, 'Canada'),
(169, 'Cap-vert'),
(170, 'Îles Caïmanes'),
(171, 'République Centrafricaine'),
(172, 'Sri Lanka'),
(173, 'Tchad'),
(174, 'Chili'),
(175, 'Chine'),
(176, 'Taïwan'),
(177, 'Île Christmas'),
(178, 'Îles Cocos (Keeling)'),
(179, 'Colombie'),
(180, 'Comores'),
(181, 'Mayotte'),
(182, 'République du Congo'),
(183, 'République Démocratique d'),
(184, 'Îles Cook'),
(185, 'Costa Rica'),
(186, 'Croatie'),
(187, 'Cuba'),
(188, 'Chypre'),
(189, 'République Tchèque'),
(190, 'Bénin'),
(191, 'Danemark'),
(192, 'Dominique'),
(193, 'République Dominicaine'),
(194, 'Équateur'),
(195, 'El Salvador'),
(196, 'Guinée Équatoriale'),
(197, 'Éthiopie'),
(198, 'Érythrée'),
(199, 'Estonie'),
(200, 'Îles Féroé'),
(201, 'Îles (malvinas) Falkland'),
(202, 'Géorgie du Sud et les Île'),
(203, 'Fidji'),
(204, 'Finlande'),
(205, 'Îles Åland'),
(206, 'France'),
(207, 'Guyane Française'),
(208, 'Polynésie Française'),
(209, 'Terres Australes Français'),
(210, 'Djibouti'),
(211, 'Gabon'),
(212, 'Géorgie'),
(213, 'Gambie'),
(214, 'Territoire Palestinien Oc'),
(215, 'Allemagne'),
(216, 'Ghana'),
(217, 'Gibraltar'),
(218, 'Kiribati'),
(219, 'Grèce'),
(220, 'Groenland'),
(221, 'Grenade'),
(222, 'Guadeloupe'),
(223, 'Guam'),
(224, 'Guatemala'),
(225, 'Guinée'),
(226, 'Guyana'),
(227, 'Haïti'),
(228, 'Îles Heard et Mcdonald'),
(229, 'Saint-Siège (état de la C'),
(230, 'Honduras'),
(231, 'Hong-Kong'),
(232, 'Hongrie'),
(233, 'Islande'),
(234, 'Inde'),
(235, 'Indonésie'),
(236, 'République Islamique d Ir'),
(237, 'Iraq'),
(238, 'Irlande'),
(239, 'Israël'),
(240, 'Italie'),
(241, 'Côte d Ivoire'),
(242, 'Jamaïque'),
(243, 'Japon'),
(244, 'Kazakhstan'),
(245, 'Jordanie'),
(246, 'Kenya'),
(247, 'République Populaire Démo'),
(248, 'République de Corée'),
(249, 'Koweït'),
(250, 'Kirghizistan'),
(251, 'République Démocratique P'),
(252, 'Liban'),
(253, 'Lesotho'),
(254, 'Lettonie'),
(255, 'Libéria'),
(256, 'Jamahiriya Arabe Libyenne'),
(257, 'Liechtenstein'),
(258, 'Lituanie'),
(259, 'Luxembourg'),
(260, 'Macao'),
(261, 'Madagascar'),
(262, 'Malawi'),
(263, 'Malaisie'),
(264, 'Maldives'),
(265, 'Mali'),
(266, 'Malte'),
(267, 'Martinique'),
(268, 'Mauritanie'),
(269, 'Maurice'),
(270, 'Mexique'),
(271, 'Monaco'),
(272, 'Mongolie'),
(273, 'République de Moldova'),
(274, 'Montserrat'),
(275, 'Maroc'),
(276, 'Mozambique'),
(277, 'Oman'),
(278, 'Namibie'),
(279, 'Nauru'),
(280, 'Népal'),
(281, 'Pays-Bas'),
(282, 'Antilles Néerlandaises'),
(283, 'Aruba'),
(284, 'Nouvelle-Calédonie'),
(285, 'Vanuatu'),
(286, 'Nouvelle-Zélande'),
(287, 'Nicaragua'),
(288, 'Niger'),
(289, 'Nigéria'),
(290, 'Niué'),
(291, 'Île Norfolk'),
(292, 'Norvège'),
(293, 'Îles Mariannes du Nord'),
(294, 'Îles Mineures Éloignées d'),
(295, 'États Fédérés de Micronés'),
(296, 'Îles Marshall'),
(297, 'Palaos'),
(298, 'Pakistan'),
(299, 'Panama'),
(300, 'Papouasie-Nouvelle-Guinée'),
(301, 'Paraguay'),
(302, 'Pérou'),
(303, 'Philippines'),
(304, 'Pitcairn'),
(305, 'Pologne'),
(306, 'Portugal'),
(307, 'Guinée-Bissau'),
(308, 'Timor-Leste'),
(309, 'Porto Rico'),
(310, 'Qatar'),
(311, 'Réunion'),
(312, 'Roumanie'),
(313, 'Fédération de Russie'),
(314, 'Rwanda'),
(315, 'Sainte-Hélène'),
(316, 'Saint-Kitts-et-Nevis'),
(317, 'Anguilla'),
(318, 'Sainte-Lucie'),
(319, 'Saint-Pierre-et-Miquelon'),
(320, 'Saint-Vincent-et-les Gren'),
(321, 'Saint-Marin'),
(322, 'Sao Tomé-et-Principe'),
(323, 'Arabie Saoudite'),
(324, 'Sénégal'),
(325, 'Seychelles'),
(326, 'Sierra Leone'),
(327, 'Singapour'),
(328, 'Slovaquie'),
(329, 'Viet Nam'),
(330, 'Slovénie'),
(331, 'Somalie'),
(332, 'Afrique du Sud'),
(333, 'Zimbabwe'),
(334, 'Espagne'),
(335, 'Sahara Occidental'),
(336, 'Soudan'),
(337, 'Suriname'),
(338, 'Svalbard etÎle Jan Mayen'),
(339, 'Swaziland'),
(340, 'Suède'),
(341, 'Suisse'),
(342, 'République Arabe Syrienne'),
(343, 'Tadjikistan'),
(344, 'Thaïlande'),
(345, 'Togo'),
(346, 'Tokelau'),
(347, 'Tonga'),
(348, 'Trinité-et-Tobago'),
(349, 'Émirats Arabes Unis'),
(350, 'Tunisie'),
(351, 'Turquie'),
(352, 'Turkménistan'),
(353, 'Îles Turks et Caïques'),
(354, 'Tuvalu'),
(355, 'Ouganda'),
(356, 'Ukraine'),
(357, 'Ex-République Yougoslave '),
(358, 'Égypte'),
(359, 'Royaume-Uni'),
(360, 'Île de Man'),
(361, 'République-Unie de Tanzan'),
(362, 'États-Unis'),
(363, 'Îles Vierges des États-Un'),
(364, 'Burkina Faso'),
(365, 'Uruguay'),
(366, 'Ouzbékistan'),
(367, 'Venezuela'),
(368, 'Wallis et Futuna'),
(369, 'Samoa'),
(370, 'Yémen'),
(371, 'Serbie-et-Monténégro'),
(372, 'Zambie');

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
  `dateNaissance` date NOT NULL,
  `adresseMail` varchar(60) NOT NULL,
  `motsPasse` varchar(3) DEFAULT NULL
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
  ADD PRIMARY KEY (`idCivilite`) USING BTREE;

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