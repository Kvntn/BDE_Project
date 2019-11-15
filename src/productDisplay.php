<?php

if (!isset($_SESSION)){
    session_start();
}


class Product
{
	private $listproducts;

	function __construct($listproducts)
	{
		$this->listproducts=$listproducts;
	}
	
	public function display($listproducts){
    foreach($this->listproducts as $rows => $key){
		echo '
		<div class="col-md-4">
		<div class="card mb-4 box-shadow">
            <img class="card-img-top" style="max-width: 250px; max-height:400px; min-height:400px;" src="',$key['Photo'],'">
            <div class="card-body">
				<p class="card-text">',$key['NomProduit'],'</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    	<a href=\'./product.php?id=',$key['IDProduit'],'\'><button type="button" class="btn btn-sm btn-outline-secondary">Voir</button></a>
                    </div>
                    <small class="text-muted">',$key['Prix'],'€</small>
				</div>
			</div>
		</div>
		</div>';
		}
	}
}
?>
