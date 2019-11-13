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
        

<?php  
    include("head.php");
    include("nav.php");
    include("footer.php");
    include("aside.php");
?>

<form action="" method="get">
  <button name = "button" type="submit" value="previous">previous</button>
  <br>
  <button name = "button" type="submit" value="next">next</button>
</form> 