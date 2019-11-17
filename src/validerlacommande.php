<?php

include("head.php");
include("footer.php");
include("nav.php");

    if (!isset($_SESSION))
        session_start();

    try{
        require "./db_related/config.php";
    }catch(Exception $e) {
        throw new Exception("No config ! Incorrect file path or the file is corrupted");
    }

    $pid = $_SESSION['IDUtilisateur'];
    $prixtotal = 0;
    foreach($_SESSION['cart'] as $rows => $key){
        $prixtotal = $prixtotal + ($key['Prix_Total']);
    }

    $bdd = db_local::getInstance();


    $requete = $bdd->prepare("INSERT INTO commande(`Prix_Total`, `IDUtilisateur`) VALUES ($prixtotal, $pid)");
    $requete->execute();
    $requete->closeCursor();
    $tmp = $bdd->prepare("SELECT `IDCommande` FROM commande WHERE IDUtilisateur=$pid AND `IDCommande`=LAST_INSERT_ID();");
    $tmp->execute();
    $getidcommmand = $tmp->fetch();

    foreach($_SESSION['cart'] as $rows => $key){
        $tnom = $key['NomProduit'];
        $tdesc = $key['Description'];
        $tprix = $key['Prix'];
        $tphoto = $key['PhotoProduit'];
        $tquantity = $key['Quantite'];
        $tprixtotal = $key['Prix_Total'];

        $requete = $bdd->prepare("INSERT INTO `produits`(`NomProduit`, `Description`, `Prix`, `PhotoProduit`, `Quantite`, `Prix_Total`, `IDCommande`) 
        VALUES ('$tnom', '$tdesc', $tprix, '$tphoto', $tquantity, $tprixtotal, ".$getidcommmand['IDCommande'].")");
        $requete->execute();
        $requete->closeCursor();
    }
    unset($_SESSION['cart']);
    

    //Send mail to student

    $header="MIME-Version: 1.0\r\n";
    $header.='From: teamg2trks@gmail.com \r\n';
    $header.='Content-Type:text/html;charset="utf-8"'."\n";
    $header.='Content-Transfert-Encocdin: 8bit';
    $mail=$_SESSION['Email'];
    $subject='Commande';
    $msg='Nous avons bien pris en compte votre commande. Vous pouvez venir la recuperer au bureau du BDE.';
    $send='
    Objet : '.$subject.'
    '.$msg;
    mail($mail,$subject,$send, $header);
  
   /* 
    //Send mail to BDE

    $command = $bdd->prepare("SELECT NomProduit,Quantite FROM produits INNER JOIN commande ON commande.IDCommande = produits.IDCommande WHERE IDUtilisateur = $pid");
    $command->execute();
    $display = $command->fetchAll();
    $command->closeCursor();
    $nb = count($display)-1;
    $nomProduit = $display[$nb]['NomProduit'];
    $quantite = $display[$nb]['Quantite'];
    $header="MIME-Version: 1.0\r\n";
    $header.='From: teamg2trks@gmail.com \r\n';
    $header.='Content-Type:text/html;charset="utf-8"'."\n";
    $header.='Content-Transfert-Encocdin: 8bit';
    $fname=$_SESSION['firstname'];
    $lname=$_SESSION['name'];
    $subject='Commande';
    $msg=$fname.' '.$lname.' a commandé '.$nomProduit.' en '.$quantite.' examplaire';
    $send='
    Objet : '.$subject.'
    '.$msg;
    mail("teamg2trks@gmail.com",$subject,$send, $header);
*/

    //keep this line at end of file
    echo '
        <script>
            alert("Votre commande a bien été prise en compte ! Un mail sera envoyé pour convenir de votre transaction avec un personnel du BDE.");
            document.location.replace("cart.php");
        </script>';
    

?>