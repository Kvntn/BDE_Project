<?php
if (!isset($_SESSION)){
    session_start();
}
try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];}


$bdd = db_local::getInstance();

$requete = $bdd->prepare("DELETE FROM `listeproduits` WHERE IDProduit=$id");

$requete->execute();
$requete->closeCursor();

echo "<script>alert(\"Votre produit a bien été supprimer\");</script>";
echo '<script> document.location.replace("../shop.php"); </script>';
?>