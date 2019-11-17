<?php
if (!isset($_SESSION)){
    session_start();
}
try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$bdd = db_local::getInstance();

$requete = $bdd->prepare("INSERT INTO `evenements`(`IDEvenement`, `NomEvenement`, `Description`, `Date`, `Prix`) 
                            VALUES (null,:nevent,:devent,:date,:pevent)");


$requete->bindValue(':nevent', $_POST['name_event'], PDO::PARAM_STR);
$requete->bindValue(':devent', $_POST['desc_event'], PDO::PARAM_STR);
$requete->bindValue(':date', $_POST['date_event'], PDO::PARAM_STR);
$requete->bindValue(':pevent', $_POST['prix_event'], PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();

echo "<script>alert(\"Votre évènement a bien été ajouté\");</script>";
echo '<script> document.location.replace("../event.php"); </script>';
?>