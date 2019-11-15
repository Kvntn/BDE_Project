<?php  
    session_start();
    include("head.php");
    include("nav.php");
    include("footer.php");


      require('./db_related/pdo_loc.php');
      try{
          require("./db_related/config.php");
      }catch(Exception $e) {
          throw new Exception("No config ! Incorrect file path or the file is corrupted");
      }

    if(isset($_GET['id'])) {
      $id = $_GET['id'];
    }
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

      </ul>

    </div>

  <div class="tab-content">

      <div class="card-body tab-pane active" id="p1">
        <h5 class="card-title"><strong><?php echo $event['NomEvenement'] ?></strong><small class="text-right">     -     <?php echo $event['Prix'] ?>€</small></h5>
        <p class="card-text text-left"><?php echo $event['Description'] ?></p>
        <p class="text-right">
          <small><?php echo $event['Date']?></small><br>
          <input class="btn btn-outline-warning" type="submit" value="Intéressé">
          <?php
            if(@$_SESSION['Statut'] == 2) {
              echo '
              <a class="btn btn-outline-info" href="list_participants" role="button">Acceder à la liste des participants</a>
              <input class="btn btn-outline-danger" type="submit" value="Signaler">';
            }
          ?>
        </p>
      </div>

      <div class="tab-pane" id="p2">

        <div class="list-group-item list-group-item flex-column align-items-start text-left">
          <div class="inline"> 
          <h4><img class="text-right rounded" src="./resources/images/Photo_Profil/thomas.lima@viacesi.fr.jpg" style="max-width: 20px; height:20px;" alt="">      Thomas Lima</h4>
          </div>
          <p>Wow super weekend, surtout quand on peu pas y aller psq on est en deuxieme année</p>
          <button type="button" class="btn btn-default btn-lg">
          <span class="badge badge-light">0         <i class="fas fa-heart"></i></span>
          </button>
        </div>

      </div>

      <div class="card-body tab-pane" id="p3">
       
      <div class="row">

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" style="max-width:1000px; max-height:600px;" src="./resources/images/CESI_campus" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Campus CESI</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Voir</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" style="max-width:1000px; max-height:600px;">0      <i class="fas fa-heart"></i></button>
                    </div>
                    <small class="text-muted">Thomas Lima</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" style="max-width:1000px; max-height:600px;" src="./resources/images/CESI_campus" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Campus CESI</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Voir</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" style="max-width:1000px; max-height:600px;"><i class="fas fa-heart"></i></button>
                    </div>
                    <small class="text-muted">Thomas Lima</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" style="max-width:1000px; max-height:600px;" src="./resources/images/CESI_campus" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Campus CESI</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Voir</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary" style="max-width:1000px; max-height:600px;"><i class="fas fa-heart"></i></button>
                    </div>
                    <small class="text-muted">Thomas Lima</small>
                  </div>
                </div>
              </div>
            </div>
            
      </div>

  </div>

  </div>

</div>