<?php

echo '<br><br><br><br>';
include "config.php";
require "../head.php";
require "../menu.php";


if($_POST['confirmPassword'] != $_POST['motDePasse'])
    header("Location: ./ressources/connexion.php#toregister");

$bdd = db_national::getInstance();

$email = $_POST['email'];
$_POST['stat'] = (int)$_POST['stat'];
$_POST['centre'] = (int)$_POST['centre'];

//var_dump($_POST);

// Requête préparée pour empêcher les injections SQL
//$requete = $bdd->prepare("SELECT (email, motDePasse) FROM utilisateurs WHERE email=:email");

$requete = $bdd->prepare("INSERT INTO utilisateurs(IDutilisateur,Email, MotDePasse, Statut, PhotoDeProfil, IDCentre) 
                          VALUES (null,:email,:mdp,:stat,:pdp,:centre) ");


$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);
$requete->bindValue(':centre', $_POST['centre'], PDO::PARAM_INT);

$requete->execute();

$requete->closeCursor();

echo "<script type='text/javascript'>document.location.replace('../connexion.php#tologin');</script>";

?>

