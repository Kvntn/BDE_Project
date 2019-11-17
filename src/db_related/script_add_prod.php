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

$requete = $bdd->prepare("INSERT INTO `listeproduits`(`IDProduit`, `NomProduit`, `Description`, `Prix`, `Photo`, `Categorie`) 
                            VALUES (null,:nprod,:dprod,:pprod,:iprod,:cprod)");


$requete->bindValue(':nprod', $_POST['name_prod'], PDO::PARAM_STR);
$requete->bindValue(':dprod', $_POST['desc_prod'], PDO::PARAM_STR);
$requete->bindValue(':pprod', $_POST['prix_prod'], PDO::PARAM_INT);
$requete->bindValue(':iprod', $_POST['photo_prod'], PDO::PARAM_STR);
$requete->bindValue(':cprod', $_POST['cat_prod'], PDO::PARAM_STR);

$requete->execute();
$requete->closeCursor();

echo "<script>alert(\"Votre produit a bien été ajouté\");</script>";
echo '<script> document.location.replace("../shop.php"); </script>';
?>