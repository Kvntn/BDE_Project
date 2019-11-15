<?php  
    if (!isset($_SESSION)){
    session_start();
    
}
    $_SESSION['cart'] = array();
    include("head.php");
    require('./db_related/pdo_loc.php');
    try{
        require("./db_related/config.php");
    }catch(Exception $e) {
        throw new Exception("No config ! Incorrect file path or the file is corrupted");
    }
    if(isset($_GET['id']) && isset($_POST['submit'])){
    $id = $_GET['id'];
    $bdd = db_local::getInstance();
    $requete = $bdd->prepare("SELECT * from listeproduits WHERE IDProduit = $id");
    $requete->execute();
    $produit = $requete->fetch();
    $produit['Quantite'] = $_POST['quantity'];
    $produit['PrixTotal'] = $produit['Quantite']*$produit['Prix'];
    array_push($_SESSION['cart'],$produit);
    
    }
?>

<div class="container-cart">
<div class="pb-5">
    
      <div class="row">
      <?php var_dump($_SESSION['cart']); 
      ?>
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Produit</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Prix</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantité</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Supprimer</div>
                  </th>
                </tr>
              </thead>

              <tbody>

                
                <?php 
                include('./cartDisplay.php');
                $cart = $_SESSION['cart'];
                $cartDisplay = new Cart($cart);
                $cartDisplay->display($cart);
                ?>
                

              </tbody>
            </table>
          </div>

          <!-- End -->
        </div>
      </div>

      <button type="button" class="btn btn-light button-purchase">Valider la commande</button>

    </div>
  </div>
</div>