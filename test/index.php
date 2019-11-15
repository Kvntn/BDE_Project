<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="register" class="animate form">
        <form  method="POST" action="scriptInscription.php" autocomplete="on">
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

            <!--<p> Azerty8*
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
</body>
</html>