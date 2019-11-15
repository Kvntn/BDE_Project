<?php


///////////////////////////////////////
// ADDS NEW USER IN NATIONAL DATABASE//
///////////////////////////////////////

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

$nb_char = 6;


if (strlen($_POST['motDePasse']) < $nb_char) {
    echo "Mot de passe trop court !";
}

if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['motDePasse'])) {
    echo 'Mot de passe conforme';
} else {
    echo '<script> document.location.replace("../connexion.php#toregister"); </script>';
    die();
}	



if($_POST['confirmPassword'] != $_POST['motDePasse']){
    echo "<h1>Les mots de passe ne correspondent pas</h1>";
    echo '<script> document.location.replace("../connexion.php#toregister"); </script>';
    die();
}
    
$_POST['motDePasse'] = md5($_POST['motDePasse']);


if(!endsWith($_POST['email'], '@viacesi.fr')) {
    echo "<h1>Votre adresse mail n'appartient pas au CESI.</h1>";
    echo '<script> document.location.replace("../connexion.php#toregister"); </script>';
    die();
}

if(!isset($_POST['Photo'])) {
    $_POST['Photo'] = null;
}

$bdd = db_national::getInstance();

$_POST['stat'] = (int)$_POST['stat'];
$_POST['centre'] = (int)$_POST['centre'];

//The following part verifies the existence of an already existing account with the entered mail.
$requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE Email=:email AND MotDePasse=:mdp");

$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();

if($arr != NULL) {
    echo "L'email de cet utilisateur existe déjà";
    echo '<script> document.location.replace("../connexion.php#toregister"); </script>';
    die(); 
}

$email = $_POST['email'];
$tmp = str_replace('@viacesi.fr', '', $email);
$tmp = explode('.', $tmp);
$tmp[0] = ucfirst($tmp[0]);
$tmp[1] = ucfirst($tmp[1]);

//Writing in national databse
$requete = $bdd->prepare("INSERT INTO utilisateurs(IDutilisateur,Nom,Prenom,Email, MotDePasse, Statut, PhotoDeProfil, IDCentre) 
                          VALUES (null,:lname,:fname,:email,:mdp,:stat,:pdp,:centre) ");


$requete->bindValue(':lname', $tmp[1], PDO::PARAM_STR);
$requete->bindValue(':fname', $tmp[0], PDO::PARAM_STR);
$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);
$requete->bindValue(':centre', $_POST['centre'], PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();



//---------REQUESTS FOR LOCAL DATABASE (NANTERRE) IF REGISTERED CENTER IS NANTERRE--------//



if($_POST['centre'] != 1){
    echo "<script>alert(\"Vous êtes sur le mauvais site du BDE de votre centre\");</script>";
    echo '<script> document.location.replace("https://www.google.fr/"); </script>'; 
    die();
}


$bdd = db_local::getInstance();

$LocalRequest = $bdd->prepare("INSERT INTO utilisateurs(IDutilisateur, Nom, Prenom, Email, MotDePasse, Statut, PhotoDeProfil) 
                        VALUES (null,:lname,:fname,:email,:mdp,:stat,:pdp)");

$LocalRequest->bindValue(':lname', $tmp[1], PDO::PARAM_STR);
$LocalRequest->bindValue(':fname', $tmp[0], PDO::PARAM_STR);
$LocalRequest->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$LocalRequest->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$LocalRequest->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$LocalRequest->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);

$LocalRequest->execute();
$LocalRequest->closeCursor();

//Linking shopcart with user
$requete = $bdd->prepare("UPDATE utilisateurs SET IDPanier = IDUtilisateur");
$requete->execute();
$requete->closeCursor();

$requete = $bdd->prepare("UPDATE panier SET IDutilisateur = (SELECT IDPanier FROM utilisateurs WHERE panier.IDPanier = IDPanier)");
$requete->execute();
$requete->closeCursor();

echo '<script> document.location.replace("../connexion.php#tologin"); </script>'; 
?>
