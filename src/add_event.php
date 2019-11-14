<?php  
    session_start();
    include("head.php");
    include("nav.php");
    include("footer.php");
  ?>

<div class="container-addevent">

    <form class="form">

        <div class="form-label-group">
            <label>Nom de l'évènement</label>
            <input type="get" name="name_event" class="form-control" placeholder="Ex : Week-End d'intégration" required>
        </div>

        <div class="form-label-group">
            <label>Description de l'évènement</label>
            <input type="get" name="desc_event" class="form-control" placeholder="" required>
        </div>

        <div class="form-label-group">
            <label>Date</label>
            <div>
                <input class="form-control" name="date_event" type="date" value="2011-08-19" id="example-date-input" required>
            </div>
        </div> 

        <div class="form-label-group">
            <label>Prix</label>
            <input type="get" name="prix_event"class="form-control" placeholder="" required>
            <br>
        </div>
       
        <button class="btn btn-secondary" type="submit">Ajouter l'évènement</button>

    </form>

</div>
