<?php

if (!isset($_SESSION)){
    session_start();
}

    try{
        require("./db_related/config.php");
    }catch(Exception $e) {
        throw new Exception("No config ! Incorrect file path or the file is corrupted");
    }

//   $id = $_SESSION['IDEvenement'];
//   $com = $_POST['name_com'];
//   $idutilisateur = $_SESSION['IDutilisateur'];

  $bdd = db_local::getInstance();
    var_dump($_SESSION);
  $requete = $bdd->prepare("INSERT INTO `photos`(`LienPhoto`, `IDEvenement`, `IDUtilisateur`)
                            VALUES (:contenu,:IDEvent,:IDUser)");

    $requete->bindValue(':contenu', $_POST['name_img'], PDO::PARAM_STR);
    $requete->bindValue(':IDEvent', $_SESSION['IDEvenement'], PDO::PARAM_STR);
    $requete->bindValue(':IDUser', '1', PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
?>