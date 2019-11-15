<?php 
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
                <th>Prénom</th>
                <th>Centre</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
            </tr>

            <tr>
                <td>Piger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
            </tr>
            
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