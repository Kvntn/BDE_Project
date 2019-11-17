CREATE TABLE panier (
        IDProduit    Int  Auto_increment  NOT NULL ,
        NomProduit   Varchar (255) NOT NULL ,
        Description  Text NOT NULL ,
        Prix         DECIMAL (15,3)  NOT NULL ,
        PhotoProduit Text NOT NULL ,
        Quantite     Int NOT NULL ,
        Prix_Total   DECIMAL (15,3)  NOT NULL ,
        IDUtilisateur   Int NOT NULL
	,CONSTRAINT Produits_PK PRIMARY KEY (IDProduit)

	,CONSTRAINT Panier_Utilisateurs_FK FOREIGN KEY (IDUtilisateur) REFERENCES utilisateurs(IDUtilisateur)
)ENGINE=InnoDB;