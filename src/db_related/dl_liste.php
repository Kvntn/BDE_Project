<?php

if (!isset($_SESSION)){
    session_start();
}


try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

if(isset($_GET['id'])) {
    $_SESSION['IDEvenement'] = $_GET['id'];
 }
$id = $_SESSION['IDEvenement'];

$bdd = db_local::getInstance();

$requete=$bdd->prepare("SELECT Prenom, Nom FROM utilisateurs INNER JOIN inscrire ON utilisateurs.IDUtilisateur = inscrire.IDUtilisateur WHERE IDevenement = $id");
$requete->execute();
$array=$requete->fetchAll();
$requete->closeCursor();



header("Content-Type: text/csv");
header("Content-disposition: filename=liste_des_inscrits.csv");

// Création de la ligne d'en-tête
$entete = array("PRENOM", "NOM");

$separateur = ";";

// Affichage de la ligne de titre, terminée par un retour chariot
echo implode($separateur, $entete)."\r\n";

// Affichage du contenu du tableau
foreach ($array as $array) {
	echo implode($separateur, $array)."\r\n";
}
?>
<script>history.go(-1);</script>";