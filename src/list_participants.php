<?php 
    /*
    if (!isset($_SESSION)){
    session_start();
}
    include("head.php");
    include("nav.php");
    include("footer.php");
  ?>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<div class="container-datatable">
	<div class="row">
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
            </tr>
        </thead>

        <tbody>

        <?php
          require('./listDisplay.php');
          require('./db_related/pdo_loc.php');
          try{
              require("./db_related/config.php");
          }catch(Exception $e) {
              throw new Exception("No config ! Incorrect file path or the file is corrupted");
          }

          $bdd = db_local::getInstance();

          $requete = $bdd->prepare("SELECT Prenom, Nom FROM utilisateurs INNER JOIN inscrire ON utilisateurs.IDutilisateur = inscrire.IDutilisateur WHERE IDevenement = 1");
          $requete->execute();
          $listPart = $requete->fetchAll();
          $events = new Participant($listPart);
          $events->display($listPart);
        ?>
            
        </tbody>

    </table>
	</div>
</div>

<script>
    $(document).ready(function() {
    $('#example').DataTable(
        
         {     

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5
       } 
        );
} );


function checkAll(bx) {
  var cbs = document.getElementsByTagName('input');
  for(var i=0; i < cbs.length; i++) {
    if(cbs[i].type == 'checkbox') {
      cbs[i].checked = bx.checked;
    }
  }
}
</script>