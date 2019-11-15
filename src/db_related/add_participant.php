<?php
session_start();

try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$idparticipant = $_SESSION['IDutilisateur'];
$idevent = $_SESSION['IDEvenement'];

try{
$bdd = db_local::getInstance();

$requete=$bdd->prepare("INSERT INTO inscrire (IDUtilisateur, IDEvenement) VALUES ($idparticipant, $idevent)");
$requete->execute();
$requete->closeCursor();

header("Location: ../singleevent.php");
}catch(Exception $e){
    echo "<script>alert(\"Vous êtes déja inscrit a l'evenement\");history.go(-1);</script>";
}


?>