<?php

include("config.php");

$bdd = db_national::getInstance();
$arr = array();

$email = $_POST['email'];
$motDePasse = $_POST['motDePasse'];

// Requête préparée pour empêcher les injections SQL
//$requete = $bdd->prepare("SELECT (email, motDePasse) FROM utilisateurs WHERE email=:email");
$requete = $bdd->prepare("SELECT (email, motDePasse) FROM utilisateurs WHERE email=:email");

$requete->bindValue(':email', $email, PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();

if ($requete->fetchAll() == NULL) {
    session_start();
    $_SESSION['username'] = $email;
    setcookie('username', $email, time() + 365*24*3600, null, null, false, true);

    echo 'Login successful with mail : '.$email;
}
else {
    echo 'Nickname not allowed ! Try again';
}

?>

