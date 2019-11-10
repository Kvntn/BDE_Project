<?php

include("config.php");

$bdd = db_national::getInstance();

$email = $_POST['email'];
$motDePasse = $_POST['motDePasse'];

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("SELECT email, motDePasse FROM utilisateurs WHERE email=:email AND motDepasse=:motDePasse");

$requete->bindValue(':email', $email, PDO::PARAM_STR);
$requete->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();

var_dump($arr);

if ($arr != NULL) {
        echo 'Logged in as '.$_POST['email'];
        setcookie('email', $email, time() + 365*24*3600, null, null, false, true); 
}else{
    echo 'Unknown login ! Try again, you entered : '.$email.' '.$motDePasse;
}

?>