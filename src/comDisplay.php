<?php

if (!isset($_SESSION)){
    session_start();
}


class Commentaires
{
	private $listcom;

	function __construct($listcom)
	{
		$this->listcom=$listcom;
    }
    
    
	
	public function display($listcom){
    foreach($this->listcom as $rows => $key){
        echo '
        <div class="list-group-item list-group-item flex-column align-items-start text-left">
        <div class="inline"> 
        <h4><img class="text-right rounded" src="./resources/images/Photo_Profil/',$key['Email'],'.jpg" style="max-width: 20px; height:20px;" alt="">      ',$key['Prenom'],'    ',$key['Nom'],'</h4>
        </div>
        <p>',$key['ContenuCommentaire'],'</p>
        </div>
        ';
		}
	}
}
?>
