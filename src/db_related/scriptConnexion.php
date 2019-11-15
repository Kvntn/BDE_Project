<?php
session_start();

try{
    require "config.php";
}catch(Exception $e) {
    throw new Exception("No config ! Incorrect file path or the file is corrupted");
}

$bdd = db_national::getInstance();

$email = $_POST['email'];

// md5 hash for password security (unidirectional since it is not an "encryption" and you cant "decrypt" it (unless you wanna waste all your lifetime))
$motDePasse = md5($_POST['motDePasse']); 

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("SELECT * FROM utilisateurs WHERE email=:email AND MotDePasse=:motDePasse");

$requete->bindValue(':email', $email, PDO::PARAM_STR);
$requete->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);

$requete->execute();
$arr = $requete->fetchAll();
$requete->closeCursor();

var_dump($arr);

if ($arr != NULL) {
        
        $tmp = str_replace('@viacesi.fr', '', $email);
        $tmp = explode('.', $tmp);

        $tmp[0] = ucfirst($tmp[0]);
        $tmp[1] = ucfirst($tmp[1]);
        $_SESSION = $arr[0];
        $_SESSION['login'] = true;

        echo "Logged in as $tmp[1] $tmp[0] !";

        setcookie('email', $email, time() + 365*24*3600, "/", null, false, true); 
        @setcookie('name', $tmp[1], time() + 365*24*3600, "/", null, false, true); 
        setcookie('pw', $_POST['motDePasse'], time() + 365*24*3600, "/", null, false, true);
        setcookie('firstname', $tmp[0], time() + 365*24*3600, "/", null, false, true); 
        setcookie('statut', $arr[0]['Statut'], time() + 365*24*3600, "/", null, false, true);

        var_dump($_COOKIE);
        var_dump($_SESSION);
        
        $bdd = db_local::getInstance();

        $requete = $bdd->prepare('UPDATE utilisateurs SET Prenom = :prenom, Nom = :nom WHERE Email=:email');
        $requete->bindValue(':prenom',$_COOKIE["firstname"],PDO::PARAM_STR);
        $requete->bindValue(':nom',$_COOKIE["name"],PDO::PARAM_STR);
        $requete->bindValue(':email',$email,PDO::PARAM_STR);
        $requete->execute();
        $requete->closeCursor();

        header('Location: ../index.php');
}else{
    echo '<h2>Unknown login ! Try again, you entered : '.$email.'</h2>';
    session_destroy();
    sleep(3);
    header("Location: ../connexion.php#tologin");
}

?>