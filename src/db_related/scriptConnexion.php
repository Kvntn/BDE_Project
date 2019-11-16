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

// md5 hash for password security (unidirectional since it is not an "encryption" and you cant "decrypt" it (unless you wanna waste all your lifetime))
$motDePasse = md5($_POST['motDePasse']); 

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE email=:email AND MotDePasse=:motDePasse");

$requete->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();


if ($arr != NULL) {
        
    $tmp = str_replace('@viacesi.fr', '', $_POST['email']);
    $tmp = explode('.', $tmp);

    foreach($tmp as $arr_ => $val)
        $val = ucfirst($val);

    $_SESSION               = $arr[0];
    $_SESSION['login']      = true;
    $_SESSION['firstname']  = $tmp[0];
    $_SESSION['name']       = $tmp[1];
    $_SESSION['unhashed']   = $_POST['motDePasse'];

    echo "Logged in as $tmp[1] $tmp[0] !";

  

    if(isset($_COOKIE['accept_cookie']) && $_COOKIE['accept_cookie'] == true) {
        setcookie('firstname',$_SESSION['firstname'], time() + 24*3600, "/", null, false, true);
        setcookie('name', $_SESSION['name'], time() + 24*3600, "/", null, false, true);
        setcookie('ID',$_SESSION['IDUtilisateur'], time() + 24*3600, "/", null, false, true);
    }
    
    header('Location: ../index.php');
    
}else{
    echo '<h2>Utilisateur non trouvé ! Êtes-vous bien inscrits sur le centre de Nanterre ? Votre email : '. $_POST['email'] .'</h2>';
    session_destroy();
    //header("Location: ../connexion.php#tologin");
}

?>