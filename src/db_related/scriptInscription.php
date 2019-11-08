<?php
echo '<br><br><br><br><br>';
include "config.php";
require "../head.php";
require "../menu.php";


if($_POST['confirmPassword'] != $_POST['motDePasse'])
    header("Location: ./ressources/connexion.php#toregister");


$bdd = db_national::getInstance();

//TODO : strpos(@viacesi.fr)

var_dump($_POST);

$email = $_POST['email'];

(int)$_POST['stat'];
(int)$_POST['centre'];

var_dump($_POST);

// Requête préparée pour empêcher les injections SQL
//$requete = $bdd->prepare("SELECT (email, motDePasse) FROM utilisateurs WHERE email=:email");

$requete = $bdd->prepare("INSERT INTO `utilisateurs`(
    IDutilisateur,Email, MotDePasse, Statut, PhotoDeProfil, IDCentre
    ) VALUES (null,:email,:mdp,:stat,:pdp,:centre) ");


$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':stat', $stat, PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);
$requete->bindValue(':centre', $centre, PDO::PARAM_INT);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();

if ($requete->fetchAll() == NULL) {
    session_start();
    $_SESSION['email'] = $email;
    setcookie('email', $email, time() + 365*24*3600, null, null, false, true);

    echo 'Login successful with mail : '.$email;
}
else {
    echo 'Nickname not allowed ! Try again';
}

?>

