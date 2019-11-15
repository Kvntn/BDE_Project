<?php

if (!isset($_SESSION)){
    session_start();
}


class Cart
{
	private $cart;

	function __construct($cart)
	{
		$this->cart=$cart;
	}
	
	public function display($cart){
    foreach($this->cart as $rows => $key){
		  echo '<tr>
              <th scope="row" class="border-0">
                <div class="p-2">
                    <img src="',$key['Photo'],'" alt=""  style="max-width:70px; max-height:70px;" class="img-fluid rounded shadow-sm">
                    <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"></a></h5>
                    </div>
                </div>
              </th>
              <td class="border-0 align-middle"><strong>',$key['NomProduit'],'</strong></td>
              <td class="border-0 align-middle"><strong>',$key['Quantite'],'</strong></td>
              <td class="border-0 align-middle"><strong>',$key['Prix']*$key['Quantite'],'€</strong></td>
              <form action="deletefromcart.php?key=',$rows,'" method="post">
                <td class="border-0 align-middle"><button input type = "submit" name="delete"><i class="fa fa-trash"></i></button></td>
              </form>
            </tr>
		';
		}
	}
}
?>