<?php
    include("head.php");
    include("nav.php");
    include("footer.php");
    include("aside.php");
?>

<div class="container-prod">
    <div class="row">

    <div class="col-sm-6 img-prod">
        <div class="card-body">
            <img class="max-width"  src="./resources/images/hoodie_png.png">
        </div>
    </div>

    <div class="col-sm-6 desc-prod">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Black hoodie</h5>
                <p class="card-text">Hoodie aux couleurs du CESI</p>
            </div>
            <div class="form-group">
                <label for="Quantité" style="width:80px; margin-left:20px;">Quantité</label>
                <select class="form-control form-control" style="width:80px; margin-left:20px;" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><input class="btn btn-default" style="border:1px solid gray;" type="submit" value="Ajouter au panier"></li>
            </ul>
        </div>
    </div>