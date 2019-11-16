<?php     

include("head.php");
include("footer.php");
include("nav.php");

if (!isset($_SESSION)){
    session_start();
}

        try{
            require("./db_related/config.php");
        }catch(Exception $e) {
            throw new Exception("No config ! Incorrect file path or the file is corrupted");
        }

        $bdd = db_local::getInstance();

        

        $rq = $bdd->prepare("SELECT * FROM `likesevenements` WHERE IDUtilisateur = :iduser");

        $rq->bindValue(':iduser', $_SESSION['IDUtilisateur'], PDO::PARAM_STR);

        $rq->execute();
        if($rq == NULL) {
       

        
        $requete = $bdd->prepare("INSERT INTO `likesevenements`(`IDUtilisateur`, `IDEvenement`) VALUES (:iduser,:id)");

        $requete->bindValue(':iduser', $_SESSION['IDUtilisateur'], PDO::PARAM_STR);
        $requete->bindValue(':id', $_GET['id'], PDO::PARAM_STR);

        $requete->execute();
        $requete->closeCursor();

        echo '<script>alert("Vous avez liké l\'évènement");
        history.go(-1);</script>';

    }
    else {
        echo '<script>alert("Vous avez déjà liké l\'évènement");
        history.go(-1);</script>';
    }
?>
