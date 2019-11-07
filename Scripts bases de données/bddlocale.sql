#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Evenements
#------------------------------------------------------------

CREATE TABLE Evenements(
        IDEvenement  Int  Auto_increment  NOT NULL ,
        NomEvenement Varchar (50) NOT NULL ,
        Description  Text NOT NULL ,
        Date         Date NOT NULL ,
        Prix         DECIMAL (15,3)  NOT NULL
	,CONSTRAINT Evenements_PK PRIMARY KEY (IDEvenement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikesEvenements
#------------------------------------------------------------

CREATE TABLE LikesEvenements(
        IDLike Int  Auto_increment  NOT NULL
	,CONSTRAINT LikesEvenements_PK PRIMARY KEY (IDLike)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ContenirLikes
#------------------------------------------------------------

CREATE TABLE ContenirLikes(
        IDLike      Int NOT NULL ,
        IDEvenement Int NOT NULL
	,CONSTRAINT ContenirLikes_PK PRIMARY KEY (IDLike,IDEvenement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateurs
#------------------------------------------------------------

CREATE TABLE Utilisateurs(
        IDUtilisateur Int  Auto_increment  NOT NULL ,
        Email         Varchar (255) NOT NULL ,
        MotDePasse    Varchar (255) NOT NULL ,
        Satus         Int NOT NULL ,
        PhotoDeProfil Varchar (255) NOT NULL ,
        IDPanier      Int NOT NULL
	,CONSTRAINT Utilisateurs_PK PRIMARY KEY (IDUtilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Photos
#------------------------------------------------------------

CREATE TABLE Photos(
        IDPhoto          Int  Auto_increment  NOT NULL ,
        NomPhoto         Varchar (50) NOT NULL ,
        DescriptionPhoto Text NOT NULL ,
        LienPhoto        Text NOT NULL ,
        IDEvenement      Int NOT NULL ,
        IDUtilisateur    Int NOT NULL
	,CONSTRAINT Photos_PK PRIMARY KEY (IDPhoto)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikesPhotos
#------------------------------------------------------------

CREATE TABLE LikesPhotos(
        IDLike        Int  Auto_increment  NOT NULL ,
        IDUtilisateur Int NOT NULL ,
        IDPhoto       Int NOT NULL
	,CONSTRAINT LikesPhotos_PK PRIMARY KEY (IDLike)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: CommentairesEvenements
#------------------------------------------------------------

CREATE TABLE CommentairesEvenements(
        IDCommentaire      Int  Auto_increment  NOT NULL ,
        ContenuCommentaire Text NOT NULL ,
        IDEvenement        Int NOT NULL ,
        IDUtilisateur      Int NOT NULL
	,CONSTRAINT CommentairesEvenements_PK PRIMARY KEY (IDCommentaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikesCommentaires
#------------------------------------------------------------

CREATE TABLE LikesCommentaires(
        IDLike        Int  Auto_increment  NOT NULL ,
        IDUtilisateur Int NOT NULL ,
        IDCommentaire Int NOT NULL
	,CONSTRAINT LikesCommentaires_PK PRIMARY KEY (IDLike)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Produits
#------------------------------------------------------------

CREATE TABLE Produits(
        IDProduit    Int  Auto_increment  NOT NULL ,
        NomProduit   Varchar (255) NOT NULL ,
        Description  Text NOT NULL ,
        Prix         DECIMAL (15,3)  NOT NULL ,
        PhotoProduit Text NOT NULL ,
        Quantite     Int NOT NULL ,
        Prix_Total   DECIMAL (15,3)  NOT NULL ,
        IDCommande   Int NOT NULL
	,CONSTRAINT Produits_PK PRIMARY KEY (IDProduit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Panier
#------------------------------------------------------------

CREATE TABLE Panier(
        IDPanier      Int  Auto_increment  NOT NULL ,
        IDUtilisateur Int NOT NULL
	,CONSTRAINT Panier_PK PRIMARY KEY (IDPanier)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commande
#------------------------------------------------------------

CREATE TABLE Commande(
        IDCommande Int  Auto_increment  NOT NULL ,
        Date       Date NOT NULL ,
        Prix_Total DECIMAL (15,3)  NOT NULL ,
        IDPanier   Int NOT NULL
	,CONSTRAINT Commande_PK PRIMARY KEY (IDCommande)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikerEvenements
#------------------------------------------------------------

CREATE TABLE LikerEvenements(
        IDLike        Int NOT NULL ,
        IDUtilisateur Int NOT NULL
	,CONSTRAINT LikerEvenements_PK PRIMARY KEY (IDLike,IDUtilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Inscrire
#------------------------------------------------------------

CREATE TABLE Inscrire(
        IDUtilisateur Int NOT NULL ,
        IDEvenement   Int NOT NULL
	,CONSTRAINT Inscrire_PK PRIMARY KEY (IDUtilisateur,IDEvenement)
)ENGINE=InnoDB;




ALTER TABLE ContenirLikes
	ADD CONSTRAINT ContenirLikes_LikesEvenements0_FK
	FOREIGN KEY (IDLike)
	REFERENCES LikesEvenements(IDLike);

ALTER TABLE ContenirLikes
	ADD CONSTRAINT ContenirLikes_Evenements1_FK
	FOREIGN KEY (IDEvenement)
	REFERENCES Evenements(IDEvenement);

ALTER TABLE Utilisateurs
	ADD CONSTRAINT Utilisateurs_Panier0_FK
	FOREIGN KEY (IDPanier)
	REFERENCES Panier(IDPanier);

ALTER TABLE Utilisateurs 
	ADD CONSTRAINT Utilisateurs_Panier0_AK 
	UNIQUE (IDPanier);

ALTER TABLE Photos
	ADD CONSTRAINT Photos_Evenements0_FK
	FOREIGN KEY (IDEvenement)
	REFERENCES Evenements(IDEvenement);

ALTER TABLE Photos
	ADD CONSTRAINT Photos_Utilisateurs1_FK
	FOREIGN KEY (IDUtilisateur)
	REFERENCES Utilisateurs(IDUtilisateur);

ALTER TABLE LikesPhotos
	ADD CONSTRAINT LikesPhotos_Utilisateurs0_FK
	FOREIGN KEY (IDUtilisateur)
	REFERENCES Utilisateurs(IDUtilisateur);

ALTER TABLE LikesPhotos
	ADD CONSTRAINT LikesPhotos_Photos1_FK
	FOREIGN KEY (IDPhoto)
	REFERENCES Photos(IDPhoto);

ALTER TABLE CommentairesEvenements
	ADD CONSTRAINT CommentairesEvenements_Evenements0_FK
	FOREIGN KEY (IDEvenement)
	REFERENCES Evenements(IDEvenement);

ALTER TABLE CommentairesEvenements
	ADD CONSTRAINT CommentairesEvenements_Utilisateurs1_FK
	FOREIGN KEY (IDUtilisateur)
	REFERENCES Utilisateurs(IDUtilisateur);

ALTER TABLE LikesCommentaires
	ADD CONSTRAINT LikesCommentaires_Utilisateurs0_FK
	FOREIGN KEY (IDUtilisateur)
	REFERENCES Utilisateurs(IDUtilisateur);

ALTER TABLE LikesCommentaires
	ADD CONSTRAINT LikesCommentaires_CommentairesEvenements1_FK
	FOREIGN KEY (IDCommentaire)
	REFERENCES CommentairesEvenements(IDCommentaire);

ALTER TABLE Produits
	ADD CONSTRAINT Produits_Commande0_FK
	FOREIGN KEY (IDCommande)
	REFERENCES Commande(IDCommande);

ALTER TABLE Panier
	ADD CONSTRAINT Panier_Utilisateurs0_FK
	FOREIGN KEY (IDUtilisateur)
	REFERENCES Utilisateurs(IDUtilisateur);

ALTER TABLE Panier 
	ADD CONSTRAINT Panier_Utilisateurs0_AK 
	UNIQUE (IDUtilisateur);

ALTER TABLE Commande
	ADD CONSTRAINT Commande_Panier0_FK
	FOREIGN KEY (IDPanier)
	REFERENCES Panier(IDPanier);

ALTER TABLE LikerEvenements
	ADD CONSTRAINT LikerEvenements_LikesEvenements0_FK
	FOREIGN KEY (IDLike)
	REFERENCES LikesEvenements(IDLike);

ALTER TABLE LikerEvenements
	ADD CONSTRAINT LikerEvenements_Utilisateurs1_FK
	FOREIGN KEY (IDUtilisateur)
	REFERENCES Utilisateurs(IDUtilisateur);

ALTER TABLE Inscrire
	ADD CONSTRAINT Inscrire_Utilisateurs0_FK
	FOREIGN KEY (IDUtilisateur)
	REFERENCES Utilisateurs(IDUtilisateur);

ALTER TABLE Inscrire
	ADD CONSTRAINT Inscrire_Evenements1_FK
	FOREIGN KEY (IDEvenement)
	REFERENCES Evenements(IDEvenement);
