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

<div class="container-singleevent">

  <div class="card text-center">
    <div class="card-header bg-dark">

      <ul class="nav nav-tabs card-header-tabs">

        <li class="nav-item">
          <a class="nav-link active" href="#p1" data-toggle="tab">Evénement</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p2" data-toggle="tab">Commentaire</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p3" data-toggle="tab">Photo de l'événement</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#p4" data-toggle="tab">Poster un commentaire</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p5" data-toggle="tab">Poster une photo</a>
        </li>

      </ul>

    </div>

  <div class="tab-content">

      <div class="card-body tab-pane active" id="p1">
        <h5 class="card-title"><strong><?php echo $event['NomEvenement'] ?></strong><small class="text-right">     -     <?php echo $event['Prix'] ?>€</small></h5>
        <p class="card-text text-left"><?php echo $event['Description'] ?></p>
        <p class="text-right">
          <small><?php echo $event['Date']?></small><br>
          <button type="button" class="btn btn-default btn-lg">
          <span class="badge badge-light">0         <i class="fas fa-heart"></i></span>
          </button>
          <a class="btn btn-outline-warning" href="./db_related/add_participant.php" role="button">Intéressé</a>
          <?php
            if(@$_SESSION['Statut'] == 1 || @$_SESSION['Statut'] == 2) {
              echo '
              <a class="btn btn-outline-info" href="list_participants" role="button">Acceder à la liste des participants</a>
              <input class="btn btn-outline-danger" type="submit" value="Signaler">';
            }
          ?>
        </p>
      </div>

      <div class="tab-pane" id="p2">

      <?php
          require('./comDisplay.php');
          try{
              require("./db_related/config.php");
          }catch(Exception $e) {
              throw new Exception("No config ! Incorrect file path or the file is corrupted");
          }
          $bdd = db_local::getInstance();
          $idevent = $_SESSION['IDEvenement'];
          $requete = $bdd->prepare("SELECT * from commentairesevenements WHERE IDEvenement = $idevent");
          $requete->execute();
          $listcom = $requete->fetchAll();
          $coms = new Commentaires($listcom);
          $coms->display($listcom);
      ?>

      </div>

      <div class="card-body tab-pane" id="p3">
       
      <div class="row">

      <?php
          require('./imgDisplay.php');
          try{
              require("./db_related/config.php");
          }catch(Exception $e) {
              throw new Exception("No config ! Incorrect file path or the file is corrupted");
          }
          $bdd = db_local::getInstance();
          $idevent = $_SESSION['IDEvenement'];
          $requete = $bdd->prepare("SELECT * from photos WHERE IDEvenement = $idevent");
          $requete->execute();
          $listimg = $requete->fetchAll();
          $coms = new Image($listimg);
          $coms->display($listimg);
      ?>
            
      </div>
      </div>

      <div class="card-body tab-pane" id="p4">
      <form class="form" method="post" action="post_com.php">

        <div class="form-label-group">
            <label>Commentaire</label>
            <input type="post" name="name_com" class="form-control" required>
        </div>
            <br>

        <button class="btn btn-secondary" name="add_com" type="submit">Ajouter le commentaire</button>

      </form>
      </div>

      <div class="card-body tab-pane" id="p5">
      <form class="form" method="post" action="post_img.php">

        <div class="form-label-group">
            <label>Photo</label>
            <input type="post" name="name_img" class="form-control" placeholder="Veuillez inserer un lien provenant d'un navigateur." required>
        </div>
          <br>

        <button class="btn btn-secondary" name="add_com" type="submit">Ajouter la photo</button>

      </form>
      </div>

  </div>

</div>