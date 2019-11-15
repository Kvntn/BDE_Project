<!DOCTYPE html>
<html lang="en">

<?php 
  include("head.php");
  include("nav.php");
  echo "<br><br><br>";

?>
<body>

<div id="corps">
  <div class="container">
    <div class="animate form">
      <div id="wrapper">
        <form  method="post" action="./db_related/scriptProfile_Update.php" autocomplete="on" enctype="multipart/form-data">
          <h1>Modifiez votre profil</h1>
          <p>
              <label for="passwordsignup" class="youpasswd"  >Vote ancien mot de passe : *</label>
              <input id="passwordsignup" name="pw" required="required" type="password" placeholder="Saisissez votre ancien mot de passe"/>
          </p>
          <p>
              <label for="passwordsignup" class="youpasswd"  >Nouveau mot de passe : *</label>
              <input id="passwordsignup" name="newpw" required="required" type="password" placeholder="Entrez votre nouveau mot de passe"/>
          </p>

          <p>
              <label for="passwordsignup" class="youpasswd"  >Réécrivez votre mot de passe : *</label>
              <input id="passwordsignup" name = "conf_newpw" required="required" type="password" placeholder="Saisissez-le à nouveau"/>
          </p>

          <p>
              <label for="Statut" class="uname"  >Avez-vous un nouveau statut a sein de l'école : *</label>
              <select name="stat"  class=form-control>
                  <option value=0>Etudiant</option>
                  <option value=1>Membre du BDE</option>
                  <option value=2>Personnel du CESI</option>
              </select>
          </p>

          <!--<p>
              <label for="Photo" class="uname"  >Photo : </label>
              <input id="Photosignup" name="Photo" type="text" placeholder="Changez de photo !" />
          </p>-->
          <p>
            <label> Mettre une photo de profil :</label>
            <input type="file" name="Photo"/>
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
              <input type="submit" value="Valider !"/>
          </p>
          <br>
          <br>

        </form>
      </div>
    </div>
  </div>
  <br><br><br>
</div>


</body>

<?php include("footer.php");?>

</html>