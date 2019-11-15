<?php
    include("head.php");
    include("nav.php");
    include("footer.php");
?>

<div class="container-event">
    <div class="list-group">

<?php
    require('./eventDisplay.php');
          require('./db_related/pdo_loc.php');
          try{
              require("./db_related/config.php");
          }catch(Exception $e) {
              throw new Exception("No config ! Incorrect file path or the file is corrupted");
          }

    $bdd = db_local::getInstance();

    $requete = $bdd->prepare("SELECT * FROM evenements ORDER BY Date DESC");
    $requete->execute();
    $listevents = $requete->fetchAll();
    $events = new Event($listevents);
    $events->display($listevents);

?>
    </div>
</div>

<!--<a href="singleevent.php" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">W.E.I</h5>
        <small>Payant</small>
        </div>
        <p class="mb-1">Venez profiter d'un merveilleux weekend en compagnie de vos futur colègues.</p>
    </a>