<?php  
    include("head.php");
    include("nav.php");
    include("footer.php");
    
?>
<div class="container-cart">
<div class="pb-5">
    
      <div class="row">
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

                <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="./resources/images/hoodie_png.png" alt=""  style="max-width:70px; max-height:70px;" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Timex Unisex Originals</a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong><?php echo $_GET['id']?></strong></td>
                  <td class="border-0 align-middle"><strong><?php echo $_POST['quantity']?></strong></td>
                  <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>

                

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