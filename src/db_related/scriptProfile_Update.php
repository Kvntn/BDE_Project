<?php

echo "<br><br><br><br><br>";
session_start();
/////////////////////////////////////
// UPDATES USER ENTRIES IN DATABASE//
/////////////////////////////////////

//this function checks the end of a string in a text or another string.
function endsWith($string, $endString) 
{ 
    $len = strlen($endString);
    if ($len == 0)
        return true; 

    return (substr($string, -$len) === $endString); 
} 


try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}


include "../head.php";
include "../nav.php";


if($_POST['conf_newpw'] != $_POST['newpw']){
    echo "<h1>Les mots de passe ne correspondent pas</h1>";
    sleep(3);
    header("Location: ../connexion.php#toregister");
}

/*if(isset($_FILES['pdp']) AND !empty($_FILES['pdp']['name']))
{
    $tailleMax = 2097152;
    $extentionsValides = array('jpg', 'jpeg', 'gif', 'png');
}*/
    
$_POST['newpw'] = md5($_POST['newpw']);


$bdd = db_national::getInstance();

$_POST['stat'] = (int)$_POST['stat'];
$_POST['centre'] = (int)$_POST['centre'];

$requete = $bdd->prepare("UPDATE utilisateurs SET
                        MotDePasse = :mdp, 
                        Statut = :stat, 
                        PhotoDeProfil = :pdp, 
                        IDCentre = :centre
                        WHERE email=:mail ");


$requete->bindValue(':mail', $_SESSION['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['newpw'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);
$requete->bindValue(':centre', $_POST['centre'], PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();


//---------UPDATE FOR LOCAL DATABASE (NANTERRE) IF REGISTERED CENTER IS NANTERRE--------//

if($_POST['centre'] == 1)
     header("Location: ../index.php");


$bdd = db_local::getInstance();

$requete = $bdd->prepare("UPDATE utilisateurs(MotDePasse, Statut, PhotoDeProfil, IDCentre) 
                          SET (:mdp,:stat,:pdp,:centre) WHERE email=:email ");

$requete->bindValue(':email', $_SESSION['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['newpw'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);

$requete->execute();
$requete->closeCursor();

//Refresh password for this session
$_SESSION['motDePasse'] = $_POST['newpw'];

header("Location: ../profile_edit.php");

?>

