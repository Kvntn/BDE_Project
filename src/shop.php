<!doctype html>
<html lang="fr">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<body>
  <div class="album py-5 bg-light">
    <div class="container-shop">      
      <div class="row">
        <div class="col-md-4">
         <form action="" method="get">
          <button name = "button" type="submit" value="previous">previous</button>
          <br>
          <button name = "button" type="submit" value="next">next</button>
         </form> 
        </div>
        <div class="col-md-4">
          <?php
          
          require('./productDisplay.php');
          require('./db_related/pdo_loc.php');
          try{
              require("./db_related/config.php");
          }catch(Exception $e) {
              throw new Exception("No config ! Incorrect file path or the file is corrupted");
          }
          $bdd = db_local::getInstance();
          $minid = 0;
          switch ($_GET['button'])
          {
              case "previous" :
              $minid = $minid-4;
              if($minid < 0){ $minid = 0;}
              break;
              case "next" :
              $minid = $minid+4;
              break;
              default :
              $minid = 0;
              break;
          }
          $requete = $bdd->prepare("SELECT * from listeproduits WHERE IDProduit >= $minid LIMIT 4");
          $requete->execute();
          $listproducts = $requete->fetchAll();
          $products = new Product($listproducts);
          $products->display($listproducts);
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<?php  
    include("head.php");
    include("nav.php");
    include("footer.php");
  ?>