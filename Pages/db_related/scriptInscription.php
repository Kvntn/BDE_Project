<?php

include("config.php");

$bdd = db_national::getInstance();

var_dump($_POST);

$email = $_POST['email'];

// Requête préparée pour empêcher les injections SQL
//$requete = $bdd->prepare("SELECT (email, motDePasse) FROM utilisateurs WHERE email=:email");
//$requete = $bdd->prepare("SELECT (email, motDePasse) FROM utilisateurs WHERE email=:email");

$requete = $bdd->prepare("INSERT INTO `utilisateurs`(
    IDutilisateur,Email, MotDePasse, Statut, PhotoDeProfil, IDCentre
    ) VALUES (null,:email,:mdp,:stat,:pdp,:centre) ");


$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':stat', $_POST['stat'], PDO::PARAM_INT);
$requete->bindValue(':pdp', $_POST['Photo'], PDO::PARAM_STR);
$requete->bindValue(':centre', $_POST['centre'], PDO::PARAM_INT);

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

