#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Centre
#------------------------------------------------------------

CREATE TABLE Centre(
        IDCentre         Int  Auto_increment  NOT NULL ,
        NomDuCentre      Varchar (255) NOT NULL ,
        NTelephoneCentre Int NOT NULL
	,CONSTRAINT Centre_PK PRIMARY KEY (IDCentre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateurs
#------------------------------------------------------------

CREATE TABLE Utilisateurs(
        IDutilisateur Int  Auto_increment  NOT NULL ,
        Email         Varchar (50) NOT NULL ,
        MotDePasse    Varchar (50) NOT NULL ,
        Status        Int NOT NULL ,
        PhotoDeProfil Text NOT NULL ,
        IDCentre      Int NOT NULL
	,CONSTRAINT Utilisateurs_PK PRIMARY KEY (IDutilisateur)

	,CONSTRAINT Utilisateurs_Centre_FK FOREIGN KEY (IDCentre) REFERENCES Centre(IDCentre)
)ENGINE=InnoDB;

