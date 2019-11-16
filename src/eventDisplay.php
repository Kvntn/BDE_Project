<?php

if (!isset($_SESSION)){
    session_start();
}

class Event
{
	private $listevents;

	function __construct($listevents)
	{
		$this->listevents=$listevents;
	}
	
	public function display($listevents){
    foreach($this->listevents as $rows => $key){
		echo '
		<a href=\'./singleevent.php?id=',$key['IDEvenement'],'\' class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
		<h5 class="mb-1">',$key['NomEvenement'],'</h5>
		<small>',$key['Date'],'</small>
        <small>',$key['Prix'],'€</small>
        </div>
        </a>';
		}
	}
}
?>