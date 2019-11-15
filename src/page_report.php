<?php
if (!isset($_SESSION)){
    session_start();
}

    include("head.php");
    include("nav.php");
    include("footer.php");


      try{
          require("./db_related/config.php");
      }catch(Exception $e) {
          throw new Exception("No config ! Incorrect file path or the file is corrupted");
      }

    if(isset($_GET['id'])) {
      $_SESSION['IDEvenement'] = $_GET['id'];
    }
    $id = $_SESSION['IDEvenement'];
    $bdd = db_local::getInstance();

    $requete = $bdd->prepare("SELECT * FROM evenements WHERE IDEvenement = $id");
    $requete->execute();
    $event = $requete->fetch();
?>
<div>
    <div class="card-header bg-dark">

      <ul class="nav nav-tabs card-header-tabs">

        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab">Signaler un Post</a>
        </li>
      </ul>

    </div>

    <div>
      <div class="card-body tab-pane" >
      <form class="form" method="post" action="./db_related/report.php">

        <div class="form-label-group">
            <label>Signalement</label>
            <br>
            <input type="post" name="subject_report" class="form-control" placeholder="Veuillez precisez le nom de l'evenement, photo, commentaire">
            <br>
            <input type="post" name="msg_report" class="form-control" placeholder="Message">
        </div>
            <br>

        <button class="btn btn-secondary" name="send_report" type="submit">Envoyer</button>

      </form>
      </div>
    </div>
</div>
