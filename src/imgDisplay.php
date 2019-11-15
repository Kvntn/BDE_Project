<?php

if (!isset($_SESSION)){
    session_start();
}


class Image
{
	private $listimg;

	function __construct($listimg)
	{
		$this->listimg=$listimg;
	}
	
	public function display($listimg){
    foreach($this->listimg as $rows => $key){
		echo '<div class="col-md-4">
        <div class="card mb-4 shadow-sm">
          <img class="card-img-top" style="max-width:500px; max-height:400px;min-height:400px;" src="',$key['LienPhoto'],'" alt="Card image cap">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary" style="max-width:1000px; max-height:600px;">0      <i class="fas fa-heart"></i></button>
              </div>
              <small class="text-muted">',$_SESSION['firstname'],'',$_SESSION['name'],'</small>
            </div>
          </div>
        </div>
      </div>
		';
		}
	}
}
?>