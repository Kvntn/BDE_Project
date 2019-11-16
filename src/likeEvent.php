<?php      
if (!isset($_SESSION)){
    session_start();
}

        try{
            require("./db_related/config.php");
        }catch(Exception $e) {
            throw new Exception("No config ! Incorrect file path or the file is corrupted");
        }

        var_dump($_GET);
        $id = $_GET['id'];

        $iduser = $_SESSION['IDutilisateur'];

        var_dump($_SESSION);

        $bdd = db_local::getInstance();
        $requete = $bdd->prepare("INSERT INTO `likescommentaires`(`IDUtilisateur`, `IDCommentaire`) VALUES ($iduser,$id)");
        $requete->execute();
        $requete->closeCursor();
?>