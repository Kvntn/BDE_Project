<?php
try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$bdd = db_local::getInstance();

//$event=$_POST['idevent'];

$requete=$bdd->prepare("SELECT Email FROM utilisateurs INNER JOIN inscrire ON utilisateurs.IDUtilisateur = inscrire.IDUtilisateur WHERE IDevenement = 1");
$requete->execute();
$array=$requete->fetchAll();

$requete->closeCursor();

var_dump($array);

$ptr=implode($array['0']);

$name=explode("@", $ptr);
echo $name[0];

?>