<?php
    include "head.php";
    unset($_SESSION['email']);
    unset($_SESSION['motDePasse']);
    if (isset($_SESSION['cart']))
    {
        if ($_SESSION['cart'] != NULL)
        {
            require('./productDisplay.php');
            require('./db_related/pdo_loc.php');
            try{
                require("./db_related/config.php");
            }catch(Exception $e) {
                throw new Exception("No config ! Incorrect file path or the file is corrupted");
            }
            $bdd = db_local::getInstance();
            var_dump($_SESSION['cart']);
            foreach($_SESSION['cart'] as $rows => $key){
                $tnom = $key['NomProduit'];
                $tdesc = $key['Description'];
                $tprix = $key['Prix'];
                $tphoto = $key['PhotoProduit'];
                $tquantity = $key['Quantite'];
                $tprixtotal = $key['Prix_Total'];
                $requete = $bdd->prepare("INSERT INTO `panier`(`NomProduit`, `Description`, `Prix`, `PhotoProduit`, `Quantite`, `Prix_Total`, `IDUtilisateur`) 
                VALUES ('$tnom', '$tdesc', $tprix, '$tphoto', $tquantity, $tprixtotal, ".$_SESSION['IDUtilisateur'].")");
                $requete->execute();
                $requete->closeCursor();
              }
        }
    }
    session_destroy();
    header('Location: index.php');
?>