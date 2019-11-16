<?php
    if (!isset($_SESSION))
        session_start();

    try{
        require "./db_related/config.php";
    }catch(Exception $e) {
        throw new Exception("No config ! Incorrect file path or the file is corrupted");
    }

    $pid = $_SESSION['IDutilisateur'];
    $prixtotal = 0;
    foreach($_SESSION['cart'] as $rows => $key){
        $prixtotal = $prixtotal + ($key['PrixTotal']);
    }

    $bdd = db_local::getInstance();


    $requete = $bdd->prepare("INSERT INTO commande(`Prix_Total`, `IDUtilisateur`) VALUES ($prixtotal, 11)");
    $requete->execute();
    $requete->closeCursor();
    $tmp = $bdd->prepare("SELECT `IDCommande` FROM commande WHERE IDUtilisateur=11 AND `IDCommande`=LAST_INSERT_ID();");
    $tmp->execute();
    $getidcommmand = $tmp->fetch();

    foreach($_SESSION['cart'] as $rows => $key){
        $tnom = $key['NomProduit'];
        $tdesc = $key['Description'];
        $tprix = $key['Prix'];
        $tphoto = $key['Photo'];
        $tquantity = $key['Quantite'];
        $tprixtotal = $key['PrixTotal'];

        $requete = $bdd->prepare("INSERT INTO `produits`(`NomProduit`, `Description`, `Prix`, `PhotoProduit`, `Quantite`, `Prix_Total`, `IDCommande`) VALUES ('$tnom', '$tdesc', $tprix, '$tphoto', $tquantity, $tprixtotal, ".$getidcommmand['IDCommande'].")");
        $requete->execute();
        $requete->closeCursor();
    }
    unset($_SESSION['cart']);
    $header="MIME-Version: 1.0\r\n";
    $header.='From: teamg2trks@gmail.com \r\n';
    $header.='Content-Type:text/html;charset="utf-8"'."\n";
    $header.='Content-Transfert-Encocdin: 8bit';

    $msg=$getidcommmand;
    var_dump($msg);

?>