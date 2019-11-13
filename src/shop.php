
<!doctype html>
<html lang="fr">
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<body>
  <div class="album py-5 bg-light">
    <div class="container-shop">
    <form action="" method="get">
    <button name = "button" type="submit" value="previous">previous</button>
    <button name="button" type="submit" value="next">next</button>
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
          $requete = $bdd->prepare("SELECT * from listeproduits WHERE IDProduit >= $minid LIMIT 6");
          $requete->execute();
          $listproducts = $requete->fetchAll();
          $products = new Product($listproducts);
          $products->display($listproducts);
          ?>
    </div>
  </div>
  </div>
    
</body>
</html>

<?php  
    include("head.php");
    include("nav.php");
    include("footer.php");
    include("aside.php");
?>
<!--

<div class="album py-4 bg-light">
        <div class="container-shop">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="./resources/images/hoodie_png.png">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a type="button" href="product.php"class="btn btn-sm btn-outline-secondary">View</a>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="./resources/images/hoodie_png.png">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="./resources/images/hoodie_png.png">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="./resources/images/hoodie_png.png">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="./resources/images/hoodie_png.png">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="./resources/images/hoodie_png.png">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div>
-->



