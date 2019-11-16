<?php 
if (!isset($_SESSION)){
    session_start();
}
?>

<!doctype html>
<html lang="en">

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

    $requete = $bdd->prepare("SELECT * FROM evenements ORDER BY Date DESC LIMIT 2");
    $requete->execute();
    $listevents = $requete->fetchAll();
    $events = new Event($listevents);
    $events->display($listevents);

?>
    </div>
</div>


</html>


