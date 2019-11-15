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

// PASSWORD CHECK a-z A-Z 0-9  @!:;,§/?*µ$=+
$char = "abcdefghijklmnopqrstuvwyxz0123456789@!:;,§/?*µ$=+";
$nb_char = 6;
$password = $_POST['motDePasse'];


if (strlen($password) < $nb_char) {
    echo "Mot de passe trop court !";
}

if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) {
    echo 'Mot de passe conforme';
} else {
    header('Location: ../connexion.php#tologin');
}	



if($_POST['confirmPassword'] != $_POST['motDePasse']){
    echo "<h1>Les mots de passe ne correspondent pas</h1>";
    header("Location: ../connexion.php#toregister");
}
    
$_POST['motDePasse'] = md5($_POST['motDePasse']);


if(!endsWith($_POST['email'], '@viacesi.fr')) {
    echo "<h1>Votre adresse mail n'appartient pas au CESI.</h1>";
    header("Location: ../connexion.php#toregister");
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
}
    

//Writing in national databse

$requete = $bdd->prepare("INSERT INTO utilisateurs(IDutilisateur,Email, MotDePasse, Statut, PhotoDeProfil, IDCentre) 
                          VALUES (null,:email,:mdp,:stat,:pdp,:centre) ");


$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);
$requete->bindValue(':centre', $_POST['centre'], PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();



//---------REQUESTS FOR LOCAL DATABASE (NANTERRE) IF REGISTERED CENTER IS NANTERRE--------//



if($_POST['centre'] != 1)
    echo '<script> document.location.replace("../connexion.php#tologin"); </script>'; 


$bdd = db_local::getInstance();

$requete = $bdd->prepare("INSERT INTO utilisateurs(IDutilisateur, Email, MotDePasse, Statut, PhotoDeProfil) 
                        VALUES (null,:email,:mdp,:stat, :pdp)");

$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);

$requete->execute();
$requete->closeCursor();

//Linking shopcart with user
$requete = $bdd->prepare("UPDATE utilisateurs SET IDPanier = IDUtilisateur");
$requete->execute();
$requete->closeCursor();

$requete = $bdd->prepare("UPDATE panier SET IDutilisateur = (SELECT IDPanier FROM utilisateurs WHERE panier.IDPanier = IDPanier)");
$requete->execute();
$requete->closeCursor();

echo '<script> document.location.replace("../connexion.php#tologin"); </script>'; 
?>

