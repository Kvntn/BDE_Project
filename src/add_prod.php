<?php
    if (!isset($_SESSION)){
    session_start();
}
    include("head.php");
    include("nav.php");
    include("footer.php");
  ?>

<div class="container-addevent">

    <form class="form" method="post" action="./db_related/script_add_prod.php">

        <div class="form-label-group">
            <label>Nom du produit</label>
            <input type="text" name="name_prod" class="form-control" placeholder="Ex : Week-End d'intégration" required>
        </div>

        <div class="form-label-group">
            <label>Description du produit</label>
            <input type="text" name="desc_prod" class="form-control" placeholder="" required>
        </div>

        <div class="form-label-group">
            <label>Prix</label>
            <input type="int" name="prix_prod"class="form-control" placeholder="" required>
        </div>

        <div class="form-group">
            <label>Example select</label>
            <select class="form-control" name="cat_prod">
                <option>Livre</option>
                <option>T-shirt</option>
                <option>Hoodie</option>
            </select>
        </div>

        <!--<p>
            <label> Ajouter une photo :</label>
            <input type="file" name="photo_prod"/>
        </p> -->

        <div class="form-label-group">
            <label>Ajouter une photo :</label>
            <input type="text" name="photo_prod" class="form-control" placeholder="Lien d'une photo" required>
        </div>
       
        <button class="btn btn-secondary" type="submit">Ajouter le produit</button>

    </form>

</div>
