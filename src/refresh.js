alert("send nudes");

$(document).ready( function() {
  //initial shop
  $('#shop').load('product.php');
  //next button shop
  $('#nextbutton').click(function() {
  $requetejs = "SELECT * FROM `listeproduits` LIMIT 1";
  alert($requetejs);
  });
});
