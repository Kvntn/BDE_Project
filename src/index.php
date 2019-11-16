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
<h5 align="center">Derniers évènements</h5><br>
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


<div class="container-shop-index">
<h5 align="center">Recommendations</h5><br>
    <div class="row">
          <?php
          
          require('./productDisplay.php');
          try{
              require("./db_related/config.php");
          }catch(Exception $e) {
              throw new Exception("No config ! Incorrect file path or the file is corrupted");
          }
          $bdd = db_local::getInstance();
          $minid = 0;
          $requete = $bdd->prepare("SELECT * from listeproduits ORDER BY RAND() LIMIT 3");
          $requete->execute();
          $listproducts = $requete->fetchAll();
          $products = new Product($listproducts);
          $products->display($listproducts);
          ?>
    </div>
</div>
          


</html>


