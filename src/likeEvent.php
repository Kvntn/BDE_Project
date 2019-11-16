<?php      
if (!isset($_SESSION)){
    session_start();
}

        try{
            require("./db_related/config.php");
        }catch(Exception $e) {
            throw new Exception("No config ! Incorrect file path or the file is corrupted");
        }

        $id = $_GET['id'];

        $iduser = $_SESSION['IDUtilisateur'];

       

        $bdd = db_local::getInstance();
        $requete = $bdd->prepare("INSERT INTO `likesevenements`(`IDUtilisateur`, `IDEvenement`) VALUES ($iduser,$id)");
        $requete->execute();
        $requete->closeCursor();

        echo '<script>alert("Vous avez liké l\'évènement");
        history.go(-1);</script>';
?>
