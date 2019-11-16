<?php 
if (!isset($_SESSION)){
    session_start();
}
?>

<!DOCTYPE html>

<html>

<?php 
    include("head.php");
    
?>

    <body>

    <!-- Le corps -->
    <div id="corps">   
        <br><br><br><br>
        <!-- Le menu -->
        <?php include("nav.php");
        $strEmail=isset($_COOKIE['email']) ? $_COOKIE['email'] : "";
        $strPw=isset($_COOKIE['pw']) ? $_COOKIE['pw'] : "";
        ?>
        <div class="container">
            <section>
                <div id="container" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="post" action="./db_related/scriptConnexion.php" autocomplete="on">
                                <h1>Connexion</h1>
                                <p> 
                                    <label for="email" class="field_c"  > Email : </label>
                                    <input id="email" name="email" required="required" type="text" placeholder="Email" value="<?php print($strEmail); ?>" />
                                </p>
                                <p> 
                                    <label for="password" class="field_c" > Mot de passe : </label>
                                    <input id="password" name="motDePasse" required="required" type="password" placeholder="motdepasse" value="<?php print($strPw); ?>" />
                                </p>

                                <p class="login button">
                                    <input type="submit" value="Connexion" />
                                </p>
                                <p class="change_link">
                                    Pas encore inscrit ?
                                    <a href="#toregister" class="to_register">Inscription</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  method="POST" action="./db_related/scriptInscription.php" autocomplete="on">
                                <h1> Inscription </h1>
                                <p>
                                    <label for="email" class="field_c"  ><small>Email : *</small></label>
                                    <input name="email" id="emailsignup" required="required" type="text" placeholder="Entrez votre adresse mail @viacesi.fr" />
                                </p>

                                <p>
                                    <label for="motDePasse" class="field_c"  ><small>Mot de passe : (6 caractères, 1 majuscule, 1 chiffre, 1 symbole minimum)</small></label>
                                    <input name="motDePasse" id="passwordsignup" required="required" type="password" placeholder="Saisissez un mot de passe"/>
                                </p>

                                <p>
                                    <label for="confirmPassword" class="field_c"  >Réécrivez votre mot de passe : *</label>
                                    <input name = "confirmPassword" id="passwordsignup"  required="required" type="password" placeholder="Saisissez un mot de passe"/>
                                </p>

                                <p>
                                    <label for="Statut" class="field_c"  ><small>Votre statut a sein de l'école : *</small></label>
                                    <select name="stat"  class=form-control>
                                        <option value=0>Etudiant</option>
                                        <option value=1>Membre du BDE</option>
                                        <option value=2>Personnel du CESI</option>
                                    </select>
                                </p>

                                <!--<p>
                                    <label for="Photo" class="uname"  >Photo : </label>
                                    <input id="Photosignup" name="Photo" type="text" placeholder="Lien vers votre photo de profil" />
                                </p>-->

                                <p>
                                    <label for="Centre" class="field_c" <small>>Votre centre : *</small></label>
                                    <select  name="centre" >
                                        <option value=1>Nanterre</option>
                                        <option value=2>Orléans</option>
                                        <option value=3>Arras</option>
                                        <option value=4>Lille</option>
                                        <option value=5>La Rochelle</option>
                                        <option value=6>Strasbourg</option>
                                        <option value=7>Grenoble</option>
                                        <option value=8>Nice</option>
                                        <option value=9>Montpellier</option>
                                        <option value=10>Bordeaux</option>
                                        <option value=11>Pau</option>
                                        <option value=12>Rouen</option>
                                    </select>
                                </p>

                                <p>
                                    <input type='checkbox' name='case' required="required" value='on'>  Accepter les <a href= "legalnotice.php"> conditions d'utilisation </a>
                                </p>

                                <p class="signin button">
                                    <input type="submit" value="S'inscrire"/>
                                </p>
                                <p class="change_link">
                                    Déjà inscrit ?
                                    <a href="#tologin" class="to_register"> Connexion </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <br><br><br><br><br><br><br><br><br>
            </section>
            <br><br><br><br><br><br><br><br><br>
        </div>
    </div>
    </body>
    
    <?php 
    include("footer.php");
    ?>
</html>