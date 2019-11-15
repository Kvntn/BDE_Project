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
              <a class="btn btn-outline-danger" href="page_report.php" role="button">Signaler</a>';
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
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary" style="max-width:1000px; max-height:600px;">0      <i class="fas fa-heart"></i></button>
                    </div>
                    <small class="text-muted">Thomas Lima</small>
                  </div>
                </div>
              </div>
            </div>
            
      </div>
      </div>

      <div class="card-body tab-pane" id="p4">
      <form class="form" method="post" action="post_com.php">

        <div class="form-label-group">
            <label>Commentaire</label>
            <input type="get" name="name_com" class="form-control" required>
        </div>
            <br>

        <button class="btn btn-secondary" name="add_com" type="submit">Ajouter le commentaire</button>

      </form>
      </div>

      <div class="card-body tab-pane" id="p5">
      <form class="form" method="post" action="post_com.php">

        <p>
            <label> Ajouter une photo :</label>
            <input type="file" name="photo-prod"/>
        </p>
        <br>

        <button class="btn btn-secondary" name="add_com" type="submit">Ajouter la photo</button>

      </form>
      </div>

  </div>

</div>