#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------



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

ALTER TABLE `association`
  ADD PRIMARY KEY (`idAssociation`);
  ALTER TABLE `statut`
  ADD PRIMARY KEY (`idAssociation`,`idStatut`);
  ALTER TABLE `statut`
  ADD CONSTRAINT `statut_ibfk_1` FOREIGN KEY (`idAssociation`) REFERENCES `association` (`idAssociation`);

--
-- Contraintes pour la table `utilisateur`
--



#------------------------------------------------------------
# Table: pays
#------------------------------------------------------------

CREATE TABLE pays(
        idPays      Int NOT NULL ,
        libellePays Varchar (3) NOT NULL
	,CONSTRAINT pays_PK PRIMARY KEY (idPays)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: civilite
#------------------------------------------------------------

CREATE TABLE civilite(
        idCivilite      Int NOT NULL ,
        libelleCivilite Varchar (3) NOT NULL
	,CONSTRAINT civilite_PK PRIMARY KEY (idCivilite)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: galerieAvatar
#------------------------------------------------------------

CREATE TABLE galerieAvatar(
        idAvatar   Int NOT NULL ,
        lienImage  Varchar (100) NOT NULL ,
        ageMin     Int NOT NULL ,
        ageMax     Int NOT NULL ,
        idCivilite Int NOT NULL
	,CONSTRAINT galerieAvatar_PK PRIMARY KEY (idAvatar)

	,CONSTRAINT galerieAvatar_civilite_FK FOREIGN KEY (idCivilite) REFERENCES civilite(idCivilite)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        pseudo     Varchar (30) NOT NULL ,
        nom        Varchar (43) NOT NULL ,
        prenom     Varchar (30) NOT NULL ,
        idStatut   Int NOT NULL ,
        idPays     Int NOT NULL ,
        idCivilite Int NOT NULL ,
        idAvatar   Int NOT NULL ,
        idAssociation INT NOT NULL 
	,CONSTRAINT utilisateur_PK PRIMARY KEY (pseudo)

	
	,CONSTRAINT utilisateur_pays0_FK FOREIGN KEY (idPays) REFERENCES pays(idPays)
	,CONSTRAINT utilisateur_civilite1_FK FOREIGN KEY (idCivilite) REFERENCES civilite(idCivilite)
	,CONSTRAINT utilisateur_galerieAvatar2_FK FOREIGN KEY (idAvatar) REFERENCES galerieAvatar(idAvatar)
)ENGINE=InnoDB;
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateurFKassoStatut` FOREIGN KEY (`idAssociation`,`idStatut`) REFERENCES `statut` (`idAssociation`, `idStatut`);

