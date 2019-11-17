<?php

if (!isset($_SESSION)){
    session_start();
}

    include("head.php");
    include("nav.php");
    include("footer.php");

    require('./db_related/pdo_loc.php');
        try{
            require("./db_related/config.php");
        }catch(Exception $e) {
            throw new Exception("No config ! Incorrect file path or the file is corrupted");
        }
    if(isset($_GET['id'])){
    $id = $_GET['id'];}
    $bdd = db_local::getInstance();
    $requete = $bdd->prepare("SELECT * from listeproduits WHERE IDProduit = $id");
    $requete->execute();
    $produit = $requete->fetch();
?>

<div class="container-prod">
    <div class="row">
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <img class="card-img" src=<?php echo $produit['PhotoProduit']?>>
        </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
        <div class="card-body">
            <strong><h5 class="card-title"><?php echo $produit['NomProduit']?></h5></strong>
            <p class="card-text"><?php echo $produit['Description']?></p>
            <p class="card-text"><?php echo $produit['Prix']?> €</p>
            <?php 
            if (isset($_SESSION['login'])){ 
                echo '
            <form action="cart.php?id=',$_GET['id'],'" method="post">
                <label for="quantity">Quantité</label><br>
                <select name="quantity" class="form-control form-control" style="width:80px;" id="exampleFormControlSelect1">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select><br>
                <input type="submit" name="submit" class="btn btn-default" style="border:1px solid gray;" type="submit" value="Ajouter au panier">
            </form>';
            } ?>
        </div>
        </div>
    </div>
    </div>
</div>


                



