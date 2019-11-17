<?php

if (!isset($_SESSION)){
    session_start();
}
    include("head.php");
    include("nav.php");
    include("footer.php");
  ?>

<div class="container-addevent">

    <form class="form" method="post" action="./db_related/script_add_event.php">

        <div class="form-label-group">
            <label>Nom de l'évènement</label>
            <input type="text" name="name_event" class="form-control" placeholder="Ex : Week-End d'intégration" required>
        </div>

        <div class="form-label-group">
            <label>Description de l'évènement</label>
            <input type="text" name="desc_event" class="form-control" placeholder="" required>
        </div>

        <div class="form-label-group">
            <label>Date</label>
            <div>
                <input class="form-control" name="date_event" type="date" value="2019-11-15" id="example-date-input" required>
            </div>
        </div> 

        <div class="form-group">
            <label>Récurrence de l'évènement</label>
            <select class="form-control" name="rec_event">
                <option>Ponctuel</option>
                <option>Journalier</option>
                <option>Hebodomabaire</option>
                <option>Mensuel</option>
                <option>Annuel</option>
            </select>
        </div>
        
        <div class="form-label-group">
            <label>Prix</label>
            <input type="int" name="prix_event"class="form-control" placeholder="" required>
            <br>
        </div>
               
        <button class="btn btn-secondary" type="submit">Ajouter l'évènement</button>

    </form>

</div>
