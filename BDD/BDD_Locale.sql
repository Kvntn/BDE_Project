#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateurs
#------------------------------------------------------------

CREATE TABLE Utilisateurs(
        IDUtilisateur Int  Auto_increment  NOT NULL ,
        Email         Varchar (255) NOT NULL ,
        MotDePasse    Varchar (255) NOT NULL ,
        Satut         Int NOT NULL ,
        PhotoDeProfil Varchar (255) NOT NULL
	,CONSTRAINT Utilisateurs_PK PRIMARY KEY (IDUtilisateur)
)ENGINE=InnoDB;


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

	,CONSTRAINT Photos_Evenements_FK FOREIGN KEY (IDEvenement) REFERENCES Evenements(IDEvenement)
	,CONSTRAINT Photos_Utilisateurs0_FK FOREIGN KEY (IDUtilisateur) REFERENCES Utilisateurs(IDUtilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikesPhotos
#------------------------------------------------------------

CREATE TABLE LikesPhotos(
        IDLike        Int  Auto_increment  NOT NULL ,
        IDUtilisateur Int NOT NULL ,
        IDPhoto       Int NOT NULL
	,CONSTRAINT LikesPhotos_PK PRIMARY KEY (IDLike)

	,CONSTRAINT LikesPhotos_Utilisateurs_FK FOREIGN KEY (IDUtilisateur) REFERENCES Utilisateurs(IDUtilisateur)
	,CONSTRAINT LikesPhotos_Photos0_FK FOREIGN KEY (IDPhoto) REFERENCES Photos(IDPhoto)
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

	,CONSTRAINT CommentairesEvenements_Evenements_FK FOREIGN KEY (IDEvenement) REFERENCES Evenements(IDEvenement)
	,CONSTRAINT CommentairesEvenements_Utilisateurs0_FK FOREIGN KEY (IDUtilisateur) REFERENCES Utilisateurs(IDUtilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikesCommentaires
#------------------------------------------------------------

CREATE TABLE LikesCommentaires(
        IDLike        Int  Auto_increment  NOT NULL ,
        IDUtilisateur Int NOT NULL ,
        IDCommentaire Int NOT NULL
	,CONSTRAINT LikesCommentaires_PK PRIMARY KEY (IDLike)

	,CONSTRAINT LikesCommentaires_Utilisateurs_FK FOREIGN KEY (IDUtilisateur) REFERENCES Utilisateurs(IDUtilisateur)
	,CONSTRAINT LikesCommentaires_CommentairesEvenements0_FK FOREIGN KEY (IDCommentaire) REFERENCES CommentairesEvenements(IDCommentaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikesEvenements
#------------------------------------------------------------

CREATE TABLE LikesEvenements(
        IDLike Int  Auto_increment  NOT NULL
	,CONSTRAINT LikesEvenements_PK PRIMARY KEY (IDLike)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Panier
#------------------------------------------------------------

CREATE TABLE Panier(
        IDPanier      Int  Auto_increment  NOT NULL ,
        IDUtilisateur Int NOT NULL
	,CONSTRAINT Panier_PK PRIMARY KEY (IDPanier)

	,CONSTRAINT Panier_Utilisateurs_FK FOREIGN KEY (IDUtilisateur) REFERENCES Utilisateurs(IDUtilisateur)
	,CONSTRAINT Panier_Utilisateurs_AK UNIQUE (IDUtilisateur)
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

	,CONSTRAINT Commande_Panier_FK FOREIGN KEY (IDPanier) REFERENCES Panier(IDPanier)
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

	,CONSTRAINT Produits_Commande_FK FOREIGN KEY (IDCommande) REFERENCES Commande(IDCommande)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LikerEvenements
#------------------------------------------------------------

CREATE TABLE LikerEvenements(
        IDLike        Int NOT NULL ,
        IDUtilisateur Int NOT NULL
	,CONSTRAINT LikerEvenements_PK PRIMARY KEY (IDLike,IDUtilisateur)

	,CONSTRAINT LikerEvenements_LikesEvenements_FK FOREIGN KEY (IDLike) REFERENCES LikesEvenements(IDLike)
	,CONSTRAINT LikerEvenements_Utilisateurs0_FK FOREIGN KEY (IDUtilisateur) REFERENCES Utilisateurs(IDUtilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ContenirLikes
#------------------------------------------------------------

CREATE TABLE ContenirLikes(
        IDLike      Int NOT NULL ,
        IDEvenement Int NOT NULL
	,CONSTRAINT ContenirLikes_PK PRIMARY KEY (IDLike,IDEvenement)

	,CONSTRAINT ContenirLikes_LikesEvenements_FK FOREIGN KEY (IDLike) REFERENCES LikesEvenements(IDLike)
	,CONSTRAINT ContenirLikes_Evenements0_FK FOREIGN KEY (IDEvenement) REFERENCES Evenements(IDEvenement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Inscrire
#------------------------------------------------------------

CREATE TABLE Inscrire(
        IDUtilisateur Int NOT NULL ,
        IDEvenement   Int NOT NULL
	,CONSTRAINT Inscrire_PK PRIMARY KEY (IDUtilisateur,IDEvenement)

	,CONSTRAINT Inscrire_Utilisateurs_FK FOREIGN KEY (IDUtilisateur) REFERENCES Utilisateurs(IDUtilisateur)
	,CONSTRAINT Inscrire_Evenements0_FK FOREIGN KEY (IDEvenement) REFERENCES Evenements(IDEvenement)
)ENGINE=InnoDB;

