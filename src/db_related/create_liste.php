<?php

session_start();

try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$bdd = db_local::getInstance();

//$event=$_POST['idevent'];

$requete=$bdd->prepare("SELECT Prenom, Nom FROM utilisateurs INNER JOIN inscrire ON utilisateurs.IDUtilisateur = inscrire.IDUtilisateur WHERE IDevenement = 1");
$requete->execute();
$array=$requete->fetchAll();
$requete->closeCursor();

//var_dump($array);

header("Content-Type: text/csv");
header("Content-disposition: filename=liste_des_inscrits.csv");

// Création de la ligne d'en-tête
$entete = array("Nom", "Prenom");

$separateur = ";";

// Affichage de la ligne de titre, terminée par un retour chariot
echo implode($separateur, $entete)."\r\n";

// Affichage du contenu du tableau
foreach ($array as $array) {
	echo implode($separateur, $array)."\r\n";
}

/*
$fp = fopen("export.csv", "w");
foreach($array as $fields):
    fputcsv($fp, $fields);
endforeach;
fclose($fp);

$nb=count($array);

for($a=0;$a<$nb;$a++)
{
    $ptr=implode($array[$a]);
    $name=explode("@", $ptr);
    echo $name[0];
    echo "<br />";
}*/

?>