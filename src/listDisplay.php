<?php

if (!isset($_SESSION)){
    session_start();
}

class Participant
{
	private $listPart;

	function __construct($listPart)
	{
		$this->listPart=$listPart;
	}
	
	public function display($listPart){
    foreach($this->listPart as $rows => $key){
		echo '
        <tr>
            <td>',$key['Prenom'],'</td>
            <td>',$key['Nom'],'</td>
        </tr>';
		}
	}
}
?>

<!-- <tr>
    <td>Tiger Nixon</td>
    <td>System Architect</td>
    <td>Edinburgh</td>
</tr> -->
