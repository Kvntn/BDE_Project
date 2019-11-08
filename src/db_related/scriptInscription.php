<?php

echo '<br><br><br><br>';
include "config.php";
require "../head.php";
require "../nav.php";


if($_POST['confirmPassword'] != $_POST['motDePasse']){
    echo "<script>alert(\"Les mots de passe ne correspondent pas\")</script>";
    header("Location: /src/connexion.php#toregister");
}
    
$_POST['motDePasse'] = md5($_POST['motDePasse']);

if(!strpos($_POST['email'], '@viacesi.fr')){
    echo "<script>alert(\"Votre adresse mail n'appartient pas au CESI.\")</script>";
    header("Location: /src/connexion.php#toregister");
}

$bdd = db_national::getInstance();

$_POST['stat'] = (int)$_POST['stat'];
$_POST['centre'] = (int)$_POST['centre'];


$requete = $bdd->prepare("INSERT INTO utilisateurs(IDutilisateur,Email, MotDePasse, Statut, PhotoDeProfil, IDCentre) 
                          VALUES (null,:email,:mdp,:stat,:pdp,:centre) ");


$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);
$requete->bindValue(':centre', $_POST['centre'], PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();


////////////////////////////////////////////////////////////////////////////////////////////
//---------REQUESTS FOR LOCAL DATABASE (NANTERRE) IF REGISTERED CENTER IS NANTERRE--------//
////////////////////////////////////////////////////////////////////////////////////////////


if($_POST['centre'] == 1){

    $bdd = db_local::getInstance();

    $requete = $bdd->prepare("INSERT INTO utilisateurs(IDutilisateur,Email, MotDePasse, Statut, PhotoDeProfil) 
                            VALUES (null,:email,:mdp,:stat, :pdp)");

    $requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
    $requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
    $requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();

    $requete = $bdd->prepare("UPDATE utilisateurs SET IDPanier = IDUtilisateur");
    $requete->execute();
    $requete->closeCursor();

    $requete = $bdd->prepare("UPDATE panier SET IDutilisateur = (SELECT IDPanier FROM utilisateurs WHERE panier.IDPanier = IDPanier)");
    $requete->execute();
    $requete->closeCursor();
}





//echo "<script type='text/javascript'>document.location.replace('../connexion.php#tologin');</script>";

?>

