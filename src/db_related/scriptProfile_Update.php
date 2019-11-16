<?php

    if (!isset($_SESSION)){
    session_start();
  }

echo "<br><br><br><br><br>";
/////////////////////////////////////
// UPDATES USER ENTRIES IN DATABASE//
/////////////////////////////////////

//this function checks the end of a string in a text or another string.
function endsWith($string, $endString) 
{ 
    $len = strlen($endString);
    if ($len == 0)
        return true; 

    return (substr($string, -$len) === $endString); 
} 


try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}


include "../head.php";
include "../nav.php";


if($_POST['conf_newpw'] != $_POST['newpw']){
    echo "<h1>Les mots de passe ne correspondent pas</h1>";
    sleep(3);
    header("Location: ../connexion.php#toregister");
}
    
$_POST['newpw'] = md5($_POST['newpw']);


$bdd = db_national::getInstance();

//$_POST['stat'] = (int)$_POST['stat'];
$_POST['centre'] = (int)$_POST['centre'];
$id =$_SESSION['IDUtilisateur'];
var_dump($_SESSION);

if(isset($_FILES['Photo']) AND !empty($_FILES['Photo']['name']))
{
    $tailleMax = 2097152;
    $extentionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['Photo']['size'] <= $tailleMax)
    {
        $extentionUpload = strtolower(substr(strrchr($_FILES['Photo']['name'], '.'), 1));
        if(in_array($extentionUpload, $extentionsValides))
        {
            $repertory_server = "../resources/images/Photo_Profil/".$_SESSION['Email'].".".$extentionUpload;
            $resultat = move_uploaded_file($_FILES['Photo']['tmp_name'], $repertory_server);
            if($resultat)
            {
                $requete = $bdd->prepare("UPDATE utilisateurs SET
                        MotDePasse = :mdp, 
                        PhotoDeProfil = :pdp,
                        IDCentre = :centre
                        WHERE IDUtilisateur=:id ");
            }
            else
            {
                echo "<h1>Erreur durant l'importation du fichier</h1>";
            }
        }
        else
        {
            echo "<h1>Votre Photo doit être au format jpg, jpeg, gif or png</h1>"; 
        }
    }
    else
    {
        echo "<h1>La photo de profil est trop grosse</h1>";
    }
}




$requete->bindValue(':mdp', $_POST['newpw'], PDO::PARAM_STR);
$requete->bindValue(':id', $id, PDO::PARAM_INT);
$requete->bindValue(':pdp', $_SESSION['Email'], PDO::PARAM_STR);
$requete->bindValue(':centre', $_POST['centre'], PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();



//---------UPDATE FOR LOCAL DATABASE (NANTERRE) IF REGISTERED CENTER IS NANTERRE--------//

if($_POST['centre'] != 1)
     header("Location: ../index.php");


$bdd = db_local::getInstance();

$requete = $bdd->prepare("UPDATE utilisateurs SET MotDePasse = :mdp, PhotoDeProfil = :pdp WHERE IDUtilisateur=:id");

$requete->bindValue(':id', $id, PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['newpw'], PDO::PARAM_STR);
$requete->bindValue(':pdp', $_SESSION['Email'], PDO::PARAM_STR);

$requete->execute();
$requete->closeCursor();

//Refresh password for this session
$_SESSION['motDePasse'] = $_POST['newpw'];

//echo '<script>document.location.replace("index.php");
     //   </script>';

?>

