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

    if(@!($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    if(isset($_GET['id']) && isset($_POST['submit'])){
      $id = $_GET['id'];

      $bdd = db_local::getInstance();
      $requete = $bdd->prepare("SELECT * from listeproduits WHERE IDProduit = $id");
      $requete->execute();
      $produit = $requete->fetch();
      $requete->closeCursor();

      $produit['Quantite'] = $_POST['quantity'];
      $produit['Prix_Total'] = $produit['Quantite']*$produit['Prix'];

      array_push($_SESSION['cart'],$produit);
    }

    include('./cartDisplay.php');
    if($_SESSION['cart'] != null) {
      $cart = $_SESSION['cart'];
      $cartDisplay = new Cart($cart);
    }


?>

<div class="container-cart">
<div class="pb-5">
    
      <div class="row">
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
                    <div class="py-2 text-uppercase"></div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantité</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Prix Total</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Supprimer</div>
                  </th>
                </tr>
              </thead>

              <tbody>

                <?php 
                  if(($_SESSION['cart']))
                    $cartDisplay->display($cart);
                  else 
                    echo '<td class="border-0 align-middle"><strong>Votre panier est vide.</strong></td>';
                  
                ?>
              </tbody>
            </table>
          </div>

          <!-- End -->
        </div>
      </div>
      <?php 
      if ($_SESSION['cart']){
      echo '
      <form action="validerlacommande.php" method="post">
        <button input type="submit" type="button" class="btn btn-light button-purchase">Valider la commande</button>
      </form>';
      }
      ?>
    </div>
  </div>
</div>