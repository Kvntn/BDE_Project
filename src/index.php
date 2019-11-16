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


<div class="container-shop-index">
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
          if (isset($_GET['button'])){
          switch ($_GET['button'])
          {
              case "previous" :
                $minid = $minid-3;
              if($minid < 0){ $minid = 0;}
              break;
              case "next" :
              $minid = $minid+3;
              break;
              default :
              $minid = 0;
              break;
          }
        }
          $requete = $bdd->prepare("SELECT * from listeproduits ORDER BY RAND() LIMIT 3");
          $requete->execute();
          $listproducts = $requete->fetchAll();
          $products = new Product($listproducts);
          $products->display($listproducts);
          ?>
    </div>
</div>
          


</html>


