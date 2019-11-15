<?php
    include("head.php");
    include("nav.php");
    include("footer.php");
    include("aside.php");

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

    <div class="col-sm-6 img-prod">
        <div class="card-body">
            <img class="max-width" src=<?php echo $produit['Photo']?>>
            </div>
    </div>

    <div class="col-sm-6 desc-prod">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $produit['NomProduit'] ?></h5>
                <p class="card-text"><?php echo $produit['Description'] ?></p>
                <p class= "card-text"><?php echo $produit['Prix'] ?>€</p>
            </div>
            <div class="form-group">
                
                <form action="cart.php" method="post">
                <label for="quantity" style="width:80px; margin-left:20px;">Quantité</label>
                <select name="quantity" class="form-control form-control" style="width:80px; margin-left:20px;" id="exampleFormControlSelect1">
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                </select>
                <input type="submit" name="submit" class="btn btn-default" style="border:1px solid gray;" type="submit" value="Ajouter au panier">
                </form>
            </div>
            
        </div>
    </div>