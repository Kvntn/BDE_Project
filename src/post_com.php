<?php
$requete = $bdd->prepare("INSERT commentairesevenement(ContenuCommentaire,IDEvenement,IDUtilisateur) 
                          VALUES (':contenue','IDEvent','IDUser') ");


$requete->bindValue(':contenue', $_POST['name_com'], PDO::PARAM_STR);
$requete->bindValue(':IDEvent', $_POST['motDePasse'], PDO::PARAM_STR);
$requete->bindValue(':IDUser', $_SESSION['IDUtilisateur'], PDO::PARAM_INT);

?>