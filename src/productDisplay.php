<?php

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
		    <div class="card mb-4 box-shadow">
                <img class="card-img-top"  src="',$key['Photo'],'">
                <div class="card-body">
				    <p class="card-text">',$key['Description'],'</p>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Acheter</button>
                    </div>
                <small class="text-muted">',$key['Prix'],'</small>
				</div>
			</div>';
	}
    }
}
?>
