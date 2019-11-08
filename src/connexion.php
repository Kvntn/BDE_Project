<!DOCTYPE html>

<!--####################################
 Auteur : Emma Prudent
 Date : 2017
 Contexte : Prosit Exia CESI - PHP/BDD
 #######################################-->

<html>

<?php 
    include("head.php");
?>

    <body>

    <!-- L'en-tête -->
    <header>
    <h1><strong>BDE</strong>Project</h1>
    </header>

    <!-- Le corps -->
    <div id="corps">

        <!-- Le menu -->
        <?php include("menu.php");
        $strUname=isset($_COOKIE['email']) ? $_COOKIE['email'] : "";
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
                                    <label for="email" class="uname"  > Email : </label>
                                    <input id="email" name="email" required="required" type="text" placeholder="Email" value="<?php print($strUname); ?>" />
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" > Mot de passe : </label>
                                    <input id="password" name="motDePasse" required="required" type="password" placeholder="motdepasse" />
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
                            <form  method="post" action="./db_related/scriptInscription.php" autocomplete="on">
                                <h1> Inscription </h1>
                                <p>
                                    <label for="email" class="uname"  >Email : *</label>
                                    <input id="emailsignup" name="email" required="required" type="text" placeholder="Entrez votre adresse mail @viacesi.fr" />
                                </p>

                                <p>
                                    <label for="passwordsignup" class="youpasswd"  >Mot de passe : *</label>
                                    <input id="passwordsignup" name="motDePasse" required="required" type="password" placeholder="Saisissez un mot de passe"/>
                                </p>

                                <p>
                                    <label for="passwordsignup" class="youpasswd"  >Réécrivez votre mot de passe : *</label>
                                    <input id="passwordsignup" name = "confirmPassword" required="required" type="password" placeholder="Saisissez un mot de passe"/>
                                </p>

                                <p>
                                    <label for="Statut" class="uname"  >Votre statut a sein de l'école : *</label>
                                    <select name="stat"  class=form-control>
                                        <option value=0>Etudiant</option>
                                        <option value=1>Membre du BDE</option>
                                        <option value=2>Personnel du CESI</option>
                                    </select>
                                </p>

                                <p>
                                    <label for="Photo" class="uname"  >Photo : </label>
                                    <input id="Photosignup" name="Photo" type="text" placeholder="Lien vers votre photo de profil" />
                                </p>

                                <p>
                                    <label for="Centre" class="uname" >Votre centre : *</label>
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
            </section>
           <br><br><br><br><br><br><br><br>
           <p><i>* : champs obligatoires </i></p>
        </div>
    </div>
    </body>
</html>