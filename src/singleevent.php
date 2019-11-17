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

    $requete = $bdd->prepare("SELECT * FROM evenements WHERE IDEvenement = $id;");
    $rq = $bdd->prepare("SELECT COUNT(*) FROM likesevenements WHERE IDEvenement = $id");
    $rq->execute();
    $requete->execute();
    $count = $rq->fetch();
    $event = $requete->fetch();
?>

<div class="container-singleevent">

  <div class="card text-center">
    <div class="card-header bg-dark">

      <ul class="nav nav-tabs card-header-tabs">

        <li class="nav-item">
          <a class="nav-link active" href="#p1" data-toggle="tab">Évènement</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p2" data-toggle="tab">Commentaires</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p3" data-toggle="tab">Photos de l'événement</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#p4" data-toggle="tab">Poster un commentaire</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#p5" data-toggle="tab">Poster une photo</a>
        </li>

        <?php
            if(@$_SESSION['Statut'] == 1 || @$_SESSION['Statut'] == 2) {
              echo '
              <li class="nav-item">
                <a class="nav-link" href="#p6" data-toggle="tab">Liste des partcipants</a>
              </li>';
            }
        ?>

      </ul>

    </div>

  <div class="tab-content">

      <div class="card-body tab-pane active" id="p1">
        <h5 class="card-title"><strong><?php echo $event['NomEvenement'] ?></strong><small class="text-right">     -     <?php echo $event['Prix'] ?>€</small></h5>
        <p class="card-text text-left"><?php echo $event['Description'] ?></p>
        <p class="text-right">
          <small><?php echo $event['Date']?></small><br>
          <button type="button" class="btn btn-default btn-lg">

          
          </button>
          
          <?php
            if (@$_SESSION['Statut'] == 1 || @$_SESSION['Statut'] == 2 || @$_SESSION['Statut'] == 3){
            echo '
            <a href="likeEvent.php?id='.$event['IDEvenement'].'"><span class="badge badge-light">'.$count['COUNT(*)'].'<i class="fas fa-heart"></i></span></a>';
            }
            if(@$_SESSION['Statut'] == 1 || @$_SESSION['Statut'] == 2) {
              echo 
              '<a class="btn btn-outline-danger" href="page_report.php" role="button">Signaler</a>';
            }
          ?>
          <a class="btn btn-outline-warning" href="./db_related/add_participant.php" role="button">Intéressé</a>
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
          $requete = $bdd->prepare("SELECT * FROM commentairesevenements INNER JOIN utilisateurs ON commentairesevenements.IDUtilisateur = utilisateurs.IDUtilisateur WHERE IDEvenement = $idevent;");
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
          $requete = $bdd->prepare("SELECT * FROM Photos INNER JOIN utilisateurs ON Photos.IDUtilisateur = utilisateurs.IDUtilisateur WHERE IDEvenement = $idevent;");
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
            <input type="post" name="name_img" class="form-control" placeholder="Veuillez inserer un lien provenant d'un navigateur. Exemple : NoelShack.com" required>
        </div>
          <br>

        <button class="btn btn-secondary" name="add_com" type="submit">Ajouter la photo</button>

      </form>
      </div>

      <div class="card-body tab-pane" id="p6">
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
          <div class="container-datatable">
            <div class="row">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
              <tr>
              <th>Nom</th>
              <th>Prenom</th>
              </tr>
              </thead>

              <tbody>

              <?php

              require('./listDisplay.php');

              $bdd = db_local::getInstance();

              $requete = $bdd->prepare("SELECT Nom, Prenom FROM utilisateurs INNER JOIN inscrire ON utilisateurs.IDutilisateur = inscrire.IDutilisateur WHERE IDevenement = $id");
              $requete->execute();
              $listPart = $requete->fetchAll();
              $events = new Participant($listPart);
              $events->display($listPart);
              ?>

              </tbody>

              </table>
            </div>
          </div>

          <script>
          $(document).ready(function() {
            $('#example').DataTable(
              
              {     
                
                "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
                "iDisplayLength": 5
              } 
            );
          } );


          function checkAll(bx) {
            var cbs = document.getElementsByTagName('input');
            for(var i=0; i < cbs.length; i++) {
              if(cbs[i].type == 'checkbox') {
                cbs[i].checked = bx.checked;
              }
            }
          }
          </script>
          <p class="text-right">
            <?php
              if(@$_SESSION['Statut'] == 1) {
                echo '<a class="btn btn-outline-info" href="./db_related/dl_liste.php" role="button">Télécharger la liste des participants</a>';
              }
            ?>
          </p>
      </div>
  </div>

</div>