
<?php if (!isset($_SESSION)){
    session_start();
}
?>

<!doctype html>
<html lang="fr">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<body>
  <div class="album py-5 bg-light">
    <div class="container-shop">
      <form action="" class="text-justify" method="get">
        <button name="button" class="btn btn-dark" type="submit" value="previous"><i class="fas fa-arrow-left"></i></button>
        <button name="button" class="btn btn-dark" type="submit" value="next"><i class="fas fa-arrow-right"></i></button>
      </form> 
    <div class="row">
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
          if (isset($_GET['button'])){
          switch ($_GET['button'])
          {
              case "previous" :
                $minid = $minid-6;
              if($minid < 0){ $minid = 0;}
              break;
              case "next" :
              $minid = $minid+6;
              break;
              default :
              $minid = 0;
              break;
          }
        }
          $requete = $bdd->prepare("SELECT * from listeproduits WHERE IDProduit > $minid LIMIT 6");
          $requete->execute();
          $listproducts = $requete->fetchAll();
          $products = new Product($listproducts);
          $products->display($listproducts);
          ?>
    </div>
      <form action="" class="text-justify" method="get">
          <button name="button" class="btn btn-dark" type="submit" value="previous"><i class="fas fa-arrow-left"></i></button>
          <button name="button" class="btn btn-dark" type="submit" value="next"><i class="fas fa-arrow-right"></i></button>
      </form>
  </div>
  </div>
    
</body>
</html>

<?php  
    include("head.php");
    include("nav.php");
    include("footer.php");
?>
