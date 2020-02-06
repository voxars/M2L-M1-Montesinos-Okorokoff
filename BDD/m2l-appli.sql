#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Association
#------------------------------------------------------------

CREATE TABLE Association(
        IdAssociation          Int NOT NULL ,
        libelleAssociation     Varchar (25) NOT NULL ,
        imageAssociation       Varchar (40) NOT NULL ,
        descriptionAssociation Text NOT NULL ,
        dateNaissance          Date NOT NULL ,
        adresseMail            Varchar (60) NOT NULL ,
        motPasse               Varchar (60) NOT NULL
	,CONSTRAINT Association_PK PRIMARY KEY (IdAssociation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: statut
#------------------------------------------------------------

CREATE TABLE statut(
        idStatut      Int NOT NULL ,
        libelleStatut Varchar (3) NOT NULL ,
        IdAssociation Int NOT NULL
	,CONSTRAINT statut_PK PRIMARY KEY (idStatut)

	,CONSTRAINT statut_Association_FK FOREIGN KEY (IdAssociation) REFERENCES Association(IdAssociation)
)ENGINE=InnoDB;


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
        idAvatar   Int NOT NULL
	,CONSTRAINT utilisateur_PK PRIMARY KEY (pseudo)

	,CONSTRAINT utilisateur_statut_FK FOREIGN KEY (idStatut) REFERENCES statut(idStatut)
	,CONSTRAINT utilisateur_pays0_FK FOREIGN KEY (idPays) REFERENCES pays(idPays)
	,CONSTRAINT utilisateur_civilite1_FK FOREIGN KEY (idCivilite) REFERENCES civilite(idCivilite)
	,CONSTRAINT utilisateur_galerieAvatar2_FK FOREIGN KEY (idAvatar) REFERENCES galerieAvatar(idAvatar)
)ENGINE=InnoDB;

