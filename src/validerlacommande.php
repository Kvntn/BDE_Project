<?php
if (!isset($_SESSION))
    session_start();

try{
    require "./db_related/config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$ptotal     = $_SESSION['cart'][0]['PrixTotal'];
$pid        = $_SESSION['IDutilisateur'];
$tmp_date   = (string)date('Y-m-d');
$date       = date('Y-m-d', strtotime($tmp_date));

echo 'Current timezone : '. date_default_timezone_get();
echo '<br>'.$date;

var_dump($_SESSION);

$bdd = db_local::getInstance();

$requete=$bdd->prepare("INSERT INTO commande (IDCommande, Date, Prix_Total, IDUtilisateur) 
                        VALUES (null, CURDATE(), $ptotal, (
                            SELECT utilisateurs.IDUtilisateur FROM utilisateurs 
                            INNER JOIN commande 
                            ON commande.IDUtilisateur = utilisateurs.IDUtilisateur))");

// $requete=$bdd->prepare("INSERT INTO commande (IDCommande, Date, Prix_Total, IDUtilisateur) 
//                         VALUES (null, CURDATE(), $ptotal, (
//                             SELECT IDUtilisateur FROM utilisateurs 
//                             INNER JOIN utilisateurs 
//                             ON utilisateurs.IDUtilisateur = commande.IDUtilisateur))");

$requete->execute();
$requete->closeCursor();

//echo '<script>document.window.location("./cart.php")</script>';
?>